<?php

namespace App\Http\Requests;

use App\Type_collection;
use Illuminate\Foundation\Http\FormRequest;

class CollRequest extends FormRequest
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
            'name'=>'required|Unique:Type_collection',

        ];
    }
}
