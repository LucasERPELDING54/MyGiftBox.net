<?php

namespace gift\app\models;

class Connexion extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'connexion';
    protected $primaryKey = 'id';

    protected $fillable = ['identifiant', 'password'];
    public $timestamps = false;

}