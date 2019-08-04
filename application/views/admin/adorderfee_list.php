  <section class="content"><!-- Main content -->
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title"><?=$title?></h3>
        <button type="button" class="btn btn-primary pull-right" onclick="location.href='<?=base_url('admin/adorderfee/add') ?>';"><?=$this->lang->line('button_add')?></button>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="datatable-buttons" class="adordersfee table table-bordered table-striped">
          <thead>
            <tr>
              <th colspan="4"><?=$this->lang->line('tbl_col_adfeerange')?></th>
              <th><?=$this->lang->line('tbl_col_adeachtimeprice')?></th>
              <th><?=$this->lang->line('tbl_col_adorder_operate')?></th>
            </tr>
          </thead>
          <tbody id = "adorderfee_table">   
          </tbody>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </section><!-- /.content -->
  