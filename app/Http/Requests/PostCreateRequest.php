<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
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

            'filepath'=>'required',
            'caption'=>'required',
//            'main_image'=>'required',
            'accounts'=>'required',
            'sent_at'=>'required',
            'tags'=>'required',

        ];
    }
}
