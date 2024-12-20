<div class="container-xl">
    <ul class="nav justify-content-center">
        <li class="nav-item">
          <a class="nav-link text-dark<?php echo isset($_GET['page']) && ($_GET['page']) == 'home' ? 'active' : '' ?>" href="?page=home">
          Home</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link text-dark<?php echo isset($_GET['page']) && ($_GET['page']) == 'service' ? 'active' : '' ?>" href="?page=service">
          Service</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark <?php echo isset($_GET['page']) && ($_GET['page']) == 'product' ? 'active' : '' ?>" href="?page=product" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Product</a>
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
                <a class="dropdown-item" href="?page=product&type=<?= htmlspecialchars($row['type_name']); ?>">
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
            about</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-dark<?php echo isset($_GET['page']) && ($_GET['page']) == 'contact' ? 'active' : '' ?>" href="?page=contact">
            contact</a>
        </li>
        
    </ul>
</div>