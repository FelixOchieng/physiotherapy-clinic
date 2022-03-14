<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Appointment;
use App\Models\TherapyRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AppointmentRequest;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view appointment')->only(['index', 'show']);
        $this->middleware('permission:add appointment')->only(['create', 'store']);
        $this->middleware('permission:edit appointment')->only(['edit', 'update']);
        $this->middleware('permission:delete appointment')->only(['delete']);
        $this->middleware('permission:change appointment status')->only(
            [
                'markAppointmentAsOngoing',
                'markAppointmentAsComplete'
            ]
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role('user')){
            $appointments = Auth::user()->appointments;
        }

        if(Auth::user()->role('admin'))
        {
            $appointments = Appointment::with(['client', 'therapyRoom', 'therapist'])->latest()->get();
        }


        return view('appointment.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $therapists = User::role('user')->get();
        $freeRooms = TherapyRoom::where('is_occupied', false)->get();
        $appointment = new Appointment();

        return view('appointment.create', compact('clients', 'therapists', 'freeRooms', 'appointment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppointmentRequest $request)
    {
        Appointment::create($request->validated());

        return redirect()->route('appointment.index')->with('success', 'Appointment booked successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        $clients = Client::all();
        $therapists = User::role('user')->get();
        $freeRooms = TherapyRoom::where('is_occupied', false)->get();

        return view('appointment.edit', compact('clients', 'therapists', 'freeRooms', 'appointment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(AppointmentRequest $request, Appointment $appointment)
    {
        $appointment->update($request->validated());

        return redirect()->route('appointment.index')->with('success', 'Appointment updated sucessfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('appointment.index')->with('success', 'Appointment deleted successfully.');
    }

    public function markAppointmentAsOngoing(Request $request, Appointment $appointment)
    {
        $appointment->update([
            'status' => 'ongoing'
        ]);

        $appointment->therapyRoom()->update(['is_occupied' => true]);

        return redirect()->route('appointment.index')->with('success', 'Appointment is now in progress');
    }


    public function markAppointmentAsComplete(Request $request, Appointment $appointment)
    {
        $appointment->update([
            'status' => 'complete'
        ]);

        $appointment->therapyRoom()->update(['is_occupied' => false]);

        return redirect()->route('appointment.index')->with('success', 'Appointment completed successfully.');
    }
}
