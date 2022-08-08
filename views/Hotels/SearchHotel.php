<?php 
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: http://localhost/");
        exit();
    }
?>

<!doctype html>
<html lang="en"> 
    <head>
        <title>Busqueda de Hoteles</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="<?php echo '/../../assets/css/all.min.css' ?>">
        <link rel="stylesheet" href="<?php echo '/../../assets/css/bootstrap.min.css' ?>">
        <link rel="stylesheet" href="css/searchPage.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.es.min.js" integrity="sha512-5pjEAV8mgR98bRTcqwZ3An0MYSOleV04mwwYj2yw+7PBhFVf/0KcE+NEox0XrFiU5+x5t5qidmo5MgBkDD9hEw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">ID90</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="float-right">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item active">
                            <p class="nav-link mb-0"><?php session_start(); echo $_SESSION['username']; ?></p>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo '/../../services/LogoutAction.php' ?>">Salir</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-xl-9 mx-auto">
                        <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
                            <div class="card-img-left d-none d-md-flex">
                            <!-- Background image for card set in CSS! -->
                            </div>
                            <div class="card-body p-4 p-sm-5">
                                <h5 class="card-title text-center mb-5 fw-light fs-5">Buscar Hoteles</h5>
                                <form action="<?php echo '/../../services/SearchHotelAction.php' ?>" method="post">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInputDestination" placeholder="Destino" name="destination" required autofocus>
                                    <label for="floatingInputDestination">Destino</label>
                                </div>
                                
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="dateStart" placeholder="Desde" required autofocus id="floatingInputDateStart"/>
                                            <label for="floatingInputDateStart">Desde</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="dateEnd" placeholder="Hasta" required autofocus id="floatingInputDateEnd"/>
                                            <label for="floatingInputDateEnd">Hasta</label>
                                        </div>
                                    </div>
                                </div> 

                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" min="1" max="4" id="floatingGuests" name="guests" placeholder="Huespedes">
                                    <label for="floatingGuests">Huespedes</label>
                                </div>

                                <hr class="my-4">

                                <div class="d-grid mb-2">
                                    <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit">Buscar</button>
                                </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="<?php echo '/../../assets/js/bootstrap.bundle.min.js' ?>"></script>
        <script> 
            $(function(){
                $('#floatingInputDateEnd').datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                });
                $('#floatingInputDateStart').datepicker({
                    format: 'yyyy-mm-dd',
                    startDate: new Date(),
                    autoclose: true,
                }).on("changeDate", function(e) {
                    var dateStart = e.date;
                    dateStart.setDate(dateStart.getDate()+1);
                    $('#floatingInputDateEnd').datepicker('setStartDate', dateStart);
                    $('#floatingInputDateEnd').val('');
                });
            });
        </script>
  </body>
</html>

