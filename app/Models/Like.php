<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function kpid(){
        return $this->belongsTo(kaizenProposal::class);
    }

    use HasFactory;
    protected $fillable = [
        'user_id',
        'kp_id',
    ];
}
