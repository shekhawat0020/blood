
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Donor</h5>
        <button type="button" class="closemodal close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="submitForm" action="{{route('donor-edit')}}" method="post">
      @csrf
      <input type="hidden" name="id" value="{{$donor->id}}">
      <div class="modal-body">
        <p>Donor Detail</p><hr/>
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Donor Name *</label>
                <input type="text" name="name" id="name" value="{{$donor->name}}" class="form-control"  placeholder="Enter name">
            </div>

            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Father Name</label>
                <input type="text" name="father_name" id="father_name" value="{{$donor->father_name}}"  class="form-control"  placeholder="Enter Father Name">
            </div>

            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">DOB</label>
                <input type="date" name="dob" id="dob" value="@if($donor->dob != null){{$donor->dob}} @endif"  class="form-control"  placeholder="Enter Date of brith">
            </div>

            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Age</label>
                <input type="number" name="age" id="age" value="{{$donor->age}}"  class="form-control" id="age" name="age" placeholder="Enter Age" value="0">
            </div>

           

            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Gender *</label>
                <select name="gender" id ="gender" class="form-control" >
                    <option value="">Select one</option>
                    <option @if($donor->gender == 'Male')selected @endif value="Male">Male</option>
                    <option @if($donor->gender == 'Female')selected @endif value="Female">Female</option>
                    <option @if($donor->gender == 'Other')selected @endif value="Other">Other</option>
                </select>
            </div>

            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" id="email" type="email" value="{{$donor->email}}"  class="form-control"  placeholder="Enter Email">
            </div>

            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Mobile No *</label>
                <input name="mobile_no" id="mobile_no" value="{{$donor->mobile_no}}" type="text" class="form-control"  placeholder="Enter Mobile No">
            </div>

            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Occupation</label>
                <input name="occupation" id="occupation" value="{{$donor->occupation}}"  type="text" class="form-control"  placeholder="Enter Occupation">
            </div>

            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Address *</label>
                <input name="address" id ="address" value="{{$donor->address}}"  type="text" class="form-control"  placeholder="Enter Address">
            </div>

            

        </div>
        <p>Genernal Physical Examination</p><hr/>
        <div class="row">

        
            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Weight *</label>
                <input name="weight" id="weight" value="{{$donor->weight}}"  type="text" class="form-control"  placeholder="Enter Weight">
            </div>


            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Blood Group *</label>
                <select name="blood_group" id="blood_group" class="form-control" >
                    <option value="">Select one</option>
                    <option @if($donor->blood_group == 'A-')selected @endif value="A-">A-</option>
                    <option @if($donor->blood_group == 'A+')selected @endif value="A+">A+</option>
                    <option @if($donor->blood_group == 'B-')selected @endif value="B-">B-</option>
                    <option @if($donor->blood_group == 'B+')selected @endif value="B+">B+</option>
                    <option @if($donor->blood_group == 'O-')selected @endif value="O-">O-</option>
                    <option @if($donor->blood_group == 'O+')selected @endif value="O+">O+</option>
                    <option @if($donor->blood_group == 'AB-')selected @endif value="AB-">AB-</option>
                    <option @if($donor->blood_group == 'AB+')selected @endif value="AB+">AB+</option>
                </select>
            </div>

            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">HB *</label>
                <input type="text" class="form-control" id="hb" value="{{$donor->hb}}"  name="hb" placeholder="Enter HB">
            </div>


        </div>

        
      </div>
      <div class="modal-footer">
      <div class="input-group ">
            <div class="input-group-append">
            <button type="button" class="btn">Action</button>
            </div>
            <select name="action" id ="action" class="form-control" >
                   
                    <option value="1">Edit Donor With Donation</option>
                    <option value="0">Edit Donor Without Donation</option>
            </select>
           
        </div>
       
        <button class="btn btn-primary submitbutton" type="submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing..." data-rest-text="Save Donor">Save Donor</button>
        <button type="button" class="btn btn-secondary closemodal" data-dismiss="modal">Close</button>
      </div>
      </form>
      <div class="modal-body">
      <p>Donor History</p><hr/>
      <div class="row">
            <div class="col-sm-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Blood Group</th>
                    <th scope="col">HB</th>
                    <th scope="col">Blood Unit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($donor->donor_history as $key => $history)
                    <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{date('d M Y', strtotime($history->created_at))}}</td>
                  
                    <td>{{$history->blood_group}}</td>
                    <td>{{$history->hb}}</td>
                    <td>{{$history->unit}} Unit</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="4">Total Unit</td>
                        <td>{{$donor->donor_history->sum('unit')}} Unit</td>
                    </tr>

                    

                </tbody>
                </table>

            </div>
        </div>
        </div>

    </div>
  
        



