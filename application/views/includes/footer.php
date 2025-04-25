</div>
<!-- Jquery Core Js -->
<script src="<?=base_url('design/assets/bundles/libscripts.bundle.js');?>"></script>

<!-- Plugin Js-->
<script src="<?=base_url('design/assets/bundles/dataTables.bundle.js');?>"></script>

<!-- Jquery Page Js -->
<script src="<?=base_url('design/assets/js/template.js');?>"></script>
<script src="<?=base_url();?>design/assets/js/select2.min.js"></script>
<script src="<?=base_url();?>design/assets/js/page/hr.js"></script>
<script src="<?=base_url();?>design/assets/js/multistep.js"></script>
<script>
    // project data table
    $(document).ready(function() {
        $('#myProjectTable')
        .addClass( 'nowrap' )
        .dataTable( {
            responsive: true,
            columnDefs: [
                { targets: [-1, -3], className: 'dt-body-right' }
            ]
        });
        $('.deleterow').on('click',function(){
        var tablename = $(this).closest('table').DataTable();  
        tablename
                .row( $(this)
                .parents('tr') )
                .remove()
                .draw();

        } );
    });

    function sbview(){
        const sidebar = document.querySelector('.sidebar');
        if(sidebar.style.transform == 'translateX(-100%)'){sidebar.style.transform = 'translateX(0)';}
        else{sidebar.style.transform = 'translateX(-100%)';}
    }


    const sidebar = document.querySelector('.sidebar');
    const mediaQuery = window.matchMedia("(min-width: 1275.99px)");
    const handleMediaQueryChange = (mediaQuery) => {
    if (mediaQuery.matches) {sidebar.style.transform = 'translateX(0)';} 
    else {sidebar.style.transform = 'translateX(-100%)';}
    }

    mediaQuery.addListener(handleMediaQueryChange);
    handleMediaQueryChange(mediaQuery);

    $('#admitbirthdate').on('change',function (){		
		var selectedDate = $(this).val();
		var today = new Date();
		var dob = new Date(selectedDate);
		var age = today.getFullYear() - dob.getFullYear();
		var m = today.getMonth() - dob.getMonth();		
		if (m < 0 || (m === 0 && today.getDate() < dob.getDate()))
    {
        age--;
    }
    if(age < 0){
    	age = 0;
    }
    //document.getElementById("admitage").value = age;
    if(age >= 60){
    	document.getElementById("admitdiscountsenior").checked = true;
    }else{    	
    	document.getElementById("admitdiscountnone").checked = true;
    }
	});

    $(document).ready(function(){
		$('#province').change(function(){
			var stateId = $(this).val();
			$.ajax({
				url:'<?=base_url();?>index.php/pages/getCity',
				type:'post',
				data: {id: stateId},
				dataType:'json',
				success: function(response){
					var select = document.getElementById("city");
					select.replaceChildren();
					for (var i = 0; i < response.length; i++) {
						var optn = response[i]['id'];
						var optn1 = response[i]['city'];
						var el = document.createElement("option");
						el.textContent = optn1;
						el.value = optn;
						select.appendChild(el);
					}
				}
			});
		});
		$('#city').change(function(){
			var cityId = $(this).val();
			$.ajax({
				url:'<?=base_url();?>index.php/pages/getBarangay',
				type:'post',
				data: {id: cityId},
				dataType:'json',
				success: function(response){
					var select = document.getElementById("barangay");
					select.replaceChildren();
					for (var i = 0; i < response.length; i++) {
						var optn = response[i]['id'];
						var optn1 = response[i]['barangay'];
						var el = document.createElement("option");
						el.textContent = optn1;
						el.value = optn;
						select.appendChild(el);
					}
				}
			});
			$.ajax({
				url:'<?=base_url();?>index.php/pages/getZipCode',
				type:'post',
				data: {id: cityId},
				dataType:'json',
				success: function(response){
					document.getElementById("zipcode").value=response[0]['ZIP_CODE'];
				}
			});
		});
	});

    function showSelect(){
		var select = document.getElementById('my_select');
		select.className = 'show';
	}
	function hideSelect(){
		var select = document.getElementById('my_select');
		select.className = 'hide';
	}

	function showSelect1(){
		var select = document.getElementById('my_select1');
		select.className = 'show';
	}
	function hideSelect1(){
		var select = document.getElementById('my_select1');
		select.className = 'hide';
	}
    $(".admitpassword").change(function(){
		var password = $(this).val();
		$.ajax({
			url:'<?=base_url();?>index.php/pages/checkPassword',
			type:'post',
			data: {id: password},
			dataType:'json',
			success: function(response) {
				if(response.length > 0) {
					document.getElementById('caseexist').innerHTML = "<font color='#32cd32'><i class='icofont-check-circled'></i> You are authorized!</font>";
					document.getElementById('submitBtn').disabled=false;
				}else {
					document.getElementById('admitpassword').value = '';
					document.getElementById('caseexist').innerHTML = "<font color='red'><i class='icofont-exclamation-circle'></i> You are NOT authorized!</font>";
					document.getElementById('submitBtn').disabled=true;
				}
			}
		});
	});    

	$("#submitadmission").submit(function(){
		document.getElementById('submitBtn').value='Form submitting.. Please wait!';
		document.getElementById('submitBtn').disabled=true;
	});
    $(".hcn").change(function(){
		var hcn = $(this).val();
		$.ajax({
			url:'<?=base_url();?>index.php/pages/checkHCNExist',
			type:'post',
			data: {id: hcn},
			dataType:'json',
			success: function(response) {
				if(response.length > 0) {
					document.getElementById('hcn').value = 'RDU<?=date('y');?>-';
					document.getElementById('hcnexist').innerHTML = "<font color='red'>HCN already exist!</font>";
				}else{
					document.getElementById('hcnexist').innerHTML = "<font color='#adff2f'>HCN available!</font>";
				}
			}
		});
	});
    $('.newAdmission').click(function(){
        document.getElementById('admit_patientidno').value = '';
		document.getElementById('admitlastname').value = '';
        document.getElementById('admitfirstname').value = '';
        document.getElementById('admitmiddlename').value = '';
        document.getElementById('admitsuffix').value = '';
        document.getElementById('admitbirthdate').value = '';
        document.getElementById('admitcontactno').value = '';
        document.getElementById('admitgender').value = '';
        document.getElementById('admitcivilstatus').value = '';
        document.getElementById('admitnationality').value = '';
        document.getElementById('admitreligion').value = '';
        document.getElementById('admitdiscountnone').checked = true;
        document.getElementById('admitdiscountid').value = '';

        document.getElementById('street').value = '';
        document.getElementById('zipcode').value = '';
        document.getElementById('province').value = '';
        document.getElementById('city').value = '';
        document.getElementById('barangay').value = '';

        document.getElementById('admitcontactperson').value = '';
        document.getElementById('admitcontactpersonnumber').value = '';
        document.getElementById('admitcontactrelation').value = '';
        document.getElementById('admitfather').value = '';
        document.getElementById('admitmother').value = '';
    })
    $('.readmit').click(function(){
        var id=$(this).data('id');
        $.ajax({
			url:'<?=base_url();?>index.php/pages/fetch_previous_admission',
			type:'post',
			data: {id: id},
			dataType:'json',
			success: function(response) {
				if(response.length > 0) {
                    document.getElementById('admit_patientidno').value = id;
					document.getElementById('admitlastname').value = response[0]['lastname'];
                    document.getElementById('admitfirstname').value = response[0]['firstname'];
                    document.getElementById('admitmiddlename').value = response[0]['middlename'];
                    document.getElementById('admitsuffix').value = response[0]['suffix'];
                    document.getElementById('admitbirthdate').value = response[0]['dateofbirth'];
                    document.getElementById('admitcontactno').value = response[0]['patientcontactno'];
                    document.getElementById('admitgender').value = response[0]['sex'];
                    document.getElementById('admitcivilstatus').value = response[0]['stat1'];
                    document.getElementById('admitnationality').value = response[0]['notify'];
                    document.getElementById('admitreligion').value = response[0]['religion'];
                    if(response[0]['senior']=="Y"){
                        document.getElementById('admitdiscountsenior').checked = true;
                    }else{
                        document.getElementById('admitdiscountnone').checked = true;
                    }
                    document.getElementById('admitdiscountid').value = response[0]['discountid'];

                    document.getElementById('street').value = response[0]['street'];
                    document.getElementById('zipcode').value = response[0]['zipcode'];

                    document.getElementById('admitcontactperson').value = response[0]['middlenamed'];
                    document.getElementById('admitcontactpersonnumber').value = response[0]['contactno'];
                    document.getElementById('admitcontactrelation').value = response[0]['relationship'];
                    document.getElementById('admitfather').value = response[0]['lastnamed'];
                    document.getElementById('admitmother').value = response[0]['firstnamed'];

                
                    
                    var select = document.getElementById("province");
                    var optn = response[0]['province'];                    
                    var el = document.createElement("option");
                    el.selected = "selected";
                    el.textContent = optn;
                    el.value = optn;
                    select.appendChild(el);

                    var select = document.getElementById("city");
                    var optn = response[0]['municipality'];                    
                    var el = document.createElement("option");
                    el.selected = "selected";
                    el.textContent = optn;
                    el.value = optn;
                    select.appendChild(el);

                    var select = document.getElementById("barangay");
                    var optn = response[0]['barangay'];                    
                    var el = document.createElement("option");
                    el.selected = "selected";
                    el.textContent = optn;
                    el.value = optn;
                    select.appendChild(el);                    


				}
			}
		});
    });
</script>
</body>
</html>