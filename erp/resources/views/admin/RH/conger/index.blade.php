@extends('admin.layouts.master')

    @section('title','Gestion RH')

    @section('content')

    <h1 class="text-center">Liste des Demande Conger  </h1>

    <div class="row">
       <div class="col-md">
           <div class="card o-hidden mb-4">
               <div class="card-header d-flex align-items-center">
                   <h3 class="w-50 float-left card-title m-0">Ajouter  Nouveau Congers </h3>

            <div class="w-50 float-left">
                <form action="{{ route('conger.search')  }}" method="post">
                    @csrf
                <label for="firstName1">Date Conger :</label>
                <input type="date" name='date_deb'>
                <label for="firstName1">- jusqu'a -</label>
                <input type="date" name="date_fin">

                <button class="btn btn-success ripple m-1" type="submit">Afficher</button>
                </form>
            </div>







               <div class="dropdown dropleft text-right w-50 float-right">
                 <button class="btn bg-gray-100" id="dropdownMenuButton_table1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="nav-icon i-Gear-2"></i>
                   </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_table1">
          <a href="{{route('conger.create')}}" class="dropdown-item" ><i class="fas fa-user-plus"></i> Ajouter Congers    </a>
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
                                   <th scope="col">Date debut</th>
                                   <th scope="col">Date Fin</th>
                                   <th scope="col">Etat</th>
                                   <th scope="col">Cause de Conger</th>
                                   <th scope="col">Action</th>
                               </tr>
                           </thead>

                           <tbody>
                            @foreach ($conger as $item)

                            <tr>
                             <th scope="row">{{$item->id}}</th>
                             <th scope="row">{{$item->employer->nom}}</th>
                                <td>{{$item->date_debut}}</td>
                                <td>{{$item->date_fin}}</td>
                                <td>


                        @if($item->etat==1)


                        <span class="badge badge-success">Accepter</span>


                         @else


                        <span class="badge badge-warning">attande</span>
                        @endif

                                </td>
                                <td>{{$item->cause}}</>
                    <td>

                        @if($item->etat==1)

                        <form method="POST"  action="{{route('conger.etat',$item->id )}}">
                            @csrf

                            <button  class="btn btn-danger btn-sm m-1" type="submit"><i class="fas fa-ban"></i></button>

                        </form>


                         @else

                         <form method="POST"  action="{{route('conger.etat',$item->id )}}">
                            @csrf

                            <button  class="btn btn-success btn-sm m-1" type="submit"><i class="fas fa-chevron-circle-down"></i></button>

                        </form>



                        @endif



            <a  href="{{route('conger.edit',$item->id )}}" class="btn btn-success btn-sm m-1" type="submit" alt="modifier"><i class="fas fa-user-edit"></i></a>


             <a  href="{{ route('conger.show',$item->id) }}" class="btn btn-info btn-sm m-1"   alt="archive">  <i class="fas fa-eye "></i></a>


                 <form method="POST"  action="{{route('conger.destroy',$item->id)}}">
                    @csrf
                    @method('DELETE')

                    <button  class="btn btn-danger btn-sm m-1" type="submit" onclick="return confirm('Voulez-vous vraimment supprimer ?');"><i class="fas fa-trash-alt"></i></button>

                    </form>

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

