<?php
include('koneksi.php');

function tambahpasien($data)
{
    global $koneksi;
    $nama_pasien = htmlspecialchars($data['namapasien']);
    $tanggal_lahir = date('Y-m-d', strtotime($data['tanggallahir']));
    $umur = htmlspecialchars($data['umur']);
    $tinggi_badan = htmlspecialchars($data['tinggibadan']);
    $jenis_kelamin = htmlspecialchars($data['jeniskelamin']);
    $alamat = htmlspecialchars($data['alamat']);
    $keluhan_utama = htmlspecialchars($data['keluhanutama']);
    $riwayat_sebelumnya = htmlspecialchars($data['riwayatsebelumnya']);
    $riwayat_sekarang = htmlspecialchars($data['riwayatpenyakitsaatini']);
    $berat_badan = htmlspecialchars($data['beratbadan']);
    $nomor_telepon = htmlspecialchars($data['nomortelepon']);
    $rambut_kulit_kepala = htmlspecialchars($data['rambutkulitkepala']);
    $mata = htmlspecialchars($data['mata']);
    $hidung = htmlspecialchars($data['hidung']);
    $leher = htmlspecialchars($data['leher']);
    $jantung = htmlspecialchars($data['jantung']);
    $payudara_aksila = htmlspecialchars($data['payudara_aksila']);
    $genitilia_perkemihan = htmlspecialchars($data['genitalia_perkemihan']);
    $kaki = htmlspecialchars($data['kaki']);
    $pola_istirahat_tidur = htmlspecialchars($data['pola_istirahat_tidur']);
    $telinga = htmlspecialchars($data['telinga']);
    $mulut = htmlspecialchars($data['mulut']);
    $paru_paru = htmlspecialchars($data['paruparu']);
    $abdomen = htmlspecialchars($data['abdomen']);
    $tangan = htmlspecialchars($data['tangan']);
    $rektum_anus = htmlspecialchars($data['rektum_anus']);
    $punggung = htmlspecialchars($data['punggung']);
    $pola_aktivitas_harian = htmlspecialchars($data['polaaktivitasharian']);
    $hasil_pemeriksaan = htmlspecialchars($data['hasil_pemeriksaan']);
   
    $query = "INSERT INTO pasien (id_pasien, nama_pasien, tanggal_lahir, umur, tinggi_badan, jenis_kelamin, alamat, keluhan_utama, riwayat_sebelumnya, riwayat_sekarang, berat_badan, nomor_telepon, rambut_kulit_kepala, mata, hidung, leher, jantung, payudara_aksila, genitilia_perkemihan, kaki, pola_istirahat_tidur, telinga, mulut, paru_paru, abdomen, tangan, rektum_anus, punggung, pola_aktivitas_harian, hasil_pemeriksaan) Values ('','$nama_pasien', '$tanggal_lahir', '$umur', '$tinggi_badan', '$jenis_kelamin', '$alamat', '$keluhan_utama', '$riwayat_sebelumnya', '$riwayat_sekarang', '$berat_badan', '$nomor_telepon', '$rambut_kulit_kepala', '$mata', '$hidung', '$leher', '$jantung', '$payudara_aksila', '$genitilia_perkemihan', '$kaki', '$pola_istirahat_tidur', '$telinga', '$mulut', '$paru_paru', '$abdomen', '$tangan', '$rektum_anus', '$punggung', '$pola_aktivitas_harian', '$hasil_pemeriksaan')";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
};

