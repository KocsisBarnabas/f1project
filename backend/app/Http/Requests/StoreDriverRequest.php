<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDriverRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50',
            'nationality' => 'required|string|max:50',
            'dob' => 'required|date',
            'team_id' => 'required|exists:teams,id', 
        ];
    }
}
