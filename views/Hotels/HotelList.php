<!doctype html>
<html lang="en">

<head>
    <title>Resultados de Hoteles</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo '/../../assets/css/all.min.css' ?>">
    <link rel="stylesheet" href="<?php echo '/../../assets/css/bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?php echo '/../../views/Hotels/css/listPage.css' ?>">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.es.min.js"
        integrity="sha512-5pjEAV8mgR98bRTcqwZ3An0MYSOleV04mwwYj2yw+7PBhFVf/0KcE+NEox0XrFiU5+x5t5qidmo5MgBkDD9hEw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">ID90</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
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
                <div class="col-lg-12 col-xl-12 mx-auto">
                    <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
                        <div class="card-body ">
                            <div id="content">
                                <form action="<?php echo '/../../services/SearchHotelAction.php' ?>" id="formSearch" method="post">
                                    <div class="d-sm-flex align-items-sm-center py-sm-3 px-md-3 location"> 
                                    <div class="form-floating mb-3">
                                        <input type="text" required placeholder="Destino" id="inputDestination" name="destination" class="mx-sm-2 mx-3 my-sm-0 my-2 form-control" value="<?php echo $hotels->meta->destination ?>"> 
                                        <label for="inputDestination">Destino</label>
                                    </div>
                                    <div class="form-floating mb-3">    
                                        <input type="text" required placeholder="Desde" id="inputDateStart" name="dateStart" class=" mx-md-2 mx-sm-1 mx-3 my-sm-0 my-2 form-control" value="<?php echo $hotels->meta->start_date ?>"> 
                                        <label for="inputDateStart">Desde</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" required id="inputDateEnd" placeholder="Hasta" name="dateEnd" class="mx-sm-2 mx-3 my-sm-0 my-2 form-control" value="<?php echo $hotels->meta->end_date ?>"> 
                                        <label for="inputDateEnd">Hasta</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="number" id="inputGuests" required placeholder="Huespedes" name="guests" min="1" max="4" class="mx-sm-2 mx-3 my-sm-0 my-2 form-control"value="<?php echo $hotels->meta->guests ?>">  
                                        <label for="inputGuests">Huespedes</label>
                                    </div>
                                        <input type="hidden" id="pageInput" name="page">
                                        <input type="submit" id="submitBtn" value="Buscar" class="btn btn-primary mx-3 my-sm-0 mb-2"> 
                                    </div>
                                </form>
                                <div class="d-sm-flex">
                                    <div class="bg-white p-2 border" id="hotels">
                                        <?php 
                                            foreach($hotels->hotels as $hotel){
                                                ?>
                                             <div class="hotel py-2 px-2 pb-4 border-bottom">
                                                    <div class="row">
                                                        <div class="col-lg-3"> 
                                                            <img src="<?php echo $hotel->image ?>" alt="" class="hotel-img"> 
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <div class="d-md-flex align-items-md-center">
                                                                <div class="name"><?php echo $hotel->name ?> 
                                                                    <span class="city"><?php echo $hotel->location->city ?></span> 
                                                                </div>
                                                            </div>
                                                            <div class="rating">
                                                                <?php
                                                                for($i=0;$i<$hotel->star_rating;$i++){
                                                                   ?>
                                                                    <span class="fas fa-star"></span> 
                                                                <?php }
                                                                for($i=0;$i<(5-$hotel->star_rating);$i++){
                                                                    ?>
                                                                    <span class="far fa-star"></span>
                                                                <?php }
                                                                ?> 
                                                            </div>
                                                            <?php 
                                                                    if($hotel->review_rating >= 8){
                                                                        ?>
                                                                        <div class="row">
                                                                            <span style="width: auto;padding-right: 5px;">Rating: </span> <p style="width: auto;padding-left: 0px;" class="text-success"><?php echo $hotel->review_rating ?></p>
                                                                        </div>
                                                                        <?php
                                                                    }else if($hotel->review_rating >= 5){
                                                                        ?>
                                                                        <div class="row">
                                                                            <span style="width: auto;padding-right: 5px;">Rating: </span> <p style="width: auto;padding-left: 0px;" class="text-warning"><?php echo $hotel->review_rating ?></p>
                                                                        </div>
                                                                        <?php
                                                                    }else {
                                                                        ?>
                                                                        <div class="row">
                                                                            <span style="width: auto;padding-right: 5px;">Rating: </span> <p style="width: auto;padding-left: 0px;" class="text-danger"><?php echo $hotel->review_rating ?></p>
                                                                        </div>
                                                                        <?php
                                                                    }?>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-end mt-1">
                                                        <div class="btn btn-primary text-uppercase" style="width: 230px;">Reservar por: $<?php echo $hotel->subtotal ?></div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <div class="wrapper">    
                                                <nav aria-label="Page navigation example">
                                                    <ul class="pagination">
                                                        <?php
                                                            $j=0;
                                                            $previousPages = [];
                                                            for($i=$hotels->meta->page; $i>=1;$i--){
                                                                if($j == 3){
                                                                    break;
                                                                }
                                                                if($i != $hotels->meta->page){
                                                                    $previousPages[] = '<li class="page-item"><a class="page-link" href="#">'.$i.'</a></li>';
                                                                    $j++; 
                                                                }
                                                            }
                                                            $previousPages = array_reverse($previousPages);
                                                            foreach($previousPages as $previousPage){
                                                                echo $previousPage;
                                                            }
                                                            $j=6-$j;
                                                            for($i=$hotels->meta->page;$i<$hotels->meta->total_pages;$i++){
                                                                if($j == 0){
                                                                    break;
                                                                }
                                                                if($i == $hotels->meta->page){
                                                                    ?>
                                                                    <li class="page-item active"><span class="page-link" style="color:#fff !important;"><?php echo $i ?></span></li>
                                                                <?php
                                                                }else {
                                                                    ?> <li class="page-item"><a class="page-link" href="#"><?php echo $i ?></a></li>
                                                                <?php
                                                                }
                                                                ?>
                                                            <?php
                                                                $j--; 
                                                            }
                                                         ?>
                                                        
                                                    </ul>
                                                </nav>                                        
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="<?php echo '/../../assets/js/bootstrap.bundle.min.js' ?>"></script>
</body>

<script>
    $(function(){
        $('#inputDateEnd').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
        });
        $('#inputDateStart').datepicker({
            format: 'yyyy-mm-dd',
            startDate: new Date(),
            autoclose: true,
        }).on("changeDate", function(e) {
            var dateStart = e.date;
            dateStart.setDate(dateStart.getDate()+1);
            $('#inputDateEnd').datepicker('setStartDate', dateStart);
            $('#inputDateEnd').val(undefined);
        });
    });
    const links = document.querySelectorAll('.page-link');

    links.forEach(link => {
        link.addEventListener('click', function handleClick(event) {
            document.getElementById('pageInput').value = event.target.text;
            
            link.setAttribute('style', 'background-color: #007bff;');
            
            document.getElementById('formSearch').submit();
        });
    });

    document.getElementById('submitBtn').addEventListener('click', function(e){
        e.preventDefault();

        document.getElementById('pageInput').value = undefined;
        
        document.getElementById('formSearch').submit();

    });

</script>

</html>