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
                <button class="btn btn-info" data-target="#addSectionModal" data-toggle="modal">
                    Assign Section
                </button>
                <!-- END BUTTON -->
                
            <!-- ADD MODAL -->
                <div class="modal fade" id="addSectionModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Section</h5>
                                <button class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?php echo form_open('admin/insertSection'); ?>
                                <div class="form-group">
                                    <input twype="text" class="form-control <?php echo (form_error('sectionName')) ? 'is-invalid' : '' ?>" name="sectionName" placeholder="Section Name" value="<?=set_value('sectionName') ?>">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('sectionName'); ?>
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
                <table class="table table-bordered table-striped m-2 w-75 mr-auto ml-auto">
                    <tr>
                        <th>Section Name</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($sections as $section): ?>
                        <tr>
                            <td><?php echo $section['sectionName']; ?></td>
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