<?php

namespace gift\app\models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Prestation extends \Illuminate\Database\Eloquent\Model {

    protected $table = 'prestation';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing =  false;
    public $keyType = 'string';

    public function categorie(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(Categorie::class, 'cat_id');
    }

    public function box(): BelongsToMany{
        return $this->belongsToMany(Box::class, 'box2presta', 'id', 'id')->withPivot('box_id', 'presta_id');
    }
    



}