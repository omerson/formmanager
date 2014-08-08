    <?php
    if($foundFields){
        while($row = $foundFields->fetch(PDO::FETCH_ASSOC)) {	?>
            ihhkjhj
            <div>
                <a href="<?php echo URL_ROOT.APP_ROOT; ?>/field/<?php  echo $row['id']; ?>/edit"> <?php echo $row['namelabel']; ?></a>
            </div>
            <div>
                <?php echo $row['value']; ?>
            </div>
            <div>
                <a href="<?php echo URL_ROOT.APP_ROOT; ?>/field/<?php  echo $row['id']; ?>/delete">Delete</a>
            </div>

            <div>
                <a href="<?php echo URL_ROOT.APP_ROOT; ?>/field/<?php  echo $row['id']; ?>/new">Add</a>
            </div>

            <div>
                <?php echo $row['form']; ?>
            </div>
        <?php   }
    }
    ?>
