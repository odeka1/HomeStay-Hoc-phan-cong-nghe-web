<?php
// Cấu hình đường dẫn lùi lại 1 cấp thư mục để nhận đúng tài nguyên từ gốc public_html/
if (!isset($base_url)) {
    $base_url = '../';
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CozyStay Admin Control Panel</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Custom Admin Slate Aesthetic Styles -->
    <style>
        :root {
            --bs-success: #198754;
            --bs-success-rgb: 25, 135, 84;
            --admin-dark-slate: #212529;
            --admin-dark-slate-hover: #2c3034;
        }
        body {
            font-size: 0.9rem;
            background-color: #f4f6f9;
        }
        /* Sidebar layout styles */
        .sidebar {
            background-color: var(--admin-dark-slate);
            transition: all 0.3s ease;
        }
        .sidebar .nav-link {
            color: #c2c7d0;
            padding: 0.8rem 1.25rem;
            border-left: 3px solid transparent;
            transition: all 0.2s ease;
        }
        .sidebar .nav-link:hover {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.05);
            border-left-color: var(--bs-success);
        }
        .sidebar .nav-link.active {
            color: #fff;
            background-color: rgba(25, 135, 84, 0.15);
            border-left-color: var(--bs-success);
            font-weight: 600;
        }
        .card-metric {
            transition: transform 0.2s, box-shadow 0.2s;
            border: none;
        }
        .card-metric:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 20px rgba(0,0,0,0.08) !important;
        }
        /* Table density styles */
        .table-responsive {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.02);
        }
        .fs-7 {
            font-size: 0.8rem;
        }
        .fs-8 {
            font-size: 0.72rem;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
