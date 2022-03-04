<?php 
include 'admin/db_connect.php'; 
?>
<style>
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
position:relative;
overflow:hidden;
}
.gallery-img {
   
}
.gallery-img{
    width: 100%;
}
.gallery-img img{
    border-radius: 5px;
    
    max-width: calc(100%);
}
.gallery-list .card-body{
    position:absolute;
    top:80%;
    left:0%;
    background-color:#000;
    height:100%;
    width:100%;
    transition:all 0.3s linear;
}
.gallery-list:hover .card-body{
    top:0;
    background-color:#00000059;
  
}
.gallery-img {
}
span.hightlight{
    background: yellow;
}
.gallery-list .card-body .truncate small{
    font-size:21px;
    font-style:initial;
    color:white;
}
.carousel,.carousel-inner,.carousel-item{
   min-height: calc(100%)
}
header.masthead,header.masthead:before {
        min-height: 70vh !important;
        height: 70vh !important
    }
.row-items{
    position: relative;
}
.card-left{
    left:0;
}
.card-right{
    right:0;
}
.rtl{
    direction: rtl ;
}
.gallery-text{
    justify-content: center;
    align-items: center ;
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
        <header class="masthead">
            <div class="container-fluid h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8  mb-4 page-title">
                        <h2 class="text-white">Gallery</h2>
                        <hr class="divider my-4" />

                    <div class="col-md-12 mb-2 justify-content-center">
                    </div>                        
                    </div>
                    
                </div>
            </div>
        </header>
            <div class="container mt-3 pt-2">
               
                <div class="row-items">
                <div class="col-lg-12">
                    <div class="row">
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
                $gallery = $conn->query("SELECT * from gallery order by id desc");
                while($row = $gallery->fetch_assoc()):
                   
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
                <div class="col-md-4">
                <div class="card gallery-list <?php echo $rtl ?>" data-id="<?php echo $row['id'] ?>">
                        <div class="gallery-img item-image-holder" card-img-top>

                            <img src="<?php echo isset($img[$row['id']]) && is_file($fpath.'/'.$img[$row['id']]) ? $fpath.'/'.$img[$row['id']] :'' ?>" alt="">
                        </div>
                    <div class="card-body">
                        <div class="row  justify-content-center text-center h-100">
                            <div class="">
                                <div>
                                <span class="truncate" style="font-size: inherit;"><small><?php echo ucwords($row['about']) ?></small></span>
                                    <br>
                                </div>
                            </div>
                        </div>
                        

                    </div>
                </div>
                <br>
                </div>
                <?php endwhile; ?>
                </div>
                </div>
                </div>
            </div>


<script>
    $('.book-gallery').click(function(){
        uni_modal("Submit Booking Request","booking.php?gallery_id="+$(this).attr('data-id'))
    })
    $('.gallery-img img').click(function(){
        viewer_modal($(this).attr('src'))
    })

</script>