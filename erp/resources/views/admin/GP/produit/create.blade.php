@extends('admin.layouts.master')

    @section('title')

        Produits

    @endsection

@section('content')


<div class="breadcrumb">
    <h1>GP ET GS </h1>
    <ul>
        <li><a href="#">Produit</a></li>
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
                <div class="card-title mb-3"> Ajouter Nouveau  Produit</div>
                <form method="POST" action="{{route('produit.store')}}" enctype="multipart/form-data">
                    @csrf
                 <div class="row">
            <div class="col-md-6 form-group mb-3">
                <label > Code Refence   :</label>
                <input class="form-control"  type="text" name="reference_prod" placeholder="PH5412699" />
            </div>
             <div class="col-md-6 form-group mb-3">
            <label for="lastName1">Categorie :</label>
            <select name="cat_id"  class="form-control">
            @foreach ($categorie  as $item)
            <option value="{{$item->id}}">{{$item->nom_cat}}</option>
            @endforeach

            </select>
            </div>
            <div class="col-md-6 form-group mb-3">
                <label for="phone">Name : </label>
                 <input class="form-control"   name="name" type="text"  placeholder="Name de produit"/>
                </div>
                <div class="col-md-6 form-group mb-3">
             <label for="exampleInputEmail1">Desgination :</label>
                <textarea name="designation" id="" cols="30" rows="10" class="form-control">
                </textarea>
                </div>
            <div class="col-md-6 form-group mb-3">
             <label for="phone">Poid  : </label>
              <input class="form-control"   name="poid" type="text"  placeholder="0"/>
             </div>
             <div class="col-md-6 form-group mb-3">
                         <label for="phone">Prix achat : </label>
                   <input class="form-control" id="phone"  name="prix_ht_achat" type="text"  placeholder="0.00"/>
                </div>
                      <div class="col-md-6 form-group mb-3">
                                    <label for="credit1">Prix vente :</label>
                     <input class="form-control" id="credit1"  name="prix_ht_vente"  type="text" placeholder="0.00"/>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="credit1">Unite : </label>
                           <select name="Unite" id="" class="form-control">
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
                                    <input class="form-control" id="" placeholder="0"  name="quantite_init" type="number" placeholder="0"/>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="">Date entree :</label>
                                    <input class="form-control" id="" placeholder="2020/02/02 "  name="date_entree" type="date"/>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="">Tva :</label>
                                    <input class="form-control" id="" placeholder="0.00"  name="tva" type="text"/>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="">Emplacement :</label>
                                    <input class="form-control" id="" placeholder="Placement"  name="emplacement" type="text"/>
                                </div>


                    <div class="col-md-6 form-group mb-3">
                        <img src="#" alt=""  id="imge">
                        <label for="lastName1">Photo  </label>
                        <input class="form-control" type="file" id="file-input" multiple    placeholder="JPEG "   name="photo"/>
                        <div id="thumb-output"></div>

                    </div>



                                <div class="col-md-12">
                                    <button class="btn btn-primary"> Ajouter </button>
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
