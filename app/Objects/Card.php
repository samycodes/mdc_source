<?php

namespace App\Objects;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = 'card';
    
    public function cardtypefunction()
    {
       
        return $this->belongsTo('App\Objects\CardType','card_type','id'); 
    }
    
    public function documenttypefunction(){
         return $this->belongsTo('App\Objects\DocumentType','document_type','id'); 
    }
}
