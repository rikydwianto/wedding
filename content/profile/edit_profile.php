<div class="container section-title">
    <h3 class="text-center text-header mt-3">Edit Profile</h3>
    <hr style="border: none; height: 5px; background-color: #AB7665; margin: 20px auto; width: 8%;">
</div>

<div class="container mt-5 mb-5">
    <div class="row text-center">
        <?php
        if (isset($_POST['simpan_edit'])) {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
            $nama = mysqli_real_escape_string($conn, $_POST['nama']);
            $no_hp = mysqli_real_escape_string($conn, $_POST['no_hp']);
            $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password_query = '';
            if (!empty($_POST['password'])) { // Jika password diisi, tambahkan ke query
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $password_query = ", password = '$password'";
            }

            $update_sql = "UPDATE users SET 
                username = '$username', 
                nama = '$nama', 
                no_hp = '$no_hp', 
                alamat = '$alamat', 
                email = '$email', 
                updated_at = NOW()
                $password_query 
                WHERE user_id = '$user_id'";

            if (mysqli_query($conn, $update_sql)) {
                pindah_halaman("index.php?menu=profile&act=edit_profile&success");
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }

        ?>
        <form method="POST">
            <?php
            // Tampilkan pesan sukses jika ada parameter `success` di URL
            if (isset($_GET['success'])): ?>
                <div class="alert alert-success" role="alert">
                    Data Profile berhasil dirubah. <br> Terima Kasih.
                </div>
            <?php endif; ?>

            <div class="row">
                <!-- Kolom Username -->
                <div class="col-md-6 mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control"
                        value="<?= htmlspecialchars($user['username']) ?>" required>
                </div>

                <!-- Kolom Nama -->
                <div class="col-md-6 mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control"
                        value="<?= htmlspecialchars($user['nama']) ?>" required>
                </div>
            </div>

            <div class="row">
                <!-- Kolom Email -->
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control"
                        value="<?= htmlspecialchars($user['email']) ?>" required>
                </div>

                <!-- Kolom Password -->
                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control"
                        placeholder="Masukkan password baru">
                </div>
            </div>

            <div class="row">
                <!-- Kolom No HP -->
                <div class="col-md-6 mb-3">
                    <label for="no_hp" class="form-label">Nomor HP</label>
                    <input type="text" name="no_hp" id="no_hp" class="form-control"
                        value="<?= htmlspecialchars($user['no_hp']) ?>">
                </div>
            </div>

            <!-- Kolom Alamat -->
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control"
                    rows="4"><?= htmlspecialchars($user['alamat']) ?></textarea>
            </div>

            <!-- Tombol Simpan -->
            <div class="text-end">
                <button type="submit" name="simpan_edit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>



    </div>
</div>