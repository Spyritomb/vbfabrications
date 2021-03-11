<?php
$session = Config\Services::session();
$error = $session->getFlashdata('error') ?? '';
helper('form');
?>

<link href="/assets/css/stylesheet.css" type="text/css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Logo -->
<!--        <div class="fadeIn first">-->
            <?= img("images/logo.png") ?>


        <?php
        echo "<p>$error</p>";

        echo form_open(base_url('/admin/login'));

        echo form_label('Username', 'username');
        echo '<br>';
        echo form_input('username', old('username') ?? '');

        echo form_label('Password', 'password');
        echo '<br>';
        echo form_password('password', old('password') ?? '');

        echo form_submit('submit', 'Login');

        echo form_close();

        ?>

        <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
        </div>
    </div>
    </div>
<!--</div>-->