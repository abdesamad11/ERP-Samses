@extends('admin.layouts.master')

    @section('title')

       Clients

    @endsection

@section('content')

<div class="breadcrumb">
    <h1>GP ET GS </h1>
    <ul>
        <li><a href="#">Clients</a></li>
        <li>Modifier  </li>
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
                <div class="card-title mb-3">Modifier Clients</div>
        <form method="POST" action="{{route('clients.update',$clients->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
               <div class="row">
                    <div class="col-md-6 form-group mb-3">
                        <label for="lastName1">Type Contact :</label>
                        <select name="type_compte"  class="form-control">
                            @if($clients->verifer==0)
                            <option value="fournisseur" selected>Fournisseur</option>
                            <option value="societe" >Société</option>
                            @else
                            <option value="societe" selected>Société</option>
                            <option value="fournisseur" >Fournisseur</option>
                            @endif
                        </select>
                    </div>
        <div class="col-md-6 form-group mb-3">
            <label for="lastName1">Raison Social</label>
           <input class="form-control" id="lastName1" type="text" name="raison_social"  value=" {{$clients->raison_social }}" />
        </div>
         <div class="col-md-6 form-group mb-3">
             <label for="exampleInputEmail1">Email </label>
             <input class="form-control" id="exampleInputEmail1" type="email"  value="{{$clients->email}}" name="email"/>
         </div>
         <div class="col-md-6 form-group mb-3">
            <label for="phone">Numero Tele </label>
            <input class="form-control"  value="{{ $clients->tele }}"  name="tele" type="tel"/>
        </div>
            <div class="col-md-6 form-group mb-3">
                <label for="credit1">Numero Compte  </label>
                <input class="form-control" id="credit1" value="{{$clients->num_compte}}" name="num_compte" type="text"/>
            </div>
            <div class="col-md-6 form-group mb-3">
                 <label for="credit1">ICE </label>
                 <input class="form-control"  value="{{$clients->ICE}}" name="ICE" type="text"/>
            </div>
             <div class="col-md-6 form-group mb-3">
                <label for="credit1">sectur activite  </label>
                <input class="form-control" value="{{$clients->secteur_activite}}"  name="secteur_activite" type="text"/>
            </div>
            <div class="col-md-6 form-group mb-3">
                 <label for="">Adresse</label>
                 <input class="form-control" id="" value="{{$clients->adresse_cl}}"  name="adresse_cl" type="text"/>
             </div>
             <div class="col-md-6 form-group mb-3">

                <label for="lastName1">Logo :  </label>
                <img src="{{ URL('uploads').'/'.$clients->logo }}" alt="{{$clients->logo}}"   style="width:60px;"/>
                <input class="form-control" type="file" id="file-input" multiple  name="photo"/>
                <div id="thumb-output"></div>

            </div>


                                <div class="col-md-12">
                                    <button class="btn btn-success" type="submit">
                                        <i class="fas fa-edit  "></i>
                                            Modifer
                                    </button>
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
