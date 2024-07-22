<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->hasPermissionTo('update categories');;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required',
            'note'=>'nullable|string',
            'description'=>'nullable|string',
            'icon'=>'nullable|array',
            'icon.*'=>'file|mimes:png,jpg',
            'status'=>'required'
        ];
    }


    public function prepareForvalidation(){

        if(isset($this->input(['status'])['label'])){
            $this->merge(['status'=>$this->input(['status'])['label']]);
        };

    }
}
