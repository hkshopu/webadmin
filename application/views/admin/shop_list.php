<section class="content"><!-- Main content -->
    <div class="box box-primary">
      <div class="box-header">
        <?php $this->view('admin/alert_message');?>
        <h3 class="box-title"><?=$this->lang->line('form_title_shoplist')?></h3>
        <button type="button" class="btn btn-primary pull-right" onclick="location.href='<?=base_url('admin/shop/add') ?>';"><i class="fa fa-plus"></i> <?=$this->lang->line('button_add')?></button>
      </div>
      <div class="box-body"><!-- /.box-header -->
        <table id="datatable-buttons" class="shops table table-bordered table-striped">
          <thead>
            <tr>
              <th><?=$this->lang->line('tbl_col_shopid')?></th>
              <th><?=$this->lang->line('tbl_col_shopname')?></th>
              <th><?=$this->lang->line('tbl_col_shopowner')?></th>
              <th><?=$this->lang->line('tbl_col_shopemail')?></th>
              <th><?=$this->lang->line('tbl_col_shopdescription')?></th>
              <th><?=$this->lang->line('tbl_col_shopcategory')?></th>
              <th><?=$this->lang->line('tbl_col_shopstatus')?></th>
              <th><?=$this->lang->line('tbl_col_shopoperate')?></th>
            </tr>
          </thead>
          <tbody id = "shops_table">      
          </tbody>
        </table>
      </div><!-- /.box-body -->  
    </div><!-- /.box -->
  </section><!-- /.content -->

  