<footer class="ftco-footer ftco-section">
  <div class="container">
    <div class="row">
      <div class="mouse">
        <a href="#" class="mouse-icon">
          <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
        </a>
      </div>
    </div>
    <div class="row mb-5">
      <div class="col-md">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Figure Store</h2>
          <p>ShopFigu is a store that always provides hobbyists, passionate about collecting character models. We will constantly update the latest and most popular models for you to collect!!
          </p>
          <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
          </ul>
        </div>
      </div>
      <div class="col-md">
        <div class="ftco-footer-widget mb-4 ml-md-5">
          <h2 class="ftco-heading-2">Menu</h2>
          <ul class="list-unstyled">
            <li><a href="index.php" class="py-2 d-block">Home</a></li>
            <li><a href="shop.php" class="py-2 d-block">Shop</a></li>
            <li><a href="about.php" class="py-2 d-block">About</a></li>
            <li><a href="blog.php" class="py-2 d-block">Blog</a></li>
            <li><a href="contact.php" class="py-2 d-block">Contact</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-4">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">
            Purchase Policy</h2>
          <div class="d-flex">
            <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
              <li><a href="#" class="py-2 d-block">Order form</a></li>
              <li><a href="#" class="py-2 d-block">Payments</a></li>
              <li><a href="#" class="py-2 d-block">Transports </a></li>
              <li><a href="#" class="py-2 d-block">Return Policy</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Thông tin Liên Hệ</h2>
          <div class="block-23 mb-3">
            <ul>
              <li><span class="icon icon-map-marker"></span><span class="text">12 Nguyễn Đình Chiều, Vĩnh Phước, Nha Trang</span></li>
              <li><a href="#"><span class="icon icon-phone"></span><span class="text">+03 12312345</span></a></li>
              <li><a href="#"><span class="icon icon-envelope"></span><span class="text">Alvintran20z@gmail.com</span></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">

      </div>
    </div>
  </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
    <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
    <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
  </svg></div>


<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery-migrate-3.0.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.easing.1.3.js"></script>
<script src="assets/js/jquery.waypoints.min.js"></script>
<script src="assets/js/jquery.stellar.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/aos.js"></script>
<script src="assets/js/jquery.animateNumber.min.js"></script>
<script src="assets/js/bootstrap-datepicker.js"></script>
<script src="assets/js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="assets/js/google-map.js"></script>
<script src="assets/js/main.js"></script>
<script>
  $(document).ready(function() {
    var quantitiy = 0;
    $(".quantity-right-plus").click(function(e) {
      e.preventDefault();
      var quantity = parseInt($("#quantity").val());
      $("#quantity").val(quantity + 1);
    });

    $(".quantity-left-minus").click(function(e) {
      e.preventDefault();
      var quantity = parseInt($("#quantity").val());
      if (quantity > 0) {
        $("#quantity").val(quantity - 1);
      }
    });
  });
</script>
</body>

</html>