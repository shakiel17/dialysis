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

<div id="managedoctor" class="modal hide">
    <?=form_open(base_url('save_doctor'));?>
    <input type="hidden" name="id" id="doc_id">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button">×</button>
            <h3>Manage Doctor</h3>
        </div>
        <div class="modal-body">
            <div class="control-group">
                <label class="control-label">Last Name :</label>
                <div class="controls">
                <input type="text" class="span5" placeholder="Last name" name="lastname" id="doc_lastname" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">First Name :</label>
                <div class="controls">
                <input type="text" class="span5" placeholder="First name" name="firstname" id="doc_firstname" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Middle Name :</label>
                <div class="controls">
                <input type="text" class="span5" placeholder="Middle name" name="middlename" id="doc_middlename" />
                </div>
            </div>                        
            <div class="control-group">
                <label class="control-label">Suffix :</label>
                <div class="controls">
                <input type="text" class="span2" placeholder="Suffix" name="suffix" id="doc_suffix" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Ext Name :</label>
                <div class="controls">
                <input type="text" class="span2" placeholder="Extension Name" name="extname" id="doc_extname" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Specialization :</label>
                <div class="controls">
                <input type="text" class="span4" placeholder="Specialization" name="specialization" id="doc_specialization" />
                </div>
            </div>
        </div>
    <div class="modal-footer"><button type="submit" class="btn btn-primary">Submit</button> <a data-dismiss="modal" class="btn" href="#">Cancel</a> </div>
    <?=form_close();?>
</div>