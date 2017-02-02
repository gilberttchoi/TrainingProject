<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
 	protected $fillable = ['title','deadline','detail'];	  

 	public function labels()
 	{
 		return $this->hasMany(Label::class);
 	}

 	public function user()
 	{
 		return $this->belongsTo(User::class);
 	}
 }
