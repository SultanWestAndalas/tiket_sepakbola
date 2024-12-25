<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Tiket</title>
    <!-- Tambahkan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card:hover {
            transform: scale(1.03);
            transition: 0.3s ease-in-out;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center text-primary mb-5">Daftar Tiket</h1>
        <div class="row g-4">
            @foreach ($tikets as $tiket)
                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title text-center text-dark fw-bold">{{ $tiket->nama_event }}</h5>
                            <ul class="list-group list-group-flush mb-3">
                                <li class="list-group-item"><strong>Tanggal:</strong> {{ $tiket->tanggal_event }}</li>
                                <li class="list-group-item"><strong>Lokasi:</strong> {{ $tiket->lokasi }}</li>
                                <li class="list-group-item"><strong>Harga:</strong> Rp{{ number_format($tiket->harga, 0, ',', '.') }}</li>
                                <li class="list-group-item"><strong>Stok:</strong> {{ $tiket->stok }}</li>
                            </ul>
                            <form action="{{ route('tikets.pesan', $tiket) }}" method="POST" class="d-flex">
                                @csrf
                                <input type="number" name="jumlah" class="form-control me-2" placeholder="Jumlah Tiket" min="1" max="{{ $tiket->stok }}" required>
                                <button type="submit" class="btn btn-primary">Pesan</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Tambahkan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
