<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'company_id',
        'email',
        'phone'
    ];

    public function company(){

        return $this->belongsTo('App\Models\Companies', 'company_id', 'id');
    }

    public function hasCompany():bool{
        if($this->company_id !== null){
            return true;
        }else{
            return false;
        }
    }
}
