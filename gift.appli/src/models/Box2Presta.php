<?php

namespace gift\app\models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Box2Presta extends Pivot
{
    protected $table = 'box2presta';
    protected $fillable = ['box_id', 'presta_id', 'quantite'];
    public $timestamps = false;

    public function box()
    {
        return $this->belongsTo(Box::class, 'box_id');
    }

    public function prestation()
    {
        return $this->belongsTo(Prestation::class, 'presta_id');
    }
}
