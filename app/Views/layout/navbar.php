<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container container-fluid">
        <a class="navbar-brand " href="#">MUHAMMAD NUR WAHID</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= base_url('/pages/index') ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/pages/about') ?>">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/pages/contact') ?>">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/keluarga/index') ?>">Data Keluarga</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/teman/index') ?>">Data Pertemanan</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>