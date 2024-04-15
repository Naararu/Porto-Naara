<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class riwayat extends Model
{
    use HasFactory;
    protected $table = "riwayat";
    protected $fillable = ['title','type','tgl_mulai','tgl_akhir','information1','information2','information3','content'];

    protected $appends= ['tgl_mulai_new', 'tgl_akhir_new'];
    
    public function getTglMulaiNewAttribute ()
    {
        return Carbon::parse($this->attributes['tgl_mulai'])->translatedformat('d F Y');
    }

    public function getTglAkhirNewAttribute ()
    {
        if ($this->attributes['tgl_akhir']) {
            return Carbon::parse($this->attributes['tgl_akhir'])
            ->translatedformat('d F Y');
        }else {
            return 'Present';
        }
        
    }
}
