<?php

namespace App\Models;

use App\Models\Area;
use App\Models\SubArea;
use App\Models\RequirementType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
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

    public function porpertystore()
    {
        return $this->hasMany(PropertyStore::class);
    }
}
