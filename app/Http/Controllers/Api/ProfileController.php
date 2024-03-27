<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    //update the specific image of an specific user of the token bearer
    public function image(UserRequest $request)
    { 
        
        $user = User::findOrFail($request->user()->id);

       
        if(!is_null ($user->image)){
            Storage::disk('public')->delete($user->image);
 
        }
        $user->image = $request->file('image')->storePublicly('images', 'public');

       
       
        $user->save();

        return $user;

        
    }
    // * Display the specific information of the token bearer
    // */
   public function show(Request $request)
   {
       return $request->user();

   }

}
