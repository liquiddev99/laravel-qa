<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
	protected $fillable = ['body', 'user_id'];
	public function question() {
		return $this->belongsTo(Question::class);
	}
	
	public function user() {
		return $this->belongsTo(User::class);
	}
	
	//    public function getBodyHtmlAttribute() {
	//    	return \Parsedown::instace()->text($this->body);
	//    }
	
	public static function boot()
	{
		parent::boot(); // TODO: Change the autogenerated stub
		
		static::created(function($answer) {
			$answer->question->increment('answers_count');
		});
		
		static::deleted(function($answer) {
			$answer->question->decrement('answers_count');
		});
	}
	
	public function getCreatedDateAttribute() {
		return $this->created_at->diffForHumans();
	}
}
