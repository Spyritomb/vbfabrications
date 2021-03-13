<?php

$table = new \CodeIgniter\View\Table();

$table->setHeading('Name', 'Price', 'Description','Delete');
foreach($products as $product){
    $table->removeRow($product->name, $product->price, $product->description);
}
?>

<div class="wrapper">
    <div class="rcorners2" >
        <div style="height:120px;width:120px;">
            <?= $table->generate(); ?>
        </div>
    </div>
</div>
