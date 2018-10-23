<?php $this->load->view('students/navbar'); ?>

<div class="container-fluid">
    <?php if(!empty($this->session->flashdata('message'))): ?>
       <div class="snackbar" id="snackbar"><?= $this->session->flashdata('message'); ?></div>
    <?php endif; ?>
    <div class="w-50 mt-4 mr-auto ml-auto">
        <h4>Subject List</h4>
        <ul class="list-group">
        <?php $gradeList = array();
            foreach($subjects as $index => $subject): ?>
            <?php
                 $gradeList[$index] = $subject['grade'];
                 $totalUnits = 0.00;
                 $totalUnits = ($subject['remarks'] == 'Failed') ? $totalUnits + 0 : $totalUnits + $subject['units'] ?>
            <li class="list-group-item grade list-group-item-action pointer d-flex flex-justify-content-between align-items-center <?= ($subject['remarks'] == 'Failed') ? ' failed' : 'passed' ?>">
                <div class="d-flex flex-column flex-grow-1">
                    <span>Subject: <strong><?= $subject['subjectName']; ?></strong></span>
                    <small>EDP Code: <strong><?= $subject['edpCode']; ?></strong></small>
                    <small>Units: <strong><?= ($subject['remarks'] == 'Failed') ? '0.00': $subject['units'] ?></strong></small>
                </div>
                <div class="d-flex flex-column align-items-center">
                    <span class="badge badge-pill <?= ($subject['remarks'] == 'Failed') ? 'badge-primary' : 'badge-success' ?>" style="font-size: 16px;"><?= $subject['grade']; ?></span>
                    <small>Grade</small>
                </div>
            </li>
        <?php endforeach; ?>
        </ul>
        <div class="border-top mt-2"></div>
        <div class="d-flex flex-row mt-2">
            <div class="d-flex flex-grow-1">
                <span>Total Units: <strong><?= number_format($totalUnits, 2) ?></strong></span>
            </div>
            <div class="d-flex">
                <span>Average: <strong><?= number_format(array_sum($gradeList) / count($gradeList), 2) ?></strong></span>
            </div>
        </div>
    </div>
</div>