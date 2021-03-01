<?php
helper('form');

?>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="/assets/css/stylesheet.css" type="text/css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Logo -->
        <div class="fadeIn first">
            <?= img("images/logo.png") ?>
        </div>


        <!-- Login Form -->
        <!--    <form>-->
        <!--      <input type="text" id="login" class="fadeIn second" name="login" placeholder="login">-->
        <!--      <input type="text" id="password" class="fadeIn third" name="login" placeholder="password">-->
        <!--      <input type="submit" class="fadeIn fourth" value="Log In">-->
        <!--    </form>-->
        <?= form_open(base_url('admin/login')); ?>
        <?= form_input([
                '' => ''
        ]); ?>
        <?= form_input([
            '' => ''
        ]); ?>
        <?= form_submit([

        ]); ?>
        <?= form_close(); ?>

        <!-- Remind Password -->
        <!--        <div id="formFooter">-->
        <!--            <a class="underlineHover" href="#">Forgot Password?</a>-->
        <!--        </div>-->

    </div>
</div>