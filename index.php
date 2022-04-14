<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filemanager</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<script defer src="/js/script.js"></script>


<?php
require_once('inc/functions.php');

?>
<div class="main">
    <aside>
        <?php echo openfolder('.');?>
    </aside>
    <div class="editor">
        <iframe name="a1"></iframe>
    </div>
</div></body>

</html>