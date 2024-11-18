<?php

$id = dekrip(mysqli_escape_string($conn, $_GET['produkid']));
$q = mysqli_query($conn, "SELECT
                            p.product_id,
                            p.vendor_id,
                            p.product_name,
                            p.product_photo,
                            p.description,
                            p.categori,
                            p.price,
                            p.stock,
                            p.total_viewer,
                            p.created_at,
                            p.updated_at,
                            p.rating,
                            v.`name`,
                            v.description as dev_vendor,
                            v.contact_number,
                            v.photo,
                            v.email,
                            v.website,
                            v.`password`,
                            v.url_lokasi,
                            v.latitude,
                            v.logitude,
                            v.rating as rating_vendor 
                        FROM
                            products AS p
                            INNER JOIN vendors AS v ON p.vendor_id = v.vendor_id
                        WHERE p.product_id='$id'
                            ");
if (isset($_GET['produkid'])) {
    // Query untuk update total_viewer, menambah 1
    $sql_update = "UPDATE products SET total_viewer = total_viewer + 1 WHERE product_id = $id";

    // Eksekusi query
    if (mysqli_query($conn, $sql_update)) {
        // echo "Viewer berhasil diperbarui!";
    } else {
        // echo "Gagal memperbarui viewer: " . mysqli_error($conn);
    }
} else {
    pindah_halaman("index.php");
}

$produk = mysqli_fetch_assoc($q);
$rating = (int) $produk['rating']; // Misalnya rating yang dikirim melalui form

// Validasi rating untuk memastikan tidak lebih dari 5
if ($rating > 5) {
    $rating = 5; // Set ke 5 jika lebih dari 5
} elseif ($rating < 1) {
    $rating = 1; // Set ke 1 jika rating kurang dari 1
}
$ratin_vendor = (int) $produk['rating_vendor']; // Misalnya ratin_vendor yang dikirim melalui form

// Validasi ratin_vendor untuk memastikan tidak lebih dari 5
if ($ratin_vendor > 5) {
    $ratin_vendor = 5; // Set ke 5 jika lebih dari 5
} elseif ($ratin_vendor < 1) {
    $ratin_vendor = 1; // Set ke 1 jika rating kurang dari 1
}



?>

<section id='mua' class="header-profile" style="background-color: #FFF3EF;padding: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-6 col-sm-12">
                <img src="assets/img/product/<?= $produk['product_photo'] ?>" class="mb-2"
                    style="width: 100%;align-items: center;float: right;" alt="<?= $produk['category_name'] ?>">
                <h5 class="text-header">
                    <?= $produk['name'] ?></h5>
                <p class="rating">Rating Vendor: <?php
                                                    $max_rating = 5;
                                                    for ($i = 1; $i <= $max_rating; $i++) {
                                                        if ($i <= $ratin_vendor) {
                                                            echo "★"; // Tampilkan bintang penuh jika rating >= i
                                                        } else {
                                                            echo "☆"; // Tampilkan bintang kosong jika rating < i
                                                        }
                                                    }
                                                    ?></p>
                <a href='index.php?menu=vendor&vendor=<?= enkrip($produk['vendor_id']) ?>' class="link">Kunjungi
                    Toko</a>
            </div>
            <div class="col-lg-10 col-md-6 col-sm-12">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-sm-12">
                        <h1 style="color: #AB7665; font-size: 30px;"><?= $produk['product_name'] ?> </h1>
                        <p class="rating">Rating Produk: <?php
                                                            $max_rating = 5;
                                                            for ($i = 1; $i <= $max_rating; $i++) {
                                                                if ($i <= $rating) {
                                                                    echo "★"; // Tampilkan bintang penuh jika rating >= i
                                                                } else {
                                                                    echo "☆"; // Tampilkan bintang kosong jika rating < i
                                                                }
                                                            }
                                                            ?>
                        </p>
                        <p class="paragraph"><?= $produk['description'] ?></p>

                        <p class="mt-5">
                        <h4 class="text-header">Harga : <?= rupiah($produk['price']) ?> </h4>

                        </p>
                        <div class="mt-3">

                            <form action="" method="post">


                                <button class="tombol" type="submit" name="tambah"><i class="fa fa-shopping-cart"></i>
                                    Masukan Keranjang</button>
                                <button class="tombol"><i class="fa fa-calendar"></i> Pesan Sekarang</button>
                            </form>

                        </div>
                        <?php

                        if (isset($_POST['tambah'])) {
                            $produk_id = dekrip(mysqli_escape_string($conn, $_GET['produkid']));
                            $q = mysqli_query($conn, "SELECT
                                                        p.product_id, p.vendor_id, p.product_name, p.product_photo, p.description, p.categori, p.price, p.stock, p.total_viewer, p.created_at, p.updated_at, p.rating, v.`name`, v.description as dev_vendor, v.contact_number, v.photo, v.email, v.website, v.`password`, v.url_lokasi, v.latitude, v.logitude, v.rating as rating_vendor  FROM
                                                        products AS p
                                                        INNER JOIN vendors AS v ON p.vendor_id = v.vendor_id
                                                    WHERE p.product_id='$id'
                                                        ");
                            $produk = mysqli_fetch_assoc($q);

                            $jumlah = 1;
                            $harga = $produk['price'];
                            $subtotal = $jumlah * $harga;
                            $cek_keranjang = mysqli_query($conn, "SELECT * 
                                                                    FROM
                                                                        keranjang
                                                                        where user_id='$kode' or session_id='$kode'");
                            if (mysqli_num_rows($cek_keranjang) > 0) {
                                $cek_keranjang = mysqli_fetch_assoc($cek_keranjang);
                                $keranjang_id = $cek_keranjang['id'];
                            } else {
                                $sql_insert = "INSERT INTO keranjang (user_id, session_id) VALUES ('$kode', '$kode')";
                                if (mysqli_query($conn, $sql_insert)) {
                                    // echo "Keranjang baru ditambahkan";
                                    $keranjang_id = mysqli_insert_id($conn);
                                } else {
                                    echo "Gagal menambahkan keranjang: " . mysqli_error($conn);
                                }
                            }

                            $sql_item = "SELECT id, jumlah FROM item_keranjang WHERE keranjang_id = '$keranjang_id' AND produk_id = '$produk_id'";
                            $result_item = mysqli_query($conn, $sql_item);

                            if (mysqli_num_rows($result_item) > 0) {
                                // Jika item sudah ada, lakukan update
                                $row_item = mysqli_fetch_assoc($result_item);
                                $jumlah_baru = $row_item['jumlah'] + $jumlah; // Tambahkan jumlah baru
                                $subtotal_baru = $jumlah_baru * $harga; // Hitung subtotal baru

                                // Update item di keranjang
                                $sql_update = "UPDATE item_keranjang 
                                               SET jumlah = '$jumlah_baru', subtotal = '$subtotal_baru', date_edited = NOW() 
                                               WHERE id = '{$row_item['id']}'";
                                if (mysqli_query($conn, $sql_update)) {
                                    echo "Produk sudah ditambahkan ke keranjang.";
                                    pindah_halaman("");
                                } else {
                                    // echo "Gagal memperbarui item keranjang: " . mysqli_error($conn);
                                }
                            } else {
                                // Jika item belum ada, lakukan insert
                                $sql_insert = "INSERT INTO item_keranjang (keranjang_id, produk_id, jumlah, harga, subtotal) 
                                               VALUES ('$keranjang_id', '$produk_id', '$jumlah', '$harga', '$subtotal')";
                                if (mysqli_query($conn, $sql_insert)) {
                                    echo "Produk sudah ditambahkan ke keranjang.";
                                    pindah_halaman("");
                                } else {
                                    echo "Gagal menambahkan item ke keranjang: " . mysqli_error($conn);
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container section-title">
    <h2 class="text-center text-header mt-3">Ulasan Produk <?= $produk['product_name'] ?></h2>
    <hr style="border: none; height: 5px; background-color: #AB7665; margin: 20px auto; width: 8%;">
</div>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Jane Smith</h5>
            <p class="card-text">Makeupnya tahan lama dan sangat ringan di kulit. Sangat puas dengan hasilnya!</p>
            <div class="rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Sarah Lee</h5>
            <p class="card-text">Layanan sangat profesional! Hasil makeup sesuai ekspektasi, benar-benar memukau.</p>
            <div class="rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Mike Anderson</h5>
            <p class="card-text">Hasilnya luar biasa! Makeup natural tapi tetap terlihat elegan dan menonjol.</p>
            <div class="rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Linda Brown</h5>
            <p class="card-text">Sangat senang dengan hasil makeup! Riasannya membuatku percaya diri di acara penting.
            </p>
            <div class="rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">David Miller</h5>
            <p class="card-text">Pengalaman luar biasa! Makeup sesuai permintaan, dan hasilnya sempurna sepanjang hari.
            </p>
            <div class="rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
            </div>
        </div>
    </div>

</div>