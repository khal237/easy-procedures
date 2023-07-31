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
    <title>Dashboard</title>

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
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="<?= $this->Path->template_path() ?>images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a href="<?= $this->Url->build(['controller' => 'Requirements', 'action' => 'index']) ?>">
                                <i class="fas fa-tachometer-alt"></i><?= __('Dashboad') ?>
                            </a>
                        </li>
                        <?php if ($user->id_role == 2 || $user->id_role == 3) : ?>
                            <li class="has-sub">
                                <a href="<?= $this->Url->build(['controller' => 'Requirements', 'action' => 'index']) ?>">
                                    <i class="fas fa-copy"></i><?= __('check procedures') ?>
                                </a>
                            </li>
                            <?php if ($user->id_role == 3) : ?>
                                <li>
                                    <a href="<?= $this->Url->build(['controller' => 'Requirements', 'action' => 'index']) ?>">
                                        <i class="fas fa-copy"></i><?= __('Add new procedure') ?>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?= $this->Url->build(['controller' => 'Requirements', 'action' => 'index']) ?>">
                                        <i class="fas fa-copy"></i><?= __('add new users') ?>
                                    </a>

                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if ($user->id_role == 1) : ?>
                            <li>
                                <a href="<?= $this->Url->build(['controller' => 'Requirements', 'action' => 'index']) ?>">
                                    <i class="fas fa-copy"></i><?= __('follow procedure') ?>
                                </a>

                            </li>
                            <li>
                                <a href="<?= $this->Url->build(['controller' => 'Requirements', 'action' => 'index']) ?>">
                                    <i class="fas fa-copy"></i><?= __('consult a procedure') ?>
                                </a>

                            </li>
                        <?php endif; ?>

                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="<?= $this->Path->template_path() ?>images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                            <a href="<?= $this->Url->build(['controller' => 'Test', 'action' => 'index']) ?>">
                                <i class="fas fa-tachometer-alt"></i><?= __('Dashboad') ?>
                            </a>
                        </li>
                        <?php if ($user->id_role == 2 || $user->id_role == 3) : ?>
                            <li class="has-sub">
                                <a href="<?= $this->Url->build(['controller' => 'Test', 'action' => 'proceduresrequirements']) ?>">
                                    <i class="fas fa-copy"></i><?= __('check procedures') ?>
                                </a>
                            </li>
                            <?php if ($user->id_role == 3) : ?>
                                <li>
                                    <a href="<?= $this->Url->build(['controller' => 'Requirements', 'action' => 'index']) ?>">
                                        <i class="fas fa-copy"></i><?= __('requirements') ?>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?= $this->Url->build(['controller' => 'Requirements', 'action' => 'index']) ?>">
                                        <i class="fas fa-copy"></i><?= __('add new users') ?>
                                    </a>

                                </li><?php endif; ?><?php endif; ?>
                                <?php if ($user->id_role == 1) : ?>
                                    <li>
                                        <a href="<?= $this->Url->build(['controller' => 'Requirements', 'action' => 'index']) ?>">
                                            <i class="fas fa-copy"></i><?= __('follow procedure') ?>
                                        </a>

                                    </li>
                                    <li>
                                        <a href="<?= $this->Url->build(['controller' => 'Requirements', 'action' => 'index']) ?>">
                                            <i class="fas fa-copy"></i><?= __('consult a procedure') ?>
                                        </a>

                                    </li><?php endif; ?>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">

                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">1</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 1 Notifications</p>
                                            </div>

                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="<?= $this->Path->template_path() ?>images/icon/avatar-01.jpg" alt="khalil ndam" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"> <?php echo $user->name; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="<?= $this->Path->template_path() ?>images/icon/avatar-01.jpg" alt="khalil ndam" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"> <?php echo $user->name; ?></a>
                                                    </h5>
                                                    <span class="email"> <?php echo $user->email; ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="<?= $this->Url->build(['controller' => 'Requirements', 'action' => 'index']) ?>">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="<?= $this->Url->build(['controller' => 'Requirements', 'action' => 'index']) ?>">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>

                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="<?= $this->Url->build(['controller' => 'Auth', 'action' => 'logout']) ?>">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
            <div class="main-content">
                <?= $this->Flash->render();?>
                <?= $this->fetch('content') ?>
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