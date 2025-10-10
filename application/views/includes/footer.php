<div class="row-fluid">
  <div id="footer" class="span12"> 2025 &copy; MedMatrix e-Health Solutions, Inc.</div>
</div>
<script src="<?=base_url('design/js/jquery.min.js');?>"></script> 
<script src="<?=base_url('design/js/jquery.ui.custom.js');?>"></script> 
<script src="<?=base_url('design/js/bootstrap.min.js');?>"></script> 
<script src="<?=base_url('design/js/bootstrap-colorpicker.js');?>"></script> 
<script src="<?=base_url('design/js/bootstrap-datepicker.js');?>"></script> 
<script src="<?=base_url('design/js/jquery.uniform.js');?>"></script> 
<script src="<?=base_url('design/js/select2.min.js');?>"></script> 
<script src="<?=base_url('design/js/jquery.dataTables.min.js');?>"></script> 
<script src="<?=base_url('design/js/maruti.js');?>"></script> 
<script src="<?=base_url('design/js/maruti.tables.js');?>"></script>
<script src="<?=base_url('design/js/jquery.validate.js');?>"></script>
<script src="<?=base_url('design/js/jquery.wizard.js');?>"></script>
<script src="<?=base_url('design/js/maruti.wizard.js');?>"></script>

<script>
  $(document).ready(function(){
		$('#province').change(function(){
			var stateId = $(this).val();
			$.ajax({
				url:'<?=base_url();?>index.php/pages/getCity',
				type:'post',
				data: {id: stateId},
				dataType:'json',
				success: function(response){
					var select = document.getElementById("municipality");
					select.replaceChildren();
					for (var i = 0; i < response.length; i++) {
						var optn = response[i]['id'];
						var optn1 = response[i]['description'];
						var el = document.createElement("option");
						el.textContent = optn1;
						el.value = optn;
						select.appendChild(el);
					}
				}
			});
		});
		$('#municipality').change(function(){
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
						var optn1 = response[i]['description'];
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
					document.getElementById("zipcode").value=response[0]['zipcode'];
				}
			});
		});
	});
	$('.newdoctor').click(function(){
		document.getElementById('doc_id').value = '';
		document.getElementById('doc_lastname').value = '';
		document.getElementById('doc_firstname').value = '';
		document.getElementById('doc_middlename').value = '';
		document.getElementById('doc_sufix').value = '';
		document.getElementById('doc_extname').value = '';
		document.getElementById('doc_specialization').value = '';		
	});
	$('.editdoctor').click(function(){
		var id=$(this).data('id');		
		$.ajax({
				url:'<?=base_url();?>index.php/pages/fetchDoctor',
				type:'post',
				data: {id: id},
				dataType:'json',
				success: function(response){
					document.getElementById('doc_id').value = id;
					document.getElementById('doc_lastname').value = response[0]['lastname'];
					document.getElementById('doc_firstname').value = response[0]['firstname'];
					document.getElementById('doc_middlename').value = response[0]['middlename'];
					document.getElementById('doc_suffix').value = response[0]['suffix'];
					document.getElementById('doc_extname').value = response[0]['extname'];
					document.getElementById('doc_specialization').value = response[0]['specialization'];
				}
			});
	});
</script>
</body>
</html>
