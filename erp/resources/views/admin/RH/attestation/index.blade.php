@extends('admin.layouts.master')

    @section('title')

       Attestations

    @endsection

@section('content')


<h1 class="text-center">Liste des Demande Attestations </h1>

<div class="row">
   <div class="col-md">
       <div class="card o-hidden mb-4">
           <div class="card-header d-flex align-items-center">
               <h3 class="w-50 float-left card-title m-0">Ajouter  Nouveau Attestation  </h3>
               <div class="w-50 float-left">
                    <form action="{{ route('attestation.search') }}" method="post">
                        @csrf
                    <label for="firstName1">Date Demande :</label>
                    <input type="date" name='date_deb'>
                    <label for="firstName1">- jusqu'a -</label>
                    <input type="date" name="date_fin">

                    <input class="btn btn-success ripple m-1" type="submit" value="Rechercher">
                    </form>
                </div>
                <div class="w-50 float-left">
                    <label>liste archive :</label>
                   <a  href="{{ route('attestation.archive') }}" class="btn btn-danger btn-sm m-1" type="submit" style="background-color: #eb4d4b;" ><i class="fas fa-archive"></i></a>
                   <label>all:</label>
                   <a  href="{{ route('attestation.all') }}" class="btn btn-primary btn-sm m-1" type="submit" style="background-color:#95afc0;" ><i class="i-Repeat-2"></i></a>

                </div>




           <div class="dropdown dropleft text-right w-50 float-right">
             <button class="btn bg-gray-100" id="dropdownMenuButton_table1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="nav-icon i-Gear-2"></i>
               </button>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton_table1">
<a href="{{route('attestation.create')}}" class="dropdown-item" ><i class="fas fa-user-plus"></i> Ajouter Attestations</a>
       </div>
           </div>
           </div>
           <div class="card-body">
               <div class="table-responsive">
                   <table class="table dataTable-collapse" id="user_table" >
                       <thead>
                           <tr>
                               <th scope="col">ID</th>
                               <th scope="col">Nom de l'employer</th>
                               <th scope="col">Date Demande</th>
                               <th scope="col">Type Demande</th>
                               <th scope="col">Etat</th>
                               <th scope="col">Action</th>
                           </tr>
                       </thead>

                       <tbody>
                        @foreach ($attestation as $item)

                        <tr>
                         <th scope="row">{{$item->id}}</th>
                         <th scope="row">{{$item->employer->nom}}</th>
                            <td>{{$item->date_dm}}</td>
                            <td>{{$item->type}}</td>
                            <td>
                    @if($item->etat==1)
                    <span class="badge badge-success">Accepter</span>
                     @else
                    <span class="badge badge-warning">attande</span>
                    @endif

                        </td>

                <td>

                 @if($item->etat==1)

                    <form method="POST"  action="{{route('attestation.etat',$item->id )}}">
                        @csrf

                        <button  class="btn btn-danger btn-sm m-1" type="submit"><i class="fas fa-ban"></i></button>

                    </form>


                     @else

                     <form method="POST"  action="{{route('attestation.etat',$item->id )}}">
                        @csrf

                        <button  class="btn btn-success btn-sm m-1" type="submit"><i class="fas fa-chevron-circle-down"></i></button>

                    </form>



                @endif


                @if($item->etat==1)

               <a  href="{{ route('attestation.print',$item->id) }}" class="btn  btn-sm m-1" type="submit" style="background-color:#edc814;"><i class="i-Billing"></i></a>



               <a  href="{{ route('attestation.show',$item->id) }}" class="btn btn-info btn-sm m-1"   alt="archive">  <i class="fas fa-eye "></i></a>


                @else

                <a  class="btn  btn-sm m-1" type="submit" style="background-color:#edc814;
                 cursor: default;
                pointer-events: none;
                text-decoration: none;
                color: grey;
                " ><i class="i-Billing"></i></a>


                <a  href="{{ route('attestation.show',$item->id) }}" class="btn btn-info btn-sm m-1"
                style="
                 cursor: default;
                pointer-events: none;
                text-decoration: none;
                color: grey;
                "

                    alt="archive">  <i class="fas fa-eye "></i></a>

                @endif


















       <a  href="{{route('attestation.edit',$item->id )}}" class="btn btn-success btn-sm m-1" type="submit" alt="modifier"><i class="fas fa-clipboard"></i></a>


                    @if(!$item->deleted_at)

                    <form method="POST"  action="{{route('attestation.destroy',$item->id)}}">
                        @csrf
                        @method('DELETE')

                        <button  class="btn btn-danger btn-sm m-1" type="submit" onclick="return confirm('Voulez-vous vraimment supprimer ?');"><i class="fas fa-trash-alt"></i></button>

                    </form>

                    @else

                    <form method="POST"  action="{{route('attestation.restore',$item->id)}}">
                        @csrf
                        @method('PATCH')

                        <button  class="btn btn-danger btn-sm m-1" type="submit" onclick="return confirm('Voulez-vous vraimment restore   ?');"

                        style="background-color: #eb4d4b;"

                        ><i class="i-Inbox-Out"></i></button>

                    </form>


                    @endif


                </td>

                    </tr>
                        @endforeach
                       </tbody>

                   </table>
               </div>
           </div>
       </div>
   </div>
   <!-- end of col-->
</div>









@endsection
