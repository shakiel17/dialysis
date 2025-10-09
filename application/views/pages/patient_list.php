<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?=base_url('main');?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="<?=base_url('patient_list');?>" class="tip-bottom">Patient List</a></div>              
    <h1><?=$title;?>        
            <a href="<?=base_url('new_admission');?>" class="btn btn-primary newadmission" style="float:right; margin-right:20px;"><i class="icon icon-plus"></i> New Admission</a>        
    </h1>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">        
      <div class="span12">                 
        <div class="widget-box">          
          <div class="widget-title">
             <span class="icon"><i class="icon-user"></i></span>              
            <h5>
              List of Patient              
            </h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>ID Number</th>
                  <th>Patient Name</th>
                  <th>Date of Birth</th>
                  <th>Gender</th>
                  <th>Address</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $x=1;
                foreach($items as $item){
                  echo "<tr>";
                    echo "<td align='center'>$x.</td>";
                    echo "<td align='center'>$item[patientidno]</td>";
                    echo "<td>$item[lastname], $item[firstname] $item[middlename] $item[suffix]</td>";
                    echo "<td>$item[birthdate]</td>";
                    echo "<td>$item[sex]</td>";
                    echo "<td>$item[street], $item[barangay], $item[municipality], $item[province] $item[zipcode]</td>";
                    ?>
                    <td></td>
                    <?php
                  echo "</tr>";
                  $x++;
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>