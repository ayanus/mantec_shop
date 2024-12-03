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
</style>

<body>
    <div class="img-head">
        <div class="text-head">
            <h5>88 COMTECH IT</h5>
            <p>มุ่งมั่นพัฒนาทักษะการบริการสู่มาตราฐานสากล และจัดหาแหล่งอะไหล่คุณภาพดี ราคาเหมาะสม</p>
        </div>
        <img src="https://www.computersmobile.com.au/wp-content/uploads/2016/11/shop.jpg" alt="logo">
    </div>

    <div class="container">
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

         <!-- สินค้าไม่แสดง -->
        <div class="product pt-3 pb-5">
            <h1 class="text-center">PRODUCT</h1>
            <div class="row">
                <?php if($row > 0): ?>
                    <?php while($product = mysqli_fetch_assoc($query)): ?>
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                        <?php if(!empty($product['img'])): ?>
                                <img src="imgs/<?= $product['img']; ?>" width="100">
                            <?php else: ?>
                                <img src="imgs/no-image.jpg"  width="100">
                            <?php endif; ?>

                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product['name']; ?></h5>
                                <p class="card-text text-muted"><?php echo nl2br($product['description']); ?></p>
                                <p class="card-text text-danger"><?php echo number_format($product['price'],2); ?></p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="brand">
            <h1 class="text-center">BRAND</h1>
            <div class="row">
                
            </div>
        </div>
    </div>

    
    
</body>