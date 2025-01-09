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
        width: 80%; 
        height: 80%; 
        object-fit: contain;
        transition: transform 0.3s ease;
    }

    .brand-box:hover {
        transform: translateY(-10px); 
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    }

    .brand-box:hover img {
        transform: scale(1.05);
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
                $query =  mysqli_query($connection, "SELECT product.img, product_type.type_name  FROM product 
                                                    JOIN product_type ON product.product_type_id = product_type.type_id
                                                    WHERE product_id IN (SELECT MIN(product_id)FROM product GROUP BY product_type_id)
                                                    AND product_type.type_name != 'อะไหล่ส่วนอื่น'");

                $rows = mysqli_num_rows($query);
            ?>
            <div class="container container-custom pt-4">
                <?php if ($rows > 0): ?> <!-- ตรวจสอบว่ามีแถวข้อมูล -->
                    <div class="row row-cols-1 row-cols-md-4 g-4">
                        <?php while($product = mysqli_fetch_assoc($query)): ?> <!-- ใช้ $rows ที่กำหนดจาก query -->
                            <div class="col">
                                <div class="card ">
                                    <?php if(!empty($product['img'])): ?>
                                        <img src="admin/upload/product/<?php echo $product['img']?>" class="card-img-top" alt="Product image">
                                    <?php else: ?>
                                        <img src="https://static.vecteezy.com/system/resources/thumbnails/022/059/000/small_2x/no-image-available-icon-vector.jpg" class="card-img-top" alt="...">
                                    <?php endif; ?>
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
                                    <a href="?page=product&brand=<?php echo $brand['brand_name']?>">                                    
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

        <div class="manual">
            
        </div>

    </div>
</body>