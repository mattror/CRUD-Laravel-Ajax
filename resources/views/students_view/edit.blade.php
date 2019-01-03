@extends("students_view/master")
@section('content')
<h1>EDIT</h1>
<form action="/students/update" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	{!! Form::token() !!}
	<input type="file" name="photo[]" required="" multiple>
	<br><br>
	<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
	Name: <input type="text" name="name" value="{{$edit->name}}"><br>
	Sex: <input type="text" name="sex" value="{{$edit->sex}}"><br>
	Age: <input type="text" name="age" value="{{$edit->age}}"><br>
	Class: <input type="text" name="class" value="{{ $edit->class }}"><br>
	Grade(Score): <input type="text" name="grade" value="{{ $edit->grade }}"><br>
	<input type="hidden" name="id" value="{{$edit->id}}"><br>
	<input type="submit" value="Submit">
</form>
<input type="submit" value="Back" onclick="window.history.back();" style="background: #FBBC05;">
@endsection