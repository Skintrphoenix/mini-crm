<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class AuthController extends Controller
{

    public function index(){
        return view('home', ['title' => 'Dashboard']);
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect('/');
        }else{
            return view('login');
        }
    }

    public function actionlogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            return redirect('/');
        }else{
            FacadesSession::flash("message", "email atau password salah");
            return view('login');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        FacadesSession::flash("message", "berhasil keluar");
        return redirect('/login');
    }
}
