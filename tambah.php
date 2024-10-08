<?php
require "koneksi.php";

if (isset($_POST['tambah'])) {
  $nama = htmlspecialchars($_POST['nama']);
  $nim = htmlspecialchars($_POST['nim']);
  $kelas = htmlspecialchars($_POST['kelas']);
  $prodi = htmlspecialchars($_POST['prodi']);

  $sql = "INSERT INTO mhs VALUES ('', '$nama', '$nim', '$kelas', '$prodi', '')";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    echo "
          <script>
              alert('Berhasil menambah data mahasiswa!');
              document.location.href = 'CRUDAdmin.php';
          </script>";
  } else {
    echo "
          <script>
              alert('Gagal menambah data mahasiswa!');
              document.location.href = 'CRUDAdmin.php';
          </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tentang Kami | Pendataan Mahasiswa Unversitas Mulawarman</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="styles/base.css" />

  <link rel="stylesheet" href="styles/home.css" />

  <link rel="stylesheet" href="styles/admin.css">

  <link rel="stylesheet" href="styles/crud.css">
</head>

<body>

  <main class="data-mahasiswa-section">
    <h1 class="data-mahasiswa-title">
      Tambah Data Mahasiswa
    </h1>

    <div class="container">
      <a href="CRUDAdmin.php">
        <button class="back">
          <p>Back</p>
        </button>
      </a>
    </div>

    <div class="form-mhs">
      <form action="" method="post">
        <div class="input-field">
          <label class="label-field" for="nama">Nama Lengkap</label>
          <input type="text" name="nama" id="nama" required>
        </div>
        <div class="input-field">
          <label class="label-field" for="nim">NIM</label>
          <input type="number" name="nim" id="nim" required>
        </div>
        <div class="input-field">
          <label class="label-field" for="kelas">Kelas</label>
          <div class="form-check">
            <input type="radio" name="kelas" id="kelasA" value="A" required/>
            <label for="kelasA">A</label></br>
            <input type="radio" name="kelas" id="kelasB" value="B"/>
            <label for="kelasB">B</label></br>
            <input type="radio" name="kelas" id="kelasC" value="C"/>
            <label for="kelasC">C</label>
          </div>
        </div>
        <div class="input-field">
          <label class="label-field" for="prodi">Program Studi</label>
          <select name="prodi" id="prodi" required>
            <option name="prodi" value="Informatika">Informatika</option>
            <option name="prodi" value="Sistem Informasi">Sistem Informasi</option>
          </select>
        </div>
        <input class="button" type="submit" value="Tambah" name="tambah">
      </form>
    </div>

  </main>

  <script src="/scripts/script.js"></script>
</body>

</html>