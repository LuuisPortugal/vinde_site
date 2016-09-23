<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/controle';

    public function formulario()
    {
        return view('controle.login.index');
    }

    public function login(Request $request)
    {
        $input = $request->except('_token');

        if (Auth::attempt($input)) {
            $permissao = array();
            foreach (Auth::user()->grupo_usuario->rotas as $rota)
                $permissao[] = $rota->nome;
            session(['permissao' => $permissao]);

            return redirect()->intended('controle');
        } else {
            return redirect()->back()->with('error', true);
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('auth.formulario');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
