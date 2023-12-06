<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  use HasFactory;

  protected $fillable = ['korisnik_id', 'ukupna_cijena', 'status'];

  // Dodatna logika, relacije ili metode mogu biti dodane ovdje
}
