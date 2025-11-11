<?php
/* Koneksi ke file function PHP*/
include($_SERVER['DOCUMENT_ROOT'] . '/zakat/functions/function.php');

/* Deklarasi variabel 
(pernyataan jika variabelnya belum terset maka isinya 0)
*/

$profesi = isset($_POST['profesi']) ? $_POST['profesi'] : '0';
// merubah format angka ke integer (bilangan bulat)
$int_profesi = (int)$profesi;
// Hitung zakat profesi
$zakat_profesi = zakat_profesi($int_profesi);
$nishob_profesi = nishob() / 12;


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
                <a class="nav-link active" href="zakat-profesi.php">Profesi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="zakat-pertanian.php">Pertanian</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="zakat-peternakan.php">Peternakan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="zakat-rikaz.php">Rikaz</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="zakat-Perdagangan.php">Perdagangan</a>
            </li>
        </ul>
    </div>
    <form method="POST">
        <div class="form-group">
            <label for="formGroupExampleInput">Penghasilan Perbulan</label>
            <input type="number" name="profesi" class="form-control" id="formGroupExampleInput" placeholder="(Rp)">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mt-2">Hitung</button>
            <button type="button" class="btn btn-outline mt-2 btn-sm">Nishob zakat profesi sebesar <?php echo rupiah($nishob_profesi); ?>/bulan. Referensi harga emas: <a href="https://harga-emas.org/">www.harga-emas.com</a> </button>
            <p class="text-primary"><?php echo $zakat_profesi; ?></p>
        </div>
    </form>
</main>


<?php include($_SERVER['DOCUMENT_ROOT'] . '/zakat/template/footer.php'); ?>