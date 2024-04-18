<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    
   public function login(UserRequest $request)
   {
    // $request->validate([
    //     'email' => 'required|email',
    //     'password' => 'required'
    // ]);
 
    $user = User::where('email', $request->email)->first();
 
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
 
      $response =[
        'user'   => $user,
        'token'  => $user->createToken($request->email)->plainTextToken
      ];

    return $response;
   }
   public function store(UserRequest $request )
   {
       // Retrieve the validated input data...
       $validated = $request->all();
   
       // Check if 'gender' is set in the validated data
       if (!isset($validated['gender'])) {
           // Reject the request or set a default value
           $validated['gender'] = 'male';
       }
   
       // Do the same for 'birthdate' and 'address'
       if (!isset($validated['birthdate'])) {
           $validated['birthdate']= '2002-09-14';
       }
       if (!isset($validated['address'])) {
           $validated['address'] = 'Buenavista';
       }
   
      if (!isset($validated ['password'] ))
       Hash::make($validated ['password']);
       $user = User::create($validated);
       return  $user;
   }
     
   public function logout(Request $request)
   {
    $request->user()->tokens()->delete();

    $response =[
        'message' => 'Logout.'
    ];
       return $response;

   }


}
