  <section class="content"><!-- Main content -->
    <div class="box box-primary"><!-- Horizontal Form -->
      <div class="box-header with-border">
        <h3 class="box-title"><?=$title?></h3> 
          <div class="btn-toolbar pull-right">
            <button type="button" class="btn btn-primary" id="saveButton"><i class="fa fa-save"></i> <?=$this->lang->line('button_save')?></button>
            <button type="button" class="btn btn-danger" id="cancelOrder"><i class="fa fa-ban"></i> <?=$this->lang->line('button_cancelorder')?></button>
            <button type="button" class="btn btn-primary" id="displayOrder"><i class="fa fa-download"></i> <?=$this->lang->line('button_displayrecord')?></button>
          </div>
      </div><!-- /.box-header -->
      <form class="form-horizontal" id="adOrderDiv"><!-- form start -->
        <div class="box-body">
          <div id="orderinfo">
            <div class="box-header with-border">
              <h3 class="box-title">Ad Order ID</h3>
            </div>
            <div class="box-body">
            <div class="form-group">
              <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_adordershop')?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="shop" name="shop">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_adorderstatus')?></label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="orderstatus" name="orderstatus">
                </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_adorderrequestedamount')?></label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="requestedamount" name="requestedamount">
                </div>
                <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_adorderbonuspoint')?></label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="bonuspoint" name="bonuspoint">
                </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_adorderremains')?></label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="remains" name="remains">
                </div>
                <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_adorderamountused')?></label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="amountused" name="amountused">
                </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_adorderstartdatetime')?></label>
              <div class="date col-sm-4">
                  <div class="input-group date">
                    <input type="text" class="form-control" id="datepicker1" name="startdate">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                  </div>
              </div>
              <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_adorderenddatetime')?></label>
                <div class="date col-sm-4">
                  <div class="input-group date">
                    <input type="text" class="form-control" id="datepicker2" name="enddate">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                </div>
            </div>
          </div>
          <hr class="col-sm-12">
          <h3 class="box-title"><?=$this->lang->line('lbl_adordercontent')?></h3>
          <div class="form-group">
            <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_adordertitle')?></label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="adtitle" name="adtitle">
              </div>
              <div class="col-sm-4">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" id="adtitle_check">
                    Empty
                  </label>
                </div>
              </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_adordercontent')?></label>
            <div class="col-sm-4">
              <textarea class="form-control" rows="3" id="content" name="content"></textarea>
            </div>
            <div class="col-sm-4">
                 <div class="checkbox">
                  <label>
                    <input type="checkbox" id="adcontent_check">
                    Empty
                  </label>
                </div>
              </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_adorderproduct')?></label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="product" name="product">
              </div>
              <div class="col-sm-4">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" id="product_check">
                    Empty
                  </label>
                </div>
              </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_adorderimage')?></label>
            <div class="col-sm-2">
              <button type="button" class="btn btn-primary" id="uploadButton"><?=$this->lang->line('button_uploadfile')?></button>
            </div>
            <div class="col-sm-2">
              <img src="http://placehold.it/150x100" alt="..." class="margin" id="uploadFile">
            </div>
            <div class="col-sm-2">
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="upload_check">
                    Empty
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-8"></div>
              <div class="col-sm-4">
                <div class="btn-toolbar pull-right">
                  <button type="button" class="btn btn-primary pull-right"><i class="fa fa-check"></i> <?=$this->lang->line('button_approve')?></button>
                  <button type="button" class="btn btn-danger pull-right"><i class="fa fa-close"></i> <?=$this->lang->line('button_reject')?></button>
                  <button type="button" class="btn btn-primary pull-right"><i class="fa fa-angle-left"></i> <?=$this->lang->line('button_cancel')?></button>
                </div>
              </div>    
            </div>
          </div>
        </div>
      </form>
    </div>
  </section><!-- /.content --> 
  