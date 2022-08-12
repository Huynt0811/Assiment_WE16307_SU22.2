<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function getLogin()
    {
        return view('auth.login');
    }
    public function postLogin(LoginRequest  $request)
    {
        // Lấy dữ liệu email password ng dùng gửi lên
        // dd($request->all());
        $email = $request->email;
        $password = $request->password;
        //Kiểm tra thông tin đăng nhập của người dùng
        // echo $email, $password;
        // dd(Auth::attempt(['email' => $email, 'password' => $password]));
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('admin.product.list');
        } else {
            return redirect()->route('auth.getLogin');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerate();
        return redirect('auth/login');
    }
    public function getSignup()
    {
        return view('auth.signup');
    }
    public function postSignup(Request $request)
    {
        $request->validate([
            'email' => 'required|min:6|max:40|email',
            'password' => 'required|min:6'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = 0;
        if ($request->password == $request->passwordagain) {
            $user->password = hash('md2', $request->password);
            $user->save();
            return view('auth.login', [
                'mes' => 'Đăng ký thành công'
            ]);
        } else {
            return view('auth.signup', [
                'mes' => 'Đăng ký thất bại'
            ]);
        }
    }
}