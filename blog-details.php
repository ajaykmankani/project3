<?php
include("autoLoader.php");
$obj = new Controller;

if(isset($_GET['slug'])){
    $blogs = $obj->fetch_where('blog',array("*"),array("slug"=>$_GET['slug']));
    if($blogs==true){
        foreach($blogs as $blog){
            $title = $blog->title;
            $slug = $blog->slug;
            $image = $blog->image;
            $description = $blog->description;
            $meta_title = $blog->meta_title;
            $meta_description = $blog->meta_description;
            $meta_keyword = $blog->meta_keyword;
            $created = $blog->created;
        }
    }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$msg = "";
if(isset($_POST['btnSupportSubmit'])){
    $name = test_input($_POST['name']);
    $phone = test_input($_POST['phone']);
    $email = test_input($_POST['email']);
    $subject = test_input($_POST['subject']);
    $message = test_input($_POST['message']);
   
    $res = $obj->array_insert("support",array(NULL,$name,$email,$phone,$subject,$message,1,$obj->get_datetime(),NULL));
    if($res==true){
        $msg = '<span class="text alert text-success">Sent Successfully</span>';
        echo "<script type='text/javascript'>window.location='thanks.html';</script>";
    }else{
        $msg = '<span class="text alert text-danger">Sent Successfully</span>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$meta_title?></title>
    <meta name="description" content="<?=$meta_description?>">
    <meta name="keywords" content="<?=$meta_keyword?>">
    
    <meta property="og:title" content="<?=$meta_title?>">
	<meta property="og:site_name" content="Stock Benefits">
	<meta property="og:url" content='<?="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"?>'>
	<meta property="og:description" content="<?=$meta_description?>">
	<meta property="og:type" content="website">
	<meta property="og:image" content="admin/uploads/blog/<?=$image?>">
    <!-- Fonts -->
    
    <link rel="shortcut icon" href="assets/images/favicon.png"> 
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/pylon-icons.css">
    <link rel="stylesheet" href="assets/css/odometer.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="assets/css/nouislider.min.css">
    <link rel="stylesheet" href="assets/css/nouislider.pips.css">
    <link rel="stylesheet" type="text/css" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" />

    <!-- Styles -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
      
    <div class="page-wrapper">
        <header class="main-header">
            <div class="topbar">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="topbar__right">
                                <a href="tel:+91-9044546300" class="blink-call"><i class="flaticon-telephone-1 blink-call"></i> Call Us : +91-9044546300</a>
                                <span class="blink-rno"> || SEBI Registration No. INA100007745 ||</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="top_menu">
                                <ul>
                                    <li><a href="about-us.php"> About Us</a></li>  
                                    <li><a href="updates.php"> Updates</a></li>
                                    <li><a href="blog.php"> Blog</a></li>
                                    <li><a href="contact-us.php"> Contact Us</a></li> 
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="topbar__left">
                                <div class="topbar__social">
                                    <a href="#" class="fab fa-facebook-square"></a>
                                    <a href="#" class="fab fa-twitter"></a>
                                    <a href="#" class="fab fa-instagram"></a>
                                </div> 
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
            <nav class="main-menu">
                <div class="container">
                    <div class="logo-box">
                        <a href="index.php" aria-label="logo image">
                            <img src="assets/images/logo.png" width="155" alt="">
                        </a>
                        <span class="fa fa-bars mobile-nav__toggler"></span>
                    </div>
                    <ul class="main-menu__list">
                        <li><a href="index.php">Home</a></li>
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle"  data-toggle="dropdown" href="#" role="button" aria-expanded="false">Service</a>
                            <ul>
                                <li><a href="future-package.php">Future Packages </a></li>
                                <li><a href="equity-packages.php">Equity Packages </a></li>
                                <li><a href="option-packages.php">Option Packages </a></li>
                                <li><a href="index-future-hni-services.php">Index Future HNI Services</a></li>
                                <li><a href="sb-premium-packages.php">SB Premium Packages </a></li>
                                <li><a href="hni-packages.php">HNI Packages</a></li>
                                <li><a href="ags-trades-package.php">AGS Trades Package</a></li>
                            </ul>
                        </li> 
                        <li><a href="payment-option.php">Payment Option</a></li>
                        <li><a href="past-performance.php">Past Performance</a></li>
                        <li><a href="risk-profile.php">Risk Profile</a></li>
                        <li><a href="invester-charter.php">Investor Charter</a></li>
                        <li><a href="complaint-data.php">Complaint Board</a></li>
                        <li><a href="grievance.php">Grievance</a></li>
                    </ul>

                    <div class="main-header__info">
                        <div class="main-header__info-phone">
                            <i class="pylon-icon-tech-support"></i>
                            <div class="main-header__info-phone-content">
                                <span>Call Now</span>
                                <h3><a href="tel:+91-9044546300">+91-9044546300</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div>
        </div>

    <section class="page-header">
        <div class="page-header__bg" style="background-image: url(assets/images/main/bg-better.webp);"></div>
        <div class="container">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="index.php">Home</a></li>
                <li>/</li>
                <li><span>Blog Details</span></li>
            </ul>
            <h2>Blog Details</h2>
        </div>
    </section>

    <section class="blog-details pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h2><?=$title?></h2>
                    <div class="blog-card__image">
                        <span><?=date('M d, Y', strtotime($created));?></span>
                        <img src="admin/uploads/blog/<?=$image?>" alt="<?=$title?>" width="770px" height="472px">
                    </div>
                    <div class="blog-card__meta">
                        <a href="#"><i class="far fa-comments"></i>Comment</a>
                        <a href="#"><i class="far fa-user"></i>Admin</a>
                    </div>
                    <div class="blog-details__content">
                        <?=$description?>
                     </div>

                    <div class="blog-details__bottom">
                        <div class="blog-details__social team-details__social">
                            <a href="#" class="fab fa-facebook-f"></a>
                            <a href="#" class="fab fa-twitter"></a>
                            <a href="#" class="fab fa-linkedin-in"></a>
                        </div>
                    </div>
                    
                    <div class="blog-comment-form">
                        <h2 class="blog-details__box-title">Leave A Reply</h2>
                        <form method="post" class="contact-one__form">
                            <p>Your email address will not be published. </p>
                            <div class="row low-gutters">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control contact-one__form-input" placeholder="Name*" name="name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control contact-one__form-input" placeholder="Email*" name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control contact-one__form-input" placeholder="Phone" name="phone" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="contact-one__form-consent">
                                        <div class="form-group">
                                            <input type="checkbox" name="consent" id="consentCheck">
                                            <label>Save my name, email, and website in this browser for the next time I comment.</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="hidden" name="subject" class="form-control" value="Blog Page">
                                        <textarea name="message" class="form-control contact-one__form-input" placeholder="Your Comment*" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <button class="thm-btn" type="submit" name="btnSupportSubmit">Post Comment</button>
                        </form>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-sidebar">
                        <!--<div class="blog-sidebar__box blog-sidebar__search">
                            <form class="search-form">
                                <input type="text" placeholder="Search" class="search-field">
                                <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="blog-sidebar__box blog-sidebar__categories">
                            <h3 class="blog-sidebar__box-title">Categories</h3>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#"><i class="far fa-arrow-right"></i><span>Business</span></a>
                                    (1)
                                </li>
                                <li>
                                    <a href="#"><i class="far fa-arrow-right"></i><span>Car Loan</span></a>
                                    (1)
                                </li>
                                <li>
                                    <a href="#"><i class="far fa-arrow-right"></i><span>Credit Card</span></a>
                                    (1)
                                </li>
                                <li>
                                    <a href="#"><i class="far fa-arrow-right"></i><span>Education</span></a>
                                    (2)
                                </li>
                                <li>
                                    <a href="#"><i class="far fa-arrow-right"></i><span>Investment</span></a>
                                    (1)
                                </li>
                            </ul>
                        </div>-->
                        <div class="blog-sidebar__box blog-sidebar__post">
                            <h3 class="blog-sidebar__box-title">Recent Posts</h3>
                            <ul class="list-unstyled footer-widget__post-list">
                            <?php
                            $Recentblogs = $obj->fetch_where_order_limit("blog",array("*"),array("status"=>1),"DESC",10);
                            if($Recentblogs==true){
                                foreach($Recentblogs as $blog){?>
                                <li>
                                    <img src="admin/uploads/blog/<?=$blog->image?>" alt="<?=$blog->title?>" width="75px" height="78px">
                                    <div class="footer-widget__post-list-content">
                                        <span><?=date('M d, Y', strtotime($blog->created));?></span>
                                        <h3><a href="blog-details.php?slug=<?=$blog->slug?>"><?=$blog->title?></a></h3>
                                    </div>
                                </li>
                            <?php }
                            }?>
                            </ul>

                        </div>
                        <!--<div class="blog-sidebar__box blog-sidebar__tags">
                            <h3 class="blog-sidebar__box-title">Tags</h3>
                            <ul class="list-unstyled blog-sidebar__tags-list">
                                <li><a href="#">bank</a></li>
                                <li><a href="#">business</a></li>
                                <li><a href="#">check</a></li>
                                <li><a href="#">company</a></li>
                                <li><a href="#">doc</a></li>
                                <li><a href="#">house loan</a></li>
                                <li><a href="#">it loan</a></li>
                                <li><a href="#">loan</a></li>
                                <li><a href="#">new</a></li>
                                <li><a href="#">video</a></li>
                            </ul>
                        </div>-->

                        <div class="blog-sidebar__box blog-sidebar__call">
                            <div class="service-sidebar__call">
                                <div class="service-sidebar__call-bg" style="background-image: url(assets/images/services/service-sidebar-1-1.jpg);"></div><!-- /.service-sidebar__call-bg -->
                                <i class="pylon-icon-tech-support"></i>
                                <h3><a href="tel:+91-9044546300"> +91-9044546300</a></h3>
                                <div class="pylon-mail">
                                    <a href="mailto:contact@stockbenfits.com"> contact@stockbenfits.com</a>
                                </div>
                                <p>We are here to help our customer any time. You can call on 24/7 To Answer Your Question.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include("footer.php");?>
</body>

</html>