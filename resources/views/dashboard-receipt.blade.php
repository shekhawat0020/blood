


<div class="row">
    <div class="col-sm-12">
    <form>
        
    <div class="input-group ">
            <input type="text" class="form-control" placeholder="Recipient's Mobile No." aria-label="Donor Mobile No." aria-describedby="basic-addon2">
            <div class="input-group-append">
            <button class="btn btn-outline-primary" type="button" data-toggle="modal" data-target="#exampleModal1">Create Receipt</button>
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
            <th scope="col">No</th>
            <th scope="col">Patient Name</th>
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
            <button type="button" class="btn btn-sm btn-primary"><i class="fa fa-print"></i></button>
                <button type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
            </td>
            </tr>

            <tr>
            <th scope="row">2</th>
            <td>Mark</td>
            <td>A+</td>
            <td>1234567890</td>
            <td>
            <button type="button" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></button>
            <button type="button" class="btn btn-sm btn-primary"><i class="fa fa-print"></i></button>
                <button type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
            </td>
            </tr>

            <tr>
            <th scope="row">3</th>
            <td>Mark</td>
            <td>A+</td>
            <td>1234567890</td>
            <td>
            <button type="button" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></button>
            <button type="button" class="btn btn-sm btn-primary"><i class="fa fa-print"></i></button>
                <button type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
            </td>
            </tr>


            
            
        </tbody>
        </table>

    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Receipt</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
      <div class="modal-body">
        <p>Receipt Detail</p><hr/>
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Patient Name *</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
            </div>

            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Hospital Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Father Name">
            </div>


            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Recipient's Name</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Recipient's Name">
            </div>

            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Mobile No *</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Mobile Name">
            </div>

            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Component</label>
                <select class="form-control" id="exampleInputEmail1">
                    <option value="">Select one</option>
                    <option value="PRBS">PRBS</option>
                    <option value="FFP">FFP</option>
                    <option value="RDP">RDP</option>
                    <option value="SDP">SDP</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Quntity In Unit</label>
                <input type="number" class="form-control" id="exampleInputEmail1" min="1" step="1">
            </div>


            <div class="input-group  col-sm-6">
              <div class="input-group-prepend">
                <span class="input-group-text">INR</span>
              </div>
              <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
              <div class="input-group-append">
                <span class="input-group-text">.00</span>
              </div>
            </div>



          

            

        </div>
        

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Create Receipt</button>
      </div>
      </form>
      <div class="modal-body">
      <p>Recipient's History</p><hr/>
      <div class="row">
            <div class="col-sm-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Date</th>
                    <th scope="col">Patient Name</th>
                    <th scope="col">Blood Unit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>20/12/2021</td>
                    <td>Raa</td>
                    <td>1 Unit</td>
                    </tr>

                    <tr>
                    <th scope="row">2</th>
                    <td>11/12/2022</td>
                    <td>hhh</td>
                    <td>1 Unit</td>
                    </tr>

                    <tr>
                    <th colspan="3">Total</th>
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
