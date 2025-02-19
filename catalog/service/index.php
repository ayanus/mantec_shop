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
            <h5>SERVICE</h5>
            <p>คอมพิวเตอร์เสีย เปิดไม่ติด ภาพไม่ขึ้นจอ จอฟ้า แบตเตอรี่เสื่อม Keyborad ใช้งานไม่ได้ ลง Driver ไม่ได้ เครื่องปริ๊นท์ภาพไม่ชัด </p>
        </div>
        <img src="https://www.ซ่อมโน้ตบุ๊คหาดใหญ่.com/images/upload/gallery/thumbs/e44676d3e14f1d4f7a5b5c1cd9eecd82.jpg" alt="logo">
    </div>

    <div class="container container-custom my-5">

        <div class="text-center px-5 py-5">
            <span class="fw-bold fs-5">มุ่งเน้นให้ลูกค้าได้ใช้งานอุปกรณ์ไอที ที่มีประสิทธิภาพ พร้อมใช้งานตลอดเวลา<br>ในราคาที่เหมาะสมและคุ้มค่า รองรับยุคธุรกิจพอเพียง</span>
        </div>

        <hr>

        <?php
            $sql = "SELECT * FROM service;";
            $query = mysqli_query($connection, $sql);
            $row = $query->num_rows;
        ?>

        <?php if ($row > 0): ?>
            <div class="row mb-2">
                <?php 
                $counter = 0; // ตัวนับเพื่อสลับตำแหน่ง
                foreach ($query as $data): 
                    $isReversed = $counter % 2 == 1; // สลับด้านเมื่อ $counter เป็นเลขคี่
                ?>
                    <div class="col-md-12 my-5">
                        <div class="row g-0 overflow-hidden flex-md-row mb-4 h-md-250 position-relative">
                            <?php if ($isReversed): ?>
                                <!-- ซ้าย -->
                                <div class="col-auto d-none d-lg-block">
                                    <img src="admin/upload/service/<?php echo $data['img']; ?>" alt="Service Image" class="img-fluid w-100 rounded-5" style="height: 350px; object-fit: cover;">
                                </div>
                                <div class="col py-5 d-flex flex-column position-static text-end">
                                    <h3 class="text-center"><?php echo $data['service_name']; ?></h3>
                                    <p class="card-text mb-auto text-center px-5 d-flex align-items-center justify-content-center" style="height: 100%;"><?php echo $data['detail']; ?></p>
                                    <div class="d-flex justify-content-end me-md-5">
                                        <a href="#" class="btn btn-danger">Contact us</a>
                                    </div>
                                </div>
                            <?php else: ?>
                                <!-- ขวา -->
                                <div class="col py-5 d-flex flex-column position-static">
                                    <h3 class="text-center"><?php echo $data['service_name']; ?></h3>
                                    <p class="card-text mb-auto text-center px-5 d-flex align-items-center justify-content-center" style="height: 100%;"><?php echo $data['detail']; ?></p>
                                    <div class="d-flex justify-content-start ms-md-5">
                                        <a href="#" class="btn btn-danger">Contact us</a>
                                    </div>
                                </div>
                                <div class="col-auto d-none d-lg-block">
                                    <img src="admin/upload/service/<?php echo $data['img']; ?>" alt="Service Image" class="img-fluid w-100 rounded-5" style="height: 350px; object-fit: cover;">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php $counter++;?>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="alert alert-warning" role="alert">
                ไม่พบข้อมูลการบริการ
            </div>
        <?php endif; ?>

    </div>
</body>