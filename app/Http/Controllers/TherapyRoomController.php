<?php

namespace App\Http\Controllers;

use App\Http\Requests\TherapyRoomRequest;
use App\Models\TherapyRoom;
use Illuminate\Http\Request;

class TherapyRoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view therapy room')->only(['index', 'show']);
        $this->middleware('permission:add therapy room')->only(['create', 'store']);
        $this->middleware('permission:edit therapy room')->only(['edit', 'update']);
        $this->middleware('permission:delete therapy room')->only(['delete']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $therapyRooms = TherapyRoom::latest()->get();

        return view('therapy-room.index', compact('therapyRooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $therapyRoom = new TherapyRoom();

        return view('therapy-room.create', compact('therapyRoom'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TherapyRoomRequest $request)
    {
        TherapyRoom::create($request->validated());

        return redirect()->route('therapy-room.index')->with('success', 'Therapy room added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TherapyRoom  $therapyRoom
     * @return \Illuminate\Http\Response
     */
    public function show(TherapyRoom $therapyRoom)
    {
        return view('therapy-room.show', compact('therapyRoom'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TherapyRoom  $therapyRoom
     * @return \Illuminate\Http\Response
     */
    public function edit(TherapyRoom $therapyRoom)
    {
        return view('therapy-room.edit', compact('therapyRoom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TherapyRoom  $therapyRoom
     * @return \Illuminate\Http\Response
     */
    public function update(TherapyRoomRequest $request, TherapyRoom $therapyRoom)
    {
        $therapyRoom->update($request->validated());

        return redirect()->route('therapy-room.index')->with('success', 'Therapy room updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TherapyRoom  $therapyRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy(TherapyRoom $therapyRoom)
    {
        $therapyRoom->delete();

        return redirect()->route('therapy-room.index')->with('success', 'Therapy room deleted successfully.');
    }
}
