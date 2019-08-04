  <section class="content"><!-- Main content -->
    <div class="box box-primary">
      <div class="box-header">
        <?php $this->view('admin/alert_message');?>
        <h3 class="box-title"><?=$title?></h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="datatable-buttons" class="orders table table-bordered table-striped">
          <thead>
            <tr>
              <th><?=$this->lang->line('tbl_col_orderid')?></th>
              <th><?=$this->lang->line('tbl_col_orderuser')?></th>
              <th><?=$this->lang->line('tbl_col_ordershop')?></th>
              <th><?=$this->lang->line('tbl_col_orderitem')?></th>
              <th><?=$this->lang->line('tbl_col_orderprice')?></th>
              <th><?=$this->lang->line('tbl_col_orderdate')?></th>
              <th><?=$this->lang->line('tbl_col_orderstatus')?></th>
              <th><?=$this->lang->line('tbl_col_orderoperate')?></th>
            </tr>
          </thead>
          <tbody id = "orders_table"> 
          </tbody>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </section><!-- /.content -->
  