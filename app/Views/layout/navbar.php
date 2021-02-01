<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container container-fluid">
        <a class="navbar-brand btn btn-outline-success bg-gradient fw-bold" href="/pages/portofolio">MUHAMMAD NUR WAHID</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ml-1">
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-primary bg-gradient fw-bold ml-3" aria-current="page" href="<?= base_url('/pages/index') ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-primary bg-gradient fw-bold ml-3" href="<?= base_url('/pages/about') ?>">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-primary bg-gradient fw-bold ml-3" href="<?= base_url('/pages/contact') ?>">Contact</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link btn btn-outline-info bg-gradient fw-bold ml-3" href="<?= base_url('/keluarga/index') ?>"> Keluarga</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-info bg-gradient fw-bold ml-3" href="<?= base_url('/teman/index') ?>">Teman</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-info bg-gradient fw-bold ml-3" href="<?= base_url('/orang/index') ?>"> Orang</a>
                </li> -->
                <li>
                    <div class="dropdown">
                        <button class="right-menu nav-link btn btn-outline-primary px-4 fw-bold ml-3" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Menu Kumpulan
                        </button>
                        <ul class="dropdown-menu ml-3" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item fw-bold" href="<?= base_url('/keluarga/index') ?>">Daftar Keluarga</a></li>
                            <li><a class="dropdown-item fw-bold" href="<?= base_url('/teman/index') ?>">Daftar Teman</a></li>
                            <li><a class="dropdown-item fw-bold" href="<?= base_url('/orang/index') ?>">Daftar Orang</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-danger bg-gradient fw-bold ml-3" href="<?= base_url('/logout') ?>">Logout</a>
                </li>
            </ul>
            <form class="d-flex" action="" method="post">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
                <button class="btn btn-outline-success" type="submit" name="submit">Cari</button>
            </form>
        </div>
    </div>
</nav>