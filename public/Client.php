<?php
require_once('methods/connect.php');
require('../libs/account.php');
require('../libs/inquiries_client.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <!-- <title>Авторизация и регистрация</title>-->
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body style="background-image:url(img/background.png)">
        <header class="header">
            <div class="header__wrapper">
                    <?php include('methods/Header.php') ?>
            </div>
        </header>
        <section class="section-posters">
            <div class="message_center">
                <?php include('methods/Client.php') ?>
                    <div class="btn_add">
                        <button class="button7"><a class="btn_href"  href="Add_bd.php">Добавить</a>  </button>
                    </div>
            </div>
        </section>
    </body>
</html>



