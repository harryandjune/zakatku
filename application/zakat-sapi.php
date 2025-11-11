<?php
include($_SERVER['DOCUMENT_ROOT'] . '/zakat/functions/function.php');

/* Deklarasi variabel 
(pernyataan jika variabelnya belum terset maka isinya 0)
*/

$sapi = isset($_POST['sapi']) ? $_POST['sapi'] : '0';
// merubah format angka ke integer (bilangan bulat)
$int_sapi = (int)$sapi;
// Hitung zakat emas
$zakatsapi = zakat_sapi($int_sapi);
include($_SERVER['DOCUMENT_ROOT'] . '/zakat/template/header.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Form zakat emas -->
    <form method="POST">
        <input type="number" placeholder="jumlah sapi" name="sapi">
        <br>
        <input type="submit" value="hitung" name="login">
    </form>
    <br>
    <!-- <h3> <?php echo $zakatsapi; ?></h3> -->



    <?php include($_SERVER['DOCUMENT_ROOT'] . '/zakat/template/footer.php'); ?>

</html>