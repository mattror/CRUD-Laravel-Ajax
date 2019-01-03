<!-- Preview -->
	<div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="modalLabel">Edit</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class=""> 
			<table class="table">
				<tbody>
					<tr><th>ID</th><td><span id="showId"></span></td></tr>
					<tr><th>Name</th><td><span id="showName"></span></td></tr>
					<tr><th>Gender</th><td><span id="showGender"></span></td></tr>
					<tr><th>Age</th><td><span id="showAge"></span></td></tr>
					<tr><th>Address</th><td><span id="showAdddress"></span></td></tr>
					<tr><th>City</th><td><span id="showCity"></span></td></tr>
					<tr><th>Province</th><td><span id="showProvince"></span></td></tr>
					<tr><th>Postal</th><td><span id="showPostal"></span></td></tr>
					<tr><th>Country</th><td><span id="showCountry"></span></td></tr>
				</tbody>
			</table>
	      </div>		      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
	      </div>
	    </div>
		
	  </div>
	</div>
	<script>
		$(document).on('click','.show-modal',function(){
			$('#showId').text($(this).data('id'));
			$('#showName').text($(this).data('name'));
			$('#showAge').text($(this).data('age'));
			$('#showGender').text($(this).data('gender'));
			$('#showAdddress').text($(this).data('address'));
			$('#showCity').text($(this).data('city'));
			$('#showProvince').text($(this).data('province'));
			$('#showPostal').text($(this).data('postal'));
			$('#showCountry').text($(this).data('country'));
		})
	</script>
<!-- End Preview -->