<?php
include_once "./koneksi/db.php";
include_once "./function/global.php";
?>
<?php include_once("./layout/page_start.php"); ?>
<?php include_once("./layout/page_header.php"); ?>



<?php
if (isset($_GET['menu'])) {
    $menu = mysqli_escape_string($conn, $_GET['menu']);
    if ($menu == 'kategori') {
        include_once("./content/halaman_per_kategori.php");
    } else if ($menu == 'vendor') {
        include_once("./content/halaman_per_vendor.php");
    } else if ($menu == 'produk') {
        include_once("./content/halaman_produk.php");
    } else {
        include_once("./layout/banner.php");
        include_once("./content/halaman-awal.php");
    }
} else {

    include_once("./layout/banner.php");
    include_once("./content/halaman-awal.php");
}
?>

<div class="floating-nav">
    <a href="index.php#" class="nav-item" data-tooltip="Home">
        <i class="fa fa-home"></i>
    </a>
    <a href="index.php#mua" class="nav-item" data-tooltip="Apa itu MUA?">
        <i class="fa fa-info-circle"></i>
    </a>
    <a href="index.php#kategori" class="nav-item" data-tooltip="Kategori">
        <i class="fa fa-money"></i>
    </a>
    <a href="index.php#rekomendasi" class="nav-item" data-tooltip="Rekomendasi">
        <i class="fa fa-heart"></i>
    </a>
    <!-- <a href="index.php#deal" class="nav-item" data-tooltip="Promo">
        <i class="fa fa-money"></i>
    </a> -->
    <a href="index.php#footer" class="nav-item" data-tooltip="Contact">
        <i class="fa fa-envelope"></i>
    </a>
</div>
<div class="offcanvas offcanvas-start" tabindex="-1" id="shoppingCart" aria-labelledby="shoppingCartLabel">
    <div class="offcanvas-header">
        <i class="fa fa-shopping-cart fa-lg"></i> &nbsp;
        <h5 class="offcanvas-title" id="shoppingCartLabel">Daftar Keranjang</h5>
        <hr>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <!-- Shopping Cart Items -->
        <div class="cart-item d-flex justify-content-between align-items-center mb-3">
            <div>
                <h6>Product 1</h6>
                <p>$25.00</p>
            </div>
            <input type="number" class="form-control w-25" value="1" min="1">
        </div>

        <div class="cart-item d-flex justify-content-between align-items-center mb-3">
            <div>
                <h6>Product 2</h6>
                <p>$50.00</p>
            </div>
            <input type="number" class="form-control w-25" value="2" min="1">
        </div>

        <div class="cart-item d-flex justify-content-between align-items-center mb-3">
            <div>
                <h6>Product 3</h6>
                <p>$10.00</p>
            </div>
            <input type="number" class="form-control w-25" value="3" min="1">
        </div>

        <hr>

        <!-- Total Price -->
        <div class="d-flex justify-content-between">
            <h6>Total:</h6>
            <h6>$85.00</h6>
        </div>

        <!-- Checkout Button -->
        <div class="d-grid gap-2 mt-3">
            <button class="btn btn-success" type="button">Proceed to Checkout</button>
        </div>
    </div>
</div>
<?php include_once("./layout/page_footer.php") ?>