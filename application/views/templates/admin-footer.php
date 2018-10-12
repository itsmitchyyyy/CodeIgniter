
</body>
<script src="<?php echo base_url(); ?>assets/js/jq.js"></script>
<script src="<?php echo base_url(); ?>assets/js/pp.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bs.js"></script>
<script>

    function loadFile(event){
        var output = document.getElementById('studentImage');
        output.src = URL.createObjectURL(event.target.files[0]);    
    }

    $(function(){
        $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
            $('[data-toggle="tooltip"]').tooltip();

            <?php if(!empty(validation_errors())): ?>
                <?php if($this->uri->uri_string() == 'admin/insertStudent'): ?>
                    $('#assignStudentModal').modal('show');
                <?php endif;?>
                <?php if($this->uri->uri_string() == 'admin/insertSection'): ?>
                    $('#addSectionModal').modal('show');
                <?php endif;?>
            <?php endif; ?>
    });
</script>
</html>