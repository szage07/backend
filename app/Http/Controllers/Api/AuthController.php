<?php

namespace App\Http\Controllers\Api;

use App\Models\Carousel;

use App\Http\Requests\carouselItemRequest;

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
 
   //carousel
  /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Carousel:: all();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(carouselItemRequest $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();
 
        $carousel = Carousel::create($validated);
        return  $carousel;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Carousel::findOrFail($id);

         
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(carouselItemRequest $request, string $id)
    {
        $validated = $request->validated();

        $carousel = Carousel::findOrFail($id);

                 $carousel ->update($validated);

            return $carousel;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $carousel = Carousel::findOrFail($id);
 
        $carousel->delete();

        return  $carousel; 
    }

}
