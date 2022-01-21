<?php

namespace App\Http\Controllers;

use App\Models\Lobie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input as input;


class LobbieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        
        $data = Lobie::where("lobies.user_id", $id)->Join("groupes","groupes.id","=","lobies.groupe_id")->get();
        return Response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIdFromEmail($UserEmail)
    {
        $getIdFromEmail = User::where("email", $UserEmail)->first();
        
        return Response()->json($getIdFromEmail);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Lobie();
        $data->groupe_id = $request->groupe_id;
        $data->user_id = getIdFromEmail($request->user_mail);
        $data->save();
        return Back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lobbie  $lobbie
     * @return \Illuminate\Http\Response
     */
    public function show(Lobbie $lobbie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lobbie  $lobbie
     * @return \Illuminate\Http\Response
     */
    public function edit(Lobbie $lobbie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lobbie  $lobbie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lobbie $lobbie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lobbie  $lobbie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lobbie $lobbie)
    {
        //
    }
}
