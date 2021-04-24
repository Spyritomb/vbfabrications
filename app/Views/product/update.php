<?php
$session = Config\Services::session();
$error = $session->getFlashdata('error') ?? '';
helper('form');
?>
<div class="row">
    <div class="ml-xl-5 text-left">
        <div><a href="/product/view"><i class="icon-long-arrow-left"></i>&nbsp;Back to Edit Products</a></div>
    </div>

</div>
<div class="wrapper">

    <?php


    echo "<p>$error</p>";
    echo form_open_multipart('product/update');

    echo form_label('Product Name','name');
    echo '<br>';
    echo form_input('name', old('name') ?? $product->name);

    echo form_label('Product Price','price');
    echo '<br>';
    echo form_input('price', old('price') ?? $product->price);

    echo form_label('Product Tag','tag');
    echo '<br>';
    echo form_input('tag', old('tag') ?? $product->tag);

    echo form_label('Product Description','description');
    echo '<br>';
    echo form_input('description', old('description') ?? $product->description);
    echo '<br><br>';

    //////////////////////////////////////////////////////////////////////Ask ed about it,  https://codeigniter.com/user_guide/helpers/form_helper.html?highlight=list   search for drop-down field
    echo form_label('Product Category','category');
    echo '<br>';
    echo form_dropdown('category',$options,old('category') ?? $product->category);
    echo '<br><br>';
    //////////////////////////////////////////////////////////////////////

    echo form_label('Drag a photo or press browse...','upload');
    echo '<br>';
    echo form_upload('filename','filename');
    echo '<br><br>';

    echo form_hidden('id', $product->id); // Never do this in production

    echo form_submit('submit','Update Product');

    echo form_close();

    ?>

</div>