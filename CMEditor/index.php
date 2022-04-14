<!doctype html>

<meta charset="utf-8" />
<link rel=stylesheet href="docs.css">
<link rel="stylesheet" href="codemirror.css">

<script src="codemirror.js"></script>
<script src="matchbrackets.js"></script>
<script src="htmlmixed.js"></script>
<script src="xml.js"></script>
<script src="javascript.js"></script>
<script src="css.js"></script>
<script src="clike.js"></script>
<script src="php.js"></script>
<style type="text/css">
  .CodeMirror {
    border-top: 1px solid black;
    border-bottom: 1px solid black;
  }
</style>

<?
require_once("../inc/functions.php");
require_once("../config.php");
if (isset($_REQUEST['savefile']) && $_REQUEST['savefile'] != '' && isset($_REQUEST['code']) && $_REQUEST['code'] != '') {
  savefile();
  $filename = $_REQUEST['savefile'];
}
if (isset($_REQUEST['openfile']) && $filename == '') {

  $filename = $_REQUEST['openfile'];
  echo "<center><b>Открыт: $filename </b></center>";
}
?>

<form action="index.php" method="POST">
  <input type="hidden" name="savefile" value="<? echo $filename; ?>">
  <textarea id="code" name="code">
<?
if (isset($_REQUEST['openfile']) || isset($_REQUEST['savefile'])) {
  loadfile($filename);
}
?>
</textarea>
  <input type="submit" value="Сохранить">
</form>

<script>
  var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
    lineNumbers: true,
    matchBrackets: true,
    mode: "application/x-httpd-php",
    indentUnit: 4,
    indentWithTabs: true
  });
</script>

<?

function loadfile($filepath)
{
  if (file_exists($filepath)) {
    print_r(htmlspecialchars(file_get_contents($filepath)));
  } else {
    echo "Файл не найден { $filepath }";
    $dir = "../../";
    if (is_dir($dir)) {
      if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
          print "Файл: $file : тип: " . filetype($dir . $file) . "\n";
        }
        closedir($dh);
      }
    }
  }
}
function savefile()
{
  $fin = $_REQUEST['savefile'];
  backup('set',$fin);
  $fn = fopen($fin, 'w');
  fputs($fn, $_REQUEST['code']);
  fclose($fn);
}

function backup($type,$filename)
{
  switch ($type) {
    case 'set':
      $fnn = $filename;
      if(strpos($filename,'../') !==false){
        $filename = str_replace('../','',$filename);
      }
      
      $fn = date("ymdhms").$filename;
      $fn = str_replace("/","_",$fn);
      $file = fopen(ROOT."/backup/".$fn,'w');
      fputs($file,file_get_contents($fnn));
      fclose($file);
      DB::query("INSERT INTO `backups`( `date`, `time`, `filename`, `filename_backup`) VALUES ('".date('Y-m-d')."','".date('h-m-s')."','".$fnn."','".$fn."')");
      break;
    case 'get':

      break;
  }
}
?>