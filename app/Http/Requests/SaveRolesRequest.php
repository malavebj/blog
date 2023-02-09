<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveRolesRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules=[
            'display_name'=>'required'
        ];
        if($this->method()==='POST')
            $rules['name']='required|unique:roles';

        return $rules;
    }

    public function messages(){
        return[
            'name.required'=>'Identificator is Required',
            'name.unique'=>'This "Identificator" already exists in BBDD',
            'display_name.required'=>'Display Name is Required'
        ];
    }
}
