<?php $this->load->view('templates/redirect'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bs.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
    <style>
        html, body{
            height:100%;
        }
        body{
            position:relative;
        }
        body:after{
            content: '';
            height:100%;
            width:100%;
            background: url("<?php echo base_url(); ?>/assets/images/bg.jpg");
            background-repeat: no-repeat;
            background-size:cover;
            position: fixed;
            z-index: -1;
            top:0;
            left:0;
            -webkit-filter: grayscale(50%);
            filter: grayscale(50%);
        }
    </style>
</head>
<body>

<div class="loader" id="loader"></div>
    