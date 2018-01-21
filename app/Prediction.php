<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    protected $table = 'predictions';

    public function histories(){
        return $this->hasMany('App\History', 'prediction_id');
    }

    public function cards(){
        return $this->hasMany('App\Card', 'prediction_id');
    }
}
