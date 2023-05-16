<?php

namespace App\Http\Controllers;

use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    public function index(){
        $announcement_to_check=Announcement::where('is_accepted', null)->first();
        return view('revisor.index', compact('announcement_to_check'));
    }

    public function acceptAnnouncement(Announcement $announcement){
        $announcement->setAccepted(true);
        return redirect()->back()->with('message', 'Complimenti, hai accettato l\'annuncio');
    }

    public function rejectAnnouncement(Announcement $announcement){
        $announcement->setAccepted(false);
        return redirect()->back()->with('message', 'Complimenti, hai rifiutato l\'annuncio');
    }
    public function becomeRevisor()
    {
        Mail::to('admin@starmarket.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->back()->with('success','Complimenti! Hai richiesto di entrare in accademia correttamente');
    }
    public function makeRevisor(User $user)
    {
        Artisan::call('presto:makeUserRevisor',["email"=>$user->email]);
        return redirect('/')->with('success','Complimenti! L\'utente è diventato un Maestro Jedi');
    }
}
