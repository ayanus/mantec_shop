<div class="container-xl">
    <ul class="nav justify-content-center">
        <li class="nav-item">
          <a class="nav-link text-dark<?php echo isset($_GET['page']) && ($_GET['page']) == 'home' ? 'active' : '' ?>" href="?page=home">
          หน้าหลัก</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link text-dark<?php echo isset($_GET['page']) && ($_GET['page']) == 'service' ? 'active' : '' ?>" href="?page=service">
          งานบริการ</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark <?php echo isset($_GET['page']) && ($_GET['page']) == 'product' ? 'active' : '' ?>" href="?page=product" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          หมวดสินค้า</a>
          <ul class="dropdown-menu">
            <li>
              <a class="dropdown-item" href="?page=product&type=all">All Product</a>
            </li>

            <?php
                $sql="SELECT * FROM product_type ORDER BY type_id";
                $hand=mysqli_query($connection,$sql); //ดึงข้อมูล database
                while($row=mysqli_fetch_array($hand)){
            ?>
              <li>
                <a class="dropdown-item" href="?page=product&product_type_id=<?= htmlspecialchars($row['type_id']); ?>">
                  <?= htmlspecialchars($row['type_name']); ?>
                </a>
              </li>               
            <?php 
                } 
            ?>
          </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link text-dark<?php echo isset($_GET['page']) && ($_GET['page']) == 'about' ? 'active' : '' ?>" href="?page=about">
            เกี่ยวกับเรา</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-dark<?php echo isset($_GET['page']) && ($_GET['page']) == 'contact' ? 'active' : '' ?>" href="?page=contact">
            ช่องทางการติดต่อ</a>
        </li>
        
    </ul>
</div>