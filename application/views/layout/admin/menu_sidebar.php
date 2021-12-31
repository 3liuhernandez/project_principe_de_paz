<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="index.html" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>

            <li>
                <a href="#"><i class="fa fa-users"></i> Usuarios<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo base_url('users/admin') ?>">Usuarios Admin</a>
                    </li>
                    <li>
                        <a href="morris.html">Usuarios Normal</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            
            <li>
                <a href="#"><i class="fa fa-address-card"></i> Miembros<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo base_url('admin/members/general') ?>">General</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/members/leaders') ?>">Liderazgo</a>
                    </li>
                </ul>
            </li>
            <li><a href="#"><i class="fa fa-graduation-cap"></i> Escuela de Discipulado<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo base_url('admin/discipleship/level/1') ?>">Nivel I</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/discipleship/level/2') ?>">Nivel II</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/discipleship/level/3') ?>">Nivel III</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/discipleship/level/4') ?>">Nivel IV</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/discipleship/level/5') ?>">Nivel V</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/discipleship/level/6') ?>">Nivel VI</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/discipleship/level/7') ?>">Escuela de Liderazgo I</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/discipleship/level/8') ?>">Escuela de Liderazgo II</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?php echo base_url('admin/teams') ?>"><i class="fa fa-table fa-fw"></i>Equipos Pastorales</a>
            </li>
        </ul>
    </div>
</div>