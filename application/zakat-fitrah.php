<?php
/* Koneksi ke file function PHP*/
include($_SERVER['DOCUMENT_ROOT'] . '/zakat/functions/function.php');
/* Deklarasi variabel 
(pernyataan jika variabelnya belum terset maka isinya 0)
*/
// zakat fitrah dengan makanan pokok
$jiwa = isset($_POST['jiwa']) ? $_POST['jiwa'] : '0';
// merubah format angka ke integer (bilangan bulat)
$int_jiwa = (int)$jiwa;
// Hitung zakat fitrah dalam bentuk makanan pokok
$kgzakat_fitrah = zakat_fitrah($int_jiwa);

// zakat fitrah dengan uang
$jiwa2 = isset($_POST['jiwa2']) ? $_POST['jiwa2'] : '0';
$harga_beras = isset($_POST['hargaberas']) ? $_POST['hargaberas'] : '0';

// merubah format angka ke integer (bilangan bulat)
$int_jiwa2 = (int)$jiwa2;
$int_hargaberas = (int)$harga_beras;
// Hitung zakat fitrah dalam bentuk rupiah
$rpzakat_fitrah = zakat_fitrahrp($int_jiwa2, $int_hargaberas);


?>


<!-- Header -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/zakat/template/header.php'); ?>

<!-- bagian tabnav -->
<main class="container col-12 border-top-0 border-right-2 border-left-0 border-bottom-2">
    <div class="py-2">
        <ul class="nav nav-tabs navbar-inverse">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Zakat Fitrah</a>
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
                <a class="nav-link" href="zakat-Perdagangan.php">Perdagangan</a>
            </li>
        </ul>
    </div>
    <form method="POST">
        <div class="form-group">
            <label for="formGroupExampleInput">Zakat Menggunakan Beras</label>
            <input type="number" name="jiwa" class="form-control" id="formGroupExampleInput" placeholder="jumlah jiwa">
            <button type="submit" name="hitung1" class="btn btn-primary mt-3">Hitung</button>
        </div>
        <p class="text-primary"> <?php echo $kgzakat_fitrah; ?></p>
        </div>
        <br>
    </form>
    <form method="POST">
        <div class="form-group">
            <label for="formGroupExampleInput2">Zakat Menggunakan Uang</label>
            <input type="number" class="form-control" name="jiwa2" id="formGroupExampleInput2" placeholder="jumlah jiwa" required>
            <input type="number" class="form-control mt-3" placeholder="Harga Beras yang dikonsumsi per kilogram" name="hargaberas" required>
        </div>
        <br>
        <div class="col-auto">
            <button name="hitung2" type="submit" class="btn btn-primary mb-2">Hitung</button>
            <p class="text-primary"><?php echo $rpzakat_fitrah; ?></p>
        </div>
    </form>
</main>
<form action=""></form>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/zakat/template/footer.php'); ?>