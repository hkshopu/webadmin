$(document).ready(function(){
  //show_shops();
  $('.orders').DataTable({
    dom:  "<'row'<'col-md-6'l><'col-md-6'Bf>>" +
          "<'row'<'col-md-6'><'col-md-6'>>" +
          "<'row'<'col-md-12't>><'row'<'col-md-12'ip>>",
    buttons: [
                {
                  extend: 'csv',
                  title: 'Order List',
                  messageTop: 'Order List',
                  exportOptions: {
                    columns: [0,1,2,3,4,5,6]
                  }
                },
                {
                  extend: 'pdf',
                  title: 'Order List',
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
                  title: 'Order List',
                  exportOptions: {
                    columns: [0,1,2,3,4,5,6]
                  }
                }
            ],
    processing: true,
    serverSide: false,
    ajax: "order/list",
    columns: [
    {"data":"id"},
    {"data":"user"},
    {"data":"shop"},
    {"data":"item", "className":"text-right"},
    {"data":"price", "className":"text-right"},
    {"data":"orderdate"},
    {"data":"status"},
    {"data":"operate"}
    ]
    })

});


