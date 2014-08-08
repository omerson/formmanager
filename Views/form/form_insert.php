<h3>New Form</h3>
<form class="form-horizontal" method="post" enctype="multipart/form-data">
    <input type="hidden" value="newform" name="action"/>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="name">Form Name</label>
        <div class="col-sm-2">
            <input name="name" type="text" class="form-control">
        </div>
         <br style="clear: both;" />
        <hr>
    </div>

    <div class="form-group field-obj">
        <label class="col-sm-2 control-label" for="name">Fields</label>
        <div class="col-sm-2">

            <label class="pull-left">Field Label</label>
            <input class="form-control field-name pull-left" type="text" name="namelabel[]" value="" placeholder="Label name">

            <br style="clear: both;" />
            <br style="clear: both;" />

            <label class="pull-left">Field control</label>
            <select id="ctr-types" name="field[]" class="form-control pull-left">
                <option>...</option>
                <?php
                if($foundTypes){
                    while($row = $foundTypes->fetch(PDO::FETCH_ASSOC)) {	?>
                        <option  multi="<?php echo $row['ismultivalue']; ?>" value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                    <?php   }
                }
                ?>
            </select>

            <br style="clear: both;" />
            <br style="clear: both;" />

            <div class="multi-area" style="display: none;">
                <label class="pull-left">Field options</label>
                
                <input class="field-options pull-left" type="text" name="" value="" placeholder="Option name">
                <a style="display:none;" class="del-multi btn btn-danger btn-xs pull-right">-</a>
                <a class="add-multi btn btn-primary btn-xs pull-right">+</a>
                
                <br style="clear: both;" />
                <br style="clear: both;" />
            </div>
            <a class="field-del">Delete</a>
            <a class="field-add">Add</a>
            <hr>
        </div>
    </div>

    <input class="btn btn-primary" type="submit" value="Create">

</form>


