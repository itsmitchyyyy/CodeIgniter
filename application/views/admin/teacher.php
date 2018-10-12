<div class="wrapper">
        <!-- Sidebar Holder -->
       <?php $this->load->view('admin/sidebar') ?>
        <!-- START CONTENT -->
        <div id="content">
        <!-- NAVBAR  -->
            
       <?php $this->load->view('admin/navbar') ?>
            <!-- END NAVBAR -->
            <div>
                <!-- MESSAGE SESSION -->
                <?php if($this->session->flashdata('message')): ?>
                    <div class="alert alert-success">
                        <p><?php echo $this->session->flashdata('message'); ?></p>
                    </div>
                <?php endif; ?>
                <!-- END SESSION -->
                <!-- ADD BUTTON -->
                <button class="btn btn-info" data-target="#assignTeacherModal" data-toggle="modal">
                    Assign Teacher
                </button>
                <!-- END BUTTON -->
            <!-- ADD MODAL -->
                <div class="modal fade" id="assignTeacherModal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4>Assign Teacher</h4>
                                <button class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?php echo form_open_multipart('admin/insertTeacher', array('id' => 'studentForm')); ?>
                                <div class="align-items-center d-flex justify-content-center mb-4">
                                    <input type="file" class="d-none" name="userPic" id="studentAvatar" onchange="loadFile(event)">
                                    <div class="studentAvatarContainer">
                                    <label for="studentAvatar" class="pointer" data-toggle="tooltip" title="Select avatar">
                                    <img class="studentAvatarImage" src="<?php echo base_url()?>assets/images/blank.jpg" alt="" id="studentImage">
                                    </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="firstName" class="form-control <?php echo (form_error('firstName')) ? 'is-invalid' : '' ?>" value="<?=set_value('firstName')?>" placeholder="First Name">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('firstName'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="lastName" class="form-control <?php echo (form_error('lastName')) ? 'is-invalid' : '' ?>" value="<?=set_value('lastName')?>" placeholder="Last Name">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('lastName'); ?>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" name="contactNo" class="form-control <?php echo (form_error('contactNo')) ? 'is-invalid' : '' ?>" value="<?=set_value('contactNo')?>" placeholder="Contact No.">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('contactNo'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="address" class="form-control <?php echo (form_error('address')) ? 'is-invalid' : '' ?>" value="<?=set_value('address')?>" placeholder="Address">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('address'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php $config = array();
                                    foreach($subjects as $subject){
                                            $config[$subject['id']] = $subject['subjectName'];
                                    }
                                    $attrib = array();
                                    $attrib['class'] = form_error('subjectId[]') ? 'form-control is-invalid' : 'form-control';
                                    echo form_dropdown('subjectId[]' , $config, $config, $attrib);
                                    ?>
                                    <div class="invalid-feedback">
                                        <?= form_error('subjectId[]'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php $config = array();
                                        foreach($sections as $section){
                                            $config[$section['id']] = $section['sectionName'];
                                        }
                                    $attrib = array();
                                    $attrib['class'] = form_error('sectionId') ? 'form-control is-invalid' : 'form-control';
                                    echo form_dropdown('sectionId', $config, '', $attrib);
                                    ?>
                                    <div class="invalid-feedback">
                                        <?= form_error('sectionId'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-info" id="teacherSave">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END ADD MODAL -->
                <div class="d-flex flex-row justify-content-between flex-wrap">
                <?php foreach($teachers as $teacher): ?>
                <div class="card w-15 m-4">
                    <div class="card-image">
                    <img src="<?php echo base_url().'assets/uploads/'.$teacher['avatar']; ?>" class="card-img-top h-100 w-100">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php  echo "{$teacher['firstName']} {$teacher['lastName']}" ?></h5>
                        <p class="card-text d-flex flex-column">
                            <span>Contact No: <?= $teacher['contactNo']; ?></span>
                            <span>Address: <?= $teacher['address']; ?></span>
                            <span>Section: <?= $teacher['sectionName']; ?> </span>
                            <div class="d-flex flex-column">
                                <span>Subjects</span>
                                <div class="d-flex flex-row flex-wrap">
                                    <?php $this->load->model('admin_model');
                                        $teacherSubjects = $this->admin_model->teacherSubjects($teacher['teacherId']);
                                        foreach($teacherSubjects as $subject):
                                    ?>
                                    <span class="m-2"><?= $subject['subjectName']; ?></span>
                                <?php endforeach; ?>

                                </div>
                            </div>
                        </p>
                        <div class="d-flex justify-content-end flex-row flex-wrap">
                            <a href="#" class="mr-2"><i class="material-icons">edit</i></a>
                            <a href="#"><i class="material-icons">delete_forever</i></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- END CONTENT -->
    </div>
    <!-- END WRAPPER -->