@extends('students_view/master')
@section('content')
<div class="errors" id="closeEr">
	@if(count($errors) > 0)
	<h4>Please Input</h4>
		@foreach($errors->all() as $er)
			<li>{{$er}}</li>
		@endforeach
		<a class="button" href="javascript:closeit()" style="background: red; margin-top: 5px;">Close</a>
	@endif
	
</div>


	<h1>LIST</h1>
	<a class="button" href="#popup1">Add</a>
	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
	<br><br>
	<table id="myTable">
		<tbody >
			<tr class="header">
				<th>Name</th><th>Sex</th><th>Age</th><th>Image</th><th>Action</th>
			</tr>
		
		@foreach($students as $s)
			<tr style="text-align: center;">
				<td>{{$s->name}}</td><td>{{$s->sex}}</td><td>{{$s->age}}</td>
				
				<td>
					@foreach(explode(',',$s->photo) as $p)
					<img src="../images/{{$p}}" alt="img" style="width: 50px; height: 50; object-fit: cover;">
					@endforeach
				</td>

				<td>
					<a href="/students_view/edit/{{$s->id}}"><img src="<?php echo asset('storage/images/edit.png') ?>" alt="edit" class="td_img" title="Edit"></a>
					<a href="/students_view/delete/{{$s->id}}" onclick="return confirm('Are you sure to delete?')"><img src="<?php echo asset('storage/images/delete.png') ?>" alt="delete" class="td_img" title="Delete"></a>
					
				</td>
			</tr>
			 
		@endforeach
		</tbody>
	</table>

	<a class="button" href="/students_view" style="background: green; margin-top: 5px;">Home</a>
	<!-- Add -->
	<div id="popup1" class="overlay">
		<div class="popup">
			
			<h2>ADD</h2>
			<a class="close" href="#">&times;</a>
			<div class="content">
				<form action="/students/add" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}

					{!! Form::token() !!}
					<input type="file" name="photo[]" multiple>
					<br><br>
					Name: <input type="text" name="name" value="{{old('name')}}"><br>
					Sex: <input type="text" name="sex" value="{{old('sex')}}"><br>
					Age: <input type="text" name="age" value="{{old('age')}}"><br>
					Class: <input type="text" name="class" value="{{old('class')}}"><br>
					Grade(Score): <input type="text" name="grade" value="{{old('age')}}"><br>
					<input type="submit" value="Submit">
					{!! Form::close() !!}
				</form>
		</div>
	</div>>
	</div>
@endsection