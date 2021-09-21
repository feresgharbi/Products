<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'name', 'description', 'price', 'available'];
    
    const PRICES = [
        'Less than 50',
        'From 50 to 70',
        'More than 70',
    ];
    const Availables = [
        'not available',
        'available',   
    ];
   

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function scopeWithFilters($query, $categories, $prices, $availables)
    {
      
        return $query->when(count($categories), function ($query) use ($categories) {
                $query->whereIn('category_id', $categories); 
                   
            })
            ->when(count($availables), function ($query) use ($availables){
                $query->where(function ($query) use ($availables) {
                    $query->when(in_array(0, $availables), function ($query) {
                            $query->orWhere('available', '=', '0');
                        })
                        ->when(in_array(1, $availables), function ($query) {
                            $query->orWhere('available', '=', '1');
                        }) ;
                        
                });
            })
            ->when(count($prices), function ($query) use ($prices){
                $query->where(function ($query) use ($prices) {
                    $query->when(in_array(0, $prices), function ($query) {
                            $query->orWhere('price', '<', '50');
                        })
                        ->when(in_array(1, $prices), function ($query) {
                            $query->orWhereBetween('price', ['50', '70']);
                        })
                        ->when(in_array(2, $prices), function ($query) {
                            $query->orWhere('price', '>', '70');
                        });
                });
            });
           
            
            

    }       
    
}