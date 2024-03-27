<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if(request()->routeIs('user.store')){
            return [
                'firstname'     => 'required|string|unique:App\Models\User,firstname|max:255',
                'lastname'      => 'required|string|unique:App\Models\User,lastname|max:255',
                // 'role'          => 'required|string',
                'email'         => 'required|string|unique:App\Models\User,email|max:255',
                //regex is the password requirements
                // 'password'  => 'required|string|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',
                'password'      => 'required|string|min:8|confirmed',
            ];
        }
        else if(request()->routeIs('user.update')){
            return [
                'name'      => 'required|string|unique:App\Models\User,name|max:255'
                
            ];
        }
        else if(request()->routeIs('user.email')){
            return [
                'email'     => 'required|string|max:255'
                
            ];
        }
        else if(request()->routeIs('user.password')){
            return [
                'password'     => 'required|confirmed|string|max:255'
                
            ];
        }
        else {
            return [];
        }
       
    }
    
}
