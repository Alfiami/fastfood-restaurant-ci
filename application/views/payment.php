<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-image: url('http://localhost/uas/assets/img/order.jpg'); /* Path to your background image */
      background-size: cover; /* Menyesuaikan ukuran gambar agar selalu mengisi area background */
      background-position: center; /* Posisi gambar latar belakang di tengah-tengah halaman */
      background-repeat: no-repeat; /* Hindari pengulangan gambar */
      background-attachment: fixed; /* Membuat gambar latar belakang tetap di tempat saat menggulir halaman */
      background-color: #f8f9fa; /* Warna latar belakang jika gambar tidak terlihat atau tidak dimuat */
    }
    .payment-page {
      margin-top: 50px; /* Adjust top margin */
    }
    .card {
      border: none; /* Remove default card border */
      width: 100%; /* Lebar card 100% */
      max-width: 500px; /* Lebar maksimum card */
      padding: 30px; /* Add padding inside card body */
      background-color: #fff; /* Background warna putih */
    }
    .card-header {
      background-color: #91accf; /* Blue background */
      color: #fff; /* White text */
      border-radius: 0; /* Remove border radius */
    }
    label {
      font-weight: bold; /* Bold labels */
    }
    .btn-pay-now {
      background-color: #b7d2f6; /* Blue background */
      border-color: #b7d2f6; /* Blue border */
    }
    .btn-pay-now:hover {
      background-color: #c9302c; /* Darker red on hover */
      border-color: #ac2925; /* Darker red border on hover */
    }
    @media (min-width: 768px) {
      .card-container {
        margin-left: 3cm; /* Margin kiri untuk menjaga jarak dari konten lain pada layar lebar */
      }
    }
  </style>
</head>
<body>
  <div class="payment-page">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6 card-container">
          <!-- Card di sebelah kiri -->
          <div class="card shadow">
            <div class="card-header">
              <h3 class="text-center mb-0">Payment for Order #<?php echo $order['id']; ?></h3>
            </div>
            <div class="card-body">
              <h5 class="card-title mb-4 text-center">Total Amount: $<?php echo number_format($order['total_amount'], 2); ?></h5>
              <form method="post" action="<?php echo site_url('home/process_payment/'.$order['id']); ?>">
                <div class="form-group">
                  <label for="card_number">Card Number</label>
                  <input type="text" class="form-control" id="card_number" name="card_number" required>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="expiry_date">Expiry Date (MM/YYYY)</label>
                    <input type="text" class="form-control" id="expiry_date" name="expiry_date" placeholder="MM/YYYY" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="cvv">CVV</label>
                    <input type="text" class="form-control" id="cvv" name="cvv" required>
                  </div>
                </div>
                <button type="submit" class="btn btn-pay-now btn-block">Pay Now</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6">
           </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
