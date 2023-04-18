<?php 
include 'admin/db_connect.php'; 
?>
    <link rel="stylesheet" href="./css/gallery.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>


    <header class="bg-maroon text-white">
        <div class="mt-5"></div>
        <h1>Gallery <br> <span>[ ZPPSUAAII Gallery ]</span></h1>
    </header>

    <div id="top"></div>
    <section class="gallery bg-white">
        <div class="row">
            <ul>
                <a href="#" class="close"></a>
                <?php
                $rtl ='rtl';
                $ci= 0;
                $img = array();
                $fpath = 'admin/assets/uploads/gallery';
                $files= is_dir($fpath) ? scandir($fpath) : array();
                foreach($files as $val){
                    if(!in_array($val, array('.','..'))){
                        $n = explode('_',$val);
                        $img[$n[0]] = $val;
                    }
                }
                $gallery1 = $conn->query("SELECT * from gallery order by id desc");

                $i = 0;
                while($row = $gallery1->fetch_assoc()):
                    
                    $ci++;
                    if($ci < 3){
                        $rtl = '';
                    }else{
                        $rtl = 'rtl';
                    }
                    if($ci == 4){
                        $ci = 0;
                    }
                ?>
                    <li>
                        <?php 
                            $i++;
                            $img_id = "";
                            if ($i <= 9) {
                                $img_id = '0' . $i;
                            } else {
                                $img_id = $i;
                            }
                        ?>
                        <a href="#item<?php echo $img_id; ?>">
                            <img src="<?php echo isset($img[$row['id']]) && is_file($fpath.'/'.$img[$row['id']]) ? $fpath.'/'.$img[$row['id']] :'' ?>" alt="">
                        </a>
                    </li>
                <?php endwhile; ?>
                <?php $i = 0; ?>
            </ul>
        </div>
        <?php
        $rtl ='rtl';
        $ci= 0;
        $img = array();
        $fpath = 'admin/assets/uploads/gallery';
        $files= is_dir($fpath) ? scandir($fpath) : array();
        foreach($files as $val){
            if(!in_array($val, array('.','..'))){
                $n = explode('_',$val);
                $img[$n[0]] = $val;
            }
        }
        $gallery2 = $conn->query("SELECT * from gallery order by id desc");

        $i = 0;
        while($row = $gallery2->fetch_assoc()):
            
            $ci++;
            if($ci < 3){
                $rtl = '';
            }else{
                $rtl = 'rtl';
            }
            if($ci == 4){
                $ci = 0;
            }
        
            $i++;
            $img_id = "";
            if ($i <= 9) {
                $img_id = '0' . $i;
            } else {
                $img_id = $i;
            }
        ?>
            <div id="item<?php echo $img_id; ?>" class="port">
            
                <div class="row">
                    <div class="description">
                        <h1><?php echo "Image " . $img_id ?></h1>
                        <p><?php echo ucwords($row['about']) ?></p>
                    </div>

                        <img src="<?php echo isset($img[$row['id']]) && is_file($fpath.'/'.$img[$row['id']]) ? $fpath.'/'.$img[$row['id']] :'' ?>" alt="">
                    </div>
                </div> <!-- / row -->

            </div>
        <?php endwhile; ?>
    </section>



        <script src="./js/gallery.js"></script>
<script>
    // $('.card.gallery-list').click(function(){
    //     location.href = "index.php?page=view_gallery&id="+$(this).attr('data-id')
    // })
    $('.book-gallery').click(function(){
        uni_modal("Submit Booking Request","booking.php?gallery_id="+$(this).attr('data-id'))
    })
    $('.gallery-img img').click(function(){
        viewer_modal($(this).attr('src'))
    })

</script>