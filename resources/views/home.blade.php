@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<style>
body {
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica,
    Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    
}



.main-container {
  padding: 30px;
}

/* HEADING */

.heading {
  text-align: center;
}

.heading__title {
  font-weight: 600;
}

.heading__credits {
  margin: 10px 0px;
  color: #888888;
  font-size: 25px;
  transition: all 0.5s;
}

.heading__link {
  text-decoration: none;
}

.heading__credits .heading__link {
  color: inherit;
}

/* CARDS */

.cards {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

.card {
  margin: 20px;
  padding: 20px;
  width: 500px;
  min-height: 200px;
  display: grid;
  grid-template-rows: 20px 50px 1fr 50px;
  border-radius: 10px;
  box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.25);
  transition: all 0.2s;
}

.card:hover {
  box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.4);
  transform: scale(1.01);
}

.card__link,
.card__exit,
.card__icon {
  position: relative;
  text-decoration: none;
  color: rgba(255, 255, 255, 0.9);
}

.card__link::after {
  position: absolute;
  top: 25px;
  left: 0;
  content: "";
  width: 0%;
  height: 3px;
  background-color: rgba(255, 255, 255, 0.6);
  transition: all 0.5s;
}

.card__link:hover::after {
  width: 100%;
}

.card__exit {
  grid-row: 1/2;
  justify-self: end;
}

.card__icon {
  grid-row: 2/3;
  font-size: 30px;
}

.card__title {
  grid-row: 3/4;
  font-weight: 400;
  color: #ffffff;
}

.card__apply {
  grid-row: 4/5;
  align-self: center;
}

/* CARD BACKGROUNDS */

.card-1 {
  background: radial-gradient(#1fe4f5, #3fbafe);
}

.card-2 {
  background: radial-gradient(#fbc1cc, #fa99b2);
}

.card-3 {
  background: radial-gradient(#76b2fe, #b69efe);
}

.card-4 {
  background: radial-gradient(#60efbc, #58d5c9);
}

.card-5 {
  background: radial-gradient(#f588d8, #c0a3e5);
}

/* RESPONSIVE */

@media (max-width: 1600px) {
  .cards {
    justify-content: center;
  }
}



</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
                    <div id="app2" >
                        
                        
                    <div   v-for="equipe in equipes" >
                        <div class=" card card-1" >
                            <div class="card__icon"><i class="fas fa-users "></i></div>
                            <p class="card__exit" v-on:click="Quitter(equipe.id)"><i class="fas fa-times"></i></p>

                            <h2 class="card__title">@{{equipe.name}}</h2>
                            <p class="card__apply">
                                <a class="card__link"  data-bs-toggle="modal" data-bs-target="#addmembre" 
                                v-on:click="AddMemebre(equipe.id)">Ajouter un membre <i class="fas fa-arrow-right"></i></a>
                            </p>

                            <p class="" style="align-self: center;display: flex;">
                                <a  class="btn btn-lg btn-block btn-success" >Lancer une partie <i class="fas fa-gamepad"></i></a>
                            </p>

                          </div>
                          
                        </div>


                    </div>
                
           
        </div>
        
        
    </div>
   
</div>


<!-- Modal -->
<div class="modal fade" id="addmembre" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un membre</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
                <div class="modal-body">
                    <div class="container">


                    
                        
                          <ul id="v-for-object" class="list-group list-group-numbered">
                            
                            <li    v-for="value in users"  class=" list-group-item d-flex justify-content-between align-items-start">
                              <div  class="ms-2 me-auto">
                                <div class="fw-bold">@{{value.name}} </div>
                                
                                @{{value.email}} 
                              </div>
                              

                              <a  v-on:click="addusers(value.id,value.email)" class="btn btn-outline-info" > <span class="fas fa-add"></span></a>
                              
                            </li>
                          </ul>
                        
                        

                        

                         


                    </div>
                </div>
      
    </div>
  </div>
</div>

<div class="modal fade" id="addgroupe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{URL('/add-group')}}">
          {{csrf_field()}}
      <div class="modal-content">
          
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter un groupe</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                      <div class="container">
                      
                          <div class="form-group">
                              <label for="name" class="col-md-12 control-label">Créateur :</label>
                              <div class="col-md-12">
                              <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><span class="fas fa-user"></span></span>
                                <select name="Createur"  class="form-control" id="Createur" readonly></select>
                              </div>
                              </div>
                          </div>
                      
                          <div class="form-group">
                              <label for="name" class="col-md-12 control-label">Nom d'équipe :</label>
                              <div class="col-md-12">
                              <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><span class="fas fa-flag"></span></span>
                                <input id="Nom" type="text" class="form-control" placeholder="name :"
                                              name="name_groupe" required autofocus>
                              </div>
                                  
                              </div>
                          </div>

                          

    

                      </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Fermer</button>
            <button type="submit" id="add" class="addcopro btn btn-primary">Enregistrer</button>
            </div>
      </div>
    </form>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
  


</script>
<script>
    const id = $("#userName").val()
    new Vue({
      el: "#app2",
      data() {
        return {
            equipes: []
        }
      },
      mounted:function(){
        this.method1() //method1 will execute at pageload
      },
      methods: {
        method1:function() {
        
       
        axios
          .get('../list-groupes/'+id)
          .then(response => {
            if(response.status == 200) {
              this.equipes = response.data;}
            else{alert("error : "+ response.status);
            }
            
          })
          .catch(function (error) {
            console.log(error);
          })
      },
      AddMemebre(id) {

        returnView(id);
        
        
            
      },

      Quitter(id){
         
        alert("vous voulez vraiment quitter")

      }



    }
     
    });


    function returnView(id){
      
      new Vue({
              el: "#v-for-object",
              data() {
                return {
                    users: []
                }
              },
              mounted:function(){
                 this.GetUsers() //method1 will execute at pageload
              },
              methods: {
                GetUsers:async function() {
                  
                  

                   axios
                    .get('../list-user/'+id)
                    .then(response => {
                      
                      this.users = response.data;
                      console.log(response.data);
                      
                      

                      
                    })
                    .catch(function (error) {
                      console.log(error);
                    })
                  },
                  addusers(User, mail){
                    const GroupID =id;
                    AddNewMembreFunction(User,GroupID, mail)
                  

                }
              }
              
      });
    }
    


    function AddNewMembreFunction(users_id,groupe_id,mail)
    {
    
        
        axios.post("../add-new-membre/userid="+users_id+"/groupeid="+groupe_id)
                    .then(response => {
                      alert("bien ajouté");
                      NotifctationFunc(mail)
            })
                    .catch(function (error) {
                      alert("error");
        });

       
        
        
        

       
    }
    
    var child_process = require('child_process');

    function NotifctationFunc(user_mail)
    {
      const mail = {"to": [
          user_mail
        ],
        "subject": "Adhésion",
        "message": "Vous avez été ajouté dans un groupe merci d'aller sur ce lien : http://localhost:8000/home"};
        
        axios.post("http://localhost:4444/api/v1/mail/send", mail)
                    .then(response => {
                      alert("succes !");
            })
                    .catch(function (error) {
                      alert("error");
        });
    }

    
    
</script>
@endsection
