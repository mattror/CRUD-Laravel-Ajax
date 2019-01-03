<script>

	$(document).ready(function(){
		$('#myInput').keyup(function(){  //var s = $('input[name=name_search]').val(); alert(s)
			$.ajax({
				type: 'post',
				url: "{{route('search_customers')}}",
				data:{
					'_token': $('input[name=_token]').val(),
					'name_search': $('input[name=name_search]').val(),
					
				},
				dataType: 'json',
				success: function(data){
					$('#myTable').html(data.table_data)
					console.log(data);
				}
			});
		});
	});
</script>