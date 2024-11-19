<header class="py-2 border-bottom" style="background-color: #CFA597;position: sticky;">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <!-- Teks dengan font baru -->
        <div class="text-left">
            <a href="index.php"
                class="d-flex flex-column align-items-start ps-5 pt-2 mb-lg-0 link-body-emphasis text-decoration-none text-white text-light"
                style="font-family: 'Italianno', cursive; font-weight: 400; font-style: normal;">
                <h1 style="font-size: 3rem; margin: 0;">FAME</h1> <!-- Set margin to 0 -->
                <h4 style="margin: 0;">Find Artists, Makeup Excellence</h4> <!-- Set margin to 0 -->
            </a>
        </div>

        <div class="d-flex align-items-center p-3">
            <!-- <a href="#" class="d-block link-body-emphasis text-decoration-none pr-3">
                    <img src="assets/img/list.png" alt="List" width="36" height="36" class="rounded-circle">
                </a> -->
            <a href="#" class="d-block link-body-emphasis text-decoration-none pr-3">
                <img src="assets/img/search.png" alt="Search" width="36" height="36" class="rounded-circle">
            </a>
            <a href="javascript:void(0)" class="d-block link-body-emphasis text-decoration-none pr-3 position-relative">
                <img src="assets/img/cart.png" alt="Cart" width="36" height="36" class="rounded-circle"
                    data-bs-toggle="offcanvas" data-bs-target="#shoppingCart" aria-controls="shoppingCart">
                <!-- Badge Total Cart -->
                <span id="cart-total"
                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    <?= $hitung_keranjang ?>
                </span>
            </a>

            <a href="login.php" class="d-block link-body-emphasis text-decoration-none pr-3">
                <img src="assets/img/user-circle-light.png" alt="User" width="36" height="36" class="rounded-circle">
            </a>
        </div>
    </div>

</header>