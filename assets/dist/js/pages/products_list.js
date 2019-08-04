$(document).ready(function(){
  $('.products').DataTable({
    dom:  "<'row'<'col-md-6'l><'col-md-6'Bf>>" +
          "<'row'<'col-md-6'><'col-md-6'>>" +
          "<'row'<'col-md-12't>><'row'<'col-md-12'ip>>",
    buttons: [
                {
                  extend: 'csv',
                  title: 'Product List',
                  messageTop: 'Product List',
                  exportOptions: {
                    columns: [0,1,2,3,4,5,6,7,8]
                  }
                },
                {
                  extend: 'pdf',
                  title: 'Product List',
                  exportOptions: {
                    columns: [0,1,2,3,4,5,6,7,8]
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
                  title: 'Product List',
                  exportOptions: {
                    columns: [0,1,2,3,4,5,6,7,8]
                  }
                }
            ],
      processing: true,
      serverSide: false,
      ajax: "product/lists",
      columnDefs: [
                    { 
                      className: 'text-right', targets: [4, 5, 6, 7] 
                    }
      ]
      /*columns: [
                {"data":"id"},
                {"data":"category"},
                {"data":"name_en"},
                {"data":"shop"},
                {"data":"originalprice", "className":"text-right"},
                {"data":"discountedprice", "className":"text-right"},
                {"data":"sell", "className":"text-right"},
                {"data":"stock", "className":"text-right"},
                {"data":"status"},
                {"data":"operate"}
      ]*/
  })

  //dynamic product stock field
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

function getSafe(fn, defaultVal) {
  try{
    return fn();
  } catch(e){
    return " ";
  }
}
