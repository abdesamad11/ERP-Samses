@extends('admin.layouts.master')

    @section('title')

            Employer

    @endsection

@section('content')



<div class="breadcrumb">
    <h1>Gestion RH </h1>
    <ul>
        <li><a href="#">Employer</a></li>
        <li>Voir </li>
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                        @include('admin.layouts.message')
@if(session('sucess_message'))

<div class="alert alert-success" role="alert">
  <h4 class="alert-heading"></h4>

  {{session('success_message')}}

  <p></p>
  <p class="mb-0"></p>
</div>

@endif

                <div class="card-title mb-3">Details sur l'employers </div>
                 <div class="row">
                     <div class="col-md-6 form-group mb-3">
                <label for="firstName1">Nom et prenom Complete</label>
                <input class="form-control" id="prenom et nom " type="text" name="nom" value="{{ $employer->nom }}" disabled/>
                </div>

                <div class="col-md-6 form-group mb-3">
                <label for="exampleInputEmail1">Email </label>
                 <input class="form-control" id="exampleInputEmail1" type="email" value="{{ $employer->email }}" name="email" disabled/>
                        </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="phone">Telephone</label>
                            <input class="form-control" id="phone" value="{{ $employer->tele }}"  name="tele" disabled/>
                                </div>

                    <div class="col-md-6 form-group mb-3">
                         <label for="lastName1">Adresse Complete </label>
                      <input class="form-control" id="lastName1" type="text" name="adresse" value="{{ $employer->adresse }}" disabled/>
                     </div>


                    <div class="col-md-6 form-group mb-3">
                        <label for="lastName1">CIN </label>
                     <input class="form-control" id="lastName1" type="text" name="cin" value="{{ $employer->cin }}" disabled/>
                    </div>

                     <div class="col-md-6 form-group mb-3">
                        <label for="lastName1">Experience </label>
                     <input class="form-control" id="lastName1" type="text" name="experiecne"  value="{{ $employer->experiecne }}" disabled/>
                    </div>

                    <div class="col-md-6 form-group mb-3">
                        <label for="lastName1">Date Embouche </label>
                     <input class="form-control" id="lastName1" type="date" name="date_embouche" value="{{ $employer->date_embouche }}"  disabled/>
                    </div>

                    <div class="col-md-6 form-group mb-3">

                        <label for="lastName1">Photo  </label>
                        <img src="{{ URL('uploads').'/'.$employer->photo }}" alt="{{$employer->photo}}"   style="width:60px;"/>
                        <div id="thumb-output"></div>

                    </div>

                    <div class="col-md-6 form-group mb-3">
                        <label for="lastName1">Salaire  </label>
                     <input class="form-control" id="lastName1" type="text" name="salaire" value="{{ $employer->salaire }}"  disabled/>
                    </div>

                    <div class="col-md-6 form-group mb-3">
                        <label for="lastName1">Conger  </label>'
                        <input type="text" name="conger" class="form-control" value="{{ $employer->conger }}"  disabled>
                    </div>
                    <div class="col-md-6 form-group mb-3">
                                    <label for="credit1">RIB </label>
                     <input class="form-control" id="credit1" name="RIB" value="{{ $employer->RIB }}"  disabled/>
                                </div>
                                <div class="col-md-6 form-group mb-2">
                                    <label for="credit1">Ville  </label>
                            <input class="form-control"   name="ville" value="{{ $employer->ville }}"  disabled/>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="">Affectation</label>
                                    <input class="form-control" id=""  name="affectation" value="{{ $employer->affectation }}"  disabled/>
                                </div>

                            </div>



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
