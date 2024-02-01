<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\RedirectResponse;


class UserController extends Controller
{
     //get page register
        public function index() {
            return view('user.register');
        }


    //post register 
        public function register(Request $request) {
            $validator = Validator::make($request->all(), [
                'username' => 'required|min:3|max:255',
                'email' => 'required|email|unique:user',
                'password' => 'required|min:8|max:255'
            ], 
            [
                'email.required' => 'Email wajib diisi',
                'password.required' => 'Password wajib diisi',
                'password.min' => 'Password minimal 8 karakter',
                'email.unique' => 'Email sudah terdaftar',
                'username.required' => 'Nama wajib diisi',
                'username.min' => 'Nama minimal 3 karakter'
            ]);
        
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        
            $validatedData = $validator->validated();

            $validatedData['password'] = Hash::make($validatedData['password']);
        
            User::create($validatedData);
        
            $request->session()->flash('success', 'register berhasil');
        
            return redirect('/user/login');
        }


   

    //get page login
        public function login() {
            return view('user.login');
        }
    
    //post login
        public function post_login(Request $request) {            
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $userExists = User::where('email', $credentials['email'])->exists();
            if (!$userExists) {
                return back()->withInput()->with('error', 'Email tidak terdaftar.');
            }

            if(Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/todo')->with('success', 'Login sukses');
            }

            return back()->withInput()->with('error', 'Login gagal, silahkan periksa kembali email atau password');
        }


        
    //logout
        public function logout(Request $request): RedirectResponse
        {
            Auth::logout();
        
            $request->session()->invalidate();
        
            $request->session()->regenerateToken();

            $request->session()->flash('success', 'Logout berhasil');
        
            return redirect('/user/login');
        }

}
