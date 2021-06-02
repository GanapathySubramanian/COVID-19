<?php
    $confirmed=0;$male=0;$female=0;$active=0;$death=0;$recovered=0;
    $query= "SELECT * FROM country_cases";
    $query_run= mysqli_query($con, $query);   
    while($row=mysqli_fetch_array($query_run)){
        $confirmed=$confirmed+$row['confirmed'];
        $male=$male+$row['male'];
        $female=$female+$row['female'];
        $active=$active+$row['active'];
        $death=$death+$row['death'];
        $recovered=$recovered+$row['recovered'];
    }

    $date_query= "SELECT updated_at FROM country_cases where updated_at>=CURDATE()";
    $date_query_run= mysqli_query($con, $date_query);   
    while($row=mysqli_fetch_array($date_query_run)){
        $date=$row['updated_at'];
    }
    ?>
<div class="row text-center">
    <div class="col-lg-4" id="myitems">
        <div class="card mb-5 mr-2 ml-1 rounded-3 shadow-sm">
            <div class="card-header py-3" style="background-color:#FF0735">
                <h4 class="my-0 text-white">Confirmed Cases</h4>
            </div>
            <div class="card-body" id="card-body">
            <strong style="color:#FF0735"><h1 class="card-title pricing-card-title counter counter-up"><?php echo $confirmed;?></h1></strong>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Number of confirmed cases of <br> COVID - 19</li>
                </ul>
                <button type="button" class="w-100 btn btn-lg btn-light" style="color:#DB5581">Updated at : <?php echo $date;?></button>
            </div>
        </div>
    </div>

    <div class="col-lg-4" id="myitems">
        <div class="card mb-5 mr-2 ml-1 rounded-3 shadow-sm">
            <div class="card-header py-3" style="background-color:#ffc93c">
                <h4 class="my-0 text-white">Male cases</h4>
            </div>
            <div class="card-body" id="card-body">
                <strong class="text-warning"><h1 class="card-title pricing-card-title counter counter-up"><?php echo $male?></h1></strong>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Number of active Male cases of <br> COVID - 19</li>
                </ul>
                <button type="button" class="w-100 btn btn-lg btn-light" style="color:#DB5581">Updated at : <?php echo $date;?></button>
            </div>
        </div>
    </div>

    <div class="col-lg-4" id="myitems">
        <div class="card mb-5 mr-2 rounded-3 shadow-sm">
            <div class="card-header py-3"style="background-color:#fc5404">
                <h4 class="my-0 text-white">Female cases</h4>
            </div>
            <div class="card-body" id="card-body">
                <strong style="color:#fc5404"><h1 class="card-title pricing-card-title counter counter-up"><?php echo $female?></h1></strong>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Number of active Female cases of <br> COVID - 19</li>
                </ul>
                <button type="button" class="w-100 btn btn-lg  btn-light" style="color:#DB5581">Updated at : <?php echo $date;?></button>
            </div>
        </div>
    </div>

    <div class="col-lg-4" id="myitems">
        <div class="card mb-5 mr-2 ml-1 rounded-3 shadow-sm">
            <div class="card-header py-3 bg-primary">
                <h4 class="my-0 text-white">Active cases</h4>
            </div>
            <div class="card-body" id="card-body">
                <strong class="text-primary"><h1 class="card-title pricing-card-title counter counter-up"><?php echo $active?></h1></strong>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Number of active cases of <br> COVID - 19</li>
                </ul>
                <button type="button" class="w-100 btn btn-lg btn-light" style="color:#DB5581">Updated at : <?php echo $date;?></button>
            </div>
        </div>
    </div>

    <div class="col-lg-4" id="myitems">
        <div class="card mb-5 mr-2 ml-1 rounded-3 shadow-sm">
            <div class="card-header py-3 bg-success">
                <h4 class="my-0 text-white">Recovered cases</h4>
            </div>
            <div class="card-body" id="card-body">
                <strong class="text-success"><h1 class="card-title pricing-card-title counter counter-up"><?php echo $recovered?></h1></strong>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Number of Recovered cases of <br> COVID - 19</li>
                </ul>
                <button type="button" class="w-100 btn btn-lg btn-light" style="color:#DB5581">Updated at : <?php echo $date;?></button>
            </div>
        </div>
    </div>


    <div class="col-lg-4" id="myitems">
        <div class="card mb-5 mr-2 rounded-3 shadow-sm ">
            <div class="card-header py-3 bg-dark">
                <h4 class="my-0 text-white">Death cases</h4>
            </div>
            <div class="card-body" id="card-body">
                <strong class="text-muted"><h1 class="card-title pricing-card-title counter "><?php echo $death?></h1></strong>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Number of Death cases of <br>COVID - 19</li>
                </ul>
                <button type="button" class="w-100 btn btn-lg btn-light" style="color:#DB5581">Updated at : <?php echo $date;?></button>
            </div>
        </div>
    </div>
</div>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
// $(document).ready(function(){
//     $(".counter").counterUp({
//         delay: 10,
//         time: 1200
//     });
   
// });
$('.counter').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 3000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
</script>
