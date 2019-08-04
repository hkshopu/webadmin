  <section class="content"> <!-- Main content -->
    <div class="box box-primary">
      <div class="box-header">
        <?php $this->view('admin/alert_message');?>
        <h3 class="box-title"><?=$title?></h3>
      </div>
      <div class="nav-tabs-custom"><!-- Custom Tabs -->
        <ul class="nav nav-tabs">
          <li class="active"><a href="#hkshopu" data-toggle="tab"><?=$this->lang->line('tab_title_hkshopu')?></a></li>
          <li><a href="#allshop" data-toggle="tab"><?=$this->lang->line('tab_title_allshop')?></a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="hkshopu">
            <div class="box-body">
              <button type="button" class="btn btn-primary pull-right" onclick="location.href='<?=base_url('admin/blog/add') ?>';"><i class="fa fa-plus"></i> <?=$this->lang->line('button_add')?></button>
              <div class="clearfix"></div>
              <table id="datatable-buttons" class="blogs table table-bordered table-striped">
                <thead>
                <tr>
                  <th><?=$this->lang->line('tbl_col_blogdate')?></th>
                  <th><?=$this->lang->line('tbl_col_blogtitle')?></th>
                  <th><?=$this->lang->line('tbl_col_blogcategory')?></th>
                  <th><?=$this->lang->line('tbl_col_blogtopping')?></th>
                  <th><?=$this->lang->line('tbl_col_blogpublishdate')?></th>
                  <th><?=$this->lang->line('tbl_col_blogenddate')?></th>
                  <th><?=$this->lang->line('tbl_col_blogview')?></th>
                  <th><?=$this->lang->line('tbl_col_bloglike')?></th>
                  <th><?=$this->lang->line('tbl_col_blogcomment')?></th>
                  <th><?=$this->lang->line('tbl_col_blogstatus')?></th>
                  <th><?=$this->lang->line('tbl_col_blogoperate')?></th>
                </tr>
                </thead>
                <tbody id = "blogs_table">
                </tbody>
              </table>
            </div><!-- /.box-body -->
          </div><!-- /.tab-pane -->
          <div class="tab-pane" id="allshop">
            <div class="box-body">
              <button type="button" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> <?=$this->lang->line('button_add')?></button>
              <div class="clearfix"></div>
              <table id="datatable-buttons" class="blogss table table-bordered table-striped">
                <thead>
                <tr>
                  <th><?=$this->lang->line('tbl_col_blogdate')?></th>
                  <th><?=$this->lang->line('tbl_col_blogtitle')?></th>
                  <th><?=$this->lang->line('tbl_col_blogcategory')?></th>
                  <th><?=$this->lang->line('tbl_col_blogtopping')?></th>
                  <th><?=$this->lang->line('tbl_col_blogpublisheddate')?></th>
                  <th><?=$this->lang->line('tbl_col_blogenddate')?></th>
                  <th><?=$this->lang->line('tbl_col_blogview')?></th>
                  <th><?=$this->lang->line('tbl_col_bloglike')?></th>
                  <th><?=$this->lang->line('tbl_col_blogcomment')?></th>
                  <th><?=$this->lang->line('tbl_col_blogstatus')?></th>
                  <th><?=$this->lang->line('tbl_col_blogoperate')?></th>
                </tr>
                </thead>
                <tbody id = "blogs_table">
                </tbody>
              </table>
            </div><!-- /.box-body -->
          </div><!-- /.tab-pane -->
        </div><!-- /.tab-content -->
      </div><!-- nav-tabs-custom -->  
    </div><!-- /.box -->
  </section><!-- /.content -->
 