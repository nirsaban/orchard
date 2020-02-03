<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProject extends FormRequest
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
           "title"=> "required|min:2|max:50",
           "owner"=> "required|min:2|max:50",
            "home_size"=>"required|numeric",
            "bedroom_num"=>"required|numeric",
            "bathroom_num_"=>"required|numeric",
            "floor_num"=>"required|numeric",
            "gas"=>"required|integer|max:1|digits_between:0,1",
            "address"=>"required|min:2|max:150",
            "comment"=>"min:2|"
        ];
    }
}
