<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoalRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|min:3',
            'description' => 'nullable',
            'due_date' => 'nullable|date',
            'completed' => 'nullable|boolean',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'título',
            'description' => 'descrição',
            'due_date' => 'data limite',
            'completed' => 'status',
        ];
    }
}