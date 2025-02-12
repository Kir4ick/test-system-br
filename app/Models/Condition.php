<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Condition
 * 
 * @property int $id
 * @property string $name
 * @property string $condition
 * @property string|null $value
 * @property int $rule_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Rule $rule
 *
 * @package App\Models
 */
class Condition extends Model
{
	protected $table = 'conditions';

	protected $casts = [
		'rule_id' => 'int'
	];

	protected $fillable = [
		'name',
		'condition',
		'value',
		'rule_id'
	];

	public function rule()
	{
		return $this->belongsTo(Rule::class);
	}
}
