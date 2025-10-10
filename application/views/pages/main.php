<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
    <h1><?=$title;?></h1>   
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
          <div class="widget-content">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Caseno</th>
                  <th>Patient Name</th>
                  <th>Date Admit</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $x=1;
                foreach($items as $item){
                  echo "<tr>";
                    echo "<td align='center'>$x.</td>";
                    echo "<td align='center'>$item[caseno]</td>";
                    echo "<td>$item[lastname], $item[firstname] $item[middlename] $item[suffix]</td>";
                    echo "<td>$item[dateadmit]</td>";
                    echo "<td>$item[status]</td>";
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