


<div class="row">
    <div class="col-sm-12">
    <form>
        
    <div class="input-group ">
            <input type="text" class="form-control" placeholder="Donor Mobile No." aria-label="Donor Mobile No." aria-describedby="basic-addon2">
            <div class="input-group-append">
            <button class="btn btn-outline-primary" type="button" data-toggle="modal" data-target="#exampleModal">Add Donor</button>
            </div>
        </div>

    <form>

        
    </div>
</div>
<br/>
<div class="row">
    <div class="col-sm-12">
    <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Donor Name</th>
            <th scope="col">Blood</th>
            <th scope="col">Mobile No</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>A+</td>
            <td>1234567890</td>
            <td>
            <button type="button" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></button>
                <button type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
            </td>
            </tr>

            <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>A+</td>
            <td>1234567890</td>
            <td>
            <button type="button" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></button>
                <button type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
            </td>
            </tr>

            <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>A+</td>
            <td>1234567890</td>
            <td>
            <button type="button" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></button>
                <button type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
            </td>
            </tr>


            
            
        </tbody>
        </table>

    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Donor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
      <div class="modal-body">
        <p>Donor Detail</p><hr/>
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Donor Name *</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
            </div>

            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Father Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Father Name">
            </div>

            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">DOB</label>
                <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Enter Date of brith">
            </div>

            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Gender</label>
                <select class="form-control" id="exampleInputEmail1">
                    <option value="">Select one</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Father Name">
            </div>

            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Mobile No *</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Father Name">
            </div>

            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Occupation</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Father Name">
            </div>

            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Address</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Father Name">
            </div>

            

        </div>
        <p>Genernal Physical Examination</p><hr/>
        <div class="row">

        
            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Weight</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Father Name">
            </div>


            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Blood Group *</label>
                <select class="form-control" id="exampleInputEmail1">
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
        </div>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save Donor</button>
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
                    <th scope="col">Blood Unit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>20/12/2021</td>
                    <td>1 Unit</td>
                    </tr>

                    <tr>
                    <th scope="row">2</th>
                    <td>11/12/2022</td>
                    <td>1 Unit</td>
                    </tr>

                    <tr>
                    <th colspan="2">Total</th>
                    <td>2 Unit</td>
                    </tr>

                </tbody>
                </table>

            </div>
        </div>
        </div>


    </div>
  </div>
</div>

<!--End  Modal -->
