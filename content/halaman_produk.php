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
} else {
    pindah_halaman("index.php");
}

$produk = mysqli_fetch_assoc($q);

?>

<section id='mua' class="header-profile" style="background-color: #FFF3EF;padding: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-6 col-sm-12">
                <img src="assets/img/product/<?= $produk['product_photo'] ?>" class="mb-2"
                    style="width: 100%;align-items: center;float: right;" alt="<?= $produk['category_name'] ?>">
                <h5 class="text-header">
                    <?= $produk['name'] ?></h5>
                <p class="rating">Rating Vendor: ★★★★☆</p>
                <a href='index.php?menu=vendor&vendor=<?= enkrip($produk['vendor_id']) ?>' class="link">Kunjungi
                    Toko</a>
            </div>
            <div class="col-lg-10 col-md-6 col-sm-12">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-sm-12">
                        <h1 style="color: #AB7665; font-size: 30px;"><?= $produk['product_name'] ?> </h1>
                        <p class="rating">Rating Produk: ★★★★☆</p>
                        <p class="paragraph"><?= $produk['description'] ?></p>

                        <p class="mt-5">
                        <h4 class="text-header">Harga : <?= rupiah($produk['price']) ?> </h4>

                        </p>
                        <div class="mt-3">

                            <button class="tombol"><i class="fa fa-shopping-cart"></i> Masukan Keranjang</button>
                            <button class="tombol"><i class="fa fa-calendar"></i> Pesan Sekarang</button>
                        </div>
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