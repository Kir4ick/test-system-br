<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Hotel
 *
 * @property int $id
 * @property string $name
 * @property int $stars
 * @property int $city_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property City $city
 * @property Collection|Agency[] $agencies
 * @property Collection|HotelAgreement[] $hotelAgreements
 *
 * @package App\Models
 */
class Hotel extends Model
{
	protected $table = 'hotels';

	protected $casts = [
		'stars' => 'int',
		'city_id' => 'int'
	];

	protected $fillable = [
		'name',
		'stars',
		'city_id'
	];

	public function city()
	{
		return $this->belongsTo(City::class);
	}

	public function agencies()
	{
		return $this->belongsToMany(Agency::class, 'agency_hotel_options')
					->withPivot('id', 'percent', 'is_black', 'is_recomend', 'is_white')
					->withTimestamps();
	}

	public function hotelAgreements()
	{
		return $this->hasMany(HotelAgreement::class);
	}
}
