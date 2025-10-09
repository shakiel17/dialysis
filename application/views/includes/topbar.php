<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-th-list"></i> Menu</a><ul>
    <li class="active"><a href="<?=base_url('main');?>"><i class="icon icon-home"></i> <span>Home</span></a> </li>
    <li> <a href="#searchpatient" data-toggle="modal"><i class="icon icon-search"></i> <span>Search Patient</span></a> </li>
    <li> <a href="<?=base_url('patient_list');?>"><i class="icon icon-user"></i> <span>Patient List</span></a> </li>          
    <li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span>Reports</span></a>
      <ul>
        <li><a href="index2.html">Daily Admission</a></li>
        <li><a href="gallery.html">Inventory Report</a></li>
        <li><a href="calendar.html">e-Stock Card</a></li>
        <li><a href="chat.html">Discharged Report</a></li>
        <li><a href="chat.html">Daily Collection</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-cog"></i> <span>Masterfile</span></a>
      <ul>
        <li><a href="<?=base_url('manage_employees');?>">Employees</a></li>
        <li><a href="<?=base_url('manage_doctors');?>">Doctors</a></li>
        <li><a href="<?=base_url('manage_address_location');?>">Address Manager</a></li>
        <li><a href="<?=base_url('manage_religion');?>">Religion</a></li>
        <li><a href="<?=base_url('manage_nationality');?>">Nationality</a></li>
        <li><a href="<?=base_url('manage_med_sup');?>">Meds & Supplies</a></li>
        <li><a href="<?=base_url('manage_services');?>">Services</a></li>        
      </ul>
    </li>
  </ul>
</div>