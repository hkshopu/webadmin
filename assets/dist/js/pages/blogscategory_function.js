$(document).ready(function(){
  show_blogcategory();
  $('.blogscategory').DataTable({
    dom:  "<'row'<'col-md-6'l><'col-md-6'Bf>>" +
          "<'row'<'col-md-6'><'col-md-6'>>" +
          "<'row'<'col-md-12't>><'row'<'col-md-12'ip>>",
    buttons: [
                'csv', 'pdf', 'print'
            ]
    })
});

function show_blogcategory()
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
                  '<td>Email</td>'+
                  '<td>'+
                      '<a href="blogcategory/view/'+dat[i].id+'">Info</a> |'+
                      '<a href="blogcategory/edit/'+dat[i].id+'" >Edit</a>  |'+
                      '<a href="blogcategory/delete/'+dat[i].id+'" >Delete</a>'+
                  '</td></tr>';
        }
        $('#blogscategory_table').html(html);
      }
    });
}