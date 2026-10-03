<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
session_start();
session_destroy();
?>
<script>
document.location = "../agent.php";
</script>../agent.php