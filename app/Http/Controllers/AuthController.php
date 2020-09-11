<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Mail\VarificationMail;
use App\Notifications\EmailVerify;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function loginuser()
    {
        return view('backend.layout.login');
    }
    public function loginprocess(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required',
            
            
        ]);
        $credintial = $request->except(['_token']);

       

        if(Auth::attempt($credintial) ){

            $user = Auth::user();
            $user->last_loign =now();
            $user->save();
           

            if( $user->email_verified == 0){  
                session()->flash('msg','please verify your email');
                Auth::logout();
                return redirect()->route('loginuser');
            }
           
            return redirect()->route('admin.index');
        }else{
            session()->flash('type','danger');
            $request->session()->flash('msg',' Login Failed!!!! Invalid credintials');
            
            return redirect()->back();
        }
       

        
    }

    public function registration()
    {
   
        return view('backend.layout.register');
    }
    public function processregistration(Request $request)
    {
                 $request->validate([
                    'name'=>'required|min:3',
                    'email'=>'required|unique:users,email',
                    'password'=>'required|min:4',
                    
                ]);

                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->email_verification_token = Str::random(32);
                $user->email_verified =0 ;
                $user->password = bcrypt($request->password);

              $user->save();

             Mail::to($user->email)->send(new VarificationMail($user));
            
 
            //$user->notify(new EmailVerify($user));//passing user data to EmailVerify file

              $request->session()->flash('msg','Registration Successfull please verify your email!!!!');
              return redirect()->route('loginuser');
     
    }

    public function profile()
    {
        
        return view('backend.layout.profile');
    }
    public function logoutuser()
    {
        Auth::logout();
        session()->flash('msg','User logged out!! Please login!!');
        return redirect()->route('loginuser');
    }
    public function verifymail($token = null)
    {

    //   if($token = null)//if token is null
    //   {
    //     session()->flash('msg','token is null ');
    //     return redirect()->route('loginuser'); 
    //   }
      $user = User::where('email_verification_token',$token)->first();

    $user->email_verified = 1;
    $user->email_verified_at =now();
    $user->email_verification_token = '';
    $user->save(); 
    
      session()->flash('msg','your account is activated you can login now');
        return redirect()->route('loginuser');
    }
}
