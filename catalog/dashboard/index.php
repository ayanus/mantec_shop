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

    .main {
        margin-top: 30px;
    }

    .img-main {
        width: 80%; /* กำหนดความกว้างของบล็อค */
        height: auto; /* กำหนดความสูงของบล็อค */
        overflow: hidden; /* ซ่อนรูปภาพที่ล้น */
        display: flex; /* ใช้ Flexbox จัดการเลย์เอาต์ */
        justify-content: space-between; /* กระจายรูปภาพแบบมีระยะห่าง */
        align-items: center; /* จัดให้อยู่กึ่งกลางแนวตั้ง */
        margin: auto; /* ทำให้บล็อคอยู่ตรงกลาง */
        padding: 10px;
    }

    .img-main img {
        width: 30%; /* รูปภาพแต่ละภาพมีความกว้าง 30% */
        height: auto; /* รักษาสัดส่วนของรูป */
        border-radius: 10px; /* มุมมน */
    }

    .service {
        text-align: center;
        margin: 20px auto;
        padding: 20px;
    }

    .service-title {
        display: inline-flex;
        align-items: center;
        gap: 30px; /* ระยะห่างระหว่างข้อความและเส้น */
    }

    .vertical-line {
        width: 1px;
        height: 80px;
        background-color: black;
    }

    .card {
        height: 100%; /* ทำให้ทุก Card มีความสูงเท่ากัน */
        display: flex;
        flex-direction: column; /* จัดเรียงภายใน Card แบบแนวตั้ง */
    }

    .card-img-top {
        height: 200px; /* กำหนดความสูงของรูปภาพ */
        object-fit: cover; /* ป้องกันการบิดเบี้ยวและครอบภาพให้พอดี */
    }

    .card-body {
        flex-grow: 1; /* ให้เนื้อหาด้านในขยายตัวตามพื้นที่ที่เหลือ */
        display: flex;
        flex-direction: column;
        justify-content: space-between; /* จัดให้ปุ่มอยู่ล่างสุด */
    }

    .card-title {
        font-size: 1.1rem;
        margin-bottom: 0.5rem;
    }

    .card-text {
        font-size: 0.9rem;
    }

    .container-custom {
        padding-left: 150px;
        padding-right: 150px;
    }

    .brand-custom {
        padding-left: 70px;
        padding-right: 70px;
    }

    .brand-box {
        border: 2px solid #ddd; /* เส้นกรอบสีเทา */
        border-radius: 8px; /* มุมกรอบโค้งมน */
        width: 130px; 
        height: 90px; 
        display: flex; /* จัดวางรูปภาพให้อยู่ตรงกลาง */
        justify-content: center; /* จัดให้อยู่กึ่งกลางแนวนอน */
        align-items: center; /* จัดให้อยู่กึ่งกลางแนวตั้ง */
        overflow: hidden; /* ซ่อนส่วนที่ล้นออกจากกรอบ */
        margin: auto; /* ทำให้กรอบอยู่กึ่งกลางคอลัมน์ */
        padding: 10px; /* ระยะห่างของรูปภาพกับกรอบ */
        cursor: pointer; /* เปลี่ยนเมาส์เป็นรูปนิ้วชี้ */
        transition: transform 0.3s ease-in-out; /* เพิ่มการขยับแบบ Smooth */    
    }

    .brand-box a {
        display: block; /* ทำให้ <a> เป็น block เต็มพื้นที่ของ .brand-box */
        width: 100%;
        height: 100%;
        text-decoration: none; /* เอาขีดเส้นใต้ลิงก์ออก */
    }

    .brand-box a img {
        max-width: 100%; /* ปรับขนาดรูปให้พอดีกรอบ */
        max-height: 100%; /* ปรับขนาดรูปให้พอดีกรอบ */
        object-fit: contain; /* รักษาสัดส่วนของรูปภาพ */
        transition: transform 0.3s ease;
    }

    .brand-box:hover {
        transform: translateY(-10px); /* ขยับขึ้นเล็กน้อย */
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2); /* เพิ่มเงา */
    }

    .brand-box:hover img {
        transform: scale(1.05); /* ขยายภาพขึ้นเล็กน้อย */
    }
