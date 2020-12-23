@extends('admin.layouts.master')

    @section('title')

       Conger

    @endsection

@section('content')
<div class="main-content">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs justify-content-end mb-4" id="myTab" role="tablist">
                <li class="nav-item"><a class="nav-link active" id="invoice-tab" data-toggle="tab" href="#invoice" role="tab" aria-controls="invoice" aria-selected="true">FICHE DE  CONGÉS </a></li>

            </ul>
            <div class="card">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active"  role="tabpanel">



                        <!-- -===== Print Area =======-->
                        @foreach ($conger as $item)

                        <div id="print-area">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Nom de l'employer :</label>
                                    <h1 class="font-weight-bold">{{$item->employer->nom}}</h1>
                                </div>
                                <div class="col-md-6 text-sm-right">
                                       <h4> Date : {{date('Y-m-d H:i:s')}}   </h4>
                                </div>
                            </div>
                            <div class="mt-3 mb-4 border-top"></div>
                            <div class="row mb-5">
                            </div>
                            <div class="row">
                                <div class="col-md-12 table-responsive">
                                    <table class="table table-hover mb-4">
                                        <thead class="bg-gray-300">
                                            <tr>
                                                <th scope="col">Motif</th>
                                                <th scope="col">Dates</th>
                                                <th scope="col">nombre de jours restant  par année</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>

                                                <td>


                                                    <div class="input-group">

                                                        <textarea class="form-control" aria-label="With textarea">
                                                 {{ $item->cause }}
                                                        </textarea>
                                                    </div>


                                                </td>
                                                <td>
                             <h5>{{ $item->date_debut }}</h5><h6><span>à</span></h6><h5> {{ $item->date_fin }}</h5>

                                                </td>

                                                <td>

                                               <h5> {{ ($item->employer->conger)-($item->restjr) }} <span>Jrous</span>
                                            </h5>
                                                </td>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-12">
                                    <div class="invoice-summary">

                                           <table class="table mb-2">
                                               <thead>
                                                   <tr>
                                                       <td scope="col">Signature du collaborateur</td>
                                                       <td scope="col">Signature du responsable hiérarchique</td>

                                                   </tr>
                                               </thead>
                                               <tbody>
                                                   <tr>
                                                       <td scope="row">------------------------------- </td>
                                                       <td>------------------------------------------ -----------</td>

                                                   </tr>

                                               </tbody>
                                           </table>





                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- ==== / Print Area =====-->


                    </div>
                    <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">

                    </div>
                    <div class="d-sm-flex mb-5"><span class="m-auto"></span>
                        <a  href="{{ route('conger.pdfview',$item->id) }}"  class="btn btn-primary mb-sm-0 mb-3"><i class="fas fa-print"></i> Imprimer Ficher</a>
                                 </div>

                </div>
                @endforeach
            </div>



        </div>
    </div><!-- end of main-content -->


@endsection
