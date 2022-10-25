<body>
 <h4>Poniżej znajdują się dane odebrane z formularza:</h4>
 <?php
 $surname = $_GET['surname']; 
 print("Nazwisko: $surname ");
 print("<br />Wiek: " . $_GET['age']);
 print("<br />Adres e-mail:" . $_GET['email']);
 ?>
 <h4>Zamawiane produkty:</h4>
 <?php
 if (isset($_GET['PHP'])) print("- PHP<br />");
 if (isset($_GET['C'])) print("- C++<br />");
 if (isset($_GET['Java']))print("- Java<br />");
 ?>
 <h4>Sposob platnosci:</h4>
 <?php
 $payment = $_GET['payment'];
 print($payment);
 ?>
</body>