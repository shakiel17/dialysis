<div class="body d-flex py-lg-3 py-md-2">
            <div class="container-xxl">
                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold mb-0"><?=$title;?></h3>
                            <h3 class="fw-bold mb-0"><a href="#" class="btn btn-primary newAdmission" style="border-radius:20px;" data-bs-toggle="modal" data-bs-target="#ManageAdmission"><i class="icofont icofont-plus-circle"></i> New Admission</a></h3>
                        </div>
                    </div>
                </div> <!-- Row end  -->
                <div class="row clearfix g-3">
                  <div class="col-sm-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>                                            
                                            <th>Patient Name</th>
                                            <th>Date of Birth</th>
                                            <th>Gender</th>                                            
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $x=1;
                                        foreach($items as $item){
                                            $checkStatus=$this->Dialysis_model->stillIn($item['patientidno']);                                            
                                            echo "<tr>";
                                                echo "<td>$x.</td>";                                                
                                                echo "<td>$item[patientidno] <br> $item[lastname], $item[firstname] $item[middlename]</td>";
                                                echo "<td>".date('m/d/Y',strtotime($item['dateofbirth']))."</td>";
                                                echo "<td>$item[sex]</td>";
                                                 echo "<td>";
                                                if($checkStatus){
                                                    echo "<button class='btn btn-danger text-white' title='Still In'><i class='icofont icofont-exclamation-circle'></i></button> ";
                                                }else{
                                                    echo "<a href='#' class='btn btn-success readmit text-white' title='Re-Admit' data-bs-toggle='modal' data-bs-target='#ManageAdmission' data-id='$item[patientidno]'><i class='icofont icofont-ambulance'></i></a> ";
                                                }  
                                                    echo "<a href='".base_url('view_profile/'.$item['patientidno'])."' class='btn btn-info text-white' title='View Profile'><i class='icofont icofont-user'><i/></a>";
                                                 echo "</td>";
                                            echo "</tr>";
                                            $x++;
                                        }
                                        ?>
                                    </tbody>                                    
                                </table>
                            </div>
                        </div>
                  </div>
                </div><!-- Row End -->
            </div>
        </div>   
    </div>
</div>