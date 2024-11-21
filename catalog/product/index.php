<div class="row row-cols-1">
    <?php if ($rows && mysqli_num_rows($rows) > 0): ?> <!-- ตรวจสอบว่ามีแถวข้อมูล -->
        <?php while($product = mysqli_fetch_assoc($rows)): ?> <!-- ใช้ $rows ที่กำหนดจาก query -->
            <div class="col">
                <div class="card">
                    <?php if(!empty($product['img'])): ?>
                        <img src="../../admin/upload/product/<?php echo $product['img'] ?>" class="card-img-top" style="height: 200px;" alt="Product image">
                    <?php else: ?>
                        <!-- <img src="/project/img-product/no-img.jpg" class="card-img-top" alt="..."> -->
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= $product['name'] ?></h5>
                        <p class="card-text text-success mb-0 fw-bold"><?= $product['price'] ?> บาท</p>
                        <p class="card-text text-muted"><?= $product['description'] ?></p>
                        <a href="cart.php?id=<?php echo $product['id']?>" class="btn btn-primary mt-2 w-100">เพิ่มลงตะกร้า</a>
                    </div>
                </div>
            </div> 
        <?php endwhile; ?>
    <?php else: ?>
        <p class="text-center text-muted">ไม่มีสินค้าตามประเภทที่เลือก</p>
    <?php endif; ?>
</div>