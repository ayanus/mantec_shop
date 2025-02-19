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
        /* opacity: 0.5; */
        filter: brightness(75%);
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

    .img-body {
        width: 45%;
        height: 50vh;
        overflow: hidden;
        position: relative;
    }

</style>

<body>
    <div class="img-head mb-5">
        <div class="text-head">
            <h5>ABOUT US</h5>
        </div>
        <img src="image/8.png" alt="logo">
    </div>

    <div class="container py-5">
        <div class="d-flex justify-content-center align-items-center text-center pb-5">
            <p style="max-width: 600px;">
                <span class="fw-bold">บริษัท 88 คอมเทค ไอที จำกัด</span> 
                ได้จดทะเบียนเป็นนิติบุคคล เมื่อวันที่ 29 มิถุนายน 2565 สำนักงานตั้งอยู่เลขที่ 218/1 ถ.ประชาธิปัตย์ ตำบลหาดใหญ่ อำภอหาดใหญ่ จังหวัดสงขลา
            </p>
        </div>


        <div class="d-flex justify-content-center align-items-center text-center pt-3 pb-5">
            <p style="max-width: 600px; margin: 0 auto;">
                เป็นผู้ประกอบการวิสาหกิจขนาดกลางและขนาดย่อม (SME) ที่ได้ขึ้นบัญชีรายการพัสดุ 
                และบัญชีรายชื่อไว้กับสำนักงานส่งเสริมวิสาหกิจขนาดกลางและขนาดย่อม โดยประกอบการธุรกิจ 
                ให้บริการบำรุงรักษาซ่อม จัดหาและจัดจำหน่ายอุปกรณ์ด้านไอที โดยทีมงานที่มีประสบการณ์ 
                และความชำนาญการเฉพาะทาง และมีทีมงานเครือข่ายครอบคลุมพื้นที่ทั่วประเทศ
            </p>
        </div>

        <div class="row d-flex justify-content-center align-items-center py-5">
            <div class="img-body col-6 d-flex justify-content-center align-items-center">
                <img src="https://scontent.fhdy3-1.fna.fbcdn.net/v/t39.30808-6/465719669_528343313369687_1349349087743231948_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeFPQnKZ1eRUccgOE5DMdsfVOcqZkMiyXZw5ypmQyLJdnDnv_l6RxzbN1XtUylcFAPNyditaFt2aIPHab7o-1nIb&_nc_ohc=JB2yoSf_G1QQ7kNvgFVUAF9&_nc_oc=AdiipUsB7dB1fMcq85IW_5prdc32031U2cO1VZoxA_lNOWmHfRUfHKED1CrhFWIebSV82Hefd7pPE1nzakdejwlH&_nc_zt=23&_nc_ht=scontent.fhdy3-1.fna&_nc_gid=AztqVwPKDOoNFMte9HDEtDb&oh=00_AYCwv3ldQQmK4n8fKyrNIbZUIwtYTr7TosJX8GrGtY2i4w&oe=67B86649" class="img-thumbnail" alt="รอ">
            </div>
            <div class="col-6 d-flex flex-column justify-content-center text-center" style="max-width: 600px; margin: 0 auto;">
                <div class="pb-4">
                    <span class="fw-bold">พันธกิจ</span>
                    <p>มุ่งมั่นพัฒนาทักษะการบริการสู่มาตราฐานสากลและจัดหาแหล่งอะไหล่คุณภาพดี ราคาเหมาะสม</p>
                </div>
                <div>
                    <span class="fw-bold">วิสัยทัศน์</span>
                    <p>มุ่งเน้นให้ลูกค้าได้ใช้งานอุปกรณ์ไอที ที่มีประสิทธิภาพพร้อมใช้งานตลอดเวลา ในราคาที่เหมาะสมและคุ้มค่า รองรับยุคธุรกิจพอเพียง</p>
                </div>
            </div>
        </div>

        <div class="row pt-5">
            <div class="col-6 d-flex flex-column justify-content-center align-items-center" style="max-width: 600px; margin: 0 auto;">
                <!-- <div class="pb-4"> -->
                    <span class="fw-bold">ลักษณะธุรกิจ</span>
                    <ul class="flex-column align-items-center my-3">
                        <li class="mb-2">ได้รับการแต่งตั้งเป็นศูนย์บริการคอมพิวเตอร์ยี่ห้อ LENOVO และ ยี่ห้อ DELL</li>
                        <li class="mb-2">ให้บริการซ่อมเครื่องคอมพิวเตอร์และอุปกรณ์ต่อพ่วงทุกยี่ห้อ</li>
                        <li class="mb-2">บริการติดตั้งอุปกรณ์ไอที  ตามสัญญาข้อตกลง</li>
                        <li class="mb-2">บริการบำรุงรักษาเชิงป้องกัน ( PM ) อุปกรณ์ไอที  ตามสัญญาข้อตกลง</li>
                        <li class="mb-2">บริการซ่อม อุปกรณ์ไอที  ตามสัญญาข้อตกลง</li>
                        <li class="mb-2">จัดหาและจัดจำหน่ายอะไหล่เครืองคอมพิวเตอร์ Notebook </li>
                    </ul>
                <!-- </div> -->
            </div>
            <div class="img-body col-6 d-flex justify-content-center align-items-center">
                <img src="https://scontent.fhdy3-1.fna.fbcdn.net/v/t39.30808-6/465719669_528343313369687_1349349087743231948_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeFPQnKZ1eRUccgOE5DMdsfVOcqZkMiyXZw5ypmQyLJdnDnv_l6RxzbN1XtUylcFAPNyditaFt2aIPHab7o-1nIb&_nc_ohc=JB2yoSf_G1QQ7kNvgFVUAF9&_nc_oc=AdiipUsB7dB1fMcq85IW_5prdc32031U2cO1VZoxA_lNOWmHfRUfHKED1CrhFWIebSV82Hefd7pPE1nzakdejwlH&_nc_zt=23&_nc_ht=scontent.fhdy3-1.fna&_nc_gid=AztqVwPKDOoNFMte9HDEtDb&oh=00_AYCwv3ldQQmK4n8fKyrNIbZUIwtYTr7TosJX8GrGtY2i4w&oe=67B86649" class="img-thumbnail" alt="รอ">
            </div>
        </div>
    </div>
</body>