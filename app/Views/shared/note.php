<?php
$type = isset($type) ? $type : 'info';
$message = isset($message) ? $message : '';
?>
<div class="alert alert-<?php echo $type; ?>"><?php echo $message; ?></div>