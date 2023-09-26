<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kreasi AI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <!-- my css -->
    <link rel="stylesheet" href="<?= base_url(); ?>/myCss/style.css">
  </head>
  <body>
    <!-- navabar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#">Kreasi AI</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto justify-content-end">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Layanan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Harga</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Kontak</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Tentang Kami</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- akhir navbar -->

    <!-- jumbotron -->
    <section class="jumbotron text-center mt-5" id="jumbotron">
      <img src="<?= base_url(); ?>/img/kreasiAi.jpg" alt="" class="m-5">
      <h1 class="display-4">kreasi AI</h1>
      <p class="lead">Jasa Membuat Website</p>
      </a>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f3f4f5" fill-opacity="1" d="M0,160L1440,256L1440,320L0,320Z"></path></svg>
    </section>
    <!-- akhir jumbotron -->

    <!-- tentang kami -->
    <section class="about text-center" id="about">
      <div class="container">
        <div class="row text-center mb-3">
          <div class="col">
            <h2>Tentang Kami</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col">
            <img src="<?= base_url(); ?>/img/about-us.png" class="img-thumbnail">
          </div>
          <div class="col">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Autem, est! Cumque harum maxime amet reprehenderit temporibus illum dolor facere unde sunt provident, molestiae fugit dicta dolorem nostrum labore quam neque nihil optio aspernatur dolorum perferendis. Ex eaque explicabo ab provident nobis, obcaecati esse, assumenda ipsum, recusandae voluptate iste repellendus unde similique nisi impedit ea porro? Nostrum adipisci hic corrupti facere repellat, fugit, quia nisi quos obcaecati velit sequi. Deserunt recusandae corrupti, accusamus minima voluptatibus nam aut ea, eum, adipisci commodi quia soluta cumque maxime a officia eligendi! Molestias, ut doloremque voluptatem quis consequuntur odio? Cupiditate consequuntur officiis ipsa consequatur eos.
            </p>
          </div>
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#a2d9ff" fill-opacity="1" d="M0,96L1440,224L1440,320L0,320Z"></path></svg>
    </section>
    <!-- akhir tentang kami -->
    
    <!-- layanan -->
    <section class="layanan text-center pb-5" id="layanan">
      <div class="container">
        <div class="row mb-3 p-2 text-center">
          <div class="col">
            <h2>Layanan</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4 mb-3 mb-sm-0">
            <div class="card text-center">
              <div class="card-body">
                <h5 class="card-title">Layanan 1</h5>
                <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corporis, dignissimos.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card text-center">
              <div class="card-body">
                <h5 class="card-title">Layanan 2</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- akhir layanan -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
