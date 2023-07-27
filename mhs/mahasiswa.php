<?php
usleep(500000);
require '../functionMhs/function.php';

$keyword = $_GET["keyword"];
// $query = "SELECT * FROM mahasiswa
//             WHERE
//             -- nama = '$keyword'
//             -- nama LIKE '$keyword%'
//             nama LIKE '%$keyword%' OR
//             nrp LIKE '%$keyword%' OR
//             email LIKE '%$keyword%' OR
//             jurusan LIKE '%$keyword%'
// ";
// $mahasiswa = query($query);

$query = "SELECT * FROM mahasiswa
                WHERE
                nama LIKE '%$keyword%' OR
                NIM LIKE '%$keyword%' OR
                hobby LIKE '%$keyword%' OR
                jk LIKE '%$keyword%' OR
                noTlp LIKE '%$keyword%' OR
                fakultas LIKE '%$keyword%' OR
                prodi LIKE '%$keyword%'
    ";

$mahasiswa = query($query);

// var_dump($mahasiswa);

?>

<table class="table table-light table-hover">
    <tr>
        <th>No.</th>
        <th>Foto</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Prodi</th>
        <th>Fakultas</th>
        <th>Hobby</th>
        <th>No. Telpon</th>
        <th>Jenis kelamin</th>
        <th>Ubah | Hapus</th>
    </tr>

    <?php $i = 1; ?>

    <?php foreach ($mahasiswa as $mhs) : ?>
        <form action="tampil.php" method="post">
            <tr>
                <td><?= $i; ?></td>
                <td><img src="../img/<?= $mhs["gambar"] ?>" alt="foto_mhs" width="70"></td>
                <td><?= $mhs["NIM"] ?></td>
                <td><a href="tampil.php?id=<?= $mhs["id"] ?>"><?= $mhs["nama"] ?></a></td>
                <td><?= $mhs["prodi"] ?></td>
                <td><?= $mhs["fakultas"] ?></td>
                <td><?= $mhs["hobby"] ?></td>
                <td><?= $mhs["noTlp"] ?></td>
                <td><?= $mhs["jk"] ?></td>
                <td>
                    <a href="ubah.php?id=<?= $mhs["id"] ?>">Ubah</a> |
                    <a href="hapus.php?id=<?= $mhs["id"] ?>" onclick="return confirm('Yakin?');">Hapus</a>
                </td>
            </tr>
        </form>
        <?php $i++; ?>

    <?php endforeach; ?>

    <!-- jika data tidak ditemukan -->
    <?php if (empty($mhs)) : ?>
        <tr>
            <td colspan="10" class="text-center">Not Found</td>
        </tr>
    <?php endif; ?>

</table>