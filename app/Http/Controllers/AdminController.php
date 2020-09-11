<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Contact;
use App\Mail\ReplyMail;
use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.layout.index');
    }

  
    public function post()
    {
        return view('backend.layout.post');

    }

   
  
    public function message()
    {
        $message = Contact::all();
        return view('backend.layout.message',compact('message'));
    
    }
    public function messageDelete($id)
    {
        $delmessage = Contact::destroy($id);

        session()->flash('msg','message Deleted successfully');
        return  redirect()->back();
    
    }
    public function messageReply($id)

    {
        $replyto = Contact::Find($id);
        return view('backend.layout.replymsg',compact('replyto'));
    
    }

    
  
    public function messageSend(Request $request)
    {

        $toemail = $request->toemail;
        $fromemail = $request->fromemail;
        $reply = $request->reply;

        Mail::to($toemail)->send(new ReplyMail( $fromemail, $reply));
        session()->flash('msg','Reply send successfully');
        return  redirect()->route('inbox');
    }


}
