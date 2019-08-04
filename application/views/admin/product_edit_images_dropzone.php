<script type="text/javascript">
Dropzone.autoDiscover = false;
$(document).ready(function(){
//Dropzone.autoDiscover = false;
  var id = $('#product_id').val();
  var thumbnailUrls = <?php echo json_encode($imgUrls); ?>;

  $("#mydropzone").dropzone({
   paramName: "image",
   maxFiles: 10,
   addRemoveLinks: true,
   autoProcessQueue: true,
   createImageThumbnails: true,
   url: '../upload/'+id,
   init: function () {

        var myDropzone = this;
       
        //Populate any existing thumbnails
        if (thumbnailUrls) {
            for (var i = 0; i < thumbnailUrls.length; i++) {
                var mockFile = { 
                   // name: "Jellyfish.jpg", 
                    size: 12345, 
                    type: 'image/jpeg', 
                    status: Dropzone.ADDED, 
                    url:  thumbnailUrls[i],
                    accepted: true
                };

                // Call the default addedfile event handler
                myDropzone.emit("addedfile", mockFile);

                // And optionally show the thumbnail of the file:
                myDropzone.emit("thumbnail", mockFile, thumbnailUrls[i]);

                myDropzone.files.push(mockFile);
                myDropzone.emit("complete", mockFile);
                myDropzone.createThumbnailFromUrl(mockFile, thumbnailUrls[i], function() {
                  myDropzone.emit("complete", mockFile);
                }, "anonymous");
            }
        }
      },
   removedfile: function(file) {

    var url = file.url;

      $.ajax({
        type: 'POST',
        url: '../deleteImage/',
        data: {id: id, img_url: url,request: 2},
        sucess: function(data){
          console.log('success: ' + data);
        }
      });

      var _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
   },
   maxfilesexceeded: function(file) {
    this.removeAllfiles();
    this.addFile(file);
   } 
});

/*$('#saveButton').click(function(){
     dp.processQueue();
});*/
});
</script>