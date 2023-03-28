<?php include 'includes/header.php'; ?>
<!DOCTYPE html>

<body class="host_version">
    <?php include 'includes/modal.php' ?>


    <div id="story" class="section wb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>Stories</h3>
                    <p class="lead">Check out the latest stories</p>
                </div>
            </div><!-- end title -->

            <hr class="invis">

            <div class="row">
                <?php $query2 = "SELECT * FROM blog ORDER BY id DESC limit 8";
                $result2 = mysqli_query($con, $query2);
                while ($row2 = mysqli_fetch_array($result2)) {

                    $title = "$row2[title]";
                    $id = "$row2[id]";
                    $userid = "$row2[user_id]";
                    $postdate = "$row2[postdate]";
                    $category = "$row2[category]";
                    $details = "$row2[details]";
                    $country = "$row2[country]";
                    $ufile = "$row2[ufile]";
                    $ufile_source = "uploads/" . $ufile;
                    echo "
 <div class='col-lg-4 col-md-6 col-12'>
 <div class='blog-item'>
     <div class='image-blog'>
         <img src='$ufile_source' alt='' class='img-fluid'>
     </div>
     <div class='meta-info-blog'>
         <span><i class='fa fa-calendar'></i> <a href='#'>$postdate</a> </span>
         <span><i class='fa fa-tag'></i>  <a href='#'>$category</a> </span>
         <span><i class='fa fa-comments'></i> <a href='#'>$country</a></span>
     </div>
     <div class='blog-title'>
         <h2><a href='#' title=''>$title</a></h2>
     </div>
     <div class='blog-desc'>
         <p>$details</p>
     </div>
     <div class='blog-button'>
         <a class='hover-btn-new orange' href='readstory.php?id=$id'><span>Read More</span></a> 
         <div class='fb-share-button' data-href='https://developers.facebook.com/docs/plugins/' data-layout='' data-size=''><a target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse' class='fb-xfbml-parse-ignore'>Share</a></div>
   
     </div>
   <div class='fb-comments' data-href='readstory.php?id=$id' data-width=25 data-numposts='5'></div>
 </div>
</div>
                ";
                } ?>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->