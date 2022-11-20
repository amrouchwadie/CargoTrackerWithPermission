<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Shipping extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $incrementing = false;
    public $keyType = 'string';

    protected $primaryKey = 'txn_id';

    protected $table = 'transactions';

    public function origins () {
        return $this->belongsTo(Location::class, 'txn_id');
    }
}
