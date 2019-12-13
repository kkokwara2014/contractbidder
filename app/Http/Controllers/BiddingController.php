<?php

namespace App\Http\Controllers;

use App\Bidding;
use Illuminate\Http\Request;

class BiddingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'bidamount' => 'required',
            'quotationfile' => 'required|file|max:5000|mimes:docx,doc,pdf',
        ]);


        if ($request->hasFile('quotationfile')) {
            $filenameWithTime = time() . '_' . $request->quotationfile->getClientOriginalName();
            $filenameToStore = $request->quotationfile->storeAs('public/quotations', $filenameWithTime);
        }

        //    create an instance of Logbook
        $bidding = new Bidding;
        $bidding->advert_id = $request->advert_id;
        $bidding->user_id = $request->user_id;
        $bidding->bidamount = $request->bidamount;
        $bidding->quotationfile = $filenameToStore;

        $bidding->save();

        
        return redirect()->route('index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
