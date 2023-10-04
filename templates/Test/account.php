<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'Test', 'action' => 'index']) ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Account</li>
    </ol>
</nav>
<div class="containers">

    <h1 class="h1">My account</h1>
    <img src="<?= $this->Path->template_path() ?>images/icon/avatar-01.png" alt="Photo de profil" class="profiles-image">
    <p><i class="fa fa-user-circle"></i><span class="info-value"><?= h($user->name) ?></span>&nbsp;<span class="info-value"><?= h($user->surname); ?></span></p>
    <table class="table table-top-campaign">
        <tr>
            <td>
                <p><span class="info-label"><i class="fa fa-link"></i>Email</span>
            </td>
            <td><span class="info-value"><?= h($user->email); ?></span></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><span class="info-label"><i class="fa fa-phone"></i>Phone</span>
            </td>
            <td> <span class="info-value"><?php echo h($user->phonenumber); ?></span></p>
            </td>
        </tr>
    </table>
    <?php if($user->id_role == 1 || $user->id_role == 3):?>
    <div class="buttons">
        <p><a href="#" class="change-password-link"><i class="fa fa-key"></i>change password?</a></p>
        <p><a href="<?= $this->Url->build(['controller'=>'Users', 'action'=>'edit' , $user->id])?>" class="change-password-links"><i class="fa fa-edit"></i>edit profil</a></p>
    </div>
    <?php endif;?>
    <style>
        .containers {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .p {
            margin-bottom: 10px;
        }

        .info-label {
            font-weight: bold;
            color: #555;
        }

        .info-value {
            color: #777;
        }

        .profile-image {
            max-width: 200px;
            border-radius: 50%;
        }

        .buttons {
            display: flex;
            margin-left: 45%;
            
        }

        .change-password-link {
            color: white;
            text-decoration: none;
            font-weight: bold;
            background-color: #007bff;
            border-radius: 5px;
        }

        .change-password-links {
            color: white;
            text-decoration: none;
            font-weight: bold;
            background-color: #666;
            border-radius: 5px;
            margin-left: 7px;
        }
    </style> 