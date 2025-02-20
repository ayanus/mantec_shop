<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>

<style>
    .img-head {
        width: 100%;
        height: 50vh;
        overflow: hidden;
        position: relative;
    }

    .img-head img {
        width: 100%; /* ปรับความกว้างให้เข้ากับหน้าจอ */
        height: 100%;
        object-fit: cover; /* ปรับขนาดรูปให้เต็มพื้นที่ */
        position: absolute;
        top: 0;
        left: 0;
        /* transform: translate(-50%, -50%); */
        opacity: 0.6;
        filter: brightness(45%);
    }

    .text-head {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        text-align: center;
        z-index: 1;
        padding: 10px;
    }

    .text-head h5 {
        font-size: 2.5rem; /* ใช้หน่วย rem เพื่อรองรับ responsive */
        font-weight: bold;
        margin: 10px;
    }

    .text-head p {
        font-size: 1rem;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .img-head {
            height: 40vh;
        }

        .text-head h5 {
            font-size: 2rem;
        }

        .text-head p {
            font-size: 0.9rem;
        }
    }

    @media (max-width: 480px) {
        .img-head {
            height: 50vh;
        }

        .text-head h5 {
            font-size: 1.5rem;
        }

        .text-head p {
            font-size: 0.8rem;
        }
    }

    @media (max-width: 576px) {
        .card-title {
            font-size: 1rem;
        }
        .card-text {
            font-size: 0.875rem;
        }
        .btn {
            font-size: 0.875rem;
        }
    }

    .container-custom {
        padding-left: 100px;
        padding-right: 100px;
    }

    input[type="number"].no-spinner {
            -moz-appearance: textfield;
            -webkit-appearance: none;
            appearance: none;
    }
    input[type="number"].no-spinner::-webkit-inner-spin-button,
    input[type="number"].no-spinner::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .text-truncate-2 {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        -webkit-line-clamp: 2;
        line-clamp: 2;
        height: calc(1.5em * 2);
    }

    .pagination {
    padding: 0;
    list-style: none;
    display: flex;
    gap: 5px;
    }

    /* .card {
        position: relative;
        cursor: pointer;
    } */
    .card img {
        height: 200px;
        object-fit: cover;
    }

</style>

