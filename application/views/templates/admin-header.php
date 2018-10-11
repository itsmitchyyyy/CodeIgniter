<?php 

if(!isset($this->session->userdata['type'])){
    header('location:'.base_url());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bs.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
    <style>
        html, body{
            height:100%;
        }
        .w-15{
            width:15%;
        }
        .card-image{
            height: 200px;
        }
    </style>
</head>
<body>
