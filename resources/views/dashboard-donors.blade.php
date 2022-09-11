


<div class="row">
    <div class="col-sm-12">
    <form class="submitForm" action="{{route('get-donor-form')}}" method="post">
    @csrf
    <div class="input-group ">
            <input type="text" name="mobile_no" id="mobile_no" class="form-control" placeholder="Donor Mobile No." aria-label="Donor Mobile No." aria-describedby="basic-addon2">
            <div class="input-group-append">
            <button class="btn btn-outline-primary submitbutton" type="submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing..." data-rest-text="Add Donor">Add Donor</button>
            </div>
        </div>

</form>

        
    </div>
</div>
<br/>
<div class="row">
    <div class="col-sm-12">
    <table class="table table-bordered data-table" id="donor-table">
        <thead>
            <tr>
            
            <th scope="col">Donor Name</th>
            <th scope="col">Blood</th>
            <th scope="col">Mobile No</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
            </tr>
        </thead>  
        </tbody>
        </table>

    </div>
</div>
<br/>
<br/>
<br/>
<hr>
<h3>Download Report</h3>
<form action="{{route('download-donor-report')}}" method="post">
@csrf
<div class="row">
<div class="form-group col-sm-4">
    <input type="date" class="form-control" name="start_date" id="start_date" value="{{date('Y-m-d')}}" required>
</div>
<div class="form-group col-sm-1">
   To
</div>
<div class="form-group col-sm-4">
    <input type="date" class="form-control" name="end_date" id="end_date" value="{{date('Y-m-d')}}" required>
</div>
<div class="form-group col-sm-3">
    <button type="submit" class="btn btn-primary">Download</button>
</div>


</div>
</form>


