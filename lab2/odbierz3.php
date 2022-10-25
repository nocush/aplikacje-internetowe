<h4>Petla:</h4>
<?php
$jezyki = $_REQUEST['jezyki'];
    foreach($jezyki as $key=>$value) {
        echo "$key = $value <br />";
       }
?>
<h4>Implode</h4>
<?php
echo implode(",",$_REQUEST['jezyki'])
?>

<?php
foreach($_REQUEST as $key=>$value) {
    echo "<br>";
    echo var_dump($key = $value);
   }
?>
