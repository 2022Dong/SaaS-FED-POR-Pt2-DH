<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreListingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // todo: Check to see if logged in, and they have the correct role/permission
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'title' => [
                'string',
                'required',
                'min:5',
                'max:200'
            ],
            'description' => [
                'required',
            ],
            'salary' => [
                'string',
                'required',
            ],
            'tags' => [
                'string',
                'required',
            ],
            'company' => [
                'string',
                'required',
            ],
            'address' => [
                'string',
                'required',
            ],
            'city' => [
                'string',
                'required',
            ],
            'state' => [
                'string',
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'email' => [
                'string',
                'required',
            ],
            'requirements' => [
                'required',
            ],
            'benefits' => [
                'required',
            ],
            'status' => [
                'string',
            ]
        ];
    }
}
