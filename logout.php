
<?php
    session_start();
    error_reporting(0);

    session_destroy();
    session_unset();
?>
<script type="text/javascript">
    window.location = "index.php";
</script>