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
        width: 80%; 
        height: auto; 
        overflow: hidden; 
        display: flex;
        justify-content: space-between; 
        align-items: center; 
        margin: auto; 
        padding: 10px;
    }

    .img-main img {
        width: 30%; 
        height: auto; 
        border-radius: 10px; 
    }

    .service {
        text-align: center;
        margin: 20px auto;
        padding: 20px;
    }

    .service-title {
        display: inline-flex;
        align-items: center;
        gap: 30px;
    }

    .vertical-line {
        width: 1px;
        height: 80px;
        background-color: black;
    }

    .card {
        height: 100%; 
        display: flex;
        flex-direction: column;
    }

    .card-img-top {
        height: 200px;
        object-fit: cover; 
    }

    .card-body {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between; 
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
        border: 2px solid #ddd;
        border-radius: 8px; 
        width: 130px; 
        height: 90px; 
        display: flex; 
        justify-content: center; 
        align-items: center; 
        overflow: hidden; 
        margin: auto; 
        padding: 0; 
        cursor: pointer;
        transition: transform 0.3s ease-in-out; 

    }

    .brand-box a {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
        text-decoration: none;
    }

    .brand-box img {
        width: 70%; 
        height: 70%; 
        object-fit: contain;
        transition: transform 0.3s ease;
    }

    .manual {
        background-color: #CFCFCF;
    }

    .order-list {
        display: grid;
        grid-template-columns: repeat(2, 1fr); /* แบ่งเป็น 2 คอลัมน์ */
        gap: 15px; /* ระยะห่างระหว่างรายการ */
        list-style-position: inside; /* ให้เลขอยู่ด้านใน */
        padding: 0; /* ลบ padding */
        text-align: left;
        max-width: 400px; /* ปรับขนาดให้พอดี */
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
                $query =  mysqli_query($connection, "SELECT product.img, product_type.type_name, product.product_type_id FROM product 
                                                    JOIN product_type ON product.product_type_id = product_type.type_id
                                                    WHERE product_id IN (SELECT MIN(product_id)FROM product GROUP BY product_type_id)
                                                    AND product_type.type_name != 'อะไหล่ส่วนอื่น'");

                $rows = mysqli_num_rows($query);
            ?>
            <div class="container container-custom pt-4">
                <?php if ($rows > 0): ?> <!-- ตรวจสอบว่ามีแถวข้อมูล -->
                    <div class="row row-cols-2 row-cols-md-4 g-4">
                        <?php while($product = mysqli_fetch_assoc($query)): ?> <!-- ใช้ $rows ที่กำหนดจาก query -->
                            <div class="col">
                                <div class="card ">
                                    <a href="?page=product&product_type_id=<?= $product['product_type_id'] ?>">
                                        <img src="admin/upload/product/<?php echo $product['img']?>" class="card-img-top" alt="Product image">
                                    </a>
                                <div class="card-body">
                                        <h5 class="card-title fs-6 text-center"><?= $product['type_name'] ?></h5>
                                        <!-- <p class="card-text text-muted"><?= $product['detail'] ?></p> -->
                                    </div>
                                </div>
                            </div> 
                        <?php endwhile; ?>
                    </div>
                    <?php else: ?>
                        <p class="text-center text-muted">ไม่มีสินค้าในระบบ</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="brand pt-3 pb-5">
            <h1 class="text-center">BRAND</h1>

            <?php
                $query =  mysqli_query($connection, "SELECT * FROM brand");
                $rows = mysqli_num_rows($query);
            ?>

            <div class="brand-custom pt-4">
            <?php if ($rows > 0): ?> <!-- ตรวจสอบว่ามีแถวข้อมูล -->
                <div class="row row-cols-md-7 g-4">                    
                        <?php while($brand = mysqli_fetch_assoc($query)): ?> <!-- ใช้ $rows ที่กำหนดจาก query -->
                            <div class="col">
                                <div class="brand-box">
                                    <a href="?page=product&brand_id=<?php echo $brand['brand_id']?>">                                    
                                        <img src="admin/upload/brand/<?php echo $brand['brand_img']?>" class="img-fluid" alt="brand image">
                                    </a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                </div>
                    <?php else: ?>
                        <p class="text-center text-muted">ไม่มีแบรนด์ในระบบ</p>
                    <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="manual">
        <div class="container py-4">
            <div class="row">
                <div class="col d-flex flex-column align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                    </svg>
                    <span class="fw-bold fs-6 pt-2">วิธีการสั่งซื้อ</span>
                    <ol class="order-list pt-4" style="color: #363636;">
                        <li>รับชมตัวอย่างสินค้า</li>
                        <li>เลือกสินค้าที่ต้องการ</li>
                        <li>เพิ่มสินค้าลงในตะกร้า</li>
                        <li>ตรวจสอบสินค้า</li>
                        <li>ยืนยันการสั่งซื้อสินค้า</li>
                        <li>ติดต่อผู้ขายผ่าน Line</li>
                    </ol>
                </div>

                <div class="col d-flex flex-column align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wrench-adjustable" viewBox="0 0 16 16">
                        <path d="M16 4.5a4.5 4.5 0 0 1-1.703 3.526L13 5l2.959-1.11q.04.3.041.61"/>
                        <path d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.5 4.5 0 0 0 11.5 9m-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376M3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                    </svg>
                    <span class="fw-bold fs-6 pt-2">วิธีใช้บริการ</span>
                    <ol class="d-flex flex-column gap-3 pt-4 mb-3" style="color: #363636;">
                        <li>ชมบริการ / ประสบการณ์การทำงาน</li>
                        <li>ติดต่อผู้ให่บริการผ่าน Line</li>
                    </ol>
                </div>

                <div class="col d-flex flex-column align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                    </svg>
                    <span class="fw-bold fs-6 pt-2">เวลาทำการ</span>
                    <div class="mt-3">
                        <table class="table table-borderless bg-transparent">
                            <tbody>
                                <tr>
                                    <td class="text-center bg-transparent" style="color: #363636;">วันจันทร์-วันศุกร์</td>
                                    <td class="bg-transparent" style="color: #363636;">เวลา 08.30 - 17.00 น.</td>
                                </tr>
                                <tr>
                                    <td class="text-center bg-transparent" style="color: #363636;">วันเสาร์</td>
                                    <td class="bg-transparent" style="color: #363636;">เวลา 09.00 - 17.00 น.</td>
                                </tr>
                                <tr>
                                    <td class="text-center bg-transparent" style="color: #363636;">วันอาทิตย์</td>
                                    <td class="bg-transparent" style="color: #363636;">ปิดทำการ</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</body>