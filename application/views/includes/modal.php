<div class="modal fade" id="Logout" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Leaving so soon?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h2>Do you wish to logout?</h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success text-white" data-bs-dismiss="modal">No, I will stay</button>
                <a href="<?=base_url('logout');?>" class="btn btn-danger text-white">Yes, I will go</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="DailyAdmission" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Daily Admission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Run Date</label>
                    <input type="date" name="rundate" class="form-control" value="<?=date('Y-m-d');?>">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success text-white">Generate</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ManageAdmission" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <?=form_open('submitadmission');?>
            <input type="text" name="patientidno" id="admit_patientidno">
            <div class="modal-header">
                <h5 class="modal-title h4" id="exampleModalFullscreenLabel">New Admission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>            
            <div class="modal-body">
                <div id="form-container">
                    <div id="steps-bar">
                    <div class="step-indicator active">1</div>
                    <div class="step-indicator">2</div>
                    <div class="step-indicator">3</div>
                    </div>
                    <form id="multiStepForm" action="<?=base_url('submitadmission');?>">
                    <div class="step active">
                        <div class="card mb-3">
                            <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                <h6 class="mb-0 fw-bold ">Patient Information</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="form-control" name="lastname" required id="admitlastname">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">First Name</label>
                                            <input type="text" class="form-control" name="firstname" required id="admitfirstname">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Middle Name</label>
                                            <input type="text" class="form-control" name="middlename" id="admitmiddlename">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Suffix</label>
                                            <input type="text" class="form-control" name="suffix" id="admitsuffix">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label">Date of Birth</label>
                                            <input type="date" class="form-control" name="birthdate" required id="admitbirthdate">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label">Contact No</label>
                                            <input type="text" class="form-control" name="contactno" required id="admitcontactno">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label">Gender</label>
                                            <select name="gender" class="form-select" required id="admitgender">
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label">Civil Status</label>
                                            <select name="civilstatus" class="form-select" required id="admitcivilstatus">
                                                <option value="New Born">New Born</option>
                                                <option value="Child">Child</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Separated">Separated</option>
                                                <option value="Widowed">Widowed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label">Nationality</label>
                                            <select name="nationality" class="form-select" required id="admitnationality">
                                                <?php
                                                foreach($nationality as $rel){
                                                    echo "<option value='$rel[description]'>$rel[description]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label">Religion</label>
                                            <select name="religion" class="form-select" required id="admitreligion">
                                                <?php
                                                foreach($religion as $rel){
                                                    echo "<option value='$rel[description]'>$rel[description]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label">Discount Type</label>
                                            <br />
                                            <label class="fancy-radio">
                                                <input type="radio" name="discounttype" value="NONE" required data-parsley-errors-container="#error-radio" checked id="admitdiscountnone">
                                                <span><i></i>None</span>
                                            </label>
                                            <label class="fancy-radio">
                                                <input type="radio" name="discounttype" value="SENIOR" id="admitdiscountsenior">
                                                <span><i></i>Senior</span>
                                            </label>
                                            <label class="fancy-radio">
                                                <input type="radio" name="discounttype" value="PWD" id="admitdiscountpwd">
                                                <span><i></i>PWD</span>
                                            </label>
                                            <p id="error-radio"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label">Discount ID</label>
                                            <input type="text" class="form-control" name="discountid"  id="admitdiscountid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="step">
                        <div class="card mb-3">
                            <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                <h6 class="mb-0 fw-bold ">Other Information</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label">Province</label>
                                            <select name="province" class="form-select" required id="province">
                                                <?php
                                                foreach($province as $rel){
                                                    echo "<option value='$rel[id]'>$rel[statename]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label">City/Municipality</label>
                                            <select name="city" class="form-select" id="city">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label">Barangay</label>
                                            <select name="barangay" class="form-select" id="barangay">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Street</label>
                                            <input type="text" class="form-control" name="street" required id="street">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label">Zip Code</label>
                                            <input type="text" class="form-control" name="zipcode" id="zipcode">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label">Contact person in case of Emergency</label>
                                            <input type="text" class="form-control" name="contactperson" id="admitcontactperson">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label">Contact No. of Person</label>
                                            <input type="text" class="form-control" name="contactpersonno" id="admitcontactpersonnumber">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label">Relation to Contact Person</label>
                                            <input type="text" class="form-control" name="contactpersonrelation" id="admitcontactrelation">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Name of Father</label>
                                            <input type="text" class="form-control" name="father" id="admitfather">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Name of Mother</label>
                                            <input type="text" class="form-control" name="mother" id="admitmother">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="step">
                        <div class="card mb-3">
                            <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                <h6 class="mb-0 fw-bold ">Admission Details</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Doctor</label>
                                            <select name="ap" class="form-select" required>
                                                <?php
                                                foreach($attending as $rel){
                                                    //if($rel['code']=="100729"){
                                                        echo "<option value='$rel[code]'>$rel[lastname], $rel[firstname]</option>";
                                                    //}
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Payment Mode</label>
                                            <br />
                                            <label class="fancy-radio">
                                                <input type="radio" name="hmomembership" value="hmo-hmo" required data-parsley-errors-container="#error-radio" onclick="showSelect();">
                                                <span><i></i>HMO</span>
                                            </label>
                                            &nbsp;
                                            <label class="fancy-radio">
                                                <input type="radio" name="hmomembership" value="hmo-hmo" onclick="showSelect();">
                                                <span><i></i>Company</span>
                                            </label>
                                            &nbsp;
                                            <label class="fancy-radio">
                                                <input type="radio" name="hmomembership" value="none" checked onclick="hideSelect();">
                                                <span><i></i>None (Self pay)</span>
                                            </label>
                                            <p id="error-radio"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label class="form-label">Philhealth</label>
                                            <br />
                                            <label class="fancy-radio">
                                                <input type="radio" name="membership" value="Yes" required data-parsley-errors-container="#error-radio" checked>
                                                <span><i></i>Yes</span>
                                            </label>
                                            &nbsp;
                                            <label class="fancy-radio">
                                                <input type="radio" name="membership" value="No">
                                                <span><i></i>No</span>
                                            </label>
                                            <p id="error-radio"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label">Type</label>
                                            <select name="type" class="form-select" required>
                                                <option value="N/A"></option>
                                                <option value="Employment-Govt">Employed-Govt</option>
                                                <option value="Employment-Private">Employed-Private</option>
                                                <option value="Self-Employed">Self-Employed</option>
                                                <option value="OFW">OFW</option>
                                                <option value="OWWA">OWWA</option>
                                                <option value="Indigent">Indigent</option>
                                                <option value="Pensioner">Pensioner</option>
                                                <option value="Non PHIC">NON PHIC</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label">Membership Status</label>
                                            <select name="paymentmode" class="form-select" required>										
                                                <option value="Member">Member</option>
                                                <option value="Dependent">Dependent</option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label">Hospital Case No</label>
                                            <input type="text" class="form-control hcn" name="hcn" required id="hcn" value="RDU<?=date('y');?>-">
                                            <span id="hcnexist"></span>
                                        </div>
                                    </div>
                                    <div class="hide col-md-12" id="my_select">
                                        <div class="col-md-2">
                                            <label for="suffix" class="form-label">HMO:</label>
                                            <select name="hmo" class="form-select">
                                                <?php
                                                foreach($company as $hmo){
                                                    echo "<option value='$hmo[companyname]'>$hmo[companyname]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                                <label  class="form-label">LOA Limit</label>
                                                <input type="text" class="form-control" name="loalimit">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Password</label>
                                                <input type="password" class="form-control admitpassword" name="password" required id="admitpassword">
                                                <span id="caseexist"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Transaction Type</label><br>
                                                <label class="fancy-radio">
                                                    <input type="radio" name="trans_type" onclick="insertData('RDU');" checked> Dialysis
                                                </label>
                                                <label class="fancy-radio">
                                                    <input type="radio" name="trans_type" onclick="insertData('BT');"> Blood Transfusion
                                                </label>
                                                <label class="fancy-radio">
                                                    <input type="radio" name="trans_type" onclick="insertData('CI');"> Minor Op
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="buttons">
                    <button type="button" id="prevBtn" onclick="prevStep()" disabled>Previous</button>
                    <button type="button" id="nextBtn" onclick="nextStep()">Next</button>
                    <button type="submit" id="submitBtn" style="display:none;">Submit</button>
                    </div>
                    <span id="result"></span>
                    </form>
                </div>                
            </div>            
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </div> -->
            <?=form_close();?>
        </div>
    </div>
</div>