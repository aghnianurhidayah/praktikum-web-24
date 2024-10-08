<?php
    require "koneksi.php";

    $id = $_GET['id'];

    $result = mysqli_query($conn, "SELECT * FROM mhs WHERE id = $id");
    
    $mahasiswa = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $mahasiswa[] = $row;
    }

    $mahasiswa = $mahasiswa[0];

    if (isset($_POST['ubah'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $kelas = $_POST['kelas'];
    $prodi = $_POST['prodi'];

    $sql = "UPDATE mhs SET nama='$nama', nim='$nim', kelas='$kelas', prodi='$prodi' WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "
        <script>
            alert('Data berhasil diubah!');
            document.location.href = 'CRUDAdmin.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data gagal diubah!');
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
      Ubah Data Mahasiswa
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
          <input type="text" name="nama" id="nama" value="<?php echo $mahasiswa['nama'] ?>" required>
        </div>
        <div class="input-field">
          <label class="label-field" for="nim">NIM</label>
          <input type="number" name="nim" id="nim" value="<?php echo $mahasiswa['nim'] ?>" required>
        </div>
        <div class="input-field">
          <label class="label-field" for="kelas">Kelas</label>
          <div class="form-check">
            <input type="radio" name="kelas" id="kelasA" value="A" <?php if ($mahasiswa['kelas'] == "A") echo "checked";?>/>
            <label for="kelasA">A</label></br>
            <input type="radio" name="kelas" id="kelasB" value="B" <?php if ($mahasiswa['kelas'] == "B") echo "checked";?>/>
            <label for="kelasB">B</label></br>
            <input type="radio" name="kelas" id="kelasC" value="C" <?php if ($mahasiswa['kelas'] == "C") echo "checked";?>/>
            <label for="kelasC">C</label>
          </div>
        </div>
        <div class="input-field">
          <label class="label-field" for="prodi">Program Studi</label>
          <select name="prodi" id="prodi" required>
            <option value="<?php echo $mahasiswa['prodi'] ?>" selected><?= $mahasiswa['prodi'] ?></option>
            <option value="Informatika">Informatika</option>
            <option value="Sistem Informasi">Sistem Informasi</option>
          </select>
        </div>
        <input class="button" type="submit" value="Ubah" name="ubah">
      </form>
    </div>

  </main>

  <script src="/scripts/script.js"></script>
</body>

</html>