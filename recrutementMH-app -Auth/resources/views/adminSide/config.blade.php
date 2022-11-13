@extends('adminSide.layouts.admin-dash-layout')

@section('css-script')
<!-- Font Awesome -->
<link rel="stylesheet" href={{asset("plugins/fontawesome-free/css/all.min.css")}}>
@endsection
@section('content')
<div class="content">
<div class="container">
<div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row ">
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
               <div class="card bg-light d-flex flex-fill click-target" data-id="">
                    <div class="card-header text-muted border-bottom-0">
                    </div>
                    <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-7">
                        <h2 class="lead"><b></b></h2>
                        <h2 class="lead idcv" ></h2>
                        {{-- <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p> --}}
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Ville: </li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Telephone#: </li>
                        </ul>
                        </div>
                        <div class="col-5 text-center">
                        <img src="../../dist/img/user1-128x128.jpg" alt="user-avatar" class="img-circle img-fluid">
                        </div>
                    </div>
                    </div>
                    <div class="card-footer">
                    <div class="text-right">
                        <a href="#" class="btn btn-sm bg-teal">
                        <i class="fas fa-comments"></i>
                        </a>
                        <a href="" class="btn btn-sm btn-primary">
                        <i class="fas fa-user"></i> View Profile
                        </a>
                    </div>
                    </div>
                    
                </div>
                </div>
          </div>
        </div>
        </div>
   <!-- /.container-fluid -->
</div>
@endsection