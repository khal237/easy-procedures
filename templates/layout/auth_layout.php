<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title><?= $this->request->getParam('action') ?></title>

    <!-- Fontfaces CSS-->
    <link href="<?= $this->Path->template_path() ?>css/font-face.css" rel="stylesheet" media="all">
    <link href="<?= $this->Path->template_path() ?>vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?= $this->Path->template_path() ?>vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?= $this->Path->template_path() ?>vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?= $this->Path->template_path() ?>vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?= $this->Path->template_path() ?>vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?= $this->Path->template_path() ?>vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?= $this->Path->template_path() ?>vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?= $this->Path->template_path() ?>vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?= $this->Path->template_path() ?>vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?= $this->Path->template_path() ?>vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?= $this->Path->template_path() ?>vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?= $this->Path->template_path() ?>css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="<?= $this->Path->template_path() ?>images/icon/logo.png" alt="CoolAdmin">
                            </a>
                        </div>
                            <center><?= $this->Flash->render() ?></center>
                            <?= $this->fetch('content') ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="<?= $this->Path->template_path() ?>vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?= $this->Path->template_path() ?>vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?= $this->Path->template_path() ?>vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?= $this->Path->template_path() ?>vendor/slick/slick.min.js">
    </script>
    <script src="<?= $this->Path->template_path() ?>vendor/wow/wow.min.js"></script>
    <script src="<?= $this->Path->template_path() ?>vendor/animsition/animsition.min.js"></script>
    <script src="<?= $this->Path->template_path() ?>vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?= $this->Path->template_path() ?>vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?= $this->Path->template_path() ?>vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?= $this->Path->template_path() ?>vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?= $this->Path->template_path() ?>vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?= $this->Path->template_path() ?>vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?= $this->Path->template_path() ?>vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="<?= $this->Path->template_path() ?>js/main.js"></script>

</body>

</html>
<!-- end document-->