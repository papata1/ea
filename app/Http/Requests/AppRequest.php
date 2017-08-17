<?php

namespace App\Http\Requests;

use App\Application_layer;
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

            'name'=>'required|Unique:Application_layer',
           // 'app_database'=>'required',
           // 'develop_language'=>'required',

           
        ];
    }
}
