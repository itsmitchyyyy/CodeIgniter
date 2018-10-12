
</body>
<script src="<?php echo base_url(); ?>assets/js/jq.js"></script>
<script src="<?php echo base_url(); ?>assets/js/pp.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bs.js"></script>
<script type="text/javascript">
	function addGrade(id){
		$('#studentId').val(id);
		$('#addGradeModal').modal('show');
	}

	$(function(){
		$('#grade').blur(function(){
			$(this).val(parseFloat($(this).val()).toFixed(1));
		});

		<?php if(!empty($this->session->flashdata('error'))): ?>
				$('#addGradeModal').modal('show');
		<?php endif; ?>
	});
</script>
</html>