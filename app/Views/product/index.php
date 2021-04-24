<?php
$session = Config\Services::session();
$error = $session->getFlashdata('error') ?? '';
helper('form');
?>

<div class="container-fluid">
    <br><br>
    <!-- products row -->
    <div class="row">
        <div class="col-12 col-md-2 border-right">
                <div class="container h4">
                    <div>
                        <strong>Sort by</strong>
                        <br>
                    </div>
                    <div>
                        <form action="/product/all" method="get">
                            <br>
                            <input type="radio" id="all" name="category" value="all">
                            <label for="all"> All</label><br>

                            <input type="radio" id="spares" name="category" value="spares">
                            <label for="spares"> Spares</label><br>

                            <input type="radio" id="feeders" name="category" value="feeders">
                            <label for="feeders"> Feeders</label><br>

                            <input type="radio" id="bulktanks" name="category" value="bulktanks">
                            <label for="bulktanks"> Bulk Tanks</label><br>

                            <input type="radio" id="robotmilkers" name="category" value="robotmilkers">
                            <label for="robotmilkers"> Robot Milkers</label><br>

                            <input type="radio" id="clusters" name="category" value="clusters">
                            <label for="clusters"> Clusters</label><br>
                        </form>

                        <script>
                            $('input[type="radio"]').on('click', function () {

                                window.location = "/products/" + $(this).val();
                            });
                        </script>
                    </div>
                </div>
            </div>




        <div class="col-12 col-md-8">
            <div class=" row row-cols-1 row-cols-md-3 g-3">
                <?php foreach (@$products as $product): ?>
                    <div class="col">
                        <div class="card mb-4">
                            <?= img("/uploads/images/$product->filename", false, 'width="100%" height="300px"') ?>
                            <div class="card-body">
                                <h5 class="card-title"><?= $product->name; ?></h5>
                                <h6 class="card-title">Unique ID:&nbsp;<?= $product->tag; ?></h6>
                                <p class="card-text">
                                    <?= $product->description; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>



        <div class="col-12 col-md-2 border-left">
            <div class="container">
                <p>
                    <strong>For pricing please contact us at:</strong>
                </p>
                <div class="border-bottom border-top pt-1">
                    <p><i class="fas fa-phone"></i>&nbsp;(+44) 01260 226261</p>
                    <p><i class="fas fa-phone"></i>&nbsp;(+44) 01260 226544</p>
                </div>
                <div class="pt-1">
                    <a href="mailto:Vic@milkingequipment.com?subject=Mail from Our Site"><i class="icon-envelope"></i>&nbsp;Vic@milkingequipment.com</a>
                </div>
            </div>
        </div>

    </div>



</div>
