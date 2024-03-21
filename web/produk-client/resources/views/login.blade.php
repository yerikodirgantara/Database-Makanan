<h1>Silahkan Login</h1>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-5">
    <h1>Data Produk</h1>
    <table class="table table-striped">
        <thead class="table-dark">
<form action="{{ url('login') }}" method="post" accept-charset="utf-8">
@csrf
Email: <input type="text" name="email" value="" size="20" /><br/>
Password: <input type="password" name="password" value="" size="20" /><br/>
<input type="submit" name="btn_simpan" value="Login" />
</form>