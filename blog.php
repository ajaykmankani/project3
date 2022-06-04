<?php
include("autoLoader.php");
$obj = new Controller;

?>
<?php include("header.php");?>

    <section class="page-header">
        <div class="page-header__bg" style="background-image: url(assets/images/main/bg-better.webp);"></div>
        <div class="container">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="index.php">Home</a></li>
                <li>/</li>
                <li><span>Blog</span></li>
            </ul>
            <h2>Blog</h2>
        </div>
    </section>
    

    <section class="blog-page pt-100 pb-60">
        <div class="container">
            <div class="row">
            <?php
            $blogs = $obj->fetch_where_order_limit("blog",array("*"),array("status"=>1),"DESC",20);
            if($blogs==true){
                foreach($blogs as $blog){?>
                <div class="col-lg-4 col-md-6">
                        <div class="blog-card">
                        <div class="blog-card__image">
                            <span><?=date('M d, Y', strtotime($blog->created));?></span>
                            <img src="admin/uploads/blog/<?=$blog->image?>" alt="<?=$blog->title?>" width="360px" height="250px">
                        </div>
                        <div class="blog-card__content">
                            <div class="blog-card__meta">
                                <a href="index.php"><i class="far fa-user"></i>Admin</a> 
                            </div>
                            <h3><a href="blog-details.php?slug=<?=$blog->slug?>"><?=$blog->title?></a></h3>
                            <div class="blog-card__bottom">
                                <div class="blog-card-bottom-readmore">
                                    <a href="blog-details.php?slug=<?=$blog->slug?>" class="readmore-card-link"><i class="pylon-icon-right-arrow"></i>Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
            }?>
            </div>
        </div>
    </section>
    
<?php include("footer.php");?>
</body>

</html>