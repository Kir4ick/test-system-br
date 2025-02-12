<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 * 
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|HotelAgreement[] $hotel_agreements
 *
 * @package App\Models
 */
class Company extends Model
{
	protected $table = 'companies';

	protected $fillable = [
		'name'
	];

	public function hotel_agreements()
	{
		return $this->hasMany(HotelAgreement::class);
	}
}
