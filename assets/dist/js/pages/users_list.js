$(document).ready(function(){
  //show_shops();
  $('.users').DataTable({
    dom:  "<'row'<'col-md-6'l><'col-md-6'Bf>>" +
          "<'row'<'col-md-6'><'col-md-6'>>" +
          "<'row'<'col-md-12't>><'row'<'col-md-12'ip>>",
    buttons: [
                {
                  extend: 'csv',
                  title: 'Users List',
                  messageTop: 'Shop List',
                  exportOptions: {
                    columns: [0,1,2,3,4,5]
                  }
                },
                {
                  extend: 'pdf',
                  title: 'Users List',
                  exportOptions: {
                    columns: [0,1,2,3,4,5]
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
                  title: 'Users List',
                  exportOptions: {
                    columns: [0,1,2,3,4,5]
                  }
                }
            ],
    processing: true,
    serverSide: true,
    ajax: "user/list"//,
    /*columns: [
    {"data":"id"},
    {"data":"username"},
    {"data":"email"},
    {"data":"user_type"},
    {"data":"shop"},
    {"data":"status"},
    {"data":"operate"}
    ]*/
    })

 /* var table = $('.users').DataTable();

  $('.users').on( 'draw.dt', function () {
  var info = table.page.info();
  console.log(info);
  });*/

});


