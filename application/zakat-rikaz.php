<?php
/* Koneksi ke file function PHP*/
include($_SERVER['DOCUMENT_ROOT'] . '/zakat/functions/function.php');
/* Deklarasi variabel 
(pernyataan jika variabelnya belum terset maka isinya 0)
*/

$rikaz = isset($_POST['rikaz']) ? $_POST['rikaz'] : '0';
// merubah format angka ke integer (bilangan bulat)
$int_rikaz = (int)$rikaz;
// Hitung zakat emas
$zakatrikaz = zakat_rikaz($int_rikaz);


?>


<!-- Header -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/zakat/template/header.php'); ?>

<!-- bagian tabnav -->
<main class="container col-12 border-top-0 border-right-0 border-left-0 border-bottom-1">
    <div class="py-2">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link " aria-current="page" href="zakat-fitrah.php">Zakat Fitrah</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="zakat-emas-perak.php">Emas & Perak</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="zakat-uang.php">Uang</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="zakat-profesi.php">Profesi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="zakat-pertanian.php">Pertanian</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="zakat-peternakan.php">Peternakan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="zakat-rikaz.php">Rikaz</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="zakat-Perdagangan.php">Perdagangan</a>
            </li>
        </ul>
    </div>
    <form method="POST">
        <div class="form-group">
            <label for="formGroupExampleInput">Rikaz (Harta Terpendam)</label>
            <input type="number" name="rikaz" class="form-control" id="formGroupExampleInput" placeholder="Jumlah Harta (Rp)">
        </div>
        <br>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-2">Hitung</button>
            <p class="text-primary"><?php echo $zakatrikaz; ?></p>
        </div>
    </form>
</main>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/zakat/template/footer.php'); ?>