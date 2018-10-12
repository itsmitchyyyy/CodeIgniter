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
                <button class="btn btn-info" data-target="#assignStudentModal" data-toggle="modal">
                    Assign Student
                </button>
                <!-- END BUTTON -->
            <!-- ADD MODAL -->
                <div class="modal fade" id="assignStudentModal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4>Assign Student</h4>
                                <button class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?php echo form_open_multipart('admin/insertStudent'); ?>
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
                                    <?php /** TODO **/ ?>
                                    <select name="subjectId" class="form-control <?php echo (form_error('subjectId')) ? 'is-invalid' : '' ?>">
                                            <option disabled selected>Subject</option>
                                        <?php foreach($subjects as $subject): ?>
                                            <option value="<?= $subject['id']; ?>"  <?php set_select('state', $subject['id'], ((!empty(set_select('state', $subject['id']))) ? TRUE : FALSE )) ?>><?= $subject['subjectName'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('subjectId'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-info">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END ADD MODAL -->
                <div class="d-flex flex-row justify-content-center flex-wrap">
                <?php foreach($students as $student): ?>
                <div class="card w-15 m-4">
                    <div class="card-image">
                    <img src="<?php echo base_url().'assets/uploads/'.$student['avatar']; ?>" class="card-img-top h-100 w-100">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php  echo "{$student['firstName']} {$student['lastName']}" ?></h5>
                        <p class="card-text">
                            <span>Contact No: <?php echo $student['contactNo']; ?></span>
                            <span>Address: <?php echo $student['address']; ?></span>
                        </p>
                        <div class="d-flex justify-content-end flex-row flex-wrap">
                            <a href="#" class="mr-2"><i class="material-icons">visibility</i></a>
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