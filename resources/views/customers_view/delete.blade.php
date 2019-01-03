<!-- Delete -->
	<input type="hidden" name="del_id" id="deleteModal">
	<script>
		
		$(document).on('click','.delete-modal',function(){ 
			$('#deleteModal').val($(this).data('id'));
			
			swal({
			  title: "Are you sure to delete?",
			  text: "Once deleted, you will not be able to recover this customer info!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then(function(willDelete) {
			  if (willDelete) {
			  	$.ajax({
			  		type: "post",
			  		url: "{{route('deletecustomer')}}",
			  		data:{
			  			'_token': $('input[name=_token]').val(),
			  			'id': $('input[name=del_id]').val(),
			  		},
			  		success: function(data){
			  			if(data.errors){
			  				swal("Unable to delete!",'failed to delete customer info','error');
			  			}else{ 
			  				$('.tr_post'+data.id).remove(); 
			  				swal("Delete Successfully!",'your customer info is deleted','success');
			  			}
			  		}
			  	})
			  } else {
			    swal("Your customer info is safe!");
			  }
			});
			$('.swal-text').css({'padding':'10px','text-align':'center','margin':'15px 0'});
		})
		
	</script>
<!-- End Delete -->