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
                <div class="card-header"><i class="fa fa-heartbeat"></i> {{ __('Blood Stock') }}</div>

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
                <div class="card-header"><i class="fa fa-users"></i>   {{ __('Donors') }}</div>

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
@endsection
