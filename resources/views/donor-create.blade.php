
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Donor</h5>
        <button type="button" class="closemodal close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="submitForm" action="{{route('donor-create')}}" method="post">
      @csrf
      <div class="modal-body">
        <p>Donor Detail</p><hr/>
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Donor Name *</label>
                <input type="text" name="name" id="name" class="form-control"  placeholder="Enter name">
            </div>

            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Father Name</label>
                <input type="text" name="father_name" id="father_name" class="form-control"  placeholder="Enter Father Name">
            </div>

            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">DOB</label>
                <input type="date" name="dob" id="dob" class="form-control"  placeholder="Enter Date of brith">
            </div>

            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Age</label>
                <input type="number" name="age" id="age" class="form-control" id="age" name="age" placeholder="Enter Age" value="0">
            </div>

           

            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Gender *</label>
                <select name="gender" id ="gender" class="form-control" >
                    <option value="">Select one</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" id="email" type="email" class="form-control"  placeholder="Enter Email">
            </div>

            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Mobile No *</label>
                <input name="mobile_no" id="mobile_no" type="text" class="form-control"  placeholder="Enter Mobile No" value="{{$mobile}}">
            </div>

            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Occupation</label>
                <input name="occupation" id="occupation" type="text" class="form-control"  placeholder="Enter Occupation">
            </div>

            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Address *</label>
                <input name="address" id ="address" type="text" class="form-control"  placeholder="Enter Address">
            </div>

            

        </div>
        <p>Genernal Physical Examination</p><hr/>
        <div class="row">

        
            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Weight *</label>
                <input name="weight" id="weight" type="text" class="form-control"  placeholder="Enter Weight">
            </div>


            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Blood Group *</label>
                <select name="blood_group" id="blood_group" class="form-control" >
                    <option value="">Select one</option>
                    <option value="A-">A-</option>
                    <option value="A+">A+</option>
                    <option value="B-">B-</option>
                    <option value="B+">B+</option>
                    <option value="O-">O-</option>
                    <option value="O+">O+</option>
                    <option value="AB-">AB-</option>
                    <option value="AB+">AB+</option>
                </select>
            </div>

            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">HB *</label>
                <input type="text" class="form-control" id="hb" name="hb" placeholder="Enter HB">
            </div>


        </div>

        
      </div>
      <div class="modal-footer">
      <div class="input-group ">
            <div class="input-group-append">
            <button type="button" class="btn">Action</button>
            </div>
            <select name="action" id ="action" class="form-control" >
                   
                    <option value="1">Add New Donor With Donation</option>
                    <option value="0">Add New Donor Without Donation</option>
            </select>
           
        </div>
       
        <button class="btn btn-primary submitbutton" type="submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing..." data-rest-text="Save Donor">Save Donor</button>
        <button type="button" class="btn btn-secondary closemodal" data-dismiss="modal">Close</button>
      </div>
      </form>
</div>
      
  
        



