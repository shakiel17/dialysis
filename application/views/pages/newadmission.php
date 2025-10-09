        <div id="content">
			<div id="content-header">
				<div id="breadcrumb"> <a href="<?=base_url('main');?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="<?=base_url('patient_list');?>" class="tip-bottom">Patient List</a> <a href="#" class="tip-bottom">New Admission</a></div>
                <h1><?=$title;?></h1>
				
			</div>
			<form action="#" method="POST" class="form-horizontal" action="<?=base_url('submit_admission');?>">
			<div class="container-fluid">
            <div class="row-fluid">
                <div class="span6">
                    <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Personal-info</h5>
                    </div>
                    <div class="widget-content nopadding">            
                        <div class="control-group">
                            <label class="control-label">Last Name :</label>
                            <div class="controls">
                            <input type="text" class="span11" placeholder="Last name" name="lastname" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">First Name :</label>
                            <div class="controls">
                            <input type="text" class="span11" placeholder="First name" name="firstname" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Middle Name :</label>
                            <div class="controls">
                            <input type="text" class="span11" placeholder="Middle name" name="middlename" />
                            </div>
                        </div>                        
                        <div class="control-group">
                            <label class="control-label">Suffix :</label>
                            <div class="controls">
                            <input type="text" class="span4" placeholder="Suffix" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Date of Birth :</label>
                            <div class="controls">
                            <input type="date" class="datepicker span4" placeholder="Birthdate" name="birthdate" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Sex :</label>
                            <div class="controls">
                            <select name="sex" class="span3">
                                <option>Male</option>
                                <option>Female</option>                                
                            </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Civil Status :</label>
                            <div class="controls">
                            <select name="civilstatus" class="span3">
                                <option>Single</option>
                                <option>Married</option>                                
                                <option>Widowed</option>
                                <option>Separated</option>
                            </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Religion :</label>
                            <div class="controls">
                            <select name="religion" class="span4">
                                <?php
                                foreach($religion as $rel){
                                    echo "<option>$rel[description]</option>";
                                }
                                ?>
                            </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Nationality :</label>
                            <div class="controls">
                            <select name="nationality" class="span4">
                                <?php
                                foreach($nationality as $nat){
                                    echo "<option>$nat[description]</option>";
                                }
                                ?>
                            </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Contact No. :</label>
                            <div class="controls">
                            <input type="text" class="span4" placeholder="Contact Number" name="contactno" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Occupation :</label>
                            <div class="controls">
                            <input type="text" class="span6" placeholder="Occupation" name="occupation" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Discount Type :</label>
                            <div class="controls">
                            <label>
                                <input type="radio" name="discounttype" value='none' checked />
                                None</label>
                            <label>
                                <input type="radio" name="discounttype" value="senior" />
                                Senior</label>
                            <label>
                                <input type="radio" name="discounttype" value="pwd" />
                                PWD</label>
                            </div>
                        </div>  
                        <div class="control-group">
                            <label class="control-label">Discount ID :</label>
                            <div class="controls">
                            <input type="text" class="span6" placeholder="Discount ID" name="discountid" />
                            </div>
                        </div>                      
                        <br>                                              
                    </div>
                    </div>
                </div>
                <div class="span6">
                    <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Other-info</h5>
                    </div>
                    <div class="widget-content nopadding">                        
                        <div class="control-group">
                            <label class="control-label">Province :</label>
                            <div class="controls">
                            <select id="province" name="province">
                                <?php
                                foreach($province as $prov){
                                    echo "<option value='$prov[id]'>$prov[description]</option>";
                                }
                                ?>
                            </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">City/Municpality :</label>
                            <div class="controls">
                            <select id="municipality" name="municipality">
                               
                            </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Barangay :</label>
                            <div class="controls">
                                <select id="barangay" name="barangay">
                                
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Street :</label>
                            <div class="controls">
                            <input type="text" class="span10" placeholder="Street" name="street" required />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Zip Code :</label>
                            <div class="controls">
                            <input type="text" class="span6" placeholder="Zip Code" name="zipcode" id="zipcode" />
                            </div>
                        </div>                        
                        <div class="control-group">
                            <label class="control-label">Doctor :</label>
                            <div class="controls">
                            <select name="ap">
                                <?php
                                foreach($doctors as $doc){
                                    echo "<option value='$doc[id]'>$doc[fullname]</option>";
                                }
                                ?>
                            </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Hospital Case No. :</label>
                            <div class="controls">
                            <input type="text" class="span6" placeholder="Case Number" id="hrn" name="hrn" value="RDU<?=date('y');?>-" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Admission Type :</label>
                            <div class="controls">
                            <label>
                                <input type="radio" name="trantype" value='RDU<?=date('y');?>-' checked onclick="getHRN(this.value)" />
                                Dialysis</label>
                            <label>
                                <input type="radio" name="trantype" value="BT<?=date('y');?>-" onclick="getHRN(this.value)" />
                                Blood Transfusion</label>
                            <label>
                                <input type="radio" name="trantype" value="CI<?=date('y');?>-" onclick="getHRN(this.value)" />
                                Minor OP</label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Password :</label>
                            <div class="controls">
                            <input type="password" class="span6" name="password" />
                            </div>
                        </div>
                        <br>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
                </div><hr>   
            </div>
        </div>
	</div>

    <script>
        function getHRN(value){
            document.getElementById("hrn").value=value;
        }
    </script>