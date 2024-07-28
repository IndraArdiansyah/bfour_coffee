<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pembayaran Invoice </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link id="style" href="<?php echo base_url() ?>assets/css/plugins/bootstrap.custom.min.css" rel="stylesheet" />

  <style>
    @media only screen and (max-width: 600px) {
      .memberdetail {
        margin-left: 1px;
      }

      .mob1 {
        margin-top: 5px !important;
      }
    }

    body {
      padding-top: 80px;
      background-image: url("<?php echo base_url() ?>assets/img/home3.jpg");

    }

    button.accordion {
      width: 100%;
      background-color: #0d6efd;
      color: #fff;
      border: none;
      outline: none;
      text-align: left;
      padding: 0.5em 1em;
      font-size: 1.2em;
      cursor: pointer;
      transition: background-color 0.2s linear;
      display: flex;
    }

    button.accordion:hover {
      background-color: #0b5ed7;
    }

    .accordion-content {
      padding: 0 1em;
      height: 0;
      overflow: hidden;
      transition: height 0.2s ease-out;
    }

    button div .arrow {
      border: solid #fff;
      border-width: 0 4px 4px 0;
      display: inline-block;
      padding: 3px;
      transform: rotate(-135deg);
      transition: transform 0.3s ease-out;
    }

    .btnarrow {
      margin: auto 0 auto auto;
    }
  </style>
</head>

