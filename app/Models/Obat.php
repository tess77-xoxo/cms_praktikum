<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obat'; // opsional jika nama tabel sesuai

    protected $fillable = [
        'nama_obat', 'jenis', 'stok', 'harga', 'expired_date',
    ];

    public static function getAll()
    {
        return Obat::all();
    }

    public static function find($id)
    {
        return Obat::where('id', $id)->first();
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'obat_id');
    }
}
