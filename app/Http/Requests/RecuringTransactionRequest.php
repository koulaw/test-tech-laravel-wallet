<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecuringTransactionRequest extends FormRequest
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
            'amount' => [
                'required',
                'integer',
                'min:1',
            ],
            'start_date' => [
                'required',
                'date',
                'after_or_equal:today',
            ],
            'end_date' => [
                'nullable',
                'date',
                'after_or_equal:start_date',
            ],
            'recipient_email' => [
                'required',
                'email',
                'exists:users,email',
            ],
            'reason' => [
                'required',
                'string',
                'max:255',
            ],
            'frequency' => [
                'integer',
                'min:1',
                'max:365,'
            ],
        ];
    }
}
