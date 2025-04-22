</div>
<!-- Jquery Core Js -->
<script src="<?=base_url('design/assets/bundles/libscripts.bundle.js');?>"></script>

<!-- Plugin Js-->
<script src="<?=base_url('design/assets/bundles/dataTables.bundle.js');?>"></script>

<!-- Jquery Page Js -->
<script src="<?=base_url('design/assets/js/template.js');?>"></script>
<script src="<?=base_url();?>design/assets/js/select2.min.js"></script>
<script src="<?=base_url();?>design/assets/js/page/hr.js"></script>
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

</script>
</body>
</html>