<?php

namespace Tests\Feature;

use App\Models\EmployeeAttendance;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class EmployeeAttendanceApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_attendance_routes_require_authentication(): void
    {
        $this->getJson('/api/employee-attendances')->assertUnauthorized();
    }

    public function test_index_lists_attendances_and_applies_filters(): void
    {
        $this->authenticate();
        $employeeId = $this->createEmployee();
        $otherEmployeeId = $this->createEmployee();

        $this->createAttendance($employeeId, ['status' => 1]);
        $this->createAttendance($employeeId, ['status' => 0]);
        $this->createAttendance($otherEmployeeId, ['status' => 1]);

        $filters = http_build_query([
            'employee_id' => $employeeId,
            'attendance_date' => '2026-11-05',
            'check_in_time' => '09:00:00',
            'check_out_time' => '17:00:00',
            'status' => 1,
            'working_hours' => 8,
            'overtime_minutes' => 0,
        ]);

        $this->getJson('/api/employee-attendances?'.$filters)
            ->assertOk()
            ->assertJsonPath('message', 'Employee Attendance List Successfully.')
            ->assertJsonCount(1, 'data')
            ->assertJsonPath('data.0.employee_id', $employeeId)
            ->assertJsonPath('data.0.status', 1);
    }

    public function test_store_creates_an_attendance_record(): void
    {
        $this->authenticate();
        $employeeId = $this->createEmployee();

        $this->postJson('/api/employee-attendances', [
            'employee_id' => $employeeId,
            'attendance_date' => '2026-11-05',
            'check_in_time' => '09:00:00',
            'check_out_time' => '17:00:00',
            'status' => 1,
            'working_hours' => 8,
            'overtime_minutes' => 30,
            'remarks' => 'On time',
        ])
            ->assertCreated()
            ->assertJsonPath('message', 'Employee Attendance created successfully')
            ->assertJsonPath('data.employee_id', $employeeId)
            ->assertJsonPath('data.status', 1);

        $this->assertDatabaseHas('employee_attendances', [
            'employee_id' => $employeeId,
            'attendance_date' => '2026-11-05',
            'check_in_time' => '09:00:00',
            'check_out_time' => '17:00:00',
            'working_hours' => 8,
            'overtime_minutes' => 30,
        ]);
    }

    public function test_store_validates_employee_and_attendance_date(): void
    {
        $this->authenticate();

        $this->postJson('/api/employee-attendances', [
            'employee_id' => 9999,
            'attendance_date' => 'not-a-date',
        ])->assertUnprocessable()
            ->assertJsonValidationErrors(['employee_id', 'attendance_date']);
    }

    public function test_show_returns_an_attendance_or_not_found_response(): void
    {
        $this->authenticate();
        $attendance = $this->createAttendance($this->createEmployee());

        $this->getJson('/api/employee-attendances/'.$attendance->id)
            ->assertOk()
            ->assertJsonPath('data.id', $attendance->id);

        $this->getJson('/api/employee-attendances/9999')
            ->assertStatus(400)
            ->assertJsonPath('message', 'No Employee Attendance found');
    }

    public function test_update_changes_attendance_fields(): void
    {
        $this->authenticate();
        $attendance = $this->createAttendance($this->createEmployee(), ['status' => 0]);

        $this->patchJson('/api/employee-attendances/'.$attendance->id, [
            'status' => 2,
            'check_in_time' => '09:15:00',
            'overtime_minutes' => 15,
        ])
            ->assertOk()
            ->assertJsonPath('message', 'Employee Attendance updated successfully')
            ->assertJsonPath('data.status', 2)
            ->assertJsonPath('data.check_in_time', '09:15:00');

        $this->assertDatabaseHas('employee_attendances', [
            'id' => $attendance->id,
            'status' => 2,
            'check_in_time' => '09:15:00',
            'overtime_minutes' => 15,
        ]);
    }

    public function test_update_validates_attendance_fields(): void
    {
        $this->authenticate();
        $attendance = $this->createAttendance($this->createEmployee());

        $this->patchJson('/api/employee-attendances/'.$attendance->id, [
            'status' => 9,
            'check_out_time' => '25:61:00',
        ])->assertUnprocessable()
            ->assertJsonValidationErrors(['status', 'check_out_time']);
    }

    public function test_destroy_deletes_an_attendance_record(): void
    {
        $this->authenticate();
        $attendance = $this->createAttendance($this->createEmployee());

        $this->deleteJson('/api/employee-attendances/'.$attendance->id)
            ->assertOk()
            ->assertJsonPath('message', 'Employee Attendance deleted successfully');

        $this->assertDatabaseMissing('employee_attendances', ['id' => $attendance->id]);
    }

    private function authenticate(): void
    {
        $user = User::create([
            'name' => 'Attendance Tester',
            'username' => 'attendance-tester',
            'email' => 'attendance-tester@example.com',
            'password' => 'password',
            'role_id' => 2,
        ]);

        $this->actingAs($user, 'sanctum');
    }

    private function createEmployee(): int
    {
        return DB::table('employees')->insertGetId([
            'employee_type_id' => 1,
            'employee_designation_id' => 1,
            'name' => 'Test Employee '.fake()->unique()->numerify('####'),
        ]);
    }

    private function createAttendance(int $employeeId, array $overrides = []): EmployeeAttendance
    {
        return EmployeeAttendance::create(array_merge([
            'employee_id' => $employeeId,
            'attendance_date' => '2026-11-05',
            'check_in_time' => '09:00:00',
            'check_out_time' => '17:00:00',
            'status' => 1,
            'working_hours' => 8,
            'overtime_minutes' => 0,
        ], $overrides));
    }
}
