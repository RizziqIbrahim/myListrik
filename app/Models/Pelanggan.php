<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pelanggan extends Model
{
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tarif(){
        return $this->belongsTo(Tarif::class, "id_tarif");
    }

    public function penggunaans()
    {
    	return $this->hasMany(Penggunaan::class);
    }
    protected $fillable = [
        'user_id',
        'alamat',
        'nomor_kwh',
        'id_tarif',
    ];
}
