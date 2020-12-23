@extends('admin.layouts.master')

    @section('title')

        Produits

    @endsection

@section('content')


<div class="breadcrumb">
    <h1>GP ET GS </h1>
    <ul>
        <li><a href="#">Produit</a></li>
        <li>Modifier </li>
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

                <div class="card-title mb-3"> Modifier Produit</div>
                <form method="POST" action="{{ route('produit.update', $produits->id ) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                 <div class="row">
            <div class="col-md-6 form-group mb-3">
                <label > Code Refence   :</label>
                <input class="form-control"  type="text" name="reference_prod" placeholder="PH5412699"  value="{{$produits->reference_prod}}"/>
            </div>
            <div class="col-md-6 form-group mb-3">
                <label for="phone">Name : </label>
                 <input class="form-control"   name="name" type="text"  placeholder="Name de produit"   value="{{$produits->name}}"/>
                </div>
             <div class="col-md-6 form-group mb-3">
            <label for="lastName1">Categorie :</label>
            <select name="cat_id" id="" class="form-control">
                @foreach($categories as $item)
                     <option value="{{$item->id}}" selected>
                          {{$item->nom_cat}}
                     </option>

                @endforeach
            </select>
            </div>
                <div class="col-md-6 form-group mb-3">
             <label for="exampleInputEmail1">Desgination :</label>

             <textarea name="designation" id="" cols="30" rows="10" class="form-control">
                {{$produits->designation}}
            </textarea>
                </div>
                     <div class="col-md-6 form-group mb-3">
                <label >Prix achat : </label>
                <input class="form-control" id="phone"  name="prix_ht_achat" type="text" value="{{$produits->prix_ht_achat}}"/>
                     </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="credit1">Prix vente :</label>
                     <input class="form-control" id="credit1"  name="prix_ht_vente"  type="text" value="{{$produits->prix_ht_vente}}"/>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                 <label for="credit1">Unite : </label>
                           <select name="unite" id="" class="form-control" >
                            <option selected>{{$produits->unite}}</option>
                            <option> m </option>
                            <option> km </option>
                            <option>kg </option>
                            <option>L </option>
                            <option>ml </option>
                            <option>cm </option>
                            <option>U</option>
                           </select>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="">Quantite stock :</label>
                                    <input class="form-control" id="" value="{{$produits->quantite_init}}"  name="quantite_init" type="number"/>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="">Date entree :</label>
                                    <input class="form-control" id=""  value="{{$produits->date_entree}}"  name="date_entree" type="date"/>
                                </div>

                            <div class="col-md-6 form-group mb-3">

                                <label for="lastName1">Image Produit :  </label>
                                <img src="{{ URL('uploads').'/'.$produits->photo_prod }}" alt="{{$produits->photo_prod}}"   style="width:60px;"/>
                                <input class="form-control" type="file" id="file-input" multiple  name="photo"/>
                                <div id="thumb-output"></div>

                            </div>


                                <div class="col-md-12">
                                    <button class="btn btn-success">  <i class="fas fa-edit    "></i>  Modifier</button>
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
