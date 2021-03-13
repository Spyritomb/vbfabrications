<?php

$table = new \CodeIgniter\View\Table();


$template = [
    'table_open'         => '<table border="0" cellpadding="4" cellspacing="0">',

    'thead_open'         => '<thead>',
    'thead_close'        => '</thead>',

    'heading_row_start'  => '<tr>',
    'heading_row_end'    => '</tr>',
    'heading_cell_start' => '<th>',
    'heading_cell_end'   => '</th>',

    'tfoot_open'         => '<tfoot>',
    'tfoot_close'        => '</tfoot>',

    'footing_row_start'  => '<tr>',
    'footing_row_end'    => '</tr>',
    'footing_cell_start' => '<td>',
    'footing_cell_end'   => '</td>',

    'tbody_open'         => '<tbody>',
    'tbody_close'        => '</tbody>',

    'row_start'          => '<tr>',
    'row_end'            => '</tr>',
    'cell_start'         => '<td>',
    'cell_end'           => '</td>',

    'row_alt_start'      => '<tr>',
    'row_alt_end'        => '</tr>',
    'cell_alt_start'     => '<td>',
    'cell_alt_end'       => '</td>',

    'table_close'        => '</table>'
];

$table->setHeading('Name', 'Price', 'Description');
$table->setTemplate($template);
foreach($products as $product){
    $table->addRow($product->name, $product->price, $product->description);
}
?>

<div class="wrapper">
    <div class="rcorners2" >
        <div style="height:120px;width:120px;">
            <?= $table->generate(); ?>
        </div>
    </div>
</div>

