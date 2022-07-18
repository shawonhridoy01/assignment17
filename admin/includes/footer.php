<?php 

if(basename(__DIR__)  != "admin" ){
	$isInternal = true;
	$baseUrl = "../";
}else{
	$isInternal = false;
	$baseUrl = "";
}

?>
	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo $baseUrl; ?>assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo $baseUrl; ?>assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo $baseUrl; ?>assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo $baseUrl; ?>assets/js/plugins/loaders/blockui.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>

	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo $baseUrl;?>assets/js/plugins/forms/selects/bootstrap_select.min.js"></script>
	<script type="text/javascript" src="<?php echo $baseUrl;?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?php echo $baseUrl;?>assets/js/plugins/forms/selects/select2.min.js"></script>
	
	<script type="text/javascript" src="<?php echo $baseUrl;?>assets/js/plugins/uploaders/fileinput.min.js"></script>

	<script type="text/javascript" src="<?php echo $baseUrl; ?>assets/js/core/app.js"></script>
	<script type="text/javascript" src="<?php echo $baseUrl; ?>assets/js/pages/form_bootstrap_select.js"></script>

	<!-- <script type="text/javascript" src="assets/js/pages/dashboard.js"></script> -->
	<script type="text/javascript" src="<?php echo $baseUrl; ?>assets/js/pages/datatables_basic.js"></script>
	<script type="text/javascript" src="<?php echo $baseUrl;?>assets/js/pages/uploader_bootstrap.js"></script>
	<!-- /theme JS files -->

	<!-- <script type="text/javascript">
    // $('#courseTable').DataTable();
    
    $('#courseTable').DataTable({
        dom: 'lBfrtip',
            "iDisplayLength": 10,
            "lengthMenu": [ 10, 25,30, 50 ],
            columnDefs: [
                {'orderable':false, "targets": 5 }
            ]
    });
</script> -->
