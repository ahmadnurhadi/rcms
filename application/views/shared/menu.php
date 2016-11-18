  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel" style="margin-bottom: 20px;">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>asset/dist/img/user.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $username; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview<?php if($link_active == 'systemidentification') { echo  ' active'; } ?>" >
          <a href="<?php echo site_url('systemidentification/index/'.$id_hostt); ?>">
            <i class="fa fa-edit"></i> <span>System Identification</span>
          </a>
          
        </li>
        <li class="treeview<?php if($link_active == 'bite' || $link_active == 'nonbite') { echo  ' active'; } ?>">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Monitoring</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($link_active == 'bite') { echo  'class="active"'; } ?>><a href="<?php echo site_url('bite/index/'.$id_hostt); ?>"><i class="fa fa-bullseye"></i> BITE</a></li>
            <li <?php if($link_active == 'nonbite') { echo  'class="active"'; } ?>><a href="<?php echo site_url('nonbite/index/'.$id_hostt); ?>"><i class="fa fa-bullseye"></i> Non BITE</a></li>
          </ul>
        </li>
        <li class="treeview<?php if($link_active == 'network' || $link_active == 'asterix' || $link_active == 'gps' || $link_active == 'groundstation' || $link_active == 'adsbfilter' || $link_active == 'sitemonitor') { echo  ' active'; } ?>">
          <a href="#">
            <i class="fa fa-cog"></i> <span>Configuration</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li  <?php if($link_active == 'network') { echo  'class="active"'; } ?>><a href="<?php echo site_url('network/index/'.$id_hostt); ?>"><i class="fa fa-asterisk"></i> Network</a></li>
            <li  <?php if($link_active == 'asterix') { echo  'class="active"'; } ?>><a href="<?php echo site_url('asterix/index/'.$id_hostt); ?>"><i class="fa fa-asterisk"></i> Asterix</a></li>
            <li  <?php if($link_active == 'gps') { echo  'class="active"'; } ?>><a href="<?php echo site_url('gps/index/'.$id_hostt); ?>"><i class="fa fa-asterisk"></i> GPS</a></li>
            <li  <?php if($link_active == 'groundstation') { echo  'class="active"'; } ?>><a href="<?php echo site_url('groundstation/index/'.$id_hostt); ?>"><i class="fa fa-asterisk"></i> Ground Station</a></li>
            <li  <?php if($link_active == 'adsbfilter') { echo  'class="active"'; } ?>><a href="<?php echo site_url('adsbfilter/index/'.$id_hostt); ?>"><i class="fa fa-asterisk"></i> ADSB Filter</a></li>
            <li  <?php if($link_active == 'sitemonitor') { echo  'class="active"'; } ?>><a href="<?php echo site_url('sitemonitor/index/'.$id_hostt); ?>"><i class="fa fa-asterisk"></i> Site Monitor</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>