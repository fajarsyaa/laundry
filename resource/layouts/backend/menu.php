 <?php

    if (urlHas('backend/ordermasuk/') || urlHas('backend/process/')) {
        $menuActiveOrder = "active";
        $openOrder       = "menu-open";
    } elseif (urlHas('backend/pickup/') || urlHas('backend/deliver/')) {
        $menuPickup = "active";
        $openPickup = "menu-open";
    } elseif (urlHas('backend/users/') || urlHas('backend/layanan/') || urlHas('backend/mesin/') || urlHas('backend/payment/') || urlHas('backend/history/') || urlHas('backend/pegawai/')) {
        $menuMaster = "active";
        $openMaster = "menu-open";
    } elseif (urlHas('backend/dashboard/data')) {
        $menuDashboard = "active";
        $openDashboard = "menu-open";
    }

    ?>

 <?php if (auth()->level() == "admin") { ?>

     <li class="nav-item <?= $openDashboard  ?>">
         <a href="<?php url('backend/dashboard/data') ?>" class="nav-link <?= $menuDashboard ?>">
             <i class="nav-icon fas fa-home"></i>
             <p>
                 Dashboard
             </p>
         </a>
     </li>

     <li class="nav-item <?= $openOrder ?>">
         <a href="#" class="nav-link <?= $menuActiveOrder ?>">
             <i class="nav-icon fas fa-cart-plus"></i>
             <p>
                 order customer
                 <i class="right fas fa-angle-left"></i>
             </p>
         </a>
         <ul class="nav nav-treeview">

             <li class="nav-item">

                 <!-- Perbanyak bagian ini -->

                 <!-- <a href='<?php url('backend/ordermasuk/offline') ?>' class='nav-link <?= activeClass('ordermasuk/offline') ?>'>
                     <i class='far fa-circle nav-icon'></i>
                     <p>buat order</p>
                 </a> -->

                 <a href='<?php url('backend/ordermasuk/data') ?>' class='nav-link <?= activeClass('ordermasuk/data') ?>'>
                     <i class='far fa-circle nav-icon'></i>
                     <p>orderan masuk</p>
                 </a>

                 <a href='<?php url('backend/process/proses') ?>' class='nav-link <?= activeClass('process/proses') ?>'>
                     <i class='far fa-circle nav-icon'></i>
                     <p>process</p>
                 </a>
                 <a href='<?php url('backend/process/selesai') ?>' class='nav-link <?= activeClass('process/selesai') ?>'>
                     <i class='far fa-circle nav-icon'></i>
                     <p>Selesai</p>
                 </a>

             </li>

         </ul>

     </li>

     <li class="nav-item <?= $openMaster ?>">
         <a href="#" class="nav-link <?= $menuMaster ?>">
             <i class="nav-icon fas fa-cube"></i>
             <p>
                 Master
                 <i class="right fas fa-angle-left"></i>
             </p>
         </a>
         <ul class="nav nav-treeview">

             <li class="nav-item">

                 <!-- Perbanyak bagian ini -->

                 <a href='<?php url('backend/users/data') ?>' class='nav-link <?= activeClass('users') ?>'>
                     <i class='far fa-circle nav-icon'></i>
                     <p>user</p>
                 </a>
                 <a href='<?php url('backend/pegawai/data') ?>' class='nav-link <?= activeClass('pegawai') ?>'>
                     <i class='far fa-circle nav-icon'></i>
                     <p>pegawai</p>
                 </a>
                 <a href='<?php url('backend/layanan/data') ?>' class='nav-link <?= activeClass('layanan') ?>'>
                     <i class='far fa-circle nav-icon'></i>
                     <p>layanan</p>
                 </a>
                 <!-- <a href='<?php url('backend/order/data') ?>' class='nav-link <?= activeClass('backend/order/') ?>'>
                     <i class='far fa-circle nav-icon'></i>
                     <p>order</p>
                 </a> -->
                 <a href='<?php url('backend/payment/data') ?>' class='nav-link <?= activeClass('payment') ?>'>
                     <i class='far fa-circle nav-icon'></i>
                     <p>payment</p>
                 </a>
                 <a href='<?php url('backend/mesin/data') ?>' class='nav-link <?= activeClass('mesin') ?>'>
                     <i class='far fa-circle nav-icon'></i>
                     <p>mesin</p>
                 </a>
                 <!-- <a href='<?php url('backend/history/data') ?>' class='nav-link <?= activeClass('history') ?>'>
                     <i class='far fa-circle nav-icon'></i>
                     <p>history</p>
                 </a> -->

             </li>

         </ul>

     </li>

 <?php } ?>

 <?php if (auth()->level() == "kurir") { ?>

     <li class="nav-item <?= $openPickup ?>">
         <a href="#" class="nav-link  <?= $menuPickup ?>">
             <i class="nav-icon fas fa-truck"></i>
             <p>
                 Deliver
                 <i class="right fas fa-angle-left"></i>
             </p>
         </a>
         <ul class="nav nav-treeview">

             <li class="nav-item">

                 <!-- Perbanyak bagian ini -->

                 <a href='<?php url('backend/pickup/data') ?>' class='nav-link <?= activeClass('pickup') ?>'>
                     <i class='far fa-circle nav-icon'></i>
                     <p>pick up</p>
                 </a>
                 <a href='<?php url('backend/deliver/data') ?>' class='nav-link <?= activeClass('deliver') ?>'>
                     <i class='far fa-circle nav-icon'></i>
                     <p>deliver</p>
                 </a>

             </li>

         </ul>

     </li>
 <?php } ?>