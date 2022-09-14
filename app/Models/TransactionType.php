<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionType extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Relationship with transaction transfer history.
     *
     * @return relationship
     */
    public function transactionTransferHistory()
    {
        return $this->hasOne(TransactionTransferHistory::class, 'Transaction_id', 'id');
    }
}
