<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function index()
    {
        if (session('login') != null && session('login') != '') session()->put('login', null);
        return view('index');
    }

    public function register()
    {
        return view('user_register');
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $user = DB::table('tbl_user')->join('tbl_account', 'tbl_user.account_id', '=', 'tbl_account.id')
        ->where('username', $username)->where('password', md5($password))->select('tbl_user.id as id', 'tbl_user.status as status')->first();

        if ($user != null) {
            if($user->status == 1) {
                session()->put('login', 'user');
                session()->put('user_id', $user->id);
                session()->put('message', 'Đăng nhập thành công');
                return redirect('/user/user_home');
            }
            else {
                session()->put('message', 'Tài khoản của bạn đã bị khóa hoặc chưa được kích hoạt');
                return redirect('/');
            }
        } else {
            session()->put('message', 'Tên đăng nhập hoặc mật khẩu không đúng');
            return redirect('/');
        }
    }

    public function adminIndex()
    {
        if (session('login') != null && session('login') != '') session()->put('login', null);
        return view('admin_login');
    }

    public function adminLogin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $admin = DB::table('tbl_account')->join('tbl_admin', 'tbl_admin.account_id', '=', 'tbl_account.id')-> 
        where('username', $username)->where('password', md5($password))->first();

        if ($admin != null) {
            session()->put('login', 'admin');
            session()->put('admin_id', $admin->id);
            session()->put('message', 'Đăng nhập thành công');
            return redirect('/admin/admin_home');
        } else {
            session()->put('message', 'Tên đăng nhập hoặc mật khẩu không đúng');
            return redirect('/');
        }
    }

    public function store(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $name = $request->full_name;
        $phone = $request->phone;
        $email = $request->email;
        $student_id = $request->student_id;

        $account = DB::table('tbl_account')->insertGetId([
            'username' => $username,
            'password' => md5($password),
        ]);

        if($student_id != null && $student_id != '') {
            $user = DB::table('tbl_user')->insert([
                'full_name' => $name,
                'email' => $email,
                'phone' => $phone,
                'account_id' => $account,
                'student_id' => $student_id
            ]);
        } else {
            $user = DB::table('tbl_user')->insert([
                'full_name' => $name,
                'email' => $email,
                'phone' => $phone,
                'account_id' => $account
            ]);
        }

        if ($user) {
            session()->put('message', 'Đăng ký thành công');
            return redirect('/');
        } 
        else {
            session()->put('message', 'Đăng ký thất bại, hãy thử lại');
            return view('/user_register');
        }

    }
}
