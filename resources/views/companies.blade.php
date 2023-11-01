@extends('layout')

@section('content')

<div class="content-wrapper">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Add New</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                 <button type="button" class="btn btn-block btn-outline-primary" id="Add-skill">Add Skills</button>
                  </div>
                </div>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                  
                  </div>
                </div>
        </div>

        <H1 id="message"></H1>
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Your Skills</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped" id="my_skill_table">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Task</th>
                      <th>Progress</th>
                      <th style="width: 40px">Lavel</th>
                      <th style="width: 40px">Edit Skill</th>
                      <th style="width: 40px">Remove Skill</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
              </div>
</div>
<!---------------------------------- Add Vehicle Modal ------------------------------------------->
<div class="modal fade" id="Add-skill-form" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">ADD New Skill</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="frm_skill">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label >New Skill</label>
                    <input type="text" class="form-control" placeholder="Enter Skill" name="skill" >
                  </div>
                  <div class="form-group">
                    <label >Progress</label>
                    <input type="text" class="form-control" name="progress" placeholder="Give Marks Out of 100" >
                  </div>
                  <div class="form-group">
                    
                    <label >Lavel</label>
                    <select class="form-control" name="level" placeholder="Choose Type">
                            <option value="Beginner" class="form-control" selected>Beginner</option>
                            <option value="Intermediate" class="form-control" selected>Intermediate</option>
                            <option value="Advance" class="form-control" selected>Advance</option>  
                    </select>
                  </div>                
                  <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-skill-submit" id="frm-skill-submit">Add Skill</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
    </div>
</div>
<!---------------------------------- Update Vehicle Modal ------------------------------------------->
<div class="modal fade" id="update-skill-form" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content my_updt_form">
        <div class="modal-body">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Skill</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <!-- <form id="udt_frm_skill" class="my_updt_form">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label >New Skill</label>
                    <input type="text" class="form-control" placeholder="" name="skill" >
                  </div>
                  <div class="form-group">
                    <label >Progress</label>
                    <input type="text" class="form-control" name="progress" placeholder="Give Marks Out of 100" >
                  </div>
                  <div class="form-group">
                    <label >Lavel</label>
                    <select class="form-control" name="level" placeholder="Choose Type">
                            <option value="Beginner" class="form-control" selected>Beginner</option>
                            <option value="Intermediate" class="form-control" selected>Intermediate</option>
                            <option value="Advance" class="form-control" selected>Advance</option>  
                    </select>
                  </div>                
                  /.card-body -->

                <!-- <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-skill-submit" id="frm-skill-submit">Add Skill</button>
                </div>
              </form>  -->
            </div>
            <!-- /.card -->

        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> -->
      </div>
    </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
  
  $(document).ready(function(){
    //--------Show skill Model form--------------------------//
                                $('#Add-skill').on("click",function(e) {
                                  e.preventDefault();
                                    $('#Add-skill-form').modal('show');
                                });
 
//-----------Add Skill--------------------------//
                        
//--------View Skill--------------------------//
                        $.ajax({
                          type:"GET",
                          url:"/Company.index",
                          success:function(data){
                            // console.log(data);
                             if(data.companie_data.length > 0){
                              for(let i=0;i<data.companie_data.length;i++){
                                $("#my_skill_table").append(`
                                <tr>
                                  <td>`+(i+1)+`</td>
                                  <td>`+(data.companie_data[i]['Name'])+`</td>
                                  <td>
                                    <div class="progress progress-xs">
                                      <div class="progress-bar progress-bar-danger" style="width: `+(data.companie_data[i]['id'])+`%"></div>
                                    </div>
                                  </td>
                                  <td><span class="badge">`+(data.companie_data[i]['Email'])+`</span></td>
                                  <td>                 
                                    <button data-id="`+(data.companie_data[i]['id'])+`" id="update-skill-btn" class="btn btn-block btn-outline-primary bg-blue">Update</button>
                                  </td>
                                  <td>                 
                                    <button data-id="`+(data.companie_data[i]['id'])+`" class="btn btn-block btn-outline-primary bg-danger dlt-skill-btn">Remove</button>
                                  </td>
                                </tr>
                                `);

                              }
                             }
                             else{
                                   $("#my_skill_table").append("<tr><td colspan='4'> No Company Found</td></tr>")
                             }

                          },
                          error:function(err){
                            console.log(err.responseText);
                          }
                        });    
  //------------------delete Skill-----------------//
  

   //------------------------Update skills -------------//
   
    });
    </script>

@endsection