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
            <?php echo openfolder('.'); ?>
        </aside>
        <div class="editor">
            <iframe name="a1"></iframe>
        </div>
    </div>
    <div class="dn">
        <div class="add_file_modal">
            <form action="" class=add_file_form>
                <label for="input_template">Путь</label>
                <input id=input_template class="input_template" name=input_template type="text">
                <button type="submit"  value="Добавить файл" name=submit>Добавить файл</button>
            </form>
        </div>
    </div>
</body>

</html>
<?php
if (isset($_REQUEST['submit'])) {
    add_file($_REQUEST['input_template']);
}
?>