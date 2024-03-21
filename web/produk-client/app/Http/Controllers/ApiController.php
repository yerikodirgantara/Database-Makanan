<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;

class ApiController extends Controller
{
    // halaman login
    public function index()
    {
        return view('login');
    }
    // halaman dashboard
    public function home()
    {
        return view('home');
    }
    // request API Login
    
    public function tambahProdukForm()
    {
        // Logika untuk menampilkan formulir tambah produk
        return view('add');
    }

    public function apiLogin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $response = Http::post('http://localhost:8002/api/login', [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);
        $data = json_decode($response->body(), true);
        $this->setCookie($data['access_token']);
        return redirect('/home');
    }
    // request API Logout
    public function apiLogout()
    {
        $tkn = $this->getCookie();
        Http::withToken($tkn)->post('http://localhost:8002/api/logout');
        Cookie::forget('token');

        return redirect('/');
    }
    // request API getProduk
    public function apigetProduk()
    {
        $tkn = $this->getCookie();
        $response = Http::withToken($tkn)->get('http://localhost:8002/api/produk');
        $data['query'] = json_decode($response->body(), true);
        return view('list', $data);
    }
    // Set Cookies
    public function setCookie($token)
    {
        Cookie::queue(Cookie::make('token', $token, 60));
    }
    // Get Cookie
    public function getCookie()
    {
        return Cookie::get('token');
    }

    public function tambahProduk(Request $request)
    {
        $tkn = $this->getCookie();

        $response = Http::withToken($tkn)->post('http://localhost:8002/api/produk', $request->all());

        // Tambahkan logika untuk menangani respon atau redirect sesuai kebutuhan
        if ($response->successful()) {
            // Jika request sukses, set pesan success di session
            session()->flash('success', 'Data berhasil ditambahkan.');
        } else {
            // Jika request gagal, set pesan error di session
            session()->flash('error', 'Gagal menambahkan data. Silakan coba lagi.');
        }

        return redirect('/getProduk'); //->back();
    }

    public function editProdukForm($id)
    {
        $tkn = $this->getCookie();
        $response = Http::withToken($tkn)->get("http://localhost:8002/api/produk/{$id}");
        $data['produk'] = json_decode($response->body(), true);

        return view('edit', $data);
    }

    public function updateProduk(Request $request, $id)
    {
        $tkn = $this->getCookie();

        $data = [
            'nama' => $request->input('nama'),
            'harga' => $request->input('harga'),
            'stok' => $request->input('stok'),
            'expired' => $request->input('expired'),
        ];

        $response = Http::withToken($tkn)->put("http://localhost:8002/api/produk/{$id}", $data);

        if ($response->successful()) {
            session()->flash('success', 'Data berhasil diperbarui.');
        } else {
            session()->flash('error', 'Gagal memperbarui data. Silakan coba lagi.');
        }

        return redirect('/getProduk'); //->back();
    }

    public function deleteProduk($id)
    {
        $tkn = $this->getCookie();

        $response = Http::withToken($tkn)->delete("http://localhost:8002/api/produk/{$id}");

        if ($response->successful()) {
            session()->flash('success', 'Data berhasil dihapus.');
        } else {
            session()->flash('error', 'Gagal menghapus data. Silakan coba lagi.');
        }

        return redirect()->back();
    }

    public function getProdukById($id)
    {
        $tkn = $this->getCookie();
        $response = Http::withToken($tkn)->get("http://localhost:8002/api/produk/{$id}");
        $data['produk'] = json_decode($response->body(), true);

        return view('view', $data);
    }
}