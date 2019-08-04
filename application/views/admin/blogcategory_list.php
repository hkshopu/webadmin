  <section class="content"><!-- Main content -->
    <div class="box box-primary">
      <div class="box-header">
        <?php $this->view('admin/alert_message');?>
        <h3 class="box-title"><?=$title?></h3>
        <button type="button" class="btn btn-primary pull-right" onclick="location.href='<?=base_url('admin/blogcategory/add') ?>';"><i class="fa fa-plus"></i> <?=$this->lang->line('button_add')?></button>
      </div> <!-- /.box-header -->
      <div class="box-body">
        <table id="datatable-buttons" class="blogscategory table table-bordered table-striped">
          <thead>
            <tr>
              <th><?=$this->lang->line('tbl_col_blogcategoryid')?></th>
              <th><?=$this->lang->line('tbl_col_blogcategoryname')?></th>
              <th><?=$this->lang->line('tbl_col_blogcategorytype')?></th>
              <th><?=$this->lang->line('tbl_col_blogcategorystatus')?></th>
              <th><?=$this->lang->line('tbl_col_blogcategoryoperate')?></th>
            </tr>
          </thead>
          <tbody id = "blogscategory_table">   
          </tbody>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </section><!-- /.content -->
  