</style>

<body>
    <div class="img-head">
        <div class="text-head">
            <h5>88 COMTECH IT</h5>
            <p>มุ่งมั่นพัฒนาทักษะการบริการสู่มาตราฐานสากล และจัดหาแหล่งอะไหล่คุณภาพดี ราคาเหมาะสม</p>
        </div>
        <img src="https://www.computersmobile.com.au/wp-content/uploads/2016/11/shop.jpg" alt="logo">
    </div>

    <div class="container ">
        <div class="main">
            <div class="text-main">
                <h1 class="text-center">DELL</h1>
                <p class="text-center">SEVICE PROVIDER</p>
            </div>
            <div class="img-main pt-2">
                <img src="https://www.mantec-g.com/wp-content/uploads/2022/12/%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B8%81%E0%B8%B1%E0%B8%99.png" alt="...">
                <img src="https://www.mantec-g.com/wp-content/uploads/2023/01/v-3910.png" alt="...">
                <img src="https://www.mantec-g.com/wp-content/uploads/2022/12/%E0%B8%A3%E0%B8%B2%E0%B8%A2%E0%B8%A5%E0%B8%B0%E0%B9%80%E0%B8%AD%E0%B8%B5%E0%B8%A2%E0%B8%94-_-%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B8%81%E0%B8%B1%E0%B8%99.png" alt="...">
            </div>
        </div>

        <div class="service">
            <h5>
                <div class="service-title">
                    บริการจำหน่ายอะไหล่
                    <div class="vertical-line"></div>
                    บริการเคลมสินค้า
                    <div class="vertical-line"></div>
                    บริการต่อประกัน
                    <div class="vertical-line"></div>
                    บริการรักษาเชิงป้องกัน
                </div>
            </h5>
        </div>

        <div class="product pt-3 pb-5">
            <h1 class="text-center">PRODUCT</h1>

            <?php
                $query =  mysqli_query($connection, "SELECT * FROM sp_product WHERE id IN (SELECT MIN(id)FROM sp_product GROUP BY type)");
                $rows = mysqli_num_rows($query);
            ?>
            <div class="container container-custom pt-4">
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    <?php if ($rows > 0): ?> <!-- ตรวจสอบว่ามีแถวข้อมูล -->
                        <?php while($product = mysqli_fetch_assoc($query)): ?> <!-- ใช้ $rows ที่กำหนดจาก query -->
                            <div class="col">
                                <div class="card ">
                                    <?php if(!empty($product['img'])): ?>
                                        <img src="admin/upload/product/<?php echo $product['img']?>" class="card-img-top" alt="Product image">
                                    <?php else: ?>
                                        <img src="https://static.vecteezy.com/system/resources/thumbnails/022/059/000/small_2x/no-image-available-icon-vector.jpg" class="card-img-top" alt="...">
                                    <?php endif; ?>
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
        </div>

        <div class="brand pt-3 pb-5">
            <h1 class="text-center">BRAND</h1>

            <?php
                $query =  mysqli_query($connection, "SELECT * FROM brand");
                $rows = mysqli_num_rows($query);
            ?>

            <div class="container brand-custom pt-4">
                <div class="row g-4">                    
                    <?php if ($rows > 0): ?> <!-- ตรวจสอบว่ามีแถวข้อมูล -->
                        <?php while($brand = mysqli_fetch_assoc($query)): ?> <!-- ใช้ $rows ที่กำหนดจาก query -->
                            <div class="col">
                                <div class="brand-box">
                                    <a href="product_by_brand.php?brand_id=<?php echo $brand['brand_id']; ?>">                                        
                                        <img src="admin/upload/brand/<?php echo $brand['brand_img']?>" class="img-fluid" alt="brand image">
                                    </a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p class="text-center text-muted">ไม่มีแบรนด์</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
</body>