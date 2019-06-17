<?php
session_start();

$_SESSION["rowAdded"];

if($_SESSION["rowAdded"] == 1) { ?>

<div class="alert alert-success">
  Data Added
</div>

<?php }

$_SESSION["rowAdded"] = '';


?>
