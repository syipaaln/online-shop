<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Products - Darma</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar bg-white">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo.png') }}" alt="TB Darma" width="150" height="24">
            </a>
            <div class="d-flex">
                @guest
                    @if (Route::has('register'))
                        <a class="btn btn-outline-primary me-2" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                    
                    @if (Route::has('login'))
                        <a class="btn btn-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @endif
                @else
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="bi bi-person fs-5"></i>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                @endguest
            </div>
        </div>
    </nav>
    <div class="container mt-3">
        <div class="card border-0 shadow-sm rounded text-center bg-white py-5 mb-2">
            <div class="card-body">
                ini banner
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-5 mb-3">
            <h5 class="fw-bold">PRODUK</h5>
            <form class="search-form w-25" action="{{ route('search') }}" method="GET">
                <input class="form-control bg-white border-0 shadow-sm" type="search" name="query" placeholder="Cari Produk" aria-label="Search">
            </form>
        </div>
        <div class="row mt-3">
            @forelse ($products as $product)
                <div class="col-md-4 col-lg-3 col-xl-2 mb-4">
                    <div class="card product-card bg-white h-100 border-0 shadow-sm">
                        <img src="{{ asset('/storage/products/'.$product->image) }}" class="card-img-top" alt="Product Image">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fs-6 mb-4">{{ $product->title }}</h5>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="card-text fw-bold mb-0">{{ "Rp " . number_format($product->price,2,',','.') }}</p>
                                    <a href="{{ route('login') }}" class="btn btn-primary btn-sm d-flex align-items-center">
                                        <i class="bi bi-cart-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-danger">
                    Data Products belum Tersedia.
                </div>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //message with sweetalert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif

    </script>

</body>
</html>