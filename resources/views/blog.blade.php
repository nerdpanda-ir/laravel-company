@extends('layouts.front')
@section('title') صفحه وبلاگ @endsection
@section('main')
    <x-partials.header />

    <!-- End Blog Area -->
    <div class="blog-page area-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="page-head-blog">
                        <div class="single-blog-page">
                            <!-- search option start -->
                            <form action="#">
                                <div class="search-option">
                                    <input type="text" placeholder="Search...">
                                    <button class="button" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </form>
                            <!-- search option end -->
                        </div>
                        <div class="single-blog-page">
                            <!-- recent start -->
                            <div class="left-blog">
                                <h4>recent post</h4>
                                <div class="recent-post">
                                    <!-- start single post -->
                                    <div class="recent-single-post">
                                        <div class="post-img">
                                            <a href="#">
                                                <img src="img/blog/1.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="pst-content">
                                            <p><a href="#"> Redug Lerse dolor sit amet consect adipis elit.</a></p>
                                        </div>
                                    </div>
                                    <!-- End single post -->
                                    <!-- start single post -->
                                    <div class="recent-single-post">
                                        <div class="post-img">
                                            <a href="#">
                                                <img src="img/blog/2.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="pst-content">
                                            <p><a href="#"> Redug Lerse dolor sit amet consect adipis elit.</a></p>
                                        </div>
                                    </div>
                                    <!-- End single post -->
                                    <!-- start single post -->
                                    <div class="recent-single-post">
                                        <div class="post-img">
                                            <a href="#">
                                                <img src="img/blog/3.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="pst-content">
                                            <p><a href="#"> Redug Lerse dolor sit amet consect adipis elit.</a></p>
                                        </div>
                                    </div>
                                    <!-- End single post -->
                                    <!-- start single post -->
                                    <div class="recent-single-post">
                                        <div class="post-img">
                                            <a href="#">
                                                <img src="img/blog/4.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="pst-content">
                                            <p><a href="#"> Redug Lerse dolor sit amet consect adipis elit.</a></p>
                                        </div>
                                    </div>
                                    <!-- End single post -->
                                </div>
                            </div>
                            <!-- recent end -->
                        </div>
                        <div class="single-blog-page">
                            <div class="left-blog">
                                <h4>categories</h4>
                                <ul>
                                    <li>
                                        <a href="#">Portfolio</a>
                                    </li>
                                    <li>
                                        <a href="#">Project</a>
                                    </li>
                                    <li>
                                        <a href="#">Design</a>
                                    </li>
                                    <li>
                                        <a href="#">wordpress</a>
                                    </li>
                                    <li>
                                        <a href="#">Joomla</a>
                                    </li>
                                    <li>
                                        <a href="#">Html</a>
                                    </li>
                                    <li>
                                        <a href="#">Website</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-blog-page">
                            <div class="left-blog">
                                <h4>archive</h4>
                                <ul>
                                    <li>
                                        <a href="#">07 July 2016</a>
                                    </li>
                                    <li>
                                        <a href="#">29 June 2016</a>
                                    </li>
                                    <li>
                                        <a href="#">13 May 2016</a>
                                    </li>
                                    <li>
                                        <a href="#">20 March 2016</a>
                                    </li>
                                    <li>
                                        <a href="#">09 Fabruary 2016</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-blog-page">
                            <div class="left-tags blog-tags">
                                <div class="popular-tag left-side-tags left-blog">
                                    <h4>popular tags</h4>
                                    <ul>
                                        <li>
                                            <a href="#">Portfolio</a>
                                        </li>
                                        <li>
                                            <a href="#">Project</a>
                                        </li>
                                        <li>
                                            <a href="#">Design</a>
                                        </li>
                                        <li>
                                            <a href="#">Website</a>
                                        </li>
                                        <li>
                                            <a href="#">Joomla</a>
                                        </li>
                                        <li>
                                            <a href="#">Html</a>
                                        </li>
                                        <li>
                                            <a href="#">wordpress</a>
                                        </li>
                                        <li>
                                            <a href="#">Masonry</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End left sidebar -->
                <!-- Start single blog -->
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="single-blog">
                                <div class="single-blog-img">
                                    <a href="blog-details.blade.php">
                                        <img src="img/blog/1.jpg" alt="">
                                    </a>
                                </div>
                                <div class="blog-meta">
                  <span class="comments-type">
											<i class="fa fa-comment-o"></i>
											<a href="#">11 comments</a>
										</span>
                                    <span class="date-type">
											<i class="fa fa-calendar"></i>2016-03-05 / 09:10:16
										</span>
                                </div>
                                <div class="blog-text">
                                    <h4>
                                        <a href="#">Post my imagine Items</a>
                                    </h4>
                                    <p>
                                        Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit.
                                    </p>
                                </div>
                                <span>
										<a href="blog-details.blade.php" class="ready-btn">Read more</a>
									</span>
                            </div>
                        </div>
                        <!-- End single blog -->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="single-blog">
                                <div class="single-blog-img">
                                    <a href="blog-details.blade.php">
                                        <img src="img/blog/2.jpg" alt="">
                                    </a>
                                </div>
                                <div class="blog-meta">
                  <span class="comments-type">
											<i class="fa fa-comment-o"></i>
											<a href="#">7 comments</a>
										</span>
                                    <span class="date-type">
											<i class="fa fa-calendar"></i>2016-03-05 / 09:10:16
										</span>
                                </div>
                                <div class="blog-text">
                                    <h4>
                                        <a href="#">Post my imagine Items</a>
                                    </h4>
                                    <p>
                                        Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit.
                                    </p>
                                </div>
                                <span>
										<a href="blog-details.blade.php" class="ready-btn">Read more</a>
									</span>
                            </div>
                        </div>
                        <!-- Start single blog -->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="single-blog">
                                <div class="single-blog-img">
                                    <a href="blog-details.blade.php">
                                        <img src="img/blog/3.jpg" alt="">
                                    </a>
                                </div>
                                <div class="blog-meta">
                  <span class="comments-type">
											<i class="fa fa-comment-o"></i>
											<a href="#">13 comments</a>
										</span>
                                    <span class="date-type">
											<i class="fa fa-calendar"></i>2016-03-05 / 09:10:16
										</span>
                                </div>
                                <div class="blog-text">
                                    <h4>
                                        <a href="#">Post my imagine Items</a>
                                    </h4>
                                    <p>
                                        Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit.
                                    </p>
                                </div>
                                <span>
										<a href="blog-details.blade.php" class="ready-btn">Read more</a>
									</span>
                            </div>
                        </div>
                        <!-- End single blog -->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="single-blog">
                                <div class="single-blog-img">
                                    <a href="blog-details.blade.php">
                                        <img src="img/blog/4.jpg" alt="">
                                    </a>
                                </div>
                                <div class="blog-meta">
                  <span class="comments-type">
											<i class="fa fa-comment-o"></i>
											<a href="#">1 comments</a>
										</span>
                                    <span class="date-type">
											<i class="fa fa-calendar"></i>2016-03-05 / 09:10:16
										</span>
                                </div>
                                <div class="blog-text">
                                    <h4>
                                        <a href="#">Post my imagine Items</a>
                                    </h4>
                                    <p>
                                        Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit.
                                    </p>
                                </div>
                                <span>
										<a href="blog-details.blade.php" class="ready-btn">Read more</a>
									</span>
                            </div>
                        </div>
                        <!-- Start single blog -->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="single-blog">
                                <div class="single-blog-img">
                                    <a href="blog-details.blade.php">
                                        <img src="img/blog/5.jpg" alt="">
                                    </a>
                                </div>
                                <div class="blog-meta">
                  <span class="comments-type">
											<i class="fa fa-comment-o"></i>
											<a href="#">10 comments</a>
										</span>
                                    <span class="date-type">
											<i class="fa fa-calendar"></i>2016-03-05 / 09:10:16
										</span>
                                </div>
                                <div class="blog-text">
                                    <h4>
                                        <a href="#">Post my imagine Items</a>
                                    </h4>
                                    <p>
                                        Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit.
                                    </p>
                                </div>
                                <span>
										<a href="blog-details.blade.php" class="ready-btn">Read more</a>
									</span>
                            </div>
                        </div>
                        <!-- End single blog -->
                        <div class="blog-pagination">
                            <ul class="pagination">
                                <li><a href="#">&lt;</a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">&gt;</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Area -->

    <div class="clearfix"></div>

    <!-- Start Footer bottom Area -->
    <footer>
        <div class="footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="footer-content">
                            <div class="footer-head">
                                <div class="footer-logo">
                                    <h2><span>e</span>Business</h2>
                                </div>

                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p>
                                <div class="footer-icons">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-google"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-pinterest"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end single footer -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="footer-content">
                            <div class="footer-head">
                                <h4>information</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                                </p>
                                <div class="footer-contacts">
                                    <p><span>Tel:</span> +123 456 789</p>
                                    <p><span>Email:</span> contact@example.com</p>
                                    <p><span>Working Hours:</span> 9am-5pm</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end single footer -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="footer-content">
                            <div class="footer-head">
                                <h4>Instagram</h4>
                                <div class="flicker-img">
                                    <a href="#"><img src="img/portfolio/1.jpg" alt=""></a>
                                    <a href="#"><img src="img/portfolio/2.jpg" alt=""></a>
                                    <a href="#"><img src="img/portfolio/3.jpg" alt=""></a>
                                    <a href="#"><img src="img/portfolio/4.jpg" alt=""></a>
                                    <a href="#"><img src="img/portfolio/5.jpg" alt=""></a>
                                    <a href="#"><img src="img/portfolio/6.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-area-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="copyright text-center">
                            <p>
                                &copy; Copyright <strong>eBusiness</strong>. All Rights Reserved
                            </p>
                        </div>
                        <div class="credits">
                            <!--
                              All the links in the footer should remain intact.
                              You can delete the links only if you purchased the pro version.
                              Licensing information: https://bootstrapmade.com/license/
                              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eBusiness
                            -->
                            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    

@endsection
