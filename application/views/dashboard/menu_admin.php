<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"/>

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link media="all" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   
    <title>Admin</title>
  </head>
  <body>
    <!-- ONLY -->
    <div>
      <nav class="admin-nav p-1 d-flex justify-content-between">
        <h3 class="fw-bold">TechnoWorld</h3>

        <div class="nav-item" style="width: 10rem">    

            <li class="nav-item dropdown" style="list-style:none">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="custom-person-circle">
              <i class="bi bi-person-fill"></i></span></a>

              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?= base_url();?>index.php/Inicio">Cerrar sesion</a>
            </li>

        </div>
      </nav>
    </div>

    <!-- Configs -->
    <section class="container mt-5">
      <div>
        <h3 class="global-red-color fw-bold">Configuraciones especiales</h3>
    
      </div>
      <article class="mt-6">
        <div class="admin-opt">
          <div>
            <section
              class="admin-card rounded center-all cursor-pointer mb-4"
            >
              <div
                class="d-flex justify-content-between align-items-center"
              >
                <i class="bi bi-person-plus-fill admin-icon"></i>
                <span class="global-red-color fw-bold ms-2"
                  >Agregar clientes</span
                >
              </div>
            </section>
          </div>
          <div>
            <section
              class="admin-card rounded center-all cursor-pointer mb-4"
            >
              <div
                class="d-flex justify-content-between align-items-center"
              >
                <i class="bi bi-person-plus-fill admin-icon"></i>
                <span class="global-red-color fw-bold ms-2"
                  >Agregar empleados</span
                >
              </div>
            </section>
          </div>
          <div>
            <section
              class="admin-card rounded center-all cursor-pointer mb-4"
            >
              <div
                class="d-flex justify-content-between align-items-center"
              >
                <i class="bi bi-bag-plus-fill admin-icon"></i>
                <a href="<?= base_url();?>index.php/Productos/index"><span class="global-red-color fw-bold ms-2"
                  >Agregar productos</span></a>
              </div>
            </section>
          </div>
          <div>
            <section
              class="admin-card rounded center-all cursor-pointer mb-4"
            >
              <div
                class="d-flex justify-content-between align-items-center"
              >
              <i class="bi bi-box-fill admin-icon"></i> 
                 <a href="<?= base_url();?>index.php/Proveedores/index"><span class="global-red-color fw-bold ms-2"
                  >Agregar proveedor</span
                ></a>
              </div>
            </section>
          </div>
        </div>
          <div>
            <section
              class="admin-card rounded center-all cursor-pointer mb-4"
            >
              <div
                class="d-flex justify-content-between align-items-center"
              >
                <i class="bi bi-tag-fill admin-icon"></i>
                <span class="global-red-color fw-bold ms-2"
                  >Agregar categorias</span
                >
              </div>
            </section>
          </div>
        </div>
      </article>
    </section>
    <!-- END ONLY -->
  </body>
</html>
