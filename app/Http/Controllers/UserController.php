<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    //
    public function getPartner(Request $request)
    {
        $user = User::paginate();
        return response()->json($user);
    }


    public function addPartner(Request $request)
    {

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->image = $request->image;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->password = Hash::make($request->password);
        $user->save();

    }

    public function auth(Request $request)
    {

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {

            $token = md5(rand(11111, 99999) . '_' . $user->id);
            User::where('id', $user->id)->update(['remember_token' => $token]);
            return response()->json(['status' => 200, 'token' => $token]);

        } else {

            return response()->json(['status' => 201, 'token' => '']);
            
        }

    }

    public function authcheck(Request $request) {
      
        $profile = User::where('remember_token', $request->token)->first();

        if($profile){

            return response()->json(['status' => 200, 'profile' => $profile]);

        }else{

            return response()->json(['status' => 201, 'profile' => []]);
            
        }
    }
}
