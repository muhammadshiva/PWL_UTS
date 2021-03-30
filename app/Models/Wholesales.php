<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; // Model Eloquent

class Wholesales extends Model
{
    // Eloquent akan membuat model wholesales dan menyimpan record di tabel wholesales
    protected $table = "wholesales"; 
    public $timestamps = false; 
    // Memanggil isi DB dengan primary key
    protected $primaryKey = 'id';
    
     /**
     * The attributes that are mass assignable. *
     * @var array
     */

    protected $fillable = [
        'brand',
        'model',
        'category',
        'transmission',
        'price',
        'qty',
    ];

}
