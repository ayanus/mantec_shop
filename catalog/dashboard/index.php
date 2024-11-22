<style>
    .img-head {
        width: 100%; 
        height: 300px; 
        overflow: hidden; 
        position: relative; 
        /* background-color: black; */
    }

    .img-head img {
        width: 120%; 
        height: auto; 
        position: absolute; 
        top: 50%; 
        left: 50%; 
        transform: translate(-50%, -50%); /* กำหนดระยะของเนื้อหา */
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
    }

    .text-head h1 {
        font-size: 50px; 
        font-weight: bold;
        margin: 20px;
    }

    .text-head p {
        font-size: 18px; 
        /* margin-top: 20px; */
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
            <h1>88 COMTECH IT</h1>
            <p>คอมพิวเตอร์เสีย เปิดไม่ติด ภาพไม่ขึ้นจอ จอฟ้า แบตเตอรี่เสื่อม Keyborad ใช้งานไม่ได้ <br> 
            ลง Driver ไม่ได้ เครื่องปริ๊นท์ภาพไม่ชัด </p>
        </div>
        <img src="https://www.computersmobile.com.au/wp-content/uploads/2016/11/shop.jpg" alt="logo">
    </div>

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

    <div class="product pt-3">
        <h1 class="text-center">PRODUCT</h1>
    </div>

    
    
</body>