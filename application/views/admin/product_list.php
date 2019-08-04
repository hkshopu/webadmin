  <section class="content"><!-- Main content -->
    <div class="box box-primary">
      <div class="box-header">
        <?php $this->view('admin/alert_message');?>
        <h3 class="box-title"><?=$this->lang->line('form_title_productlist')?></h3>
        <button type="button" class="btn btn-primary pull-right" onclick="location.href='<?=base_url('admin/product/add') ?>';"><?=$this->lang->line('button_add')?></button>
      </div><!-- /.box-header -->
      <div class="box-body">

        <table id="datatable-buttons" class="products table table-bordered table-striped">
          <thead>
            <tr>
              <th><?=$this->lang->line('tbl_col_productid')?></th>
              <th><?=$this->lang->line('tbl_col_productcategory')?></th>
              <th><?=$this->lang->line('tbl_col_producttitle')?></th>
              <th><?=$this->lang->line('tbl_col_productshop')?></th>
              <th><?=$this->lang->line('tbl_col_productoriginalprice')?></th>
              <th><?=$this->lang->line('tbl_col_productdiscountprice')?></th>
              <th><?=$this->lang->line('tbl_col_productsell')?></th>
              <th><?=$this->lang->line('tbl_col_productstock')?></th>
              <th><?=$this->lang->line('tbl_col_productstatus')?></th>
              <th><?=$this->lang->line('tbl_col_productoperate')?></th>
            </tr>
          </thead>
          <tbody id = "products_table">
          </tbody>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </section><!-- /.content -->  

  