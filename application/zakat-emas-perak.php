<?php


/* Koneksi ke file function PHP*/
include($_SERVER['DOCUMENT_ROOT'] . '/zakat/functions/function.php');


/* Deklarasi variabel 
(pernyataan jika variabelnya belum terset maka isinya 0)
*/

$emas = isset($_POST['emas']) ? $_POST['emas'] : '0';
// merubah format angka ke integer (bilangan bulat)
$int_emas = (int)$emas;
// Hitung zakat emas
$zakatemas = zakat_emas($int_emas);

/* Deklarasi variabel 
(pernyataan jika variabelnya belum terset maka isinya 0)
*/
$perak = isset($_POST['perak']) ? $_POST['perak'] : '0';
$int_perak = (int)$perak;

// hitung zakat
$zakatperak = zakat_perak($int_perak);


?>


<!-- Header -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/zakat/template/header.php'); ?>

<!-- bagian tabnav -->
<main class="container col-12 border-top-0 border-right-0 border-left-0 border-bottom-2">
  <div class="py-2">
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link " aria-current="page" href="zakat-fitrah.php">Zakat Fitrah</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="#">Emas & Perak</a>
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
      <label for="formGroupExampleInput">Zakat Emas</label>
      <input type="number" name="emas" class="form-control" id="formGroupExampleInput" placeholder="(gram)">
    </div>
    <p class="text-primary"><?php echo $zakatemas; ?></p>
    </div>
    <br>
    <div class="form-group">
      <label for="formGroupExampleInput2">Zakat Perak</label>
      <input type="number" class="form-control" name="perak" id="formGroupExampleInput2" placeholder="(gram)">
    </div>
    <br>
    <div class="col-auto">
      <button type="submit" class="btn btn-primary mb-2">Hitung</button>
      <p class="text-primary"><?php echo $zakatperak; ?></p>
    </div>
  </form>
</main>


<?php include($_SERVER['DOCUMENT_ROOT'] . '/zakat/template/footer.php'); ?>