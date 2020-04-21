<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    
    <!--bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <!--custom style-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/style/style.css">

    <!--open iconic-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/style/open-iconic-master/font/css/open-iconic-bootstrap.css">

    <!-- icon title web -->
    <link rel="icon" type="image/png" href="<?php echo base_url("assets/gambar/logo.png");?>">
    
    <style type="text/css">
        button[type=submit]{
            background: #badc58;
            color: white;
            font-size: 11pt;
            width: 100%;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
        }
        button[type=submit]:hover{
            cursor: pointer;
            background: #46de4b;
        }
        input[type=submit]{
            background: #badc58;
            color: white;
            font-size: 11pt;
            width: 100%;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
        }
        input[type=submit]:hover{
            cursor: pointer;
            background: #46de4b;
        }
        /* html,body {
            margin:0;
            padding:0;
            height:100%;
        }
        .content {
            padding:10px;
            padding-bottom:80px;
        } */
        /* .footerbar {
            width:100%;
            height:80px;
            position: relative;
            bottom:0;
            left:0;
            flex-shrink: 0;
        } */
    </style>
</head>
<body style="font-family: sans-serif; background: #d5f0f3;">