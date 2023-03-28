<?php include 'includes/header.php'; ?>
<!DOCTYPE html>

<body class="host_version">
    <?php include 'includes/modal.php' ?>





    <!-- Blog Started -->

    <div id="story" class="section wb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>Stories</h3>
                    <p class="lead">For story seekers!</p>
                </div>
            </div><!-- end title -->

            <hr class="invis">

            <div class="row">
                <?php
                $toupdate =  mysqli_real_escape_string($con, $_GET['cat']);
                $query2 = "SELECT * FROM blog WHERE category='$toupdate'";
                $result2 = mysqli_query($con, $query2);
                while ($row2 = mysqli_fetch_array($result2)) {

                    $title = "$row2[title]";
                    $id = "$row2[id]";
                    $userid = "$row2[user_id]";
                    $postdate = "$row2[postdate]";
                    $category = "$row2[category]";
                    $details = "$row2[details]";
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
         <span><i class='fa fa-tag'></i>  <a href='#'>News</a> </span>
         <span><i class='fa fa-comments'></i> <a href='#'>12 Comments</a></span>
     </div>
     <div class='blog-title'>
         <h2><a href='#' title=''>$title</a></h2>
     </div>
     <div class='blog-desc'>
         <p>$details</p>
     </div>
     <div class='blog-button'>
         <a class='hover-btn-new orange' href='readstory.php?id=$id'><span>Read More</span></a>
     </div>
 </div>
</div>
                ";
                } ?>
            </div><!-- end row -->
        </div><!-- end container -->
    </div>end section






    <?php include 'includes/footer.php' ?>



    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
    <script src="js/timeline.min.js"></script>
    <script>
        timeline(document.querySelectorAll('.timeline'), {
            forceVerticalMode: 700,
            mode: 'horizontal',
            verticalStartPosition: 'left',
            visibleItems: 4
        });
    </script>

</body>

</html>