@extends('adminSide.layouts.admin-dash-layout')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <a  class="btn btn-primary float-right" href={{route('createRecrutement.indexR')}}><i class="fas fa-plus"></i> Cree un Recrutements</a>
            <a  class="btn btn-primary float-right" href={{route('createStage.indexS')}}><i class="fas fa-plus"></i> Cree un Stage</a>
            
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">

                <p>CANDIDATURES</p>
                 <h3>{{$total }}<h3>

              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                  
                  <p>NON RETENUES</p>
                  <h3>{{$refused}}</h3>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                  
                  <p>EN TRAITEMENT</p>
                  <h3>{{$total - $accepted - $refused}}</h3>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                  
                  <p>RETENUES</p>
                  <h3>{{$accepted}}</h3>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
         
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
         
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    
@endsection

