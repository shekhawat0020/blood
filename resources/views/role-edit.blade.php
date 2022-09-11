
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Role</h5>
        <button type="button" class="closemodal close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="submitForm" action="{{route('role-update')}}" method="post">
      @csrf
      <input type="hidden" name="id" value="{{$role->id}}">
      <div class="modal-body">
        
        <div class="row">
           
        <div class="form-group col-sm-6">
                            <label>Role *</label>
                            <input name="name" id ="name" value="{{$role->name}}" type="text" class="form-control">
                        </div>
                        

                        <div class="form-group col-sm-6">
                            <label for="exampleInputEmail1">Permission *</label><br/>
                            <select  name="permission[]" id ="permission" class="form-control multiselectajax" multiple>
                                @foreach($permission as $p)
                                <option @if(in_array($p->id,$rolePermissions)) selected @endif value="{{$p->id}}">{{$p->name}}</option>
                                @endforeach
                            </select>
                        </div>

                       
     

        
      </div>
      <div class="modal-footer">    
       
        <button class="btn btn-primary submitbutton" type="submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing..." data-rest-text="Save Role">Save Role</button>
        <button type="button" class="btn btn-secondary closemodal" data-dismiss="modal">Close</button>
      </div>
      </form>    

    </div>
  
        



