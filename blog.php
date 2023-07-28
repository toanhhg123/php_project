<?php
require_once "./layout/header.php";
require_once "./models/blog.php";

$blogs = Blog::findAll();
?>

<div class="hero-wrap hero-bread" style="background-image: url('assets/images/bg_1.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Blog</span></p>
                <h1 class="mb-0 bread">Blog</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ftco-animate">
                <div class="row">
                    <?php foreach ($blogs as $blog): ?>
                        <div class="col-md-12 d-flex ftco-animate">
                            <div class="blog-entry align-self-stretch d-md-flex">
                                <a href="blog-single.php?id=<?= $blog->id ?>" class="block-20"
                                    style="background-image: url('<?= './files/' . $blog->image ?>');">
                                </a>
                                <div class="text d-block pl-md-4">
                                    <div class="meta mb-3">
                                        <div><a href="#">
                                                <?= $blog->created_at ?>
                                            </a></div>
                                        <div><a href="#">Admin</a></div>
                                        <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                                    </div>
                                    <h3 class="heading"><a href="#">
                                            <?= $blog->title ?>
                                        </a></h3>
                                    <p>
                                        <?= $blog->content ?>
                                    </p>
                                    <p><a href="blog-single.php?id=<?= $blog->id ?>" class="btn btn-primary py-2 px-3">Read
                                            more</a></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>

                </div>
            </div> <!-- .col-md-8 -->
            <div class="col-lg-4 sidebar ftco-animate">
                <div class="sidebar-box">
                    <form action="#" class="search-form">
                        <div class="form-group">
                            <span class="icon ion-ios-search"></span>
                            <input type="text" class="form-control" placeholder="Search...">
                        </div>
                    </form>
                </div>

                <div class="sidebar-box ftco-animate">
                    <h3 class="heading">Recent Blog</h3>
                    <?php foreach ($blogs as $blog): ?>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" href="blog-single.php?id=<?= $blog->id ?>"
                                style="background-image: url('<?= './files/' . $blog->image ?>');"></a>
                            <div class="text">
                                <h3 class="heading-1"><a href="blog-single.php?id=<?= $blog->id ?>"><?= $blog->content ?></a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> April 09, 2019</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach ?>

                </div>


                <div class="sidebar-box ftco-animate">
                    <h3 class="heading">Tin Tức - Sự Kiện</h3>
                    <p>Chúng tôi sẽ luôn cập nhập và đưa ra những chương trình khuyến mãi cực kỳ hấp dẫn. Và 
                        chúng tôi sẽ có những chính sách mới giúp các bạn có thể tiếp cận với những mô hình mới nhất
                        hoặc những mô hình mà các bạn yêu thích.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section> <!-- .section -->



<?php
require_once "./layout/footer.php"
    ?>