<nav id="_header-navbar" class="navbar nav justify-content-end">
    <ul class="nav">
        <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Notification
            </a>
            <div class="dropdown-menu dropdown-menu-right ">
                <a class="dropdown-item" href="#">
                    Your notification
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                    The notification
                </a>
                <a class="dropdown-item" href="#">
                    The notification
                </a>
                <a class="dropdown-item" href="#">
                    The notification
                </a>
            </div>
        </li> -->
        <li style="z-index:1000" class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <?= $_user_name?>
            </a>
            <div class="dropdown-menu dropdown-menu-right ">
                <a href="<?= base_url($_user_role.'/edit_profile')?>" class="dropdown-item" href="#">
                    My profile
                </a>
                <!-- <a class="dropdown-item" href="#">
                    Maybe settings here
                </a> -->
                <div class="dropdown-divider"></div>
                <a href="<?= base_url($_user_role.'/logout')?>" class="dropdown-item" href="#">Logout</a>
            </div>
        </li>
    </ul>
</nav>