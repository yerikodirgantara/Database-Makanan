<html>
    <head>
<title>Tambah data Produk</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-5">
    <h1>Data Produk</h1>
    <table class="table table-striped">
        <thead class="table-dark">
<p><a href="{{ url('home') }}">Home</a></p>
</head>
<body>
<h1>Tambah Produk</h1>

    <form method="POST" action="{{ url('createProduk') }}">
        @csrf
        <label for="nama">nama</label>
        <input type="text" name="nama" id="nama" placeholder="Masukkan Nama">
        <label for="harga">Harga:</label>
        <input type="text" name="harga" id="harga" placeholder="Masukkan Harga">
        <label for="stok">Stok:</label>
        <input type="text" name="stok" id="stok" placeholder="Masukkan Stok">
        <label for="expired">Expired:</label>
        <input type="text" name="expired" id="expired" placeholder="Masukkan Expired">
        <!-- Tambahkan input untuk informasi lainnya sesuai kebutuhan -->
        <br><br>
        <button type="submit">Tambah Produk</button>
    </form>
</body>
</html>