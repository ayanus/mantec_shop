<div class="container-xl">
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link text-dark" aria-current="page" href="#">Home</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Product
          </a>
          <ul class="dropdown-menu">
            <?php
                $sql="SELECT * FROM tb_type_product ORDER BY id";
                $hand=mysqli_query($connection,$sql); //ดึงข้อมูล database
                while($row=mysqli_fetch_array($hand)){
            ?>
                <li><a class="dropdown-item" href="#"><?=$row['title']?></a></li>                
            <?php 
                } 
            ?>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Service
          </a>
          <ul class="dropdown-menu">
            <?php
                
            ?>
                <li><a class="dropdown-item" href="#"></a></li>                
            <?php 
                 
            ?>
          </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link text-dark" href="#">about</a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-dark" href="#">contact</a>
        </li>
        
    </ul>
</div>