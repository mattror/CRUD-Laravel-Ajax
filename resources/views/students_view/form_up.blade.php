@extends('students_view/master')
@section('content')

<form action="/students/upload" method="post" enctype="multipart/form-data"> {{ csrf_field() }}

    Select image to upload:
    <input type="file" name="photo[]" multiple>
    <input type="submit" value="Upload Image" name="submit">

</form>

@endsection