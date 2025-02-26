<?php
//include "components/connection.php";
include "components/header.php";
// $stmt = $conn->prepare("SELECT * from furniture");
// $stmt->execute();
// $result = $stmt->get_result(); 
?>

<style>
    .body-class {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Arial, sans-serif;
        color: #2d3748;
    }

    .body-class {
        padding: 40px 20px;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: flex-start;
    }

    .container-class {
        max-width: 1100px;
        width: 100%;
        background: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        border: none;
        position: relative;
        overflow: hidden;
    }

    .container-class::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: linear-gradient(to right, #4f46e5, #06b6d4);
    }

    .header-class {
        padding-bottom: 20px;
        margin-bottom: 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid rgba(0,0,0,0.05);
    }

    .header-class h1 {
        color: #1e3a8a;
        font-size: 32px;
        font-weight: 700;
        margin: 0;
        letter-spacing: -0.5px;
    }

    .status-badge {
        padding: 6px 12px;
        background: #dcfce7;
        color: #15803d;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 500;
    }

    .order-info {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .info-item {
        background: #f9fafb;
        padding: 20px;
        border-radius: 8px;
        border: 1px solid #e5e7eb;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .info-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        background: #ffffff;
    }

    .info-item label {
        font-weight: 600;
        color: #6b7280;
        display: block;
        margin-bottom: 10px;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .info-item span {
        color: #1f2937;
        font-size: 16px;
        font-weight: 500;
        word-break: break-word;
    }

    .description {
        grid-column: 1 / -1;
        background: #f9fafb;
        padding: 20px;
        border-radius: 8px;
        border: 1px solid #e5e7eb;
    }

    .file-section {
        grid-column: 1 / -1;
        padding: 20px;
        background: #f9fafb;
        border-radius: 8px;
        border: 1px solid #e5e7eb;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .file-icon {
        color: #4f46e5;
        font-size: 24px;
    }

    .file-link {
        color: #4f46e5;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .file-link:hover {
        color: #3730a3;
        text-decoration: underline;
    }

    .actions {
        grid-column: 1 / -1;
        margin-top: 30px;
        display: flex;
        gap: 15px;
        justify-content: flex-end;
    }

    .btn {
        padding: 12px 30px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        font-size: 15px;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-primary {
        background: #4f46e5;
        color: white;
    }

    .btn-primary:hover {
        background: #3730a3;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(79, 70, 229, 0.3);
    }

    .btn-secondary {
        background: #e5e7eb;
        color: #374151;
    }

    .btn-secondary:hover {
        background: #d1d5db;
        transform: translateY(-3px);
    }

    @media (max-width: 768px) {
        .body-class {
            padding: 20px 10px;
        }

        .container-class {
            padding: 20px;
        }

        .order-info {
            grid-template-columns: 1fr;
        }

        .header-class {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }

        .actions {
            flex-direction: column;
            align-items: stretch;
        }
    }
</style>

<div class="body-class">
    <div class="container container-class">
        <div class="header-class">
            <h1>Order Details</h1>
            <span class="status-badge">Processing</span>
        </div>

        <div class="order-info">
            <div class="info-item">
                <label>Order ID</label>
                <span>#ORD-12345</span>
            </div>

            <div class="info-item">
                <label>Date of Order</label>
                <span>February 26, 2025</span>
            </div>

            <div class="info-item">
                <label>Name</label>
                <span>John Doe</span>
            </div>

            <div class="info-item">
                <label>Email</label>
                <span>john.doe@example.com</span>
            </div>

            <div class="info-item">
                <label>Phone</label>
                <span>+1 (555) 123-4567</span>
            </div>

            <div class="info-item">
                <label>Price</label>
                <span>$199.99</span>
            </div>

            <div class="info-item description">
                <label>Description</label>
                <span>This is a sample order description. Customer requested a custom product with specific requirements and additional features.</span>
            </div>

            <div class="file-section">
                <span class="file-icon">📎</span>
                <div>
                    <label>Attached File</label>
                    <a href="#" class="file-link">specification_document.pdf</a>
                </div>
            </div>

            <div class="actions">
                <button class="btn btn-secondary">Cancel</button>
                <button class="btn btn-primary">Update Order</button>
            </div>
        </div>
    </div>
</div>

<?php include "components/footer.php" ?>