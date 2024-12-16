<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>Book Exchange</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link href="{{ asset('chartV2.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="mb-4 bg-white navbar navbar-expand-lg navbar-white">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                bookexchange.com
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                      </form>
                    <li class="nav-item">
                        <a class="nav-link" href="">Category</a>
                    </li>
                    <li class="nav-item-icon">
                        <a href="" class="text-black"><i class="fa-solid fa-cart-shopping fa-lg"></i></a>
                    </li>
                    <li class="nav-item-icon ms-auto">
                        <a href="" class="text-black" style="text-decoration: none;">
                            <i class="fa-regular fa-user fa-xl"></i> Hi, User
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


  <div class="content container mt-4">
    <div class="row">
      <div class="col-lg-8">
        <div class="card">
          <div class="card-header">
            Chart
          </div>
          <div class="card-body">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="selectAll" onclick="toggleAllCheckboxes()"/>
              <label class="form-check-label" for="selectAll">Pilih Semua</label>
            </div>
            <hr/>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="item1"/>
              <label class="form-check-label" for="item1"><strong>Gramedia Gajah Mada</strong></label>
            </div>
            <div class="d-flex align-items-center mt-3">
              <input class="form-check-input me-3" type="checkbox" id="item2"/>
              <img src="https://storage.googleapis.com/a1aa/image/mGNbyQwQg2KoKV72lfigfMw9lUagEjkGxAX4juaTB7wmeT0nA.jpg" alt="Book cover" width="80" height="120" class="me-3"/>
              <div>
                <p class="mb-0">Hidup Ini Singkat, Jangan Dibuat Berat</p>
                <!-- Price moved slightly up using class price -->
                <p class="mb-0 price">Rp69.900</p>
              </div>
              <div class="ms-auto d-flex align-items-center">
                <!-- Trash button moved to the left of the input-group -->
                <button class="btn btn-light me-2"><i class="fas fa-trash"></i></button>
                <div class="input-group">
                  <button class="btn btn-light" type="button">-</button>
                  <input class="form-control text-center" style="width: 50px;" type="text" value="1"/>
                  <button class="btn btn-light" type="button">+</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="order-summary">
          <h5>Order Summary</h5>
          <div class="d-flex justify-content-between">
            <p>Total</p>
            <p><strong>Rp69.900</strong></p>
          </div>
          <button class="btn btn-dark w-100">Check Out</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Custom JavaScript to handle checkbox toggle -->
  <script>
    function toggleAllCheckboxes() {
      var selectAllCheckbox = document.getElementById("selectAll");
      var checkboxes = document.querySelectorAll(".form-check-input");

      checkboxes.forEach(function(checkbox) {
        if (checkbox !== selectAllCheckbox) {
          checkbox.checked = selectAllCheckbox.checked;
        }
      });
    }
  </script>

</body>
</html>
