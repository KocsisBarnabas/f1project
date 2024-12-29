<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeamRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50',
            'country' => 'required|string|max:50',
            'founded' => 'required|date',
            'team_principal' => 'required|string|max:50',
        ];
    }
}