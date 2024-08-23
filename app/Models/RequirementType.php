<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Property;

class RequirementType extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    public function properties()
    {

        return $this->hasMany(Property::class);
    }
    public function content()
    {

        return $this->hasMany(Content::class);
    }
    public function PropertyStore()
    {

        return $this->hasMany(PropertyStore::class);
    }
}