function editpasien($data)
{
    global $koneksi;
    $id_pasien = $data['id_pasien'];
    $nama_pasien = htmlspecialchars($data['namapasien']);
    $tanggal_lahir = date('Y-m-d', strtotime($data['tanggallahir']));
    $umur = htmlspecialchars($data['umur']);
    $tinggi_badan = htmlspecialchars($data['tinggibadan']);
    $jenis_kelamin = htmlspecialchars($data['jeniskelamin']);
    $alamat = htmlspecialchars($data['alamat']);
    $keluhan_utama = htmlspecialchars($data['keluhanutama']);
    $riwayat_sebelumnya = htmlspecialchars($data['riwayatsebelumnya']);
    $riwayat_sekarang = htmlspecialchars($data['riwayatpenyakitsaatini']);
    $berat_badan = htmlspecialchars($data['beratbadan']);
    $nomor_telepon = htmlspecialchars($data['nomortelepon']);
    $rambut_kulit_kepala = htmlspecialchars($data['rambutkulitkepala']);
    $mata = htmlspecialchars($data['mata']);
    $hidung = htmlspecialchars($data['hidung']);
    $leher = htmlspecialchars($data['leher']);
    $jantung = htmlspecialchars($data['jantung']);
    $payudara_aksila = htmlspecialchars($data['payudara_aksila']);
    $genitilia_perkemihan = htmlspecialchars($data['genitalia_perkemihan']);
    $kaki = htmlspecialchars($data['kaki']);
    $pola_istirahat_tidur = htmlspecialchars($data['pola_istirahat_tidur']);
    $telinga = htmlspecialchars($data['telinga']);
    $mulut = htmlspecialchars($data['mulut']);
    $paru_paru = htmlspecialchars($data['paruparu']);
    $abdomen = htmlspecialchars($data['abdomen']);
    $tangan = htmlspecialchars($data['tangan']);
    $rektum_anus = htmlspecialchars($data['rektum_anus']);
    $punggung = htmlspecialchars($data['punggung']);
    $pola_aktivitas_harian = htmlspecialchars($data['polaaktivitasharian']);
    $hasil_pemeriksaan = htmlspecialchars($data['hasil_pemeriksaan']);
    $query = "UPDATE pasien set nama_pasien = '$nama_pasien', tanggal_lahir = '$tanggal_lahir', umur = '$umur', tinggi_badan = '$tinggi_badan', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', keluhan_utama = '$keluhan_utama', riwayat_sebelumnya = '$riwayat_sebelumnya', riwayat_sekarang = '$riwayat_sekarang', berat_badan = '$berat_badan', nomor_telepon = '$nomor_telepon', rambut_kulit_kepala = '$rambut_kulit_kepala', mata = '$mata', hidung = '$hidung', leher = '$leher', jantung = '$jantung', payudara_aksila = '$payudara_aksila', genitilia_perkemihan = '$genitilia_perkemihan', kaki = '$kaki', pola_istirahat_tidur = '$pola_istirahat_tidur', telinga = '$telinga', mulut ='$mulut', paru_paru ='$paru_paru', abdomen ='$abdomen', tangan = '$tangan', rektum_anus = '$rektum_anus', punggung = '$punggung', pola_aktivitas_harian = '$pola_aktivitas_harian', hasil_pemeriksaan = '$hasil_pemeriksaan' where id_pasien = '$id_pasien'";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
};

