<html>

<body>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kelompok</th>
                <th>Nama Mata Pelajaran</th>
            </tr>
        </thead>
        <tbody><?php $i = 1; ?>
            <?php foreach ($getDataPrint as $k) : ?>
            <tr>
                <td class='text-center'><?= $i++; ?></td>
                <td class='text-center'><?= $k['nama_kelompok']; ?></td>
                <td class='text-center'>

                    <?= $k['nama_mapel']; ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>