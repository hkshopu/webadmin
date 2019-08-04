  <?php 
                  if($blog->image)
                  {
                    foreach($blog->image as $img)
                    {
                      $imgUrls[] = $img->url;
                    }
                  } 
                ?>
  <section class="content"> <!-- Main content -->
    <div class="box box-primary"><!-- Horizontal Form -->
      <form class="form-horizontal" id="blogDiv" method="POST" action="<?php echo base_url().'admin/blog/save' ?>"><!-- form start -->
      <div class="box-header with-border">
        <h3 class="box-title"><?=$title?></h3>(#Blog record ID: <?=$blog->id?>) 
        <div class="btn-toolbar pull-right">
          <button type="submit" id="saveButton" name="saveBlog" value="saveBlog" class="btn btn-primary pull-right"><i class="fa fa-check"></i> <?=$this->lang->line('button_submit')?></button>   
          <button type="button" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i>    <?=$this->lang->line('button_cancel')?></button>
        </div>   
    </div><!-- /.box-header -->
   
      <?php $this->view('admin/alert_message');?>
        <div class="box-body">
          <div class="form-group">
            <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_blogshopname')?></label>
            <div class="col-sm-10">
              <input type="hidden" class="form-control" id="shop_id" name="shop_id" value="<?=$blog->shop_id?>">
              <input type="hidden" class="form-control" id="id" name="id" value="<?=$blog->id?>">
              <input type="text" class="form-control" id="shopname" name="shopname">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_blogtitle')?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="title_en" name="title_en" value="<?=$blog->title_en?>" required>
              </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_blogtitle_tc')?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="title_tc" name="title_tc" value="<?=$blog->title_tc?>" >
              </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_blogtitle_sc')?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="title_sc" name="title_sc" value="<?=$blog->title_sc?>" >
              </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_blogcategory')?></label>
            <div class="col-sm-4">
              <select class="form-control" name="category" required>
                <?php foreach($blogCategory as $blogCat) {?>
                <option value="<?=$blogCat->id?>" <?php if($blog->category->id == $blogCat->id) echo 'selected';?>><?=$blogCat->name?></option>
              <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_blogcontent')?></label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="3" name="content_en" required><?=$blog->content_en?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_blogtitle_tc')?></label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="3" name="content_tc"><?=$blog->content_tc?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_blogtitle_sc')?></label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="3" name="content_sc"><?=$blog->content_sc?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">(<?php if($imgUrls) {echo count($imgUrls);}?>/10)</label>
            <div class="col-sm-10">
              <div class="dropzone col-sm-12" id="mydropzone" disabled>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-2"></div>
            <div class="col-sm-3">
              <table>
                <tr>
                  <td><i class="fa fa-eye"></i></td>
                  <td><h5><?=$this->lang->line('lbl_blogranking')?></h5></td>
                  <td><?=$blog->views?></td>
                </tr>
              </table>
            </div>
            <div class="col-sm-3">
              <table>
                <tr>
                  <td><i class="fa fa-heart"></i></td>
                  <td><h5><?=$this->lang->line('lbl_bloglike')?></h5></td>
                  <td><?=$blog->likes?></td>
                </tr>
              </table>
            </div>
            <div class="col-sm-3">
              <table>
                <tr>
                  <td><i class="fa fa-comments-o"></i></td>
                  <td><h5><?=$this->lang->line('lbl_blogcomment')?></h5></td>
                  <td><?=$blog->comments?></td>
                </tr>
              </table>
            </div>
          </div>
          <?php $ctr = 0; foreach($blogcomments as $blogcomment) { ?>
          <div class="form-group">
            <?php if($ctr < 1) {?>
            <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_blogcomment')?></label>
            <?php } else { ?>
            <label class="col-sm-2 control-label"></label>
          <?php } ?>
            <div class="col-sm-2">
              <div class="user-block">
                <img class="img-circle img-bordered-sm" src="<?=base_url()?>assets/dist/img/user1-128x128.jpg" alt="user image">
              </div>
                <span class="username"><!-- /.user-block -->
                  <a href="#"><?=$blogcomment->user_name?></a>
                </span>
            </div>
            <div class="col-sm-6">        
              <div class="post"><!-- Post -->  
                <p>
                  <?=$blogcomment->content?>
                </p>
              </div><!-- /.post -->
            </div>
          </div>
        <?php $ctr++; } ?>
        </div>
      </form>
    </div>
    <script type="text/javascript">
Dropzone.autoDiscover = false;
$(document).ready(function(){
//Dropzone.autoDiscover = false;
  var id = $('#id').val();
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
  </section><!-- /.content -->
  