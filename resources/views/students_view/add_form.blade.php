@include('nav-bar')
@extends('students_view/master')
@section('content')

<div class="errors" id="closeEr">
@if(count($errors) > 0)
<h4>Please Input</h4>
<ul style="background: none;">
	@foreach($errors->all() as $er)
	<li style="display: block; float: none;">{{$er}}</li>
	@endforeach
</ul>
	<a class="button" href="javascript:closeit()" style="background: red; margin-top: 5px;">Close</a>
@endif
</div>


<div class="stu-add">
<h1>ADD</h1>
<form action="/students/add" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	{!! Form::open(array('url' => 'foo/bar')); !!}
	{!! Form::token() !!}
	<input type="file" name="photo[]" multiple class="btn btn-success">
	<br><br>
	Name: <input class="form-input" type="text" name="name" value="{{old('name')}}"><br>
	Sex: <input class="form-input" type="text" name="sex" value="{{old('sex')}}"><br>
	Age: <input class="form-input" type="text" name="age" value="{{old('age')}}"><br>
	Class: <input class="form-input" type="text" name="class" value="{{old('class')}}"><br>
	Grade(Score): <input class="form-input" type="text" name="grade" value="{{old('age')}}"><br>
	<input type="submit" value="Submit" class="btn btn-primary">
	{!! Form::close() !!}
</form>
<br>
<a href="/" class="t_a">List</a>
</div>

@endsection