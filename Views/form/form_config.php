<h3>Edit Form</h3>
<form class="form-horizontal" method="post" enctype="multipart/form-data">
    <input type="hidden" value="configform" name="action"/>
    <input type="hidden" value="<?php echo $foundForm['id']; ?>" name="id"/>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="name">Form Name</label>
        <div class="col-sm-2">
            <input name="name" value="<?php echo $foundForm['name']; ?>" type="text" class="form-control">
        </div>
        <br style="clear: both;" />
        <hr>
    </div>
    
    <?php

    if($foundFields){
        $ismultivalue = null;
        foreach($foundFields as $row_field) {   ?>
        <div class="form-group field-obj">
        <input type="hidden" value="<?php echo $row_field['id']; ?>"  name="fieldid[]"/>

        <label class="col-sm-2 control-label" for="name">Fields</label>
        <div class="col-sm-2">

            <label class="pull-left">Field Label</label>
            <input class="form-control field-name pull-left" type="text" name="namelabel[]" value="<?php echo $row_field['namelabel']; ?>" placeholder="Label name">

            <br style="clear: both;" />
            <br style="clear: both;" />

            <label class="pull-left">Field control</label>
            <select id="ctr-types" name="field[]" class="form-control pull-left">
                <option value="">...</option>
                <?php
                if($fieldTypes){ 
                    foreach ($fieldTypes as $row) { ?>
                        <?php if($row['name'] == $row_field['name'] ) {
                            $ismultivalue = $row['ismultivalue'] == 1;
                        ?>

                        <option selected="selected" multi="<?php echo $row['ismultivalue']; ?>" value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                        <?php }else{ ?>
                        <option multi="<?php echo $row['ismultivalue']; ?>" value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                    <?php  } }
                }
                ?>
            </select>

            <br style="clear: both;" />
            <br style="clear: both;" />

            <div class="multi-area" <?php if($ismultivalue) {echo 'style="display:block;"';}else{echo 'style="display:none;"';} ?> >
                <label class="pull-left">Field options</label>
                <?php
                $multi = $row_field['multi']->fetchAll(PDO::FETCH_ASSOC);
                if(empty($multi)){?>
                    <input class="field-options pull-left" type="text" name="<?php echo $row_field['namelabel']; ?>[]" value="" placeholder="Option name">
                    <a style="display:none;" class="del-multi btn btn-danger btn-xs pull-right">-</a>
                    <a class="add-multi btn btn-primary btn-xs pull-right">+</a>
                <?php }else{
                $i = 0;
                foreach($multi as $m){ ?>
                    <input class="field-options pull-left" type="text" name="<?php echo $row_field['namelabel']; ?>[]" value="<?php echo $m['optionlabel']; ?>" placeholder="Option name">
                    <a <?php if(count($multi) > 1) {echo 'style="display:block;"';}else{echo 'style="display:none;"';} ?> class="del-multi btn btn-danger btn-xs pull-right">-</a>
                    <a <?php if(++$i === count($multi)) {echo 'style="display:block;"';}else{echo 'style="display:none;"';}?>  class="add-multi btn btn-primary btn-xs pull-right">+</a>
                <?php } } ?>
                
                
                <br style="clear: both;" />
                <br style="clear: both;" />
            </div>
            <a class="field-del">Delete</a>
            <a class="field-add">Add</a>
            <hr>
        </div>
    </div>

        <?php   }
    }
    ?>
    <input class="btn btn-primary" type="submit" value="Update">

</form>


