<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * prodct model
 */
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
    
class Product extends Model
{
     protected $table = 'products';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'price' , 'upc', 'status', 'prodimg'
    ];
    
    public $timestamps = false;
}
