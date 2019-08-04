  <section class="content"><!-- Main content -->
    <div class="box box-primary"><!-- Horizontal Form -->
      <div class="box-header with-border">
        <h3 class="box-title"><?=$title?></h3>
      </div><!-- /.box-header -->
      <form class="form-horizontal" id="blogCategoryForm" method="POST" action="<?php echo base_url().'admin/blogcategory/save' ?>"><!-- form start -->
        <?php $this->view('admin/alert_message');?>
        <div class="box-body">
          <div class="form-group">
            <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_blogcategoryname')?></label>
            <div class="col-sm-4">
              <input type="hidden" class="form-control" id="categoryid" name="categoryid" value="<?=$blogcategory->id?>">
              <input type="text" class="form-control" id="categoryname" name="categoryname" value="<?=$blogcategory->name?>" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_blogtype')?></label>
            <div class="col-sm-4">
              <select class="form-control" name="type">
                <option>Public</option>
                <option>Private</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_blogstatus')?></label>
            <div class="col-sm-4">
              <select class="form-control" name="status">
                <option value="1" <?php if($blogcategory->status == 'active') echo 'selected';?>>Active</option>
                <option value="2" <?php if($blogcategory->status == 'disable') echo 'selected';?>>Disable</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-2"></div>
            <div class="col-sm-5">
              <div class="btn-toolbar pull-right">
                <button type="submit" id="saveButton" name="saveBlogCategory" value="saveBlogCategory" class="btn btn-primary pull-right"><i class="fa fa-check"></i> <?=$this->lang->line('button_submit')?></button>   
                <button type="button" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i>    <?=$this->lang->line('button_cancel')?></button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section><!-- /.content -->
  