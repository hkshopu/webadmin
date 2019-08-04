  <section class="content"><!-- Main content -->
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title"><?=$title?></h3>
      </div><!-- /.box-header -->
      <form class="form-horizontal" id="feeDiv" method="POST" action="<?php echo base_url().'admin/adorderfee/save' ?>"><!-- form start -->
      <div class="box-body">
        <div class="form-group">
          <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_adorderfee_from')?></label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="from" name="from">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_adorderfee_to')?></label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="to" name="to">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_adorderfee_price')?></label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="price" name="price">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-8"></div>
          <div class="col-sm-4">
            <div class="btn-toolbar pull-right">
              <button type="submit" id="addButton" name="saveFee" value="saveFee" class="btn btn-primary pull-right"><i class="fa fa-check"></i> <?=$this->lang->line('button_submit')?></button>
              <button type="button" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> <?=$this->lang->line('button_cancel')?></button>
            </div>
          </div>
        </div>
      </div><!-- /.box-body -->
    </form>
    </div><!-- /.box -->
  </section><!-- /.content -->
  