<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; //encriptar contraseña
use Illuminate\Support\Facades\Session; //sesion
use App\Models\User; //dao
use Illuminate\Support\Facades\Auth; //logeo de inicio y cierre de sesiones


class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function registration()
    {
        return view('auth.registration');
    }
    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $data = $request->all();
        $check = $this->create($data);

        return redirect("index")->withSuccess('You have signed-in');
    }
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function customlogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('loginsuccess')
                ->withSuccess('Logeado :D');
        }
        return redirect("login")->withSuccess('No se logeo:(');
    }

    public function LogOut(){
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
