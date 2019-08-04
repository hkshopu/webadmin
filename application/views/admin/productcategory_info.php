  <section class="content"><!-- Main content -->    
    <div class="box box-primary"><!-- Horizontal Form -->
      <div class="box-header with-border">
        <h3 class="box-title"><?=$this->lang->line('form_title_productcategoryinfo')?></h3>
    </div><!-- /.box-header -->
    <form class="form-horizontal"><!-- form start -->
      <div class="box-body">
        <div class="form-group">
          <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_productcategoryname')?></label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="categoryname" name="categoryname" value="<?=$productCategory->name;?>" disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_productcategorystatus')?></label>
          <div class="col-sm-4">
            <select class="form-control" id="status" name="status" disabled>
              <option <?=($productCategory->status == 'active') ? 'selected="selected"' : '';?>>Active</option>
              <option <?=($productCategory->status != 'active') ? 'selected="selected"' : '';?>>Disable</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-2"></div>
          <div class="col-sm-5">
            <!--<div class="btn-toolbar pull-right">
              <button type="submit" class="btn btn-primary pull-right" value="saveProdCat"><i class="fa fa-check"></i> Submit</button>
              <button type="button" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> Cancel</button>
            </div>-->
          </div>
        </div>
      </div> <!-- /.box-body -->
    </form>
  </section><!-- /.section -->
  