<form class="form-horizontal" method="post" enctype="multipart/form-data">
<input type="hidden" value="editform" name="action"/>
<input type="hidden" value="<?php echo $id ?>" name="id"/>

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
        <?php //var_dump($row_field); ?>
        <label class="col-sm-2 control-label" for="name"><?php echo $row_field['namelabel']; ?></label>

        <div class="col-sm-2">

           <?php

            $html_input = '';
            switch($row_field['name']){
                case 'textbox';
                $html_input = '<input class="form-control" type="text" name="'.$row_field["namelabel"].'" value="'.$row_field['value'].'" />';
                break;

                case 'select';
                $multi = $row_field['multi']->fetchAll(PDO::FETCH_ASSOC);

                $options = '';
                foreach($multi as $m){
                    if($m['selected'] == 1){
                        $options = $options.'<option selected="selected">'.$m['optionlabel'].'</option>';
                    }else{
                        $options = $options.'<option>'.$m['optionlabel'].'</option>';
                    }
                }
                $html_input = '<select name="'.$row_field["namelabel"].'" class="form-control"><option>Select</option>'.$options.'</select>';
                break;

                case 'checkbox';
                if(is_null($row_field['value'])){
                    $html_input = '<input class="form-control" type="checkbox" name="'.$row_field['namelabel'].'">';
                }else{
                    $html_input = '<input class="form-control" checked type="checkbox" name="'.$row_field['namelabel'].'">';
                }
                break;

                case 'textarea';
                $html_input = '<textarea name="'.$row_field["namelabel"].'" class="form-control">'.$row_field['value'].'</textarea>';
                break;

                case 'radio';
                $multi = $row_field['multi']->fetchAll(PDO::FETCH_ASSOC);

                $html_input = '';
                foreach($multi as $m){
                    if($m['selected'] == 1){
                        $html_input = $html_input.'<input class="pull-left" checked type="radio" name="'.$row_field['namelabel'].'" value="'.$m['optionlabel'].'">'.$m['optionlabel'].'<br>';                        
                    }else{
                        $html_input = $html_input.'<input class="pull-left" type="radio" name="'.$row_field['namelabel'].'" value="'.$m['optionlabel'].'">'.$m['optionlabel'].'<br>';
                    }
                }
                break;
            }

            echo $html_input;
            ?>


        </div>
    </div>

    <?php   }
    }
    ?>

    <input class="btn btn-primary" type="submit" value="Save">

</form>