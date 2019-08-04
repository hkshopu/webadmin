  <section class="content"><!-- Main content -->
    <div class="box box-primary">
      <div class="box-header">
        <?php $this->view('admin/alert_message');?>
        <h3 class="box-title"><?=$this->lang->line('form_title_productcategorylist')?></h3>
          <button type="button" class="btn btn-primary pull-right" onclick="location.href='<?=base_url('admin/productcategory/add') ?>';"><i class="fa fa-plus"></i> <?=$this->lang->line('button_addnewproductcategory')?></button>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="datatable-buttons" class="productscategory table table-bordered table-striped">
          <thead>
            <tr>
              <th><?=$this->lang->line('lbl_productcategoryid')?></th>
              <th><?=$this->lang->line('lbl_productcategoryname')?></th>
              <th><?=$this->lang->line('lbl_productcategorystatus')?></th>
              <th><?=$this->lang->line('lbl_productcategoryoperate')?></th>
            </tr>
          </thead>
          <tbody id = "productscategory_table">    
          </tbody>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </section><!-- /.content -->
