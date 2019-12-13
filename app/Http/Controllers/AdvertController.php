<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Category;
use App\Ministry;
use Illuminate\Http\Request;

use Image;

use Auth;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        $categories=Category::orderBy('name','asc')->get();
        $ministries=Ministry::orderBy('name','asc')->get();
        $adverts=Advert::orderBy('created_at','desc')->get();

        return view('admin.advert.index',compact('adverts','user','categories','ministries'));
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
        $formInput=$request->except('advertimage');
        $this->validate($request, [
            'category_id' => 'required',
            'ministry_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'proposedamount' => 'required',
            'advertimage'=>'required|image|mimes:png,jpg,jpeg|max:10000',
        ]);

        if ($request->hasFile('advertimage')) {
            $image=$request->file('advertimage');
            $imageName=time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(600,600)->save(public_path('advert_images/'.$imageName));

            $formInput['advertimage']=$imageName;
        }

        $advert=new Advert;
        $advert->advertnumber=$request->advertnumber;
        $advert->category_id=$request->category_id;
        $advert->ministry_id=$request->ministry_id;
        $advert->user_id=$request->user_id;
        $advert->title=$request->title;
        $advert->description=$request->description;
        $advert->proposedamount=$request->proposedamount;
        $advert->advertimage=$formInput['advertimage'];

        $advert->save();

        return redirect()->route('advert.index');


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
