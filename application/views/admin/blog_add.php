  <section class="content"><!-- Main content -->
    <div class="box box-primary"><!-- Horizontal Form -->
      <div class="box-header with-border">
        <h3 class="box-title"><?=$title?></h3> 
        <?php $this->view('admin/alert_message');?>
      </div><!-- /.box-header -->
      <form class="form-horizontal" id="blogDiv" method="POST" action="<?php echo base_url().'admin/blog/save' ?>"><!-- form start -->
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_blogtitle')?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="title_en" name="title_en">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_blogtitle_tc')?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="title_tc" name="title_tc">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_blogtitle_sc')?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="title_sc" name="title_sc">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_blogcategory')?></label>
              <div class="col-sm-4">
                <select class="form-control" name="category">
                  <?php foreach($blogCategory as $blogCat) { ?>
                  <option value="<?=$blogCat->id?>"><?=$blogCat->name?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
            <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_blogcontent')?></label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="3" name="content_en" required></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_blogtitle_tc')?></label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="3" name="content_tc"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_blogtitle_sc')?></label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="3" name="content_sc"></textarea>
            </div>
          </div>
          <!--
            <div class="form-group">
              <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_blogimage')?></label>
                <div class="col-sm-4">
                  <button type="button" class="btn btn-primary"><?=$this->lang->line('lbl_bloguploadfile')?></button>
                </div>
            </div>
            <div class="form-group">
              <div class="col-sm-2"></div>
                <div class="col-sm-10">
                  <img src="http://placehold.it/150x100" alt="..." class="margin">
                  <img src="http://placehold.it/150x100" alt="..." class="margin">
                  <img src="http://placehold.it/150x100" alt="..." class="margin">
                  <img src="http://placehold.it/150x100" alt="..." class="margin">
                </div>
            </div> -->
            <div class="form-group">
              <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_blogalwaysontop')?></label>
              <div class="col-sm-4">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" id="is_top" name="is_top">
                  </label>
                </div>
                </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_stardatetime')?></label>
                <div class="date col-sm-4">
                  <div class="input-group date">
                    <input type="text" class="form-control pull-right" id="datepicker" name="publish_date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                  </div>
                </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_enddatetime')?></label>
                <div class="date col-sm-4">
                  <div class="input-group date">
                    <input type="text" class="form-control pull-right" id="datepicker1" name="end_date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                  </div>
                </div>
            </div>
            <div class="form-group">
              <div class="col-sm-8"></div>
              <div class="col-sm-4">
                <div class="btn-toolbar pull-right">
                  <button type="submit" id="addButton" name="addBlog" value="addBlog" class="btn btn-primary pull-right"><i class="fa fa-check"></i> <?=$this->lang->line('button_submit')?></button>
                <button type="button" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> <?=$this->lang->line('button_cancel')?></button>
                </div>
              </div>
            </div>   
          </div><!-- /.box-body -->
        </div><!-- /.box-body -->
      </form>
    </div>    
  </section><!-- /.content -->
  