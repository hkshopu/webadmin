  <section class="content"><!-- Main content -->
    <div class="box box-primary"><!-- Horizontal Form -->
      <div class="box-header with-border">
        <h3 class="box-title"><?=$title?></h3>
      </div><!-- /.box-header -->
      <form class="form-horizontal"><!-- form start -->
        <div class="box-body">
          <div class="form-group">
            <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_blogcategoryname')?></label>
            <div class="col-sm-4">
              <input type="hidden" class="form-control" id="category_id" value="<?=$blogcategory->id?>">
              <input type="text" class="form-control" id="categoryname" value="<?=$blogcategory->name?>" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_blogtype')?></label>
            <div class="col-sm-4">
              <select class="form-control" disabled>
                <option>Public</option>
                <option>Private</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_blogstatus')?></label>
            <div class="col-sm-4">
              <select class="form-control" disabled>
                <option <?php if($blogcategory->status == 'active') echo 'selected';?>>Active</option>
                <option <?php if($blogcategory->status == 'disable') echo 'selected';?>>Inactive</option>
              </select>
            </div>
          </div>
          <!--<div class="form-group">
            <div class="col-sm-2"></div>
            <div class="col-sm-5">
              <div class="btn-toolbar pull-right">
                <button type="button" class="btn btn-primary pull-right"><i class="fa fa-check"></i> <?=$this->lang->line('button_submit')?></button>   
                <button type="button" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i>    <?=$this->lang->line('button_cancel')?></button>
              </div>
            </div>
          </div> -->
        </div>
      </form>
    </div>
  </section><!-- /.content -->
  