$(document).ready(function(){

$(".tabs").not(":first").hide();

  $(".tab .control a").click(function() {
    showTab(this.href);
  });

  var tab = window.location.hash;
  if (tab)
    showTab(tab);

if($("#productimage").attr('src') == "")
{
  $("#productimage").attr("src", "https://via.placeholder.com/150");
} 


if($('input[type=radio][name=optionsRadios]').val() == 'free')
{
   $('#shipmentprice').prop('disabled', true);
}

var id = $("#product_id").val();

if(!id)
{
  $(".dz-hidden-input").prop("disabled",true);
  $(".dz-remove").hide();
  $(".dz-success-mark").hide();
  $(".dz-error-message").hide();
  $(".dz-error-mark").hide();
}


var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".addButton"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();


        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="row"><div class="col-sm-2"><input type="hidden" id="row_id" name="row_id[]"><select class="form-control" id="size_'+x+'" name="size[]" required><option></option></select></div><div class="col-sm-2"><select class="form-control" id="color_'+x+'" name="color[]" required><option></option></select></div><div class="col-sm-2"><input type="text" class="form-control" id="other" name="other[]"></div><div class="col-sm-2"><input type="text" class="form-control" id="stock" name="stock[]" required></div><div class="col-sm-4"><div class="btn-toolbar"><button type="button" class="btn btn-danger removeButton"><i class="fa fa-trash"></i></button></div></div></div>'); //add input box
          $.ajax({
            url: '../../dropdownlist/colors',
            type: 'get',
            dataType: 'json',
            success:function(response){

                var len = response.length;

                for( var i = 0; i<len; i++){
                    var id = response[i]['id'];
                    var name = response[i]['name'];
                    
                    //alert(name);
                    $("#color_"+x).append("<option value='"+id+"'>"+name+"</option>");

                }
            }
        });

        $.ajax({
            url: '../../dropdownlist/sizes',
            type: 'get',
            dataType: 'json',
            success:function(response){

                var len = response.length;

                for( var i = 0; i<len; i++){
                    var id = response[i]['id'];
                    var name = response[i]['name'];
                    
                    //alert(name);
                    $("#size_"+x).append("<option value='"+id+"'>"+name+"</option>");

                }
            }
        });

        }
    });
    
    $(wrapper).on("click",".removeButton", function(e){ //user click on remove text

     var del_id = $(this).attr("value");

        $('#toremove').val($('#toremove').val() + "+" + del_id);

        e.preventDefault(); $(this).closest('.row').remove(); x--;
    })
});


$('#editButton').click(function(){
       $('#productForm').find('input, textarea, button, select').prop('disabled',false);
       $('#editButton').hide();
       $("#saveButton").toggleClass('invisible ');
       $('#cancelButton').prop('disabled', false);
       $('#disableButton').prop('disabled', false);
    });

$('#cancelButton').click(function(){
       $('#productForm').find('input, textarea, button, select').prop('disabled',true);
       $("#saveButton").toggleClass(' invisible');
       $('#editButton').show();
       $('#editButton').prop('disabled', false);
       $('#cancelButton').prop('disabled', true);
  });

$('input[type=radio][name=optionsRadios]').change(function() {
    if (this.value == 'free') {
      $("#each").prop("checked", true);
      $('#shipmentprice').prop('disabled', true);
    }
    else if (this.value == 'each') {
      $('#shipmentprice').prop('disabled', false);
    }
});

$("#shipmentprice").keyup(function(e){  
          $("#free").prop("checked", false);
          $("#each").prop("checked", true);

      });

function showTab(tabId) {

  $('.tab').removeClass('active');
  $('.tab-pane').removeClass('active');
  $(tabId +'_li').addClass('active');
  $(tabId).addClass('active');
  
  
}

