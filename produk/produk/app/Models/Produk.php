<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Produk extends Model
{
 protected $table = 'produk';
 protected $primaryKey = 'id_produk';
 public $timestamps = false;
 /**
 * The attributes that are mass assignable.
 *
 * @var array
 */
 protected $fillable = [
 'nama','harga','stok','expired'
 ];
 /**
 * The attributes excluded from the model's JSON form.
 *
 * @var array
 */
 protected $hidden = [];
}