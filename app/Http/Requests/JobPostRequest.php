<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class JobPostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'job_title' => 'required',
            'user_id' => 'required',
            'job_region_id' => 'required',
            'job_type' => 'required',
            'job_location' => 'required',
            'vacancy' => 'required',
            'experience' => 'required',
            'salary' => 'required',
            'gender' => 'required',
            'application_deadline' => 'required',
            'job_description' => 'required',
            'responsibilities' => 'required',
            'education_requirements' => 'required',
            'other_benefits' => 'required',
            'image' => 'required',
            'category_id' => 'required',
        ];
    }
}
