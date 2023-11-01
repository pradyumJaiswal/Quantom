@extends('layout')

@section('content')
<div class="content-wrapper">
<!-- Main content -->
<section class="content">
        @if(session('status'))
            <h4 class="alert-warning"> {{session('status')}}</h4>
        @endif
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3> Add Companies</h3>

                <!-- <p>Companies</p> -->
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ URL::to('Company/create') }}" class="small-box-footer">Click Here<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
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
                      <th style="width: 10px">#</th>
                      <th>Company Name</th>
                      <th>Website</th>
                      <th style="width: 40px">Email</th>
                      <th style="width: 40px">Edit</th>
                      <th style="width: 40px">Remove</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($company as $item)
                  <tr>
                                  <td>{{ $item->id}}</td>
                                  <td>{{ $item->Name}}</td>
                                  <td>{{ $item->Website}}</td>
                                  <td>{{ $item->Email}}</td>
                                  
                                  <td>                 
                                    <a href="{{url('Company/'.$item->id.'/edit')}}"  id="update-skill-btn" class="btn btn-block btn-outline-primary bg-blue">Update</a>
                                  </td>
                                  <td> 
                                    <form action="{{url('Company/'.$item->id)}}" method="post">  
                                      @csrf
                                      @method('DELETE')              
                                    <button class="btn btn-block btn-outline-primary bg-danger dlt-skill-btn">Remove</button>
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
</div>
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Your Skills</h3>
              </div>
              <!-- /.card-header -->
              
</div>
@endsection