<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricePaid extends Model
{
    use HasFactory;

    public  function  getPropertyTypeAttribute($type){
        $text = '';
       $type = strtolower($type);
       if($type == 'd'){
             $text = 'Detached';
       }elseif($type == 's'){
             $text = 'Semi-Detached';
       }elseif($type == 't'){
             $text = 'Terraced';
       }elseif($type == 'f'){
            $text = 'Flats/Maisonettes';
        }elseif($type == ''){
             $text = 'Other';
        }else{
            $text = '';
        }
       return $text;
    }

}
