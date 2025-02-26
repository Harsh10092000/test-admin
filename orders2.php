<?php
//include "components/connection.php";
include "components/header.php";
// $stmt = $conn->prepare("SELECT * from furniture");
// $stmt->execute();
// $result = $stmt->get_result(); 
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Order Management</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Orders</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order Management</h5>
                        <p>Manage your orders efficiently using the table below. Powered by <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a>.</p>

                        <!-- Table controls (top) -->
                        <!-- <div class="datatable-top">
                            <div class="datatable-dropdown">
                                <label>
                                    <select class="datatable-selector" name="per-page">
                                        <option value="5">5</option>
                                        <option value="10" selected>10</option>
                                        <option value="15">15</option>
                                        <option value="-1">All</option>
                                    </select> entries per page
                                </label>
                            </div>
                            <div class="datatable-search">
                                <input class="datatable-input" placeholder="Search..." type="search" name="search" title="Search within table">
                            </div>
                        </div> -->

                        <!-- Table with requested fields -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Order ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Order Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $serial = 1;
                                // Sample data - replace with your database loop
                                $sampleData = [
                                    ['order_id' => '#ORD-12345', 'name' => 'Harsh', 'phone' => '+1 (555) 123-4567', 'date' => '2025/02/11'],
                                    ['order_id' => '#ORD-12346', 'name' => 'Theodore Duran', 'phone' => '+1 (555) 234-5678', 'date' => '2025/01/15'],
                                    ['order_id' => '#ORD-12347', 'name' => 'Kylie Bishop', 'phone' => '+1 (555) 345-6789', 'date' => '2025/03/20'],
                                    ['order_id' => '#ORD-12348', 'name' => 'Willow Gilliam', 'phone' => '+1 (555) 456-7890', 'date' => '2025/04/05'],
                                ];
                                
                                foreach ($sampleData as $data) { ?>
                                    <tr>
                                        <td><?php echo $serial++; ?></td>
                                        <td><?php echo $data['order_id']; ?></td>
                                        <td><?php echo $data['name']; ?></td>
                                        <td><?php echo $data['phone']; ?></td>
                                        <td><?php echo $data['date']; ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="dropdown" style="border-radius: 4px; padding: 4px 8px;">
                                                    <i class="bi bi-three-dots"></i>
                                                    </button>
                                                <ul class="dropdown-menu" style="border-radius: 4px;">
                                                    <li><a class="dropdown-item" href="#">View</a></li>
                                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                                    <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                        <!-- Table pagination (bottom) -->
                        <!-- <div class="datatable-bottom">
                            <div class="datatable-info">Showing 11 to 20 of 100 entries</div>
                            <nav class="datatable-pagination">
                                <ul class="datatable-pagination-list">
                                    <li class="datatable-pagination-list-item">
                                        <button data-page="1" class="datatable-pagination-list-item-link" aria-label="Page 1">‹</button>
                                    </li>
                                    <li class="datatable-pagination-list-item">
                                        <button data-page="1" class="datatable-pagination-list-item-link" aria-label="Page 1">1</button>
                                    </li>
                                    <li class="datatable-pagination-list-item datatable-active">
                                        <button data-page="2" class="datatable-pagination-list-item-link" aria-label="Page 2">2</button>
                                    </li>
                                    <li class="datatable-pagination-list-item">
                                        <button data-page="3" class="datatable-pagination-list-item-link" aria-label="Page 3">3</button>
                                    </li>
                                    <li class="datatable-pagination-list-item">
                                        <button data-page="4" class="datatable-pagination-list-item-link" aria-label="Page 4">4</button>
                                    </li>
                                    <li class="datatable-pagination-list-item">
                                        <button data-page="5" class="datatable-pagination-list-item-link" aria-label="Page 5">5</button>
                                    </li>
                                    <li class="datatable-pagination-list-item">
                                        <button data-page="6" class="datatable-pagination-list-item-link" aria-label="Page 6">6</button>
                                    </li>
                                    <li class="datatable-pagination-list-item">
                                        <button data-page="7" class="datatable-pagination-list-item-link" aria-label="Page 7">7</button>
                                    </li>
                                    <li class="datatable-pagination-list-item datatable-ellipsis datatable-disabled">
                                        <button class="datatable-pagination-list-item-link">…</button>
                                    </li>
                                    <li class="datatable-pagination-list-item">
                                        <button data-page="10" class="datatable-pagination-list-item-link" aria-label="Page 10">10</button>
                                    </li>
                                    <li class="datatable-pagination-list-item">
                                        <button data-page="3" class="datatable-pagination-list-item-link" aria-label="Page 3">›</button>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

<?php include "components/footer.php" ?>

<style>
    .main {
        padding: 30px;
        background: #f9fafb;
        min-height: 100vh;
    }

    .pagetitle {
        margin-bottom: 35px;
    }

    .pagetitle h1 {
        color: #1e3a8a;
        font-weight: 700;
        font-size: 24px;
        margin-bottom: 12px;
        letter-spacing: -0.5px;
    }

    .breadcrumb {
        background: transparent;
        padding: 0;
        font-size: 14px;
    }

    .breadcrumb-item a {
        color: #4f46e5;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .breadcrumb-item a:hover {
        color: #3730a3;
    }

    .breadcrumb-item.active {
        color: #6b7280;
    }

    .card {
        border-radius: 8px;
        border: 1px solid #e5e7eb;
        box-shadow: none;
        background: #ffffff;
    }

    .card-body {
        padding: 20px;
    }

    .card-title {
        color: #1e3a8a;
        font-weight: 600;
        font-size: 18px;
        margin-bottom: 15px;
    }

    .card-body p {
        color: #6b7280;
        font-size: 14px;
        margin-bottom: 20px;
    }

    .datatable-top, .datatable-bottom {
        padding: 15px 0;
        border-top: 1px solid #e5e7eb;
        border-bottom: 1px solid #e5e7eb;
        background: #ffffff;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 0;
    }

    .datatable-dropdown {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .datatable-dropdown label {
        display: flex;
        align-items: center;
        font-size: 14px;
        color: #374151;
    }

    .datatable-selector {
        border-radius: 4px;
        border: 1px solid #d1d5db;
        font-size: 14px;
        padding: 6px 12px;
        background: #ffffff;
        color: #374151;
        width: 70px;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI4IiBoZWlnaHQ9IjUiPjxwYXRoIGZpbGw9IiM2YjcyODAiIGQ9Ik0wIDBoOFYzLjVIOEIuNSAzLjUgMCA1IDAgNXoiLz48L3N2Zz4=');
        background-repeat: no-repeat;
        background-position: right 10px center;
        cursor: pointer;
    }

    .datatable-selector:focus {
        border-color: #4f46e5;
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        outline: none;
    }

    .datatable-search {
        position: relative;
    }

    .datatable-input {
        border-radius: 4px;
        border: 1px solid #d1d5db;
        font-size: 14px;
        padding: 6px 12px;
        background: #ffffff;
        color: #374151;
        width: 200px;
        box-shadow: none;
    }

    .datatable-input:focus {
        border-color: #4f46e5;
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        outline: none;
    }

    .datatable-input::placeholder {
        color: #6b7280;
    }

    .datatable-info {
        font-size: 14px;
        color: #6b7280;
    }

    .datatable-pagination {
        display: flex;
        align-items: center;
    }

    .datatable-pagination-list {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        gap: 4px;
    }

    .datatable-pagination-list-item {
        margin: 0;
    }

    .datatable-pagination-list-item-link {
        border-radius: 4px;
        border: 1px solid #e5e7eb;
        background: #ffffff;
        color: #4f46e5;
        padding: 6px 12px;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 32px;
    }

    .datatable-pagination-list-item-link:hover {
        background: #f3f4f6;
        color: #1e3a8a;
        border-color: #d1d5db;
    }

    .datatable-active .datatable-pagination-list-item-link {
        background: #4f46e5;
        color: white;
        border-color: #4f46e5;
    }

    .datatable-disabled .datatable-pagination-list-item-link {
        color: #6b7280;
        cursor: not-allowed;
        background: #f9fafb;
        border-color: #e5e7eb;
    }

    .datatable-ellipsis .datatable-pagination-list-item-link {
        background: none;
        border: none;
        padding: 6px;
        color: #6b7280;
        cursor: default;
    }

    .table.datatable {
        border-collapse: collapse;
        border-spacing: 0;
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 0;
        margin: 0;
    }

    .table.datatable thead th {
        background: #f3f4f6;
        border-bottom: 1px solid #e5e7eb;
        padding: 12px 16px;
        color: #374151;
        font-weight: 600;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        border-top: none;
        cursor: pointer;
    }

    .table.datatable tbody tr {
        transition: all 0.3s ease;
    }

    .table.datatable tbody tr:hover {
        background: #f9fafb;
        transform: translateY(-2px);
    }

    .table.datatable td {
        padding: 12px 16px;
        vertical-align: middle;
        border-bottom: 1px solid #e5e7eb;
        color: #374151;
        font-size: 14px;
    }

    .btn-outline-primary {
        border-color: #4f46e5;
        color: #4f46e5;
        padding: 4px 8px;
        font-size: 14px;
        border-radius: 4px;
        transition: all 0.3s ease;
        background: transparent;
    }

    .btn-outline-primary:hover {
        background: #4f46e5;
        color: white;
        transform: translateY(-2px);
    }

    .dropdown-menu {
        border-radius: 4px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        border: 1px solid #e5e7eb;
        font-size: 14px;
        min-width: 120px;
    }

    .dropdown-item {
        padding: 8px 12px;
    }

    .dropdown-item:hover {
        background: #f3f4f6;
        color: #1e3a8a;
    }

    .dropdown-item.text-danger:hover {
        background: #fee2e2;
        color: #dc2626;
    }

    @media (max-width: 768px) {
        .main {
            padding: 15px;
        }

        .card-body {
            padding: 15px;
        }

        .table.datatable td, .table.datatable th {
            padding: 10px 12px;
        }

        .pagetitle h1 {
            font-size: 20px;
        }

        .datatable-top, .datatable-bottom {
            flex-direction: column;
            gap: 15px;
            text-align: center;
        }

        .datatable-selector, .datatable-input {
            width: 100%;
        }
    }
</style>