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
                                    <input type="text" name="firstName" class="form-control" placeholder="First Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="lastName" class="form-control" placeholder="Last Name">
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" name="contactNo" class="form-control" placeholder="Contact No.">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="address" class="form-control" placeholder="Address">
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

                <div class="d-flex flex-row flex-wrap">
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