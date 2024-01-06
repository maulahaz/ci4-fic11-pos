<div class="left-side-bar">
    <div class="brand-logo">
        <a href="<?= base_url() ?>">
            <img src="
				<?=base_url()?>public/t_deskapp/vendors/images/deskapp-logo.svg" alt="" class="dark-logo" />
            <img src="
					<?=base_url()?>public/t_deskapp/vendors/images/deskapp-logo-white.svg" alt="" class="light-logo" />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <!-- MENU: ADMIN SECTION -->
                <?php if(in_array(auth()->user()->roles, ['Admin', 'Webmaster'], true)) : ?>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-house"></span>
                        <span class="mtext">Admin</span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="<?= base_url('admin/users'); ?>">Users</a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin/employees'); ?>">Employee</a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin/clients'); ?>">Clients/Customer</a>
                        </li>
                        <li>
                            <a href="<?= base_url(route_to('categories')); ?>">Categories</a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                
                <!-- MENU: OWNER SECTION -->
                <?php if(in_array(auth()->user()->roles, ['Owner', 'Admin', 'Webmaster'], true)) : ?>
                <li>
                    <a href="<?= base_url('admin/users'); ?>" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-people-fill"></span>
                        <span class="mtext">Users</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/employees'); ?>" class="dropdown-toggle no-arrow">
                    <span class="micon bi bi-person-badge"></span>
                    <span class="mtext">Employees</span>
                </a>
                </li>
                <?php endif; ?>
                
                <!-- MENU: EMPLOYEE SECTION -->
                <?php if(in_array(auth()->user()->roles, ['Employee', 'Admin', 'Webmaster','user'], true)) : ?>
                <li>
                    <a href="<?= base_url('em/clients'); ?>" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-person-circle"></span>
                        <span class="mtext">Clients</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('em/wash'); ?>" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-fan"></span>
                        <span class="mtext">Car Wash</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('em/cars'); ?>" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-bicycle"></span>
                        <span class="mtext">Cars</span>
                    </a>
                </li>
                <?php endif; ?>
                <!-- <li>
                    <div class="dropdown-divider"></div>
                </li> -->

            </ul>
        </div>
    </div>
</div>