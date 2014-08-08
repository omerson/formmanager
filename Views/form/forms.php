<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Saved forms</div>
    <div class="panel-body">
        <p>Configured and saved forms</p>
    </div>

    <!-- Table -->
    <table class="table">
        <thead>
        <tr>
            <th>Form Name</th>
            <th>Creation Date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
<?php
	if($foundForms){
        while($row = $foundForms->fetch(PDO::FETCH_ASSOC)) {	?>
        <tr>
            <td style="text-align: left;">
                <a href="<?php echo URL_ROOT.APP_ROOT; ?>/form/<?php  echo $row['id']; ?>/edit"> <?php echo $row['name']; ?></a>
            </td>
            <td style="text-align: left;">
                <?php echo date_format(date_create($row['creationdate']), 'm/d/Y H:i:s'); ?>
            </td>
            <td style="text-align: left;">
                <a class="btn btn-primary" href="<?php echo URL_ROOT.APP_ROOT; ?>/form/<?php  echo $row['id']; ?>/config">Configure</a>
                <a class="btn btn-danger" href="<?php echo URL_ROOT.APP_ROOT; ?>/form/<?php  echo $row['id']; ?>/delete">Delete </a>
            </td>
        </tr>
<?php   }
    }
?>

        </tbody>
    </table>
</div>