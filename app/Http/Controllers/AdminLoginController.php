<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();



class AdminLoginController extends Controller
{
    public function index(){
        return view('admin_login');
    }
    public function login(Request $request){
        $admin_email =$request->admin_email;
        $admin_password=md5($request->admin_password);

        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();

        if($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/admin');
        }
        else{
            Session::put('message','Thông tin của bạn sai vui lòng nhập lại');
            return Redirect::to('admin_login');
        }
    }

    public function logout(){
        Session::put('admin_email',null);
        Session::put('admin_password',null);

        return Redirect::to('admin_login');
    }

}
