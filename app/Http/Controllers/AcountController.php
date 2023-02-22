<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AcountController extends Controller
{
    //
    public function index()
    {
        if (Auth::check()) {
            return view('home.accountDetail');
        } else {
            return view('home.login');
        }
    }
    public function handleLogin(Request $request)
    {
        // dd($request->all());
        //lấy thông tin đăng nhập
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('shop')->with('message', 'Đăng nhập thành công');
        } else {
            return redirect()->back()->with('message', 'Tài khoản không tồn tại');
        }
    }
    public function register()
    {
        return view('home.register');
    }
    public function handleRegister(Request $request)
    {
        $data = $request->all();
        $check = $this->create($data);

        return redirect('shop/login');
    }
    public function create(array $data)
    {
        return User::create([
            'name' => $data['Name'],
            'email' => $data['Email'],
            'PhoneNumber' => $data['Phone'],
            'Sex' => $data['Sex'],
            'DayofBirth' => $data['DateOfBirth'],
            'password' => Hash::make($data['Password'])
        ]);
    }

    public function signout()
    {
        Session::flush();
        Auth::logout();
        return redirect('shop');
    }
    public function acountDetail()
    {
        // if(Auth::check()){
        return view('home.accountDetail');
        // }

    }
}
