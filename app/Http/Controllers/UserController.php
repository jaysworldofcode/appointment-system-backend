<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public $token = true;

    public function __construct()
    {
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',  
            'c_password' => 'required|same:password', 
        ]);  

         if ($validator->fails()) {  
            return response()->json(['error'=>$validator->errors()], 401); 
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json([
            'success' => true,
            'data' => $user
        ], Response::HTTP_OK);
    }
}
