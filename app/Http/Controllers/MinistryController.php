<?php

namespace App\Http\Controllers;

use App\Location;
use App\Ministry;
use Illuminate\Http\Request;

use Auth;

class MinistryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        $ministries=Ministry::orderBy('name','asc')->get();
        $locations=Location::orderBy('name','asc')->get();

        return view('admin.ministry.index',compact('ministries','user','locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'address' => 'required',
            'location_id' => 'required',
           
        ]);

        Ministry::create($request->all());

        return redirect(route('ministry.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=Auth::user();
        $ministries=Ministry::where('id',$id)->first();
        $locations=Location::orderBy('name','asc')->get();

        return view('admin.ministry.edit',compact('ministries','user','locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'address' => 'required',
            'location_id' => 'required',
           
        ]);

        $ministry = Ministry::find($id);
        $ministry->name = $request->name;
        $ministry->address = $request->address;
        $ministry->location_id = $request->location_id;
       
        $ministry->save();

        return redirect(route('ministry.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ministries = Ministry::where('id', $id)->delete();
        return redirect()->back();
    }
}
