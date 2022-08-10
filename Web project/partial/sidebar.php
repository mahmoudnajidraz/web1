<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" nav-item"><a href="index.php"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span></a>
        </li>
          <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.templates.main">Category</span>
          <span
              class="badge badge badge-info badge-pill float-right mr-2">
              <?php
                 include_once 'Db.php';
                 $query="SELECT*FROM categories";
                 $result = mysqli_query( $c, $query);
                 echo  mysqli_num_rows($result);
             ?>
              </span>
          </a>
            <ul class="menu-content">
              <ul class="menu-content">
                <li><a class="menu-item" href="add_Category.php" data-i18n="nav.templates.horz.classic">New add Category</a></li>
                <li><a class="menu-item" href="show- Category.php" data-i18n="nav.templates.horz.top_icon">show all Category</a></li>
              </ul>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.templates.main">Managers</span>
          <span
              class="badge badge badge-info badge-pill float-right mr-2">
              <?php
                 include_once 'Db.php';
                 $query="SELECT*FROM managers";
                 $result = mysqli_query( $c, $query);
                 echo  mysqli_num_rows($result);
             ?>
              </span>
          </a></a>
            <ul class="menu-content">
              <ul class="menu-content">
                <li><a class="menu-item" href="add_Manager.php" data-i18n="nav.templates.horz.top_icon">Add new Manager</a></li>
                <li><a class="menu-item" href="show_Managers.php" data-i18n="nav.templates.horz.top_icon">Show all Managers</a></li>
              </ul>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.templates.main">shops</span>
          <span
              class="badge badge badge-info badge-pill float-right mr-2">
              <?php
                 include_once 'Db.php';
                 $query="SELECT*FROM shops";
                 $result = mysqli_query( $c, $query);
                 echo  mysqli_num_rows($result);
             ?>
              </span>
          </a></a>
            <ul class="menu-content">
              <ul class="menu-content">
                <li><a class="menu-item" href="add_shop.php" data-i18n="nav.templates.horz.top_icon">Add new shop</a></li>
                <li><a class="menu-item" href="show_shops.php" data-i18n="nav.templates.horz.top_icon">Show all shops</a></li>
              </ul>
            </ul>
          </li>
    </div>
  </div>