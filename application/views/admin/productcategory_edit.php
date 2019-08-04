  <section class="content"><!-- Main content -->    
    <div class="box box-primary"><!-- Horizontal Form -->
      <div class="box-header with-border">
        <h3 class="box-title"><?=$this->lang->line('form_title_productcategoryedit')?></h3>
    </div><!-- /.box-header -->
    <form class="form-horizontal" method="POST" action="<?php echo base_url().'admin/productcategory/save' ?>"><!-- form start -->
    <?php $this->view('admin/alert_message');?>
      <div class="box-body">
        <div class="form-group">
          <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_productcategoryname')?></label>
          <div class="col-sm-4">
            <input type="hidden" class="form-control" id="categoryid" name="categoryid" value="<?=$productCategory->id;?>" required>
            <input type="hidden" class="form-control" id="parentcategoryid" name="parentcategoryid" value="<?=$productCategory->parent_category_id;?>" required>
            <input type="text" class="form-control" id="categoryname" name="categoryname" value="<?=$productCategory->name;?>" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_productcategorystatus')?></label>
          <div class="col-sm-4">
            <select class="form-control" id="status" name="status">
              <?php foreach($statuses as $status) {?>
              <option value="<?=$status->id?>" <?=($productCategory->status == $status->name) ? 'selected="selected"' : '';?>><?=ucfirst($status->name)?></option>
            <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-2"></div>
          <div class="col-sm-5">
            <div class="btn-toolbar pull-right">
              <button type="submit" class="btn btn-primary pull-right" name="saveProdCat" value="saveProdCat"><i class="fa fa-check"></i> <?=$this->lang->line('button_submit')?></button>
              <button type="button" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> <?=$this->lang->line('button_cancel')?></button>
            </div>
          </div>
        </div>
      </div> <!-- /.box-body -->
    </form>
  </section><!-- /.section -->
  