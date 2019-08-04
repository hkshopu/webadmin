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
      <div class="box-header with-border">
        <h3 class="box-title"><?=$title?></h3>(#Blog record ID: <?=$blog->id?>) 
    </div><!-- /.box-header -->
    <form class="form-horizontal" id="blogDiv" method="POST" action="<?php echo base_url().'admin/blog/save' ?>"><!-- form start -->
        <div class="box-body">
          <div class="form-group">
            <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_blogshopname')?></label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="shopname" name="shopname" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_blogtitle')?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="title_en" name="title_en" value="<?=$blog->title_en?>" disabled>
              </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_blogtitle_tc')?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="title_tc" name="title_tc" value="<?=$blog->title_tc?>" disabled>
              </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_blogtitle_sc')?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="title_sc" name="title_sc" value="<?=$blog->title_sc?>" disabled>
              </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_blogcategory')?></label>
            <div class="col-sm-4">
              <select class="form-control" name="category" disabled>
                <option><?=$blog->category->name?></option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_blogcontent')?></label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="3" name="content_en" disabled><?=$blog->content_en?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_blogtitle_tc')?></label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="3" name="content_en" disabled><?=$blog->content_tc?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_blogtitle_sc')?></label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="3" name="content_en" disabled><?=$blog->content_sc?></textarea>
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

        var thumbnailUrls = <?php echo json_encode($imgUrls); ?>;

        $("#mydropzone").dropzone({
         autoProcessQueue: false,
         createImageThumbnails: true,
         url: '../upload/',
         clickable: false,
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
                  // Add optionally show the thumbnail of the file:
                  myDropzone.emit("thumbnail", mockFile, thumbnailUrls[i]);
                  myDropzone.files.push(mockFile);
                  myDropzone.emit("complete", mockFile);
                  myDropzone.createThumbnailFromUrl(mockFile, thumbnailUrls[i], function() {
                    myDropzone.emit("complete", mockFile);
                  }, "anonymous");
                }
              }
          }
        });
    });
    </script>
  </section><!-- /.content -->
  