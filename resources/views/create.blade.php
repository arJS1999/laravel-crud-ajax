<form method="post" action="{{ route('store') }}">  
   @csrf     
          <div class="form-group">      
              <label for="first_name">Name:</label><br/><br/>  
              <input type="text" class="form-control" name="name"/><br/><br/>  
          </div>  
<div class="form-group">      
<label for="first_name">Age:</label><br/><br/>  
              <input type="number" class="form-control" name="age"/><br/><br/>  
          </div>  
<div class="form-group">      
              <label for="address">Address:</label><br/><br/>  
              <input type="text" class="form-control" name="address"/><br/><br/>  
          </div>  
 
<br/>  
<button type="submit" class="btn-btn" >Insert</button>  
</form>  