<?php
    require "koneksi.php";

    $id = $_GET['id'];

    $query = mysqli_query($conn, "SELECT * FROM mhs WHERE id=$id");
    $mahasiswa = [];
    while ($mhs = mysqli_fetch_assoc($query)) {
        $mahasiswa[] = $mhs;
    }

    unlink('images/' . $mahasiswa[0]['foto']);

    $result = mysqli_query($conn, "DELETE FROM mhs WHERE id = $id");

    if ($result) {
        echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'CRUDAdmin.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'CRUDAdmin.php';
        </script>";
    }
?>