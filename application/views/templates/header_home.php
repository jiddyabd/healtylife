<!DOCTYPE html>
<html lang="en">
<head>
  <title><?= $title ?></title>
  <link rel="shortcut icon" href="<?php echo base_url('assets/gambar/telkom.png') ?>">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> 
  
  <!-- Custom fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="http://localhost/telkomedika/assets/index/css/footer.css" rel="stylesheet">
  
  <!--bootstrap-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <style type="text/css">
        .navbar-red {
    	    background-color: #b01116;
    	    color: #fff;
		}
	    .navbar-red .navbar-brand {
    	    color: #fff;
	    }
	    .navbar-red .navbar-nav > li > a {
    	    color: #fff;
	    }
        .navbar-red .navbar-nav > li > a:hover,
        .navbar-red .navbar-nav > li > a:focus {
            background-color: #ee1c25;
            color: #fff;
        }
	    .box {
		    margin-top: 80px;
            margin-bottom: 20px;
		    padding: 10px;
		    background-color: #fff	;
		    border-radius: 5px;
	    }
	    body {
		    background-color: #D8D8D8;
        }
        /* img {
	        width: 70px;
	        margin-right: 10px;
        } */
        .foto{
            border-radius: 50%;
            width: 200px;
            height: 200px;
        }
        .profile-header {
            background-color: #C58200;
            padding: 24px;
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>
<?php
    $data_user = $this->session->userdata("datauser");
    $nama = $data_user["nama_pasien"];
?>

<nav class="navbar navbar-expand-lg bg-red fixed-top" style="background-color : #262828">
    <a class="navbar-brand" href="<?= base_url();?>pasien/home"><img src="http://localhost/healtylife/assets/gambar/logo2.png" style="width:100px"></a>
    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button> -->

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav m-auto">
            <li class="nav-item" >
                <a class="nav-link" href="<?php echo base_url('pasien/home'); ?>" style="color:white">Beranda</a>
            </li>
            <li class="nav-item">
            <span class="nav-link">|</span>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="<?php echo base_url('pasien/daftar_appointment'); ?>" style="color:white">Daftar Appointment</a>
            </li>
            <li class="nav-item">
                <span class="nav-link">|</span>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="<?php echo base_url('pasien/LihatJadwalPraktekDokter'); ?>" style="color:white">Edit Appointment</a>
            </li>
        </ul>
        <ul class="navbar-nav" style="margin-right:80px">
            <li class="navbar-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="color:white">
                    Akun
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#"><?php echo $nama?></a>
                    <a class="dropdown-item" href="<?= base_url()?>pasien/profil">Profil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo base_url("pasien/logout"); ?>" onclick="return confirm('Apakah anda yakin untuk keluar ?');">Logout</a>
                </div>
            </li>  
        </ul>
    </div>
</nav>