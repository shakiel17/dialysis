<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?=base_url('main');?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="<?=base_url('manage_doctors');?>" class="tip-bottom">Doctor List</a></div>              
    <h1><?=$title;?>        
            <a href="#managedoctor" class="btn btn-primary newdoctor" data-toggle="modal"  style="float:right; margin-right:20px;"><i class="icon icon-plus"></i> Add Doctor</a>        
    </h1>
  </div>  
  <div class="container-fluid">
    <?php
    if($this->session->flashdata('success')){
    ?>
    <div class="alert alert-success alert-block">
        <?=$this->session->flashdata('success');?>
    </div>
    <?php
    }
    ?>
    <?php
    if($this->session->flashdata('failed')){
    ?>
    <div class="alert alert-danger alert-block">
        <?=$this->session->flashdata('failed');?>
    </div>
    <?php
    }
    ?>
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
                  <th>ID Number</th>
                  <th>Doctor Name</th>
                  <th>Specialization</th>                  
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $x=1;
                foreach($items as $item){
                  echo "<tr>";
                    echo "<td width='3%'>$x.</td>";
                    echo "<td width='5%'>$item[id]</td>";
                    echo "<td>$item[lastname], $item[firstname] $item[middlename] $item[suffix]</td>";
                    echo "<td>$item[specialization]</td>";                    
                    ?>
                    <td width="10%">
                        <a href="#managedoctor" class="label label-warning editdoctor" data-toggle="modal" data-id="<?=$item['id'];?>"><i class="icon icon-edit"></i> Edit</a>
                        <a href="<?=base_url('delete_doctor/'.$item['id']);?>" class="label label-important" onclick="return confirm('Do you wish to delete this item?'); return false;"><i class="icon icon-trash"></i> Delete</a>
                    </td>
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