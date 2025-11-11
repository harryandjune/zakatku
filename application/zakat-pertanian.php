<?php
/* Koneksi ke file function PHP*/
include($_SERVER['DOCUMENT_ROOT'] . '/zakat/functions/function.php');

/* Deklarasi variabel 
(pernyataan jika variabelnya belum terset maka isinya 0)
*/

$pertanian = isset($_POST['zakat_pertanian']) ? $_POST['zakat_pertanian'] : '0';
// merubah format angka ke integer (bilangan bulat)
$int_pertanian = (int)$pertanian;
// Hitung zakat pertanian

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
                <a class="nav-link active" href="zakat-pertanian.php">Pertanian</a>
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
            <label for="formGroupExampleInput">Hasil Panen</label>
            <input type="number" name="zakat_pertanian" class="form-control" id="formGroupExampleInput" placeholder="(Liter)">
        </div>
        <label class="mt-1" for="formGroupExampleInput">Jenis irigasi yang digunakan</label>
        <select class="form-select form-select-sm mt-2" name="irigasi" aria-label=".form-select-sm example">
            <option selected></option>
            <option value="alamiah">Alamiah</option>
            <option value="manual">manual</option>
        </select>
        <div class="col-auto">
            <button type="submit" name="hitung" class="btn btn-primary mt-2">Hitung</button>
            <p class="text-primary"><?php if (isset($_POST["hitung"])) {
                                        if ($_POST["irigasi"] == "alamiah") {
                                            $hasil = zakat_pertanian_alamiah($int_pertanian);
                                            echo $hasil;
                                        } elseif ($_POST["irigasi"] == "") {
                                            $hasil = "Pilih jenis irigasi terlebih dahulu !";
                                            echo $hasil;
                                        } else {
                                            $hasil = zakat_pertanian_manual($int_pertanian);
                                            echo $hasil;
                                        }
                                    }  ?>
            </p>
        </div>
    </form>
</main>


<?php include($_SERVER['DOCUMENT_ROOT'] . '/zakat/template/footer.php'); ?>