@extends('admin.layouts.master')

    @section('title')

         Clients

    @endsection

@section('content')
<div class="breadcrumb">
    <h1>Contacts Clients </h1>
    <ul>
        <li><a href="#">Contact </a></li>
        <li>Ajouter </li>
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                        @if ($errors->any())
                                <div class="alert alert-danger">
                                  <ul>
                                      @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                      @endforeach
                                  </ul>
                                </div><br/>
                         @endif
                <div class="card-title mb-3"> Ajouter Nouveau  Clients </div>
                <form method="POST" action="{{route('clients.store')}}" enctype="multipart/form-data">
                    @csrf
                 <div class="row">
                    <div class="col-md-6 form-group mb-3">
                        <label for="lastName1">Type Contact :</label>
                        <select name="type_compte"  class="form-control">
                            <option value="societe">Société</option>
                            <option value="clients">Clients</option>
                        </select>
                    </div>

            <div class="col-md-6 form-group mb-3">
                <label for="">Verifier la societe : </label>
                <label class="radio radio-success">
                    <input type="radio" name="radio"  onclick="show1();" checked/><span>Non</span><span class="checkmark"></span>
                </label>
                <label class="radio radio-success">
                    <input type="radio" name="radio"   onclick="show2();" /><span>oui</span><span class="checkmark"></span>
                </label>
            </div>

        <div id="div1" class="col-md-6 form-group mb-3  hide">
                <iframe  src="https://simpl-recherche.tax.gov.ma/RechercheEntreprise/result" title="API ICE"
                    style="width:100%;height:100%;"
                >
                </iframe>
        </div>
        <div class="col-md-6 form-group mb-3">
             <label for="">Nom Clients :</label>
             <input class="form-control"  name="nom_cl" type="text"  placeholder="name clients"/>
        </div>
        <div class="col-md-6 form-group mb-3">
            <label for="">Raison Social : </label>
            <input class="form-control"   name="raison_social" type="text"  placeholder=""/>
        </div>
         <div class="col-md-6 form-group mb-3">
            <label for="">Telephone : </label>
            <input class="form-control" id=""  name="tele" type="tele"  placeholder="06xxx"/>
         </div>
        <div class="col-md-6 form-group mb-3">
            <label for="">Email :</label>
            <input class="form-control" id="credit1"  name="email"  type="email" placeholder="Email"/>
        </div>
        <div class="col-md-6 form-group mb-3">
            <label for="">ICE :</label>
            <input class="form-control" id="credit1"  name="ICE"  type="text" placeholder="ICE"/>
        </div>
        <div class="col-md-6 form-group mb-3">
            <label for="">Secteur Activite :</label>
            <input class="form-control" id="credit1"  name="secteur_activite"  type="text" placeholder="activite"/>
        </div>


        <div class="col-md-6 form-group mb-3">
            <label for="">Adresse :</label>
            <input class="form-control" id="credit1"  name="adresse_cl"  type="text" placeholder="Adresse"/>
        </div>
      <div class="col-md-6 form-group mb-3">
            <img src="#" alt=""  id="imge">
             <label for="lastName1">Logo : </label>
            <input class="form-control" type="file" id="file-input" multiple    placeholder="JPEG "   name="photo"/>
            <div id="thumb-output"></div>

        </div>
        <div class="col-md-6 form-group mb-3">
            <label for="">Nom du Banck  :</label>
            <input class="form-control" id="credit1"  name="nom_banck"  type="text" placeholder="BMC..CIH.."/>
        </div>
        <div class="col-md-6 form-group mb-3">
            <label for="">Numero Compte  :</label>
            <input class="form-control" id="credit1"  name="num_compte"  type="text" placeholder="BMC..CIH.."/>
        </div>






        <div class="col-md-12">
             <button class="btn btn-primary"><i class="fas fa-plus"></i> Ajouter </button>
            </div>
        </div>
     </form>

         </div>
             </div>
         </div>
        </div>


                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
                <script type="text/javascript">

                $(document).ready(function(){
                    $('#file-input').on('change', function(){ //on file input change
                        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                        {
                            $('#thumb-output').html(''); //clear html of output element
                            var data = $(this)[0].files; //this file data

                            $.each(data, function(index, file){ //loop though each file
                                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                                    var fRead = new FileReader(); //new filereader
                                    fRead.onload = (function(file){ //trigger function on successful read
                                    return function(e) {
                                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element
                                        $('#thumb-output').append(img); //append image to output element
                                    };
                                      })(file);
                                    fRead.readAsDataURL(file); //URL representing the file's data.
                                }
                            });

                        }else{
                            alert("Your browser doesn't support File API!"); //if File API is absent
                        }
                    });
                });


                </script>
                <style>
                .thumb{
                    margin: 10px 5px 0 0;
                    width: 100px;
                }

 .hide {
  display: none;
}
                </style>


<script>
function show1() {
  document.getElementById("div1").style.display = "none";
}
function show2() {
  document.getElementById("div1").style.display = "block";
}


</script>



@endsection
