<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProfileResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ApiAuthController extends Controller
{

    public function register(Request $request){

        $validator = Validator::make($request->all(),[
            "name"=>'required|string|max:255',
            "email"=>'required|email|max:255|unique:users,email',
            "password"=>'required|min:8|confirmed',
        ]);
    
        if($validator->fails()){
            return response()->json([
                "error"=>$validator->errors()
            ],400);
        }
        else{
                $password = bcrypt($request->password);
                $access_token = Str::random(64);
                
                $user = User::create([
                    "name"=>$request->name,
                    "email"=>$request->email,
                    "password"=>$password,
                    "access_token"=>$access_token
                ]);
                
                return response()->json([
                    "success"=>"You have successfully registered",
                    "access_token"=>$access_token,
                    "user_id"=>$user->id,
                ],201);
        }
            
    }
        
        
    public function login(Request $request){

        $validator = Validator::make($request->all(),[
            "email"=>'required|email|max:255',
            "password"=>'required|min:8',
        ]);

        if($validator->fails()){
            return response()->json([
                "error"=>$validator->errors()
            ],301);
        }

        $user = User::where("email","=",$request->email)->first();

        if($user !== null){
            $oldPassword = $user->password;
            $access_token = Str::random(64);
            $isverified = Hash::check($request->password, $oldPassword);

            if($isverified){

                $user->update([
                    "access_token"=>$access_token
                ]);

                return response()->json([
                    "success"=>"You successfully logged in",
                    "access_token"=>$access_token,
                    "user_id"=>$user->id,
                ],200);

            }
            else{
                return response()->json([
                    "error"=>"Authentication failed or invalid credentials"
                ],401);
            }

        }
        else{
            return response()->json([
                "error"=>"This account doesn't exist"
            ],404);
        }
    }   

    public function logout(Request $request){

        $access_token =$request->header("access_token");
        
        if($access_token !== null){

            $user =User::where("access_token","=",$access_token)->first();

            if($user !== null){
                $user->update([
                    "access_token"=>null
                ]);
                return response()->json([
                    "success" => "You successfully logged out",
                ],200);
            }
            else{
                return response()->json([
                    "error" => "access_token not correct"
                ],404);
            }
        }else{
            return response()->json([
                "error" => "access_token not found",
            ],404);
        }
    }
    

    public function updateProfile(Request $request, $id){
           
        $user = User::find($id);
        if($user == null){
            return response()->json([
                "error"=>"no user"
            ],404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|numeric',
            'address' => 'nullable|string|max:255'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                "error" => $validator->errors()
            ], 400);
        } 
        else {

            // $user = $request->user();
            $user->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'address'=>$request->address
            ]);

            return response()->json([
                "success" => "Profile updated successfully.",
                "user"=> new ProfileResource($user)
            ], 200);
        }
    }

    public function showProfile($id){

        $user = User::find($id);
        if($user == null){
            return response()->json([
                "error"=>"no user"
            ],404);
        }
        
        return new ProfileResource($user);
    }

    
}