<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Appointment;
use App\Models\TherapyRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function admin()
    {
        $totalTherapists = User::role('user')->count();
        $totalAppointments = Appointment::count();
        $totalTherapyRooms = TherapyRoom::count();
        $totalClients = Client::count();
         return view('home.admin', compact('totalTherapists', 'totalAppointments', 'totalTherapyRooms', 'totalClients'));
    }

    public function user()
    {
        $user = Auth::user();

        $totalAppointments = $user->appointments->count();
        $scheduledAppointments = $user->appointments->where('status', 'scheduled')->count();
        $completeAppointments = $user->appointments->where('status', 'complete')->count();
        $ongoingAppointments = $user->appointments->where('status', 'ongoing')->count();

        return view('home.user', compact(
            'totalAppointments',
            'scheduledAppointments',
            'completeAppointments',
            'ongoingAppointments',
        ));
    }
}
