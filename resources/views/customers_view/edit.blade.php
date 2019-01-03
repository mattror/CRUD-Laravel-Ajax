<!-- Edit  -->
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="modalLabel">Edit</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	       		{{ csrf_field() }}
	       		<input type="hidden" name="ed_id" id="inId">
	       		<div class="row">
	       			<div class="col-md-6 form-group">
	       				<label for="inName">Username</label>
  						<input type="text" name="ed_username" class="form-control" id="inName" placeholder="Username" value="{{ old('username') }}">
  						<span id="ere_name" class="errorSpan"></span>
	       			</div>
	       			<div class="col-md-6 form-group">
	       				<label for="inSex">Gender</label>
				      <select id="inSex" name="ed_sex" class="form-control" value="{{ old('sex') }}">
				        <option selected value="">Choose...</option>
				        <option value="f">Female</option>
				        <option value="m">Male</option>
				      </select>
				      <span id="ere_sex" class="errorSpan"></span>
	       			</div>
	       		</div>
	       		<div class="row">
	       			<div class="form-group col-md-6">
				      <label for="inAge">Age</label>
				      <input type="text" name="ed_age" class="form-control" id="inAge" placeholder="Age" value="{{ old('age') }}">
				      <span id="ere_age" class="errorSpan"></span>
				    </div>
				    <div class="col-md-6 form-group">
				    	<label for="inAddress">Address</label>
						<input type="text" name="ed_address" class="form-control" id="inAddress" placeholder="1234 Main St" value="{{ old('address') }}">
						<span id="ere_address" class="errorSpan"></span>
				    </div>
	       		</div>
	       		<div class="row">
	       			<div class="form-group col-md-6">
				      <label for="inCity">City</label>
				      <input type="text" name="ed_city" class="form-control" id="inCity" value="{{ old('city') }}">
				      <span id="ere_city" class="errorSpan"></span>
				    </div>
				    <div class="form-group col-md-6">
				      <label for="inProvince">Province</label>
				      <select id="inProvince" name="ed_province" class="form-control" value="{{ old('province') }}">
				        <option selected value="">Choose...</option>
				        <option>Kompong Chhnang</option>
				        <option>Kompong Cham</option>
				      </select>
				      <span id="ere_province" class="errorSpan"></span>
				    </div>
	       		</div>
	       		<div class="row">
	       			<div class="form-group col-md-6">
				      <label for="inPostal">Postal Code</label>
				      <input type="text" name="ed_postal" class="form-control" id="inPostal" value="{{ old('postal') }}">
				      <span id="ere_postal" class="errorSpan"></span>
				    </div>
				    <div class="form-group col-md-6">
				        <label for="inCountry">Country</label>
				        <input type="text" name="ed_country" class="form-control" id="inCountry" value="{{ old('country') }}">
				        <span id="ere_country" class="errorSpan"></span>
				      </div>
	       		</div>
	      </div>		      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary" id="editButton">Update</button>
	      </div>
	    </div>
		
	  </div>
	</div>
	
	<script>
		$(document).on('click','.edit-modal',function(){
			$('#inId').val($(this).data('id'));
			$('#inName').val($(this).data('name'));
			$('#inAge').val($(this).data('age'));
			$('#inSex').val($(this).data('gender'));
			$('#inAddress').val($(this).data('address'));
			$('#inCity').val($(this).data('city'));
			$('#inProvince').val($(this).data('province'));
			$('#inPostal').val($(this).data('postal'));
			$('#inCountry').val($(this).data('country'));
		});

		$('#editButton').click(function(){
			$.ajax({
				type: 'post',
				url: '{{route('editcustomer')}}',
				data:{
					'_token': $('input[name=_token]').val(),
					'id': $('input[name=ed_id]').val(),
					'username': $('input[name=ed_username]').val(),
					'sex': $('select[name=ed_sex]').val(),
					'age': $('input[name=ed_age]').val(),
					'address': $('input[name=ed_address]').val(),
					'city': $('input[name=ed_city]').val(),
					'province': $('select[name=ed_province]').val(),
					'postal': $('input[name=ed_postal]').val(),
					'country': $('input[name=ed_country]').val()
				},
				success: function(data){
					if((data.errors)){ 
                		$('#ere_name').html(data.errors.username);
                		$('#ere_sex').html(data.errors.sex);
                		$('#ere_age').html(data.errors.age);
                		$('#ere_address').html(data.errors.address);
                		$('#ere_city').html(data.errors.city);
                		$('#ere_province').html(data.errors.province);
                		$('#ere_postal').html(data.errors.postal);
                		$('#ere_country').html(data.errors.country)
					}else{
						

						$('.tr_post'+data.id).replaceWith("<tr class='tr_post"+data.id+"'>"+
							"<td>"+data.name+"</td>"+
							"<td>"+data.sex+"</td>"+
							"<td>"+data.age+"</td>"+
							"<td>"+
							"<span class='o-span' data-toggle='tooltip' title='Preview'>"+
								"<a class='btn btn-sm btn-primary show-modal' data-toggle='modal' data-target='#showModal' href='#'"+ 
								"data-id='"+data.id+"' data-age='"+data.age+"' data-name='"+data.name+"' data-gender='"+data.sex+"'"+
								"data-address='"+data.address+"' data-city='"+data.city+"' data-province='"+data.province+"'"+
								   "data-postal='"+data.postal+"' data-country='"+data.country+"'"+
								 "><i class='glyphicon glyphicon-eye-open'></i></a></span>"+

							"<span class='o-span' data-toggle='tooltip' title='Edit'>"+
								"<a class='btn btn-sm btn-warning edit-modal' data-toggle='modal' data-target='#editModal' href='#'"+ 
								 "data-id='"+data.id+"' data-age='"+data.age+"' data-name='"+data.name+"' data-gender='"+data.sex+"'"+ 
								 "data-address='"+data.address+"' data-city='"+data.city+"' data-province='"+data.province+"'"+
								 "data-postal='"+data.postal+"' data-country='"+data.country+"'"+
								 "><i class='glyphicon glyphicon-edit'></i></a>"+
							"</span>"+

							"<span class='o-span' data-toggle='tooltip' title='Delete'>"+
								"<a class='btn btn-sm btn-danger delete-modal' href='#deleteModal' data-id='"+data.id+"'><i "+
								"class='glyphicon glyphicon-trash'></i></a>"+
							"</span>"+
							"</td>"+
							"</tr>");
						swal({
						  title: "Successfully Updated!",
						  // text: "Successfully Added!",
						  icon: "success",
						});


					}
				},
			});
		});
	</script>
<!-- End Edit -->