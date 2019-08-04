$(document).ready(function(){
  
  show_products();
  $('.products').DataTable({
    dom:  "<'row'<'col-md-6'l><'col-md-6'Bf>>" +
          "<'row'<'col-md-6'><'col-md-6'>>" +
          "<'row'<'col-md-12't>><'row'<'col-md-12'ip>>",
    buttons: [
                'csv', 'pdf', 'print'
            ]
    })

var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".addButton"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="row"><div class="col-sm-2"><input type="text" class="form-control" id="size" name="size[]"></div><div class="col-sm-2"><input type="text" class="form-control" id="color" name="color[]"></div><div class="col-sm-2"><input type="text" class="form-control" id="other" name="other[]"></div><div class="col-sm-2"><input type="text" class="form-control" id="stock" name="stock[]"></div><div class="col-sm-4"><div class="btn-toolbar"><button type="button" class="btn btn-primary editButton"><i class="fa fa-pencil"></i></button><button type="button" class="btn btn-danger removeButton"><i class="fa fa-trash"></i></button></div></div></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".removeButton", function(e){ //user click on remove text
        e.preventDefault(); $(this).closest('.row').remove(); x--;
    })

});

function show_products()
{
    $.ajax({
      type: 'GET', 
      url:  'https://reqres.in/api/users?page=1',
      async: false,
      dataType: 'json',
      success: function(rec){
        var dat = rec.data;
        //console.log(dat.data);
        var html = '';
        var i;
        for(i=0; i<dat.length; i++)
        {
    
          html += '<tr>'+
                  '<td>'+dat[i].id+'</td>'+
                  '<td>'+dat[i].first_name+'</td>'+
                  '<td>Email</td>'+
                  '<td>User Type</td>'+
                  '<td>Shop</td>'+
                  '<td>Account Status</td>'+
                  '<td>Account Status</td>'+
                  '<td>Account Status</td>'+
                  '<td>Account Status</td>'+
                  '<td>'+
                      '<a href="product/view/'+dat[i].id+'">Info</a> |'+
                      '<a href="product/edit/'+dat[i].id+'" >Edit</a>  |'+
                      '<a href="product/delete/'+dat[i].id+'" >Delete</a>'+
                  '</td></tr>';
        }
        $('#products_table').html(html);
      }
    });
}

$('#editButton').click(function(){
       $('#productForm').find('input, textarea, button, select').prop('disabled',false);
       $('#editButton').hide();
       $("#saveButton").toggleClass('invisible ');
       $('#cancelButton').prop('disabled', false);
       $('#disableButton').prop('disabled', false);
    });

  $('#cancelButton').click(function(){
       $('#productForm').find('input, textarea, button, select').prop('disabled',true);
       $("#saveButton").toggleClass(' invisible');
       $('#editButton').show();
       $('#editButton').prop('disabled', false);
       $('#cancelButton').prop('disabled', true);
    });