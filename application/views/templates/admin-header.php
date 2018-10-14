<?php 

if(isset($this->session->userdata['type']) !== 'admin'){
    redirect('/');
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
            width: 28%;
        }
        .card-image{
            height: 200px;
        }
        .is-invalid{
            border-color: red !important;
        }
        .invalid-feedback p {
            color: red !important;
        }

@media (max-width: 575.98px) { 
    .w-15{
    width: 100% !important;
  }
 }
@media (min-width: 576px) and (max-width: 767.98px) { 
  .w-15{
    width: 42% !important;
  }
}

@media (min-width: 768px) and (max-width: 991.98px) { 
    .w-15{
    width: 40% !important;
    }
}
@media (min-width: 992px) and (max-width: 1199.98px) { 
    .w-15{
    width: 43% !important;
    }
}


    </style>
</head>
<body>
