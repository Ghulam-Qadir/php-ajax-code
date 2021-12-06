jQuery(document).ready(function() {
// read record to MySql from PHP using jQuery AJAX 
function loadtable() {
  $.ajax({
    url: 'ajax-load.php',
    type: 'GET',
    dataType: "json",
    success: function(data){
      $.each(data, function(key, item) {
       $('#ajaxdatadisplay').append(`<tr>
        <td>`+item.id+`</td>
        <td>`+item.name+`</td>
        <td>`+item.email+`</td>
        <td>`+item.address+`</td>
        <td>`+item.phone+`</td>
        <td>`+item.cname+`</td>
        <td><button value="`+item.id+`" class="edit btn btn-primary" data-toggle="modal" data-target="#editEmployeeModal">Edit</button</td>
        <td><button value="${item.id}" class="delete btn btn-danger">Delete</button</td>`)
     });
    }
  })
};
loadtable();
          // add record to MySql from PHP using jQuery AJAX 
          jQuery("#savebutton").on('click', function(e) {
            e.preventDefault();

            var namee = $("#name").val();
            var emaill = $("#email").val();
            var addresss = $("#address").val();
            var citynamess = $("#citynames").val();
            var phonee = $("#phone").val();

            $.ajax({
              url: 'ajax-insert.php',
              type: 'POST',
              cache:false, 
              data: {name1: namee, email1: emaill, address1: addresss, citynames1: citynamess, phone1: phonee},
              success: function (data) {
                if (data == '1') {
                  loadtable();
                }else{

                  alert("Data not insert");
                }
                
              }
            })
          });
// edit record to MySql from PHP using jQuery AJAX 
$(document).on("click",".edit",function(e){
  var id1 = $(this).val();
  $.ajax({
    url: 'ajax-edit.php',
    type: 'GET',
    dataType: "json",
    data:{editId: id1},
    success: function(data){
     console.log(data);
     // var obj = JSON.parse(data);

     // console.log( obj.name , "nme");
    },
    error:function(e) {
      console.log(e);
    }
  });
});
// update record to MySql from PHP using jQuery AJAX 
$(document).on("click","#updatebutton",function(e){
 e.preventDefault();

 var idupdate         = $("#updateidu").val();
 var nameupdate       = $("#nameu").val();
 var emailupdate      = $("#emailu").val();
 var addressupdate    = $("#addressu").val();
 var citynamesupdate  = $("#citynamesupdate").val();
 var phoneupdate      = $("#phoneu").val();

 $.ajax({
  url: 'ajax-update.php',
  type: 'POST',
  cache:false, 
  data: {id:idupdate ,name:nameupdate, email:emailupdate, address:addressupdate, city:citynamesupdate, phone:phoneupdate},
  success: function (data) {
    if (data == 1) {
      loadtable();
    }else{
      alert("Data not insert");
    } 
  }
})
});
 // Delete record to MySql from PHP using jQuery AJAX  
 $(document).on("click",".delete",function(){
  if (confirm("Are you sure delete this ?")) {
    var id1 = $(this).val();
    var e = this;
    console.log(id1);
    $.ajax({
      url :"ajax-delete.php",
      type:"POST",
      cache:false,
      data:{deleteId: id1},
      success:function(data){
        if(data == 1){
      // Remove row from HTML Table
      $(e).closest('tr').css('background','#f44336');
      $(e).closest('tr').fadeOut(1000,function(){
        $(this).remove();
      });
    }else{
      alert('Invalid ID.');
    }
  }
});
  }
});

 $("#myInput").on("keyup", function() {
  var value = $(this).val().toLowerCase();
  $("#ajaxdatadisplay tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
  });
});
});