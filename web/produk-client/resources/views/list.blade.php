<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-5">
    <h1>Data Produk</h1>
    <table class="table table-striped">
        <thead class="table-dark">
<p><a href="{{ url('home') }}">Home</a> | <a href="{{ route('tambahProdukForm') }}">Tambah Data Produk</a></p>

<!-- Tabel Daftar Produk -->
<table border="1">
    <tr>
        <th>Id Produk</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Expired</th>
    </tr>
    @foreach($query as $row)
        <tr>
            <td>{{ $row['id_produk'] }}</td>
            <td>{{ $row['nama'] }}</td>
            <td>{{ $row['harga'] }}</td>
            <td>{{ $row['stok'] }}</td>
            <td>{{ $row['expired'] }}</td>
            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('view.produk', ['id' => $row['id_produk']]) }}">View</a>
                <a class="btn btn-warning btn-sm" href="{{ route('edit.produk.form', ['id' => $row['id_produk']]) }}">Edit</a>
                <form action="{{ route('delete.produk', ['id' => $row['id_produk']]) }}" method="post" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>