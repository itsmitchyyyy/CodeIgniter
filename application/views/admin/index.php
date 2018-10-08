<div class="wrapper">
        <!-- Sidebar Holder -->
       <?php $this->load->view('admin/sidebar') ?>

        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </nav>
            <div>
                <button class="btn btn-info" data-target="#assignStudentModal" data-toggle="modal">
                    Assign Student
                </button>

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
                                    <input type="file" class="d-none" name="userAvatar" id="studentAvatar" onchange="loadFile(event)">
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
            </div>
        </div>
    </div>