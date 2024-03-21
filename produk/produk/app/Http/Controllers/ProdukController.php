<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Produk;
class ProdukController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth:api');
   }
 public function showAll()
 {
    return response()->json(Produk::all());
 }
    public function showOne($id)
 {
    return response()->json(Produk::find($id));
 }
    public function create(Request $request)
 {
    $Produk = Produk::create($request->all());
    return response()->json($Produk, 201);
 }
 public function update($id, Request $request)
 {
    $Produk = Produk::findOrFail($id);
    $Produk->update($request->all());
    return response()->json($Produk, 200);
 }
 public function delete($id)
 {
    Produk::findOrFail($id)->delete();
    return response('Deleted Successfully', 200);
 }
}