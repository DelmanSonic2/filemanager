<?php
function getExtension($filename)
{
    if (strpos($filename, '.'))
        return preg_replace('/^.*\.(.*)$/U', '$1', $filename);
    else
        return null;
}

function openfolder($folder, $class = '')
{
    if ($class != '') {
        $cd = 'class=' . $class;
    }
    $dir = opendir($folder);
    $html = '';
    $html .= '<ul ' . $cd . '>';
    while ($file = readdir($dir)) {
        if (getExtension($file) == 'php' && $name = $folder . '/' . $file) {
            $html .= '<li><a target=a1 href="./CMEditor/index.php?openfile=.' . $name . '"><img src="/img/php.svg"><span>' . $file . '</span></a></li>';
        }
        if (getExtension($file) == 'css' && $name = $folder . '/' . $file) {
            $html .= '<li><a target=a1 href="./CMEditor/index.php?openfile=.' . $name . '"><img src="/img/css.png"><span>' . $file . '</span></a></li>';
        }
        if (getExtension($file) == 'js' && $name = $folder . '/' . $file) {
            $html .= '<li><a target=a1 href="./CMEditor/index.php?openfile=.' . $name . '"><img src="/img/js.png"><span>' . $file . '</span></a></li>';
        }
        if ((getExtension($file) == 'png' || getExtension($file) == 'jpg' || getExtension($file) == 'webp' || getExtension($file) == 'webp') && $name = $folder . '/' . $file) {
            $html .= '<li><a target=a1 href="' . $name . '"><img src="/img/img.png"><span>' . $file . '</span></a></li>';
        }
        if (is_dir($folder  . '/' . $file) && $file != '.' && $file != '..' && $name = $folder . '/' . $file) {
            $html .= '<li><div class=accordion><img src="/img/folder.svg"><span>' . $file . '</span> <img template="'.$name.'" class=add_file src = "/img/plus.svg"></div>';
            $html .= openfolder($name, 'panel');
            $html .= '</li>';
        }
    }
    $html .= '</ul>';
    return $html;
}
class DB
{
    private static $db;
    static function connect()
    {
        self::$db = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB);
    }
    static function query($q)
    {
        if (empty(self::$db)) {
            self::connect();
        }
        self::$db->query($q);
    }
    static function select($q)
    {
        if (empty(self::$db)) {
            self::connect();
        }
        $res = self::$db->query($q);
        return $res->fetch_all(MYSQLI_ASSOC);
    }
}
function add_file($file)
{
    $fl = fopen($file, 'w');
    fclose($fl);
}
