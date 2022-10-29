<section class="container-gray">
  <!-- Navbar -->
  <nav class="container d-flex justify-content-between">
    <div class="justify-content-start mt-5">

      <a href="<?= base_url(); ?>"><img src="<?= base_url(); ?>\assets\images\logo.png" width="139px" height="160px" class="img-fluid" alt="tecnoworld logo"></a>
    </div>
    <ul class="nav justify-content-end align-items-start mt-4">
      <li class="nav-item">
        <a class="nav-link red-color-link" href="#">Inicio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link red-color-link" href="#">Acerca de nosotros</a>
      </li>
      <li class="nav-item">
        <a class="nav-link red-color-link" href="#">Soporte técnico</a>
      </li>

      <li class="nav-item">
        <a href="<?= base_url(); ?>index.php/Inicio/login"><button class="btn btn-danger btn-primary-custom">
            Iniciar Sesión
          </button></a>
      </li>
      <li class="nav-item">
        <section class="content-container mx-2">
          <i class="bi bi-list red-color-link fs-5 me-2"></i>
          <span class="custom-person-circle">
            <i class="bi bi-person-fill"></i>
          </span>
        </section>
      </li>
    </ul>
  </nav>

  <!-- Hero content -->
  <div class="container">
    <!-- Hero text -->
    <section class="mt-5 hero-container">
      <span class="hero-text">TECHNOWORLD</span>
    </section>
    <article class="d-flex justify-content-center align-items-center mt-5">
      <div>
        <div class="global-red-color d-flex justify-content-center align-items-center">
          <h1 class="fw-bold d-inline me-3">BUSQUEDAS</h1>
          <div class="d-inline custom-top">
            <span class="me-2">Productos</span>
            <span class="me-2">Entregas</span>
            <span>Locales</span>
          </div>
        </div>
    </article>

    <!-- Hero content -->
    <section class="global-red-color d-flex justify-content-between custom-width content-container center-block mt-3">
      <div class="w-25">
        <small class="global-red-color">PCs</small>
        <div>
          <a href="#" class="link-info blue-sky">¿Qué modelo busca?</a>
        </div>
      </div>
      <span class="vr mx-4 text-muted align-middle" style="height: 35px"></span>
      <div>
        <small class="global-red-color">Impresoras</small>
        <div>
          <a href="#" class="link-info blue-sky">Categorias</a>
        </div>
      </div>
      <span class="vr mx-4 text-muted align-middle" style="height: 35px"></span>
      <div>
        <small class="global-red-color">Dispositivos</small>
        <div>
          <a href="#" class="link-info blue-sky">Todo tipo</a>
        </div>
      </div>
      <span class="vr mx-4 text-muted align-middle" style="height: 35px"></span>
      <div>
        <small class="global-red-color">Accesorios</small>
        <div>
          <a href="#" class="link-info blue-sky">Para ordenadores</a>
        </div>
      </div>
      <div class="custom-search-circle ms-3">
        <i class="bi bi-search"></i>
      </div>
    </section>
  </div>
</section>