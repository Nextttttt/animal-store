<?php

namespace App\Models;

use App\Models\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use UsesUuid;
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'breed_id',
        'bithdate',
        'image',
        'animalspecies_id',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'breed_id' => 'string',
        'bithdate' => 'date',
        'animalspecies_id' => 'string',
    ];

    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }

    public function animalspecies()
    {
        return $this->belongsTo(Animalspecies::class);
    }
}
