<div class="header">
    <div class="header-left">
        <div class="menu-icon bi bi-list"></div>
    </div>
    <div class="header-right">
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                <span class="user-icon">
                <img src="<?=base_url()?>public/assets/img/user.png" alt="" />
                </span>
                <span class="user-name"><?= is_null(auth()->user()) ? 'Guest' : auth()->user()->username ?></span>
                </a>
                <div
                    class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
                    <a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>
                    <a class="dropdown-item" href="<?=base_url(route_to('admin.logout')) ?>"><i class="dw dw-logout"><i> Log Out</a>
                </div>
            </div>
        </div>
    </div>
</div>