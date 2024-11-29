<?php

namespace App\Http\Controllers\Api\Worker\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateWorkerRequest extends FormRequest
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
            "name" => "required|string",
            "department_id" => "required|integer",
            "title_id" => "required|integer",
            "upper_worker_id" => "nullable|integer"
        ];
    }
}
