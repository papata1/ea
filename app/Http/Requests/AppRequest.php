<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppRequest extends FormRequest
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
            'name'=>'required',
            'develop_language'=>'required',
            'app_database'=>'required',
            'develop_company'=>'required',
            'getting_start_years'=>'required',
            'app_relation'=>'required',
            'remark'=>'required',
            'ma_cost'=>'required',
            'department_id'=>'required'
        ];
    }
}
