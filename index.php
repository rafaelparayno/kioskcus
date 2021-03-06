<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

    <link rel="stylesheet" href="css/style.css" />

</head>

<body>

    <div class="display-clock">
        <div id="MyClockDisplay" class="clock">
        </div>
        <img src="img/xrn.png" alt="">
        <img src="img/dit.png" alt="">
        <img src="img/boc.png" alt="">
    </div>
    <section id="Section1" class="section">
        <table class="table table-bordered table-hover" width="100%" cellspacing="0">
            <thead>
                <tr>

                    <th>Container Number</th>
                    <th>Consignee</th>
                    <th>Broker</th>
                    <th>Status</th>

                </tr>
            </thead>
        </table>
        <div id="contain">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <tbody id="tableContainer">
                    < </tbody> </table> </div> </section> <section id="Section2" class="section">

                        <div class="jumbotron">
                            <h1 class="display-2">Covid Precautions.</h1>
                            <!-- <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p> -->
                            <hr class="my-4">
                            <div class="display-4" id="precautions">

                            </div>

                        </div>

    </section>



    <script defer src="js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script>
        setTimeout(() => {
            window.location.replace("page2.php");
        }, 40000)
    </script>
</body>

</html>