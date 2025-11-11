<?php
/* Koneksi ke file function PHP*/
// require 'application/function.php';

include($_SERVER['DOCUMENT_ROOT'] . '/zakat/functions/function.php');


/*Deklarasi variabel 
(pernyataan jika variabelnya belum terset maka isinya 0)
*/

$barang = isset($_POST['barang']) ? $_POST['barang'] : '0';
$omzet = isset($_POST['omzet']) ? $_POST['omzet'] : '0';
$piutang = isset($_POST['piutang']) ? $_POST['piutang'] : '0';
$utang = isset($_POST['utang']) ? $_POST['utang'] : '0';

// merubah format angka ke integer (bilangan bulat)
$int_barang = (int)$barang;
$int_omzet = (int)$omzet;
$int_piutang = (int)$piutang;
$int_utang = (int)$utang;

// penjumlahan harta
$totalharta = $int_barang + $int_omzet + $int_piutang - $int_utang;

$kadar_zakat = zakat_perdagangan($totalharta);
include($_SERVER['DOCUMENT_ROOT'] . '/zakat/template/header.php');
?>




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
                <a class="nav-link" href="zakat-rikaz.php">Rikaz</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="zakat-Perdagangan.php">Perdagangan</a>
            </li>
        </ul>
    </div>
    <form method="POST">
        <div class="form-group">
            <label for="formGroupExampleInput">Nilai Barang Dagangan</label>
            <input type="number" name="barang" class="form-control" id="formGroupExampleInput" placeholder="(rp)">
        </div>
        <div class="form-group">
            <label class="mt-3" for="formGroupExampleInput">Omzet</label>
            <input type="number" name="omzet" class="form-control" id="formGroupExampleInput" placeholder="(rp)">
        </div>
        <div class="form-group">
            <label class="mt-3" for="formGroupExampleInput">Piutang</label>
            <input type="number" name="piutang" class="form-control" id="formGroupExampleInput" placeholder="(rp)">
        </div>
        <div class="form-group">
            <label class="mt-3" for="formGroupExampleInput">Utang</label>
            <input type="number" name="utang" class="form-control" id="formGroupExampleInput" placeholder="(rp)">
        </div>

        <br>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-2">Hitung</button> <button type="button" class="btn btn-outline mt-2 btn-sm">Nishob sebesar <?php echo rupiah(nishob()); ?>. Referensi harga emas: <a href="https://harga-emas.org/">www.harga-emas.com</a> </button>
            <p class="text-primary"><?php echo $kadar_zakat; ?></p>
        </div>
    </form>
</main>


<?php include($_SERVER['DOCUMENT_ROOT'] . '/zakat/template/footer.php'); ?>