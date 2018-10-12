<div class="wrapper">
        <!-- Sidebar Holder -->
       <?php $this->load->view('admin/sidebar') ?>
        <!-- END Sidebar -->
        <div id="content">
            <!-- NAVBAR -->
       <?php $this->load->view('admin/navbar') ?>
       <!-- ENDN AVBAR -->
            <div>
                <!-- MESSAGE SESSION -->
                <?php if($this->session->flashdata('message')): ?>
                    <div class="alert alert-success">
                        <p><?php echo $this->session->flashdata('message'); ?></p>
                    </div>
                <?php endif; ?>
                <!-- END SESSION -->
                <!-- ADD BUTTON -->
                <button class="btn btn-info" data-target="#addSubjectModal" data-toggle="modal">
                    Add Subject
                </button>
                <!-- END BUTTON -->
                <?= validation_errors(); ?>
            <!-- ADD MODAL -->
                <div class="modal fade" id="addSubjectModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Subject</h5>
                                <button class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?php echo form_open('admin/insertSubject'); ?>
                                <div class="form-group">
                                    <input type="text" class="form-control <?php echo (form_error('edpCode')) ? 'is-invalid' : '' ?>" name="edpCode" placeholder="Edp Code" value="<?=set_value('edpCode') ?>">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('edpCode'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control <?php echo (form_error('subjectName')) ? 'is-invalid' : '' ?>" name="subjectName" placeholder="Subject Name" value="<?=set_value('subjectName') ?>">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('subjectName'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control <?php echo (form_error('maxCapacity')) ? 'is-invalid' : '' ?>" name="maxCapacity" placeholder="Max Capacity" value="<?=set_value('maxCapacity') ?>">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('maxCapacity'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control <?php echo (form_error('units')) ? 'is-invalid' : '' ?>" name="units" placeholder="Units" value="<?=set_value('units') ?>">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('units'); ?>
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
            <!-- END MODAl -->
                <!-- LIST -->
                <table class="table table-bordered table-striped m-2 mr-auto ml-auto">
                    <tr>
                        <th>Edp Code</th>
                        <th>Subject Name</th>
                        <th>Units</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($subjects as $subject): ?>
                        <tr>
                            <td><?php echo $subject['edpCode']; ?></td>
                            <td><?php echo $subject['subjectName']; ?></td>
                            <td><?php echo $subject['units']; ?></td>
                            <td><?php echo ($subject['status'] == 1) ? 'Open':'Closed'; ?></td>
                            <td>
                            <a href="#" class="mr-2"><i class="material-icons">visibility</i></a>
                            <a href="#" class="mr-2"><i class="material-icons">edit</i></a>
                            <a href="#"><i class="material-icons">delete_forever</i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <!-- END LIST -->
               <div>
                   
               </div>
            </div>
        </div>
    </div>