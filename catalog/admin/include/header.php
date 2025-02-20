<style>
  .link-hover:hover {
    color: black !important;;
  }

  .logout-hover:hover {
    color: red !important;;
  }

  
</style>

<header class="app-header fixed-top">
    <div class="app-header-inner">
        <div class="container-fluid py-2">
            <div class="app-header-content">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto"> 
                    </div>
    
                    <div class="app-utilities col-auto me-5">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto fw-bold d-flex align-items-center">
                                <a href="../index.php" class="text-secondary link-hover">USER MODE</a>
                            </div>
                            <div class="col-auto fw-bold d-flex align-items-center">
                                <p class="separator mb-0">|</p>
                            </div>
                            <div class="col-auto fw-bold d-flex align-items-center">
                                <a href="../logout.php" class="text-secondary logout-hover">LOG OUT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="app-sidepanel" class="app-sidepanel">
        <div id="sidepanel-drop" class="sidepanel-drop"></div>
            <div class="sidepanel-inner d-flex flex-column">
                <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
                
                <div class="app-branding">
                    <a class="app-logo"><img class="logo-icon me-2" src="assets/images/logo.png" alt="logo"><span class="logo-text">ระบบแคตล็อก</span></a>
                    
                    </div>
                        <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
                            <ul class="app-menu list-unstyled accordion" id="menu-accordion">

                                <li class="nav-item">
                                    <a class="nav-link <?php echo isset($_GET['page']) && ($_GET['page']) == 'admin' ? 'active' : '' ?>" href="?page=admin">
                                        <span class="nav-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                                        </svg>
                                        </span>
                                        <span class="nav-link-text">จัดการข้อมูลผู้ใช้</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link <?php echo isset($_GET['page']) && ($_GET['page']) == 'service' ? 'active' : '' ?>" href="?page=service">
                                        <span class="nav-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tools" viewBox="0 0 16 16">
                                            <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3q0-.405-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814zm9.646 10.646a.5.5 0 0 1 .708 0l2.914 2.915a.5.5 0 0 1-.707.707l-2.915-2.914a.5.5 0 0 1 0-.708M3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026z"/>
                                        </svg>
                                        </span>
                                        <span class="nav-link-text">จัดการการบริการ</span>
                                    </a>
                                </li> 

                                <li class="nav-item">
                                    <a class="nav-link <?php echo isset($_GET['page']) && ($_GET['page']) == 'product' ? 'active' : '' ?>" href="?page=product">
                                        <span class="nav-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                                            <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2zm3.564 1.426L5.596 5 8 5.961 14.154 3.5zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z"/>
                                        </svg>
                                        </span>
                                        <span class="nav-link-text">จัดการข้อมูลสินค้า</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link <?php echo isset($_GET['page']) && ($_GET['page']) == 'brand' ? 'active' : '' ?>" href="?page=brand">
                                        <span class="nav-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tag" viewBox="0 0 16 16">
                                                <path d="M6 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m-1 0a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0"/>
                                                <path d="M2 1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2a1 1 0 0 1 1-1m0 5.586 7 7L13.586 9l-7-7H2z"/>
                                            </svg>
                                        </span>
                                        <span class="nav-link-text">จัดการข้อมูลแบรนด์</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link <?php echo isset($_GET['page']) && ($_GET['page']) == 'producttype' ? 'active' : '' ?>" href="?page=producttype">
                                        <span class="nav-icon">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                                <path fill-rule="evenodd" d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z" />
                                                <circle cx="3.5" cy="5.5" r=".5" />
                                                <circle cx="3.5" cy="8" r=".5" />
                                                <circle cx="3.5" cy="10.5" r=".5" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-text">จัดการประเภทสินค้า</span>
                                    </a>
                                </li>

                               
                               

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
