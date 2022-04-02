<?php

namespace App\Http\Requests\Consultation;

use App\Models\MasterData\Consultations;
// use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

//this rule only at update request
use Illuminate\Validation\Rule;

class UpdateConsultationsRequest extends FormRequest
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
           'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('consultations')->ignore($this->consultations),
           ],
        ];
    }
}
