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
            <form action="" method="post" class=add_file_form>
                <label for="input_template">Путь</label>
                <input id=input_template class="input_template" name=input_template type="text">
                <button type="submit" value="Добавить файл" name=submit>Добавить файл</button>
            </form>
            <form action=""  method="post" class=rename_file_form>
                <label for="rename_template">Название</label>
                <input type="text" class=rename_template_null name="rename_template_null" style="display:none;">
                <input id=rename_template class="rename_template" name=rename_template type="text">
                <button type="submit" value="Добавить файл" name=submit>Переименовать</button>
            </form>
            <form action=""  method="post" class=add_folder_form>
                <label for="input_templat_foldere">Путь</label>
                <input id=input_template_folder class="input_template_folder" name=input_template_folder type="text">
                <button type="submit" value="Добавить файл" name=submit>Добавить папку</button>
            </form>
        </div>
    </div>
</body>
</html>
<?php
if (isset($_REQUEST['submit'])) {
    if (isset($_REQUEST['input_template']))
        add_file($_REQUEST['input_template']);
        if (isset($_REQUEST['input_template_folder']))
        add_folder($_REQUEST['input_template_folder']);
    if (isset($_REQUEST['rename_template_null']) && isset($_REQUEST['rename_template']))
        rename_file($_REQUEST['rename_template_null'], $_REQUEST['rename_template']);
        ?>
        <script> window.location.href = './';</script>
        <?php
}
?>