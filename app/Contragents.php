<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contragents extends Model
{
	use SoftDeletes;

	protected $fillable = [
		'id',
		'created_at',
		'updated_at',
		'comment',
		'name',
		'name_full',
		'user_id'
	];

	protected $dates = [
		'deleted_at'
	];
}
