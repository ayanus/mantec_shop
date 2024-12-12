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

    <div class="container container-custom my-3">

        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <ol class="breadcrumb py-2">
                <li class="breadcrumb-item"><a href="https://hardwarehot.com/"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page"> </li>
            </ol>
        </nav>

        <?php
            // $type_id = isset($_GET['type_id']) ? $_GET['type_id'] : 0;
            // if ($type_id == 0) {
            $query =  mysqli_query($connection, "SELECT * FROM sp_product");
            $rows = mysqli_num_rows($query);
        ?>

        <div class="row row-cols-1 row-cols-md-4 g-4 mb-5 ">
            <?php if ($rows > 0): ?> <!-- ตรวจสอบว่ามีแถวข้อมูล -->
                <?php while($product = mysqli_fetch_assoc($query)): ?> <!-- ใช้ $rows ที่กำหนดจาก query -->
                    <div class="col">
                        <div class="card">
                        <div class="ratio ratio-1x1">
                            <?php if(!empty($product['img'])): ?>
                                <img src="admin/upload/product/<?php echo $product['img']?>" class="card-img-top" alt="Product image">
                            <?php else: ?>
                                <img src="https://static.vecteezy.com/system/resources/thumbnails/022/059/000/small_2x/no-image-available-icon-vector.jpg" class="card-img-top" alt="...">
                            <?php endif; ?>
                        </div>
                            <div class="card-body">
                                <h5 class="card-title"><?= $product['name'] ?></h5>
                                <p class="card-text text-muted"><?= $product['description'] ?></p>
                                <p class="card-text text-danger mb-0 fw-bold">฿ <?= $product['price'] ?></p>
                                <a href="cart.php?id=<?php echo $product['id']?>" class="btn btn-danger mt-2">เพิ่มลงตะกร้า</a>
                            </div>
                        </div>
                    </div> 
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-center text-muted">ไม่มีสินค้าตามประเภทที่เลือก</p>
            <?php endif; ?>
        </div>
    </div>
</body>