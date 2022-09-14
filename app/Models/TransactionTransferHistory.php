<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionTransferHistory extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['sender', 'receiver', 'transaction'];

    /**
     * Relationship with user.
     *
     * @return relationship
     */
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }

    /**
     * Relationship with user.
     *
     * @return relationship
     */
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id', 'id');
    }

    /**
     * Relationship with transaction.
     *
     * @return relationship
     */
    public function transaction()
    {
        return $this->belongsTo(User::class, 'transaction_id', 'id');
    }
}