function tambahrawatjalan($data){
    global $koneksi;
    $tahun_masuk = date('Y', strtotime($data['tahunmasuk']));
    $id_pasien = $data['id_pasien'];
    $id_petugas = $data['id_petugas'];
    $keluhan_pasien = htmlspecialchars($data['keluhanpasien']);
    $id_obat = $data['idobat'];
    $query = "INSERT INTO rawat_jalan (id, tahun_masuk,id_pasien, id_petugas, keluhan_pasien, id_obat ) Values ('', '$tahun_masuk', '$id_pasien', '$id_petugas', '$keluhan_pasien', '$id_obat')";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
function editrawatjalan($data){
    global $koneksi;
    $id = $data['id'];
    $tahun_masuk = date('Y', strtotime($data['tahunmasuk']));
    $id_pasien = $data['id_pasien'];
    $id_petugas = $data['id_petugas'];
    $keluhan_pasien = htmlspecialchars($data['keluhanpasien']);
    $id_obat = $data['idobat'];
    $query = "UPDATE rawat_jalan set tahun_masuk = '$tahun_masuk',id_pasien = '$id_pasien', id_petugas = '$id_petugas', keluhan_pasien= '$keluhan_pasien', id_obat = '$id_obat' where id = '$id'";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
function tambahrawatinap($data){
    global $koneksi;
    $id_pasien = $data['id_pasien'];
    $id_petugas = $data['id_petugas'];
    $kelas = htmlspecialchars($data['kelas']);
    $tanggal_masuk = date('Y-m-d', strtotime($data['tanggalmasuk']));
    
    $query = "INSERT INTO rawat_inap (id,id_pasien, id_petugas, kelas, tanggal_masuk ) Values ('', '$id_pasien', '$id_petugas', '$kelas', '$tanggal_masuk')";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
function editrawatinap($data){
    global $koneksi;
    $id = $data['id'];
    $id_pasien = $data['id_pasien'];
    $id_petugas = $data['id_petugas'];
    $kelas = htmlspecialchars($data['kelas']);
    $tanggal_masuk = date('Y-m-d', strtotime($data['tanggalmasuk']));
    $tanggal_keluar = date('Y-m-d', strtotime($data['tanggalkeluar']));
    
    $query = "UPDATE rawat_inap set id_pasien = '$id_pasien', id_petugas = '$id_petugas', kelas = '$kelas', tanggal_masuk = '$tanggal_masuk', tanggal_keluar ='$tanggal_keluar' where id = '$id'";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
function tambahpetugas($data){
    global $koneksi;
    $nama = $data['namapetugas'];
    $jabatan = htmlspecialchars($data['jabatan']);
    $alamat = htmlspecialchars($data['alamat']);
    $nomor_telepon = htmlspecialchars($data['nomortelepon']);
    $jenis_kelamin = htmlspecialchars($data['jeniskelamin']);
    $tanggal_lahir = date('Y-m-d', strtotime($data['tanggallahir']));
    $password = htmlspecialchars($data['password']);
	$password1 = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO petugas (id_petugas, nama, tanggal_lahir, jenis_kelamin, alamat, nomor_telepon, jabatan, password ) Values ('', '$nama', '$tanggal_lahir', '$jenis_kelamin', '$alamat', '$nomor_telepon', '$jabatan', '$password1')";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
function editpetugas($data){
    global $koneksi;
    $id_petugas = $data['idpetugas'];
    $nama = $data['namapetugas'];
    $jabatan = htmlspecialchars($data['jabatan']);
    $alamat = htmlspecialchars($data['alamat']);
    $nomor_telepon = htmlspecialchars($data['nomortelepon']);
    $jenis_kelamin = htmlspecialchars($data['jeniskelamin']);
    $tanggal_lahir = date('Y-m-d', strtotime($data['tanggallahir']));
    $query = "UPDATE petugas set nama = '$nama', tanggal_lahir = '$tanggal_lahir', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', nomor_telepon ='$nomor_telepon', jabatan = '$jabatan' where id_petugas = '$id_petugas'";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
function tambahobat($data){
    global $koneksi;
    $kode_obat = htmlspecialchars($data['kodeobat']);
    $nama_obat = htmlspecialchars($data['namaobat']);
    $jenis_obat = htmlspecialchars($data['jenisobat']);
    $query = "INSERT INTO obat (id_obat, kode_obat,nama_obat, jenis_obat ) Values ('', '$kode_obat','$nama_obat', '$jenis_obat')";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
function editobat($data){
    global $koneksi;
    $id_obat = htmlspecialchars($data['idobat']);
    $kode_obat = htmlspecialchars($data['kodeobat']);
    $nama_obat = htmlspecialchars($data['namaobat']);
    $jenis_obat = htmlspecialchars($data['jenisobat']);
    $query = "UPDATE obat set kode_obat= '$kode_obat',nama_obat = '$nama_obat', jenis_obat = '$jenis_obat' where id_obat = '$id_obat'";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}