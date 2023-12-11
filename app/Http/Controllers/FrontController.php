<?php

namespace App\Http\Controllers;

use App\Models\Announcment;
use Illuminate\Http\Request;
use App\Mail\ConfirmationEmail;
use App\Http\Requests\MailRequest;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('welcome','searchAnnouncements','setLanguage');

    }
    public function welcome(){
        $announcments=Announcment::where('is_accepted', true)->orderBy('created_at','desc')->take(6)->get();
        return view('welcome',compact('announcments'));
    }
    public function searchAnnouncements(Request $request){
        $announcments=Announcment::search( $request->searched )->where('is_accepted', true)->paginate(10);
        return view('index',compact('announcments'));
    }
    
    public function setLanguage($lang){
        
        session()->put('locale',$lang);
        return redirect()->back();
        
    }
    public function form(){
        return view('form');
    }
    public function sendEmail(MailRequest $request){
        Mail::to($request->email)->send(new ConfirmationEmail($request->message));
        return redirect()->route('welcome')->with('success',__('ui.Grazie'));
    }

}
