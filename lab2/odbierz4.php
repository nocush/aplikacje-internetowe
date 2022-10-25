<?php
$jezyki = $_REQUEST['jezyki'];
print("Wybrane tutoriale:");
foreach($jezyki as $key=>$value) {
    print($value .',');
}
$payment = $_GET['payment'];
print($payment);
?>
<h4>Lacza utworzone</h4>
<?php
$surname = $_GET['surname'];
$age = $_GET['age'];
$email = $_GET['email'];
print("<p><a href='klient.php?surname=$surname&age=$age&email=$email'>");
print("Informacje</a>")
?> 