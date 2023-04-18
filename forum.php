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
    <h1>Blogs <br> <a href="./admin/index.php?page=manage_forum" id="new_forum" style="text-decoration: none;"><span>[ Create a New Topic ]</span></a></h1>
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
    $event = $conn->query("SELECT f.*,u.name from forum_topics f inner join users u on u.id = f.user_id order by f.id desc");
    while($row = $event->fetch_assoc()):
        $trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
        unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
        $desc = strtr(html_entity_decode($row['description']),$trans);
        $desc=str_replace(array("<li>","</li>"), array("",","), $desc);
        $count_comments=0;
        $count_comments = $conn->query("SELECT * FROM forum_comments where topic_id = ".$row['id'])->num_rows;
    ?>
    <div class="card Forum-list" data-id="<?php echo $row['id'] ?>">
        <div class="card-body">
            <div class="row align-items-center justify-content-center text-center h-100">
                <div class="w-100">
                    <?php if($_SESSION['login_id'] == $row['user_id']): ?>
                    <div class="dropdown float-right mr-4">
                      <a class="text-dark" href="javascript:void(0)" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="fa fa-ellipsis-v"></span>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item edit_forum" data-id="<?php echo $row['id'] ?>" href="javascript:void(0)">Edit</a>
                        <a class="dropdown-item delete_forum" data-id="<?php echo $row['id'] ?>" href="javascript:void(0)">Delete</a>
                      </div>
                    </div>
                    <?php endif; ?>
                    <h3><b class="filter-txt text-maroon"><?php echo ucwords($row['title']) ?></b></h3>
                    <hr>
                    <larger class="truncate filter-txt"><?php echo strip_tags($desc) ?></larger>
                    <br>
                    <hr class="divider"  style="max-width: 100%">
                    <span class="badge text-maroon float-left px-3 pt-1 pb-1">
                        <i>Topic Created by: <span class="filter-txt"><?php echo $row['name'] ?></span></i>
                    </span>
                     <span class="badge text-maroon float-left px-3 pt-1 pb-1 ml-2">
                        <i class="fa fa-comments"></i> <i><?php echo $count_comments ?> Comments</i>
                    </span>
                    <button class="btn bg-maroon text-white float-right view_topic" data-id="<?php echo $row['id'] ?>">View Topic</button>
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
    $('#new_forum').click(function(){
        uni_modal("New Topic","./admin/manage_forum.php",'mid-large')
    })  
    $('.view_topic').click(function(){
       location.replace('index.php?page=view_forum&id='+$(this).attr('data-id'))
    })
    $('.edit_forum').click(function(){
        uni_modal("Edit Topic","manage_forum.php?id="+$(this).attr('data-id'),'mid-large')
    })
    $('.gallery-img img').click(function(){
        viewer_modal($(this).attr('src'))
    })
     $('.delete_forum').click(function(){
        _conf("Are you sure to delete this Topic?","delete_forum",[$(this).attr('data-id')],'mid-large')
    })

    function delete_forum($id){
        start_load()
        $.ajax({
            url:'admin/ajax.php?action=delete_forum',
            method:'POST',
            data:{id:$id},
            success:function(resp){
                if(resp==1){
                    alert_toast("Data successfully deleted",'success')
                    setTimeout(function(){
                        location.reload()
                    },1500)

                }
            }
        })
    }
    $('#filter').keypress(function(e){
    if(e.which == 13)
        $('#search').trigger('click')
   })
    $('#search').click(function(){
        var txt = $('#filter').val()
        start_load()
        if(txt == ''){
        $('.Forum-list').show()
        end_load()
        return false;
        }
        $('.Forum-list').each(function(){
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