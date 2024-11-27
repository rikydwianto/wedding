<?php
// Cek parameter act dari URL
$act = isset($_GET['act']) ? $_GET['act'] : '';

// Menangani aksi tambah produk
if ($act == 'tambah') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Ambil data dari form
        $product_name = $_POST['product_name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $vendor_id = $_POST['vendor_id'];
        $category_name = $_POST['category_name']; // Menggunakan category_name langsung
        $product_photo = ''; // Default jika tidak ada foto

        // Handle upload foto
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
            $photo_name = $_FILES['photo']['name'];
            $photo_tmp = $_FILES['photo']['tmp_name'];
            $photo_size = $_FILES['photo']['size'];

            $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
            $ext = strtolower(pathinfo($photo_name, PATHINFO_EXTENSION));
            if (in_array($ext, $allowed_extensions) && $photo_size < 2 * 1024 * 1024) {
                $photo_new_name = time() . '_' . $photo_name;
                $photo_path = '../assets/img/product/' . $photo_new_name;
                move_uploaded_file($photo_tmp, $photo_path);
                $product_photo = $photo_new_name;
            } else {
                echo "Format gambar tidak valid atau ukuran terlalu besar.";
                exit;
            }
        }

        // Query untuk menambah produk
        $query = "INSERT INTO products (product_name, description, price, stock, vendor_id, categori, product_photo) 
                  VALUES ('$product_name', '$description', '$price', '$stock', '$vendor_id', '$category_name', '$product_photo')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            pindah_halaman('index.php?menu=produk');
        } else {
            echo "Error adding product." . mysqli_error($conn);
        }
    }

    // Ambil daftar vendor dan kategori
    $vendors_query = "SELECT * FROM vendors";
    $vendors_result = mysqli_query($conn, $vendors_query);

    $categories_query = "SELECT * FROM categories";
    $categories_result = mysqli_query($conn, $categories_query);

    // Form tambah produk
