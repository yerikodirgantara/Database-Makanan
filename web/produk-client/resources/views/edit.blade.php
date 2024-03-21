<h1 class="h1 m-2">Edit Produk</h1>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-5">
    <h1>Data Produk</h1>
    <table class="table table-striped">
        <thead class="table-dark">

    <div class="container mt-4">
        @if(isset($produk))
        <form action="{{ route('update.produk', ['id' => $produk['id_produk']]) }}" method="post">
            @csrf
            @method('PUT')

            <div class="col-6">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" name="nama" value="{{ $produk['nama'] }}" required><br>
            </div>

            <div class="col-6">
                <label for="harga" class="form-label">Harga:</label>
                <input type="text" class="form-control" name="harga" value="{{ $produk['harga'] }}" required><br>
            </div>

            <div class="col-6">
                <label for="stok" class="form-label">Stok:</label>
                <input type="text" class="form-control" name="stok" value="{{ $produk['stok'] }}" required><br>
            </div>

            <div class="col-6">
                <label for="expired" class="form-label">Expired:</label>
                <textarea name="expired" class="form-control" required>{{ $produk['expired'] }}</textarea><br>
            </div>

            <button class="btn btn-warning btn-sm mt-2" type="submit">Update</button>
    </div>
    </form>
    @else
    <p>Data not found.</p>
    @endif