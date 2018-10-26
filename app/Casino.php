<?php
declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Casino extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'casinos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'latitude', 'longitude', 'opening_times'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];



    /**
     * The distance between 2 points
     * @param float $locationLat
     * @param float $locationLon
     * @return float
     */
    public function distance(float $locationLat, float $locationLon)
    {
        $theta = $this->longitude - $locationLon;
        $dist = sin(deg2rad($this->latitude)) * sin(deg2rad($locationLat)) +  cos(deg2rad($this->latitude)) * cos(deg2rad($locationLat)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);

        return $dist;
    }
}
