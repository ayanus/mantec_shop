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
</body>