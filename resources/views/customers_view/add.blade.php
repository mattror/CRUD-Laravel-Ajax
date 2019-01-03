<!-- Add -->
		<div class="modal-popup col-md-2 mt-5">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
			  <span class="glyphicon glyphicon-plus"></span> Add
			</button>
			<!-- Modal -->
			<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="modalLabel">Add</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			       		{{ csrf_field() }}
			       		<div class="row">
			       			<div class="col-md-6 form-group">
			       				<label for="inputName">Username</label>
	      						<input type="text" name="username" class="form-control" id="inputName" placeholder="Username" value="{{ old('username') }}">
	      						<span id="er_name" class="errorSpan"></span>
			       			</div>
			       			<div class="col-md-6 form-group">
			       				<label for="inputSex">Gender</label>
						      <select id="inputSex" name="sex" class="form-control" value="{{ old('sex') }}">
						        <option selected value="">Choose...</option>
						        <option value="f">Female</option>
						        <option value="m">Male</option>
						      </select>
						      <span id="er_sex" class="errorSpan"></span>
			       			</div>
			       		</div>
			       		<div class="row">
			       			<div class="form-group col-md-6">
						      <label for="inputAge">Age</label>
						      <input type="text" name="age" class="form-control" id="inputAge" placeholder="Age" value="{{ old('age') }}">
						      <span id="er_age" class="errorSpan"></span>
						    </div>
						    <div class="col-md-6 form-group">
						    	<label for="inputAddress">Address</label>
	    						<input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St" value="{{ old('address') }}">
	    						<span id="er_address" class="errorSpan"></span>
						    </div>
			       		</div>
			       		<div class="row">
			       			<div class="form-group col-md-6">
						      <label for="inputCity">City</label>
						      <input type="text" name="city" class="form-control" id="inputCity" value="{{ old('city') }}">
						      <span id="er_city" class="errorSpan"></span>
						    </div>
						    <div class="form-group col-md-6">
						      <label for="inputProvince">Province</label>
						      <select id="inputProvince" name="province" class="form-control" value="{{ old('province') }}">
						        <option selected value="">Choose...</option>
						        <option>Kompong Chhnang</option>
						        <option>Kompong Cham</option>
						      </select>
						      <span id="er_province" class="errorSpan"></span>
						    </div>
			       		</div>
			       		<div class="row">
			       			<div class="form-group col-md-6">
						      <label for="inputPostal">Postal Code</label>
						      <input type="text" name="postal" class="form-control" id="inputPostal" value="{{ old('postal') }}">
						      <span id="er_postal" class="errorSpan"></span>
						    </div>
						    <div class="form-group col-md-6">
						        <label for="inputCountry">Country</label>
						        <input type="text" name="country" class="form-control" id="inputCountry" value="{{ old('country') }}">
						        <span id="er_country" class="errorSpan"></span>
						      </div>
			       		</div>
			      </div>		      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary" id="add">Add</button>
			      </div>
			    </div>
				
			  </div>
			</div>
		</div>

		<script>
			$('#add').click(function(){
				$.ajax({
					type: 'post',
					url: '{{route('addcustomer')}}',
					data:{
						'_token': $('input[name=_token]').val(),
						'username': $('input[name=username]').val(),
						'sex': $('select[name=sex]').val(),
						'age': $('input[name=age]').val(),
						'address': $('input[name=address]').val(),
						'city': $('input[name=city]').val(),
						'province': $('select[name=province]').val(),
						'postal': $('input[name=postal]').val(),
						'country': $('input[name=country]').val()
					},
					success: function(data){
						if((data.errors)){ 
	                		$('#er_name').html(data.errors.username);
	                		$('#er_sex').html(data.errors.sex);
	                		$('#er_age').html(data.errors.age);
	                		$('#er_address').html(data.errors.address);
	                		$('#er_city').html(data.errors.city);
	                		$('#er_province').html(data.errors.province);
	                		$('#er_postal').html(data.errors.postal);
	                		$('#er_country').html(data.errors.country)
						}else{
							$('#er_name').html('');
	                		$('#er_sex').html('');
	                		$('#er_age').html('');
	                		$('#er_address').html('');
	                		$('#er_city').html('');
	                		$('#er_province').html('');
	                		$('#er_postal').html('');
	                		$('#er_country').html('');

	                		$('#inputName').val(''); $('#inputSex').val(''); $('#inputAge').val('');
							$('#inputAddress').val(''); $('#inputCity').val(''); $('#inputProvince').val('');
							$('#inputPostal').val(''); $('#inputCountry').val('');

							$('#myTable').append("<tr class='tr_post"+data.id+"'>"+
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
							  title: "Successfully Added!",
							  // text: "Successfully Added!",
							  icon: "success",
							});
						}
					},
				});
				
			});

		</script>
	<!-- end add -->