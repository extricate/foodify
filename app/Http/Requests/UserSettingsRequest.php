<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSettingsRequest extends FormRequest
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
            'show_plan_in_navigation' => 'boolean',
            'show_planning_options_on_recipes_index' => 'boolean',
            'show_plan_on_dashboard' => 'boolean',
            'show_plan_on_recipes_index'
        ];
    }
}
