<?php
$session = \Config\Services::session();
?>

<div class="pr-0 mr-0">
    <div class=" navbar-expand-md navbar-dark bg-dark h-100">

        <?php if (!$session->get('loggedIn')): ?>
        <div class="text-center">
            <div class="text-white">
                <strong>Subscribe to our newsletter.</strong>
            </div>
        </div>

        <div>
            <form class="wrapper">
                <div class="form-row align-items-center">
                    <div class="col-auto mr-0 pr-0">
                        <label class="sr-only" for="inlineFormInput">Name</label>
                        <input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Name">
                    </div>
                    <div class="col-auto">
                        <label class="sr-only" for="inlineFormInput">Username</label>
                        <input type="text" class="form-control" id="inlineFormInput" placeholder="Surname">
                    </div>
                    <div class="col-auto">
                        <label class="sr-only" for="inlineFormInputGroup">E-mail</label>
                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Email">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-success mb-2">Subscribe</button>
                    </div>
                </div>
            </form>
        </div>
        <?php else: ?>
        <?php endif; ?>

        <div class="navbar-collapse collapse justify-content-center order-1" id="collapsingNavbar">
            <ul class="navbar-nav">
                <li class="nav-item active mr-5">
                    <a class="nav-link" href="https://www.facebook.com"><i class="fab fa-facebook"></i>&nbsp;Facebook&nbsp;&nbsp;</a>
                </li>
                <li class="nav-item active mr-5">
                    <a class="nav-link" href="https://instagram.com"><i class="fab fa-instagram"></i>&nbsp;Instagram&nbsp;&nbsp;</a>
                </li>
                <li class="nav-item active mr-5">
                    <a class="nav-link" href="https://youtube.com">&nbsp;&nbsp;<i class="fab fa-youtube"></i>&nbsp;&nbsp;&nbsp;Youtube</a>
                </li>
            </ul>
        </div>

        <div>
            <p class="text-white h-100">
                © 2021 17008762 | Keele University. All rights reserved.
            </p>
        </div>

    </div>

</div>
</body>
</html>

