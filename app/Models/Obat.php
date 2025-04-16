<?php

namespace App\Models;

class Obat
{
    // Data dummy (hardcoded)
    protected static function getDummyData()
    {
        return [
            ['id' => 1, 'nama' => 'Paracetamol', 'jenis' => 'Tablet', 'stok' => 100, 'harga' => 5000],
            ['id' => 2, 'nama' => 'Amoxicillin', 'jenis' => 'Kapsul', 'stok' => 75, 'harga' => 8000],
            ['id' => 3, 'nama' => 'Antasida', 'jenis' => 'Cair', 'stok' => 50, 'harga' => 10000],
        ];
    }

    public static function all()
    {
        return self::getDummyData();
    }

    public static function find($id)
    {
        foreach (self::getDummyData() as $obat) {
            if ($obat['id'] == $id) {
                return $obat;
            }
        }
        return null;
    }
}
