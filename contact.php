<?php
require_once "./layout/header.php"
?>

<div class="hero-wrap hero-bread" style="background-image: url('assets/images/bg_1.jpg');">
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Contact us</span></p>
        <h1 class="mb-0 bread">Contact us</h1>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section contact-section bg-light">
  <div class="container">
    <div class="row d-flex mb-5 contact-info">
      <div class="w-100"></div>
      <div class="col-md-3 d-flex">
        <div class="info bg-white p-4">
          <p><span>Địa chỉ:</span> 12 Nguyễn Đình Chiều, Vĩnh Phước, Nha Trang</p>
        </div>
      </div>
      <div class="col-md-3 d-flex">
        <div class="info bg-white p-4">
          <p><span>Số điện thoại:</span> <a href="tel://1234567920">+ 0312312345</a></p>
        </div>
      </div>
      <div class="col-md-3 d-flex">
        <div class="info bg-white p-4">
          <p><span>Email:</span> <a href="mailto:info@yoursite.com">Alvintran20z@gmail.com</a></p>
        </div>
      </div>
      <div class="col-md-3 d-flex">
        <div class="info bg-white p-4">
          <p><span>Website:</span> <a href="#">Yoursite.com</a></p>
        </div>
      </div>
    </div>
    <div class="row block-9">
      <div class="col-md-6 order-md-last d-flex">
        <form action="#" class="bg-white p-5 contact-form">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Tên của bạn">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Email của bạn">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Tiêu đề">
          </div>
          <div class="form-group">
            <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Nội dung"></textarea>
          </div>
          <div class="form-group">
            <input type="submit" value="Gửi tin nhắn" class="btn btn-primary py-3 px-5">
          </div>
        </form>

      </div>

      <div class="col-md-6 d-flex">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3898.6761148391915!2d109.20030651429825!3d12.270183633201134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317067ed012aa14f%3A0x7734ee236bd70ee3!2zMTIgTmd1eeG7hW4gxJDDrG5oIENoaeG7g3UsIFbEqW5oIFRo4buNLCBOaGEgVHJhbmcsIEtow6FuaCBIw7JhIDY1MDAwMCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1671526732434!5m2!1svi!2s" width="1100" height="550" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>
    </div>
  </div>
</section>

<?php
require_once "./layout/footer.php"
?>