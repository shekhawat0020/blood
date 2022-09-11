
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="closemodal close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="submitForm" action="{{route('user-update')}}" method="post">
      @csrf
      <input type="hidden" name="id" value="{{$user->id}}">
      <div class="modal-body">
        
        <div class="row">
           
        <div class="form-group col-sm-6">
                            <label>Username *</label>
                            <input name="username" id ="username" value="{{$user->name}}" type="text" class="form-control">
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Email *</label>
                            <input name="email" id ="email" value="{{$user->email}}" type="text" class="form-control">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="exampleInputEmail1">Status *</label>
                            <select name="status" id ="status" class="form-control" >
                                <option @if($user->status == 1) selected @endif value="1">Active</option>
                                <option @if($user->status == 0) selected @endif value="0">InActive</option>
                            </select>
                        </div>
                       
                        <div class="form-group col-sm-6">
                            <label for="exampleInputEmail1">Role *</label><br/>
                            <select name="roles[]" id ="role" class=" multiselectajax" multiple>
                              @foreach($roles as $role)
                                <option @if(in_array($role->id, $userRole)) selected @endif value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
            

        </div>
     

        
      </div>
      <div class="modal-footer">    
       
        <button class="btn btn-primary submitbutton" type="submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing..." data-rest-text="Save User">Save User</button>
        <button type="button" class="btn btn-secondary closemodal" data-dismiss="modal">Close</button>
      </div>
      </form>    

    </div>
  
        



