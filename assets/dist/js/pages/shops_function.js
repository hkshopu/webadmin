$(document).ready(function(){


  $(".tabs").not(":first").hide();

  $(".tab .control a").click(function() {
    showTab(this.href);
  });

  var tab = window.location.hash;
  if (tab)
    showTab(tab);



var id = $("#shop_id").val();

if(!id)
{
  $(".dz-hidden-input").prop("disabled",true);
  $(".dz-remove").hide();
  $(".dz-success-mark").hide();
  $(".dz-error-message").hide();
  $(".dz-error-mark").hide();
}

$('.products').DataTable({

      language: [{
          emptyTable: "No records found."
    }],
      processing: true,
      serverSide: false,
      ajax: "../productList/" + id,
      columns: [
                {"data":"id"},
                {"data":"name_en"},
                {"data":"originalprice", "className":"text-right"},
                {"data":"discountedprice", "className":"text-right"},
                {"data":"sell", "className":"text-right"},
                {"data":"stock", "className":"text-right"},
                {"data":"status"}
      ]
  })

//show_orders();
$('.orders').DataTable({
    
    processing: true,
    serverSide: false,
    ajax: "../orderList/" + id,
    columns: [
    {"data":"orderdate"},
    {"data":"createdate"},
    {"data":"id"},
    {"data":"buyer"},
    {"data":"orderstatus"},
    {"data":"paymentstatus"},
    {"data":"price", "className":"text-right"}
    ]
    })
///show_comments();
 
$('.comments').DataTable({
    language: [{
          emptyTable: "No records found."
    }],
    
       processing: true,
        serverSide: false,
        ajax: "../commentlist/" + id,
        columns: [
        {"data":"id"},
        {"data":"user"},
        {"data":"message"},
        {"data":"datetime"},
        {"data":"operate"}
        ]
    });

});


function showTab(tabId) {

  $('.tab').removeClass('active');
  $('.tab-pane').removeClass('active');
  $(tabId +'_li').addClass('active');
  $(tabId).addClass('active');
  
  
}

