  <section class="content"><!-- Main content -->
    <div class="box box-primary">
      <div class="box-header">
        <?php $this->view('admin/alert_message');?>
        <h3 class="box-title"><?=$this->lang->line('form_title_userlist');?></h3>
      </div>
      <div class="box-body"><!-- /.box-header -->
        <table id="datatable-buttons" class="users table table-bordered table-striped">
          <thead>
            <tr>
              <th><?=$this->lang->line('tbl_col_userid');?></th>
              <th><?=$this->lang->line('tbl_col_username');?></th>
              <th><?=$this->lang->line('tbl_col_email');?></th>
              <th><?=$this->lang->line('tbl_col_usertype');?></th>
              <th><?=$this->lang->line('tbl_col_shop');?></th>
              <th><?=$this->lang->line('tbl_col_accountstatus');?></th>
              <th><?=$this->lang->line('tbl_col_operate');?></th>
            </tr>
          </thead>
          <tbody id = "users_table">
          </tbody>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </section><!-- /.section -->

