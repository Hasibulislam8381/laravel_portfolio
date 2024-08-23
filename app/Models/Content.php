<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Content extends Model
{
    
    use HasFactory, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    public function area()
    {

        return $this->belongsTo(Area::class);
    }
    public function subArea()
    {

        return $this->belongsTo(SubArea::class);
    }

    public function requirement()
    {
        return $this->belongsTo(RequirementType::class, 'requirement_types_id');
    }

}

