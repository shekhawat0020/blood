
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Receipt</h5>
        <button type="button" class="closemodal close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="submitForm" action="{{route('receipt-create')}}" method="post">
      @csrf
      <div class="modal-body">
        <p>Receipt Detail</p><hr/>
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Receipt No *</label>
                <input type="text" name="receipt_no" id="receipt_no" class="form-control" placeholder="Receipt No ">
            </div>

            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Patient Name *</label>
                <input type="text" name="patient_name" id="patient_name" class="form-control" placeholder="Enter name">
            </div>

            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Hospital Name</label>
                <input type="text" name="hospital_name" id="hospital_name" class="form-control" placeholder="Enter Hospital Name">
            </div>


            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Recipient's Name *</label>
                <input type="text" name="recipient_name" id="recipient_name" class="form-control" placeholder="Recipient's Name">
            </div>

            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Mobile No *</label>
                <input type="text" name="mobile_no" id="mobile_no" class="form-control" value="{{$mobile}}" placeholder="Enter Mobile Name">
            </div>


            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Blood Group *</label>
                <select class="form-control" name="blood_group" id="blood_group" >
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


            <div class="form-group col-sm-12">
                <label for="exampleInputEmail1">Component</label>
                <table class="table table-bordered">
                    <tr>
                        <th>PRBC</th>
                        <th>FFP</th>
                        <th>RDP</th>
                        <th>SDP</th>
                        <th>Other</th>
                    </tr>
                    <tr>
                        <td><input type="number" name="PRBC" id="PRBC" min="0" value="0" class="form-control"></td>
                        <td><input type="number" name="FFP" id="FFP" min="0" value="0" class="form-control"></td>
                        <td><input type="number" name="RDP" id="RDP" min="0" value="0" class="form-control"></td>
                        <td><input type="number" name="SDP" id="SDP" min="0" value="0" class="form-control"></td>
                        <td><input type="number" name="Other" id="Other" min="0" value="0" class="form-control"></td>
                    </tr>
                </table>
                
            </div>

            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Bag No *</label>
                <input type="number" name="bag_no" id="bag_no" class="form-control"  >
            </div>

            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Issue No *</label>
                <input type="number" name="issue_no" id="issue_no" class="form-control" >
            </div>

           


            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Payment Mode *</label>
                <select class="form-control" name="payment_mode" id="payment_mode" >
                    <option value="">Select one</option>
                    <option value="Cash">Cash</option>
                    <option value="UPI">UPI</option>
                    <option value="Credit Card">Credit Card</option>
                    <option value="Credit">Credit</option>
                    <option value="Cheque">Cheque</option>
                </select>
            </div>


            <div class="input-group  col-sm-6">
              <div class="input-group-prepend">
                <span class="input-group-text">₹</span>
              </div>
              <input type="text" name="price" id="price" class="form-control" aria-label="Amount (to the nearest INR)">
              <div class="input-group-append">
                <span class="input-group-text">.00</span>
              </div>
            </div>



          

            

        </div>
        

        
      </div>
      <div class="modal-footer">
        
       
        <button class="btn btn-primary submitbutton" type="submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing..." data-rest-text="Create Receipt">Create Receipt</button>
        <button type="button" class="btn btn-secondary closemodal" data-dismiss="modal">Close</button>
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
                    <th scope="col">Receipt No</th>
                    <th scope="col">Date</th>
                    <th scope="col">Patient Name</th>
                    <th scope="col">Blood Group</th>
                    <th scope="col">Blood Unit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($receipts as $key => $receipt)
                    <tr>
                    <th scope="row">{{$key+1}}</th>
                    <th>{{$receipt->receipt_no}}</th>
                    <td>{{date('d M Y', strtotime($receipt->created_at))}}</td>
                    <td>{{$receipt->patient_name}}</td>
                    <td>{{$receipt->blood_group}}</td>
                    <td>{{$receipt->quntity_in_unity}} Unit</td>
                    </tr>
                    @endforeach

                  

                    <tr>
                    <th colspan="5">Total</th>
                    <td>{{$receipts->sum('quntity_in_unity')}} Unit</td>
                    </tr>

                </tbody>
                </table>

            </div>
        </div>
        </div>


    </div>
</div>
      
  
        



