<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class ChangePasswordRequest extends FormRequest
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
            'password' => 'required|confirmed|min:8|max:255',
            'password_confirmation' => 'required',
            'old_password' => 'required'
        ];
    }
    
    protected function failedValidation(Validator $validator)
    {
        if($validator->fails()){
            $messages = $validator->getMessageBag();
            $errors = [
                'message' => 'Update password failed !',
                'errorBag' => $messages->toArray(),
            ];
        }
        // dd($errors);
        return redirect()->back()->with('errors',$errors);
    }
}
