<?php 
include 'admin/db_connect.php'; 
?>
<style>
    * {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
    #portfolio .img-fluid{
    width: calc(100%);
    height: 30vh;
    z-index: -1;
    position: relative;
    padding: 1em;
    }
    .gallery-list{
    cursor: pointer;
    border: unset;
    flex-direction: inherit;
    }
    .gallery-img,.gallery-list .card-body {
    width: calc(50%)
    }
    .gallery-img img{
    border-radius: 5px;
    min-height: 50vh;
    max-width: calc(100%);
    }
    span.hightlight{
    background: yellow;
    }
    .carousel,.carousel-inner,.carousel-item{
    min-height: calc(100%)
    }
    header.masthead,header.masthead:before {
        min-height: 50vh !important;
        height: 50vh !important
    }
    .row-items{
    position: relative;
    }
    .masthead{
        min-height: 23vh !important;
        height: 23vh !important;
    }
        .masthead:before{
        min-height: 23vh !important;
        height: 23vh !important;
    }

</style>

<link rel="stylesheet" href="./css/gallery.css">
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>

<header class="bg-maroon text-white">
    <div class="mt-5"></div>
    <h1>Job List <br> 
        <?php if (!isset($_SESSION['login_type'])): ?>
        <a href="javascript:void(0)" id="new_career" style="text-decoration: none;"><span>[ Post a New Job Opportunity ]</span></a>
        <?php endif; ?>
        <?php if (isset($_SESSION['login_type'])): ?>
        <a href="javascript:void(0)" style="text-decoration: none;"><span>[ALUMNI]</span></a>
        <?php endif; ?>
    </h1>
</header>
<div class="container mt-3 pt-2">
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-maroon text-white" id="filter-field"><i class="fa fa-search"></i></span>
                      </div>
                      <input type="text" class="form-control" placeholder="Filter" id="filter" aria-label="Filter" aria-describedby="filter-field">
                    </div>
                </div>
                <div class="col-md-4">
                    <button class="btn bg-maroon text-white btn-block" id="search">Search</button>
                </div>
            </div>
            
        </div>
    </div>
   <?php
    $event = $conn->query("SELECT c.*,u.name from careers c inner join users u on u.id = c.user_id order by id desc");
    while($row = $event->fetch_assoc()):
        $trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
        unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
        $desc = strtr(html_entity_decode($row['description']),$trans);
        $desc=str_replace(array("<li>","</li>"), array("",","), $desc);
    ?>
    <div class="card job-list" data-id="<?php echo $row['id'] ?>">
        <div class="card-body">
            <div class="row  align-items-center justify-content-center text-center h-100">
                <div class="">
                    <h3><b class="filter-txt text-maroon"><?php echo ucwords($row['job_title']) ?></b></h3>
                    <div class="d-flex justify-content-around text-maroon">
                    <span class="filter-txt"><small><b><i class="fa fa-building"></i> <?php echo ucwords($row['company']) ?></b></small></span>
                    <span class="filter-txt"><small><b><i class="fa fa-map-marker"></i> <?php echo ucwords($row['location']) ?></b></small></span>
                    </div>
                    <hr>
                    <larger class="truncate filter-txt"><?php echo strip_tags($desc) ?></larger>
                    <br>
                    <hr class="divider"  style="max-width: calc(80%)">
                    <span class="badge text-maroon float-left px-3 pt-1 pb-1">
                        Posted by: <?php echo $row['name'] ?>
                    </span>
                    <button class="btn bg-maroon text-white float-right read_more" data-id="<?php echo $row['id'] ?>">Read More</button>
                </div>
            </div>
            

        </div>
    </div>
    <br>
    <?php endwhile; ?>
    
</div>
    
</div>


<script>
    // $('.card.gallery-list').click(function(){
    //     location.href = "index.php?page=view_gallery&id="+$(this).attr('data-id')
    // })
    $('#new_career').click(function(){
        uni_modal("New Job Hiring","manage_career.php",'mid-large')
    })
    $('.read_more').click(function(){
        uni_modal("Career Opportunity","view_jobs.php?id="+$(this).attr('data-id'),'mid-large')
    })
    $('.gallery-img img').click(function(){
        viewer_modal($(this).attr('src'))
    })

   $('#filter').keypress(function(e){
    if(e.which == 13)
        $('#search').trigger('click')
   })
    $('#search').click(function(){
        var txt = $('#filter').val()
        start_load()
        if(txt == ''){
        $('.job-list').show()
        end_load()
        return false;
        }
        $('.job-list').each(function(){
            var content = "";
            $(this).find(".filter-txt").each(function(){
                content += ' '+$(this).text()
            })
            if((content.toLowerCase()).includes(txt.toLowerCase()) == true){
                $(this).toggle(true)
            }else{
                $(this).toggle(false)
            }
        })
        end_load()
    })

</script>