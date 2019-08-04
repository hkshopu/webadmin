$(document).ready(function(){
  var id = $("#id").val();

if(!id)
{
  $(".dz-hidden-input").prop("disabled",true);
} 

  show_blogs();
  $('.blogs').DataTable({
    dom:  "<'row'<'col-md-6'l><'col-md-6'Bf>>" +
          "<'row'<'col-md-6'><'col-md-6'>>" +
          "<'row'<'col-md-12't>><'row'<'col-md-12'ip>>",
    buttons: [
                'csv', 'pdf', 'print'
            ]
    })


  $('#editButton').click(function(){
       $('#blogDiv').find('input, textarea, button, select').prop('disabled',false);
       $('#editButton').hide();
       $("#saveButton").toggleClass('invisible ');
       $('#cancelButton').prop('disabled', false);
    });

  $('#cancelButton').click(function(){
       $('#blogDiv').find('input, textarea, button, select').prop('disabled',true);
       $("#saveButton").toggleClass(' invisible');
       $('#editButton').show();
       $('#editButton').prop('disabled', false);
       $('#cancelButton').prop('disabled', true);
    });

});

function show_blogs()
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
                  '<td>Account Status</td>'+
                  '<td>'+
                      '<a href="blog/view/'+dat[i].id+'">Info</a> |'+
                      '<a href="blog/edit/'+dat[i].id+'" >Edit</a>  |'+
                      '<a href="blog/delete/'+dat[i].id+'" >Delete</a>'+
                  '</td></tr>';
        }
        $('#blogs_table').html(html);
      }
    });
}