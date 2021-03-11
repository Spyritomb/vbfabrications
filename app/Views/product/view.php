<?php

$table = new \CodeIgniter\View\Table();
$table->setHeading('Name', 'Price', 'Description');
foreach($products as $product){
    $table->addRow($product->name, $product->price, $product->description);
}
?>

<div class="wrapper">
    <div class="rcorners2">
        <?= $table->generate(); ?>
    </div>
</div>

