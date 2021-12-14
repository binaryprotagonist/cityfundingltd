<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $appends = ['invoice_id'];

    protected $fillable = ['invoice_id'];

    public function  getInvoiceIdAttribute($invoiceId){
          return $invoiceId;
    }

    public function setInvoiceIdAttribute(){
          $count = \DB::table('subscriptions')->whereDate('created_at',date('Y-m-d'))->count();
          $this->attributes['invoice_id'] = 'SUB' . date('Ymd') .  str_pad(++$count, 4, '0', STR_PAD_LEFT);
    }
}
