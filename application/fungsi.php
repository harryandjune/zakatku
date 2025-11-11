<?php

/* fungsi harga_emas merupakan fungsi untuk mengambil Harga emas per gram dari www.harga-emas.com
yang update setiap hari dengan mengambil meta tag dengan menggunakan fungsi get_meta_tags php
*/
function harga_emas()
{
    $harga = get_meta_tags("https://harga-emas.org/");
    $hargaemas = $harga["description"];
    $hargaemasantam = substr($hargaemas, 72, -25);


    // Harga Emas hari ini
    $angka = $hargaemasantam;
    $angka_jadi = preg_replace("/[^0-9]/", "", $angka);

    return $angka_jadi;
}

/* fungsi nishob() merupakan fungsi untuk menghitung nishob (batas minimal harta sehingga wajib zakat) 
berdasarkan harga emas yang diambil dari fungsi harga_emas dikali 85 sesuai dengan hukum Islam
*/
function nishob()
{
    $hrg_emas = harga_emas();
    $nishob = 85;
    $nishob_emas = $hrg_emas * $nishob;
    // $nishob_emas_titik = number_format ($nishob_emas);
    return $nishob_emas;
}

/* fungsi menghitung zakat fitrah dengan beras dan uang*/


function zakat_fitrah($jiwa)
{
    $kadar_fitrah = 3;
    if ($jiwa <= 0) {
        $output = "";
        return $output;
    } else {
        $output = $jiwa * 3;
        $hasil = "Jumlah zakat yang dikeluarkan sebesar " . $output . " kg";
        return $hasil;
    }
}

function zakat_fitrahrp($jiwa, $harga_beras)
{
    $kadar_fitrah = 3;
    if ($jiwa <= 0) {
        $output = "";
        return $output;
    } else {
        $kadar = $harga_beras * $kadar_fitrah;
        $hasil = $kadar * $jiwa;
        $output = "Jumlah zakat yang dikeluarkan sebesar Rp " . number_format($hasil);
        return $output;
    }
}

/*fungsi zakat uang */
function zakat_uang($uang)
{
    $nishob = nishob();
    if ($uang >= $nishob) {
        $output = $uang / 40;
        $hasil = "Jumlah zakat yang dikeluarkan sebesar " . rupiah($output);
        return $hasil;
    } elseif ($uang <= 0) {
        $output = "";
        return $output;
    } else {
        $pesan = "Belum mencapai nishob/belum wajib zakat";
        return $pesan;
    }
}


/* fungsi untuk menghitung nishob zakat profesi yang diambil
berdasarkan nishob zakat emas 85 gr dengan harga emas terupdate 
dibagi menjadi 12 (bulan) */

function nihsob_zakat_profesi()
{
    $nishob = nishob() / 12;
    return $nishob;
}

// fungsi untuk menghitung zakat emas

function zakat_emas($emas)
{
    if ($emas > 0 && $emas <= 84) {
        $belum_wajib = "Belum mencapai nishob/belum wajib zakat";
        return $belum_wajib;
    } elseif ($emas == 0) {
        $kosong = "";
        return $kosong;
    } else {
        $kadaremas = 40;
        $wajib_zakat = $emas / $kadaremas;
        $formatangka = number_format($wajib_zakat, 2);
        $output = "Zakat anda sebesar " . $formatangka . " gram emas";
        return $output;
    }
}

// fungsi untuk menghitung zakat perak 

function zakat_perak($perak)
{
    if ($perak > 0 && $perak <= 594) {
        $belum_wajib = "Belum mencapai nishob/belum wajib zakat";
        return $belum_wajib;
    } elseif ($perak == 0) {
        $kosong = "";
        return $kosong;
    } else {
        $kadazakatperak = 40;
        $wajib_zakat = $perak / $kadazakatperak;
        $formatangka = number_format($wajib_zakat, 2);
        $output = "Zakat anda sebesar " . $formatangka . " gram perak";
        return $output;
    }
}

// fungsi untuk menghitung zakat domba
function zakat_domba($domba)
{
    $bagi = 100;
    if ($domba > 0 && $domba <= 39) {
        $belum_wajib = "Belum mencapai nishob/belum wajib zakat !";
        return $belum_wajib;
    } elseif ($domba == 0) {
        $kosong = "";
        return $kosong;
    } elseif ($domba >= 40 && $domba <= 120) {
        $jml_ternak = 1;
        return $jml_ternak;
    } elseif ($domba >= 121 && $domba <= 200) {
        $jml_ternak = 2;
        return $jml_ternak;
    } elseif ($domba >= 201 && $domba <= 300) {
        $jml_ternak = 3;
        return $jml_ternak;
    } elseif ($domba % $bagi == 0) $nilai = ($domba / $bagi);
    else $nilai = floor($domba / $bagi);
    return $nilai;
}

// fungsi untuk menghitung zakat sapi

