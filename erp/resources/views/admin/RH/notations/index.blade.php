@extends('admin.layouts.master')

    @section('title')

       Notation


    @endsection

@section('content')

    <h1 class="text-center">liste des Demandes Notes   </h1>

    <div class="row">
       <div class="col-md">
           <div class="card o-hidden mb-4">
               <div class="card-header d-flex align-items-center">
                   <h3 class="w-50 float-left card-title m-0">Ajouter  Nouveau note  </h3>



                   <div class="dropdown dropleft text-right w-50 float-right">
                    <button class="btn bg-gray-100" id="dropdownMenuButton_table1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="nav-icon i-Gear-2"></i>
                      </button>
             <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_table1">
             <a href="{{ route('notations.create') }}" class="dropdown-item" ><i class="fas fa-sticky-note    "></i>  Ajouter Notes    </a>
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
                                   <th scope="col">organisation</th>
                                   <th scope="col">depalcement</th>
                                   <th scope="col">integration</th>
                                   <th scope="col">missions</th>
                                   <th scope="col">Etat</th>
                                   <th scope="col">Action</th>
                               </tr>
                           </thead>

                           <tbody>
                            @foreach ($evaluation as $item)

                            <tr>
                             <th scope="row">{{$item->id}}</th>
                             <th scope="row">{{$item->employer->nom}}</th>
                                <td>{{$item->organisation}}/10</td>
                                <td>{{$item->depalcement}}/10</td>
                                <td>{{$item->integration}}/10</td>
                                <td>{{$item->missions}}/10</td>
                                <td>


                        @if($item->etat==1)


                        <span class="badge badge-success">Accepter</span>


                        @else


                        <span class="badge badge-warning">attande</span>
                        @endif

                                </td>
                    <td>

                        @if($item->etat==1)

                        <form method="POST"  action="{{route('notations.etat',$item->id )}}">
                            @csrf

                            <button  class="btn btn-danger btn-sm m-1" type="submit"><i class="fas fa-ban"></i></button>

                        </form>


                         @else

                         <form method="POST"  action="{{route('notations.etat',$item->id )}}">
                            @csrf

                            <button  class="btn btn-success btn-sm m-1" type="submit"><i class="fas fa-chevron-circle-down"></i></button>

                        </form>



                        @endif



            <a  href="{{route('notations.edit',$item->id )}}" class="btn btn-success btn-sm m-1" type="submit" alt="modifier"> <i class="fas fa-sticky-note    "></i> </a>


             <a  href="{{ route('notations.show',$item->id) }}" class="btn btn-info btn-sm m-1"   alt="archive">  <i class="fas fa-eye "></i></a>


                 <form method="POST"  action="{{route('notations.destroy',$item->id)}}">
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
