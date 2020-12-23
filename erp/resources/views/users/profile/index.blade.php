@extends('admin.layouts.master')

    @section('title')

      Profile

    @endsection

@section('content')
<div class="main-content">
    <div class="breadcrumb">
        <h1>Information Profile</h1>
        <ul>
            <li><a href="#">Profile </a></li>
            <li>{{ Auth::user()->name }}</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div class="card user-profile o-hidden mb-4">
        <div class="header-cover" style="background-image: url('../../dist-assets/images/photo-wide-4.jpg')"></div>
        <div class="user-info">
           <img class="profile-picture avatar-lg mb-2" src="../../dist-assets/images/faces/1.jpg" alt="" />
            <p class="m-0 text-24">Timothy Carlson</p>
            <p class="text-muted m-0">Digital Marketer</p>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs profile-nav mb-4" id="profileTab" role="tablist">
                <li class="nav-item"><a class="nav-link active" id="timeline-tab" data-toggle="tab" href="#timeline" role="tab" aria-controls="timeline" aria-selected="false">Timeline</a></li>
                <li class="nav-item"><a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true">About</a></li>
                <li class="nav-item"><a class="nav-link" id="friends-tab" data-toggle="tab" href="#friends" role="tab" aria-controls="friends" aria-selected="false">Friends</a></li>
                <li class="nav-item"><a class="nav-link" id="photos-tab" data-toggle="tab" href="#photos" role="tab" aria-controls="photos" aria-selected="false">Photos</a></li>
            </ul>
            <div class="tab-content" id="profileTabContent">
                <div class="tab-pane fade active show" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">



                </div>
                <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
                    <h4>Personal Information</h4>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, commodi quam! Provident quis voluptate asperiores ullam, quidem odio pariatur. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem, nulla eos?
                        Cum non ex voluptate corporis id asperiores doloribus dignissimos blanditiis iusto qui repellendus deleniti aliquam, vel quae eligendi explicabo.
                    </p>
                    <hr />
                    <div class="row">

                    </div>
                    <hr />
                    <h4>Other Info</h4>
                    <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum dolore labore reiciendis ab quo ducimus reprehenderit natus debitis, provident ad iure sed aut animi dolor incidunt voluptatem. Blanditiis, nobis aut.</p>
                    <div class="row">

                    </div>
                </div>
                <div class="tab-pane fade" id="friends" role="tabpanel" aria-labelledby="friends-tab">

                </div>
                <div class="tab-pane fade" id="photos" role="tabpanel" aria-labelledby="photos-tab">

                </div>
            </div>
        </div>




@endsection
