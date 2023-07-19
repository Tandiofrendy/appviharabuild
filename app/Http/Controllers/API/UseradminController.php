<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Helpers\ApiFormat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UseradminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function views()
    {
        $data =  DB::table('Users')
                ->leftJoin('roleadmin', 'Users.email', '=', 'roleadmin.email')
                ->select('Users.id','Users.name', 'Users.email', DB::raw("IFNULL(roleadmin.role, 'User') AS role"))
                ->paginate(10);
        return ApiFormat::createApi(200,"Success",$data);

        
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
    public function store(Request $request)
    {
        $data = [
            'email' => 'required|email|unique:Users,email',
            'name'=> 'required|unique:Users,name',
            'password'=> 'required|min:8|blocked_password'
        ];

        $validator = Validator::make($request->all(),$data);

        if($validator->fails()){
            return ApiFormat::createApi(200,"Success ","Terdeteksi email atau username telah digunakan atau password terlalu lemah,cek lagi inputan!!");
        }else{
            $isi  =  [
                'email' => $request->email,
                'name'=> $request->name,
                'password'=> Hash::make($request->password),
                'isVerified' => true
            ];
            User::create($isi);
            return ApiFormat::createApi(200,"Success","Databerhasil diinput");
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       if($id){
        User::destroy($id);
        return ApiFormat::createApi(200,"Success","Data berhasil dihapus");
       }else{
        return ApiFormat::createApi(422,"error","terdapat Error internal");
       }
    }
}
