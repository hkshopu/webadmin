$(document).ready(function(){
  //show_shops();
  $('.blogs').DataTable({
    dom:  "<'row'<'col-md-6'l><'col-md-6'Bf>>" +
          "<'row'<'col-md-6'><'col-md-6'>>" +
          "<'row'<'col-md-12't>><'row'<'col-md-12'ip>>",
    buttons: [
                {
                  extend: 'csv',
                  title: 'Blog List',
                  messageTop: 'Blog List',
                  exportOptions: {
                    columns: [0,1,2,3,4,5,6,7,8,9]
                  }
                },
                {
                  extend: 'pdf',
                  title: 'Blog List',
                  exportOptions: {
                    columns: [0,1,2,3,4,5,6,7,8,9]
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
                  title: 'Blog List',
                  exportOptions: {
                    columns: [0,1,2,3,4,5,6,7,8,9]
                  }
                }
            ],
    processing: true,
    serverSide: false,
    ajax: "blog/list",
    columns: [
    {"data":"id"},
    {"data":"title"},
    {"data":"category"},
    {"data":"topping"},
    {"data":"publishdate"},
    {"data":"enddate"},
    {"data":"views"},
    {"data":"likes"},
    {"data":"comments"},
    {"data":"status"},
    {"data":"operate"}
    ]
    })
});
