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
</style>

<body>
    <div class="img-head">
        <div class="text-head">
            <h5>CONTACT US</h5>
            <p>คอมพิวเตอร์เสีย เปิดไม่ติด ภาพไม่ขึ้นจอ จอฟ้า แบตเตอรี่เสื่อม Keyborad ใช้งานไม่ได้ ลง Driver ไม่ได้ เครื่องปริ๊นท์ภาพไม่ชัด </p>
        </div>
        <img src="https://i.pinimg.com/736x/5f/72/3e/5f723ea239423933d07740830d174011.jpg" alt="logo">
    </div>
    <div class="container">
        <div class="head text-center my-5">
            <h2 class="fw-bold">ติดต่อเรา</h2>
            <p>computer service</p>
        </div>

        <div class="maps d-flex justify-content-center mb-5">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.018234686122!2d100.47743587454173!3d7.007135417355213!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304d29108612986d%3A0xdece4bd1d4405e0c!2z4Lia4Lij4Li04Lip4Lix4LiXIDg4IOC4hOC4reC4oeC5gOC4l-C4hCDguYTguK3guJfguLUg4LiI4Liz4LiB4Lix4LiU!5e0!3m2!1sth!2sth!4v1733213438891!5m2!1sth!2sth"
                width="1020" 
                height="500" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>                
        </div>

        <div class="click text-center mb-5 fw-bold">
            <p>คลิกเพื่อติดต่อ</p>
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="https://liff.line.me/1645278921-kWRPP32q/?accountId=mantec" target="_blank">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/41/LINE_logo.svg/1024px-LINE_logo.svg.png" style="width: 50px; ">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www.facebook.com/88comtech.it" target="_blank">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/2021_Facebook_icon.svg/768px-2021_Facebook_icon.svg.png" style="width: 50px; ">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mailto:service@mantec.com" target="_blank">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Gmail_icon_%282020%29.svg/2560px-Gmail_icon_%282020%29.svg.png" style="width: 61px; ">
                    </a>
                </li>
            </ul>
                
            </div>
        </div>
    </div>
</body>