<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Agency
 * 
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Hotel[] $hotels
 * @property Collection|Rule[] $rules
 *
 * @package App\Models
 */
class Agency extends Model
{
	protected $table = 'agencies';

	protected $fillable = [
		'name'
	];

	public function hotels()
	{
		return $this->belongsToMany(Hotel::class, 'agency_hotel_options')
					->withPivot('id', 'percent', 'is_black', 'is_recomend', 'is_white')
					->withTimestamps();
	}

	public function rules()
	{
		return $this->hasMany(Rule::class);
	}
}
