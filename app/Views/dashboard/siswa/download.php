<!DOCTYPE html>
<html>

<head>
    <title>Format Excel Siswa</title>
</head>

<body>


    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Format Excel Siswa.xls");

    ?>

    <table border="1" style="text-align: center;">
        <tr>
            <th>NIS</th>
            <th>NISN</th>
            <th>NIK</th>
            <th>Nama Lengkap</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Status Dalam Keluarga</th>
            <th>Anak Ke</th>
            <th>Alamat Siswa</th>
            <th>Nomor Handphone Siswa</th>
            <th>Sekolah Asal</th>
            <th>Kelas Diterima</th>
            <th>Tanggal Diterima</th>
            <th>Nama Ayah</th>
            <th>Nama Ibu</th>
            <th>Alamat Orang Tua</th>
            <th>Nomor Telepon Orang Tua</th>
            <th>Pekerjaan Ayah</th>
            <th>Pekerjaan Ibu</th>
            <th>Nama Wali</th>
            <th>Alamat Wali</th>
            <th>Nomor Telepon Wali</th>
            <th>Pekerjaan Wali</th>
        </tr>
        <tr style="text-align: center;">
            <td>123456789</td>
            <td>987654321</td>
            <td>123456789</td>
            <td>Fulan</td>
            <td>Cirebon</td>
            <td>2021-08-19</td>
            <td>L</td>
            <td>Islam</td>
            <td>Kandung</td>
            <td>1</td>
            <td>jl.Palhawan No 31</td>
            <td>086754324567</td>
            <td>SMP AL - IRSYAD AL - ISLAMIYYAH</td>
            <td>10 RPL</td>
            <td>2021-09-11</td>
            <td>Budi</td>
            <td>Ani</td>
            <td>jl.Pahlawan No 31</td>
            <td>085567876545</td>
            <td>Nguli</td>
            <td>Nguci</td>
            <td>Budi</td>
            <td>jl.Palhawan No 31</td>
            <td>07886775776</td>
            <td>Nguli</td>
        </tr>
    </table>
</body>

</html>