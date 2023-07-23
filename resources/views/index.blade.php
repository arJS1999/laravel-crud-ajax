<table border="1px">  
<thead>  
<tr>  
<td>  
ID </td>  
<td>  
Name </td>  
<td>  
age</td>  
<td>  
address </td>  

</tr>  
</thead>  
<tbody>  
@foreach($com as $crud)  
        <tr border="none">  
            <td>{{$crud->id}}</td>  
            <td>{{$crud->name}}</td>  
            <td>{{$crud->age}}</td>  
            <td>{{$crud->address}}</td>  

<td >  
<form action="{{ route('destroy', $crud->id)}}" method="post">  
                  @csrf  
                  <button class="btn btn-danger" type="submit">Delete</button>  
                </form>  
</td>  
<td>
    <form action="{{ route('edit', $crud->id)}}" method="GET">  
                  @csrf  
                   
                  <button class="btn btn-danger" type="submit">Edit</button>  
                </form>  
</td>
  
         </tr>  
@endforeach  
</tbody>  
</table>  