<section id='mua' class="header-profile">
    <div style="background-color: #FFF3EF;">
        <div class="px-4 py-5 text-center">
            <div class="container">
                <div class="row align-items-start justify-content-center">
                    <!-- Gambar Bulat di Kiri -->
                    <div class="col-md-3 text-center text-md-start mb-4 mb-md-0">
                        <img class="rounded-circle" src="assets/img/profilebulat.png" alt="Profile Picture" width="200"
                            height="200">
                    </div>

                    <!-- Teks di Kanan -->
                    <div class="col-md-6 ps-4">
                        <div class="text-start">
                            <h4 class="fw-bold mb-4" style="color: #AB7665; font-size: 24px;">Apa itu Makeup Artist
                                (MUA)?</h4>
                            <p class="lead mb-4 mt-2" style="text-align: justify; color: #AB7665; font-size: 16px;">
                                Makeup Artist (MUA) adalah seorang profesional yang ahli dalam mengaplikasikan
                                kosmetik
                                dan produk kecantikan untuk meningkatkan penampilan seseorang. Mereka sering bekerja
                                di
                                berbagai acara seperti pernikahan, pemotretan, acara televisi, dan film, serta dapat
                                menciptakan berbagai gaya mulai dari tampilan natural hingga glamor.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="kategori" class="team section">
    <!-- Section Title -->
    <div class="container section-title">
        <h2 class="text-center text-header mt-3">Makeup by Categories</h2>
        <hr style="border: none; height: 5px; background-color: #AB7665; margin: 20px auto; width: 8%;">
    </div><!-- End Section Title -->

    <div class="container">
        <div class="row" style="display: flex; flex-wrap: wrap; gap: 0px;">
            <?php
            $q_kategori = mysqli_query($conn, "SELECT
                                                        category_id, 
                                                        category_name, 
                                                        category_photo, 
                                                        created_at, 
                                                        updated_at
                                                    FROM
                                                        categories limit 6");
            while ($kat = mysqli_fetch_assoc($q_kategori)) {
            ?>
            <div class="col-lg-2 col-md-4 col-sm-6 d-flex">
                <div class="team-member text-center w-100">
                    <a href="index.php?menu=kategori&kategori=<?= $kat['category_name'] ?>" class="link">
                        <img src="assets/img/kategori/<?= $kat['category_photo'] ?>" class="img-fluid"
                            style="height: 150px; width: 100%; object-fit: cover; border-radius: 3px;"
                            alt="<?= $kat['category_name'] ?>">
                        <div class="member-info">
                            <p href="#"><?= $kat['category_name'] ?></p>
                        </div>
                    </a>
                </div>
            </div>
            <?php
            }
            ?>
            <!-- Using Flexbox with gap -->


        </div>
    </div>
</section>

<section id='deal' class="cta-section mt-3 mb-3 p-3" style="background-color: #FFEDF5;">
    <div class="container mt-3 mb-3">
        <div class="row align-items-center">
            <!-- Text on the Left -->
            <div class="col-md-6 text-end">
                <!-- Align text to the end (right) -->
                <h2 class="cta-title"
                    style="color: #C94F84; font-weight: 400; font-family: 'Italianno', cursive; font-size: 6rem;">
                    Week Deal!
                </h2>
                <a href="#" style="color: #C94F84;" class="link fs-5 ">Booking Now <i
                        class="fa fa-2xl fa-calendar-o "></i></a>
            </div>

            <!-- Circular Photo on the Right -->
            <div class="col-md-6 text-center">
                <img src="assets/img/cta.png" alt="Makeup" class="rounded-circle" width="300" height="200">
            </div>
        </div>
    </div>
</section>

<section id="rekomendasi" class="team section mb-5">
    <!-- Section Title -->
    <div class="container section-title">
        <h2 class="text-center text-header mt-3">Rekomendasi</h2>
        <hr style="border: none; height: 5px; background-color: #AB7665; margin: 20px auto; width: 8%;">
    </div><!-- End Section Title -->

    <div class="container">
        <div class="row" style="display: flex; flex-wrap: wrap; gap: 50px;">
            <?php
            $q_produk = mysqli_query($conn, "SELECT p.product_id, p.vendor_id, p.product_name, p.product_photo, p.description, p.price, p.stock, p.total_viewer, p.created_at, p.updated_at, v.`name`, v.contact_number, v.email, v.website 
                                                    FROM
                                                    products AS p
                                                    INNER JOIN vendors AS v ON p.vendor_id = v.vendor_id 
                                                ORDER BY
                                                    total_viewer DESC 
                                                    LIMIT 10");
            while ($produk = mysqli_fetch_assoc($q_produk)) {
            ?>
            <div class="col-lg-2 col-md-4 col-sm-6 d-flex">
                <div class="team-member text-center w-100">
                    <a href="index.php?menu=produk&nama_produk=<?= ($produk['product_name']) ?>&produkid=<?= enkrip($produk['product_id']) ?>"
                        class="link">
                        <img src="assets/img/product/<?= $produk['product_photo'] ?>" class="img-fluid"
                            alt="<?= $produk['product_name'] ?>"
                            style="height: 150px; width: 100%; object-fit: cover; border-radius: 3px;">
                        <div class="member-info">
                            <?= $produk['product_name'] ?>
                            <br>
                            <small>by <?= $produk['name'] ?></small>
                        </div>
                </div>
                </a>
            </div>
            <?php
            }
            ?>
            <!-- Using Flexbox with gap -->




        </div>
    </div>
</section>