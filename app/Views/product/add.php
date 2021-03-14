<?php
$session = Config\Services::session();
$error = $session->getFlashdata('error') ?? '';
helper('form');
?>



<div class="wrapper">

    <?php


    echo "<p>$error</p>";
    echo form_open_multipart('product/add');

    echo form_label('Product Name','name');
    echo '<br>';
    echo form_input('name', old('name') ?? '');

    echo form_label('Product Price','price');
    echo '<br>';
    echo form_input('price', old('price') ?? '');

    echo form_label('Product Tag','tag');
    echo '<br>';
    echo form_input('tag', old('tag') ?? '');

    echo form_label('Product Description','description');
    echo '<br>';
    echo form_input('description', old('description') ?? '');
    echo '<br><br>';

    //////////////////////////////////////////////////////////////////////Ask ed about it,  https://codeigniter.com/user_guide/helpers/form_helper.html?highlight=list   search for drop-down field
    echo form_label('Product Category','category');
    echo '<br>';
    echo form_dropdown('category',$options);
    echo '<br><br>';
    //////////////////////////////////////////////////////////////////////

    echo form_label('Drag a photo or press browse...','upload');
    echo '<br>';
    echo form_upload('filename','filename');
    echo '<br><br>';


    echo form_submit('submit','Add Product');

    echo form_close();

    ?>

</div>