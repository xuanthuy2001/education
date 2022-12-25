<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\formPostLogin;

class LoginController extends Controller
{
    // su dung middleware trong controller
    // tat ca ca phuong thuc trong class deu bi chi phoi
    public function __construct()
    {
        // $this->middleware('fake.login:user');
        // ->only(['index']) chi tac dong vao phuong thuc index
        // except: loai tru
        // neu khai bao middleware ben ngoai thi no se tac dong car controller
        //$this->middleware('fake.login:user')->only(['index']);
        // $this->middleware('fake.login:admin')->except(['test']);
    }
    public function index()
    {
        return view('login.form');
    }
    public function handle(formPostLogin $request)
    {   
        $users= $request->username;
        $password= $request->password;
        $infoUser = User::where([
            'status' => 1,
            'username' => $users,
            'password' => $password
        ])->first();
        if(!empty($infoUser))
        {
            $request->session()->put("username",$infoUser->username);
            $request->session()->put("userId",$infoUser->id);
            $request->session()->put("email",$infoUser->email);
            $request->session()->put("roleId",$infoUser->role_id);
            $request->session()->put("phone",$infoUser->phone);
            return redirect()->route('admin.dashboard');
        }
        else{
            return redirect()->back()->with(['error_login'=>"tai khoan khong ton tai"]);
        }
    }
    public function logout(Request $request)
    {
        // unset $session
        $request -> session() ->forget('username');
        return redirect()->route('admin.login');
    }
}
