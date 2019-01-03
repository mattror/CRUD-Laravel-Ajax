// $('#add').click(function(){
//         $.ajax({
//             type: 'post',
//             url: '{{route('addcustomer')}}',
//             data:{
//                 '_token': $('input[name=_token]').val(),
//                 'username': $('input[name=username]').val(),
//                 'sex': $('select[name=sex]').val(),
//                 'age': $('input[name=age]').val(),
//                 'address': $('input[name=address]').val(),
//                 'city': $('input[name=city]').val(),
//                 'province': $('select[name=province]').val(),
//                 'postal': $('input[name=postal]').val(),
//                 'country': $('input[name=country]').val()
//             },
//             success: function(data){
//                 if((data.errors)){
//                     $('#er_name').html(data.errors.username)
//                 }else{
//                     $('#myTable').append("<tr><td>"+data.name+"</td></tr>");
//                 }
//             },
//         });
//         $('#inputName').val(''); $('#inputSex').val(''); $('#inputAge').val('');
//         $('#inputAddress').val(''); $('#inputCity').val(''); $('#inputProvince').val('');
//         $('#inputPostal').val(''); $('#inputCountry').val('');
//     });

$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});

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
		
function closeit(){
	var c = document.getElementById("closeEr");
	c.style.display="none";
}