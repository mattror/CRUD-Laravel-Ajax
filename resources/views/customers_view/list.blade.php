
@extends('customers_view.master')
@section('content')

<h1>LIST</h1>

<div class="row">

	@include('customers_view.add')

	@include('customers_view.preview')

	@include('customers_view.edit')

	@include('customers_view.delete')

	@include('customers_view.live_search')

	<!-- Search -->
		<div class="col-md-6 mt-5">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="text" id="myInput" name="name_search" placeholder="Search for names.." title="Type in a name">
		</div>
	<!-- End Search -->

</div>

<br><br>

<table id="myTable" class="">
	<tbody >
		<tr class="header">
			<th>Name</th><th>Sex</th><th>Age</th><th>Action</th>
		</tr>
	
	@foreach($list as $li)
		<tr class="tr_post{{$li->id}}">
			<td>{{$li->name}}</td><td>{{$li->sex}}</td><td>{{$li->age}}</td>
			<td>
			<span class="o-span" data-toggle="tooltip" title="Preview">
				<a class='btn btn-sm btn-primary show-modal' data-toggle="modal" data-target="#showModal" href='#' 
				 data-id="{{$li->id}}" data-age="{{$li->age}}" data-name="{{$li->name}}" data-gender="{{$li->sex}}" data-address="{{$li->address}}" data-city="{{$li->city}}" data-province="{{$li->province}}" data-postal="{{$li->postal}}" data-country="{{$li->country}}"
				 ><i class='glyphicon glyphicon-eye-open'></i></a>
			</span>

			<span class="o-span" data-toggle="tooltip" title="Edit">
				<a class='btn btn-sm btn-warning edit-modal' data-toggle="modal" href='#editModal' data-id="{{$li->id}}" data-age="{{$li->age}}" data-name="{{$li->name}}" data-gender="{{$li->sex}}" data-address="{{$li->address}}" data-city="{{$li->city}}" data-province="{{$li->province}}" data-postal="{{$li->postal}}" data-country="{{$li->country}}"
					><i class='glyphicon glyphicon-edit'></i></a>
			</span>

			<span class="o-span" data-toggle="tooltip" title="Delete">
				<a class='btn btn-sm btn-danger delete-modal' data-id="{{$li->id}}"  ><i class='glyphicon glyphicon-trash'></i></a>
			</span>

			</td>
		</tr>
		 
	@endforeach

	</tbody>
</table>

<nav aria-label="Page navigation example">
	{!! $list->render(); !!}
</nav>

<script src="{{asset('js/custom.js')}}"></script>

<a class="button" href="/customers" style="background: green; margin-top: 5px;">Home</a>
	
	
@endsection