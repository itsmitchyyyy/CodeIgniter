
</body>
<script src="<?php echo base_url(); ?>assets/js/jq.js"></script>
<script src="<?php echo base_url(); ?>assets/js/pp.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bs.js"></script>
<script>

    function loadFile(event){
        var output = document.getElementById('studentImage');
        output.src = URL.createObjectURL(event.target.files[0]);    
    }

var windowInstance;
    $(function(){
        // PRINT
        $('body').append('<iframe id="print_frame" name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>');
        $("link").clone().appendTo($("#print_frame").contents().find("head"));
	    windowInstance = window.frames["print_frame"].window;


        $('#printTable').click(function(){
          var dataToPrint = $(this).data('print');
          window.frames["print_frame"].document.body.innerHTML = $('#'+dataToPrint)[0].outerHTML;
          window.frames["print_frame"].window.focus();
          windowInstance.print();
        });

        // END PRINT

        $('[data-toggle="tooltip"]').tooltip();
        // user logs
        $.ajax({
            url: "<?= base_url().'admin/logList'; ?>",
            type: "get",
            dataType: "json",
            cache: false,
            success: function(res){
               console.log(res);
            },
            error: function(){
                // 
            }
        });

        // student reports
         $.ajax({
            url: "<?= base_url().'admin/studentList'; ?>",
            type: "get",
            dataType: "json",
            cache: false,
            success: function(res){
                var tag = '';
                for(var i = 0; i < res.length; i++){
                    tag += `<tr>
                    <td>`+res[i].firstName+' '+res[i].lastName+`</td>
                    <td>`+res[i].grade+`</td>
                    <td>`+res[i].remarks+`</td>
                    </tr>`;
                }
                $('#studentList').append(tag);
            },
            error: function(){
                // 
            }
        });
    
        // teacher reports 
        $.ajax({
            url: "<?= base_url().'admin/teacherList'; ?>",
            type: "get",
            dataType: "json",
            cache: false,
            success: function(res){
                var tag = '';
                for(var i = 0; i < res.length; i++){
                    tag += `<tr>
                    <td>`+res[i].firstName+' '+res[i].lastName+`</td>
                    <td>`+res[i].sectionName+`</td>
                    <td>`+res[i].subjectName+`</td>
                    </tr>`;
                }
                $('#teacherList').append(tag);
            },
            error: function(){
                // 
            }
        });

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
                <?php if($this->uri->uri_string() == 'admin/insertSubject'): ?>
                    $('#addSubjectModal').modal('show');
                <?php endif;?>
                <?php if($this->uri->uri_string() == 'admin/insertTeacher'): ?>
                    $('#addTeacherModal').modal('show');
                <?php endif;?>
            <?php endif; ?>

        $('#studentForm select').each(function(){
            if($(this).has('option').length == 0){
                $('#studentSave').prop('disabled', true);
            }
        });
    });
</script>
</html>