<?php
// Query untuk menghitung statistik
$total_users_query = "SELECT COUNT(*) AS total_users FROM users";
$total_products_query = "SELECT COUNT(*) AS total_products FROM products";
$total_vendors_query = "SELECT COUNT(*) AS total_vendors FROM vendors";
$pending_orders_query = "SELECT COUNT(*) AS pending_orders FROM keranjang WHERE status is null";

// Eksekusi query
$total_users_result = mysqli_query($conn, $total_users_query);
$total_products_result = mysqli_query($conn, $total_products_query);
$total_vendors_result = mysqli_query($conn, $total_vendors_query);
$pending_orders_result = mysqli_query($conn, $pending_orders_query);

// Ambil hasil dari query
$total_users = mysqli_fetch_assoc($total_users_result)['total_users'];
$total_products = mysqli_fetch_assoc($total_products_result)['total_products'];
$total_vendors = mysqli_fetch_assoc($total_vendors_result)['total_vendors'];
$pending_orders = mysqli_fetch_assoc($pending_orders_result)['pending_orders'];
?>

<div class="row">
    <!-- Cards for Summary Information -->
    <div class="col-md-3">
        <div class="card card-stats">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center icon-warning">
                            <i class="fa fa-users text-warning"></i>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="numbers">
                            <p class="card-category">Total Users</p>
                            <h4 class="card-title"><?php echo number_format($total_users); ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-stats">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center icon-success">
                            <i class="fa fa-box text-success"></i>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="numbers">
                            <p class="card-category">Total Products</p>
                            <h4 class="card-title"><?php echo number_format($total_products); ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-stats">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center icon-danger">
                            <i class="fa fa-truck text-danger"></i>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="numbers">
                            <p class="card-category">Total Vendors</p>
                            <h4 class="card-title"><?php echo number_format($total_vendors); ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-stats">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center icon-info">
                            <i class="fa fa-credit-card text-info"></i>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="numbers">
                            <p class="card-category">Pending Orders</p>
                            <h4 class="card-title"><?php echo number_format($pending_orders); ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>