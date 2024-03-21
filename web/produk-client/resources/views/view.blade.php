<h1 class="h1 m-5">View Produk</h1>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-5">
    <h1>Data Produk</h1>
    <table class="table table-striped">
        <thead class="table-dark">
    @if(isset($produk))
    <ul class="list-group col-3 mt-4 m-5">
        <li class="list-group-item">Id Produk: {{ $produk['id_produk'] }}</li>
        <li class="list-group-item">nama: {{ $produk['nama'] }}</li>
        <li class="list-group-item">harga: {{ $produk['harga'] }}</li>
        <li class="list-group-item">stok: {{ $produk['stok'] }}</li>
        <li class="list-group-item">expired: {{ $produk['expired'] }}</li>
    </ul>
    @else
    <p>Data not found.</p>
    @endif