<body>

  <div class="container" style="max-width:630px;">
    <div class="row p-2 m-1 rounded bg-light mob1 shadow-lg">
      <div class="d-flex justify-content-between mb-2">
        <div class="text-left" style="margin-left:1px;">
          <span>Pembayaran dengan<strong>
              <br />
              <?php
              echo $tripay->data->payment_name;
              ?>
            </strong>

          </span>
        </div>
        <div class="text-right" style="margin-top: auto;margin-bottom: auto;">
          <img src="<?= $payment->data[0]->icon_url ?> " style="height:100%;max-height:30px;" />
        </div>
      </div>


      <div class="col-md-7 col-lg-12 mt-2">
        <ul class="list-group mb-3">
          <li class="list-group-item">
            <h6 class="my-0">Id Booking</h6>
            <small class="text-muted"><?= $tripay->data->merchant_ref ?></small>
          </li>
          <!-- Jika menggunakan PHP 8.xx gunakan kode ini -->
          <?php if (strpos($tripay->data->payment_method, 'QRIS') !== false && ($tripay->data->status == 'UNPAID')) { ?>

            <li class="list-group-item">
              <div>
                <h6 class="my-0">Kode QRIS <small class="fw-normal">(*Klik untuk memperbesar kode QR)</small></h6>
                <div class="mt-1 w-100 d-flex justify-content-center">
                  <img onclick='zoomQR()' src="<?= $tripay->data->qr_url ?>" width="175px" height="175px" />
                </div>
              </div>
            </li>
          <?php } else { ?>
            <li class="list-group-item">
              <div>
                <h6 class="my-0">Kode Bayar / No VA</h6>
                <div class="input-group mt-1 w-100">
                  <input type="text" class="form-control" id="kodebayar" value="<?= $tripay->data->pay_code ?>">
                  <button class="btn btn-outline-secondary text-black" type="button" id="salinkodebayar" onClick="copyToClipboard();">
                    <svg style="margin-top:-3px;" xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24">
                      <path d="M15.143 13.244l.837-2.244 2.698 5.641-5.678 2.502.805-2.23s-8.055-3.538-7.708-10.913c2.715 5.938 9.046 7.244 9.046 7.244zm8.857-7.244v18h-18v-6h-6v-18h18v6h6zm-2 2h-12.112c-.562-.578-1.08-1.243-1.521-2h7.633v-4h-14v14h4v-3.124c.6.961 1.287 1.823 2 2.576v6.548h14v-14z" />
                    </svg>
                    Salin
                  </button>
                </div>
              </div>
            </li>
          <?php } ?>

          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              Nama Menu : <br />
              <?php foreach ($data as $item) : ?>
                <h6><?= $item['name'] ?></h6>
              <?php endforeach; ?>
            </div>
            <div>
              Jumlah : <br />
              <?php foreach ($data as $item) : ?>
                <h6><?= $item['quantity'] ?> Item</h6>
              <?php endforeach; ?>
            </div>
            <div>
              Harga : <br />
              <?php foreach ($data as $item) : ?>
                <h6>Rp. <?= number_format($item['price']) ?></h6>
              <?php endforeach; ?>
              <br>
              Subtotal : <br />
              <h6>Rp. <?= number_format($total_amount, 0, ',', '.'); ?></h6>
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <small>Biaya Admin</small>
              <h6>Jumlah Bayar</h6>
            </div>
            <div>
              <small>Rp <?= number_format($tripay->data->fee_customer, 0, ',', '.') ?></small>
              <h6>Rp <?= number_format($tripay->data->amount, 0, ',', '.') ?></h6>
            </div>
          </li>

          <li class="list-group-item d-flex justify-content-between">
            <div>
              <h6 class="my-0 d-inline">Status</h6>
              <!-- <small>(AutoRefresh: <span id="timer"></span>)</small> -->
            </div>
            <div>
              <strong>
                <?php
                if ($tripay->data->status == 'UNPAID') {
                  echo '<small class="text-danger">Menunggu Pembayaran</small>';
                } else if ($tripay->data->status == 'PAID') {
                  echo '<small class="text-success">Lunas</small>';
                } else if ($tripay->data->status == 'EXPIRED') {
                  echo '<small class="text-danger">Kadaluarsa</small>';
                } else {
                  echo '<small class="text-danger">Gagal</small>';
                }
                ?>
              </strong>
            </div>
          </li>
          <!-- <?php if ($tripay->data->status == 'UNPAID') { ?>
            <li class="list-group-item d-flex justify-content-between">
              <h6 class="my-0">Batas Pembayaran</h6>
              <strong><?= $tripay->data->expired_time ?></strong>
            </li>
          <?php } ?> -->
        </ul>

        <button class="accordion mt-2 mb-2">
          <div>
            Lihat Cara Pembayaran
          </div>
          <div class="btnarrow">
            <i class="arrow"></i>
          </div>
        </button>
        <div class="accordion-content">
          <div class="row">
            <div class="col-lg-12">
              <?php
              foreach ($tripay->data->instructions as $k => $v) {
                echo "<p class='text-dark mt-2 mb-2'><strong>" . $v->title . "</strong></p>";
                foreach ($v->steps as $kk => $vv) {
                  echo "<p class='text-dark mt-2 mb-2'><small>" . $vv . "</small></p>";
                }
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script>
    document.querySelectorAll(".accordion").forEach(button => {
      button.onclick = function() {
        this.classList.toggle("active");
        this.querySelector(".arrow").style.transform = this.classList.contains("active") ? "rotate(45deg)" : "rotate(-135deg)";
        let content = this.nextElementSibling;
        content.style.height = this.classList.contains("active") ? content.scrollHeight + "px" : "0";
      }
    });

    function copyToClipboard() {
      var copyText = document.getElementById("kodebayar");
      copyText.select();
      copyText.setSelectionRange(0, 99999);
      document.execCommand("copy");
    }

    function zoomQR() {
      var qrURL = '<?= $tripay->data->qr_url ?>';
      var zoomWindow = window.open('', '_blank');
      zoomWindow.document.write('<img src="' + qrURL + '" style="width:100%;height:100%;">');
    }

    window.onload = function() {
      setInterval(function() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'check_payment_status.php', true);
        xhr.onload = function() {
          if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.status === 'PAID') {
              alert('Pembayaran Berhasil!');
              location.reload();
            } else if (response.status === 'EXPIRED') {
              alert('Waktu pembayaran telah kadaluarsa.');
              location.reload();
            } else if (response.status === 'FAILED') {
              alert('Pembayaran gagal.');
              location.reload();
            }
          }
        };
        xhr.send();
      }, 30000); // Memeriksa setiap 30 detik
    };
  </script>
</body>

</html>