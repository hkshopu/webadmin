$(document).ready(function(){
  //show_shops();
  $('.shops').DataTable({
    dom:  "<'row'<'col-md-6'l><'col-md-6'Bf>>" +
          "<'row'<'col-md-6'><'col-md-6'>>" +
          "<'row'<'col-md-12't>><'row'<'col-md-12'ip>>",
          deferRender: true,
    buttons: [
                {
                  extend: 'csv',
                  title: 'Shop List',
                  messageTop: 'Shop List',
                  exportOptions: {
                    columns: [0,1,2,3,4,5,6]
                  }
                },
                {
                  extend: 'pdf',
                  title: 'Shop List',
                  exportOptions: {
                    columns: [0,1,2,3,4,5,6]
                  },
                  customize: function(doc) {
                    doc.styles.tableHeader = {
                      color: 'black',
                      background: 'white'
                    }
                  }
                },
                {
                  extend: 'print',
                  title: 'Shop List',
                  exportOptions: {
                    columns: [0,1,2,3,4,5,6]
                  }
                }
            ],
    processing: true,
    serverSide: false,
    ajax: "shop/list",
    columns: [
    {"data":"id"},
    {"data":"name"},
    {"data":"owner"},
    {"data":"email"},
    {"data":"description"},
    {"data":"category"},
    {"data":"status"},
    {"data":"operate"}
    ]
    })
});

function show_shops()
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
                  '<td>'+
                      '<a href="shop/view/'+dat[i].id+'">Info</a> |'+
                      '<a href="shop/edit/'+dat[i].id+'" >Edit</a>  |'+
                      '<a href="shop/delete/'+dat[i].id+'" >Delete</a>'+
                  '</td></tr>';
        }
        $('#shops_table').html(html);
      }
    });
}

