<?php
usleep(500000);
require '../functionKry/function.php';

$keyword = $_GET["keyword"];
$query = "SELECT * FROM karyawan
            WHERE
            niq LIKE '%$keyword%' OR
            nama LIKE '%$keyword%' OR
            alamat LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            tlp LIKE '%$keyword%' OR
            posisi LIKE '%$keyword%'
";

$karyawan = query($query);

// var_dump($mahasiswa);

?>

<table class="table text-center">
    <tr>
        <th>No.</th>
        <th>Foto</th>
        <th>NIQ</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Email</th>
        <th>Telpon</th>
        <th>Posisi</th>
        <th>Ubah | Hapus</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach ($karyawan as $kry) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td> <img src="img/<?= $kry['gambar'] ?>" alt="gambar" width="100px"> </td>
            <td><?= $kry['niq'] ?></td>
            <td><a href="functionDosen/tampilDsn.php?id=<?= $kry["id"] ?>"><?= $kry["nama"] ?></a></td>
            <td><?= $kry['alamat'] ?></td>
            <td><?= $kry['email'] ?></td>
            <td><?= $kry['tlp'] ?></td>
            <td><?= $kry['posisi'] ?></td>
            <td>
                <a href="functionDosen/ubahDsn.php?id=<?= $kry["id"] ?>"><i class="bi bi-pencil-square"></i></a> |
                <a href="functionDosen/hapusDsn.php?id=<?= $kry["id"] ?>" onclick="return confirm('Yakin?');"><i class="bi bi-trash3"></i></a>
            </td>
        </tr>
        <?php $i++; ?>
    <?php endforeach; ?>
    <!-- jika data tidak ditemukan -->
    <?php if (empty($kry)) : ?>
        <tr>
            <td colspan="10" class="text-center">Not Found</td>
        </tr>
    <?php endif; ?>
</table>