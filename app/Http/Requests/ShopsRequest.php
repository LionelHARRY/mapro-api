<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'description' => 'max:255',
            'siren' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'user_id' => 'required'
        ];
    }
}
