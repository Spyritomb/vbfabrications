<?php
$session = Config\Services::session();
$error = $session->getFlashdata('error') ?? '';
helper('form');
?>

<div class="container-lg">
    <br><br><br>
    <!-- products row -->
    <div class="row">

        <div class="col-12 col-md-4">
            <div class="row">
                <nav class="navbar navbar-dark">
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </nav>
            </div>
            <div class="row">
                <div>
                    <p>Sort By</p>
                </div>
                <div>
                    <?php
                    echo "<p>$error</p>";

                    echo form_open(base_url('/product/all'));

                    echo form_checkbox('delaval', 'accept', FALSE);
                    echo form_label('Delaval', 'delaval');
                    echo '<br>';

                    echo form_checkbox('fullwood', 'accept', FALSE);
                    echo form_label('Fullwood', 'fullwood');
                    echo '<br>';

                    echo form_checkbox('geo', 'accept', FALSE);
                    echo form_label('GEO', 'geo');
                    echo '<br>';


                    echo form_submit('submit', 'Go');

                    echo form_close();

                    ?>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-8">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <?php foreach (@$products as $product): ?>
                    <div class="col">
                        <div class="card">
                            <?= img("/uploads/images/$product->filename", false, 'width="350" height="300"') ?>
                            <div class="card-body">
                                <h5 class="card-title"><?= $product->name; ?></h5>
                                <p class="card-text">
                                    <?= $product->description; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>