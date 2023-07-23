<form method="post" action="{{route('update',$crud->id)}}">  
 @csrf     
          <div class="form-group">      
              <label for="first_name"> Name:</label><br/><br/>  
              <input type="text" class="form-control" name="name" value={{$crud->name}}><br/><br/>  
          </div>  
  
<div class="form-group">      
              <label for="first_name">address:</label><br/><br/>  
              <input type="text" class="form-control" name="address" value={{$crud->address}}><br/><br/>  
          </div>  
<div class="form-group">      
              <label for="gender">age:</label><br/><br/>  
              <input type="number" class="form-control" name="age" value={{$crud->age}}><br/><br/>  
          </div>  
 
<br/>  
  
<button type="submit" class="btn-btn" >Update</button>  
</form>  