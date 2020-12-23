@extends('admin.layouts.master')

    @section('title')

            Parameter Societe

    @endsection

@section('content')
<div class="breadcrumb">
    <h1>Parametrage Societe </h1>
    <ul>
        <li><a href="#">Info </a></li>
        <li>Ajouter </li>
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-4">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                            </div><br/>
                            @endif
                <div class="card-body">
                <div class="card-title mb-3"></div>
                <form method="POST" action="{{ route('parameter.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                         <div class="col-md-3 form-group mb-3">
                            <label for="firstName1">Raison sociale</label>
                            <input class="form-control"  type="text" placeholder="Enter your Raison Social" name="raison_sociale"/>
                        </div>
                        <div class="col-md-3 form-group mb-3">
                            <label for="firstName1">Nom societe</label>
                            <input class="form-control" id="firstName1" type="text" placeholder="Enter your nom societe" name="nom_societe"/>
                        </div>
                        <div class="col-md-3 form-group mb-3">
                             <label for="firstName1">RC societe</label>
                             <input class="form-control" id="firstName1" type="text" placeholder="Enter your RC" name="RC_soc"/>
                        </div>
                        <div class="col-md-3 form-group mb-3">
                            <label for="firstName1">IF societe  </label>
                            <input class="form-control" id="firstName1" type="text" placeholder="Enter your IF" name="IF_soc"/>
                         </div>
                        <div class="col-md-3 form-group mb-3">
                             <label for="firstName1">patente societe </label>
                             <input class="form-control" id="firstName1" type="text" placeholder="Enter your Patenet" name="patente_soc" />
                         </div>
                        <div class="col-md-3 form-group mb-3">
                            <label for="firstName1">cnss societe</label>
                            <input class="form-control" id="firstName1" type="text" placeholder="Enter your CNSS" name="cnss_soc" />
                        </div>
                        <div class="col-md-3 form-group mb-3">
                            <label for="firstName1">ICE societe    </label>
                            <input class="form-control" id="firstName1" type="text" placeholder="Enter your ICE" name="ICE_soc" />
                            </div>
                            <div class="col-md-3 form-group mb-3">
                        <label for="firstName1"> capitale societe   </label>
                        <input class="form-control" id="firstName1" type="text" placeholder="Enter your Capitale" name="capitale_soc"/>
                            </div>
                            <div class="col-md-3 form-group mb-3">
                                <label for="firstName1"> taille societe   </label>
                                <input class="form-control" id="firstName1" type="text" placeholder="Enter your Taille " name="taille_soc"/>
                        </div>
                        <div class="col-md-3 form-group mb-3">
                            <label for="firstName1">secteur activite societe   </label>
                            <input class="form-control" id="firstName1" type="text" placeholder="Enter your Secteur " name="secteur_activite_soc" />
                    </div>
                    <div class="col-md-3 form-group mb-3">
                        <label for="firstName1">nom bank societe </label>
                        <input class="form-control" id="firstName1" type="text" placeholder="Enter your Nom Banck : CIH" name="nom_bank_soc"/>
                    </div>
                    <div class="col-md-3 form-group mb-3">
                        <label for="firstName1">RIB societe   </label>
                        <input class="form-control" id="firstName1" type="text" placeholder="Enter your RIB " name="RIB_soc"/>
                    </div>
                    <div class="col-md-3 form-group mb-3">
                        <label for="firstName1">Adresse      </label>
                        <input class="form-control" id="firstName1" type="text" placeholder="Enter your Adresse" name="adresse"/>
                    </div>
                    <div class="col-md-3 form-group mb-3">
                        <label for="firstName1">Email    </label>
                        <input class="form-control" id="firstName1" type="Email" placeholder="Enter your Email" name="email"/>
                    </div>
                    <div class="col-md-3 form-group mb-3">
                        <label for="firstName1">GSM        </label>
                        <input class="form-control" id="firstName1" type="tele" placeholder="Enter your GSM" name="GSM"/>
                    </div>
                    <div class="col-md-3 form-group mb-3">
                        <label for="firstName1">Fax    </label>
                        <input class="form-control" id="firstName1" type="tele" placeholder="Enter your Fax" name="fax"/>
                    </div>
                    <div class="col-md-3 form-group mb-3">
                        <label for="firstName1"> WebSite   </label>
                        <input class="form-control" id="firstName1" type="text" placeholder="Enter your Site web" name="webSite"/>
                    </div>
                    <div class="col-md-3 form-group mb-3">
                        <img src="#" alt=""  id="imge">
                        <label for="lastName1">logo  </label>
                        <input class="form-control" type="file" id="file-input" multiple  name="photo"/>
                        <div id="thumb-output"></div>
                    </div>
                    <div class="col-md-3 form-group mb-3">
                        <label for="firstName1">CP    </label>
                        <input class="form-control" id="firstName1" type="text" placeholder="Enter your CP code postal" name="cp"/>
                    </div>
                    <div class="col-md-3 form-group mb-3">
                        <label for="firstName1">Ville     </label>
                        <input class="form-control" id="firstName1" type="text" placeholder="Enter your Ville " name="ville"/>
                    </div>
                    <div class="col-md-3 form-group mb-3">
                        <label for="firstName1">Pays     </label>
                        <input class="form-control" id="firstName1" type="text" placeholder="Enter your pays" name="pays"/>
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
                   </style>




@endsection
