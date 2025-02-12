<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AgencyHotelOption
 * 
 * @property int $id
 * @property int $hotel_id
 * @property int $agency_id
 * @property int $percent
 * @property bool $is_black
 * @property bool $is_recomend
 * @property bool $is_white
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Agency $agency
 * @property Hotel $hotel
 *
 * @package App\Models
 */
class AgencyHotelOption extends Model
{
	protected $table = 'agency_hotel_options';

	protected $casts = [
		'hotel_id' => 'int',
		'agency_id' => 'int',
		'percent' => 'int',
		'is_black' => 'bool',
		'is_recomend' => 'bool',
		'is_white' => 'bool'
	];

	protected $fillable = [
		'hotel_id',
		'agency_id',
		'percent',
		'is_black',
		'is_recomend',
		'is_white'
	];

	public function agency()
	{
		return $this->belongsTo(Agency::class);
	}

	public function hotel()
	{
		return $this->belongsTo(Hotel::class);
	}
}
