<!DOCTYPE html>
<html>
	<head>
		<title>HOMEWORK</title>
		<meta charset="UTF-8">
	  	<meta name="description" content="Lara">
	  	<meta name="keywords" content="Lara">
	  	<meta name="author" content="John Doe">
	  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css"> 
</head>
<body>
	<div class="clear-top"></div>
	<div class="container container-main">
		@yield('content')
	</div>
	
	<script>
			function myFunction() {
			  var input, filter, table, tr, td, i, txtValue;
			  input = document.getElementById("myInput");
			  filter = input.value.toUpperCase();
			  table = document.getElementById("myTable");
			  tr = table.getElementsByTagName("tr");
			  for (i = 0; i < tr.length; i++) {
			    td = tr[i].getElementsByTagName("td")[0];
			    if (td) {
			      txtValue = td.textContent || td.innerText;
			      if (txtValue.toUpperCase().indexOf(filter) > -1) {
			        tr[i].style.display = "";
			      } else {
			        tr[i].style.display = "none";
			      }
			    }       
			  }
			}
		
		</script>
		<script>
			function closeit(){
			var c = document.getElementById("closeEr");
			c.style.display="none";
		}
		</script>