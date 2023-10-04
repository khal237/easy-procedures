<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'Test', 'action' => 'index']) ?>">Home</a></li>
    </ol>
</nav>
<?php if ($user->id_role == 2 || $user->id_role == 3) : ?>
    <style>
        .dashboard {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
        }

        .dashboard-title {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .card {
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 18px;
            margin-bottom: 10px;
            text-align: center;
        }

        .card-value {
            font-size: 36px;
            font-weight: bold;
            text-align: center;
        }
    </style>

    <div class="dashboard">
        <h1 class="dashboard-title">Dashboad administrator</h1>
        <div class="row">
            <div class="col-sm-6 col-lg-12">
                <div class="overview-item overview-item--c3">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-calendar-note"></i>
                            </div>
                            <div class="text">
                                <h2>??</h2>
                                <span>number of procedure in pending</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>

<?php if ($user->id_role == 1) : ?>
    <style>
        /* Styles pour les boules de couleurs */
        .color-balls {
            position: relative;
            top: 0;
            left: 600px;
            width: 100%;
            height: 100%;
            z-index: -1;
            pointer-events: none;
        }

        .color-ball {
            position: absolute;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            opacity: 10;
            animation: moveBall 1s linear infinite;
        }

        .color-ball.red {
            background-color: #dc3545;
            top: 10%;
            left: 10%;
        }

        .color-ball.blue {
            background-color: #007bff;
            top: 10%;
            left: -10%;

        }

        .color-ball.yellow {
            background-color: #ffc107;
            top: 10%;
            left: -10%;
        }

        .color-ball.green {
            background-color: #28a745;
            top: 20%;
            left: -80%;
        }

        .color-ball.red {
            background-color: #dc3545;
            /* Couleur rouge */
        }

        .color-ball.blue {
            background-color: #007bff;
            /* Couleur bleue */
        }

        .color-ball.yellow {
            background-color: #ffc107;
            /* Couleur jaune */
        }

        .color-ball.green {
            background-color: #28a745;
            /* Couleur verte */
        }

        /* Animations */
        @keyframes moveBall {
            0% {
                transform: translate(0, 0);
            }

            25% {
                transform: translate(100%, 0);
            }

            50% {
                transform: translate(100%, 100%);
            }

            75% {
                transform: translate(0, 100%);
            }

            100% {
                transform: translate(0, 0);
            }
        }
    </style>

    <div class="container">
        <div class="row mt-5">
            <div class="col-12 text-center">
                <h1 class="display-4 mb-4">Welcome to Easy procedure</h1>
                <p class="lead">your app of easy procedure of bank</p>
                <div class="mt-4">
                    <a href="<?= $this->Url->build(['controller' => 'Procedures', 'action' => 'index']) ?>" class="btn btn-primary mr-2">Start here</a>
                    <a href="#" class="btn btn-danger">know more</a>
                </div>
            </div>
        </div>
    </div>


<?php endif; ?>