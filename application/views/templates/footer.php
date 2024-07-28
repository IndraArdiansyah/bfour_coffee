<!-- Footer -->
<footer class="sticky-footer bg-white position-fixxed-bottom">
  <div class="container my-auto">

  </div>
</footer>
<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<!-- Scroll to Top Button-->

<!-- Bootstrap core JavaScript-->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="<?= base_url('assets/js/material-dashboard.min.js?v=3.0.2'); ?>"></script>

<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
<script>
  $('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });
  $(document).ready(function() {
    $("#table-datatable").dataTable();
  });
  $('.alert-message').alert().delay(3500).slideUp('slow');
</script>

<script type="text/javascript">
  function nomer() {
    var antri = parseInt(document.getElementById('nomer').innerHTML) + 1;
    document.getElementById("nomer").innerHTML = antri;
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
</script>
<!--   Core JS Files   -->
<link rel="icon" type="image/png" href="<?php echo base_url('assets/img/favicon.png'); ?>">
<script src="<?= base_url('assets/js/core/popper.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/core/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/perfect-scrollbar.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/smooth-scrollbar.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/chartjs.min.js'); ?>"></script>

<script>
  function total($id_menu) {
    var hargainput = document.getElementById('harga').value;
    var qtyinput = document.getElementById('jumlah').value;

    var total = hargainput * qtyinput;
    var totalinput = document.getElementById('Total');
    totalinput.value = total;
    $('.Total').val(value);
    $(this), closest('.form-group').find(' .Total').val(value);
  }
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Fungsi untuk memeriksa data baru
    function checkNewOrders() {
      $.ajax({
        url: '<?= base_url('member/checkNewOrders'); ?>', // URL yang sesuai untuk memeriksa data baru
        type: 'GET',
        success: function(response) {
          response = JSON.parse(response);
          if (response.newOrders) {
            alertNewOrder();
          }
        },
        error: function(error) {
          console.error("Error checking new orders:", error);
        }
      });
    }

    // Fungsi untuk menampilkan notifikasi alert
    function alertNewOrder() {
      alert("Ada pesanan baru!");
    }

    // Set interval untuk memeriksa data baru setiap 10 detik
    setInterval(checkNewOrders, 10000);
  });
</script>



</body>

</html>