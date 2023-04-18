<div class="print-hide container-fluid mt-10 w-50">
    <div class="d-flex justify-content-center">
        <input type="input" class="w-25 form-control datepickerY" placeholder="Search" id="query">
        <button class="btn btn-light btn-sm w-25 ml-2" onclick="filter();">Search</button>
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
