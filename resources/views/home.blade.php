@extends('layouts.app')

@section('style')
<style>

.bloodweget .panel {
  box-shadow: 0 2px 0 rgba(0,0,0,0.05);
  border-radius: 0;
  border: 0;
  margin-bottom: 24px;
}

.bloodweget .panel-dark.panel-colorful {
  background-color: #3b4146;
  border-color: #3b4146;
  color: #fff;
}

.bloodweget .panel-danger.panel-colorful {
  background-color: #f76c51;
  border-color: #f76c51;
  color: #fff;
}

.bloodweget .panel-primary.panel-colorful {
  background-color: #5fa2dd;
  border-color: #5fa2dd;
  color: #fff;
}

.bloodweget .panel-info.panel-colorful {
  background-color: #4ebcda;
  border-color: #4ebcda;
  color: #fff;
}

.bloodweget .panel-body {
  padding: 25px 20px;
}

.bloodweget .panel hr {
  border-color: rgba(0,0,0,0.1);
}

.bloodweget .mar-btm {
  margin-bottom: 15px;
}

.bloodweget h2, .h2 {
  font-size: 28px;
}

.bloodweget .small, small {
  font-size: 85%;
}

.bloodweget .text-sm {
  font-size: .9em;
}

.bloodweget .text-thin {
  font-weight: 300;
}

.bloodweget .text-semibold {
  font-weight: 600;
}


</style>

@endsection

@section('content')
<div class="container-xxl">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><i class="fa fa-heartbeat"></i> {{ __('Blood Stock In Unit') }} <span class="totalstock">({{getTotalStock()}})</span></div>

                <div class="card-body">
                    
                    @include('dashboard-wedget')

                    
                </div>
            </div>
        </div>
    </div>

    <br/>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><i class="fa fa-users"></i>   {{ __('Donors') }} </div>

                <div class="card-body donorsweget">                 
                     @include('dashboard-donors')                    
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><i class="fa fa-credit-card"></i> {{ __('Receipt') }}</div>

                <div class="card-body">                 
                @include('dashboard-receipt')              
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
 
  $(document).on('click','.closemodal', function(){
    
    $('#formModal').modal('hide');
  });

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
            updateStock(data);
            $('.data-table').DataTable().ajax.reload();
            if(data.msg != ''){
              successMsg('Success', data.msg); 
            } 
            if(data.showModal){
              $('#formModal').modal('show');
              $('#formModal').find('.modal-dialog').html(data.modalData);
              
            }else{
              $('#formModal').modal('hide');
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
    $('#donor-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('donor-list') !!}',
        columns: [
            { data: 'donor.name', name: 'donor.name' },
            { data: 'blood_group', name: 'blood_group' },
            { data: 'donor.mobile_no', name: 'donor.mobile_no' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action' }
        ]
    });
});


$(function() {
    $('#receipt-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('receipt-list') !!}',
        columns: [
            { data: 'receipt_no', name: 'receipt_no' },
            { data: 'patient_name', name: 'patient_name' },
            { data: 'blood_group', name: 'blood_group' },
            { data: 'mobile_no', name: 'mobile_no' },
            { data: 'created_at', name: 'created_at' },
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


$(document).on('click', '.deleterecord', function(){
  url = $(this).data('url');
  $row = $(this).parent('td').parent('tr');
  $row.css('background-color', '#c02222');

  $.ajax({
      url: url,
      type: "GET",
      processData: false,  // Important!
      contentType: false,
      cache: false,
      success: function(data) {
          if(data.status){
            successMsg('Success', data.msg); 
            updateStock(data);
            $('.data-table').DataTable().ajax.reload();

          }else{
              
            errorMsg('Error', data.msg);
          }
         

      },
      error: function() {
          errorMsg('Server Error', 'There has been an error, please alert us immediately');
          
      }

  });

});


function updateStock(data){
  $('.amins').html(data.amins+' Unit');
  $('.aplus').html(data.aplus+' Unit');
  $('.bmins').html(data.bmins+' Unit');
  $('.bplus').html(data.bplus+' Unit');
  $('.abmins').html(data.abmins+' Unit');
  $('.abplus').html(data.abplus+' Unit');
  $('.omins').html(data.omins+' Unit');
  $('.oplus').html(data.oplus+' Unit');
  $('.totalstock').html(data.totalstock);
}

$(document).on('keyup', '.receipt-amount', function(){
  PRBC_price = $('#PRBC').val() * {{$config->PRBC_price}};
  FFP_price = $('#FFP').val() * {{$config->FFP_price}};
  RDP_price = $('#RDP').val() * {{$config->RDP_price}};
  SDP_price = $('#SDP').val() * {{$config->SDP_price}};
  Other_price = $('#Other').val() * {{$config->Other_price}};

  $('.receiptprice').val(PRBC_price+FFP_price+RDP_price+SDP_price+Other_price);






});

</script>


@endsection
