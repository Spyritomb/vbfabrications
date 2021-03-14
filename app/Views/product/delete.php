<?php
?>


<div class="wrapper">
    <div class="rcorners2">
        <form action="/product/delete" method="post">

            <table class="table table-striped table-bordered table-hover">

                <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach (@$products as $product): ?>
                    <tr>
                        <th scope="row"><?= $product->id; ?></th>
                        <td><?= $product->name; ?></td>
                        <td><?= $product->price; ?></td>
                        <td><?= $product->description; ?></td>
                        <td><input type="checkbox" id="" name="products[]" value="<?= $product->id; ?>"></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>

    </div>
    <input type="submit" value="Submit">
    </form>
</div>
