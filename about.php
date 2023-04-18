    <style> * { font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; }</style>
    <link rel="stylesheet" href="./css/gallery.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>


    <header class="bg-maroon text-white">
        <div class="mt-5"></div>
        <h1>ABOUT <br> <span>[ ZPPSUAAI ]</span></h1>
    </header>

    <style>
        p > b {
            color: #800000;
        }
    </style>

    <section class="page-section bg-white">
        <div class="container" style="font-size: xx-large;">
            <?php echo html_entity_decode($_SESSION['system']['about_content']) ?>        
        </div>
    </section>