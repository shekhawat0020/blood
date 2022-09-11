@extends('layouts.app')

@section('style')
<style>


</style>

@endsection

@section('content')
<div class="container-xxl">
    <div class="row justify-content-center">
        


        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><i class="fa fa-user"></i> {{ __('Users') }}</div>

                <div class="card-body">
                    
                <div class="row">
                    <div class="col-sm-12">
                    <form class="submitForm" action="{{route('user-add')}}" method="post">
                        @csrf
                        <div class="form-group col-sm-6">
                            <label>Username *</label>
                            <input name="username" id ="username" type="text" class="form-control">
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Email *</label>
                            <input name="email" id ="email" type="text" class="form-control">
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Password *</label>
                            <input name="password" id ="password" type="text" class="form-control">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="exampleInputEmail1">Role *</label>
                            <select name="role" id ="role" class="form-control" >
                                <option value="">Select one</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-primary submitbutton" type="submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing..." data-rest-text="Add User">Add User</button>
                        </div>

                    </form>

                        
                </div>
</div>
<br/>
<div class="row">
    <div class="col-sm-12">
    <table class="table table-bordered data-table" id="user-table">
        <thead>
            <tr>
            
            <th scope="col">UserName</th>
            <th scope="col">Email</th>
           <!-- <th scope="col">Role</th> -->
            <th scope="col">Status</th>
            <th scope="col">Action</th>
            </tr>
        </thead>  
        </tbody>
        </table>

    </div>
</div>

                    
                </div>
            </div>
        </div>
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
</div>
</div>

<!--End  Modal -->

@endsection


@section('script')
<script>
 
 $(document).on('submit', '.submitForm', function(event){
  event.preventDefault();
 
  $form = $(this); 
 

  buttonLoading('loading', $form.find('.submitbutton'));
  $('.is-invalid').removeClass('is-invalid state-invalid');
  $('.invalid-feedback').remove();
  $.ajax({
      url: $form.attr('action'),
      type: "POST",
      processData: false,  // Important!
      contentType: false,
      cache: false,
      data: new FormData($form[0]),
      success: function(data) {
          if(data.status){
            $('.data-table').DataTable().ajax.reload();
            if(data.msg != ''){
              successMsg('Success', data.msg); 
            } 
            if(data.resetform){
                $form[0].reset();
            }
           

          }else{
              $.each(data.errors, function(fieldName, field){
                  $.each(field, function(index, msg){
                     $form.find('#'+fieldName).addClass('is-invalid state-invalid');
                      errorDiv = $form.find('#'+fieldName).parent('div');
                      errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                  });
              });
            errorMsg('Error', 'Input Error');
          }
          buttonLoading('reset', $form.find('.submitbutton'));

      },
      error: function() {
          errorMsg('Server Error', 'There has been an error, please alert us immediately');
          buttonLoading('reset', $form.find('.submitbutton'));
      }

  });

});


$(function() {
    $('#user-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('user-list') !!}',
        columns: [
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action' }
        ]
    });
});


$(document).on('click', '.loadmodal', function(){
  url = $(this).data('url');

  $.ajax({
      url: url,
      type: "GET",
      processData: false,  // Important!
      contentType: false,
      cache: false,
      success: function(data) {
          if(data.status){
            $('#formModal').modal('show');
            $('#formModal').find('.modal-dialog').html(data.modalData);

          }else{
              
            errorMsg('Error', data.msg);
          }
         

      },
      error: function() {
          errorMsg('Server Error', 'There has been an error, please alert us immediately');
         
      }

  });

});


</script>


@endsection
