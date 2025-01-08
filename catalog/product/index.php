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

    .container-custom {
        padding-left: 150px;
        padding-right: 150px;
    }

</style>

<body>
    <div class="img-head">
        <div class="text-head">
            <h5>PRODUCT</h5>
            <p>มุ่งเน้นให้ลูกค้าได้ใช้งานอุปกรณ์ไอที ที่มีประสิธิภาพ พร้อมใช้งานตลอดเวลา ในราคาที่เหมาะสมและคุ้มค่า รองรับยุคธุรกิจพอเพียง</p>
        </div>
        <img src="https://www.ซ่อมโน้ตบุ๊คหาดใหญ่.com/images/upload/gallery/thumbs/00e6b31c4b42a9b0d679911ff0a1aca9.jpg" alt="logo">
    </div>

    <div class="container container-custom my-4">

        <?php

            $brand_name = isset($_GET['brand']) ? $_GET['brand'] : null;

            if ($brand_name) {
                // Query สินค้าเฉพาะแบรนด์
                $stmt = $connection->prepare("SELECT * FROM product WHERE brand_id = ?");
                $stmt->bind_param("i", $brand_id);
                $stmt->execute();
                $result = $stmt->get_result();
            } else {
                // Query สินค้าทั้งหมดในกรณีไม่ได้เลือกแบรนด์
                $result = $connection->query("SELECT * FROM product");
            }
            $rows = $result->num_rows;        
        ?>

        <?php if ($rows > 0): ?> <!-- ตรวจสอบว่ามีแถวข้อมูล -->
            <div class="row row-cols-1 row-cols-md-4 g-4 mb-5 ">
                <?php while ($product = $result->fetch_assoc()): ?>
                    <div class="col">
                        <div class="card">
                            <?php if(!empty($product['img'])): ?>
                                <img src="admin/upload/product/<?php echo $product['img']?>" class="card-img-top" alt="Product image">
                            <?php else: ?>
                                <img src="https://static.vecteezy.com/system/resources/thumbnails/022/059/000/small_2x/no-image-available-icon-vector.jpg" class="card-img-top" alt="...">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title fs-6"><?= $product['product_name'] ?></h5>
                                <p class="card-text text-danger mb-0 fw-bold">฿ <?= $product['price'] ?></p>
                                <a href="#?id=<?php echo $product['product_id']?>" class="btn btn-danger mt-2">เพิ่มลงตะกร้า</a>
                            </div>
                        </div>
                    </div> 
                <?php endwhile; ?>
            </div>
            <?php else: ?>
                <p class="text-center text-muted">ไม่มีสินค้าตามประเภทที่เลือก</p>
        <?php endif; ?>
    </div>
</body>