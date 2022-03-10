<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Hash;
use Auth;

class AuthController extends Controller
{

    //fungsi Auth Register
    public function register(Request $request)
    {
        $rules = array(
            'email' => 'required|string|email',
            'password' => 'required|string|min:6|confirmed',

        );

        $cek = Validator::make($request->all(),$rules);

        if($cek->fails()){
            $errorString = implode(",",$cek->messages()->all());
            return response()->json([
                'message' => $errorString
            ], 401);
        }else{
            $user = User::create([
                'nama_user' => $request->nama_user,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                // 'role' => $request->role
            ]);

            $user->assignRole('admin');
            
            $token = $user->createToken('token-name')->plainTextToken;
            $roles = $user->getRoleNames();

            if(Auth::attempt($request->only('email', 'password'))) {
                return redirect()->route('dashboard-admin');
            }else{
                return "gagal";
            }

        }
    }

    //fungsi Auth Login
    public function Login(Request $request)
    {
        $rules = array(
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        );

        $cek = Validator::make($request->all(), $rules);
        if($cek->fails()){
            $errorString = implode(",",$cek->messages()->all());
            return redirect()->route('dashboard-admin')->with('warning', $errorString);
        }else{
            if(Auth::attempt($request->only('email', 'password'))){
                $user = User::where('email', $request->email)->first();
                $roles = $user->getRoleNames();
                if($roles[0] == 'admin'){
                    return redirect()->route('dashboard-admin');
                }else{
                    return redirect()->route('dashboard-pelanggan');
                }
            }else{
                return redirect()->back()->with('warning', "email/password salah");
            }
        }
    }

    //fungsi Tampilan Login
    public function loginT(Request $request)
    {
        return view('auth.login');
    }

    //fungsi Tampilan register
    public function registerT(Request $request)
    {
        return view('auth.register');
    }
}
