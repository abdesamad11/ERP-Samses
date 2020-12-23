@extends('admin.layouts.master')

    @section('title')


            Employer


    @endsection

@section('content')

<div class="breadcrumb">
    <h1>Gestion RH </h1>
    <ul>
        <li><a href="#">Employer</a></li>
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

                <div class="card-title mb-3">Nouvelle Employer</div>
                <form method="POST" action="{{route('gemp.store')}}" enctype="multipart/form-data">
                    @csrf
                 <div class="row">
                     <div class="col-md-6 form-group mb-3">
                <label for="firstName1">Nom et prenom Complete</label>
                <input class="form-control" id="prenom et nom " type="text" name="nom" placeholder="Entre le nom complete " />
                </div>

                <div class="col-md-6 form-group mb-3">
                <label for="exampleInputEmail1">Email </label>
                 <input class="form-control" id="exampleInputEmail1" type="email" placeholder="Enter email" name="email" />
                        </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="phone">Telephone</label>
                            <input class="form-control" id="phone" placeholder="+212 6 xxxx"  name="tele"/>
                                </div>

                    <div class="col-md-6 form-group mb-3">
                         <label for="lastName1">Adresse Complete </label>
                      <input class="form-control" id="lastName1" type="text" name="adresse" placeholder="Adresse " />
                     </div>


                    <div class="col-md-6 form-group mb-3">
                        <label for="lastName1">CIN </label>
                     <input class="form-control" id="lastName1" type="text" name="cin" placeholder="CIN carte natonal " />
                    </div>

                     <div class="col-md-6 form-group mb-3">
                        <label for="lastName1">Experience </label>
                     <input class="form-control" id="lastName1" type="text" name="experiecne" placeholder="Expericence " />
                    </div>

                    <div class="col-md-6 form-group mb-3">
                        <label for="">Post :</label>
                        <select class="custom-select" name="service_id" id="">
                            <option selected>Select one</option>
                            @foreach($service as $item)
                                 <option value="{{ $item->id}}">{{ $item->nom }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="col-md-6 form-group mb-3">
                        <label for="lastName1">Date Embouche </label>
                     <input class="form-control" id="lastName1" type="date" name="date_embouche" placeholder="date  " />
                    </div>

                    <div class="col-md-6 form-group mb-3">
                        <img src="#" alt=""  id="imge">
                        <label for="lastName1">Photo  </label>
                        <input class="form-control" type="file" id="file-input" multiple  name="photo"/>
                        <div id="thumb-output"></div>

                    </div>

                    <div class="col-md-6 form-group mb-3">
                        <label for="lastName1">Salaire  </label>
                     <input class="form-control" id="lastName1" type="text" name="salaire" placeholder="Salaire   " />
                    </div>

                    <div class="col-md-6 form-group mb-3">
                        <label for="lastName1">Conger  </label>'
                        <input type="text" name="conger" class="form-control">
                    </div>
                    <div class="col-md-6 form-group mb-3">
                                    <label for="credit1">RIB </label>
                     <input class="form-control" id="credit1" placeholder="RXXX1254" name="RIB"/>
                                </div>
                                <div class="col-md-6 form-group mb-2">
                                    <label for="credit1">Ville  </label>
                            <input class="form-control"  placeholder="Fes" name="ville"/>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="">Affectation</label>
                                    <input class="form-control" id="" placeholder="affectation "  name="affectation"/>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary"> <i class="fas fa-plus"></i> Ajouter</button>
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
