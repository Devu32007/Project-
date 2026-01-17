<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProBiz Management System</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Chart.js for graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Animate.css for animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3a0ca3;
            --success-color: #4cc9f0;
            --warning-color: #f72585;
            --discount-color: #ff6b6b;
            --dark-color: #212529;
            --light-color: #f8f9fa;
            --gst-color: #7209b7;
            --purchase-color: #20c997;
            --return-color: #fd7e14;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.1);
            transition: all 0.3s ease;
        }
        
        .glass-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(31, 38, 135, 0.15);
        }
        
        .sidebar {
            background: linear-gradient(180deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            min-height: 100vh;
            padding-top: 20px;
            box-shadow: 3px 0 15px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 250px;
            z-index: 100;
        }
        
        .sidebar a {
            color: rgba(255, 255, 255, 0.8);
            display: block;
            padding: 15px 25px;
            text-decoration: none;
            transition: all 0.3s;
            border-left: 4px solid transparent;
            margin: 5px 10px;
            border-radius: 8px;
            cursor: pointer;
        }
        
        .sidebar a:hover {
            color: #fff;
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(5px);
        }
        
        .sidebar a.active {
            color: #fff;
            background: rgba(255, 255, 255, 0.2);
            border-left: 4px solid var(--success-color);
            font-weight: 600;
        }
        
        .logo-container {
            text-align: center;
            padding: 20px 10px;
            margin-bottom: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .logo {
            color: white;
            font-size: 1.8rem;
            font-weight: 700;
            letter-spacing: 1px;
        }
        
        .logo span {
            color: var(--success-color);
        }
        
        .main-content {
            padding: 25px;
            margin-left: 250px;
            width: calc(100% - 250px);
        }
        
        .status-badge {
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-block;
        }
        
        .status-pending {
            background-color: rgba(247, 37, 133, 0.15);
            color: var(--warning-color);
        }
        
        .status-received {
            background-color: rgba(76, 201, 240, 0.15);
            color: var(--success-color);
        }
        
        .status-purchase {
            background-color: rgba(32, 201, 151, 0.15);
            color: var(--purchase-color);
        }
        
        .status-return {
            background-color: rgba(253, 126, 20, 0.15);
            color: var(--return-color);
        }
        
        .discount-badge {
            background-color: rgba(255, 107, 107, 0.15);
            color: var(--discount-color);
            padding: 3px 10px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-left: 5px;
        }
        
        .gst-badge {
            background-color: rgba(114, 9, 183, 0.15);
            color: var(--gst-color);
            padding: 3px 10px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-left: 5px;
        }
        
        .dashboard-card {
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            border: none;
        }
        
        .card-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            margin-bottom: 15px;
        }
        
        .icon-sales { background: rgba(67, 97, 238, 0.1); color: var(--primary-color); }
        .icon-pending { background: rgba(247, 37, 133, 0.1); color: var(--warning-color); }
        .icon-warehouse { background: rgba(58, 12, 163, 0.1); color: var(--secondary-color); }
        .icon-today { background: rgba(76, 201, 240, 0.1); color: var(--success-color); }
        .icon-billing { background: rgba(114, 9, 183, 0.1); color: var(--gst-color); }
        .icon-purchase { background: rgba(32, 201, 151, 0.1); color: var(--purchase-color); }
        .icon-return { background: rgba(253, 126, 20, 0.1); color: var(--return-color); }
        
        .counter {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 5px;
        }
        
        .btn-action {
            padding: 8px 20px;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-primary {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            border: none;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
        }
        
        .form-control, .form-select {
            border-radius: 10px;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            transition: all 0.3s;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.15);
        }
        
        .table {
            border-radius: 10px;
            overflow: hidden;
        }
        
        .table thead th {
            background-color: rgba(67, 97, 238, 0.05);
            border-bottom: 2px solid rgba(67, 97, 238, 0.1);
            font-weight: 600;
            color: var(--dark-color);
            padding: 15px;
        }
        
        .table tbody td {
            padding: 15px;
            vertical-align: middle;
        }
        
        .table tbody tr {
            transition: all 0.3s;
        }
        
        .table tbody tr:hover {
            background-color: rgba(67, 97, 238, 0.03);
        }
        
        .price-info {
            font-size: 0.85rem;
            color: #666;
            margin-top: 3px;
        }
        
        .original-price {
            text-decoration: line-through;
            color: #999;
            margin-right: 5px;
        }
        
        .discounted-price {
            color: var(--discount-color);
            font-weight: 600;
        }
        
        .custom-price-option {
            margin-top: 10px;
            padding: 10px;
            background: rgba(67, 97, 238, 0.05);
            border-radius: 8px;
            border-left: 3px solid var(--primary-color);
        }
        
        .payment-toggle {
            position: relative;
            display: inline-block;
            width: 70px;
            height: 30px;
        }
        
        .payment-toggle input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        
        .payment-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }
        
        .payment-slider:before {
            position: absolute;
            content: "";
            height: 22px;
            width: 22px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }
        
        input:checked + .payment-slider {
            background-color: var(--success-color);
        }
        
        input:checked + .payment-slider:before {
            transform: translateX(40px);
        }
        
        .auto-save-indicator {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: var(--success-color);
            color: white;
            padding: 10px 20px;
            border-radius: 50px;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(76, 201, 240, 0.3);
            z-index: 1000;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.3s;
        }
        
        .auto-save-indicator.show {
            opacity: 1;
            transform: translateY(0);
        }
        
        .fade-in {
            animation: fadeIn 0.5s ease forwards;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .pulse {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(67, 97, 238, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(67, 97, 238, 0); }
            100% { box-shadow: 0 0 0 0 rgba(67, 97, 238, 0); }
        }
        
        .product-option {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 0;
        }
        
        .product-price-info {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }
        
        .product-name {
            font-weight: 500;
        }
        
        .custom-price-checkbox {
            margin-right: 10px;
        }
        
        /* NEW: Sales Product Input System */
        .product-input-system {
            background: rgba(76, 201, 240, 0.05);
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            border: 2px dashed rgba(76, 201, 240, 0.3);
        }
        
        .product-input-row {
            background: white;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
            border-left: 4px solid var(--primary-color);
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        
        .product-input-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }
        
        .product-number {
            background: var(--primary-color);
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        
        .remove-product {
            background: rgba(247, 37, 133, 0.1);
            color: var(--warning-color);
            border: none;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .remove-product:hover {
            background: rgba(247, 37, 133, 0.2);
            transform: scale(1.1);
        }
        
        .add-product-btn {
            width: 100%;
            padding: 12px;
            background: rgba(67, 97, 238, 0.1);
            border: 2px dashed var(--primary-color);
            border-radius: 10px;
            color: var(--primary-color);
            font-weight: 600;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            cursor: pointer;
        }
        
        .add-product-btn:hover {
            background: rgba(67, 97, 238, 0.2);
            transform: translateY(-2px);
        }
        
        .calculation-box {
            background: rgba(76, 201, 240, 0.1);
            border-radius: 10px;
            padding: 15px;
            margin: 15px 0;
            border-left: 4px solid var(--success-color);
        }
        
        .calculation-row {
            display: flex;
            justify-content: space-between;
            padding: 5px 0;
        }
        
        .calculation-total {
            border-top: 2px solid #dee2e6;
            margin-top: 10px;
            padding-top: 10px;
            font-weight: bold;
            font-size: 1.2rem;
        }
        
        .category-badge {
            background-color: rgba(67, 97, 238, 0.15);
            color: var(--primary-color);
            padding: 3px 8px;
            border-radius: 10px;
            font-size: 0.7rem;
            font-weight: 600;
            margin-left: 5px;
        }
        
        .product-option-detail {
            font-size: 0.8rem;
            color: #666;
            margin-top: 2px;
        }
        
        /* Stock status indicators */
        .stock-indicator {
            padding: 3px 8px;
            border-radius: 10px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-block;
        }
        
        .stock-high {
            background-color: rgba(76, 201, 240, 0.15);
            color: var(--success-color);
        }
        
        .stock-low {
            background-color: rgba(255, 193, 7, 0.15);
            color: #ffc107;
        }
        
        .stock-out {
            background-color: rgba(247, 37, 133, 0.15);
            color: var(--warning-color);
        }
        
        /* GST Styles */
        .gst-calculation {
            background: rgba(114, 9, 183, 0.05);
            border-radius: 8px;
            padding: 10px;
            margin: 10px 0;
            border-left: 3px solid var(--gst-color);
        }
        
        .gst-breakdown {
            font-size: 0.8rem;
            color: #666;
        }
        
        /* Product suggestions */
        .product-suggestions {
            position: absolute;
            z-index: 1000;
            width: 100%;
            max-height: 200px;
            overflow-y: auto;
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            margin-top: 2px;
        }
        
        .list-group-item {
            border: none;
            border-bottom: 1px solid #f0f0f0;
            cursor: pointer;
        }
        
        .list-group-item:hover {
            background-color: #f8f9fa;
        }
        
        /* Professional Bill Styles */
        .invoice-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        
        .invoice-header {
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        
        .invoice-logo {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
        }
        
        .invoice-title {
            font-size: 1.8rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 10px;
        }
        
        .invoice-subtitle {
            color: #666;
            text-align: center;
            margin-bottom: 30px;
        }
        
        .invoice-info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .invoice-from, .invoice-to {
            padding: 15px;
            background: #f8f9fa;
            border-radius: 10px;
        }
        
        .invoice-from h6, .invoice-to h6 {
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--primary-color);
        }
        
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        
        .invoice-table th {
            background-color: rgba(67, 97, 238, 0.1);
            padding: 12px 15px;
            text-align: left;
            font-weight: 600;
            border-bottom: 2px solid rgba(67, 97, 238, 0.2);
        }
        
        .invoice-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
        }
        
        .invoice-table tfoot td {
            font-weight: 600;
            background-color: #f8f9fa;
            border-top: 2px solid #dee2e6;
        }
        
        .invoice-summary {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .invoice-totals {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
        }
        
        .invoice-totals .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px dashed #dee2e6;
        }
        
        .invoice-totals .row.total {
            font-size: 1.2rem;
            font-weight: 700;
            border-bottom: 2px solid var(--primary-color);
        }
        
        .invoice-footer {
            border-top: 2px solid #e0e0e0;
            padding-top: 20px;
            margin-top: 30px;
            text-align: center;
            color: #666;
        }
        
        .invoice-actions {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 30px;
        }
        
        .watermark {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 100px;
            color: rgba(0,0,0,0.05);
            font-weight: 700;
            z-index: -1;
            pointer-events: none;
        }
        
        .print-only {
            display: none;
        }
        
        /* Purchase Styles */
        .purchase-input-row {
            background: white;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
            border-left: 4px solid var(--purchase-color);
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        
        .purchase-input-system {
            background: rgba(32, 201, 151, 0.05);
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            border: 2px dashed rgba(32, 201, 151, 0.3);
        }
        
        .add-purchase-btn {
            width: 100%;
            padding: 12px;
            background: rgba(32, 201, 151, 0.1);
            border: 2px dashed var(--purchase-color);
            border-radius: 10px;
            color: var(--purchase-color);
            font-weight: 600;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            cursor: pointer;
        }
        
        .add-purchase-btn:hover {
            background: rgba(32, 201, 151, 0.2);
            transform: translateY(-2px);
        }
        
        /* Return Styles */
        .return-input-row {
            background: white;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
            border-left: 4px solid var(--return-color);
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        
        .return-input-system {
            background: rgba(253, 126, 20, 0.05);
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            border: 2px dashed rgba(253, 126, 20, 0.3);
        }
        
        .add-return-btn {
            width: 100%;
            padding: 12px;
            background: rgba(253, 126, 20, 0.1);
            border: 2px dashed var(--return-color);
            border-radius: 10px;
            color: var(--return-color);
            font-weight: 600;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            cursor: pointer;
        }
        
        .add-return-btn:hover {
            background: rgba(253, 126, 20, 0.2);
            transform: translateY(-2px);
        }
        
        @media print {
            body * {
                visibility: hidden;
            }
            .invoice-container, .invoice-container * {
                visibility: visible;
            }
            .invoice-container {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                box-shadow: none;
                padding: 20px;
            }
            .invoice-actions {
                display: none;
            }
            .print-only {
                display: block;
            }
            .no-print {
                display: none;
            }
            @page {
                margin: 0;
                size: auto;
            }
        }
        
        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
                padding: 10px 0;
            }
            
            .sidebar a {
                padding: 10px 15px;
                display: inline-block;
                margin: 2px 5px;
            }
            
            .counter {
                font-size: 1.8rem;
            }
            
            .main-content {
                padding: 15px;
                margin-left: 0;
                width: 100%;
            }
            
            .product-input-row .row > div {
                margin-bottom: 10px;
            }
            
            .invoice-container {
                padding: 20px;
            }
            
            .invoice-info-grid {
                grid-template-columns: 1fr;
            }
            
            .invoice-summary {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Auto Save Indicator -->
    <div id="autoSaveIndicator" class="auto-save-indicator">
        <i class="fas fa-save me-2"></i> Auto-saved
    </div>
    
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar">
                <div class="logo-container">
                    <div class="logo">Pro<span>Biz</span></div>
                    <div class="text-white-50 small mt-2">Management System</div>
                </div>
                <a href="javascript:void(0)" class="active" onclick="showSection('dashboard')">
                    <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                </a>
                <a href="javascript:void(0)" onclick="showSection('sales')">
                    <i class="fas fa-shopping-cart me-2"></i> Sales Entry
                </a>
                <a href="javascript:void(0)" onclick="showSection('purchase')">
                    <i class="fas fa-shopping-bag me-2"></i> Purchase
                </a>
                <a href="javascript:void(0)" onclick="showSection('return')">
                    <i class="fas fa-exchange-alt me-2"></i> Return
                </a>
                <a href="javascript:void(0)" onclick="showSection('billing')">
                    <i class="fas fa-file-invoice me-2"></i> Billing
                </a>
                <a href="javascript:void(0)" onclick="showSection('pending')">
                    <i class="fas fa-clock me-2"></i> Pending Payments
                </a>
                <a href="javascript:void(0)" onclick="showSection('warehouse')">
                    <i class="fas fa-warehouse me-2"></i> Warehouse
                </a>
                <a href="javascript:void(0)" onclick="showSection('reports')">
                    <i class="fas fa-chart-bar me-2"></i> Reports
                </a>
            </div>
            
            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 main-content">
                <!-- Dashboard Section -->
                <div id="dashboard-section" class="fade-in">
                    <h2 class="mb-4 fw-bold">Dashboard Overview</h2>
                    
                    <!-- Summary Cards -->
                    <div class="row mb-4">
                        <div class="col-md-3 col-sm-6 mb-3">
                            <div class="card dashboard-card glass-card">
                                <div class="card-body p-4">
                                    <div class="card-icon icon-sales">
                                        <i class="fas fa-rupee-sign"></i>
                                    </div>
                                    <div class="counter" id="total-sales">₹0</div>
                                    <p class="text-muted mb-0">Total Sales</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <div class="card dashboard-card glass-card">
                                <div class="card-body p-4">
                                    <div class="card-icon icon-purchase">
                                        <i class="fas fa-shopping-bag"></i>
                                    </div>
                                    <div class="counter" id="total-purchase">₹0</div>
                                    <p class="text-muted mb-0">Total Purchase</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <div class="card dashboard-card glass-card">
                                <div class="card-body p-4">
                                    <div class="card-icon icon-pending">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div class="counter" id="pending-amount">₹0</div>
                                    <p class="text-muted mb-0">Pending Payments</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <div class="card dashboard-card glass-card">
                                <div class="card-body p-4">
                                    <div class="card-icon icon-warehouse">
                                        <i class="fas fa-boxes"></i>
                                    </div>
                                    <div class="counter" id="warehouse-count">0</div>
                                    <p class="text-muted mb-0">Warehouse Items</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <div class="card dashboard-card glass-card">
                                <div class="card-body p-4">
                                    <div class="card-icon icon-return">
                                        <i class="fas fa-exchange-alt"></i>
                                    </div>
                                    <div class="counter" id="total-return">₹0</div>
                                    <p class="text-muted mb-0">Total Returns</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <div class="card dashboard-card glass-card">
                                <div class="card-body p-4">
                                    <div class="card-icon icon-today pulse">
                                        <i class="fas fa-calendar-day"></i>
                                    </div>
                                    <div class="counter" id="today-sales">₹0</div>
                                    <p class="text-muted mb-0">Today's Sales</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <div class="card dashboard-card glass-card">
                                <div class="card-body p-4">
                                    <div class="card-icon icon-billing">
                                        <i class="fas fa-file-invoice"></i>
                                    </div>
                                    <div class="counter" id="today-purchase">₹0</div>
                                    <p class="text-muted mb-0">Today's Purchase</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <div class="card dashboard-card glass-card">
                                <div class="card-body p-4">
                                    <div class="card-icon icon-billing">
                                        <i class="fas fa-balance-scale"></i>
                                    </div>
                                    <div class="counter" id="profit-loss">₹0</div>
                                    <p class="text-muted mb-0">Net Profit/Loss</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Charts -->
                    <div class="row mt-4">
                        <div class="col-md-8 mb-4">
                            <div class="glass-card p-4">
                                <h5 class="fw-bold mb-3">Sales & Purchase Overview</h5>
                                <canvas id="salesChart"></canvas>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="glass-card p-4">
                                <h5 class="fw-bold mb-3">Transaction Status</h5>
                                <canvas id="paymentChart"></canvas>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Recent Transactions -->
                    <div class="row mt-2">
                        <div class="col-12">
                            <div class="glass-card p-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="fw-bold mb-0">Recent Transactions</h5>
                                    <div>
                                        <button class="btn btn-primary btn-action me-2" onclick="showSection('sales')">
                                            <i class="fas fa-plus me-2"></i>Add Sale
                                        </button>
                                        <button class="btn btn-success btn-action" onclick="showSection('purchase')">
                                            <i class="fas fa-plus me-2"></i>Add Purchase
                                        </button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Type</th>
                                                <th>Customer/Supplier</th>
                                                <th>Products</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="recent-transactions-table">
                                            <tr id="no-recent-transactions">
                                                <td colspan="7" class="text-center text-muted py-4">
                                                    <i class="fas fa-exchange-alt fa-2x mb-3"></i><br>
                                                    No transactions yet. Add your first transaction!
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Sales Entry Section -->
                <div id="sales-section" style="display: none;" class="fade-in">
                    <h2 class="mb-4 fw-bold">Sales Entry</h2>
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="glass-card p-4">
                                <h5 class="fw-bold mb-3">Add New Sale</h5>
                                <form id="sales-form">
                                    <!-- Customer Information -->
                                    <div class="row mb-4">
                                        <div class="col-md-6 mb-3">
                                            <label for="customer-name" class="form-label fw-semibold">Customer Name</label>
                                            <input type="text" class="form-control" id="customer-name" required placeholder="Enter customer name">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="customer-phone" class="form-label fw-semibold">Phone Number</label>
                                            <input type="text" class="form-control" id="customer-phone" required placeholder="Enter phone number">
                                        </div>
                                    </div>
                                    
                                    <!-- Product Input System (Warehouse Style) -->
                                    <div class="product-input-system">
                                        <h6 class="fw-bold mb-3">Add Products to Sale</h6>
                                        <div id="product-inputs-container">
                                            <!-- Product inputs will be added here dynamically -->
                                            <div class="product-input-row" id="product-row-1">
                                                <div class="product-input-header">
                                                    <div class="product-number">1</div>
                                                    <div class="remove-product" onclick="removeProductRow(1)">
                                                        <i class="fas fa-times"></i>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-2">
                                                        <label class="form-label small fw-semibold">Product Name</label>
                                                        <input type="text" class="form-control product-name-input" placeholder="Enter product name" oninput="searchProducts(1)">
                                                        <div class="product-suggestions" id="suggestions-1" style="display: none;"></div>
                                                    </div>
                                                    <div class="col-md-3 mb-2">
                                                        <label class="form-label small fw-semibold">Quantity</label>
                                                        <input type="number" class="form-control product-quantity" min="1" value="1" onchange="updateProductTotal(1)">
                                                    </div>
                                                    <div class="col-md-3 mb-2">
                                                        <label class="form-label small fw-semibold">Price (₹)</label>
                                                        <input type="number" class="form-control product-price" step="0.01" placeholder="0.00" onchange="updateProductTotal(1)">
                                                    </div>
                                                    <div class="col-md-4 mb-2">
                                                        <label class="form-label small fw-semibold">Discount %</label>
                                                        <input type="number" class="form-control product-discount" min="0" max="100" value="0" step="1" onchange="updateProductTotal(1)">
                                                    </div>
                                                    <div class="col-md-4 mb-2">
                                                        <label class="form-label small fw-semibold">Discount ₹</label>
                                                        <input type="number" class="form-control product-discount-amount" min="0" step="0.01" value="0" onchange="updateProductTotal(1)">
                                                    </div>
                                                    <div class="col-md-4 mb-2">
                                                        <label class="form-label small fw-semibold">GST %</label>
                                                        <select class="form-select product-gst" onchange="updateProductTotal(1)">
                                                            <option value="0">0% (No GST)</option>
                                                            <option value="5">5% GST</option>
                                                            <option value="12" selected>12% GST</option>
                                                            <option value="18">18% GST</option>
                                                            <option value="28">28% GST</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12 mb-2">
                                                        <label class="form-label small fw-semibold">Product Total (₹)</label>
                                                        <input type="text" class="form-control product-total" value="0.00" readonly style="background-color: #f8f9fa; font-weight: bold; font-size: 1.1rem;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <button type="button" class="add-product-btn" onclick="addProductRow()">
                                            <i class="fas fa-plus-circle"></i> Add Another Product
                                        </button>
                                    </div>
                                    
                                    <!-- GST Calculation Breakdown -->
                                    <div class="gst-calculation">
                                        <h6 class="fw-bold mb-3">GST Breakdown</h6>
                                        <div id="gst-breakdown">
                                            <!-- GST breakdown will be added here dynamically -->
                                            <div class="text-muted text-center">Add products to see GST breakdown</div>
                                        </div>
                                    </div>
                                    
                                    <!-- Calculation Summary -->
                                    <div class="calculation-box">
                                        <h6 class="fw-bold mb-3">Sale Calculation</h6>
                                        <div class="calculation-row">
                                            <span>Subtotal:</span>
                                            <span>₹<span id="sale-subtotal">0.00</span></span>
                                        </div>
                                        <div class="calculation-row">
                                            <span>Total Discount:</span>
                                            <span class="text-danger">-₹<span id="sale-total-discount">0.00</span></span>
                                        </div>
                                        <div class="calculation-row">
                                            <span>Total GST:</span>
                                            <span class="text-primary">₹<span id="sale-tax">0.00</span></span>
                                        </div>
                                        <div class="calculation-row calculation-total">
                                            <span>Final Amount:</span>
                                            <span class="text-success fw-bold">₹<span id="sale-final-amount">0.00</span></span>
                                        </div>
                                    </div>
                                    
                                    <!-- Payment Details -->
                                    <div class="row mb-4">
                                        <div class="col-md-6 mb-3">
                                            <label for="payment-status" class="form-label fw-semibold">Payment Status</label>
                                            <select class="form-select" id="payment-status" required onchange="updatePaymentFields()">
                                                <option value="received">Full Payment</option>
                                                <option value="partial">Partial Payment</option>
                                                <option value="pending">Pending Payment</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="paid-amount" class="form-label fw-semibold">Paid Amount (₹)</label>
                                            <input type="number" class="form-control" id="paid-amount" step="0.01" value="0" onchange="updatePendingAmount()">
                                        </div>
                                    </div>
                                    
                                    <!-- Pending Amount -->
                                    <div class="mb-3" id="pending-container" style="display: none;">
                                        <label class="form-label fw-semibold">Pending Amount</label>
                                        <div class="alert alert-warning">
                                            <h5 class="mb-0">₹<span id="pending-amount-display">0.00</span></h5>
                                        </div>
                                    </div>
                                    
                                    <!-- Sale Date -->
                                    <div class="mb-4">
                                        <label for="sale-date" class="form-label fw-semibold">Sale Date</label>
                                        <input type="date" class="form-control" id="sale-date" required>
                                    </div>
                                    
                                    <!-- Notes -->
                                    <div class="mb-4">
                                        <label for="sale-notes" class="form-label fw-semibold">Notes (Optional)</label>
                                        <textarea class="form-control" id="sale-notes" rows="2" placeholder="Any additional notes..."></textarea>
                                    </div>
                                    
                                    <!-- Submit Button -->
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary btn-action">
                                            <i class="fas fa-check-circle me-2"></i>Complete Sale
                                        </button>
                                        <button type="button" class="btn btn-success btn-action" onclick="generateBillFromCurrentForm()">
                                            <i class="fas fa-file-invoice me-2"></i>Generate Bill Now
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <!-- All Sales Table -->
                        <div class="col-lg-6">
                            <div class="glass-card p-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="fw-bold mb-0">Recent Sales</h5>
                                    <button class="btn btn-primary btn-action" onclick="showSection('sales')">
                                        <i class="fas fa-plus me-2"></i>Add New Sale
                                    </button>
                                </div>
                                <div class="table-responsive" style="max-height: 600px; overflow-y: auto;">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Customer</th>
                                                <th>Products</th>
                                                <th>Total</th>
                                                <th>Paid</th>
                                                <th>Pending</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="all-sales-table">
                                            <tr id="no-sales">
                                                <td colspan="8" class="text-center text-muted py-4">
                                                    <i class="fas fa-receipt fa-2x mb-3"></i><br>
                                                    No sales records yet
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- NEW: Purchase Section -->
                <div id="purchase-section" style="display: none;" class="fade-in">
                    <h2 class="mb-4 fw-bold">Purchase Management</h2>
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="glass-card p-4">
                                <h5 class="fw-bold mb-3">Add New Purchase</h5>
                                <form id="purchase-form">
                                    <!-- Supplier Information -->
                                    <div class="row mb-4">
                                        <div class="col-md-6 mb-3">
                                            <label for="supplier-name" class="form-label fw-semibold">Supplier Name</label>
                                            <input type="text" class="form-control" id="supplier-name" required placeholder="Enter supplier name">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="supplier-phone" class="form-label fw-semibold">Phone Number</label>
                                            <input type="text" class="form-control" id="supplier-phone" required placeholder="Enter phone number">
                                        </div>
                                    </div>
                                    
                                    <!-- Product Input System -->
                                    <div class="purchase-input-system">
                                        <h6 class="fw-bold mb-3">Add Purchased Products</h6>
                                        <div id="purchase-inputs-container">
                                            <!-- Purchase inputs will be added here dynamically -->
                                            <div class="purchase-input-row" id="purchase-row-1">
                                                <div class="product-input-header">
                                                    <div class="product-number">1</div>
                                                    <div class="remove-product" onclick="removePurchaseRow(1)">
                                                        <i class="fas fa-times"></i>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-2">
                                                        <label class="form-label small fw-semibold">Product Name</label>
                                                        <input type="text" class="form-control purchase-name-input" placeholder="Enter product name">
                                                    </div>
                                                    <div class="col-md-3 mb-2">
                                                        <label class="form-label small fw-semibold">Quantity</label>
                                                        <input type="number" class="form-control purchase-quantity" min="1" value="1" onchange="updatePurchaseTotal(1)">
                                                    </div>
                                                    <div class="col-md-3 mb-2">
                                                        <label class="form-label small fw-semibold">Price (₹)</label>
                                                        <input type="number" class="form-control purchase-price" step="0.01" placeholder="0.00" onchange="updatePurchaseTotal(1)">
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <label class="form-label small fw-semibold">GST %</label>
                                                        <select class="form-select purchase-gst" onchange="updatePurchaseTotal(1)">
                                                            <option value="0">0% (No GST)</option>
                                                            <option value="5">5% GST</option>
                                                            <option value="12" selected>12% GST</option>
                                                            <option value="18">18% GST</option>
                                                            <option value="28">28% GST</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <label class="form-label small fw-semibold">Category</label>
                                                        <select class="form-select purchase-category">
                                                            <option value="Laptop">Laptop</option>
                                                            <option value="Mobile">Mobile</option>
                                                            <option value="Tablet">Tablet</option>
                                                            <option value="Accessories">Accessories</option>
                                                            <option value="Electronics">Electronics</option>
                                                            <option value="Others">Others</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12 mb-2">
                                                        <label class="form-label small fw-semibold">Product Total (₹)</label>
                                                        <input type="text" class="form-control purchase-total" value="0.00" readonly style="background-color: #f8f9fa; font-weight: bold; font-size: 1.1rem;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <button type="button" class="add-purchase-btn" onclick="addPurchaseRow()">
                                            <i class="fas fa-plus-circle"></i> Add Another Product
                                        </button>
                                    </div>
                                    
                                    <!-- Calculation Summary -->
                                    <div class="calculation-box">
                                        <h6 class="fw-bold mb-3">Purchase Calculation</h6>
                                        <div class="calculation-row">
                                            <span>Subtotal:</span>
                                            <span>₹<span id="purchase-subtotal">0.00</span></span>
                                        </div>
                                        <div class="calculation-row">
                                            <span>Total GST:</span>
                                            <span class="text-primary">₹<span id="purchase-tax">0.00</span></span>
                                        </div>
                                        <div class="calculation-row calculation-total">
                                            <span>Total Amount:</span>
                                            <span class="text-success fw-bold">₹<span id="purchase-final-amount">0.00</span></span>
                                        </div>
                                    </div>
                                    
                                    <!-- Payment Details -->
                                    <div class="row mb-4">
                                        <div class="col-md-6 mb-3">
                                            <label for="purchase-payment-status" class="form-label fw-semibold">Payment Status</label>
                                            <select class="form-select" id="purchase-payment-status" required onchange="updatePurchasePaymentFields()">
                                                <option value="paid">Paid</option>
                                                <option value="pending">Pending</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="purchase-paid-amount" class="form-label fw-semibold">Paid Amount (₹)</label>
                                            <input type="number" class="form-control" id="purchase-paid-amount" step="0.01" value="0" onchange="updatePurchasePendingAmount()">
                                        </div>
                                    </div>
                                    
                                    <!-- Pending Amount -->
                                    <div class="mb-3" id="purchase-pending-container" style="display: none;">
                                        <label class="form-label fw-semibold">Pending Amount</label>
                                        <div class="alert alert-warning">
                                            <h5 class="mb-0">₹<span id="purchase-pending-amount-display">0.00</span></h5>
                                        </div>
                                    </div>
                                    
                                    <!-- Purchase Date -->
                                    <div class="mb-4">
                                        <label for="purchase-date" class="form-label fw-semibold">Purchase Date</label>
                                        <input type="date" class="form-control" id="purchase-date" required>
                                    </div>
                                    
                                    <!-- Notes -->
                                    <div class="mb-4">
                                        <label for="purchase-notes" class="form-label fw-semibold">Notes (Optional)</label>
                                        <textarea class="form-control" id="purchase-notes" rows="2" placeholder="Any additional notes..."></textarea>
                                    </div>
                                    
                                    <!-- Submit Button -->
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-success btn-action">
                                            <i class="fas fa-check-circle me-2"></i>Complete Purchase
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <!-- All Purchases Table -->
                        <div class="col-lg-6">
                            <div class="glass-card p-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="fw-bold mb-0">Recent Purchases</h5>
                                    <button class="btn btn-success btn-action" onclick="showSection('purchase')">
                                        <i class="fas fa-plus me-2"></i>Add New Purchase
                                    </button>
                                </div>
                                <div class="table-responsive" style="max-height: 600px; overflow-y: auto;">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Supplier</th>
                                                <th>Products</th>
                                                <th>Total</th>
                                                <th>Paid</th>
                                                <th>Pending</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="all-purchases-table">
                                            <tr id="no-purchases">
                                                <td colspan="8" class="text-center text-muted py-4">
                                                    <i class="fas fa-shopping-bag fa-2x mb-3"></i><br>
                                                    No purchase records yet
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- NEW: Return Section -->
                <div id="return-section" style="display: none;" class="fade-in">
                    <h2 class="mb-4 fw-bold">Return Management</h2>
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="glass-card p-4">
                                <h5 class="fw-bold mb-3">Add New Return</h5>
                                <form id="return-form">
                                    <!-- Return Information -->
                                    <div class="row mb-4">
                                        <div class="col-md-6 mb-3">
                                            <label for="return-type" class="form-label fw-semibold">Return Type</label>
                                            <select class="form-select" id="return-type" required onchange="updateReturnForm()">
                                                <option value="sale">Sales Return</option>
                                                <option value="purchase">Purchase Return</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="return-customer-supplier" class="form-label fw-semibold" id="return-customer-supplier-label">Customer Name</label>
                                            <input type="text" class="form-control" id="return-customer-supplier" required placeholder="Enter name">
                                        </div>
                                    </div>
                                    
                                    <!-- Select Original Transaction -->
                                    <div class="mb-4">
                                        <label for="original-transaction" class="form-label fw-semibold">Select Original Transaction</label>
                                        <select class="form-select" id="original-transaction" required onchange="loadOriginalTransaction()">
                                            <option value="">Select a transaction</option>
                                        </select>
                                    </div>
                                    
                                    <!-- Product Input System -->
                                    <div class="return-input-system">
                                        <h6 class="fw-bold mb-3">Add Products to Return</h6>
                                        <div id="return-inputs-container">
                                            <!-- Return inputs will be added here dynamically -->
                                            <div class="return-input-row" id="return-row-1">
                                                <div class="product-input-header">
                                                    <div class="product-number">1</div>
                                                    <div class="remove-product" onclick="removeReturnRow(1)">
                                                        <i class="fas fa-times"></i>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-2">
                                                        <label class="form-label small fw-semibold">Product Name</label>
                                                        <input type="text" class="form-control return-name-input" placeholder="Select product from original transaction" readonly>
                                                    </div>
                                                    <div class="col-md-3 mb-2">
                                                        <label class="form-label small fw-semibold">Quantity</label>
                                                        <input type="number" class="form-control return-quantity" min="1" value="1" onchange="updateReturnTotal(1)">
                                                    </div>
                                                    <div class="col-md-3 mb-2">
                                                        <label class="form-label small fw-semibold">Price (₹)</label>
                                                        <input type="number" class="form-control return-price" step="0.01" placeholder="0.00" onchange="updateReturnTotal(1)">
                                                    </div>
                                                    <div class="col-md-12 mb-2">
                                                        <label class="form-label small fw-semibold">Return Reason</label>
                                                        <select class="form-select return-reason">
                                                            <option value="Damaged">Damaged Product</option>
                                                            <option value="Wrong Item">Wrong Item Delivered</option>
                                                            <option value="Defective">Defective Product</option>
                                                            <option value="Customer Change">Customer Changed Mind</option>
                                                            <option value="Other">Other</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12 mb-2">
                                                        <label class="form-label small fw-semibold">Product Total (₹)</label>
                                                        <input type="text" class="form-control return-total" value="0.00" readonly style="background-color: #f8f9fa; font-weight: bold; font-size: 1.1rem;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <button type="button" class="add-return-btn" onclick="addReturnRow()" id="add-return-btn" style="display: none;">
                                            <i class="fas fa-plus-circle"></i> Add Another Product
                                        </button>
                                    </div>
                                    
                                    <!-- Calculation Summary -->
                                    <div class="calculation-box">
                                        <h6 class="fw-bold mb-3">Return Calculation</h6>
                                        <div class="calculation-row">
                                            <span>Total Return Amount:</span>
                                            <span class="text-danger fw-bold">₹<span id="return-final-amount">0.00</span></span>
                                        </div>
                                    </div>
                                    
                                    <!-- Refund Details -->
                                    <div class="row mb-4">
                                        <div class="col-md-6 mb-3">
                                            <label for="refund-status" class="form-label fw-semibold">Refund Status</label>
                                            <select class="form-select" id="refund-status" required>
                                                <option value="refunded">Refunded</option>
                                                <option value="pending">Pending</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="refund-amount" class="form-label fw-semibold">Refund Amount (₹)</label>
                                            <input type="number" class="form-control" id="refund-amount" step="0.01" value="0">
                                        </div>
                                    </div>
                                    
                                    <!-- Return Date -->
                                    <div class="mb-4">
                                        <label for="return-date" class="form-label fw-semibold">Return Date</label>
                                        <input type="date" class="form-control" id="return-date" required>
                                    </div>
                                    
                                    <!-- Notes -->
                                    <div class="mb-4">
                                        <label for="return-notes" class="form-label fw-semibold">Notes (Optional)</label>
                                        <textarea class="form-control" id="return-notes" rows="2" placeholder="Any additional notes..."></textarea>
                                    </div>
                                    
                                    <!-- Submit Button -->
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-warning btn-action">
                                            <i class="fas fa-exchange-alt me-2"></i>Process Return
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <!-- All Returns Table -->
                        <div class="col-lg-6">
                            <div class="glass-card p-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="fw-bold mb-0">Recent Returns</h5>
                                    <button class="btn btn-warning btn-action" onclick="showSection('return')">
                                        <i class="fas fa-plus me-2"></i>Add New Return
                                    </button>
                                </div>
                                <div class="table-responsive" style="max-height: 600px; overflow-y: auto;">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Type</th>
                                                <th>Customer/Supplier</th>
                                                <th>Products</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="all-returns-table">
                                            <tr id="no-returns">
                                                <td colspan="7" class="text-center text-muted py-4">
                                                    <i class="fas fa-exchange-alt fa-2x mb-3"></i><br>
                                                    No return records yet
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Billing Section -->
                <div id="billing-section" style="display: none;" class="fade-in">
                    <h2 class="mb-4 fw-bold">Professional Billing</h2>
                    
                    <div class="row mb-4">
                        <div class="col-md-4 mb-3">
                            <div class="glass-card p-4">
                                <h5 class="fw-bold mb-3">Generate New Bill</h5>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary btn-action" onclick="generateBillFromForm()">
                                        <i class="fas fa-file-invoice me-2"></i>Generate from Sales Form
                                    </button>
                                    <button class="btn btn-success btn-action" onclick="selectSaleForBill()">
                                        <i class="fas fa-history me-2"></i>Generate from Existing Sale
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 mb-3">
                            <div class="glass-card p-4">
                                <h5 class="fw-bold mb-3">Quick Bill Generator</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Select Sale</label>
                                        <select class="form-select" id="quick-bill-select">
                                            <option value="">Select a sale to generate bill</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3 d-flex align-items-end">
                                        <button class="btn btn-primary btn-action w-100" onclick="generateQuickBill()">
                                            <i class="fas fa-print me-2"></i>Generate & Print Bill
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Bill Preview Area -->
                    <div id="bill-preview-area" style="display: none;">
                        <div class="glass-card p-4">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="fw-bold mb-0">Bill Preview</h5>
                                <div class="invoice-actions">
                                    <button class="btn btn-primary btn-action" onclick="printBill()">
                                        <i class="fas fa-print me-2"></i>Print Bill
                                    </button>
                                    <button class="btn btn-success btn-action" onclick="downloadBill()">
                                        <i class="fas fa-download me-2"></i>Download PDF
                                    </button>
                                    <button class="btn btn-outline-secondary btn-action" onclick="resetBillPreview()">
                                        <i class="fas fa-times me-2"></i>Close
                                    </button>
                                </div>
                            </div>
                            <div id="bill-content">
                                <!-- Bill will be rendered here -->
                            </div>
                        </div>
                    </div>
                    
                    <!-- Recent Bills -->
                    <div class="glass-card p-4 mt-4">
                        <h5 class="fw-bold mb-3">Recent Bills</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Bill No.</th>
                                        <th>Date</th>
                                        <th>Customer</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="recent-bills-table">
                                    <tr id="no-bills">
                                        <td colspan="6" class="text-center text-muted py-4">
                                            <i class="fas fa-file-invoice fa-2x mb-3"></i><br>
                                            No bills generated yet
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Pending Payments Section -->
                <div id="pending-section" style="display: none;" class="fade-in">
                    <h2 class="mb-4 fw-bold">Pending Payments</h2>
                    <div class="glass-card p-4">
                        <h5 class="fw-bold mb-3">Pending Payments List</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Customer/Supplier</th>
                                        <th>Total</th>
                                        <th>Paid</th>
                                        <th>Pending</th>
                                        <th>Days</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="pending-table">
                                    <tr id="no-pending">
                                        <td colspan="8" class="text-center text-muted py-4">
                                            <i class="fas fa-check-circle fa-2x mb-3 text-success"></i><br>
                                            No pending payments! All payments received.
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Warehouse Section -->
                <div id="warehouse-section" style="display: none;" class="fade-in">
                    <h2 class="mb-4 fw-bold">Warehouse Management</h2>
                    <div class="row">
                        <div class="col-lg-5 mb-4">
                            <div class="glass-card p-4">
                                <h5 class="fw-bold mb-3">Add Product to Warehouse</h5>
                                <form id="warehouse-form">
                                    <div class="mb-3">
                                        <label for="product-name-add" class="form-label fw-semibold">Product Name</label>
                                        <input type="text" class="form-control" id="product-name-add" required placeholder="Enter product name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="category" class="form-label fw-semibold">Category</label>
                                        <select class="form-select" id="category" required>
                                            <option value="Laptop">Laptop</option>
                                            <option value="Mobile">Mobile</option>
                                            <option value="Tablet">Tablet</option>
                                            <option value="Accessories">Accessories</option>
                                            <option value="Electronics">Electronics</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="quantity-add" class="form-label fw-semibold">Quantity</label>
                                            <input type="number" class="form-control" id="quantity-add" min="1" value="1" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="price-per-unit" class="form-label fw-semibold">Original Price/Unit (₹)</label>
                                            <input type="number" class="form-control" id="price-per-unit" step="0.01" required placeholder="0.00">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="gst-rate" class="form-label fw-semibold">GST Rate</label>
                                            <select class="form-select" id="gst-rate" required>
                                                <option value="0">0% (No GST)</option>
                                                <option value="5">5% GST</option>
                                                <option value="12" selected>12% GST</option>
                                                <option value="18">18% GST</option>
                                                <option value="28">28% GST</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="threshold" class="form-label fw-semibold">Low Stock Threshold</label>
                                            <input type="number" class="form-control" id="threshold" min="1" value="10" required>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-action w-100">
                                        <i class="fas fa-plus-circle me-2"></i>Add Product
                                    </button>
                                </form>
                                
                                <!-- Stock Adjustment Section -->
                                <div class="stock-adjustment-section mt-4">
                                    <h6 class="fw-bold mb-3">Quick Stock Adjustment</h6>
                                    <div class="input-group mb-3">
                                        <select class="form-select" id="adjust-product-select">
                                            <option value="">Select Product</option>
                                        </select>
                                        <input type="number" class="form-control" id="adjust-qty" placeholder="Qty" min="-999" max="999">
                                        <select class="form-select" id="adjust-action">
                                            <option value="add">Add Stock</option>
                                            <option value="remove">Remove Stock</option>
                                        </select>
                                        <button class="btn btn-warning" type="button" onclick="adjustStock()">
                                            <i class="fas fa-sync-alt"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <!-- Remove Specific Sale Section -->
                                <div class="mt-4 p-3 border rounded">
                                    <h6 class="fw-bold mb-3">Remove Specific Sale</h6>
                                    <div class="mb-3">
                                        <label class="form-label small fw-semibold">Search Customer</label>
                                        <input type="text" class="form-control" id="search-customer" placeholder="e.g., devang" onkeyup="searchCustomerSales()">
                                    </div>
                                    <div id="customer-sales-list" class="mb-3">
                                        <!-- Customer sales will be listed here -->
                                    </div>
                                    <button class="btn btn-danger w-100" onclick="removeSelectedSale()" id="remove-sale-btn" disabled>
                                        <i class="fas fa-trash me-2"></i>Remove Selected Sale
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Warehouse Products Table -->
                        <div class="col-lg-7">
                            <div class="glass-card p-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="fw-bold mb-0">Warehouse Inventory</h5>
                                    <div>
                                        <button class="btn btn-success btn-action me-2" onclick="exportWarehouseData()">
                                            <i class="fas fa-download me-2"></i>Export
                                        </button>
                                        <button class="btn btn-danger btn-action" onclick="deleteSelectedProducts()">
                                            <i class="fas fa-trash me-2"></i>Delete Selected
                                        </button>
                                    </div>
                                </div>
                                <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="width: 50px;">
                                                    <input type="checkbox" id="select-all">
                                                </th>
                                                <th>Product</th>
                                                <th>Category</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                                <th>GST</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="warehouse-table">
                                            <tr id="no-warehouse">
                                                <td colspan="7" class="text-center text-muted py-4">
                                                    <i class="fas fa-warehouse fa-2x mb-3"></i><br>
                                                    Warehouse is empty. Add your first product!
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Reports Section -->
                <div id="reports-section" style="display: none;" class="fade-in">
                    <h2 class="mb-4 fw-bold">Business Reports</h2>
                    <div class="row">
                        <div class="col-md-5 mb-4">
                            <div class="glass-card p-4">
                                <h5 class="fw-bold mb-3">Generate Report</h5>
                                <form id="report-form">
                                    <div class="mb-3">
                                        <label for="report-type" class="form-label fw-semibold">Report Type</label>
                                        <select class="form-select" id="report-type">
                                            <option value="daily">Daily Sales</option>
                                            <option value="purchase_daily">Daily Purchase</option>
                                            <option value="weekly">Weekly Sales</option>
                                            <option value="monthly">Monthly Sales</option>
                                            <option value="yearly">Yearly Sales</option>
                                            <option value="gst">GST Report</option>
                                            <option value="stock">Stock Report</option>
                                            <option value="profit_loss">Profit & Loss</option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="report-date" class="form-label fw-semibold">Select Date</label>
                                        <input type="date" class="form-control" id="report-date" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-action w-100">
                                        <i class="fas fa-chart-line me-2"></i>Generate Report
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-7 mb-4">
                            <div class="glass-card p-4 h-100">
                                <h5 class="fw-bold mb-3">Report Summary</h5>
                                <div id="report-summary" class="h-100 d-flex align-items-center justify-content-center">
                                    <div class="text-center text-muted">
                                        <i class="fas fa-file-chart-line fa-3x mb-3"></i><br>
                                        Generate a report to see summary here
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Report Results -->
                    <div class="glass-card p-4 mt-3">
                        <h5 class="fw-bold mb-3">Report Details</h5>
                        <div id="report-details">
                            <div class="text-center text-muted py-5">
                                <i class="fas fa-chart-pie fa-3x mb-3"></i><br>
                                No report generated yet.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Global variables
        let salesData = [];
        let purchaseData = [];
        let returnData = [];
        let warehouseData = [];
        let saveTimeout = null;
        let productRowCounter = 1;
        let purchaseRowCounter = 1;
        let returnRowCounter = 1;
        let billCounter = 1000; // Starting bill number
        
        // GST rates with descriptions
        const gstRates = [
            { rate: 0, label: "0% (No GST)" },
            { rate: 5, label: "5% GST" },
            { rate: 12, label: "12% GST" },
            { rate: 18, label: "18% GST" },
            { rate: 28, label: "28% GST" }
        ];
        
        // Sample warehouse data with GST rates
        const sampleProducts = [
            // Laptops (18% GST)
            { name: "HP Pavilion 15", category: "Laptop", quantity: 15, price: 64999, gst: 18 },
            { name: "Dell Inspiron 15", category: "Laptop", quantity: 14, price: 59999, gst: 18 },
            { name: "Lenovo IdeaPad 3", category: "Laptop", quantity: 20, price: 44999, gst: 18 },
            
            // Mobiles (18% GST)
            { name: "iPhone 15 Pro", category: "Mobile", quantity: 10, price: 134999, gst: 18 },
            { name: "Samsung Galaxy S24 Ultra", category: "Mobile", quantity: 12, price: 129999, gst: 18 },
            { name: "OnePlus 12", category: "Mobile", quantity: 15, price: 69999, gst: 18 },
            
            // Tablets (18% GST)
            { name: "iPad Pro 12.9", category: "Tablet", quantity: 6, price: 109999, gst: 18 },
            { name: "Samsung Galaxy Tab S9", category: "Tablet", quantity: 8, price: 94999, gst: 18 },
            
            // Accessories (12% GST)
            { name: "Sony WH-1000XM5", category: "Accessories", quantity: 25, price: 24999, gst: 12 },
            { name: "Apple AirPods Pro 2", category: "Accessories", quantity: 28, price: 24900, gst: 12 },
            { name: "Logitech MX Master 3S", category: "Accessories", quantity: 30, price: 8999, gst: 12 },
            
            // Electronics (28% GST)
            { name: "Canon EOS R6 Mark II", category: "Electronics", quantity: 6, price: 189999, gst: 28 },
            { name: "Sony Alpha 7 III", category: "Electronics", quantity: 8, price: 159999, gst: 28 },
            
            // Others (5% GST)
            { name: "HP DeskJet 2755", category: "Others", quantity: 25, price: 6999, gst: 5 },
            { name: "Epson EcoTank L3210", category: "Others", quantity: 18, price: 12999, gst: 5 },
            
            // Zero GST items
            { name: "Books", category: "Others", quantity: 100, price: 299, gst: 0 },
            { name: "School Supplies", category: "Others", quantity: 50, price: 199, gst: 0 }
        ];
        
        // Initialize the system
        document.addEventListener('DOMContentLoaded', function() {
            // Set today's date
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('sale-date').value = today;
            document.getElementById('purchase-date').value = today;
            document.getElementById('return-date').value = today;
            document.getElementById('report-date').value = today;
            
            // Load data
            loadFromLocalStorage();
            
            // Show dashboard
            showSection('dashboard');
            
            // Setup event listeners
            setupEventListeners();
            
            // Initialize
            updateSaleCalculation();
            updatePaymentFields();
            updatePurchaseCalculation();
            updatePurchasePaymentFields();
        });
        
        // Load data from localStorage
        function loadFromLocalStorage() {
            const savedSales = localStorage.getItem('proBizSalesData');
            if (savedSales) {
                salesData = JSON.parse(savedSales);
            } else {
                salesData = [];
            }
            
            const savedPurchases = localStorage.getItem('proBizPurchaseData');
            if (savedPurchases) {
                purchaseData = JSON.parse(savedPurchases);
            } else {
                purchaseData = [];
            }
            
            const savedReturns = localStorage.getItem('proBizReturnData');
            if (savedReturns) {
                returnData = JSON.parse(savedReturns);
            } else {
                returnData = [];
            }
            
            const savedWarehouse = localStorage.getItem('proBizWarehouseData');
            if (savedWarehouse) {
                warehouseData = JSON.parse(savedWarehouse);
            } else {
                warehouseData = [];
                addSampleProducts();
            }
            
            // Load bill counter
            const savedBillCounter = localStorage.getItem('proBizBillCounter');
            if (savedBillCounter) {
                billCounter = parseInt(savedBillCounter);
            }
            
            updateDashboard();
        }
        
        // Add sample products
        function addSampleProducts() {
            sampleProducts.forEach(product => {
                const sellingPriceWithGST = product.price * (1 + product.gst / 100);
                
                const newProduct = {
                    id: warehouseData.length + 1,
                    productName: product.name,
                    category: product.category,
                    quantity: product.quantity,
                    originalPrice: product.price,
                    gstRate: product.gst,
                    sellingPrice: sellingPriceWithGST,
                    threshold: 5
                };
                
                warehouseData.push(newProduct);
            });
            
            autoSave();
        }
        
        // Auto-save data
        function autoSave() {
            localStorage.setItem('proBizSalesData', JSON.stringify(salesData));
            localStorage.setItem('proBizPurchaseData', JSON.stringify(purchaseData));
            localStorage.setItem('proBizReturnData', JSON.stringify(returnData));
            localStorage.setItem('proBizWarehouseData', JSON.stringify(warehouseData));
            localStorage.setItem('proBizBillCounter', billCounter.toString());
            
            const indicator = document.getElementById('autoSaveIndicator');
            indicator.classList.add('show');
            
            setTimeout(() => {
                indicator.classList.remove('show');
            }, 2000);
        }
        
        // Setup event listeners
        function setupEventListeners() {
            // Sales form submission
            document.getElementById('sales-form').addEventListener('submit', function(e) {
                e.preventDefault();
                addSale();
            });
            
            // Purchase form submission
            document.getElementById('purchase-form').addEventListener('submit', function(e) {
                e.preventDefault();
                addPurchase();
            });
            
            // Return form submission
            document.getElementById('return-form').addEventListener('submit', function(e) {
                e.preventDefault();
                addReturn();
            });
            
            // Warehouse form submission
            document.getElementById('warehouse-form').addEventListener('submit', function(e) {
                e.preventDefault();
                addProductToWarehouse();
            });
            
            // Report form submission
            document.getElementById('report-form').addEventListener('submit', function(e) {
                e.preventDefault();
                generateReport();
            });
            
            // Select all checkbox
            document.getElementById('select-all').addEventListener('change', function() {
                const checkboxes = document.querySelectorAll('#warehouse-table input[type="checkbox"]');
                checkboxes.forEach(checkbox => {
                    if (checkbox.id !== 'select-all') {
                        checkbox.checked = this.checked;
                    }
                });
            });
            
            // GST rate change in warehouse
            document.getElementById('gst-rate').addEventListener('change', updateWarehouseSellingPrice);
            document.getElementById('price-per-unit').addEventListener('input', updateWarehouseSellingPrice);
            
            // Return type change
            document.getElementById('return-type').addEventListener('change', updateReturnForm);
            
            // Auto-save
            document.querySelectorAll('input, select, textarea').forEach(element => {
                element.addEventListener('input', function() {
                    if (saveTimeout) clearTimeout(saveTimeout);
                    saveTimeout = setTimeout(autoSave, 1000);
                });
            });
        }
        
        // Show section
        function showSection(sectionId) {
            // Hide all sections
            ['dashboard', 'sales', 'purchase', 'return', 'billing', 'pending', 'warehouse', 'reports'].forEach(id => {
                const section = document.getElementById(`${id}-section`);
                if (section) section.style.display = 'none';
            });
            
            // Show selected section
            const selectedSection = document.getElementById(`${sectionId}-section`);
            if (selectedSection) {
                selectedSection.style.display = 'block';
                selectedSection.classList.add('animate__animated', 'animate__fadeIn');
                
                setTimeout(() => {
                    selectedSection.classList.remove('animate__animated', 'animate__fadeIn');
                }, 500);
            }
            
            // Update sidebar
            document.querySelectorAll('.sidebar a').forEach(link => {
                link.classList.remove('active');
            });
            
            const activeLink = Array.from(document.querySelectorAll('.sidebar a')).find(link => 
                link.getAttribute('onclick')?.includes(sectionId)
            );
            
            if (activeLink) {
                activeLink.classList.add('active');
            }
            
            // Refresh data
            if (sectionId === 'dashboard') {
                updateDashboard();
            } else if (sectionId === 'sales') {
                loadSalesData();
            } else if (sectionId === 'purchase') {
                loadPurchaseData();
            } else if (sectionId === 'return') {
                loadReturnData();
                updateReturnForm();
            } else if (sectionId === 'billing') {
                loadBillingData();
            } else if (sectionId === 'pending') {
                loadPendingPayments();
            } else if (sectionId === 'warehouse') {
                loadWarehouseData();
            }
        }
        
        // Update dashboard with all metrics
        function updateDashboard() {
            // Calculate totals
            const totalSales = salesData.reduce((sum, sale) => sum + sale.finalAmount, 0);
            const totalPurchase = purchaseData.reduce((sum, purchase) => sum + purchase.finalAmount, 0);
            const totalReturn = returnData.reduce((sum, ret) => sum + ret.finalAmount, 0);
            
            // Pending amounts from sales and purchases
            const salesPending = salesData.reduce((sum, sale) => sum + sale.pendingAmount, 0);
            const purchasePending = purchaseData.reduce((sum, purchase) => sum + purchase.pendingAmount, 0);
            const totalPending = salesPending + purchasePending;
            
            const warehouseCount = warehouseData.length;
            
            // Today's sales and purchases
            const today = new Date().toISOString().split('T')[0];
            const todaySales = salesData
                .filter(sale => sale.date === today)
                .reduce((sum, sale) => sum + sale.finalAmount, 0);
            
            const todayPurchase = purchaseData
                .filter(purchase => purchase.date === today)
                .reduce((sum, purchase) => sum + purchase.finalAmount, 0);
            
            // Calculate net profit/loss
            const netProfitLoss = totalSales - totalPurchase - totalReturn;
            
            // Update counters
            animateCounter('total-sales', totalSales, '₹');
            animateCounter('total-purchase', totalPurchase, '₹');
            animateCounter('pending-amount', totalPending, '₹');
            animateCounter('warehouse-count', warehouseCount, '');
            animateCounter('total-return', totalReturn, '₹');
            animateCounter('today-sales', todaySales, '₹');
            animateCounter('today-purchase', todayPurchase, '₹');
            animateCounter('profit-loss', netProfitLoss, '₹');
            
            // Update recent transactions
            updateRecentTransactions();
            updateCharts();
        }
        
        // Update recent transactions table
        function updateRecentTransactions() {
            const tableBody = document.getElementById('recent-transactions-table');
            
            // Remove no transactions message
            const noTransactionsRow = document.getElementById('no-recent-transactions');
            if (noTransactionsRow) noTransactionsRow.remove();
            
            // Combine sales, purchases, and returns
            let allTransactions = [];
            
            // Add sales
            salesData.slice(-5).reverse().forEach(sale => {
                allTransactions.push({
                    type: 'Sale',
                    color: 'primary',
                    badge: 'status-received',
                    date: sale.date,
                    customer: sale.customerName,
                    products: sale.products.map(p => p.name).join(', '),
                    amount: sale.finalAmount,
                    status: sale.paymentStatus === 'received' ? 'Paid' : 'Pending',
                    id: sale.id
                });
            });
            
            // Add purchases
            purchaseData.slice(-5).reverse().forEach(purchase => {
                allTransactions.push({
                    type: 'Purchase',
                    color: 'success',
                    badge: 'status-purchase',
                    date: purchase.date,
                    customer: purchase.supplierName,
                    products: purchase.products.map(p => p.name).join(', '),
                    amount: purchase.finalAmount,
                    status: purchase.paymentStatus === 'paid' ? 'Paid' : 'Pending',
                    id: purchase.id
                });
            });
            
            // Add returns
            returnData.slice(-5).reverse().forEach(ret => {
                allTransactions.push({
                    type: 'Return',
                    color: 'warning',
                    badge: 'status-return',
                    date: ret.date,
                    customer: ret.customerSupplier,
                    products: ret.products.map(p => p.name).join(', '),
                    amount: ret.finalAmount,
                    status: ret.refundStatus === 'refunded' ? 'Refunded' : 'Pending',
                    id: ret.id
                });
            });
            
            // Sort by date (newest first)
            allTransactions.sort((a, b) => new Date(b.date) - new Date(a.date));
            
            // Take only last 5
            allTransactions = allTransactions.slice(0, 5);
            
            if (allTransactions.length === 0) {
                tableBody.innerHTML = `
                    <tr id="no-recent-transactions">
                        <td colspan="7" class="text-center text-muted py-4">
                            <i class="fas fa-exchange-alt fa-2x mb-3"></i><br>
                            No transactions yet. Add your first transaction!
                        </td>
                    </tr>
                `;
                return;
            }
            
            tableBody.innerHTML = '';
            
            allTransactions.forEach(transaction => {
                const row = document.createElement('tr');
                row.classList.add('animate__animated', 'animate__fadeIn');
                row.innerHTML = `
                    <td>${transaction.date}</td>
                    <td>
                        <span class="status-badge ${transaction.badge}">
                            ${transaction.type}
                        </span>
                    </td>
                    <td>${transaction.customer}</td>
                    <td title="${transaction.products}">${transaction.products.substring(0, 25)}${transaction.products.length > 25 ? '...' : ''}</td>
                    <td>₹${transaction.amount.toLocaleString()}</td>
                    <td>
                        <span class="status-badge ${transaction.status === 'Paid' || transaction.status === 'Refunded' ? 'status-received' : 'status-pending'}">
                            ${transaction.status}
                        </span>
                    </td>
                    <td>
                        ${transaction.type === 'Sale' ? 
                            `<button class="btn btn-sm btn-primary" onclick="generateBillFromSale(${transaction.id})">
                                <i class="fas fa-file-invoice"></i>
                            </button>` : 
                        transaction.type === 'Purchase' ?
                            `<button class="btn btn-sm btn-success" onclick="viewPurchase(${transaction.id})">
                                <i class="fas fa-eye"></i>
                            </button>` :
                            `<button class="btn btn-sm btn-warning" onclick="viewReturn(${transaction.id})">
                                <i class="fas fa-eye"></i>
                            </button>`
                        }
                    </td>
                `;
                tableBody.appendChild(row);
            });
        }
        
        // Load billing data
        function loadBillingData() {
            // Populate quick bill select
            const quickBillSelect = document.getElementById('quick-bill-select');
            quickBillSelect.innerHTML = '<option value="">Select a sale to generate bill</option>';
            
            salesData.forEach((sale, index) => {
                const option = document.createElement('option');
                option.value = index;
                option.textContent = `Bill #${sale.id || index + 1} - ${sale.customerName} - ₹${sale.finalAmount.toLocaleString()} - ${sale.date}`;
                quickBillSelect.appendChild(option);
            });
            
            // Load recent bills table
            loadRecentBills();
        }
        
        // Load recent bills
        function loadRecentBills() {
            const tableBody = document.getElementById('recent-bills-table');
            
            // Remove no bills message
            const noBillsRow = document.getElementById('no-bills');
            if (noBillsRow) noBillsRow.remove();
            
            if (salesData.length === 0) {
                tableBody.innerHTML = `
                    <tr id="no-bills">
                        <td colspan="6" class="text-center text-muted py-4">
                            <i class="fas fa-file-invoice fa-2x mb-3"></i><br>
                            No bills generated yet
                        </td>
                    </tr>
                `;
                return;
            }
            
            // Get recent sales (last 10)
            const recentSales = [...salesData].reverse().slice(0, 10);
            tableBody.innerHTML = '';
            
            recentSales.forEach(sale => {
                const row = document.createElement('tr');
                row.classList.add('animate__animated', 'animate__fadeIn');
                row.innerHTML = `
                    <td>${sale.billNumber || 'PRO-' + (sale.id || '1')}</td>
                    <td>${sale.date}</td>
                    <td>${sale.customerName}</td>
                    <td>₹${sale.finalAmount.toLocaleString()}</td>
                    <td>
                        <span class="status-badge ${sale.paymentStatus === 'received' ? 'status-received' : 'status-pending'}">
                            ${sale.paymentStatus === 'received' ? 'Paid' : sale.pendingAmount > 0 ? 'Partial' : 'Pending'}
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-primary" onclick="generateBillFromSale(${sale.id || 1})">
                            <i class="fas fa-print me-1"></i>Print
                        </button>
                        <button class="btn btn-sm btn-success" onclick="viewBill(${sale.id || 1})">
                            <i class="fas fa-eye me-1"></i>View
                        </button>
                    </td>
                `;
                tableBody.appendChild(row);
            });
        }
        
        // Generate bill from current form (without saving)
        function generateBillFromCurrentForm() {
            // Get form data
            const customerName = document.getElementById('customer-name').value.trim();
            const customerPhone = document.getElementById('customer-phone').value.trim();
            const saleDate = document.getElementById('sale-date').value;
            const finalAmount = parseFloat(document.getElementById('sale-final-amount').textContent) || 0;
            
            if (!customerName || !customerPhone) {
                showNotification('Please enter customer details', 'warning');
                return;
            }
            
            if (finalAmount <= 0) {
                showNotification('Please add at least one product', 'warning');
                return;
            }
            
            // Collect products from form
            const products = [];
            document.querySelectorAll('.product-input-row').forEach(row => {
                const name = row.querySelector('.product-name-input').value.trim();
                const quantity = parseFloat(row.querySelector('.product-quantity').value) || 0;
                const price = parseFloat(row.querySelector('.product-price').value) || 0;
                const discountPercent = parseFloat(row.querySelector('.product-discount').value) || 0;
                const discountAmount = parseFloat(row.querySelector('.product-discount-amount').value) || 0;
                const gstRate = parseFloat(row.querySelector('.product-gst').value) || 0;
                
                if (name && quantity > 0 && price > 0) {
                    const subtotal = quantity * price;
                    let discount = 0;
                    if (discountPercent > 0) discount = subtotal * discountPercent / 100;
                    if (discountAmount > 0) discount = discountAmount;
                    
                    const taxableValue = subtotal - discount;
                    const gstAmount = taxableValue * (gstRate / 100);
                    const total = taxableValue + gstAmount;
                    
                    products.push({
                        name,
                        quantity,
                        price,
                        discountPercent,
                        discountAmount,
                        gstRate,
                        taxableValue,
                        gstAmount,
                        total
                    });
                }
            });
            
            if (products.length === 0) {
                showNotification('No valid products found', 'warning');
                return;
            }
            
            // Create temporary sale object for bill
            const tempSale = {
                id: 0,
                billNumber: `TEMP-${Date.now()}`,
                date: saleDate,
                customerName,
                customerPhone,
                products: products,
                subtotal: parseFloat(document.getElementById('sale-subtotal').textContent),
                totalDiscount: parseFloat(document.getElementById('sale-total-discount').textContent),
                totalGST: parseFloat(document.getElementById('sale-tax').textContent),
                finalAmount,
                paymentStatus: document.getElementById('payment-status').value,
                paidAmount: parseFloat(document.getElementById('paid-amount').value) || 0,
                pendingAmount: finalAmount - (parseFloat(document.getElementById('paid-amount').value) || 0),
                timestamp: new Date().toISOString()
            };
            
            // Generate bill
            generateBill(tempSale);
            showNotification('Bill generated from current form!', 'success');
        }
        
        // Generate bill from existing sale
        function generateBillFromSale(saleId) {
            const sale = salesData.find(s => s.id === saleId);
            if (!sale) {
                showNotification('Sale not found', 'error');
                return;
            }
            
            // Generate bill number if not exists
            if (!sale.billNumber) {
                billCounter++;
                sale.billNumber = `PRO-${billCounter}`;
                autoSave();
            }
            
            generateBill(sale);
            showNotification(`Bill #${sale.billNumber} generated!`, 'success');
        }
        
        // Generate quick bill
        function generateQuickBill() {
            const select = document.getElementById('quick-bill-select');
            const saleIndex = parseInt(select.value);
            
            if (isNaN(saleIndex) || saleIndex < 0 || saleIndex >= salesData.length) {
                showNotification('Please select a valid sale', 'warning');
                return;
            }
            
            const sale = salesData[saleIndex];
            if (!sale) {
                showNotification('Sale not found', 'error');
                return;
            }
            
            // Generate bill number if not exists
            if (!sale.billNumber) {
                billCounter++;
                sale.billNumber = `PRO-${billCounter}`;
                autoSave();
            }
            
            generateBill(sale);
            showNotification(`Bill #${sale.billNumber} generated!`, 'success');
        }
        
        // Select sale for bill
        function selectSaleForBill() {
            showSection('sales');
            setTimeout(() => {
                document.getElementById('sales-form').scrollIntoView({ behavior: 'smooth' });
            }, 100);
        }
        
        // Generate bill from form
        function generateBillFromForm() {
            showSection('sales');
        }
        
        // Generate professional bill
        function generateBill(sale) {
            // Show bill preview area
            document.getElementById('bill-preview-area').style.display = 'block';
            
            // Calculate GST breakdown
            const gstBreakdown = {};
            sale.products.forEach(product => {
                const rate = product.gstRate || 0;
                if (rate > 0) {
                    if (!gstBreakdown[rate]) {
                        gstBreakdown[rate] = {
                            taxableValue: 0,
                            gstAmount: 0
                        };
                    }
                    gstBreakdown[rate].taxableValue += (product.taxableValue || 0);
                    gstBreakdown[rate].gstAmount += (product.gstAmount || 0);
                }
            });
            
            // Format date
            const billDate = new Date(sale.date);
            const formattedDate = billDate.toLocaleDateString('en-IN', {
                day: '2-digit',
                month: 'short',
                year: 'numeric'
            });
            
            // Generate bill HTML
            const billHTML = `
                <div class="invoice-container">
                    <!-- Watermark -->
                    <div class="watermark print-only">SAMPLE</div>
                    
                    <!-- Header -->
                    <div class="invoice-header">
                        <div class="d-flex justify-content-between align-items-start mb-4">
                            <div>
                                <div class="invoice-logo">ProBiz</div>
                                <div class="text-muted">Business Management System</div>
                            </div>
                            <div class="text-end">
                                <h5 class="invoice-title">TAX INVOICE</h5>
                                <div class="invoice-subtitle">GSTIN: 27ABCDE1234F1Z5</div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-from">
                                    <h6>BILL FROM</h6>
                                    <div class="fw-bold">ProBiz Solutions</div>
                                    <div>123 Business Street</div>
                                    <div>Mumbai, Maharashtra 400001</div>
                                    <div>Phone: +91 9876543210</div>
                                    <div>Email: info@probiz.com</div>
                                    <div>GSTIN: 27ABCDE1234F1Z5</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="invoice-to">
                                    <h6>BILL TO</h6>
                                    <div class="fw-bold">${sale.customerName}</div>
                                    <div>Phone: ${sale.customerPhone}</div>
                                    <div>Date: ${formattedDate}</div>
                                    <div>Invoice No: ${sale.billNumber || 'PRO-' + sale.id}</div>
                                    <div>Status: ${sale.paymentStatus === 'received' ? 'Paid' : 'Pending'}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Products Table -->
                    <table class="invoice-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Description</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>GST %</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${sale.products.map((product, index) => {
                                const discount = product.discountAmount > 0 ? 
                                    `₹${product.discountAmount.toFixed(2)}` : 
                                    `${product.discountPercent}%`;
                                
                                return `
                                    <tr>
                                        <td>${index + 1}</td>
                                        <td>
                                            <div class="fw-semibold">${product.name}</div>
                                            ${product.gstRate > 0 ? `<small class="text-muted">GST: ${product.gstRate}%</small>` : ''}
                                        </td>
                                        <td>${product.quantity}</td>
                                        <td>₹${product.price.toFixed(2)}</td>
                                        <td>${discount}</td>
                                        <td>${product.gstRate}%</td>
                                        <td>₹${product.total.toFixed(2)}</td>
                                    </tr>
                                `;
                            }).join('')}
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6" class="text-end fw-bold">Subtotal:</td>
                                <td class="fw-bold">₹${sale.subtotal.toFixed(2)}</td>
                            </tr>
                            <tr>
                                <td colspan="6" class="text-end fw-bold text-danger">Discount:</td>
                                <td class="fw-bold text-danger">-₹${sale.totalDiscount.toFixed(2)}</td>
                            </tr>
                            ${Object.keys(gstBreakdown).map(rate => {
                                const gst = gstBreakdown[rate];
                                return `
                                    <tr>
                                        <td colspan="6" class="text-end fw-bold text-primary">${rate}% GST:</td>
                                        <td class="fw-bold text-primary">₹${gst.gstAmount.toFixed(2)}</td>
                                    </tr>
                                `;
                            }).join('')}
                            <tr>
                                <td colspan="6" class="text-end fw-bold fs-5">Total Amount:</td>
                                <td class="fw-bold fs-5 text-success">₹${sale.finalAmount.toFixed(2)}</td>
                            </tr>
                        </tfoot>
                    </table>
                    
                    <!-- Payment Summary -->
                    <div class="invoice-summary">
                        <div class="invoice-totals">
                            <h6 class="fw-bold mb-3">Payment Summary</h6>
                            <div class="row">
                                <span>Total Amount:</span>
                                <span class="fw-bold">₹${sale.finalAmount.toFixed(2)}</span>
                            </div>
                            <div class="row">
                                <span>Amount Paid:</span>
                                <span class="fw-bold text-success">₹${sale.paidAmount.toFixed(2)}</span>
                            </div>
                            ${sale.pendingAmount > 0 ? `
                                <div class="row">
                                    <span>Balance Due:</span>
                                    <span class="fw-bold text-warning">₹${sale.pendingAmount.toFixed(2)}</span>
                                </div>
                            ` : ''}
                            <div class="row total">
                                <span>Payment Status:</span>
                                <span class="fw-bold ${sale.paymentStatus === 'received' ? 'text-success' : 'text-warning'}">
                                    ${sale.paymentStatus === 'received' ? 'FULLY PAID' : 'PENDING'}
                                </span>
                            </div>
                        </div>
                        
                        <div>
                            <h6 class="fw-bold mb-3">GST Summary</h6>
                            ${Object.keys(gstBreakdown).map(rate => {
                                const gst = gstBreakdown[rate];
                                return `
                                    <div class="mb-2">
                                        <div class="d-flex justify-content-between">
                                            <span>${rate}% GST on:</span>
                                            <span>₹${gst.taxableValue.toFixed(2)}</span>
                                        </div>
                                        <div class="d-flex justify-content-between text-primary">
                                            <span>GST Amount:</span>
                                            <span>₹${gst.gstAmount.toFixed(2)}</span>
                                        </div>
                                    </div>
                                `;
                            }).join('')}
                            ${Object.keys(gstBreakdown).length === 0 ? '<div class="text-muted">No GST Applicable</div>' : ''}
                        </div>
                    </div>
                    
                    <!-- Footer -->
                    <div class="invoice-footer">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="fw-bold">Customer Signature</div>
                                <div class="text-muted small mt-3" style="border-top: 1px solid #dee2e6; padding-top: 10px;"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="fw-bold">For ProBiz Solutions</div>
                                <div class="text-muted small mt-3" style="border-top: 1px solid #dee2e6; padding-top: 10px;"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="fw-bold">Terms & Conditions</div>
                                <div class="text-muted small mt-2">
                                    1. Goods once sold will not be taken back<br>
                                    2. Subject to Mumbai Jurisdiction<br>
                                    3. Payment due within 15 days
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <div class="text-center text-muted small">
                                This is a computer generated invoice. No signature required.
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            // Render bill
            document.getElementById('bill-content').innerHTML = billHTML;
            
            // Scroll to bill
            setTimeout(() => {
                document.getElementById('bill-preview-area').scrollIntoView({ behavior: 'smooth' });
            }, 100);
        }
        
        // Print bill
        function printBill() {
            window.print();
        }
        
        // Download bill as PDF (simulated)
        function downloadBill() {
            showNotification('PDF download feature requires backend integration', 'info');
            // In a real application, this would generate a PDF using a library like jsPDF
            // For now, we'll just print
            printBill();
        }
        
        // View bill
        function viewBill(saleId) {
            showSection('billing');
            const sale = salesData.find(s => s.id === saleId);
            if (sale) {
                generateBill(sale);
            }
        }
        
        // Reset bill preview
        function resetBillPreview() {
            document.getElementById('bill-preview-area').style.display = 'none';
            document.getElementById('bill-content').innerHTML = '';
        }
        
        // Animate counter
        function animateCounter(elementId, targetValue, prefix = '') {
            const element = document.getElementById(elementId);
            if (!element) return;
            
            const currentValue = parseFloat(element.textContent.replace(/[^0-9.]/g, '')) || 0;
            const duration = 1000;
            const frameRate = 60;
            const totalFrames = Math.round(duration / (1000 / frameRate));
            const increment = (targetValue - currentValue) / totalFrames;
            
            let currentFrame = 0;
            let currentDisplayValue = currentValue;
            
            const animate = () => {
                currentFrame++;
                currentDisplayValue += increment;
                
                if (currentFrame >= totalFrames) {
                    currentDisplayValue = targetValue;
                }
                
                let displayText;
                if (prefix === '₹') {
                    displayText = prefix + Math.round(currentDisplayValue).toLocaleString();
                } else {
                    displayText = Math.round(currentDisplayValue).toLocaleString();
                }
                
                element.textContent = displayText;
                
                if (currentFrame < totalFrames) {
                    requestAnimationFrame(animate);
                }
            };
            
            animate();
        }
        
        // Load sales data for table
        function loadSalesData() {
            const tableBody = document.getElementById('all-sales-table');
            
            // Remove no sales message
            const noSalesRow = document.getElementById('no-sales');
            if (noSalesRow) noSalesRow.remove();
            
            if (salesData.length === 0) {
                tableBody.innerHTML = `
                    <tr id="no-sales">
                        <td colspan="8" class="text-center text-muted py-4">
                            <i class="fas fa-receipt fa-2x mb-3"></i><br>
                            No sales records yet
                        </td>
                    </tr>
                `;
                return;
            }
            
            const displaySales = [...salesData].reverse().slice(0, 10);
            tableBody.innerHTML = '';
            
            displaySales.forEach(sale => {
                const productNames = sale.products.map(p => 
                    `${p.name} (${p.quantity}x)`
                ).join(', ');
                
                const row = document.createElement('tr');
                row.classList.add('animate__animated', 'animate__fadeIn');
                row.innerHTML = `
                    <td>${sale.date}</td>
                    <td>${sale.customerName}</td>
                    <td title="${productNames}">${productNames.substring(0, 25)}${productNames.length > 25 ? '...' : ''}</td>
                    <td>₹${sale.finalAmount.toLocaleString()}</td>
                    <td>₹${sale.paidAmount.toLocaleString()}</td>
                    <td>₹${sale.pendingAmount.toLocaleString()}</td>
                    <td>
                        <span class="status-badge ${sale.paymentStatus === 'received' ? 'status-received' : 'status-pending'}">
                            ${sale.paymentStatus === 'received' ? 'Paid' : sale.pendingAmount > 0 ? 'Partial' : 'Pending'}
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-primary" onclick="generateBillFromSale(${sale.id})">
                            <i class="fas fa-file-invoice"></i>
                        </button>
                        <button class="btn btn-sm btn-danger" onclick="deleteSale(${sale.id})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                `;
                tableBody.appendChild(row);
            });
        }
        
        // Add product row in sales
        function addProductRow() {
            productRowCounter++;
            const container = document.getElementById('product-inputs-container');
            
            const newRow = document.createElement('div');
            newRow.className = 'product-input-row';
            newRow.id = `product-row-${productRowCounter}`;
            newRow.innerHTML = `
                <div class="product-input-header">
                    <div class="product-number">${productRowCounter}</div>
                    <div class="remove-product" onclick="removeProductRow(${productRowCounter})">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label class="form-label small fw-semibold">Product Name</label>
                        <input type="text" class="form-control product-name-input" placeholder="Enter product name" oninput="searchProducts(${productRowCounter})">
                        <div class="product-suggestions" id="suggestions-${productRowCounter}" style="display: none;"></div>
                    </div>
                    <div class="col-md-3 mb-2">
                        <label class="form-label small fw-semibold">Quantity</label>
                        <input type="number" class="form-control product-quantity" min="1" value="1" onchange="updateProductTotal(${productRowCounter})">
                    </div>
                    <div class="col-md-3 mb-2">
                        <label class="form-label small fw-semibold">Price (₹)</label>
                        <input type="number" class="form-control product-price" step="0.01" placeholder="0.00" onchange="updateProductTotal(${productRowCounter})">
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="form-label small fw-semibold">Discount %</label>
                        <input type="number" class="form-control product-discount" min="0" max="100" value="0" step="1" onchange="updateProductTotal(${productRowCounter})">
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="form-label small fw-semibold">Discount ₹</label>
                        <input type="number" class="form-control product-discount-amount" min="0" step="0.01" value="0" onchange="updateProductTotal(${productRowCounter})">
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="form-label small fw-semibold">GST %</label>
                        <select class="form-select product-gst" onchange="updateProductTotal(${productRowCounter})">
                            <option value="0">0% (No GST)</option>
                            <option value="5">5% GST</option>
                            <option value="12" selected>12% GST</option>
                            <option value="18">18% GST</option>
                            <option value="28">28% GST</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label small fw-semibold">Product Total (₹)</label>
                        <input type="text" class="form-control product-total" value="0.00" readonly style="background-color: #f8f9fa; font-weight: bold; font-size: 1.1rem;">
                    </div>
                </div>
            `;
            
            container.appendChild(newRow);
        }
        
        // Remove product row
        function removeProductRow(rowId) {
            const row = document.getElementById(`product-row-${rowId}`);
            if (row) {
                if (document.querySelectorAll('.product-input-row').length > 1) {
                    row.remove();
                    updateProductNumbers();
                    updateSaleCalculation();
                } else {
                    showNotification('At least one product is required', 'warning');
                }
            }
        }
        
        // Update product numbers after removal
        function updateProductNumbers() {
            const rows = document.querySelectorAll('.product-input-row');
            rows.forEach((row, index) => {
                const numberDiv = row.querySelector('.product-number');
                if (numberDiv) {
                    numberDiv.textContent = index + 1;
                }
                // Update row ID
                const newId = index + 1;
                row.id = `product-row-${newId}`;
                
                // Update event listeners
                const removeBtn = row.querySelector('.remove-product');
                if (removeBtn) {
                    removeBtn.setAttribute('onclick', `removeProductRow(${newId})`);
                }
                
                // Update input IDs and event listeners
                const inputs = row.querySelectorAll('input');
                inputs.forEach(input => {
                    if (input.classList.contains('product-name-input')) {
                        input.setAttribute('oninput', `searchProducts(${newId})`);
                    } else if (input.classList.contains('product-quantity') || 
                               input.classList.contains('product-price') || 
                               input.classList.contains('product-discount') || 
                               input.classList.contains('product-discount-amount')) {
                        input.setAttribute('onchange', `updateProductTotal(${newId})`);
                    }
                });
                
                // Update suggestions div ID
                const suggestionsDiv = row.querySelector('.product-suggestions');
                if (suggestionsDiv) {
                    suggestionsDiv.id = `suggestions-${newId}`;
                }
            });
            
            productRowCounter = rows.length;
        }
        
        // Search products for suggestions
        function searchProducts(rowId) {
            const input = document.querySelector(`#product-row-${rowId} .product-name-input`);
            const suggestionsDiv = document.getElementById(`suggestions-${rowId}`);
            
            if (!input || !suggestionsDiv) return;
            
            const searchTerm = input.value.toLowerCase();
            
            if (searchTerm.length < 2) {
                suggestionsDiv.style.display = 'none';
                return;
            }
            
            // Filter warehouse products
            const matches = warehouseData.filter(product => 
                product.productName.toLowerCase().includes(searchTerm)
            ).slice(0, 5); // Show only top 5 matches
            
            if (matches.length > 0) {
                let html = '<div class="list-group">';
                matches.forEach(product => {
                    const sellingPrice = product.sellingPrice || product.originalPrice;
                    // Get stock status
                    let stockStatus = '';
                    let stockClass = '';
                    if (product.quantity <= 0) {
                        stockStatus = 'Out of Stock';
                        stockClass = 'stock-out';
                    } else if (product.quantity <= product.threshold) {
                        stockStatus = 'Low Stock';
                        stockClass = 'stock-low';
                    } else {
                        stockStatus = 'In Stock';
                        stockClass = 'stock-high';
                    }
                    
                    html += `
                        <a href="javascript:void(0)" class="list-group-item list-group-item-action" 
                           onclick="selectProduct(${rowId}, '${product.productName}', ${sellingPrice}, ${product.gstRate})">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong>${product.productName}</strong>
                                    <div class="small text-muted">${product.category} | 
                                        Available: ${product.quantity} | 
                                        <span class="${stockClass}">${stockStatus}</span>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <div>₹${sellingPrice.toLocaleString()}</div>
                                    <div class="small text-primary">${product.gstRate}% GST</div>
                                </div>
                            </div>
                        </a>
                    `;
                });
                html += '</div>';
                
                suggestionsDiv.innerHTML = html;
                suggestionsDiv.style.display = 'block';
                
                // Close suggestions when clicking elsewhere
                document.addEventListener('click', function closeSuggestions(e) {
                    if (!suggestionsDiv.contains(e.target) && e.target !== input) {
                        suggestionsDiv.style.display = 'none';
                        document.removeEventListener('click', closeSuggestions);
                    }
                });
            } else {
                suggestionsDiv.style.display = 'none';
            }
        }
        
        // Select product from suggestions
        function selectProduct(rowId, productName, price, gstRate) {
            const row = document.getElementById(`product-row-${rowId}`);
            if (!row) return;
            
            // Set product name
            const nameInput = row.querySelector('.product-name-input');
            if (nameInput) {
                nameInput.value = productName;
            }
            
            // Set price
            const priceInput = row.querySelector('.product-price');
            if (priceInput) {
                priceInput.value = price;
            }
            
            // Set GST rate
            const gstSelect = row.querySelector('.product-gst');
            if (gstSelect) {
                gstSelect.value = gstRate;
            }
            
            // Hide suggestions
            const suggestionsDiv = document.getElementById(`suggestions-${rowId}`);
            if (suggestionsDiv) {
                suggestionsDiv.style.display = 'none';
            }
            
            // Update total
            updateProductTotal(rowId);
        }
        
        // Update product total calculation with GST
        function updateProductTotal(rowId) {
            const row = document.getElementById(`product-row-${rowId}`);
            if (!row) return;
            
            const quantity = parseFloat(row.querySelector('.product-quantity').value) || 0;
            const price = parseFloat(row.querySelector('.product-price').value) || 0;
            const discountPercent = parseFloat(row.querySelector('.product-discount').value) || 0;
            const discountAmount = parseFloat(row.querySelector('.product-discount-amount').value) || 0;
            const gstRate = parseFloat(row.querySelector('.product-gst').value) || 0;
            
            // Calculate subtotal
            const subtotal = quantity * price;
            
            // Calculate discount
            let totalDiscount = 0;
            if (discountPercent > 0) {
                totalDiscount = subtotal * discountPercent / 100;
            }
            if (discountAmount > 0) {
                totalDiscount = discountAmount; // If both are set, use discount amount
            }
            
            // Calculate amount after discount
            const amountAfterDiscount = subtotal - totalDiscount;
            
            // Calculate GST
            const gstAmount = amountAfterDiscount * (gstRate / 100);
            
            // Calculate final total
            const finalTotal = amountAfterDiscount + gstAmount;
            
            // Update total field
            const totalInput = row.querySelector('.product-total');
            if (totalInput) {
                totalInput.value = finalTotal.toFixed(2);
            }
            
            // Update sale calculation
            updateSaleCalculation();
        }
        
        // Update sale calculation with GST breakdown
        function updateSaleCalculation() {
            let subtotal = 0;
            let totalDiscount = 0;
            let gstBreakdown = {};
            
            // Calculate from all product rows
            document.querySelectorAll('.product-input-row').forEach(row => {
                const totalInput = row.querySelector('.product-total');
                if (totalInput) {
                    const rowTotal = parseFloat(totalInput.value) || 0;
                    
                    // Get quantity and price for discount calculation
                    const quantity = parseFloat(row.querySelector('.product-quantity').value) || 0;
                    const price = parseFloat(row.querySelector('.product-price').value) || 0;
                    const discountPercent = parseFloat(row.querySelector('.product-discount').value) || 0;
                    const discountAmount = parseFloat(row.querySelector('.product-discount-amount').value) || 0;
                    const gstRate = parseFloat(row.querySelector('.product-gst').value) || 0;
                    
                    const rowSubtotal = quantity * price;
                    
                    // Calculate discount for this row
                    let rowDiscount = 0;
                    if (discountPercent > 0) {
                        rowDiscount = rowSubtotal * discountPercent / 100;
                    }
                    if (discountAmount > 0) {
                        rowDiscount = discountAmount;
                    }
                    
                    const amountAfterDiscount = rowSubtotal - rowDiscount;
                    const rowGST = amountAfterDiscount * (gstRate / 100);
                    
                    subtotal += rowSubtotal;
                    totalDiscount += rowDiscount;
                    
                    // Add to GST breakdown
                    if (gstRate > 0) {
                        if (!gstBreakdown[gstRate]) {
                            gstBreakdown[gstRate] = {
                                taxableValue: 0,
                                gstAmount: 0
                            };
                        }
                        gstBreakdown[gstRate].taxableValue += amountAfterDiscount;
                        gstBreakdown[gstRate].gstAmount += rowGST;
                    }
                }
            });
            
            // Calculate total GST
            let totalGST = 0;
            for (const rate in gstBreakdown) {
                totalGST += gstBreakdown[rate].gstAmount;
            }
            
            // Calculate final amount
            const finalAmount = subtotal - totalDiscount + totalGST;
            
            // Update display
            document.getElementById('sale-subtotal').textContent = subtotal.toFixed(2);
            document.getElementById('sale-total-discount').textContent = totalDiscount.toFixed(2);
            document.getElementById('sale-tax').textContent = totalGST.toFixed(2);
            document.getElementById('sale-final-amount').textContent = finalAmount.toFixed(2);
            
            // Update GST breakdown display
            updateGSTBreakdownDisplay(gstBreakdown);
            
            // Update paid amount if it's full payment
            const paymentStatus = document.getElementById('payment-status').value;
            if (paymentStatus === 'received') {
                document.getElementById('paid-amount').value = finalAmount.toFixed(2);
            }
            
            // Update pending amount
            updatePendingAmount();
        }
        
        // Update GST breakdown display
        function updateGSTBreakdownDisplay(gstBreakdown) {
            const breakdownDiv = document.getElementById('gst-breakdown');
            
            if (Object.keys(gstBreakdown).length === 0) {
                breakdownDiv.innerHTML = '<div class="text-muted text-center">No GST applicable</div>';
                return;
            }
            
            let html = '<div class="gst-breakdown">';
            let totalTaxable = 0;
            let totalGST = 0;
            
            // Sort GST rates
            const sortedRates = Object.keys(gstBreakdown).sort((a, b) => parseFloat(a) - parseFloat(b));
            
            sortedRates.forEach(rate => {
                const data = gstBreakdown[rate];
                totalTaxable += data.taxableValue;
                totalGST += data.gstAmount;
                
                html += `
                    <div class="d-flex justify-content-between mb-1">
                        <span>${rate}% GST:</span>
                        <span>₹${data.gstAmount.toFixed(2)} <small class="text-muted">(on ₹${data.taxableValue.toFixed(2)})</small></span>
                    </div>
                `;
            });
            
            html += `
                <hr class="my-2">
                <div class="d-flex justify-content-between fw-semibold">
                    <span>Total Taxable Value:</span>
                    <span>₹${totalTaxable.toFixed(2)}</span>
                </div>
                <div class="d-flex justify-content-between fw-semibold">
                    <span>Total GST:</span>
                    <span class="text-primary">₹${totalGST.toFixed(2)}</span>
                </div>
            `;
            
            html += '</div>';
            breakdownDiv.innerHTML = html;
        }
        
        // Update payment fields based on status
        function updatePaymentFields() {
            const status = document.getElementById('payment-status').value;
            const paidInput = document.getElementById('paid-amount');
            const pendingContainer = document.getElementById('pending-container');
            const finalAmount = parseFloat(document.getElementById('sale-final-amount').textContent) || 0;
            
            if (status === 'received') {
                paidInput.value = finalAmount.toFixed(2);
                paidInput.disabled = true;
                pendingContainer.style.display = 'none';
            } else if (status === 'partial') {
                paidInput.value = (finalAmount * 0.5).toFixed(2);
                paidInput.disabled = false;
                pendingContainer.style.display = 'block';
            } else if (status === 'pending') {
                paidInput.value = '0';
                paidInput.disabled = false;
                pendingContainer.style.display = 'block';
            }
            
            updatePendingAmount();
        }
        
        // Update pending amount
        function updatePendingAmount() {
            const finalAmount = parseFloat(document.getElementById('sale-final-amount').textContent) || 0;
            const paidAmount = parseFloat(document.getElementById('paid-amount').value) || 0;
            const pendingAmount = finalAmount - paidAmount;
            
            document.getElementById('pending-amount-display').textContent = pendingAmount.toFixed(2);
            
            // Validate paid amount
            if (paidAmount > finalAmount) {
                document.getElementById('paid-amount').value = finalAmount.toFixed(2);
                updatePendingAmount();
            }
        }
        
        // Add sale with GST tracking
        function addSale() {
            // Get customer info
            const customerName = document.getElementById('customer-name').value.trim();
            const customerPhone = document.getElementById('customer-phone').value.trim();
            const saleDate = document.getElementById('sale-date').value;
            const paymentStatus = document.getElementById('payment-status').value;
            const paidAmount = parseFloat(document.getElementById('paid-amount').value) || 0;
            const finalAmount = parseFloat(document.getElementById('sale-final-amount').textContent) || 0;
            const pendingAmount = finalAmount - paidAmount;
            const notes = document.getElementById('sale-notes').value.trim();
            
            // Validation
            if (!customerName || !customerPhone) {
                showNotification('Please enter customer name and phone', 'warning');
                return;
            }
            
            if (finalAmount <= 0) {
                showNotification('Please add at least one product with valid price', 'warning');
                return;
            }
            
            if (paidAmount > finalAmount) {
                showNotification('Paid amount cannot exceed final amount', 'warning');
                return;
            }
            
            // Collect products
            const products = [];
            let isValid = true;
            let gstDetails = {};
            
            document.querySelectorAll('.product-input-row').forEach(row => {
                const name = row.querySelector('.product-name-input').value.trim();
                const quantity = parseFloat(row.querySelector('.product-quantity').value) || 0;
                const price = parseFloat(row.querySelector('.product-price').value) || 0;
                const discountPercent = parseFloat(row.querySelector('.product-discount').value) || 0;
                const discountAmount = parseFloat(row.querySelector('.product-discount-amount').value) || 0;
                const gstRate = parseFloat(row.querySelector('.product-gst').value) || 0;
                const total = parseFloat(row.querySelector('.product-total').value) || 0;
                
                if (!name || quantity <= 0 || price <= 0) {
                    isValid = false;
                    return;
                }
                
                // Check stock availability
                const warehouseProduct = warehouseData.find(p => p.productName === name);
                if (warehouseProduct && quantity > warehouseProduct.quantity) {
                    showNotification(`Insufficient stock for ${name}. Available: ${warehouseProduct.quantity}`, 'warning');
                    isValid = false;
                    return;
                }
                
                // Calculate GST for this product
                const subtotal = quantity * price;
                let discount = 0;
                if (discountPercent > 0) discount = subtotal * discountPercent / 100;
                if (discountAmount > 0) discount = discountAmount;
                const taxableValue = subtotal - discount;
                const gstAmount = taxableValue * (gstRate / 100);
                
                // Track GST by rate
                if (!gstDetails[gstRate]) {
                    gstDetails[gstRate] = {
                        taxableValue: 0,
                        gstAmount: 0
                    };
                }
                gstDetails[gstRate].taxableValue += taxableValue;
                gstDetails[gstRate].gstAmount += gstAmount;
                
                products.push({
                    name,
                    quantity,
                    price,
                    discountPercent,
                    discountAmount,
                    gstRate,
                    taxableValue,
                    gstAmount,
                    total
                });
            });
            
            if (!isValid || products.length === 0) {
                showNotification('Please fill all product details correctly', 'warning');
                return;
            }
            
            // Create sale object
            const saleId = salesData.length > 0 ? Math.max(...salesData.map(s => s.id)) + 1 : 1;
            
            const newSale = {
                id: saleId,
                date: saleDate,
                customerName,
                customerPhone,
                products: products,
                subtotal: parseFloat(document.getElementById('sale-subtotal').textContent),
                totalDiscount: parseFloat(document.getElementById('sale-total-discount').textContent),
                gstDetails: gstDetails,
                totalGST: parseFloat(document.getElementById('sale-tax').textContent),
                finalAmount,
                paymentStatus,
                paidAmount,
                pendingAmount,
                notes,
                timestamp: new Date().toISOString()
            };
            
            // Add to sales data
            salesData.push(newSale);
            
            // Update warehouse quantities - FIXED: CORRECTLY REMOVE FROM WAREHOUSE
            products.forEach(product => {
                const warehouseProduct = warehouseData.find(p => p.productName === product.name);
                if (warehouseProduct) {
                    warehouseProduct.quantity = Math.max(0, warehouseProduct.quantity - product.quantity);
                }
            });
            
            // Show success message with GST summary
            let gstSummary = '';
            for (const rate in gstDetails) {
                if (rate > 0) {
                    gstSummary += `${rate}% GST: ₹${gstDetails[rate].gstAmount.toFixed(2)} | `;
                }
            }
            if (gstSummary) {
                gstSummary = gstSummary.slice(0, -3); // Remove last " | "
            }
            
            showNotification(`Sale #${saleId} added successfully! ${gstSummary ? `(${gstSummary})` : ''}`, 'success');
            
            // Reset form
            resetSalesForm();
            
            // Update UI
            updateDashboard();
            loadSalesData();
            
            // Auto-save
            autoSave();
        }
        
        // Reset sales form
        function resetSalesForm() {
            // Clear customer info
            document.getElementById('customer-name').value = '';
            document.getElementById('customer-phone').value = '';
            document.getElementById('sale-notes').value = '';
            
            // Reset product rows (keep only one)
            const container = document.getElementById('product-inputs-container');
            container.innerHTML = '';
            
            // Add one fresh row
            productRowCounter = 1;
            const newRow = document.createElement('div');
            newRow.className = 'product-input-row';
            newRow.id = 'product-row-1';
            newRow.innerHTML = `
                <div class="product-input-header">
                    <div class="product-number">1</div>
                    <div class="remove-product" onclick="removeProductRow(1)">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label class="form-label small fw-semibold">Product Name</label>
                        <input type="text" class="form-control product-name-input" placeholder="Enter product name" oninput="searchProducts(1)">
                        <div class="product-suggestions" id="suggestions-1" style="display: none;"></div>
                    </div>
                    <div class="col-md-3 mb-2">
                        <label class="form-label small fw-semibold">Quantity</label>
                        <input type="number" class="form-control product-quantity" min="1" value="1" onchange="updateProductTotal(1)">
                    </div>
                    <div class="col-md-3 mb-2">
                        <label class="form-label small fw-semibold">Price (₹)</label>
                        <input type="number" class="form-control product-price" step="0.01" placeholder="0.00" onchange="updateProductTotal(1)">
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="form-label small fw-semibold">Discount %</label>
                        <input type="number" class="form-control product-discount" min="0" max="100" value="0" step="1" onchange="updateProductTotal(1)">
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="form-label small fw-semibold">Discount ₹</label>
                        <input type="number" class="form-control product-discount-amount" min="0" step="0.01" value="0" onchange="updateProductTotal(1)">
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="form-label small fw-semibold">GST %</label>
                        <select class="form-select product-gst" onchange="updateProductTotal(1)">
                            <option value="0">0% (No GST)</option>
                            <option value="5">5% GST</option>
                            <option value="12" selected>12% GST</option>
                            <option value="18">18% GST</option>
                            <option value="28">28% GST</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label small fw-semibold">Product Total (₹)</label>
                        <input type="text" class="form-control product-total" value="0.00" readonly style="background-color: #f8f9fa; font-weight: bold; font-size: 1.1rem;">
                    </div>
                </div>
            `;
            
            container.appendChild(newRow);
            
            // Reset calculation
            updateSaleCalculation();
            updatePaymentFields();
        }
        
        // ========== PURCHASE FUNCTIONS ==========
        
        // Add purchase row
        function addPurchaseRow() {
            purchaseRowCounter++;
            const container = document.getElementById('purchase-inputs-container');
            
            const newRow = document.createElement('div');
            newRow.className = 'purchase-input-row';
            newRow.id = `purchase-row-${purchaseRowCounter}`;
            newRow.innerHTML = `
                <div class="product-input-header">
                    <div class="product-number">${purchaseRowCounter}</div>
                    <div class="remove-product" onclick="removePurchaseRow(${purchaseRowCounter})">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label class="form-label small fw-semibold">Product Name</label>
                        <input type="text" class="form-control purchase-name-input" placeholder="Enter product name">
                    </div>
                    <div class="col-md-3 mb-2">
                        <label class="form-label small fw-semibold">Quantity</label>
                        <input type="number" class="form-control purchase-quantity" min="1" value="1" onchange="updatePurchaseTotal(${purchaseRowCounter})">
                    </div>
                    <div class="col-md-3 mb-2">
                        <label class="form-label small fw-semibold">Price (₹)</label>
                        <input type="number" class="form-control purchase-price" step="0.01" placeholder="0.00" onchange="updatePurchaseTotal(${purchaseRowCounter})">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label small fw-semibold">GST %</label>
                        <select class="form-select purchase-gst" onchange="updatePurchaseTotal(${purchaseRowCounter})">
                            <option value="0">0% (No GST)</option>
                            <option value="5">5% GST</option>
                            <option value="12" selected>12% GST</option>
                            <option value="18">18% GST</option>
                            <option value="28">28% GST</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label small fw-semibold">Category</label>
                        <select class="form-select purchase-category">
                            <option value="Laptop">Laptop</option>
                            <option value="Mobile">Mobile</option>
                            <option value="Tablet">Tablet</option>
                            <option value="Accessories">Accessories</option>
                            <option value="Electronics">Electronics</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label small fw-semibold">Product Total (₹)</label>
                        <input type="text" class="form-control purchase-total" value="0.00" readonly style="background-color: #f8f9fa; font-weight: bold; font-size: 1.1rem;">
                    </div>
                </div>
            `;
            
            container.appendChild(newRow);
        }
        
        // Remove purchase row
        function removePurchaseRow(rowId) {
            const row = document.getElementById(`purchase-row-${rowId}`);
            if (row) {
                if (document.querySelectorAll('.purchase-input-row').length > 1) {
                    row.remove();
                    updatePurchaseNumbers();
                    updatePurchaseCalculation();
                } else {
                    showNotification('At least one product is required', 'warning');
                }
            }
        }
        
        // Update purchase numbers
        function updatePurchaseNumbers() {
            const rows = document.querySelectorAll('.purchase-input-row');
            rows.forEach((row, index) => {
                const numberDiv = row.querySelector('.product-number');
                if (numberDiv) {
                    numberDiv.textContent = index + 1;
                }
                const newId = index + 1;
                row.id = `purchase-row-${newId}`;
                
                const removeBtn = row.querySelector('.remove-product');
                if (removeBtn) {
                    removeBtn.setAttribute('onclick', `removePurchaseRow(${newId})`);
                }
                
                const inputs = row.querySelectorAll('input');
                inputs.forEach(input => {
                    if (input.classList.contains('purchase-quantity') || 
                        input.classList.contains('purchase-price')) {
                        input.setAttribute('onchange', `updatePurchaseTotal(${newId})`);
                    }
                });
                
                const selects = row.querySelectorAll('select');
                selects.forEach(select => {
                    if (select.classList.contains('purchase-gst')) {
                        select.setAttribute('onchange', `updatePurchaseTotal(${newId})`);
                    }
                });
            });
            
            purchaseRowCounter = rows.length;
        }
        
        // Update purchase total
        function updatePurchaseTotal(rowId) {
            const row = document.getElementById(`purchase-row-${rowId}`);
            if (!row) return;
            
            const quantity = parseFloat(row.querySelector('.purchase-quantity').value) || 0;
            const price = parseFloat(row.querySelector('.purchase-price').value) || 0;
            const gstRate = parseFloat(row.querySelector('.purchase-gst').value) || 0;
            
            const subtotal = quantity * price;
            const gstAmount = subtotal * (gstRate / 100);
            const finalTotal = subtotal + gstAmount;
            
            const totalInput = row.querySelector('.purchase-total');
            if (totalInput) {
                totalInput.value = finalTotal.toFixed(2);
            }
            
            updatePurchaseCalculation();
        }
        
        // Update purchase calculation
        function updatePurchaseCalculation() {
            let subtotal = 0;
            let totalGST = 0;
            
            document.querySelectorAll('.purchase-input-row').forEach(row => {
                const totalInput = row.querySelector('.purchase-total');
                if (totalInput) {
                    const rowTotal = parseFloat(totalInput.value) || 0;
                    
                    const quantity = parseFloat(row.querySelector('.purchase-quantity').value) || 0;
                    const price = parseFloat(row.querySelector('.purchase-price').value) || 0;
                    const gstRate = parseFloat(row.querySelector('.purchase-gst').value) || 0;
                    
                    const rowSubtotal = quantity * price;
                    const rowGST = rowSubtotal * (gstRate / 100);
                    
                    subtotal += rowSubtotal;
                    totalGST += rowGST;
                }
            });
            
            const finalAmount = subtotal + totalGST;
            
            document.getElementById('purchase-subtotal').textContent = subtotal.toFixed(2);
            document.getElementById('purchase-tax').textContent = totalGST.toFixed(2);
            document.getElementById('purchase-final-amount').textContent = finalAmount.toFixed(2);
            
            // Update paid amount if it's paid
            const paymentStatus = document.getElementById('purchase-payment-status').value;
            if (paymentStatus === 'paid') {
                document.getElementById('purchase-paid-amount').value = finalAmount.toFixed(2);
            }
            
            updatePurchasePendingAmount();
        }
        
        // Update purchase payment fields
        function updatePurchasePaymentFields() {
            const status = document.getElementById('purchase-payment-status').value;
            const paidInput = document.getElementById('purchase-paid-amount');
            const pendingContainer = document.getElementById('purchase-pending-container');
            const finalAmount = parseFloat(document.getElementById('purchase-final-amount').textContent) || 0;
            
            if (status === 'paid') {
                paidInput.value = finalAmount.toFixed(2);
                paidInput.disabled = true;
                pendingContainer.style.display = 'none';
            } else if (status === 'pending') {
                paidInput.value = '0';
                paidInput.disabled = false;
                pendingContainer.style.display = 'block';
            }
            
            updatePurchasePendingAmount();
        }
        
        // Update purchase pending amount
        function updatePurchasePendingAmount() {
            const finalAmount = parseFloat(document.getElementById('purchase-final-amount').textContent) || 0;
            const paidAmount = parseFloat(document.getElementById('purchase-paid-amount').value) || 0;
            const pendingAmount = finalAmount - paidAmount;
            
            document.getElementById('purchase-pending-amount-display').textContent = pendingAmount.toFixed(2);
            
            if (paidAmount > finalAmount) {
                document.getElementById('purchase-paid-amount').value = finalAmount.toFixed(2);
                updatePurchasePendingAmount();
            }
        }
        
        // Add purchase
        function addPurchase() {
            const supplierName = document.getElementById('supplier-name').value.trim();
            const supplierPhone = document.getElementById('supplier-phone').value.trim();
            const purchaseDate = document.getElementById('purchase-date').value;
            const paymentStatus = document.getElementById('purchase-payment-status').value;
            const paidAmount = parseFloat(document.getElementById('purchase-paid-amount').value) || 0;
            const finalAmount = parseFloat(document.getElementById('purchase-final-amount').textContent) || 0;
            const pendingAmount = finalAmount - paidAmount;
            const notes = document.getElementById('purchase-notes').value.trim();
            
            if (!supplierName || !supplierPhone) {
                showNotification('Please enter supplier details', 'warning');
                return;
            }
            
            if (finalAmount <= 0) {
                showNotification('Please add at least one product', 'warning');
                return;
            }
            
            if (paidAmount > finalAmount) {
                showNotification('Paid amount cannot exceed total amount', 'warning');
                return;
            }
            
            const products = [];
            let isValid = true;
            
            document.querySelectorAll('.purchase-input-row').forEach(row => {
                const name = row.querySelector('.purchase-name-input').value.trim();
                const quantity = parseFloat(row.querySelector('.purchase-quantity').value) || 0;
                const price = parseFloat(row.querySelector('.purchase-price').value) || 0;
                const gstRate = parseFloat(row.querySelector('.purchase-gst').value) || 0;
                const category = row.querySelector('.purchase-category').value;
                const total = parseFloat(row.querySelector('.purchase-total').value) || 0;
                
                if (!name || quantity <= 0 || price <= 0) {
                    isValid = false;
                    return;
                }
                
                const subtotal = quantity * price;
                const gstAmount = subtotal * (gstRate / 100);
                
                products.push({
                    name,
                    quantity,
                    price,
                    gstRate,
                    category,
                    subtotal,
                    gstAmount,
                    total
                });
            });
            
            if (!isValid || products.length === 0) {
                showNotification('Please fill all product details correctly', 'warning');
                return;
            }
            
            const purchaseId = purchaseData.length > 0 ? Math.max(...purchaseData.map(p => p.id)) + 1 : 1;
            
            const newPurchase = {
                id: purchaseId,
                date: purchaseDate,
                supplierName,
                supplierPhone,
                products: products,
                subtotal: parseFloat(document.getElementById('purchase-subtotal').textContent),
                totalGST: parseFloat(document.getElementById('purchase-tax').textContent),
                finalAmount,
                paymentStatus,
                paidAmount,
                pendingAmount,
                notes,
                timestamp: new Date().toISOString()
            };
            
            purchaseData.push(newPurchase);
            
            // Update warehouse quantities and add new products - FIXED: CORRECTLY ADD TO WAREHOUSE
            products.forEach(product => {
                const warehouseProduct = warehouseData.find(p => p.productName === product.name);
                if (warehouseProduct) {
                    // Update existing product - ADD QUANTITY (Purchase means adding to warehouse)
                    warehouseProduct.quantity += product.quantity;
                    warehouseProduct.originalPrice = product.price;
                    warehouseProduct.gstRate = product.gstRate;
                    warehouseProduct.sellingPrice = product.price * (1 + product.gstRate / 100);
                    warehouseProduct.category = product.category;
                } else {
                    // Add new product
                    const newProduct = {
                        id: warehouseData.length + 1,
                        productName: product.name,
                        category: product.category,
                        quantity: product.quantity,
                        originalPrice: product.price,
                        gstRate: product.gstRate,
                        sellingPrice: product.price * (1 + product.gstRate / 100),
                        threshold: 5
                    };
                    
                    warehouseData.push(newProduct);
                }
            });
            
            showNotification(`Purchase #${purchaseId} added successfully!`, 'success');
            
            // Reset form
            resetPurchaseForm();
            
            // Update UI
            updateDashboard();
            loadPurchaseData();
            loadWarehouseData();
            
            autoSave();
        }
        
        // Reset purchase form
        function resetPurchaseForm() {
            document.getElementById('supplier-name').value = '';
            document.getElementById('supplier-phone').value = '';
            document.getElementById('purchase-notes').value = '';
            
            const container = document.getElementById('purchase-inputs-container');
            container.innerHTML = '';
            
            purchaseRowCounter = 1;
            const newRow = document.createElement('div');
            newRow.className = 'purchase-input-row';
            newRow.id = 'purchase-row-1';
            newRow.innerHTML = `
                <div class="product-input-header">
                    <div class="product-number">1</div>
                    <div class="remove-product" onclick="removePurchaseRow(1)">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label class="form-label small fw-semibold">Product Name</label>
                        <input type="text" class="form-control purchase-name-input" placeholder="Enter product name">
                    </div>
                    <div class="col-md-3 mb-2">
                        <label class="form-label small fw-semibold">Quantity</label>
                        <input type="number" class="form-control purchase-quantity" min="1" value="1" onchange="updatePurchaseTotal(1)">
                    </div>
                    <div class="col-md-3 mb-2">
                        <label class="form-label small fw-semibold">Price (₹)</label>
                        <input type="number" class="form-control purchase-price" step="0.01" placeholder="0.00" onchange="updatePurchaseTotal(1)">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label small fw-semibold">GST %</label>
                        <select class="form-select purchase-gst" onchange="updatePurchaseTotal(1)">
                            <option value="0">0% (No GST)</option>
                            <option value="5">5% GST</option>
                            <option value="12" selected>12% GST</option>
                            <option value="18">18% GST</option>
                            <option value="28">28% GST</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label small fw-semibold">Category</label>
                        <select class="form-select purchase-category">
                            <option value="Laptop">Laptop</option>
                            <option value="Mobile">Mobile</option>
                            <option value="Tablet">Tablet</option>
                            <option value="Accessories">Accessories</option>
                            <option value="Electronics">Electronics</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label small fw-semibold">Product Total (₹)</label>
                        <input type="text" class="form-control purchase-total" value="0.00" readonly style="background-color: #f8f9fa; font-weight: bold; font-size: 1.1rem;">
                    </div>
                </div>
            `;
            
            container.appendChild(newRow);
            
            updatePurchaseCalculation();
            updatePurchasePaymentFields();
        }
        
        // Load purchase data
        function loadPurchaseData() {
            const tableBody = document.getElementById('all-purchases-table');
            
            const noPurchasesRow = document.getElementById('no-purchases');
            if (noPurchasesRow) noPurchasesRow.remove();
            
            if (purchaseData.length === 0) {
                tableBody.innerHTML = `
                    <tr id="no-purchases">
                        <td colspan="8" class="text-center text-muted py-4">
                            <i class="fas fa-shopping-bag fa-2x mb-3"></i><br>
                            No purchase records yet
                        </td>
                    </tr>
                `;
                return;
            }
            
            const displayPurchases = [...purchaseData].reverse().slice(0, 10);
            tableBody.innerHTML = '';
            
            displayPurchases.forEach(purchase => {
                const productNames = purchase.products.map(p => 
                    `${p.name} (${p.quantity}x)`
                ).join(', ');
                
                const row = document.createElement('tr');
                row.classList.add('animate__animated', 'animate__fadeIn');
                row.innerHTML = `
                    <td>${purchase.date}</td>
                    <td>${purchase.supplierName}</td>
                    <td title="${productNames}">${productNames.substring(0, 25)}${productNames.length > 25 ? '...' : ''}</td>
                    <td>₹${purchase.finalAmount.toLocaleString()}</td>
                    <td>₹${purchase.paidAmount.toLocaleString()}</td>
                    <td>₹${purchase.pendingAmount.toLocaleString()}</td>
                    <td>
                        <span class="status-badge ${purchase.paymentStatus === 'paid' ? 'status-received' : 'status-pending'}">
                            ${purchase.paymentStatus === 'paid' ? 'Paid' : 'Pending'}
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-success" onclick="viewPurchase(${purchase.id})">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn btn-sm btn-danger" onclick="deletePurchase(${purchase.id})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                `;
                tableBody.appendChild(row);
            });
        }
        
        // View purchase
        function viewPurchase(purchaseId) {
            const purchase = purchaseData.find(p => p.id === purchaseId);
            if (!purchase) {
                showNotification('Purchase not found', 'error');
                return;
            }
            
            let details = `Purchase #${purchase.id}\n`;
            details += `Date: ${purchase.date}\n`;
            details += `Supplier: ${purchase.supplierName}\n`;
            details += `Phone: ${purchase.supplierPhone}\n`;
            details += `Total: ₹${purchase.finalAmount.toLocaleString()}\n`;
            details += `Paid: ₹${purchase.paidAmount.toLocaleString()}\n`;
            details += `Pending: ₹${purchase.pendingAmount.toLocaleString()}\n`;
            details += `Status: ${purchase.paymentStatus}\n`;
            details += `Products:\n`;
            
            purchase.products.forEach(product => {
                details += `  - ${product.name} (${product.quantity}x) = ₹${product.total.toLocaleString()}\n`;
            });
            
            if (purchase.notes) {
                details += `Notes: ${purchase.notes}\n`;
            }
            
            alert(details);
        }
        
        // Delete purchase
        function deletePurchase(purchaseId) {
            if (!confirm('Are you sure you want to delete this purchase?')) return;
            
            const purchaseIndex = purchaseData.findIndex(p => p.id === purchaseId);
            if (purchaseIndex === -1) {
                showNotification('Purchase not found', 'error');
                return;
            }
            
            const purchase = purchaseData[purchaseIndex];
            
            // Restore warehouse quantities - FIXED: CORRECTLY REVERSE THE PURCHASE
            purchase.products.forEach(product => {
                const warehouseProduct = warehouseData.find(p => p.productName === product.name);
                if (warehouseProduct) {
                    // Purchase was added to warehouse, so remove it when deleting purchase
                    warehouseProduct.quantity = Math.max(0, warehouseProduct.quantity - product.quantity);
                }
            });
            
            purchaseData.splice(purchaseIndex, 1);
            
            showNotification('Purchase deleted successfully!', 'success');
            
            updateDashboard();
            loadPurchaseData();
            loadWarehouseData();
            autoSave();
        }
        
        // ========== RETURN FUNCTIONS ==========
        
        // Update return form based on type
        function updateReturnForm() {
            const returnType = document.getElementById('return-type').value;
            const label = document.getElementById('return-customer-supplier-label');
            const select = document.getElementById('original-transaction');
            
            // Clear previous options
            select.innerHTML = '<option value="">Select a transaction</option>';
            
            if (returnType === 'sale') {
                label.textContent = 'Customer Name';
                
                // Add sales transactions
                salesData.forEach(sale => {
                    const option = document.createElement('option');
                    option.value = `sale_${sale.id}`;
                    option.textContent = `Sale #${sale.id} - ${sale.customerName} - ₹${sale.finalAmount.toLocaleString()} - ${sale.date}`;
                    select.appendChild(option);
                });
                
                // Update customer/supplier field placeholder
                document.getElementById('return-customer-supplier').placeholder = "Enter customer name";
            } else {
                label.textContent = 'Supplier Name';
                
                // Add purchase transactions
                purchaseData.forEach(purchase => {
                    const option = document.createElement('option');
                    option.value = `purchase_${purchase.id}`;
                    option.textContent = `Purchase #${purchase.id} - ${purchase.supplierName} - ₹${purchase.finalAmount.toLocaleString()} - ${purchase.date}`;
                    select.appendChild(option);
                });
                
                // Update customer/supplier field placeholder
                document.getElementById('return-customer-supplier').placeholder = "Enter supplier name";
            }
        }
        
        // Load original transaction
        function loadOriginalTransaction() {
            const value = document.getElementById('original-transaction').value;
            if (!value) return;
            
            const [type, id] = value.split('_');
            const transactionId = parseInt(id);
            
            let transaction;
            if (type === 'sale') {
                transaction = salesData.find(s => s.id === transactionId);
                if (transaction) {
                    document.getElementById('return-customer-supplier').value = transaction.customerName;
                }
            } else {
                transaction = purchaseData.find(p => p.id === transactionId);
                if (transaction) {
                    document.getElementById('return-customer-supplier').value = transaction.supplierName;
                }
            }
            
            if (!transaction) {
                showNotification('Transaction not found', 'error');
                return;
            }
            
            // Clear existing return rows
            const container = document.getElementById('return-inputs-container');
            container.innerHTML = '';
            returnRowCounter = 0;
            
            // Add products from transaction
            transaction.products.forEach((product, index) => {
                addReturnRowFromProduct(product, index + 1);
            });
            
            document.getElementById('add-return-btn').style.display = 'block';
            updateReturnCalculation();
        }
        
        // Add return row from product
        function addReturnRowFromProduct(product, rowNumber) {
            returnRowCounter++;
            const container = document.getElementById('return-inputs-container');
            
            const newRow = document.createElement('div');
            newRow.className = 'return-input-row';
            newRow.id = `return-row-${returnRowCounter}`;
            newRow.innerHTML = `
                <div class="product-input-header">
                    <div class="product-number">${rowNumber}</div>
                    <div class="remove-product" onclick="removeReturnRow(${returnRowCounter})">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label class="form-label small fw-semibold">Product Name</label>
                        <input type="text" class="form-control return-name-input" value="${product.name || product.productName || ''}" readonly>
                    </div>
                    <div class="col-md-3 mb-2">
                        <label class="form-label small fw-semibold">Quantity</label>
                        <input type="number" class="form-control return-quantity" min="1" max="${product.quantity || product.quantity}" value="1" onchange="updateReturnTotal(${returnRowCounter})">
                    </div>
                    <div class="col-md-3 mb-2">
                        <label class="form-label small fw-semibold">Price (₹)</label>
                        <input type="number" class="form-control return-price" step="0.01" value="${product.price || product.originalPrice || 0}" onchange="updateReturnTotal(${returnRowCounter})">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label small fw-semibold">Return Reason</label>
                        <select class="form-select return-reason">
                            <option value="Damaged">Damaged Product</option>
                            <option value="Wrong Item">Wrong Item Delivered</option>
                            <option value="Defective">Defective Product</option>
                            <option value="Customer Change">Customer Changed Mind</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label small fw-semibold">Product Total (₹)</label>
                        <input type="text" class="form-control return-total" value="${product.price || product.originalPrice || 0}" readonly style="background-color: #f8f9fa; font-weight: bold; font-size: 1.1rem;">
                    </div>
                </div>
            `;
            
            container.appendChild(newRow);
            updateReturnTotal(returnRowCounter);
        }
        
        // Add return row
        function addReturnRow() {
            returnRowCounter++;
            const container = document.getElementById('return-inputs-container');
            
            const newRow = document.createElement('div');
            newRow.className = 'return-input-row';
            newRow.id = `return-row-${returnRowCounter}`;
            newRow.innerHTML = `
                <div class="product-input-header">
                    <div class="product-number">${returnRowCounter}</div>
                    <div class="remove-product" onclick="removeReturnRow(${returnRowCounter})">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label class="form-label small fw-semibold">Product Name</label>
                        <input type="text" class="form-control return-name-input" placeholder="Enter product name">
                    </div>
                    <div class="col-md-3 mb-2">
                        <label class="form-label small fw-semibold">Quantity</label>
                        <input type="number" class="form-control return-quantity" min="1" value="1" onchange="updateReturnTotal(${returnRowCounter})">
                    </div>
                    <div class="col-md-3 mb-2">
                        <label class="form-label small fw-semibold">Price (₹)</label>
                        <input type="number" class="form-control return-price" step="0.01" placeholder="0.00" onchange="updateReturnTotal(${returnRowCounter})">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label small fw-semibold">Return Reason</label>
                        <select class="form-select return-reason">
                            <option value="Damaged">Damaged Product</option>
                            <option value="Wrong Item">Wrong Item Delivered</option>
                            <option value="Defective">Defective Product</option>
                            <option value="Customer Change">Customer Changed Mind</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label small fw-semibold">Product Total (₹)</label>
                        <input type="text" class="form-control return-total" value="0.00" readonly style="background-color: #f8f9fa; font-weight: bold; font-size: 1.1rem;">
                    </div>
                </div>
            `;
            
            container.appendChild(newRow);
        }
        
        // Remove return row
        function removeReturnRow(rowId) {
            const row = document.getElementById(`return-row-${rowId}`);
            if (row) {
                if (document.querySelectorAll('.return-input-row').length > 1) {
                    row.remove();
                    updateReturnNumbers();
                    updateReturnCalculation();
                } else {
                    showNotification('At least one product is required', 'warning');
                }
            }
        }
        
        // Update return numbers
        function updateReturnNumbers() {
            const rows = document.querySelectorAll('.return-input-row');
            rows.forEach((row, index) => {
                const numberDiv = row.querySelector('.product-number');
                if (numberDiv) {
                    numberDiv.textContent = index + 1;
                }
                const newId = index + 1;
                row.id = `return-row-${newId}`;
                
                const removeBtn = row.querySelector('.remove-product');
                if (removeBtn) {
                    removeBtn.setAttribute('onclick', `removeReturnRow(${newId})`);
                }
                
                const inputs = row.querySelectorAll('input');
                inputs.forEach(input => {
                    if (input.classList.contains('return-quantity') || 
                        input.classList.contains('return-price')) {
                        input.setAttribute('onchange', `updateReturnTotal(${newId})`);
                    }
                });
            });
            
            returnRowCounter = rows.length;
        }
        
        // Update return total
        function updateReturnTotal(rowId) {
            const row = document.getElementById(`return-row-${rowId}`);
            if (!row) return;
            
            const quantity = parseFloat(row.querySelector('.return-quantity').value) || 0;
            const price = parseFloat(row.querySelector('.return-price').value) || 0;
            const total = quantity * price;
            
            const totalInput = row.querySelector('.return-total');
            if (totalInput) {
                totalInput.value = total.toFixed(2);
            }
            
            updateReturnCalculation();
        }
        
        // Update return calculation
        function updateReturnCalculation() {
            let total = 0;
            
            document.querySelectorAll('.return-input-row').forEach(row => {
                const totalInput = row.querySelector('.return-total');
                if (totalInput) {
                    total += parseFloat(totalInput.value) || 0;
                }
            });
            
            document.getElementById('return-final-amount').textContent = total.toFixed(2);
            document.getElementById('refund-amount').value = total.toFixed(2);
        }
        
        // Add return - FIXED: CORRECT WAREHOUSE UPDATES FOR SALES AND PURCHASE RETURNS
        function addReturn() {
            const returnType = document.getElementById('return-type').value;
            const customerSupplier = document.getElementById('return-customer-supplier').value.trim();
            const originalTransactionValue = document.getElementById('original-transaction').value;
            const refundStatus = document.getElementById('refund-status').value;
            const refundAmount = parseFloat(document.getElementById('refund-amount').value) || 0;
            const returnDate = document.getElementById('return-date').value;
            const notes = document.getElementById('return-notes').value.trim();
            
            if (!customerSupplier || !originalTransactionValue) {
                showNotification('Please select original transaction', 'warning');
                return;
            }
            
            const products = [];
            let isValid = true;
            let totalAmount = 0;
            
            document.querySelectorAll('.return-input-row').forEach(row => {
                const name = row.querySelector('.return-name-input').value.trim();
                const quantity = parseFloat(row.querySelector('.return-quantity').value) || 0;
                const price = parseFloat(row.querySelector('.return-price').value) || 0;
                const reason = row.querySelector('.return-reason').value;
                const total = parseFloat(row.querySelector('.return-total').value) || 0;
                
                if (!name || quantity <= 0 || price <= 0) {
                    isValid = false;
                    return;
                }
                
                totalAmount += total;
                
                products.push({
                    name,
                    quantity,
                    price,
                    reason,
                    total
                });
            });
            
            if (!isValid || products.length === 0) {
                showNotification('Please fill all product details correctly', 'warning');
                return;
            }
            
            if (refundAmount > totalAmount) {
                showNotification('Refund amount cannot exceed return amount', 'warning');
                return;
            }
            
            const returnId = returnData.length > 0 ? Math.max(...returnData.map(r => r.id)) + 1 : 1;
            const [type, id] = originalTransactionValue.split('_');
            const originalId = parseInt(id);
            
            const newReturn = {
                id: returnId,
                date: returnDate,
                returnType,
                customerSupplier,
                originalTransactionId: originalId,
                originalTransactionType: type,
                products: products,
                finalAmount: totalAmount,
                refundStatus,
                refundAmount,
                pendingRefund: totalAmount - refundAmount,
                notes,
                timestamp: new Date().toISOString()
            };
            
            returnData.push(newReturn);
            
            // FIXED: Update warehouse quantities correctly based on return type
            if (returnType === 'sale') {
                // Sales Return: Customer returns product to us, so ADD to warehouse
                products.forEach(product => {
                    const warehouseProduct = warehouseData.find(p => p.productName === product.name);
                    if (warehouseProduct) {
                        warehouseProduct.quantity += product.quantity;
                        showNotification(`Added ${product.quantity} ${product.name} back to warehouse`, 'success');
                    }
                });
            } else {
                // Purchase Return: We return product to supplier, so REMOVE from warehouse
                products.forEach(product => {
                    const warehouseProduct = warehouseData.find(p => p.productName === product.name);
                    if (warehouseProduct) {
                        warehouseProduct.quantity = Math.max(0, warehouseProduct.quantity - product.quantity);
                        showNotification(`Removed ${product.quantity} ${product.name} from warehouse (returned to supplier)`, 'success');
                    }
                });
            }
            
            showNotification(`Return #${returnId} processed successfully!`, 'success');
            
            // Reset form
            resetReturnForm();
            
            // Update UI
            updateDashboard();
            loadReturnData();
            loadWarehouseData();
            
            autoSave();
        }
        
        // Reset return form
        function resetReturnForm() {
            document.getElementById('return-customer-supplier').value = '';
            document.getElementById('original-transaction').value = '';
            document.getElementById('refund-amount').value = '0';
            document.getElementById('return-notes').value = '';
            
            const container = document.getElementById('return-inputs-container');
            container.innerHTML = '';
            
            returnRowCounter = 0;
            document.getElementById('add-return-btn').style.display = 'none';
            
            updateReturnCalculation();
        }
        
        // Load return data
        function loadReturnData() {
            const tableBody = document.getElementById('all-returns-table');
            
            const noReturnsRow = document.getElementById('no-returns');
            if (noReturnsRow) noReturnsRow.remove();
            
            if (returnData.length === 0) {
                tableBody.innerHTML = `
                    <tr id="no-returns">
                        <td colspan="7" class="text-center text-muted py-4">
                            <i class="fas fa-exchange-alt fa-2x mb-3"></i><br>
                            No return records yet
                        </td>
                    </tr>
                `;
                return;
            }
            
            const displayReturns = [...returnData].reverse().slice(0, 10);
            tableBody.innerHTML = '';
            
            displayReturns.forEach(ret => {
                const productNames = ret.products.map(p => 
                    `${p.name} (${p.quantity}x)`
                ).join(', ');
                
                const row = document.createElement('tr');
                row.classList.add('animate__animated', 'animate__fadeIn');
                row.innerHTML = `
                    <td>${ret.date}</td>
                    <td>
                        <span class="status-badge ${ret.returnType === 'sale' ? 'status-return' : 'status-purchase'}">
                            ${ret.returnType === 'sale' ? 'Sales Return' : 'Purchase Return'}
                        </span>
                    </td>
                    <td>${ret.customerSupplier}</td>
                    <td title="${productNames}">${productNames.substring(0, 25)}${productNames.length > 25 ? '...' : ''}</td>
                    <td>₹${ret.finalAmount.toLocaleString()}</td>
                    <td>
                        <span class="status-badge ${ret.refundStatus === 'refunded' ? 'status-received' : 'status-pending'}">
                            ${ret.refundStatus === 'refunded' ? 'Refunded' : 'Pending'}
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-warning" onclick="viewReturn(${ret.id})">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn btn-sm btn-danger" onclick="deleteReturn(${ret.id})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                `;
                tableBody.appendChild(row);
            });
        }
        
        // View return
        function viewReturn(returnId) {
            const ret = returnData.find(r => r.id === returnId);
            if (!ret) {
                showNotification('Return not found', 'error');
                return;
            }
            
            let details = `Return #${ret.id}\n`;
            details += `Date: ${ret.date}\n`;
            details += `Type: ${ret.returnType === 'sale' ? 'Sales Return' : 'Purchase Return'}\n`;
            details += `${ret.returnType === 'sale' ? 'Customer' : 'Supplier'}: ${ret.customerSupplier}\n`;
            details += `Total: ₹${ret.finalAmount.toLocaleString()}\n`;
            details += `Refund Amount: ₹${ret.refundAmount.toLocaleString()}\n`;
            details += `Refund Status: ${ret.refundStatus}\n`;
            details += `Products:\n`;
            
            ret.products.forEach(product => {
                details += `  - ${product.name} (${product.quantity}x) = ₹${product.total.toLocaleString()} (${product.reason})\n`;
            });
            
            if (ret.notes) {
                details += `Notes: ${ret.notes}\n`;
            }
            
            alert(details);
        }
        
        // Delete return - FIXED: CORRECTLY REVERSE WAREHOUSE UPDATES
        function deleteReturn(returnId) {
            if (!confirm('Are you sure you want to delete this return?')) return;
            
            const returnIndex = returnData.findIndex(r => r.id === returnId);
            if (returnIndex === -1) {
                showNotification('Return not found', 'error');
                return;
            }
            
            const ret = returnData[returnIndex];
            
            // Reverse warehouse updates correctly
            if (ret.returnType === 'sale') {
                // Sales return was added to warehouse, so remove it when deleting return
                ret.products.forEach(product => {
                    const warehouseProduct = warehouseData.find(p => p.productName === product.name);
                    if (warehouseProduct) {
                        warehouseProduct.quantity = Math.max(0, warehouseProduct.quantity - product.quantity);
                    }
                });
            } else {
                // Purchase return was removed from warehouse, so add it back when deleting return
                ret.products.forEach(product => {
                    const warehouseProduct = warehouseData.find(p => p.productName === product.name);
                    if (warehouseProduct) {
                        warehouseProduct.quantity += product.quantity;
                    }
                });
            }
            
            returnData.splice(returnIndex, 1);
            
            showNotification('Return deleted successfully!', 'success');
            
            updateDashboard();
            loadReturnData();
            loadWarehouseData();
            autoSave();
        }
        
        // ========== WAREHOUSE FUNCTIONS ==========
        
        // Update warehouse selling price with GST
        function updateWarehouseSellingPrice() {
            const originalPrice = parseFloat(document.getElementById('price-per-unit').value) || 0;
            const gstRate = parseFloat(document.getElementById('gst-rate').value) || 0;
            
            const sellingPriceWithGST = originalPrice * (1 + gstRate / 100);
            
            // Create or update selling price display
            let displayElement = document.getElementById('selling-price-display');
            if (!displayElement) {
                displayElement = document.createElement('div');
                displayElement.id = 'selling-price-display';
                document.getElementById('warehouse-form').appendChild(displayElement);
            }
            displayElement.textContent = `Selling Price (with GST): ₹${sellingPriceWithGST.toFixed(2)}`;
            
            // Create or update GST badge display
            let gstBadge = document.getElementById('gst-badge-display');
            if (!gstBadge) {
                gstBadge = document.createElement('span');
                gstBadge.id = 'gst-badge-display';
                gstBadge.className = 'gst-badge ms-2';
                displayElement.appendChild(gstBadge);
            }
            
            if (gstRate > 0) {
                gstBadge.textContent = `${gstRate}% GST`;
                gstBadge.style.display = 'inline-block';
            } else {
                gstBadge.textContent = 'No GST';
                gstBadge.style.display = 'inline-block';
            }
        }
        
        // Add product to warehouse with GST
        function addProductToWarehouse() {
            const productName = document.getElementById('product-name-add').value.trim();
            const category = document.getElementById('category').value;
            const quantity = parseInt(document.getElementById('quantity-add').value) || 0;
            const originalPrice = parseFloat(document.getElementById('price-per-unit').value) || 0;
            const gstRate = parseFloat(document.getElementById('gst-rate').value) || 0;
            const threshold = parseInt(document.getElementById('threshold').value) || 5;
            
            if (!productName || !category || quantity <= 0 || originalPrice <= 0) {
                showNotification('Please fill all fields correctly', 'warning');
                return;
            }
            
            const sellingPriceWithGST = originalPrice * (1 + gstRate / 100);
            
            // Check if product exists
            const existingIndex = warehouseData.findIndex(p => p.productName === productName);
            
            if (existingIndex !== -1) {
                // Update existing product
                warehouseData[existingIndex].quantity += quantity;
                warehouseData[existingIndex].originalPrice = originalPrice;
                warehouseData[existingIndex].gstRate = gstRate;
                warehouseData[existingIndex].sellingPrice = sellingPriceWithGST;
                warehouseData[existingIndex].threshold = threshold;
                showNotification('Product quantity updated!', 'success');
            } else {
                // Add new product
                const newProduct = {
                    id: warehouseData.length + 1,
                    productName,
                    category,
                    quantity,
                    originalPrice,
                    gstRate,
                    sellingPrice: sellingPriceWithGST,
                    threshold
                };
                
                warehouseData.push(newProduct);
                showNotification('Product added to warehouse!', 'success');
            }
            
            // Reset form
            document.getElementById('warehouse-form').reset();
            
            // Remove selling price display if exists
            const displayElement = document.getElementById('selling-price-display');
            if (displayElement) {
                displayElement.remove();
            }
            
            // Update UI
            loadWarehouseData();
            updateDashboard();
            autoSave();
        }
        
        // Load warehouse data
        function loadWarehouseData() {
            const tableBody = document.getElementById('warehouse-table');
            const adjustSelect = document.getElementById('adjust-product-select');
            
            // Remove no warehouse message
            const noWarehouseRow = document.getElementById('no-warehouse');
            if (noWarehouseRow) noWarehouseRow.remove();
            
            if (warehouseData.length === 0) {
                tableBody.innerHTML = `
                    <tr id="no-warehouse">
                        <td colspan="7" class="text-center text-muted py-4">
                            <i class="fas fa-warehouse fa-2x mb-3"></i><br>
                            Warehouse is empty. Add your first product!
                        </td>
                    </tr>
                `;
                return;
            }
            
            // Clear adjust select
            adjustSelect.innerHTML = '<option value="">Select Product</option>';
            
            tableBody.innerHTML = '';
            
            warehouseData.forEach(product => {
                const gstBadge = product.gstRate > 0 ? 
                    `<span class="gst-badge">${product.gstRate}% GST</span>` : 
                    '<span class="gst-badge">No GST</span>';
                
                // Determine stock status
                let stockStatus = '';
                let stockClass = '';
                if (product.quantity <= 0) {
                    stockStatus = 'Out of Stock';
                    stockClass = 'stock-out';
                } else if (product.quantity <= product.threshold) {
                    stockStatus = 'Low Stock';
                    stockClass = 'stock-low';
                } else {
                    stockStatus = 'In Stock';
                    stockClass = 'stock-high';
                }
                
                const row = document.createElement('tr');
                row.classList.add('animate__animated', 'animate__fadeIn');
                row.innerHTML = `
                    <td>
                        <input type="checkbox" value="${product.id}">
                    </td>
                    <td>
                        <div class="fw-semibold">${product.productName}</div>
                        <small class="text-muted">${product.category}</small>
                    </td>
                    <td>${product.category}</td>
                    <td>
                        <div class="fw-bold">${product.quantity}</div>
                        <div class="stock-indicator ${stockClass}">${stockStatus}</div>
                    </td>
                    <td>
                        <div>₹${product.sellingPrice.toLocaleString()}</div>
                        ${gstBadge}
                    </td>
                    <td>${product.gstRate}%</td>
                    <td>
                        <button class="btn btn-sm btn-danger" onclick="deleteProduct(${product.id})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                `;
                tableBody.appendChild(row);
                
                // Add to adjust select
                const option = document.createElement('option');
                option.value = product.id;
                option.textContent = `${product.productName} (${product.quantity} available)`;
                adjustSelect.appendChild(option);
            });
            
            // Reset select all checkbox
            document.getElementById('select-all').checked = false;
        }
        
        // Adjust stock quantity
        function adjustStock() {
            const productId = parseInt(document.getElementById('adjust-product-select').value);
            const qty = parseInt(document.getElementById('adjust-qty').value) || 0;
            const action = document.getElementById('adjust-action').value;
            
            if (!productId || qty === 0) {
                showNotification('Please select a product and enter quantity', 'warning');
                return;
            }
            
            const product = warehouseData.find(p => p.id === productId);
            if (!product) {
                showNotification('Product not found', 'error');
                return;
            }
            
            if (action === 'add') {
                product.quantity += qty;
                showNotification(`Added ${qty} units to ${product.productName}. New quantity: ${product.quantity}`, 'success');
            } else if (action === 'remove') {
                if (product.quantity < qty) {
                    showNotification(`Cannot remove ${qty} units. Only ${product.quantity} available.`, 'warning');
                    return;
                }
                product.quantity -= qty;
                showNotification(`Removed ${qty} units from ${product.productName}. New quantity: ${product.quantity}`, 'success');
            }
            
            // Reset adjust form
            document.getElementById('adjust-qty').value = '';
            
            // Update UI
            loadWarehouseData();
            autoSave();
        }
        
        // Search customer sales
        function searchCustomerSales() {
            const searchTerm = document.getElementById('search-customer').value.toLowerCase().trim();
            const salesList = document.getElementById('customer-sales-list');
            
            if (!searchTerm) {
                salesList.innerHTML = '<div class="text-muted small">Enter customer name to search</div>';
                document.getElementById('remove-sale-btn').disabled = true;
                return;
            }
            
            const matchingSales = salesData.filter(sale => 
                sale.customerName.toLowerCase().includes(searchTerm)
            );
            
            if (matchingSales.length === 0) {
                salesList.innerHTML = '<div class="text-muted small">No sales found for this customer</div>';
                document.getElementById('remove-sale-btn').disabled = true;
                return;
            }
            
            let html = '<div class="list-group">';
            matchingSales.forEach(sale => {
                const productNames = sale.products.map(p => `${p.name} (${p.quantity}x)`).join(', ');
                html += `
                    <div class="list-group-item">
                        <div class="form-check">
                            <input class="form-check-input sale-checkbox" type="radio" name="selectedSale" value="${sale.id}" onchange="enableRemoveButton()">
                            <label class="form-check-label">
                                <strong>Sale #${sale.id}</strong> - ${sale.date}<br>
                                <small class="text-muted">${productNames}</small><br>
                                <small>Total: ₹${sale.finalAmount.toLocaleString()}</small>
                            </label>
                        </div>
                    </div>
                `;
            });
            html += '</div>';
            
            salesList.innerHTML = html;
        }
        
        // Enable remove button
        function enableRemoveButton() {
            const removeBtn = document.getElementById('remove-sale-btn');
            const checked = document.querySelector('input[name="selectedSale"]:checked');
            removeBtn.disabled = !checked;
        }
        
        // Remove selected sale
        function removeSelectedSale() {
            const checked = document.querySelector('input[name="selectedSale"]:checked');
            if (!checked) {
                showNotification('Please select a sale to remove', 'warning');
                return;
            }
            
            const saleId = parseInt(checked.value);
            if (!confirm('Are you sure you want to remove this sale? This will restore warehouse quantities.')) {
                return;
            }
            
            const saleIndex = salesData.findIndex(s => s.id === saleId);
            if (saleIndex === -1) {
                showNotification('Sale not found', 'error');
                return;
            }
            
            const sale = salesData[saleIndex];
            
            // Restore warehouse quantities
            sale.products.forEach(product => {
                const warehouseProduct = warehouseData.find(p => p.productName === product.name);
                if (warehouseProduct) {
                    warehouseProduct.quantity += product.quantity;
                }
            });
            
            // Remove sale
            salesData.splice(saleIndex, 1);
            
            // Clear search
            document.getElementById('search-customer').value = '';
            document.getElementById('customer-sales-list').innerHTML = '<div class="text-muted small">Enter customer name to search</div>';
            document.getElementById('remove-sale-btn').disabled = true;
            
            showNotification('Sale removed successfully! Warehouse quantities restored.', 'success');
            
            // Update all data
            updateDashboard();
            loadSalesData();
            loadWarehouseData();
            autoSave();
        }
        
        // Delete sale
        function deleteSale(saleId) {
            if (!confirm('Are you sure you want to delete this sale?')) return;
            
            const saleIndex = salesData.findIndex(s => s.id === saleId);
            if (saleIndex === -1) {
                showNotification('Sale not found', 'error');
                return;
            }
            
            const sale = salesData[saleIndex];
            
            // Restore warehouse quantities
            sale.products.forEach(product => {
                const warehouseProduct = warehouseData.find(p => p.productName === product.name);
                if (warehouseProduct) {
                    warehouseProduct.quantity += product.quantity;
                }
            });
            
            salesData.splice(saleIndex, 1);
            
            showNotification('Sale deleted successfully!', 'success');
            
            updateDashboard();
            loadSalesData();
            loadWarehouseData();
            autoSave();
        }
        
        // Toggle payment status
        function togglePaymentStatus(saleId, isPaid) {
            const sale = salesData.find(s => s.id === saleId);
            if (!sale) return;
            
            if (isPaid) {
                sale.paymentStatus = 'received';
                sale.paidAmount = sale.finalAmount;
                sale.pendingAmount = 0;
            } else {
                sale.paymentStatus = 'pending';
                sale.paidAmount = 0;
                sale.pendingAmount = sale.finalAmount;
            }
            
            showNotification(`Payment status updated`, 'success');
            
            // Update UI
            if (document.getElementById('sales-section').style.display !== 'none') {
                loadSalesData();
            }
            
            if (document.getElementById('pending-section').style.display !== 'none') {
                loadPendingPayments();
            }
            
            updateDashboard();
            autoSave();
        }
        
        // Load pending payments
        function loadPendingPayments() {
            // Combine sales and purchase pending amounts
            const pendingSales = salesData.filter(sale => sale.pendingAmount > 0);
            const pendingPurchases = purchaseData.filter(purchase => purchase.pendingAmount > 0);
            const allPending = [...pendingSales, ...pendingPurchases];
            
            const tableBody = document.getElementById('pending-table');
            
            // Remove no pending message
            const noPendingRow = document.getElementById('no-pending');
            if (noPendingRow) noPendingRow.remove();
            
            if (allPending.length === 0) {
                tableBody.innerHTML = `
                    <tr id="no-pending">
                        <td colspan="8" class="text-center text-muted py-4">
                            <i class="fas fa-check-circle fa-2x mb-3 text-success"></i><br>
                            No pending payments! All payments received.
                        </td>
                    </tr>
                `;
                return;
            }
            
            tableBody.innerHTML = '';
            
            allPending.forEach(item => {
                // Calculate days pending
                const itemDate = new Date(item.date);
                const today = new Date();
                const diffTime = Math.abs(today - itemDate);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                
                const isSale = item.customerName !== undefined;
                const name = isSale ? item.customerName : item.supplierName;
                const phone = isSale ? item.customerPhone : item.supplierPhone;
                const type = isSale ? 'Sale' : 'Purchase';
                
                const row = document.createElement('tr');
                row.classList.add('animate__animated', 'animate__fadeIn');
                row.innerHTML = `
                    <td>${item.date}</td>
                    <td>${type}</td>
                    <td>${name}</td>
                    <td>₹${item.finalAmount.toLocaleString()}</td>
                    <td>₹${item.paidAmount.toLocaleString()}</td>
                    <td>₹${item.pendingAmount.toLocaleString()}</td>
                    <td>${diffDays}</td>
                    <td>
                        <button class="btn btn-sm btn-success" onclick="markAsPaid(${item.id}, '${type}')">
                            <i class="fas fa-check me-1"></i>Mark Paid
                        </button>
                    </td>
                `;
                tableBody.appendChild(row);
            });
        }
        
        // Mark as paid
        function markAsPaid(itemId, type) {
            let item;
            if (type === 'Sale') {
                item = salesData.find(s => s.id === itemId);
                if (item) {
                    item.paymentStatus = 'received';
                    item.paidAmount = item.finalAmount;
                    item.pendingAmount = 0;
                }
            } else {
                item = purchaseData.find(p => p.id === itemId);
                if (item) {
                    item.paymentStatus = 'paid';
                    item.paidAmount = item.finalAmount;
                    item.pendingAmount = 0;
                }
            }
            
            if (!item) {
                showNotification('Item not found', 'error');
                return;
            }
            
            showNotification('Payment marked as received!', 'success');
            
            loadPendingPayments();
            updateDashboard();
            autoSave();
        }
        
        // Update charts
        function updateCharts() {
            // Sales and purchase chart
            const last7Days = [];
            const salesByDay = [];
            const purchaseByDay = [];
            
            for (let i = 6; i >= 0; i--) {
                const date = new Date();
                date.setDate(date.getDate() - i);
                const dateString = date.toISOString().split('T')[0];
                last7Days.push(dateString);
                
                const daySales = salesData
                    .filter(sale => sale.date === dateString)
                    .reduce((sum, sale) => sum + sale.finalAmount, 0);
                salesByDay.push(daySales);
                
                const dayPurchase = purchaseData
                    .filter(purchase => purchase.date === dateString)
                    .reduce((sum, purchase) => sum + purchase.finalAmount, 0);
                purchaseByDay.push(dayPurchase);
            }
            
            const salesCtx = document.getElementById('salesChart').getContext('2d');
            if (window.salesChartInstance) {
                window.salesChartInstance.destroy();
            }
            
            window.salesChartInstance = new Chart(salesCtx, {
                type: 'line',
                data: {
                    labels: last7Days.map(date => {
                        const d = new Date(date);
                        return `${d.getDate()}/${d.getMonth()+1}`;
                    }),
                    datasets: [
                        {
                            label: 'Sales (₹)',
                            data: salesByDay,
                            borderColor: '#4361ee',
                            backgroundColor: 'rgba(67, 97, 238, 0.1)',
                            tension: 0.4,
                            fill: true,
                            pointBackgroundColor: '#4361ee',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                            pointRadius: 5
                        },
                        {
                            label: 'Purchase (₹)',
                            data: purchaseByDay,
                            borderColor: '#20c997',
                            backgroundColor: 'rgba(32, 201, 151, 0.1)',
                            tension: 0.4,
                            fill: true,
                            pointBackgroundColor: '#20c997',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                            pointRadius: 5
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0,0,0,0.05)'
                            },
                            ticks: {
                                callback: function(value) {
                                    return '₹' + value.toLocaleString();
                                }
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(0,0,0,0.05)'
                            }
                        }
                    }
                }
            });
            
            // Transaction status chart
            const paidCount = salesData.filter(s => s.paymentStatus === 'received').length + 
                            purchaseData.filter(p => p.paymentStatus === 'paid').length;
            const partialCount = salesData.filter(s => s.pendingAmount > 0 && s.pendingAmount < s.finalAmount).length +
                               purchaseData.filter(p => p.pendingAmount > 0 && p.pendingAmount < p.finalAmount).length;
            const pendingCount = salesData.filter(s => s.paymentStatus === 'pending' && s.pendingAmount === s.finalAmount).length +
                                purchaseData.filter(p => p.paymentStatus === 'pending' && p.pendingAmount === p.finalAmount).length;
            const returnCount = returnData.length;
            
            const paymentCtx = document.getElementById('paymentChart').getContext('2d');
            if (window.paymentChartInstance) {
                window.paymentChartInstance.destroy();
            }
            
            window.paymentChartInstance = new Chart(paymentCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Paid', 'Partial', 'Pending', 'Returns'],
                    datasets: [{
                        data: [paidCount, partialCount, pendingCount, returnCount],
                        backgroundColor: ['#4cc9f0', '#ffc107', '#f72585', '#fd7e14'],
                        borderWidth: 2,
                        borderColor: '#fff'
                    }]
                },
                options: {
                    responsive: true,
                    cutout: '70%',
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 20,
                                usePointStyle: true
                            }
                        }
                    }
                }
            });
        }
        
        // Delete product
        function deleteProduct(productId) {
            if (!confirm('Delete this product?')) return;
            
            warehouseData = warehouseData.filter(p => p.id !== productId);
            showNotification('Product deleted!', 'success');
            
            loadWarehouseData();
            updateDashboard();
            autoSave();
        }
        
        // Delete selected products
        function deleteSelectedProducts() {
            const checkboxes = document.querySelectorAll('#warehouse-table input[type="checkbox"]:checked');
            
            if (checkboxes.length === 0) {
                showNotification('Select products to delete', 'warning');
                return;
            }
            
            if (!confirm(`Delete ${checkboxes.length} product(s)?`)) return;
            
            const idsToDelete = Array.from(checkboxes).map(cb => parseInt(cb.value));
            warehouseData = warehouseData.filter(p => !idsToDelete.includes(p.id));
            
            showNotification(`${idsToDelete.length} product(s) deleted!`, 'success');
            
            loadWarehouseData();
            updateDashboard();
            autoSave();
        }
        
        // Export warehouse data
        function exportWarehouseData() {
            let csv = 'Product Name,Category,Quantity,Original Price,GST %,Selling Price,Stock Status\n';
            
            warehouseData.forEach(product => {
                let stockStatus = '';
                if (product.quantity <= 0) {
                    stockStatus = 'Out of Stock';
                } else if (product.quantity <= product.threshold) {
                    stockStatus = 'Low Stock';
                } else {
                    stockStatus = 'In Stock';
                }
                
                csv += `"${product.productName}","${product.category}",${product.quantity},${product.originalPrice},${product.gstRate},${product.sellingPrice},"${stockStatus}"\n`;
            });
            
            const blob = new Blob([csv], { type: 'text/csv' });
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `warehouse_${new Date().toISOString().split('T')[0]}.csv`;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            window.URL.revokeObjectURL(url);
            
            showNotification('Warehouse data exported successfully!', 'success');
        }
        
        // Generate report
        function generateReport() {
            const reportType = document.getElementById('report-type').value;
            const reportDate = document.getElementById('report-date').value;
            
            let filteredSales = [];
            let filteredPurchases = [];
            let filteredReturns = [];
            let reportTitle = '';
            
            switch(reportType) {
                case 'daily':
                    filteredSales = salesData.filter(sale => sale.date === reportDate);
                    reportTitle = `Daily Sales Report: ${reportDate}`;
                    break;
                case 'purchase_daily':
                    filteredPurchases = purchaseData.filter(purchase => purchase.date === reportDate);
                    reportTitle = `Daily Purchase Report: ${reportDate}`;
                    break;
                case 'weekly':
                    const date = new Date(reportDate);
                    const dayOfWeek = date.getDay();
                    const startDate = new Date(date);
                    startDate.setDate(date.getDate() - dayOfWeek);
                    const endDate = new Date(date);
                    endDate.setDate(date.getDate() + (6 - dayOfWeek));
                    
                    const startStr = startDate.toISOString().split('T')[0];
                    const endStr = endDate.toISOString().split('T')[0];
                    
                    filteredSales = salesData.filter(sale => sale.date >= startStr && sale.date <= endStr);
                    reportTitle = `Weekly Sales Report: ${startStr} to ${endStr}`;
                    break;
                case 'monthly':
                    const month = reportDate.substring(0, 7);
                    filteredSales = salesData.filter(sale => sale.date.startsWith(month));
                    filteredPurchases = purchaseData.filter(purchase => purchase.date.startsWith(month));
                    filteredReturns = returnData.filter(ret => ret.date.startsWith(month));
                    reportTitle = `Monthly Report: ${month}`;
                    break;
                case 'yearly':
                    const year = reportDate.substring(0, 4);
                    filteredSales = salesData.filter(sale => sale.date.startsWith(year));
                    filteredPurchases = purchaseData.filter(purchase => purchase.date.startsWith(year));
                    filteredReturns = returnData.filter(ret => ret.date.startsWith(year));
                    reportTitle = `Yearly Report: ${year}`;
                    break;
                case 'gst':
                    const gstMonth = reportDate.substring(0, 7);
                    filteredSales = salesData.filter(sale => sale.date.startsWith(gstMonth));
                    reportTitle = `GST Report: ${gstMonth}`;
                    break;
                case 'stock':
                    generateStockReport();
                    return;
                case 'profit_loss':
                    generateProfitLossReport();
                    return;
            }
            
            if (reportType === 'gst') {
                generateGSTReport(filteredSales, reportTitle);
            } else if (reportType === 'profit_loss') {
                // Already handled
            } else if (reportType === 'purchase_daily') {
                generatePurchaseReport(filteredPurchases, reportTitle);
            } else {
                generateSalesReport(filteredSales, reportTitle);
            }
        }
        
        // Generate purchase report
        function generatePurchaseReport(purchases, title) {
            const totalPurchase = purchases.reduce((sum, purchase) => sum + purchase.finalAmount, 0);
            const totalPaid = purchases.reduce((sum, purchase) => sum + purchase.paidAmount, 0);
            const totalPending = purchases.reduce((sum, purchase) => sum + purchase.pendingAmount, 0);
            const totalGST = purchases.reduce((sum, purchase) => sum + purchase.totalGST, 0);
            
            document.getElementById('report-summary').innerHTML = `
                <div class="animate__animated animate__fadeIn">
                    <h5>${title}</h5>
                    <div class="mt-4">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total Purchase:</span>
                            <strong>₹${totalPurchase.toLocaleString()}</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total Paid:</span>
                            <strong class="text-success">₹${totalPaid.toLocaleString()}</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total Pending:</span>
                            <strong class="text-warning">₹${totalPending.toLocaleString()}</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total GST:</span>
                            <strong class="text-primary">₹${totalGST.toLocaleString()}</strong>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <span>Number of Purchases:</span>
                            <strong>${purchases.length}</strong>
                        </div>
                    </div>
                </div>
            `;
            
            const reportDetails = document.getElementById('report-details');
            
            if (purchases.length === 0) {
                reportDetails.innerHTML = `
                    <div class="text-center text-muted py-5">
                        <i class="fas fa-shopping-bag fa-3x mb-3"></i><br>
                        No purchases found for selected period
                    </div>
                `;
                return;
            }
            
            let tableHTML = `
                <div class="table-responsive animate__animated animate__fadeIn">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Supplier</th>
                                <th>Amount</th>
                                <th>Paid</th>
                                <th>Pending</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
            `;
            
            purchases.forEach(purchase => {
                tableHTML += `
                    <tr>
                        <td>${purchase.date}</td>
                        <td>${purchase.supplierName}</td>
                        <td>₹${purchase.finalAmount.toLocaleString()}</td>
                        <td>₹${purchase.paidAmount.toLocaleString()}</td>
                        <td>₹${purchase.pendingAmount.toLocaleString()}</td>
                        <td>
                            <span class="status-badge ${purchase.paymentStatus === 'paid' ? 'status-received' : 'status-pending'}">
                                ${purchase.paymentStatus === 'paid' ? 'Paid' : 'Pending'}
                            </span>
                        </td>
                    </tr>
                `;
            });
            
            tableHTML += `
                        </tbody>
                    </table>
                </div>
            `;
            
            reportDetails.innerHTML = tableHTML;
        }
        
        // Generate profit loss report
        function generateProfitLossReport() {
            const today = new Date().toISOString().split('T')[0];
            const month = today.substring(0, 7);
            
            const monthlySales = salesData.filter(sale => sale.date.startsWith(month));
            const monthlyPurchases = purchaseData.filter(purchase => purchase.date.startsWith(month));
            const monthlyReturns = returnData.filter(ret => ret.date.startsWith(month));
            
            const totalSales = monthlySales.reduce((sum, sale) => sum + sale.finalAmount, 0);
            const totalPurchase = monthlyPurchases.reduce((sum, purchase) => sum + purchase.finalAmount, 0);
            const totalReturn = monthlyReturns.reduce((sum, ret) => sum + ret.finalAmount, 0);
            const totalGST = monthlySales.reduce((sum, sale) => sum + sale.totalGST, 0);
            const totalDiscount = monthlySales.reduce((sum, sale) => sum + sale.totalDiscount, 0);
            
            const grossProfit = totalSales - totalPurchase - totalReturn;
            const netProfit = grossProfit - totalDiscount;
            
            document.getElementById('report-summary').innerHTML = `
                <div class="animate__animated animate__fadeIn">
                    <h5>Profit & Loss Report: ${month}</h5>
                    <div class="mt-4">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total Sales:</span>
                            <strong>₹${totalSales.toLocaleString()}</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total Purchase:</span>
                            <strong class="text-danger">₹${totalPurchase.toLocaleString()}</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total Returns:</span>
                            <strong class="text-warning">₹${totalReturn.toLocaleString()}</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total Discount:</span>
                            <strong class="text-info">₹${totalDiscount.toLocaleString()}</strong>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Gross Profit:</span>
                            <strong class="${grossProfit >= 0 ? 'text-success' : 'text-danger'}">₹${grossProfit.toLocaleString()}</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Net Profit:</span>
                            <strong class="${netProfit >= 0 ? 'text-success' : 'text-danger'} fw-bold fs-5">₹${netProfit.toLocaleString()}</strong>
                        </div>
                    </div>
                </div>
            `;
            
            const reportDetails = document.getElementById('report-details');
            
            let tableHTML = `
                <div class="animate__animated animate__fadeIn">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3">Top Selling Products</h6>
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Qty Sold</th>
                                            <th>Revenue</th>
                                        </tr>
                                    </thead>
                                    <tbody>
            `;
            
            // Calculate product sales
            const productSales = {};
            monthlySales.forEach(sale => {
                sale.products.forEach(product => {
                    if (!productSales[product.name]) {
                        productSales[product.name] = {
                            quantity: 0,
                            revenue: 0
                        };
                    }
                    productSales[product.name].quantity += product.quantity;
                    productSales[product.name].revenue += product.total;
                });
            });
            
            // Get top 5 products
            const topProducts = Object.entries(productSales)
                .sort((a, b) => b[1].revenue - a[1].revenue)
                .slice(0, 5);
            
            topProducts.forEach(([name, data]) => {
                tableHTML += `
                    <tr>
                        <td>${name}</td>
                        <td>${data.quantity}</td>
                        <td>₹${data.revenue.toLocaleString()}</td>
                    </tr>
                `;
            });
            
            if (topProducts.length === 0) {
                tableHTML += `
                    <tr>
                        <td colspan="3" class="text-center text-muted">No sales data</td>
                    </tr>
                `;
            }
            
            tableHTML += `
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3">Monthly Summary</h6>
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Metric</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Number of Sales</td>
                                            <td>${monthlySales.length}</td>
                                        </tr>
                                        <tr>
                                            <td>Number of Purchases</td>
                                            <td>${monthlyPurchases.length}</td>
                                        </tr>
                                        <tr>
                                            <td>Number of Returns</td>
                                            <td>${monthlyReturns.length}</td>
                                        </tr>
                                        <tr>
                                            <td>Average Sale Value</td>
                                            <td>₹${monthlySales.length > 0 ? (totalSales / monthlySales.length).toLocaleString() : '0'}</td>
                                        </tr>
                                        <tr>
                                            <td>Profit Margin</td>
                                            <td class="${netProfit >= 0 ? 'text-success' : 'text-danger'} fw-bold">
                                                ${totalSales > 0 ? ((netProfit / totalSales) * 100).toFixed(2) : '0'}%
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            reportDetails.innerHTML = tableHTML;
        }
        
        // Generate GST report
        function generateGSTReport(sales, title) {
            const gstSummary = {};
            let totalSales = 0;
            let totalTaxable = 0;
            let totalGST = 0;
            
            sales.forEach(sale => {
                totalSales += sale.finalAmount;
                
                // FIXED: Check if gstDetails exists
                if (sale.gstDetails) {
                    for (const rate in sale.gstDetails) {
                        const rateNum = parseFloat(rate);
                        if (!gstSummary[rateNum]) {
                            gstSummary[rateNum] = {
                                taxableValue: 0,
                                gstAmount: 0,
                                count: 0
                            };
                        }
                        gstSummary[rateNum].taxableValue += sale.gstDetails[rate].taxableValue;
                        gstSummary[rateNum].gstAmount += sale.gstDetails[rate].gstAmount;
                        gstSummary[rateNum].count++;
                        
                        totalTaxable += sale.gstDetails[rate].taxableValue;
                        totalGST += sale.gstDetails[rate].gstAmount;
                    }
                }
            });
            
            document.getElementById('report-summary').innerHTML = `
                <div class="animate__animated animate__fadeIn">
                    <h5>${title}</h5>
                    <div class="mt-4">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total Sales:</span>
                            <strong>₹${totalSales.toLocaleString()}</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total Taxable Value:</span>
                            <strong>₹${totalTaxable.toLocaleString()}</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total GST:</span>
                            <strong class="text-primary">₹${totalGST.toLocaleString()}</strong>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <span>Number of Sales:</span>
                            <strong>${sales.length}</strong>
                        </div>
                    </div>
                </div>
            `;
            
            const reportDetails = document.getElementById('report-details');
            
            if (sales.length === 0) {
                reportDetails.innerHTML = `
                    <div class="text-center text-muted py-5">
                        <i class="fas fa-chart-pie fa-3x mb-3"></i><br>
                        No sales found for selected period
                    </div>
                `;
                return;
            }
            
            let tableHTML = `
                <div class="animate__animated animate__fadeIn">
                    <h6 class="fw-bold mb-3">GST Rate-wise Summary</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>GST Rate</th>
                                    <th>Taxable Value</th>
                                    <th>GST Amount</th>
                                    <th># of Transactions</th>
                                </tr>
                            </thead>
                            <tbody>
            `;
            
            const sortedRates = Object.keys(gstSummary).sort((a, b) => parseFloat(a) - parseFloat(b));
            
            sortedRates.forEach(rate => {
                const data = gstSummary[rate];
                tableHTML += `
                    <tr>
                        <td>${rate}% GST</td>
                        <td>₹${data.taxableValue.toLocaleString()}</td>
                        <td class="text-primary">₹${data.gstAmount.toLocaleString()}</td>
                        <td>${data.count}</td>
                    </tr>
                `;
            });
            
            if (sortedRates.length === 0) {
                tableHTML += `
                    <tr>
                        <td colspan="4" class="text-center text-muted">No GST data available</td>
                    </tr>
                `;
            }
            
            tableHTML += `
                            </tbody>
                        </table>
                    </div>
                </div>
            `;
            
            reportDetails.innerHTML = tableHTML;
        }
        
        // Generate stock report
        function generateStockReport() {
            let totalProducts = warehouseData.length;
            let totalValue = 0;
            let lowStockCount = 0;
            let outOfStockCount = 0;
            
            warehouseData.forEach(product => {
                const productValue = product.quantity * product.sellingPrice;
                totalValue += productValue;
                
                if (product.quantity <= 0) {
                    outOfStockCount++;
                } else if (product.quantity <= product.threshold) {
                    lowStockCount++;
                }
            });
            
            document.getElementById('report-summary').innerHTML = `
                <div class="animate__animated animate__fadeIn">
                    <h5>Current Stock Report</h5>
                    <div class="mt-4">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total Products:</span>
                            <strong>${totalProducts}</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total Stock Value:</span>
                            <strong>₹${totalValue.toLocaleString()}</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Low Stock Items:</span>
                            <strong class="text-warning">${lowStockCount}</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Out of Stock Items:</span>
                            <strong class="text-danger">${outOfStockCount}</strong>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <span>Healthy Stock Items:</span>
                            <strong class="text-success">${totalProducts - lowStockCount - outOfStockCount}</strong>
                        </div>
                    </div>
                </div>
            `;
            
            const reportDetails = document.getElementById('report-details');
            
            if (warehouseData.length === 0) {
                reportDetails.innerHTML = `
                    <div class="text-center text-muted py-5">
                        <i class="fas fa-boxes fa-3x mb-3"></i><br>
                        Warehouse is empty
                    </div>
                `;
                return;
            }
            
            let tableHTML = `
                <div class="animate__animated animate__fadeIn">
                    <h6 class="fw-bold mb-3">Stock Details</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Stock Status</th>
                                    <th>Unit Price</th>
                                    <th>Total Value</th>
                                </tr>
                            </thead>
                            <tbody>
            `;
            
            warehouseData.forEach(product => {
                const productValue = product.quantity * product.sellingPrice;
                
                let stockStatus = '';
                let stockClass = '';
                if (product.quantity <= 0) {
                    stockStatus = 'Out of Stock';
                    stockClass = 'stock-out';
                } else if (product.quantity <= product.threshold) {
                    stockStatus = 'Low Stock';
                    stockClass = 'stock-low';
                } else {
                    stockStatus = 'Good';
                    stockClass = 'stock-high';
                }
                
                tableHTML += `
                    <tr>
                        <td>${product.productName}</td>
                        <td>${product.category}</td>
                        <td>${product.quantity}</td>
                        <td><span class="${stockClass}">${stockStatus}</span></td>
                        <td>₹${product.sellingPrice.toLocaleString()}</td>
                        <td>₹${productValue.toLocaleString()}</td>
                    </tr>
                `;
            });
            
            tableHTML += `
                            </tbody>
                        </table>
                    </div>
                </div>
            `;
            
            reportDetails.innerHTML = tableHTML;
        }
        
        // Generate sales report
        function generateSalesReport(filteredSales, reportTitle) {
            const totalSales = filteredSales.reduce((sum, sale) => sum + sale.finalAmount, 0);
            const totalPaid = filteredSales.reduce((sum, sale) => sum + sale.paidAmount, 0);
            const totalPending = filteredSales.reduce((sum, sale) => sum + sale.pendingAmount, 0);
            const totalDiscount = filteredSales.reduce((sum, sale) => sum + sale.totalDiscount, 0);
            
            document.getElementById('report-summary').innerHTML = `
                <div class="animate__animated animate__fadeIn">
                    <h5>${reportTitle}</h5>
                    <div class="mt-4">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total Sales:</span>
                            <strong>₹${totalSales.toLocaleString()}</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total Paid:</span>
                            <strong class="text-success">₹${totalPaid.toLocaleString()}</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total Pending:</span>
                            <strong class="text-warning">₹${totalPending.toLocaleString()}</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total Discount:</span>
                            <strong class="text-danger">₹${totalDiscount.toLocaleString()}</strong>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <span>Number of Sales:</span>
                            <strong>${filteredSales.length}</strong>
                        </div>
                    </div>
                </div>
            `;
            
            const reportDetails = document.getElementById('report-details');
            
            if (filteredSales.length === 0) {
                reportDetails.innerHTML = `
                    <div class="text-center text-muted py-5">
                        <i class="fas fa-chart-pie fa-3x mb-3"></i><br>
                        No sales found for selected period
                    </div>
                `;
                return;
            }
            
            let tableHTML = `
                <div class="table-responsive animate__animated animate__fadeIn">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>Amount</th>
                                <th>Paid</th>
                                <th>Pending</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
            `;
            
            filteredSales.forEach(sale => {
                tableHTML += `
                    <tr>
                        <td>${sale.date}</td>
                        <td>${sale.customerName}</td>
                        <td>₹${sale.finalAmount.toLocaleString()}</td>
                        <td>₹${sale.paidAmount.toLocaleString()}</td>
                        <td>₹${sale.pendingAmount.toLocaleString()}</td>
                        <td>
                            <span class="status-badge ${sale.paymentStatus === 'received' ? 'status-received' : 'status-pending'}">
                                ${sale.paymentStatus === 'received' ? 'Paid' : 'Pending'}
                            </span>
                        </td>
                    </tr>
                `;
            });
            
            tableHTML += `
                        </tbody>
                    </table>
                </div>
            `;
            
            reportDetails.innerHTML = tableHTML;
        }
        
        // Show notification
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `alert alert-${type === 'success' ? 'success' : type === 'warning' ? 'warning' : type === 'error' ? 'danger' : 'info'} 
                                     alert-dismissible fade show position-fixed`;
            notification.style.cssText = 'top: 20px; right: 20px; z-index: 1000; min-width: 300px;';
            notification.innerHTML = `
                <strong>${type === 'success' ? 'Success!' : type === 'warning' ? 'Warning!' : type === 'error' ? 'Error!' : 'Info!'}</strong> ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }
    </script>
</body>
</html>