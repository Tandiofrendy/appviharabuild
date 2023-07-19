<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Helpers\ApiFormat;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('login');
    }

    public function regisView()
    {
        return view('register');
    }

    public function getids(){
       $id =  Auth::user()->email;

        
       if($id){
            return ApiFormat::createApi(200,"success",$id);
        }else{
            return ApiFormat::createApi(400,"error");
        }
    }

    public function login(Request $request)
    {

        // $request->validate([
        //     'email' => ['required',
        //         Rule::exists('users')->where(function($query){
        //             $query->where('isVerified',true);
        //         })
        //     ],
        //     'passsword' => 'required'
        // ],[
        //     $this->email().'.exists' => 'Email anda belum aktif!!'
        // ]);

        // $validator = Validator::make($request->all(), [
        //     'email' => ['required', 

        // ],
        //     'password' => ['required'],
        // ],
        //     [
        //         '.exist' => 'Email anda belum aktif'
        //     ]
        // );



        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email',
                Rule::exists('users')->where(function($query){
                $query->where('isVerified',true);
            })],
            'password' => ['required'],
        ],[
            'email.exists' => 'email belum aktif,silahkan registrasi kembali !!'
        ]);

        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();

        if (Auth::attempt(array('email' => $validated['email'], 'password' => $validated['password']))) {
          
            return redirect()->route('layouts/onboarding');
            // return ApiFormat::createApi(200,"success");
        } else {
            $validator->errors()->add(
                'password', 'Email atau password anda salah!!'
            );
            return redirect()->back()->withErrors($validator)->withInput();
            // return ApiFormat::createApi(400,"gagal");
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
