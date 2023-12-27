<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<header class="header" id="header">
      <div class="header_toggle">
        <i class="bx bx-menu" id="header-toggle"></i>
      </div>
      <div class="header-title d-inline">
        <h2>Welcome Back, anonymous !</h2>
      </div>
      <div class="search">
       <form class="d-flex" role="search" action="" method="post">
      <select name="kategori" id="kategori" class="kategori form-select-sm me-2">
        <option value="">Choose</option>
        <option value="dokter">Dokter</option>
        <option value="pasien">Pasien</option>
        <option value="checkup">Checkup</option>
      </select>
        <input
          class="form-control me-2"
          type="search"
          placeholder="Search"
          aria-label="Search"
          name="keyword"
        />
        <button class="btn" type="submit" name="cari"><i class="bi bi-search"></i></button>
      </form>
    </div>
      <div class="header_img">
        <img src="assets/icon/user.png" alt="" />
      </div>
    </header>
    <div class="l-navbar" id="nav-bar">
      <nav class="nav">
        <div>
          <a href="#" class="nav_logo">
            <img src="assets/icon/medical-history.png" alt="" width="35" />
            <span class="nav_logo-name">Medical Checkup</span>
          </a>
          <div class="nav_list">
            <a href="index.php" class="nav_link active" id="u1">
              <img src="assets/icon/dashboard.png" alt="" width="20" />

              <span class="nav_name">Dashboard</span>
            </a>
            <a href="pasien/" class="nav_link" id="u2">
              <img src="assets/icon/patient.png" alt="" width="20" />
              <span class="nav_name">Pasien</span>
            </a>
            <a href="checkup/" class="nav_link">
              <img src="assets/icon/medical-checkup.png" alt="" width="20" />
              <span class="nav_name">Checkup</span>
            </a>
            <a href="dokter/" class="nav_link">
              <img src="assets/icon/doctor.png" alt="" width="20" />
              <span class="nav_name">Dokter</span>
            </a>
          </div>
        </div>
        <a href="#" class="nav_link">
          <i class="bx bx-log-out nav_icon"></i>
          <span class="nav_name">Log Out</span>
        </a>
      </nav>
    </div>
