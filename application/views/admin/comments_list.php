<div class="form-group">
  <h3 class="box-title"><?=$this->lang->line('tbl_name_comment')?></h3> 
</div>
<div class="form-group">
  <div class="col-sm-12">
    <table id="comments datatable-buttons" class="comments table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th><?=$this->lang->line('tbl_col_user')?></th>
          <th><?=$this->lang->line('tbl_col_comment')?></th>
          <th><?=$this->lang->line('tbl_col_datetime')?></th>
          <th><?=$this->lang->line('tbl_col_operate')?></th>
        </tr>
      </thead>
      <tbody id="comments_table">
      </tbody>
    </table>
  </div>
</div>