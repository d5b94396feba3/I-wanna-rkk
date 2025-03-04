<div class="sidebar-overlay"></div>
<!-- ======= Footer ======= -->
<footer id="main-footer">
  <div class="footer-content">
    <div class="copyright">
      © <?php echo date('Y'); ?> ROKK. All Right Reserved.
    </div>
    <div class="footer-links">
      <!-- <a href="#">Legal Disclaimer</a> -->
      <a href="https://rokk-app.com/privacy-policy">Privacy Policy</a>
      <a href="https://rokk-app.com/terms-of-use">Terms of use</a>
    </div>
    <!-- <div class="language-selector">
      <select>
        <option value="de">Germany</option>
      </select>
    </div> -->
  </div>
</footer>

<div id="ajax_loader">
    <i class="fa fa-spinner fa-spin"></i>
</div>

<script src="<?php echo base_url("assets/src/new/vendor/aos/aos.js"); ?>"></script>
<script src="<?php echo base_url("assets/src/new/vendor/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
<script async defer src="<?php echo base_url("assets/src/new/js/main.js"); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</body>
</html>

<script>
// Load CSS and custom select dropdown JS
document.addEventListener("DOMContentLoaded", function() {
  function loadCSS(e) {
    var t = document.createElement("link");
    (t.type = "text/css"), (t.rel = "stylesheet"), (t.href = e), document.head.appendChild(t);
  }
  loadCSS("<?php echo base_url("assets/src/vendor/aos/aos.css"); ?>"),
  loadCSS("<?php echo base_url("assets/src/vendor/bootstrap-icons/bootstrap-icons.css"); ?>"),
  loadCSS("<?php echo base_url("assets/src/vendor/remixicon/remixicon.css"); ?>"),
  loadCSS("https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i");
});
</script>
