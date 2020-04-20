<body>

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="row">
            <div class="intro-text col-md-2">
              <a class="btn btn-xl text-uppercase js-scroll-trigger" style="border-color : #fff; background : #464343" href="<?php echo base_url('pasien/landing_pasien'); ?>">Pasien</a>
            </div>
            <div class="intro-text col-md-2">
              <!-- <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="">Pelanggan</a> -->
<!--               <a class="" href="pelanggan/login.php">Employee</a> -->
              <div class="dropdown">
              <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Employee
              </a>

              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="<?php echo base_url('dokter/landing_dokter'); ?>">Dokter</a>
                <a class="dropdown-item" href="<?php echo base_url('apoteker/landing_apoteker'); ?>">Apoteker</a>
                <!-- <a class="dropdown-item" href="#">Perawat</a> -->
              </div>
            </div>
            </div>
         </div>
         <br><br><br>
      </div>
    </header>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="http://localhost/healtylife/">
          <img class="img-fluid" src="http://localhost/telkomedika/assets/index/img/logo.png" width=80px alt="">
          &nbsp;ImuniHealth
        </a>
      </div>
    </nav>