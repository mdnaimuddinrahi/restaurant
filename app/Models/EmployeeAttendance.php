<?php

namespace App\Models;

use App\Traits\Blameable;
use App\Traits\Filterable;
use App\Traits\Paginable;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

#[Fillable(['employee_id', 'attendance_date', 'check_in_time', 'check_out_time', 'status', 'working_hours', 'overtime_minutes', 'remarks', 'created_by', 'updated_by'])]
class EmployeeAttendance extends Model
{
    use Blameable, Filterable, Paginable;

    public function getEmployeeAttendances(array $filters = []): Collection|LengthAwarePaginator
    {
        $filter = array_merge([
            'employee_id' => null,
            'attendance_date' => null,
            'check_in_time' => null,
            'check_out_time' => null,
            'status' => null,
            'working_hours' => null,
            'overtime_minutes' => null,
            'selected_columns' => [],
        ], $filters);

        return $this->query()
            ->selectedColumns($filter['selected_columns'] ?? [])
            ->employeeId($filter['employee_id'])
            ->attendanceDate($filter['attendance_date'])
            ->checkInTime($filter['check_in_time'])
            ->checkOutTime($filter['check_out_time'])
            ->status($filter['status'])
            ->workingHours($filter['working_hours'])
            ->overtimeMinutes($filter['overtime_minutes'])
            ->getOrPaginate($filter);
    }

    public function scopeEmployeeId(Builder $query, ?int $employeeId): Builder
    {
        return $query->when(
            $this->isValidFilter($employeeId),
            fn (Builder $q) => $q->where('employee_id', $employeeId)
        );
    }

    public function scopeStatus(Builder $query, ?int $status): Builder
    {
        return $query->when(
            $this->isValidFilter($status),
            fn (Builder $q) => $q->where('status', $status)
        );
    }

    public function scopeAttendanceDate(Builder $query, ?string $attendanceDate): Builder
    {
        return $query->when(
            $this->isValidFilter($attendanceDate),
            fn (Builder $q) => $q->whereDate('attendance_date', $attendanceDate)
        );
    }

    public function scopeCheckInTime(Builder $query, ?string $checkInTime): Builder
    {
        return $query->when(
            $this->isValidFilter($checkInTime),
            fn (Builder $q) => $q->where('check_in_time', $checkInTime)
        );
    }

    public function scopeCheckOutTime(Builder $query, ?string $checkOutTime): Builder
    {
        return $query->when(
            $this->isValidFilter($checkOutTime),
            fn (Builder $q) => $q->where('check_out_time', $checkOutTime)
        );
    }

    public function scopeWorkingHours(Builder $query, ?int $workingHours): Builder
    {
        return $query->when(
            $this->isValidFilter($workingHours),
            fn (Builder $q) => $q->where('working_hours', $workingHours)
        );
    }

    public function scopeOvertimeMinutes(Builder $query, ?int $overtimeMinutes): Builder
    {
        return $query->when(
            $this->isValidFilter($overtimeMinutes),
            fn (Builder $q) => $q->where('overtime_minutes', $overtimeMinutes)
        );
    }

    public function scopeSelectedColumns(Builder $query, array $selectedColumns = []): Builder
    {
        return !empty($selectedColumns) ? $query->select($selectedColumns) : $query;
    }

    public function scopeById(Builder $query, int $employeeAttendanceId): Builder
    {
        return $query->where('id', $employeeAttendanceId);
    }

    public function findEmployeeAttendance(int $employeeAttendanceId): ?Model
    {
        return $this->query()->byId($employeeAttendanceId)->first();
    }

    protected function casts(): array
    {
        return [
            'attendance_date' => 'date:Y-m-d',
            'created_at' => 'datetime:Y-m-d H:i:s',
            'updated_at' => 'datetime:Y-m-d H:i:s',
        ];
    }
}
