$(document).ready(function(){

  $('.productscategory').DataTable({
    dom:  "<'row'<'col-md-6'l><'col-md-6'Bf>>" +
          "<'row'<'col-md-6'><'col-md-6'>>" +
          "<'row'<'col-md-12't>><'row'<'col-md-12'ip>>",
    buttons: [
                {
                  extend: 'csv',
                  title: 'Product Category List',
                  messageTop: 'Product Category List',
                  exportOptions: {
                    columns: [0,1,2]
                  }
                },
                {
                  extend: 'pdf',
                  title: 'Product Category List',
                  exportOptions: {
                    columns: [0,1,2]
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
                  title: 'Product Category List',
                  exportOptions: {
                    columns: [0,1,2]
                  }
                }
            ],
       processing: true,
    serverSide: false,
    ajax: "productcategory/list",
    columns: [
    {"data":"id"},
    {"data":"name"},
    {"data":"status"},
    {"data":"operate"}
    ]
    }) 
});
