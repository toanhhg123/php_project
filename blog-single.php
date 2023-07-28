<?php
require_once "./layout/header.php";
require_once './models/blog.php';


$id = $_GET["id"];

$blog = Blog::findById($id);
if (!$blog)
  header('Location: 404.php');

?>

<div class="hero-wrap hero-bread" style="background-image: url('<?= './files/' . $blog->image ?>');">
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="">Home</a></span> <span>Blog</span></p>
        <h1 class="mb-0 bread">Blog</h1>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section ftco-degree-bg">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 ftco-animate">
        <h2 class="mb-3">
          <?= $blog->title ?>
        </h2>
        <img src="<?= './files/' . $blog->image ?>" alt="" class="img-fluid">
        <p>
          <?= $blog->content ?>
        </p>

        <div class="tag-widget post-tag-container mb-5 mt-5">
          <div class="tagcloud">
            <a href="#" class="tag-cloud-link">Life</a>
            <a href="#" class="tag-cloud-link">Sport</a>
            <a href="#" class="tag-cloud-link">Tech</a>
            <a href="#" class="tag-cloud-link">Travel</a>
          </div>
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

      </div>

    </div>
  </div>
</section> <!-- .section -->
<?php
require_once "./layout/footer.php"
?>