?>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title">Tambah Produk</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="index.php?menu=produk&act=tambah" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="product_name">Nama Produk</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi Produk</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Harga Produk</label>
                        <input type="number" class="form-control" id="price" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stok Produk</label>
                        <input type="number" class="form-control" value="0" readonly id="stock" name="stock" required>
                    </div>
                    <div class="form-group">
                        <label for="vendor_id">Vendor</label>
                        <select class="form-control" id="vendor_id" name="vendor_id" required>
                            <?php while ($vendor = mysqli_fetch_assoc($vendors_result)) { ?>
                                <option value="<?php echo $vendor['vendor_id']; ?>"><?php echo $vendor['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category_name">Kategori</label>
                        <select class="form-control" id="category_name" name="category_name" required>
                            <?php while ($category = mysqli_fetch_assoc($categories_result)) { ?>
                                <option value="<?php echo $category['category_name']; ?>">
                                    <?php echo $category['category_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="photo">Foto Produk</label>
                        klik disini untuk memilih photo
                        <input type="file" class="form-control-file" id="photo" name="photo">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="index.php?menu=produk" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
<?php
}

// Menangani aksi edit produk
elseif ($act == 'edit') {
    $product_id = isset($_GET['id']) ? $_GET['id'] : 0;
    $query = "SELECT * FROM products WHERE product_id = $product_id";
    $product_result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($product_result);

    // Ambil daftar vendor dan kategori
    $vendors_query = "SELECT * FROM vendors";
    $vendors_result = mysqli_query($conn, $vendors_query);

    $categories_query = "SELECT * FROM categories";
    $categories_result = mysqli_query($conn, $categories_query);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Ambil data dari form
        $product_name = $_POST['product_name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $vendor_id = $_POST['vendor_id'];
        $category_name = $_POST['category_name']; // Menggunakan category_name langsung
        $product_photo = $product['product_photo']; // Foto tetap sama jika tidak diubah
        $banner_display = $_POST['banner_display'];
        if ($banner_display == 'ya') {
            mysqli_query($conn, "UPDATE products set banner=null");
        }

        // Handle upload foto baru
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
            $photo_name = $_FILES['photo']['name'];
            $photo_tmp = $_FILES['photo']['tmp_name'];
            $photo_size = $_FILES['photo']['size'];

            $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
            $ext = strtolower(pathinfo($photo_name, PATHINFO_EXTENSION));
            if (in_array($ext, $allowed_extensions) && $photo_size < 2 * 1024 * 1024) {
                $photo_new_name = time() . '_' . $photo_name;
                $photo_path = '../assets/img/product/' . $photo_new_name;
                move_uploaded_file($photo_tmp, $photo_path);
                $product_photo = $photo_new_name;
            } else {
                echo "Format gambar tidak valid atau ukuran terlalu besar.";
                exit;
            }
        }

        // Query untuk update produk
        $update_query = "UPDATE products SET product_name='$product_name', description='$description',banner = '$banner_display', price='$price', stock='$stock', vendor_id='$vendor_id', categori='$category_name', product_photo='$product_photo' WHERE product_id = $product_id";
        $update_result = mysqli_query($conn, $update_query);

        if ($update_result) {
            pindah_halaman('index.php?menu=produk');
        } else {
            echo "Error updating product.";
        }
    }
?>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title">Edit Produk</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="index.php?menu=produk&act=edit&id=<?php echo $product['product_id']; ?>"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="product_name">Nama Produk</label>
                        <input type="text" class="form-control" id="product_name" name="product_name"
                            value="<?php echo $product['product_name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi Produk</label>
                        <textarea class="form-control" id="description" name="description"
                            required><?php echo $product['description']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Harga Produk</label>
                        <input type="number" class="form-control" id="price" name="price"
                            value="<?php echo $product['price']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stok Produk</label>
                        <input type="number" class="form-control" id="stock" value="0" readonly name="stock"
                            value="<?php echo $product['stock']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="vendor_id">Vendor</label>
                        <select class="form-control" id="vendor_id" name="vendor_id" required>
                            <?php while ($vendor = mysqli_fetch_assoc($vendors_result)) { ?>
                                <option value="<?php echo $vendor['vendor_id']; ?>"
                                    <?php echo ($vendor['vendor_id'] == $product['vendor_id']) ? 'selected' : ''; ?>>
                                    <?php echo $vendor['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category_name">Kategori</label>
                        <select class="form-control" id="category_name" name="category_name" required>
                            <?php while ($category = mysqli_fetch_assoc($categories_result)) { ?>
                                <option value="<?php echo $category['category_name']; ?>"
                                    <?php echo ($category['category_name'] == $product['categori']) ? 'selected' : ''; ?>>
                                    <?php echo $category['category_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="photo">Foto Produk</label>
                        <input type="file" class="form-control-file" id="photo" name="photo"> klik disini untuk mengganti
                        photo
                        <?php if ($product['product_photo']) { ?>
                            <img src="../assets/img/product/<?php echo $product['product_photo']; ?>" alt="Foto Produk"
                                width="100">
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="banner_display">Tampil di Banner</label>
                        <select class="form-control" id="banner_display" name="banner_display" required>
                            <option value="ya" <?php echo ($product['banner'] == 'ya') ? 'selected' : ''; ?>>Ya
                            </option>
                            <option value="" <?php echo ($product['banner'] == '') ? 'selected' : ''; ?>>Tidak
                            </option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="index.php?menu=produk" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
<?php
} elseif ($act == 'hapus') {
    $product_id = isset($_GET['id']) ? $_GET['id'] : 0;
    $query = "DELETE FROM products WHERE product_id = $product_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        pindah_halaman('index.php?menu=produk');
    } else {
        echo "Error deleting product.";
    }
} else {
    // Query untuk menampilkan produk dengan join tabel vendors dan categories
    $query = "SELECT
                    p.*,
                    v.*,
                    p.description AS des_produk 
                FROM
                    products AS p
                    JOIN vendors AS v ON p.vendor_id = v.vendor_id 
                ORDER BY
                    p.product_name ASC";

    $result = mysqli_query($conn, $query);

?>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title">Daftar Produk</h4>
            </div>
            <div class="card-body">
                <a href="index.php?menu=produk&act=tambah" class="btn btn-success mb-3"> <i class="fa fa-plus"></i> Tambah
                    Produk</a>
                <small>Baris berwana hijau adalah produk yg tampil pada banner promo mingguan</small>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Vendor</th>
                            <th>Kategori</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($product = mysqli_fetch_assoc($result)) {
                            if ($product['banner'] == 'ya')
                                $add = 'bg-success';
                            else $add = '';
                        ?>
                            <tr class="<?= $add ?>">
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $product['product_name']; ?></td>
                                <td><?php echo $product['des_produk']; ?></td>
                                <td><?php echo rupiah($product['price']); ?></td>
                                <td><?php echo $product['name']; ?></td>
                                <td><?php echo $product['categori']; ?></td>
                                <td>
                                    <?php if ($product['product_photo']) { ?>
                                        <img src="../assets/img/product/<?php echo $product['product_photo']; ?>" alt="Foto Produk"
                                            width="100">
                                    <?php } else { ?>
                                        <img src="../assets/img/no-image.png" alt="No Image" width="100">
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="index.php?menu=produk&act=edit&id=<?php echo $product['product_id']; ?>"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <a href="index.php?menu=produk&act=hapus&id=<?php echo $product['product_id']; ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php
}
?>