$sapi = 120;
function zakat_sapi($sapi)
{
    $bagi = 30;
    if ($sapi > 0 && $sapi <= 29) {
        $belum_wajib = "Belum mencapai nishob/belum wajib zakat";
        return $belum_wajib;
    } elseif ($sapi == 0) {
        $kosong = "";
        return $kosong;
    } elseif ($sapi >= 30 && $sapi <= 39) {
        $jml_ternak = "1 tabi’ (sapi jantan berumur 1 tahun) atau tabi’ah (sapi betina berumur 1 tahun)";
        return $jml_ternak;
    } elseif ($sapi >= 40 && $sapi <= 59) {
        $jml_ternak = "1 musinnah (sapi betina berumur 2 tahun)";
        return $jml_ternak;
    } elseif ($sapi >= 60 && $sapi <= 69) {
        $jml_ternak = "2 tabi’";
        return $jml_ternak;
    } elseif ($sapi >= 70 && $sapi <= 79) {
        $jml_ternak = "1 musinnah dan 1 tabi’";
        return $jml_ternak;
    } elseif ($sapi >= 80 && $sapi <= 89) {
        $jml_ternak = "2 musinnah";
        return $jml_ternak;
    } elseif ($sapi >= 90 && $sapi <= 99) {
        $jml_ternak = "3 tabi'";
        return $jml_ternak;
    } elseif ($sapi >= 100 && $sapi <= 109) {
        $jml_ternak = "2 tabi’ dan 1musinnah";
        return $jml_ternak;
    } elseif ($sapi >= 110 && $sapi <= 119) {
        $jml_ternak = "2 musinnah dan 1 tabi’";
        return $jml_ternak;
    } elseif ($sapi % $bagi == 0) $nilai = ($sapi / $bagi);
    else $nilai = floor($sapi / $bagi) . "";
    return $nilai;
}

// fungsi untuk menghitung zakat rikaz
function zakat_rikaz($rikaz)
{
    if ($rikaz <= 0) {
        $output = "";
    } else {
        $hasil = $rikaz * 20 / 100;
        $output = "Jumlah zakat yang dikeluarkan sebesar" . rupiah($hasil);
        return $output;
    }
}

// fungsi menghitung zakat perdagangan

function zakat_perdagangan($dagangan)
{
    $nishob = nishob();
    if ($dagangan <= 0) {
        $output = "";
        return $output;
    } elseif ($dagangan < $nishob) {
        $hasil = "Belum mencapai nishob/belum wajib zakat !";
        return $hasil;
    } else {
        $hasil = $dagangan * 2.5 / 100;
        $output = "Zakat yang dikeluarkan sebesar " . rupiah($hasil);
        return $output;
    }
}



// fungsi untuk menghitung zakat profesi

function zakat_profesi($profesi)
{
    $penghasilan_pertahun = $profesi * 12;
    if ($penghasilan_pertahun >= nishob()) {
        $hasil = $profesi * 2.5 / 100;
        $output = "Jumlah zakat yang dikeluarkan sebesar " . rupiah($hasil);
        return $output;
    } elseif ($profesi <= 0) {
        $hasil = "";
        return $hasil;
    } elseif ($penghasilan_pertahun < nishob()) {
        $ngga_wajib = "Penghasilan anda Belum mencapai Nishob";
        return $ngga_wajib;
    }
}

/* fungsi untuk menghitung zakat pertanian
nishob zakat pertanian adalah 900 liter berdasarkan pendapat Prof. Dr. Muhammad Az-Zuhailiy
Sumber https://rumaysho.com/24448-tata-cara-bayar-zakat-fitrah-secara-lengkap-dan-mudah-dipahami.html 

*/
function zakat_pertanian_alamiah($hasil_panen)
{
    if ($hasil_panen < 900) {
        $hasil = "belum mencapai nishob";
        return $hasil;
    } elseif ($hasil_panen <= 0) {
        $out = "";
        return $out;
    } else {
        $kadar_zakat = "Jumlah zakat yang dikeluarkan sebanyak " . $hasil_panen * 10 / 100 . " liter";
        return $kadar_zakat;
    }
}
function zakat_pertanian_manual($hasil_panen)
{
    if ($hasil_panen < 900) {
        $hasil = "belum mencapai nishob";
        return $hasil;
    } elseif ($hasil_panen <= 0) {
        $out = "";
        return $out;
    } else {
        $kadar_zakat = "Jumlah zakat yang dikeluarkan sebanyak " . $hasil_panen * 5 / 100 . " liter";
        return $kadar_zakat;
    }
}

// fungsi untuk memformat angka menjadi format rupiah
function rupiah($angka)
{
    $cek = is_numeric($angka);
    if ($cek == true) {
        $hasil_rupiah = "Rp " . number_format($angka);
        return $hasil_rupiah;
    } else {
        $output = "";
        return $output;
    }
}
