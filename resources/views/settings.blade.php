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
                <div class="card-header"><i class="fa fa-money"></i> {{ __('Price Managment') }}</div>

                <div class="card-body">
                    
                <form class="submitForm" action="{{route('settings-price-update')}}" method="post">
                  @csrf
                  <div class="form-group col-sm-12">
                      <label for="exampleInputEmail1">Component Price</label>
                      <table class="table table-bordered">
                          <tr>
                              <th>PRBC</th>
                              <th>FFP</th>
                              <th>RDP</th>
                              <th>SDP</th>
                              <th>Other</th>
                          </tr>
                          <tr>
                              <td><input type="number" name="PRBC" id="PRBC" min="0" value="{{$config->PRBC_price}}" class="form-control"></td>
                              <td><input type="number" name="FFP" id="FFP" min="0" value="{{$config->FFP_price}}" class="form-control"></td>
                              <td><input type="number" name="RDP" id="RDP" min="0" value="{{$config->RDP_price}}" class="form-control"></td>
                              <td><input type="number" name="SDP" id="SDP" min="0" value="{{$config->SDP_price}}" class="form-control"></td>
                              <td><input type="number" name="Other" id="Other" min="0" value="{{$config->Other_price}}" class="form-control"></td>
                          </tr>
                      </table>

                     
                      
                  </div>
                  
                  <div class="modal-footer">
                    <button class="btn btn-primary submitbutton" type="submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing..." data-rest-text="Update">Update</button>
                  </div>
                </form>

                    
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><i class="fa fa-key"></i> {{ __('Update Password') }}</div>

                <div class="card-body">
                    
                <form class="submitForm" action="{{route('settings-password-update')}}" method="post">
                  @csrf
                  <div class="form-group col-sm-12">
                     
                  <div class="form-group col-sm-6">
                    <label for="exampleInputEmail1">Old Password *</label>
                    <input type="number" name="old_password" id="old_password" class="form-control"  >
                  </div>

                  <div class="form-group col-sm-6">
                    <label for="exampleInputEmail1">New Password *</label>
                    <input type="number" name="password" id="password" class="form-control"  >
                  </div>

                  <div class="form-group col-sm-6">
                    <label for="exampleInputEmail1">Confirm New Password *</label>
                    <input type="number" name="password_confirmation" id="password_confirmation" class="form-control"  >
                  </div>
                      
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-primary submitbutton" type="submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing..." data-rest-text="Update">Update</button>
                  </div>
                </form>

                    
                </div>
            </div>
        </div>
    </div>

    
   


    
</div>




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
            
            if(data.msg != ''){
              successMsg('Success', data.msg); 
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


</script>


@endsection
