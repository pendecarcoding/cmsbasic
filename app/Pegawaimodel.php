<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Pegawaimodel extends Model
{
  protected $table = 'tbl_pegawai';
  public $timestamps = true;
  protected $fillable = [
    'nip',
    'nama',
    'email',
    'gd',
    'gb',
    'nohp',
    'image',
    'status',
];
  
}
