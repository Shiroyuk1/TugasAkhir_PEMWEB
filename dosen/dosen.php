<?php
usleep(500000);
require '../functionDosen/function.php';

$keyword = $_GET["keyword"];
$query = "SELECT * FROM dosen
                WHERE
                nama LIKE '%$keyword%' OR
                nid LIKE '%$keyword%' OR
                prodi LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                pendidikan LIKE '%$keyword%'
    ";

$dosen = query($query);

// var_dump($mahasiswa);

?>

<table class="table bg-info">
    <tr>
        <th>No.</th>
        <th>Foto</th>
        <th>NID</th>
        <th>Nama</th>
        <th>Prodi</th>
        <th>Email</th>
        <th>Pendidikan</th>
        <th>Ubah | Hapus</th>
    </tr>

    <?php $i = 1; ?>

    <?php foreach ($dosen as $dsn) : ?>
        <form action="tampil.php" method="post">
            <tr>
                <td><?= $i; ?></td>
                <td><img src="img/<?= $dsn["gambar"] ?>" alt="foto_dsn" width="70"></td>
                <td><?= $dsn["nid"] ?></td>
                <td><a href="tampilDsn.php?id=<?= $dsn["id"] ?>"><?= $dsn["nama"] ?></a></td>
                <td><?= $dsn["prodi"] ?></td>
                <td><?= $dsn["email"] ?></td>
                <td><?= $dsn["pendidikan"] ?></td>
                <td>
                    <a href="ubahDsn.php?id=<?= $dsn["id"] ?>">Ubah</a> |
                    <a href="hapusDsn.php?id=<?= $dsn["id"] ?>" onclick="return confirm('Yakin?');">Hapus</a>
                </td>
            </tr>
        </form>
        <?php $i++; ?>

    <?php endforeach; ?>

    <!-- jika data tidak ditemukan -->
    <?php if (empty($dsn)) : ?>
        <tr>
            <td colspan="10" class="text-center">Not Found</td>
        </tr>
    <?php endif; ?>

</table>