<?php
session_start();
include("blocks/databaselog.php");
$_SESSION['login'] == "";
date_default_timezone_set('Asia/Kolkata');
$ldate = date('d-m-Y h:i:s A', time());
session_unset();
$_SESSION['errmsg'] = "You have logged out";
?>
<script language="javascript">
    alert('Logout successful!');
    document.location = "index.php";
</script>