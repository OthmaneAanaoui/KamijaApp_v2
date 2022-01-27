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
     * @OA\Get(
     *      path="/list-group/{id}",
     *      operationId="getListUser",
     *      @OA\Parameter(
     *          description="Parameter with mutliple examples",
     *          in="path",
     *          name="id",
     *          required=true,
     *          @OA\Schema(type="string"),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json")
     *      ),
     *  )
     */
    public function index($id)
    {
        $data = Equipe::where("equipes.users_id", $id)->Join("groupes","groupes.id","=","equipes.groupe_id")->get();
        return Response()->json($data);
    }

    /**
     * @OA\Get(
     *      path="/user/email",
     *      operationId="getListUser",
     *      description="Get user id by email",
     *      @OA\Parameter(
     *          description="Email adress",
     *          in="query",
     *          name="email",
     *          required=true,
     *          @OA\Schema(type="string"),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json")
     *      ),
     *  )
     */
    public function getIdFromEmail($UserEmail)
    {
        $getIdFromEmail = User::where("email", $UserEmail)->first();

        return Response()->json($getIdFromEmail);
    }


    /**
     * @OA\Post(
     *     path="/add-group/",
     *     operationId="getListUser",
     *     description="Crée un groupe avec le créateur",
     *     @OA\RequestBody(
     *         mediaType="application/json",
     *         @OA\Schema(
     *             @OA\Property(
     *                 property="name_groupe",
     *                 type="string"
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\MediaType(
     *          mediaType="application/json")
     *     ),
     *  )
     */
    public function store(Request $request)
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

   /**
     * @OA\Get(
     *      path="/list-user/",
     *      operationId="getListUser",
     *      description="Get users by id group",
     *      @OA\Parameter(
     *          description="Email adress",
     *          in="query",
     *          name="email",
     *          required=true,
     *          @OA\Schema(type="string"),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json")
     *      ),
     *  )
     */
    public function getListUser($id)
    {
        $data = 'select id,email,name from users where id not in (select users_id from equipes where groupe_id='.$id.')';
        $getResult = \DB::select($data, array());

        return Response()->json($getResult);
    }

   public function addNewMembre($users_id,$groupe_id)
   {
       $data = new Equipe();
       $data->groupe_id = $groupe_id;
       $data->role_id = 1;
       $data->users_id = $users_id;
       $data->save();
       return Back();

   }

    /**
     * @OA\Get(
     *      path="/list-user/",
     *      operationId="getListUser",
     *      description="Get users by id group",
     *      @OA\Parameter(
     *          description="Email adress",
     *          in="query",
     *          name="email",
     *          required=true,
     *          @OA\Schema(type="string"),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json")
     *      ),
     *  )
     */
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
