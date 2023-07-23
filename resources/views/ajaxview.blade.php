<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>ajax</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</head>
<body>
<section style="padding-top:60px;">
	<div class="container">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					detail<a href="#" class="btn btn-success" data-toggle="modal" data-target="#detailModal">Add detail</a>
				</div>
				<div class="card-body">
					<table id="detail" class="table">
						<thead>
							<tr>
								<th>name</th>
								<th>address</th>
								<th>age</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						
						</tbody>

					</table>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form id="details" >
       	<div class="form-group">
       		<label>name</label>
       		<input type="text" class="form-control" id="name">
       	</div>
       	<div class="form-group">
       		<label>address</label>
       		<input type="text" class="form-control" id="address">
       	</div>
       	<div class="form-group">
       		<label>age</label>
       		<input type="number" class="form-control" id="age">
       	</div>
       	<button type="submit" class="btn btn-primary">submit</button>
       </form>
      </div>
      
    </div>
  </div>
</div>



<!-- edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form id="editdetails" >
       	       		<input type="number" class="form-control" id="id">

       	<div class="form-group">

       		<label>name</label>
       		<input type="text" class="form-control" id="name1">
       	</div>
       	<div class="form-group">
       		<label>address</label>
       		<input type="text" class="form-control" id="address1">
       	</div>
       	<div class="form-group">
       		<label>age</label>
       		<input type="number" class="form-control" id="age1">
       	</div>
       	<button type="submit" class="btn btn-primary">submit</button>
       </form>
      </div>
      
    </div>
  </div>
</div>
<script>
	$(document).ready(function() {   
		    var token = $("meta[name='csrf-token']").attr("content");
fetchdata();
console.log("hel")
	$("#details").submit(function(e){
console.log("helj")
		e.preventDefault();
		const name=$("#name").val();
		const address=$("#address").val();
		const age=$("#age").val();
console.log("hello");
		$.ajax({
			
			url:"{{route('storedata')}}",
			type:"post",
			data:{
				            "_token": token,

				name:name,
				address:address,
				age:age
			},
			success:function(response){
				if (response) {
					console.log(response);
					$("#detail tbody").prepend('<td>'+response.name+'</td><td>'+response.address+'</td><td>'+response.age+'</td>');
										fetchdata();

					$("#detailModal").modal('hide');
					$('#details')[0].reset();
				}
			}
		});
	});
$(document).on('click','.delete',function(){
    var id = $(this).val();
    // var id=$(".delete").val();
    console.log(id);
   
    $.ajax(
    {
        url: "ajaxdelete/"+id,
        type: 'post',
        data: {
            // "id": id,
            "_token": token,
        },
        success: function (){
            console.log("it Works");
            fetchdata();

        }
    });
   
});
$(document).on('click','.edit',function(){
    var id = $(this).val();
    // var id=$(".delete").val();
    // console.log(id);
   $('#editModal').modal('show');
    $.ajax(
    {
        url: "ajaxedit/"+id,
        type: 'get',
        data: {
            // "id": id,
            "_token": token,
        },
        success: function (response){
            console.log(response.com.address);
const name=$('#name1').val(response.com.name);
console.log(name);
$('#address1').val(response.com.address);
$('#age1').val(response.com.age);
const name1=$('#id').val(response.com.id);
console.log("name"+name1);
        }
    });
   
});
function fetchdata(){
	$.ajax({
		type:'get',
		url:'ajaxview',
		success:function(response){
			$('tbody').html("");
			$.each(response.com,function(key,item){
				$('tbody').append('<tr><td>'+item.name+'</td><td>'+item.address+'</td><td>'+item.age+'</td><td><button type="button" value="'+item.id+'" class="edit btn btn-primary">Edit</button></td><td><button type="submit" value="'+item.id+'" class="delete btn btn-danger">Delete</button></td>')
			})
		}
	})
}

});
	
</script>

</body>
</html>