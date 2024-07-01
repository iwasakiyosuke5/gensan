<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kaizenProposal extends Model
{
    use HasFactory;
    protected $primaryKey = 'idKP';
    public $incrementing = true;
    protected $keyType = 'int'; 
    // 上記３つは編集時に必要になった。

    // protected $table = 'kaizen_proposals';
    // 上記はテーブル名がkaizenProposalsだった時の名残。どうもMySQLはkaizenProposalsでもOKだが、
    // Laravelは勝手にkaizenProposals→kaizen-proposalsとしてmigrationファイルを作成してしまうため
    protected $fillable = [

        'title', 
        'currentSituation', 
        'proposal',
        'benefit',
        'budget',
        'user_id',
        'name',
        'position',
        'department',
        'team',
        'approvalStage',
        'bossComment',
        'goodCounts',
    ];
}
