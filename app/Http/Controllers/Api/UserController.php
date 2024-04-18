<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User:: all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request )
    {
        // Retrieve the validated input data...
        $validated = $request->validated();

        // Check if 'gender' is set in the validated data
        if (!isset($validated['gender'])) {
            // Reject the request or set a default value
            $validated['gender'] = 'male';
        }

        // Do the same for 'birthdate' and 'address'
        if (!isset($validated['birthdate'])) {
            $validated['birthdate'];
        }
        if (!isset($validated['address'])) {
            $validated['address'] = 'Buenavista';
        }

        $validated ['password'] = Hash::make($validated ['password']);
        $user = User::create($validated);
        return  $user;
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return User::findOrFail($id);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {

        $user = User::findOrFail($id);

        $validated = $request->validated();

        $user->name = $validated ['name'];

        $user->save();

        return $user;
    }

    public function email(UserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validated();

        $user->email = $validated ['email'];

        $user->save();

        return $user;
    }

    public function password(UserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validated();

        $user->password = $validated ['password'];

        $user->save();

        return $user;
    }

    public function gender(UserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validated();

        $user->gender = $validated ['gender']; // Corrected here

        $user->save();

        return $user;
    }
    public function birthdate(UserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validated();

        $user->birthdate = $validated ['birthdate']; 

        $user->save();

        return $user;
    }
    public function address(UserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validated();

        $user->address = $validated ['address']; 

        $user->save();

        return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $user = User::findOrFail($id);

        $user->delete();

        return  $user; 
    }
}

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

     
   public function logout(Request $request)
   {
    $request->user()->tokens()->delete();

    $response =[
        'message' => 'Logout.'
    ];
       return $response;

   }


}
