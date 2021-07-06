<?php

namespace SmartyStudio\TestimonialCrud\app\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use CrudTrait;
	use Sluggable;
	use SluggableScopeHelpers;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'testimonials';
    protected $primaryKey = 'id';
    public $timestamps = true;

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = [
		'title', 
		'content',
		'client_name', 
		'client_url', 
		'image', 
		'status',
	];

	/**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'slug_or_name',
            ],
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

	public static function getTestimonials()
    {
        return static::where('status', 'PUBLISHED')->get();
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
	

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    public function scopePublished($query)
    {
        return $query->where('status', 'PUBLISHED')
			->where('date', '<=', date('Y-m-d'))
			->orderBy('date', 'DESC');
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

	// The slug is created automatically from the "name" field if no slug exists.
    public function getSlugOrNameAttribute()
    {
        if ($this->slug != '') {
            return $this->slug;
        }

        return $this->name;
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
