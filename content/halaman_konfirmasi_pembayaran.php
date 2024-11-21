<section class="header-profile" style="background-color: #FFF3EF;padding: 50px;">
    <div class="container section-title">
        <h2 class="text-center text-header mt-3">Konfirmasi Pembayaran</h2>
        <hr style="border: none; height: 5px; background-color: #AB7665; margin: 20px auto; width: 8%;">
    </div><!-- End Section Title -->


    <?php



    $q = mysqli_query($conn, "SELECT
                                i.keranjang_id,
                                i.id,
                                i.produk_id,
                                i.tanggal_acara,
                                SUM(i.jumlah) AS jumlah_total,
                                (i.harga) AS harga,
                                SUM(i.subtotal) AS sub_total,
                                p.product_name,
                                p.product_photo,
                                p.description,
                                v.`name`
                            FROM
                                item_keranjang AS i
                            INNER JOIN keranjang AS k ON i.keranjang_id = k.id
                            INNER JOIN products AS p ON i.produk_id = p.product_id
                            INNER JOIN vendors AS v ON p.vendor_id = v.vendor_id
                            WHERE (k.user_id='$kode' OR k.session_id='$kode') and i.checkout='ya'
                            GROUP BY produk_id, i.tanggal_acara
                        ");

    $total_keranjang = mysqli_num_rows($q);
    ?>

    <div class="container py-5">
        <form action="proses_konfirmasi.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nominal" class="form-label">Jumlah Nominal yang Ditransfer (Rp)</label>
                <input type="number" class="form-control" id="nominal" name="nominal" placeholder="Contoh: 500000"
                    required>
            </div>
            <div class="mb-3">
                <label for="buktiPembayaran" class="form-label">Upload Bukti Pembayaran</label>
                <input type="file" class="form-control" id="buktiPembayaran" name="bukti_pembayaran" accept="image/*"
                    required>
            </div>
            <div class="mb-3">
                <label for="catatan" class="form-label">Catatan</label>
                <textarea class="form-control" id="catatan" name="catatan" rows="4"
                    placeholder="Masukkan catatan tambahan jika ada"></textarea>
            </div>
            <div class="d-flex justify-content-between">
                <a href="halaman_pembayaran.php" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Konfirmasi Pembayaran</button>
            </div>
        </form>



</section>