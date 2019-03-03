<?php
namespace App\Models;

use App\Http\Filters\QueryFilter;
use App\Http\Filters\UserFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Payment
 * @property int $id
 * @property array $data
 * @property array $geo_location
 * @property string $date_of_birth
 * @property string $gender
 * @property array $hobby
 * @method  Builder filter(UserFilter $filter)
 */
class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'array',
        'geo_location' => 'array',
    ];

    /**
     * Get Date of Birth
     *
     * @return string|null
     */
    public function getDateOfBirthAttribute(): ?string
    {
        return $this->data['date_of_birth'] ?? null;
    }

   /**
     * Get gender
     *
     * @return string|null
     */
    public function getGenderAttribute(): ?string
    {
        return $this->data['gender'] ?? null;
    }

   /**
     * Get hobbies
    *
     * @return array|null
     */
    public function getHobbyAttribute(): ?array
    {
        return $this->data['hobby'] ?? null;
    }

   /**
     * Get Geo Location Lat
    *
     * @return array|null
     */
    public function getGeoLocationLatAttribute(): ?array
    {
        return $this->geo_location['lat'] ?? null;
    }

   /**
     * Get Geo Location Lng
    *
     * @return array|null
     */
    public function getGeoLocationLngAttribute(): ?array
    {
        return $this->geo_location['lng'] ?? null;
    }

    /**
     * @param Builder $builder
     * @param QueryFilter $filter
     */
    public function scopeFilter(Builder $builder, QueryFilter $filter)
    {
        $filter->apply($builder);
    }
}
