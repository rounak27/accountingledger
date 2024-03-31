<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['trn_id', 'trn_date', 'particular', 'debit', 'credit', 'trn_balance', 'uid'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'uid', 'cid');
    }
}
