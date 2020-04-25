<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="icon" href="<?=base_url('assets/').'img/logo_xs.png'?>" type="image/icon type">
        <title><?= $_view_title ?></title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="<?=base_url('assets/').'css/bootstrap.min.css'?>">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="<?=base_url('assets/').'js/bootstrap.min.js'?>"></script>

        <!-- Custom fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Sweet Alert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.26.10/dist/sweetalert2.all.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.26.10/dist/sweetalert2.min.css">

        <!-- Datatables -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" charset="utf-8"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>

        <link href="<?=base_url('assets/').'js/bootstrap.min.js'?>index/img/logo.png" rel="shortcut icon">
        <link href="<?=base_url('assets/').'index/css/primary.css'?>" rel="stylesheet">
        <link href="<?=base_url('assets/').'index/css/index.css'?>" rel="stylesheet">
        <link href="<?=base_url('assets/').'index/css/footer.css'?>" rel="stylesheet">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?= base_url('assets/').'css/style.css'?>"/>

        <!-- Inject CSS -->
        <?php if($_show_custom_page_css){?>
            <link rel="stylesheet" href="<?= base_url('assets/').'css/pages/'.$_page_name.'.css'?>"/>
        <?php }?>

    </head>
    <body>
        <?php if(!empty($sidebar) && $sidebar) { echo $sidebar; }?>

        <?php if(!empty($sidebar) && $sidebar) {?>
            <!-- Use main content wrapper if sidebar shown -->

            <div class="main-content">
                <?php if(!empty($header) && $header) { echo $header; }?>
                
                <!-- Page title  -->
                <div class="page-content page-title-container padding-bottom-45">
                    <div class="container-fluid page-title">
                        <h5 style="color: #fff"><?= $_view_title; ?></h5>
                    </div>
                </div>
                <!-- End Page title -->

                <div class="page-content margin-top--45">
                    <?php if(!empty($_page) && $_page) { echo $_page; }?>
                </div>
                <?php if(!empty($footer) && $footer) { echo $footer; }?>
            </div>
        <?php } else{
            if(!empty($header) && $header) { echo $header; }
            if(!empty($_page) && $_page) { echo $_page; }
            if(!empty($footer) && $footer) { echo $footer; }
        }
        ?>
    </body>

    <!-- Showing toast scripts -->
    <script>
        
    </script>
</html>