<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use MGenerator\GenerateMissionRequest\MissionFormat;

class GenerateMissionRequest extends FormRequest
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
            'mission_format' => [
                'required',
                'integer',
                Rule::in([
                    MissionFormat::INCURSION, 
                    MissionFormat::COMBAT_PATROL
                ])
            ]
        ];
    }
}
