<div class="body d-flex py-lg-3 py-md-2">
            <div class="container-xxl">
                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold mb-0"><?=$title;?></h3>
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
                                            echo "<tr>";
                                                echo "<td>$x.</td>";                                                
                                                echo "<td>$item[patientidno] <br> $item[lastname], $item[firstname] $item[middlename]</td>";
                                                echo "<td>".date('m/d/Y',strtotime($item['dateadmit']))." / ".date('h:i A',strtotime($item['timeadmitted']))."</td>";
                                                echo "<td>$item[docname]</td>";
                                                echo "<td></td>";
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