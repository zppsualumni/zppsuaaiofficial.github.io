<?php include 'db_connect.php' ?>

<header class="page-header pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title" style="color: #800000;">
                        <div class="page-header-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg></div>
                        <?php echo "Hi, ". $_SESSION['login_name']."!"  ?>
                    </h1>
                    <div class="page-header-subtitle">Welcome to ZPPSU Alumni Management Information System!</div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container-xl mt-n10">
    <div class="row">
        <div class="col-xl-4 mb-4">
            <a class="card lift h-100" href="index.php?page=alumni">
                <div class="card-body d-flex justify-content-center flex-column">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="me-3">
                            <i data-feather="book" class="feather-xl text-maroon mb-3"></i>
                            <h5>Alumni Database</h5>
                            <div class="text-muted small">Alumnus Registered: <?php echo $conn->query("SELECT * FROM alumnus_bio where status = 1")->num_rows; ?></div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 mb-4">
            <a class="card lift h-100" href="index.php?page=forums">
                <div class="card-body d-flex justify-content-center flex-column">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="me-3">
                            <i data-feather="book-open" class="feather-xl text-maroon mb-3"></i>
                            <h5>Blog Posts</h5>
                            <div class="text-muted small">Posts: <?php echo $conn->query("SELECT * FROM forum_topics")->num_rows; ?></div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-4 mb-4">
            <a class="card lift h-100" href="index.php?page=jobs">
                <div class="card-body d-flex justify-content-center flex-column">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="me-3">
                            <i data-feather="dollar-sign" class="feather-xl text-maroon mb-3"></i>
                            <h5>Posted Jobs</h5>
                            <div class="text-muted small">Available Jobs: <?php echo $conn->query("SELECT * FROM careers")->num_rows; ?></div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 mb-4">
            <a class="card lift h-100" href="index.php?page=courses">
                <div class="card-body d-flex justify-content-center flex-column">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="me-3">
                            <i data-feather="book" class="feather-xl text-maroon mb-3"></i>
                            <h5>Course List</h5>
                            <div class="text-muted small">Available Courses: <?php echo $conn->query("SELECT * FROM courses")->num_rows; ?></div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 mb-4">
            <a class="card lift h-100" href="index.php?page=events">
                <div class="card-body d-flex justify-content-center flex-column">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="me-3">
                            <i data-feather="bookmark" class="feather-xl text-maroon mb-3"></i>
                            <h5>Events</h5>
                            <div class="text-muted small">Upcoming Events: <?php echo $conn->query("SELECT * FROM events")->num_rows; ?></div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-4 mb-4">
            <a class="card lift h-100" href="index.php?page=gallery">
                <div class="card-body d-flex justify-content-center flex-column">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="me-3">
                                <i data-feather="image" class="feather-xl text-maroon mb-3"></i>
                            <h5>Gallery</h5>
                            <div class="text-muted small">Images Uploaded: <?php echo $conn->query("SELECT * FROM gallery")->num_rows; ?></div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

              