<?php

namespace App\Http\Controllers\API;

use App\Events\Auth\UserActivationEmail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Helpers\ApiFormat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data  =  User::all();

        if($data){
            return ApiFormat::createApi(200,"success",$data);
        }else{
            return ApiFormat::createApi(400,"error");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request)
    {

        $isi = [
            'email' => 'required',
            'name' => 'required',
            'password' => 'required'

        ];

        $validator = Validator::make($request->all(),$isi);

        if($validator->fails()){
            return ApiFormat::createApi(422,"Error",$validator->messages());
        }else{
            $token = $request->token_activation;
            $password = Hash::make($request->password);

            $Email = User::where('email', $request->email)->value('email');
            if($Email){
                return ApiFormat::createApi(200,"sukses","email anda sudah terdaftar silahkan melakukan verifikasi untuk proses selanjut");

                // getcodes();
            }else{
                $dataregis = [
                    'email' => $request->email,
                    'name' => $request->name,
                    'password' => $password,
                    'isVerified' => false
                ];
                User::create($dataregis);
                return ApiFormat::createApi(200,"sukses","Silahkan melakukan aktivasi akun !!");
            }
        }
    }

    public function getcodes(Request $request){
        $key = "";
        for ($x = 1; $x <= 6; $x++) {
            // Set each digit
            $key .= random_int(0, 9);
        }
        $isi = [
            'email' => 'required|email|unique:users',
        ];

        $validator = Validator::make($request->all(),$isi);

        if($validator->fails()){
         
            $users = User::where('email',$request->email)->update([
                'token_activation' => $key
            ]);
            $userss = User::where('email',$request->email)->first();
           


            // dd($userss->isVerified);
        
            event(new UserActivationEmail($userss));
            return ApiFormat::createApi(200,"sukses");
        }else{
            return ApiFormat::createApi(200,"fail");
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $email)
    {

        if($request->isVerified != null){
           $cek =  User::where('email',$email)->value('token_activation');
           if($cek == $request->token_activation){
            User::where('email',$email)->update([
                'isVerified' => $request->isVerified
            ]);
            return ApiFormat::createApi(200,"success","Akun anda berhasil melakukan aktivasi");
           }else{
            return ApiFormat::createApi(200,"error","code yang anda inputkan tidak cocok");
           }
            
        }else{
            return ApiFormat::createApi(422,"error");
        }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($email)
    {
        if($email){
            User::where('email',$email)->delete();;
            return ApiFormat::createApi(200,"success","data berhasil dihapus");
        }else{
            return ApiFormat::createApi(400, "error");
        }
    }
}
