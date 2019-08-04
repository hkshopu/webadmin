$(document).ready(function(){
  //show_shops();
  $('.blogscategory').DataTable({
    dom:  "<'row'<'col-md-6'l><'col-md-6'Bf>>" +
          "<'row'<'col-md-6'><'col-md-6'>>" +
          "<'row'<'col-md-12't>><'row'<'col-md-12'ip>>",
    buttons: [
                {
                  extend: 'csv',
                  title: 'Blog Category List',
                  messageTop: 'Blog Category List',
                  exportOptions: {
                    columns: [0,1,2,3]
                  }
                },
                {
                  extend: 'pdf',
                  title: 'Blog Category List',
                  exportOptions: {
                    columns: [0,1,2,3]
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
                  title: 'Blog Category List',
                  exportOptions: {
                    columns: [0,1,2,3]
                  }
                }
            ],
    processing: true,
    serverSide: false,
    ajax: "blogcategory/list",
    columns: [
    {"data":"id"},
    {"data":"name"},
    {"data":"category"},
    {"data":"status"},
    {"data":"operate"}
    ]
    })
});
