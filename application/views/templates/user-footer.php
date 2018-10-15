
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

		$('#editStudentButton').click(function(){
			var studentId = $(this).data('edit');
			$.ajax({
				url: "<?= base_url().'teacher/getStudents' ?>",
				type: 'post',
				data: {
					section: "<?= $this->session->userdata['logged_in']['id'] ?>",
					student: studentId},
				dataType: 'json',
				cache: false,
				success: function(res){
					var frm = $('#editStudentForm');
					$.each(res, function(key, value){
						var controls = $('[name='+key+']', frm);
						switch(controls.prop("type")){
							case "radio": case "checkbox":
							controls.each(function(){
								if($(this).prop('value') == value) $(this).prop('checked', value);
							});
							break;
						default:
							controls.val(value);
						}
					});
					$('#editStudentModal').modal('show');
				},
				error: function(){
					// 
				}
			});
		});

		<?php if(!empty($this->session->flashdata('error'))): ?>
				$('#addGradeModal').modal('show');
		<?php endif; ?>
		<?php if(!empty($this->session->flashdata('passwordErrors'))): ?>
				$('#validationErrors').html(`<?= $this->session->flashdata('passwordErrors') ?>`);
				$('#editPasswordModal').modal('show');
		<?php endif; ?>
	});
</script>
</html>