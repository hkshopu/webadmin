  <section class="content"><!-- Main content -->
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title"><?=$title?></h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="datatable-buttons" class="adorders table table-bordered table-striped">
          <thead>
            <tr>
              <th><?=$this->lang->line('tbl_col_adorderid')?></th>
              <th><?=$this->lang->line('tbl_col_adordershopname')?></th>
              <th><?=$this->lang->line('tbl_col_adorderrequestedamt')?></th>
              <th><?=$this->lang->line('tbl_col_adorderamtused')?></th>
              <th><?=$this->lang->line('tbl_col_adorderstatus')?></th>
              <th><?=$this->lang->line('tbl_col_adorder_createdate')?></th>
              <th><?=$this->lang->line('tbl_col_adorder_updatedate')?></th>
              <th><?=$this->lang->line('tbl_col_adorder_operate')?></th>
            </tr>
          </thead>
          <tbody id = "adorders_table">   
          </tbody>
        </table>
        <form class="form-horizontal" method="POST" action="<?php echo base_url().'admin/adorder/topup/1' ?>">
        <h3 class="box-title"><?=$this->lang->line('lbl_adorder_accountinfo')?></h3> 
        <hr class="col-sm-10">
        <div class="form-group">
          <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_adorder_accountbalance')?></label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="balance" name="balance">
          </div>

        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_adorder_addvalues')?></label>
            <div class="col-sm-8">
              <select class="form-control" name="amount">
                <option>1</option>
                <option>50</option>
                <option>100</option>
                <option>200</option>
              </select>
            </div>
            <div class="col-sm-2">
              <button id="add" type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> <?=$this->lang->line('button_addvalue')?></button>
            </div>
          </div>
        </div>
      </form>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </section><!-- /.content -->
  