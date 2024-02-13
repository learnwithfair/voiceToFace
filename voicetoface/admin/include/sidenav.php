<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="dashboard">
                    <div class="sb-nav-link-icon"><i class="fa fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <a class="nav-link" href="add_sub_admin">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-plus"></i></div>
                    Add Admin
                </a>
                <a class="nav-link" href="manage_sub_admin">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-cog"></i></div>
                    Manage Admin
                </a>
                <a class="nav-link" href="upload">
                    <div class="sb-nav-link-icon"><i class="fa fa-upload"></i></div>
                    Upload
                </a>
                <a class="nav-link" href="manage">
                    <div class="sb-nav-link-icon"><i class="far fa-folder-open"></i></div>
                    Manage
                </a>

            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <?php echo $_SESSION['admin_name']; ?>
        </div>
    </nav>
</div>