<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class electionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $election=\App\election::all();
        return view('index',compact('election'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $election= new \App\election;
        $election->name=$request->get('name');
        $election->endereco=$request->get('endereco');
        $election->number=$request->get('number');
        $election->initials=$request->get('initials')
        $election->save();
        
        return redirect('election')->with('success', 'Information has been added');
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
        $election = \App\election::find($id);
        return view('edit',compact('election','id'));
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
        $election= \App\election::find($id);
        $election->name=$request->get('name');
        $election->endereco=$request->get('endereco');
        $election->number=$request->get('number');
        $election->initials=$request->get('initials');
        $election->save();
        return redirect('election');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $election = \App\election::find($id);
        $election->delete();
        return redirect('election')->with('success','Information has been  deleted'
    }
}
