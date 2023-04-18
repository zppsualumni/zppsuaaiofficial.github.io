<?php include 'db_connect.php'; ?>

<!DOCTYPE html>
<!--
 * HTML-Sheets-of-Paper (https://github.com/delight-im/HTML-Sheets-of-Paper)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
-->
<html style="background-color: #800000;">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Emulating real sheets of paper in web documents (using HTML and CSS)">
		<title>Alumni Report</title>
		<!-- <link rel="stylesheet" type="text/css" href="css/sheets-of-paper-a4.css"> -->

		<link href="assets/css/style.css" rel="stylesheet">
		<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
        <style>@page { size: A4 landscape }</style>
        <style>@media print { .print-hide { display:  none !important;} }</style>
        <script src="assets/vendor/jquery/jquery.min.js"></script>
        <link href="css/styles.css" rel="stylesheet" />
        <!-- <script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> -->
	</head>

	<body class="A4 landscape" style="background-color: #800000;">

        <script>
            const filter = () => {
                $.ajax({
                    url: "./print_report.php",
                    type: "POST",
                    data: { query: $("#query").val() },
                    success: function (e) {
                        console.log(e);
                        $(".docs").html(e);
                    }, 
                    error: (err) => {
                        console.log(err);
                    }
                });
            }
        </script>
                <style>
            .signature {
                width: 100px;
                border: 0;
                border-top: 1px solid #000;
            }
        </style>

        <div class="docs">
            <div class="print-hide container-fluid mt-10 w-50">
                <div class="d-flex justify-content-center">
                    <input type="input" class="w-25 form-control datepickerY" placeholder="Search" id="query">
                    <button class="btn btn-light btn-sm w-25 ml-2" onclick="filter();">Search</button>
                    <button class="btn btn-light btn-sm w-10 ml-2" onclick="window.print();">Print</button>
                </div>
            </div>
            <section class="sheet padding-10mm">
                <div class="mb-3" style="display: flex; justify-content: center;">
                    <div style="display: inline-flex;">
                        <img class="mr-2" height="120" src="./assets/uploads/zppsu_favicon.png" alt="">
                        <h6 style="text-align: center;">
                            Zamboanga Peninsula Polytechnic State University <br> ZPPSU ALUMNI ASSOCIATION INC.
                            <br> R. T. Lim Boulevard, Baliwasan <br> 
                            Zamboanga City, 7000 PHL <br>
                            S.E.C reg. No. CN 2004-27976 * TIN 432-911-952-000
                        </h6>
                        <img class="ml-2" height="120" src="./assets/uploads/alumni_favicon.png" alt="">
                    </div>
                </div>
                <table class="table table-bordered table-sm" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="">Alumni ID</th>
                            <th class="">Name</th>
                            <th class="">Batch</th>
                            <th class="">Address</th>
                            <th class="">Occupation</th>
                            <th class="">Company</th>
                            <th class="">Position</th>
                            <th class="">Contact Number</th>
                            <th class="">Email Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i = 1;
                        $alumni = $conn->query("SELECT * from alumnus_bio");

                        if(isset($_POST["query"])) {
                            $alumni = $conn->query("SELECT * from alumnus_bio WHERE year_graduated = '" . $_POST["query"] . "'");
                        }

                        while($row = $alumni->fetch_assoc()):
                        ?>
                        <tr>
                            <td class="align-middle"><?php echo $i; ?></td>
                            <td><?php echo $row['alumni_id'] ?></td>
                            <td><?php echo $row['lastname'] . ", " . $row['firstname'] . " " . $row['middlename'] ?></td>
                            <td><?php echo $row['year_graduated']; ?></td>
                            <td><?php echo $row['address'] ?></td>
                            <td><?php echo $row['occupation'] ?></td>
                            <td><?php echo $row['company'] ?></td>
                            <td><?php echo $row['position'] ?></td>
                            <td><?php echo $row['contactno'] ?></td>
                            <td><?php echo $row['email'] ?></b></td>
                        </tr>
                        <?php $i++; ?>
                        <?php endwhile; ?>
                        
                    </tbody>
                </table>

                <div class="d-flex justify-content-evenly mt-5">
                    <style>
                        .signature {
                            width: 100px;
                            border: 0;
                            border-top: 1px solid #000;
                        }
                    </style>
                    <div class="signature text-center" style="width: 200px;">
                        <b>Clarita C. Cultura, Ed.D.</b> <br>
                        Director, Alumni Affairs
                    </div>
                    <div class="signature text-center mt-5" style="width: 200px;">
                        <b>Nelson P. Cabral, Ed.D.</b> <br>
                        President
                    </div>
                    <div class="signature text-center" style="width: 200px;">
                        <b>Mario D. Arriola, DUM</b> <br>
                        Alumni President
                    </div>
                </div>
            </section>
        </div>

        <script>
            $(document).ready(() => {
                console.log("x")
            })

            $('.datepickerY').datepicker({
                format: " yyyy", 
                viewMode: "years", 
                minViewMode: "years"
            })
        </script>

	</body>
</html>
