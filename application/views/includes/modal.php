<div id="logout" class="modal hide">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button">×</button>
            <h3>Leaving so soon!</h3>
        </div>
        <div class="modal-body">
            <center>
            <img src="<?=base_url('design/img/logout.jpg');?>" width="200">
            </center>
        </div>
    <div class="modal-footer"> <a class="btn btn-primary" href="<?=base_url('logout');?>">Yes, I am sure!</a> <a data-dismiss="modal" class="btn" href="#">No, let me stay.</a> </div>
</div>

<div id="searchpatient" class="modal hide">
    <?=form_open(base_url('search_patient'));?>
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button">×</button>
            <h3>Search Patient</h3>
        </div>
        <div class="modal-body">
            <div class="control-group">                                
                  <input type="text" name="description" style="width:98%;" placeholder="Enter Patient Name (e.g. lastname firstname)" />                
              </div>
        </div>
    <div class="modal-footer"><button type="submit" class="btn btn-primary">Search</button> <a data-dismiss="modal" class="btn" href="#">Cancel</a> </div>
    <?=form_close();?>
</div>