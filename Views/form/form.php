<form class="form-horizontal" method="post" enctype="multipart/form-data">
<div class="form-group">
    <label class="col-sm-2 control-label" for="name">Form Name</label>
    <div class="col-sm-2">
        <?php echo $foundForm['name']; ?>
    </div>
     <br style="clear: both;" />
        <hr>
</div>
    <?php
    if($foundFields){
    foreach($foundFields as $row_field) {	?>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="name"><?php echo $row_field['namelabel']; ?></label>

        <div class="col-sm-2">

           <?php

            $html_label = '';
            switch($row_field['name']){
                case 'textbox';
                $html_label = '<label >'.$row_field['namelabel'].'</label>';
                break;

                case 'select';
                $multi = $row_field['multi']->fetchAll(PDO::FETCH_ASSOC);
                $options = '';
                foreach($multi as $m){
                    $html_label = '<label >'.$m['optionlabel'].'</label>';
                }
                break;

                case 'checkbox';
                $html_label = '<label >'.$row_field['namelabel'].'</label>';
                break;

                case 'textarea';
                $html_label = '<label>'.$row_field['namelabel'].'</label>';
                break;

                case 'radio';
                $multi = $row_field['multi']->fetchAll(PDO::FETCH_ASSOC);
                $html_label = '';
                foreach($multi as $m){
                    $html_label = '<label >'.$m['optionlabel'].'</label>';
                }
                break;
            }

            echo $html_label;
            ?>

        </div>
    </div>

    <?php   }
    }
    ?>

    <a class="btn btn-primary" href="<?php echo URL_ROOT.APP_ROOT; ?>/form/<?php  echo $id; ?>/edit">Edit</a>

</form>