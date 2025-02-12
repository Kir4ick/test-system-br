<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HotelAgreement
 * 
 * @property int $id
 * @property int $hotel_id
 * @property int $discount_percent
 * @property int $comission_percent
 * @property bool $is_default
 * @property int $vat_percent
 * @property int $vat1_percent
 * @property int $vat1_value
 * @property int $company_id
 * @property Carbon|null $date_from
 * @property Carbon|null $date_to
 * @property bool $is_cash_payment
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Company $company
 * @property Hotel $hotel
 *
 * @package App\Models
 */
class HotelAgreement extends Model
{
	protected $table = 'hotel_agreements';

	protected $casts = [
		'hotel_id' => 'int',
		'discount_percent' => 'int',
		'comission_percent' => 'int',
		'is_default' => 'bool',
		'vat_percent' => 'int',
		'vat1_percent' => 'int',
		'vat1_value' => 'int',
		'company_id' => 'int',
		'date_from' => 'datetime',
		'date_to' => 'datetime',
		'is_cash_payment' => 'bool'
	];

	protected $fillable = [
		'hotel_id',
		'discount_percent',
		'comission_percent',
		'is_default',
		'vat_percent',
		'vat1_percent',
		'vat1_value',
		'company_id',
		'date_from',
		'date_to',
		'is_cash_payment'
	];

	public function company()
	{
		return $this->belongsTo(Company::class);
	}

	public function hotel()
	{
		return $this->belongsTo(Hotel::class);
	}
}
