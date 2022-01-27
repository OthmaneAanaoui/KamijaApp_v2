<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Groupe;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input as input;


class EquipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     /**
     * @OA\Get(
     *      path="/list-user/{id}",
     *      operationId="getListUser",
     *      description="API qui permet d'ajouter un membre parmis la liste des utilisateurs qui n'appartiennent pas au groupe",
    *     @OA\Parameter(
    *         description="id du groupe",
    *         in="path",
    *         name="id",
    *         required=true,
    *         @OA\Schema(type="string"),
    *         @OA\Examples(example="int", value="1", summary="An int value."),
    *         @OA\Examples(example="uuid", value="0006faf6-7a61-426c-9034-579f2cfcfa83", summary="An UUID value."),
    *     ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */
    public function index($id)
    {
        $data = Equipe::where("equipes.users_id", $id)->Join("groupes","groupes.id","=","equipes.groupe_id")->get();
        return Response()->json($data);
    }

    public function getIdFromEmail($UserEmail)
    {
        $getIdFromEmail = User::where("email", $UserEmail)->first();
        
        return Response()->json($getIdFromEmail);
    }


    public function store(Request $request, User $user)
    {
        $dataG = new Groupe();
        $dataG->name = $request->name_groupe;
        $dataG->save();
        $data = new Equipe();
        $data->groupe_id = $dataG->id;
        $data->role_id = 1;
        $data->users_id = $request->Createur;
        $data->save();
        return Back();
    }


    public function getListUser($id)
    {
        $data = 'select id,email,name from users where id not in (select users_id from equipes where groupe_id='.$id.')';
        $getResult = \DB::select($data, array());

        return Response()->json($getResult);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function addNewMembre($users_id,$groupe_id)
    {
        $data = new Equipe();
        $data->groupe_id = $groupe_id;
        $data->role_id = 1;
        $data->users_id = $users_id;
        $data->save();
        return Back();

        
    }

    public function addNewMembre2(Request $request)  
    {  
        $data = new Equipe();
        $data->groupe_id = $request->$groupeid;
        $data->role_id = 1;
        $data->users_id = $request->$usersid;
        $data->save();
        return Back();  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipe $equipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipe $equipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipe $equipe)
    {
        //
    }
}
