<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRecipeRequest extends FormRequest
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
        return [

            'name' => [
                'required',
                'string',
                'max:255',
                'unique:product_recipes,name'
            ],

            'type' => [
                'nullable',
                'string',
                'max:100'
            ],

            'slug' => [
                'required',
                'string',
                'max:255',
                'unique:product_recipes,slug'
            ],

            'video_link' => [
                'nullable',
                'url',
                'max:500'
            ],

            'image' => [
                'nullable',
                'string',
                'max:500'
            ],

            'is_publishable' => [
                'sometimes',
                'boolean'
            ],

            'is_active' => [
                'sometimes',
                'boolean'
            ],

            'description' => [
                'nullable',
                'string'
            ],

            'meta_title' => [
                'nullable',
                'string',
                'max:255'
            ],

            'meta_keywords' => [
                'nullable',
                'string',
                'max:500'
            ],

            'meta_description' => [
                'nullable',
                'string'
            ],
        ];
    }
}
