jQuery(document).ready(function() {
/*function datashow(alldata){
     //var alldata = JSON.stringify(alldata, null , ' ');
      console.table(alldata);
    }*/
    var alldata = []
// read record to MySql from PHP using jQuery AJAX 
function loadtable() {
  $.ajax({
    url: 'ajax-load.php',
    type: 'GET',
    dataType: "json",
    success: function(data){
      //datashow(data);
      alldata = data;
      $('#ajaxdatadisplay').html("");
      $.each(data, function(key, item) {
       $('#ajaxdatadisplay').append(`<tr>
        <td>`+item.id+`</td>
        <td><img src=""></td>
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
/*          jQuery("#savebutton").on('click', function(e) {
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
              contentType: false,
              processData: false,
              data: {name1: namee, email1: emaill, address1: addresss, citynames1: citynamess, phone1: phonee},
              success: function (data) {
                if (data == '1') {
                  loadtable();
                }else{

                  alert("Data not insert");
                }
                
              }
            })
          });*/


  /*$("#formidforalldata").submit(function(e){
  e.preventDefault();
    var action = $(this).attr('action');
    var method = $(this).attr('method');
    var form = $(this).serialize();
    console.log(form);
           $.ajax({
              url: action,
              type: method,
              cache:false,
              contentType: false,
              processData: false,
              data: form,
              success: function (response) {
                console.log(response);
              }
            })
  $("#addEmployeeModal").modal('hide');
});*/

$("#formidforalldata").on("submit", function(event){
 event.preventDefault();
 let insertformdata = new FormData(this);
 let url = $(this).attr("action");
 let type =$(this).attr("method");
 $.ajax({
  url: url,
  type: type,            
  data: insertformdata,
  processData: false,
  contentType: false,
  success: function (data)
  {
    var obj = jQuery.parseJSON(data);
    if(obj.status == 200){
      $("#addEmployeeModal").modal("hide")
      loadtable();
    }
  }
});

});




// edit record to MySql from PHP using jQuery AJAX 
$(document).on("click",".edit",function(e){
  loadtable();
  var id1 = $(this).val();
  var item = alldata.find(item => item.id == id1);
  console.log(item);
  $("#updateidu").val(item.id);
  $("#update_name").val(item.name);
  $("#update_email").val(item.email);
  $("#update_address").val(item.address);
  $("#update_phone").val(item.phone);
  $('#citynamesupdateselect option[value="'+item.cid+'"]').attr("selected", "selected");
  /*$('#citynamesupdateselect').append(`<option value="${item.cname}">${item.cname}</option>`);*/
/*  $.ajax({
    url: 'ajax-edit.php',
    type: 'GET',
    dataType: 'json',
    // contentType: "application/json; charset=utf-8",
    data:{editId: id1},
    success: function(data){
      datashow(data);
    },
    error:function(e) {
      console.log(e);
    }
  });*/
});
// update record to MySql from PHP using jQuery AJAX 
$("#updateEmployeeModaldata").on("submit", function(event){
 event.preventDefault();
 let updateformdata = new FormData(this);
 let url = $(this).attr("action");
 let type =$(this).attr("method");
 $.ajax({
  url: url,
  type: type,
  data: updateformdata,
  processData: false,
  contentType: false,
  success: function (data) {
    var objupdate = jQuery.parseJSON(data);
    if(objupdate.status == 200){
    $("#editEmployeeModal").modal("hide")
      loadtable();
    }
  }
})
});
 // Delete record to MySql from PHP using jQuery AJAX  
 $(document).on("click",".delete",function(){
  if (confirm("Are you sure delete this ?")) {
    var id1 = $(this).val();
    var e = this;
    $.ajax({
      url :"ajax-delete.php",
      type:"GET",
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
