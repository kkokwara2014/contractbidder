<?php

namespace App\Http\Controllers;

use App\Bidding;
use Auth;
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
        $user=Auth::user();
        $biddings=Bidding::orderBy('created_at','desc')->get();

        return view('admin.bidding.index',compact('biddings','user'));
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

    public function activate($id)
    {
            $bidding = Bidding::find($id);
            $bidding->isawarded = '1';
            $bidding->save();
    
            return redirect(route('bidding.index'));
        
    }
    public function deactivate($id)
    {
        
            $bidding = Bidding::find($id);
            $bidding->isawarded = '0';
            $bidding->save();
    
            return redirect(route('bidding.index'));
        
    }
}
