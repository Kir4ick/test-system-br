<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Rule
 * 
 * @property int $id
 * @property string $name
 * @property string $message
 * @property bool $is_active
 * @property int $agency_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Agency $agency
 * @property Collection|Condition[] $conditions
 *
 * @package App\Models
 */
class Rule extends Model
{
	protected $table = 'rules';

	protected $casts = [
		'is_active' => 'bool',
		'agency_id' => 'int'
	];

	protected $fillable = [
		'name',
		'message',
		'is_active',
		'agency_id'
	];

	public function agency()
	{
		return $this->belongsTo(Agency::class);
	}

	public function conditions()
	{
		return $this->hasMany(Condition::class);
	}
}
