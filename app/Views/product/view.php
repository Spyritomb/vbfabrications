<?php
?>

<div class="row">
    <div class="ml-xl-5 text-left">
        <div><a href="/admin/dashboard"><i class="icon-long-arrow-left"></i>&nbsp;Back to dashboard</a></div>
    </div>

</div>

<div class="wrapper">
    <div class="container text-center">
        <div class="card-body text-dark">
            <h5 class="card-title "><strong>Click the name of the product to edit.</strong></h5>
        </div>
    </div>
    <div class="rcorners2">
        <div>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach (@$products as $product): ?>
                    <tr>
                        <th scope="row"><?= $product->id; ?></th>
                        <td><a class="text-dark" href="/product/update/<?= $product->id; ?>"><?= $product->name; ?></a>
                        </td>
                        <td><?= $product->price; ?></td>
                        <td><?= $product->description; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


