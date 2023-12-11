<?php

namespace App\Http\Controllers;

use App\Mail\BecomeRevisor;
use App\Models\Announcment;
use Illuminate\Http\Request;
use App\Models\RevisorAction;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index(){
        $revisorAction = RevisorAction::where('id',Auth::user()->id)->orderBy('id','desc')->get();
        $announcment_to_check = Announcment::where('is_accepted', null)->first();


        $announcments_true= Announcment::where('is_accepted', true)->orderBy('created_at','desc')->get();
        $announcments_false= Announcment::where('is_accepted', false)->orderBy('created_at','desc')->get();

        return view('revisor.index', compact('announcment_to_check','revisorAction','announcments_true','announcments_false'));
    }


    public function revisorCronology($n){
        if(RevisorAction::where('user_id',Auth::user()->id)->get()->count()>$n){

            RevisorAction::where('user_id',Auth::user()->id)->get()->first()->delete();
        }
    }    
    
    public function acceptAnnouncment(Announcment $announcment){
        $announcment->setAccepted(true);
        RevisorAction::create([
            'announcment_id'=> $announcment->id,
            'action'=> true,
            'user_id'=> Auth::user()->id,
        ]);
        $this->revisorCronology(10);
        return redirect()->back()->with('success',__('ui.accettato'));
    }
    public function rejectAnnouncment(Announcment $announcment){
        $announcment->setAccepted(false);
        return redirect()->back()->with('success',__('ui.rifiutato'));
    }
    public function undoLastAnnouncment(){
        $action=RevisorAction::where('user_id',Auth::user()->id)->get()->last();
        $this->revisorCronology(10);
        if ($action) {
            $announcment=Announcment::find($action->announcment_id);
            $announcment->setAccepted(null);
            $action->delete();
            return redirect()->back()->with('message', $action->action ? 'azione annulata: accetta' : 'azione annulata: rifiuta');
        }else{
            return redirect()->back()->with('message',__('ui.annullare'));
        }
    }

    public function undoAnnouncment(Announcment $announcment){
        $this->revisorCronology(10);

        if($announcment->is_accepted != null){
            $announcment->setAccepted(null);
            return redirect()->back()->with('message', $announcment->is_accepted ? 'azione annulata: accetta' : 'azione annulata: rifiuta');
        }else{
            return redirect('/')->with('message',__('ui.modifica_non_autorizzata'));
        }
    }
    public function becomeRevisor(){
        Mail::to('bitbrigade_05@yahoo.com')->send(new BecomeRevisor(Auth::user()));
        return redirect()->back()->with('success',__('ui.diventare_revisore'));
    }
    public function makeRevisor($id){
        $user = User::find($id);

        if($user){
            if (Auth::user()->is_admin) {
                Artisan::call('presto:makeUserRevisor',['email' => $user->email]);
                return redirect('/')->with('success',__('ui.utente_è_revisore'));
            }
            else{
                return redirect('/')->with('access.denied',__('ui.autorizzazione_insufficente'));
            }
        }
        else{
            return redirect('/')->with('access.denied',__('ui.utente_inesistente'));
        }

    }




        /* Artisan::call("presto:makeUserRevisor",["email"=> $user->email]);
        return redirect('/')->with('success',"Complimenti sei diventato revisore!"); */
    }
    


