@extends('layout')

@section('content')
<div class="content-wrapper">
<!-- Main content -->
<section class="content">
<!-- @if(session('status'))
            <h4 class="alert-warning"> {{session('status')}}</h4>
        @endif -->
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Add Employees<sup style="font-size: 20px"></sup></h3>

                <!-- <p>Employees</p> -->
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ URL::to('Employee/create') }}" class="small-box-footer">Click Here<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
         
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            
          <!-- ./col -->
        </div>
        <!-- /.row -->
       
        <div class="card-body p-0">
                <table class="table table-striped" id="my_skill_table">
                  <thead>
                    <tr>
                      <th style="width: 10px">Id</th>
                      <th>Employee Name</th>
                      <th>Company</th>
                      <th style="width: 40px">View</th>
                      <!-- <th style="width: 40px">Profile</th> -->
                      <th style="width: 40px">Edit</th>
                      <th style="width: 40px">Remove</th>
                    </tr>
                  </thead>
                  <tbody>
                  <tr>
                  @foreach($employee as $item)
                                  <td>{{ $item->id}}</td>
                                  <td>{{ $item->F_name}} {{ $item->L_name}}</td>
                                  <td>{{ $item->Email}}</td>
                                  <td>
                                  <a href="{{url('Employee/'.$item->id)}}"  id="update-skill-btn" class="btn btn-block btn-outline-primary bg-blue">View</a>
                                  </td>
                                  <td>                 
                                    <a href="{{url('Employee/'.$item->id.'/edit')}}"  id="update-skill-btn" class="btn btn-block btn-outline-primary bg-blue">Update</a>
                                  </td>
                                  <td> 
                                    <form action="{{url('Employee/'.$item->id)}}" method="post">  
                                      @csrf
                                      @method('DELETE')              
                                    <button class="btn btn-block btn-outline-primary bg-danger dlt-skill-btn">Remove</button>
                                  </td>
                                </tr>
                  @endforeach
                               
                  </tbody>
                </table>
              </div>
      </div>

</div>
</div>
</div>
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Your Skills</h3>
              </div>
              <!-- /.card-header -->
              
</div>
@endsection