<body class="hidden">
    <div class="img-head">
        <div class="text-head">
            <h5>PRODUCT</h5>
            <p>มุ่งเน้นให้ลูกค้าได้ใช้งานอุปกรณ์ไอที ที่มีประสิธิภาพ พร้อมใช้งานตลอดเวลา ในราคาที่เหมาะสมและคุ้มค่า รองรับยุคธุรกิจพอเพียง</p>
        </div>
        <img src="https://www.ซ่อมโน้ตบุ๊คหาดใหญ่.com/images/upload/gallery/thumbs/00e6b31c4b42a9b0d679911ff0a1aca9.jpg" alt="logo">
    </div>

    <div class="container container-custom my-4">

        <?php
            // ตรวจสอบว่ามีการส่งค่าตัวแปร page มาหรือไม่
            $current_page = isset($_GET['page']) ? $_GET['page'] : 'home';
            $brand_id = isset($_GET['brand_id']) ? $_GET['brand_id'] : null;
            $product_type_id = isset($_GET['product_type_id']) ? $_GET['product_type_id'] : null;
            
            $brand_name = '';
            $product_type_name = '';

            if ($brand_id) {
                $stmt = $connection->prepare("SELECT brand_name FROM brand WHERE brand_id = ?");
                $stmt->bind_param("i", $brand_id);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($row = $result->fetch_assoc()) {
                    $brand_name = $row['brand_name'];
                }
            }
            
            if ($product_type_id) {
                $stmt = $connection->prepare("SELECT type_name FROM product_type WHERE type_id = ?");
                $stmt->bind_param("i", $product_type_id);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($row = $result->fetch_assoc()) {
                    $product_type_name = $row['type_name'];
                }
            }

            if ($brand_id && $product_type_id) {
                // Query สินค้าตามแบรนด์และประเภทสินค้า
                $stmt = $connection->prepare("SELECT * FROM product WHERE brand_id = ? AND product_type_id = ?");
                $stmt->bind_param("ii", $brand_id, $product_type_id);
            } elseif ($brand_id) {
                // Query สินค้าเฉพาะแบรนด์
                $stmt = $connection->prepare("SELECT * FROM product WHERE brand_id = ?");
                $stmt->bind_param("i", $brand_id);
            } elseif ($product_type_id) {
                // Query สินค้าเฉพาะประเภทสินค้า
                $stmt = $connection->prepare("SELECT * FROM product WHERE product_type_id = ?");
                $stmt->bind_param("i", $product_type_id);
            } else {
                // Query สินค้าทั้งหมดในกรณีไม่ได้เลือกแบรนด์หรือประเภทสินค้า
                $stmt = $connection->prepare("SELECT * FROM product");
            }

            $stmt->execute();
            $result = $stmt->get_result();
            $rows = $result->num_rows;      
        ?>

        <div id="product-list">
            <div class="row mb-4">
                <div class="col-6 d-flex flex-column justify-content-center ">
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "><a href="?page=home" class="text-decoration-none text-dark">หน้าหลัก</a></li>
                            <?php if ($brand_name): ?>
                                <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($brand_name) ?></li>
                            <?php endif; ?>
                            <?php if ($product_type_name): ?>
                                <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($product_type_name) ?></li>
                            <?php endif; ?>
                        </ol>
                    </nav>
                </div>

                <div class="col-4 ms-auto justify-content-end align-items-end">
                    <div class="search-container">
                        <input class="search form-control" placeholder="ค้นหา...">
                    </div>
                </div>
            </div>
        

            <?php if ($rows > 0): ?> <!-- ตรวจสอบว่ามีแถวข้อมูล -->
                <div class="list row row-cols-3 row-cols-md-4 g-4">
                    <?php while ($product = $result->fetch_assoc()): ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">                            
                            <div class="card h-100">
                                <a href="index.php?page=detail&product_id=<?= $product['product_id'] ?>&brand_id=<?= $product['brand_id'] ?>" class="text-decoration-none">
                                    <?php if(!empty($product['img'])): ?>
                                        <img src="admin/upload/product/<?php echo $product['img']?>" class="card-img-top img-fluid" alt="Product image" style="height: 200px; object-fit: cover;">
                                    <?php else: ?>
                                        <img src="https://static.vecteezy.com/system/resources/thumbnails/022/059/000/small_2x/no-image-available-icon-vector.jpg" class="card-img-top img-fluid" alt="..." style="height: 200px; object-fit: cover;">
                                    <?php endif; ?>
                                </a>
                                <div class="card-body d-flex flex-column">
                                    <a href="index.php?page=detail&product_id=<?= $product['product_id'] ?>" class="text-decoration-none text-dark">
                                        <h class="text-muted product-id" style="font-size: 80%;"><?= str_pad($product['product_id'], 4, "0", STR_PAD_LEFT) ?></h>
                                        <p class="card-title text-truncate-2 product-name" style="font-size: 95%;" title="<?= $product['product_name'] ?>"><?= $product['product_name'] ?></p>
                                    </a>
                                    <p class="card-text text-danger fw-bold product-price">฿ <?= number_format($product['price']) ?></p>
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <div class="col-6">
                                            <div class="d-flex align-items-center justify-content-between ">
                                                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="decrement(<?= $product['product_id'] ?>)">-</button>
                                                <input type="number" id="quantity-<?= $product['product_id'] ?>" class="form-control text-center no-spinner" value="0" min="0" style="width: 50px;">
                                                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="increment(<?= $product['product_id'] ?>)">+</button>
                                            </div>

                                            <script>
                                                function increment(productId) {
                                                    const quantityInput = document.getElementById(`quantity-${productId}`);
                                                    let currentValue = parseInt(quantityInput.value) || 0;
                                                    quantityInput.value = currentValue + 1;
                                                }

                                                function decrement(productId) {
                                                    const quantityInput = document.getElementById(`quantity-${productId}`);
                                                    let currentValue = parseInt(quantityInput.value) || 0;
                                                    if (currentValue > 0) {
                                                        quantityInput.value = currentValue - 1;
                                                    }
                                                }
                                            </script>
                                        </div>

                                        <div class="col-6">
                                            <a href="cart/add-cart.php?id=<?php echo $product['product_id']?>" class="btn btn-danger d-block">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                                    <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9z"/>
                                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                                                </svg>
                                                <!-- <span>เพิ่มตะกร้าสินค้า</ห> -->
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div> 
                    <?php endwhile; ?>
                </div>
                <?php else: ?>
                    <p class="text-center text-muted">ไม่มีสินค้าตามประเภทที่เลือก</p>
            <?php endif; ?>
            
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
    const options = {
        valueNames: ["product-id", "product-name", "product-price"],
    };

    // สร้างรายการสินค้าและ pagination ด้วย List.js
    const productList = new List("product-list", options);
    });
    </script>
    
</body>