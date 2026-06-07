<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductAnnouncementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $productAnnouncementId = $this->route('product_announcement');

        return [
            'name' => ['sometimes', 'string', 'max:255', 'unique:product_announcements,name,' . $productAnnouncementId],
            'slug' => ['sometimes', 'string', 'max:255', 'unique:product_announcements,slug,' . $productAnnouncementId],
            'emoji' => ['nullable', 'string', 'max:50'],
            'description' => ['nullable', 'string'],
            'is_active' => ['sometimes', 'boolean'],
        ];
    }
}
