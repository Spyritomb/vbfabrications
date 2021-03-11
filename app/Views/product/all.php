<?php
$session = Config\Services::session();
$error = $session->getFlashdata('error') ?? '';
helper('form');
?>
<div class="wrapper">




    <!--<div class="container">-->
    <div class="row">
        <div class="col-md-2">
            <nav id="sidebarMenu">
                <div class="sidebar-sticky pt-3">
                    <p>Sort By</p>

                    <?php
                    echo "<p>$error</p>";

                    echo form_open(base_url('/product/all'));

                    echo form_checkbox('delaval', 'accept', FALSE);
                    echo form_label('Delaval','delaval');
                    echo '<br>';

                    echo form_checkbox('fullwood', 'accept', FALSE);
                    echo form_label('Fullwood','fullwood');
                    echo '<br>';

                    echo form_checkbox('geo', 'accept', FALSE);
                    echo form_label('GEO','geo');
                    echo '<br>';


                    echo form_submit('submit', 'Go');

                    echo form_close();

                    ?>
<!---->
<!--                    <form action="/action_page.php">-->
<!--                        <input type="checkbox" id="delaval" name="delaval" value="delaval">-->
<!--                        <label for="delaval"> DeLaval</label><br>-->
<!--                        <input type="checkbox" id="fullwood" name="fullwood" value="fullwood">-->
<!--                        <label for="vehicle2"> Fullwood</label><br>-->
<!--                        <input type="checkbox" id="gea" name="gea" value="gea">-->
<!--                        <label for="vehicle3"> GEA</label><br><br>-->
<!--                        <input type="submit" value="Submit">-->
<!--                    </form>-->


                </div>
            </nav>

        </div>
        <div class="col-md-10">
            <div class="card-deck">
                <div class="card">
                    <?= img("images/Tractor.JPG") ?>
                    <div class="card-body">
                        <h5 class="card-title">Tractor</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Details</a>
                    </div>
                </div>
                <div class="card">
                    <?= img("images/lely.JPG") ?>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional
                            content.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This card has even longer content than the first to show that equal
                            height action.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

