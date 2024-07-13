<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use DB;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function loginpost(Request $request){
        $crd=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        if(Auth::attempt($crd)){
            if(isset($request->checkbox)){
                Session::put('user_email',$request->email);
                Session::put('user_password',$request->password);
            }else{
                Session::forget('user_email');
                Session::forget('user_password');
            }
           
            return redirect('/home')->with('success','login success');
        }
        return back()->with('error','Email or Password wrong');
    }
    public function register_view(){
        return view('auth.register');
    }
    public function register_post(Request $request){
       $user=new user();
       $user->name=$request->name;
       $user->email=$request->email;
       $user->password=Hash::make($request->password);
       $user->save();
       return back()->with('success','Register successfully');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function forgotpage()
    {
       
        return view("pages.forgot");
    }
    public function sendEmail(Request $request){
        
        $user = User::where('email', $request->email)->count();
        if ($user == 0) {
            return redirect()->back()->with('error', 'User does not exist.');
        }
        $token = Str::random(64);
        DB::table('password_reser_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now(),
        ]);
        try {
            Mail::send('email.send', ['token' => $token, 'email' => $request->email], function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Reset Password');
            });
            return redirect()->back()->with('success', 'Reset link sent to the given mail');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error sending email: ' . $e->getMessage());
        }
        
    }
    public function resetPage($token){
        return view('pages.reset',['token'=>$token]);
    }
    public function updatePassword(Request $request,$token)
    {
        if ($request->password != $request->cpassword) {
            return  redirect()->back()->with('error', 'Password Does Not Match');
        }
        $updatePasswordUser=DB::table('password_reser_tokens')->where([
            'token'=>$request->token
        ])->first();
        $user=User::where('email',$updatePasswordUser->email)->first();
        $user->password = Hash::make($request->input('password'));
        $user->updated_at=now();
        $user->save();
        return redirect()->back()->with('success','Password Reset Successful');
    }
}
