<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Image Hover</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: rgb(255, 246, 161);
      background-size: cover;
      display: flex;
      flex-direction: column;
      background-position: center;
    }

    #contact img {
      width: 340px;
      height: 200px;
      border-radius: 20px;
      margin-top: 32%;
      transition: all 0.5s ease;
    }

    /* ✅ Hover effect only (no color change) */
    #contact img:hover {
      transform: scale(1.08); /* smooth zoom */
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4); /* shadow */
    }
  </style>
</head>
<body>
  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-12">
          <center>
            <a href="https://aucs.free.nf/login%20page.php">
            <img src="stt.jpeg" class="img-fluid">
             </a>
          </center>
        </div>

        <div class="col-lg-6 col-md-6 col-12">
          <center>
            <a href="https://aucs.free.nf/admin.php">
            <img src="ad.jpeg" class="img-fluid">
            </a>
          </center>
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
