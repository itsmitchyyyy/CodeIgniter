<div class="wrapper">
        <!-- Sidebar Holder -->
       <?php $this->load->view('admin/sidebar') ?>
        <!-- START CONTENT -->
        <div id="content">
        <!-- NAVBAR  -->
            
       <?php $this->load->view('admin/navbar') ?>
            <!-- END NAVBAR -->
            <div>
                <?php $this->load->view('admin/reports/pills') ?>
                <div>
                   <div class="d-flex m-2 flex-row flex-wrap">
                        <div class="d-flex">
                            <a href="#" id="printTable" data-print="teacherList" data-toogle="tooltip" title="Print" data-placement="top">
                                <i class="material-icons">print</i>
                            </a>
                        </div>
                   </div>
                    <table id="teacherList" class="mt-2 table table-striped tabled-bordered">
                        <tr>
                            <th>Name</th>
                            <th>Section</th>
                            <th>Subject</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
</div>