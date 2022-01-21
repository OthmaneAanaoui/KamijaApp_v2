<?php

namespace App\Http\Controllers;

use App\Models\Partie;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input as input;


class PartieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Partie::where("parties.user_id", $id)->Join("groupes","groupes.id","=","parties.groupe_id")->get();
        return Response()->json($data);
    }


    public function getIdFromEmail($UserEmail)
    {
        $getIdFromEmail = User::where("email", $UserEmail)->first();
        
        return Response()->json($getIdFromEmail);
    }


    public function store(Request $request)
    {
        $data = new Partie();
        $data->groupe_id = $request->groupe_id;
        $data->user_id = getIdFromEmail($request->user_mail);
        $data->save();
        return Back();
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partie  $partie
     * @return \Illuminate\Http\Response
     */
    public function show(Partie $partie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partie  $partie
     * @return \Illuminate\Http\Response
     */
    public function edit(Partie $partie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partie  $partie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partie $partie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partie  $partie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partie $partie)
    {
        //
    }
}
