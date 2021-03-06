@extends('admin.layouts.master')

    @section('title')

        Tableau de bord

    @endsection

@section('content')
<div class="main-content">
    <div class="breadcrumb">
        <h1 class="mr-2">Tableau d'Borad</h1>
        <ul>
            <li><a href="#">Adminstration</a></li>
            <li>Employer</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div class="row">
        <!-- no 13 chart-->
        <div class="col-md-3 col-lg-3">
            <div class="card mb-4 o-hidden">
                <div class="card-body">
                    <div class="ul-widget__row-v2">
                        <div id="chart13"></div>
                        <div class="ul-widget__content-v2">
                            <h4 class="heading mt-3">698 212</h4><small class="text-muted m-0">50% Average</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- no 14 chart-->
        <div class="col-md-3 col-lg-3">
            <div class="card mb-4 o-hidden">
                <div class="card-body">
                    <div class="ul-widget__row-v2">
                        <div id="chart14"></div>
                        <div class="ul-widget__content-v2">
                            <h4 class="heading mt-3">369 212</h4><small class="text-muted m-0">24% Average</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- no 15 chart-->
        <div class="col-md-3 col-lg-3">
            <div class="card mb-4 o-hidden">
                <div class="card-body">
                    <div class="ul-widget__row-v2">
                        <div id="chart15"></div>
                        <div class="ul-widget__content-v2">
                            <h4 class="heading mt-3">369 212</h4><small class="text-muted m-0">24% Average</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- no 16 chart-->
        <div class="col-md-3 col-lg-3">
            <div class="card mb-4 o-hidden">
                <div class="card-body">
                    <div class="ul-widget__row-v2">
                        <div id="chart16"></div>
                        <div class="ul-widget__content-v2">
                            <h4 class="heading mt-3">369 212</h4><small class="text-muted m-0">24% Average</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- left-side-->

        <!-- right-side-->

                        <!-- -->
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end of main-content -->


@endsection
