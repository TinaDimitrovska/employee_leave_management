<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicationRequest;
use App\Models\LeaveApplication;
use App\Models\LeaveType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LeaveApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appls = auth()->user()->role == "admin" ? LeaveApplication::all() : LeaveApplication::where('user_id', auth()->user()->id)->get();
        return view('aplications.index-appl',['appls' => $appls]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aplications.create-appl',['types' => LeaveType::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApplicationRequest $request)
    {
        $attributes = $request->validated();
        $attributes['user_id'] = auth()->user()->id;
        if($request->has('note'))
        {
            $attributes['name'] = $request->name;
        }
        if ($request->hasFile('file')) 
        {
            $attributes['attachment'] = $request->file('file')->store('files');
        }

        LeaveApplication::create($attributes);

        return redirect('/applications')->with('success', "Successfully created application");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LeaveApplication  $leaveApplication
     * @return \Illuminate\Http\Response
     */
    public function show(LeaveApplication $leaveApplication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LeaveApplication  $leaveApplication
     * @return \Illuminate\Http\Response
     */
    public function edit(LeaveApplication $leaveApplication)
    {
        $status = config('app.status');
        return view('aplications.edit-appl', ['appl' => $leaveApplication,'types' => LeaveType::all(), 'statuses' => $status]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LeaveApplication  $leaveApplication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LeaveApplication $leaveApplication)
    {
        $leaveApplication->leave_type_id = $request->leave_type_id;
        $leaveApplication->status = $request->status;
        $leaveApplication->from_date = $request->from_date;
        $leaveApplication->to_date = $request->to_date;
        if($request->has("note") != null){
            $leaveApplication->note = $request->note;
        }
        if ($request->hasFile('file')) 
        {
            $leaveApplication['attachment'] = $request->file('file')->store('files');
        }
        $leaveApplication->save();

        return redirect('/applications')->with('success', "Successfully updated application");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LeaveApplication  $leaveApplication
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeaveApplication $leaveApplication)
    {
        $leaveApplication->delete();
        return redirect('/applications')->with('message', "Deleted");
    }

    public function download(LeaveApplication $leaveApplication)
    {
        return Storage::download($leaveApplication->attachment);
    }
}
