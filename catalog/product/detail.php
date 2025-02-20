<?php
    $sql = "SELECT product.*, brand.* FROM product 
        JOIN brand ON product.brand_id = brand.brand_id 
        WHERE product.product_id = {$_GET['product_id']}";    
    $result = mysqli_query($connection, $sql);
    $product = mysqli_fetch_assoc($result);
?>
<body>
    <div class="content py-4">
        <h3 class="text-center pb-5">รายละเอียดสินค้า</h3>
        <div class="row">
            <div class="col-6 d-flex justify-content-center align-items-center border border-2" style="max-width: 500px; margin: 0 auto;">
                <img src="admin/upload/product/<?php echo $product['img']?>" class="img-fluid">
            </div>
            <div class="col-6 py-3">
                <h5 class=""><?php echo $product['product_name']?></h5>
                <p class=""><?php echo $product['product_name']?></p>
                <p><span class="fw-bold">แบรนด์ : </span><?php echo $product['brand_name']?></p>
                <img src="admin/upload/brand/<?php echo $product['brand_img']?>" class="img-fluid" style="max-width: 50px;">   
                <p class="fw-bold pt-3">฿ <?= number_format($product['price']) ?></p>
                    <div class="row">
                        <div class="col-2">
                            <!-- <div class="d-flex align-items-center justify-content-between ">
                                <button type="button" class="btn btn-outline-secondary btn-lg" onclick="decrement(<?= $product['product_id'] ?>)">-</button>
                                <input type="number" id="quantity-<?= $product['product_id'] ?>" class="form-control text-center no-spinner" value="0" min="0" style="width: 100px; height:30%;">
                                <button type="button" class="btn btn-outline-secondary btn-lg" onclick="increment(<?= $product['product_id'] ?>)">+</button>
                            </div> -->

                            <div class="d-flex align-items-center justify-content-between" style="max-width: 200px; margin: 0 auto;">
    <button type="button" class="btn btn-outline-secondary btn-lg mr-1" onclick="decrement(<?= $product['product_id'] ?>)" style="height: 40px; font-size: 1.5rem; display: flex; align-items: center; justify-content: center;">-</button>
    
    <input type="number" id="quantity-<?= $product['product_id'] ?>" class="form-control text-center no-spinner" value="0" min="0" style="width: 50px; height: 40px; font-size: 1.2rem; text-align: center; margin: 0 10px;">
    
    <button type="button" class="btn btn-outline-secondary btn-lg ml-1" onclick="increment(<?= $product['product_id'] ?>)" style="height: 40px; font-size: 1.5rem; display: flex; align-items: center; justify-content: center;">+</button>
</div>




                            <script>
                                function increment(productId) {
                                    const quantityInput = document.getElementById(`quantity-${productId}`);
                                    let currentValue = parseInt(quantityInput.value) || 0;
                                    quantityInput.value = currentValue + 1;
                                }

                                function decrement(productId) {
                                    const quantityInput = document.getElementById(`quantity-${productId}`);
                                    let currentValue = parseInt(quantityInput.value) || 0;
                                    if (currentValue > 0) {
                                        quantityInput.value = currentValue - 1;
                                    }
                                }
                            </script>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</body>