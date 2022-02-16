<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Uuids;

class Manufacture extends Model
{
    use SoftDeletes;
    use Uuids;

    protected $table = 'manufactures';
    protected $dates = ['deleted_at'];
    protected $fillable = ['name','slug'];
    public $incrementing = false;

    public function car()
    {
        return $this->hasMany('App\Car', 'id');
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function ($manufacture) {
            if ($manufacture->car->count() > 0) {
                Alert::error('Tidak bisa', 'Data merek ada di data mobil');
                return false;
            }
        });
    }

}
