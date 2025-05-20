<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>

<section class="home-slider owl-carousel">

  <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">

        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Contactez-nous</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Accueil</a></span> <span>Contact</span></p>
        </div>

      </div>
    </div>
  </div>
</section>

<section class="ftco-section contact-section">
  <div class="container mt-5">
    <div class="row block-9">
      <div class="col-md-4 contact-info ftco-animate">
        <div class="row">
          <div class="col-md-12 mb-4">
            <h2 class="h4">Informations de Contact</h2>
          </div>
          <div class="col-md-12 mb-3">
            <p><span>Adresse:</span> 198 rue Saint-Honoré, Paris 75001</p>
          </div>
          <div class="col-md-12 mb-3">
            <p><span>Téléphone:</span> <a href="tel://1234567920">+33 1 23 45 67 89</a></p>
          </div>
          <div class="col-md-12 mb-3">
            <p><span>Email:</span> <a href="mailto:info@coffeeblend.fr">info@coffeeblend.fr</a></p>
          </div>
          <div class="col-md-12 mb-3">
            <p><span>Site Web:</span> <a href="#">www.coffeeblend.fr</a></p>
          </div>
        </div>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-6 ftco-animate">
        <form action="#" class="contact-form">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Votre Nom">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Votre Email">
              </div>
            </div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Sujet">
          </div>
          <div class="form-group">
            <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
          </div>
          <div class="form-group">
            <input type="submit" value="Envoyer le Message" class="btn btn-primary py-3 px-5">
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<div id="map"></div>

<?php require "includes/footer.php"; ?>