<?php

class Url extends Eloquent {
	protected $guarded = [];
	public static $rules = array('url' => 'required|url');

	public static function validate($input)
	{
		$v = Validator::make( $input, self::$rules );
		return $v->fails() ? $v : true;
	}

	public static function get_unique_short_url()
	{
		$shortened = base_convert(rand(10000, 99999), 10, 36);
		if(Url::whereShortened($shortened)->first()) get_short_url();
		return $shortened;
	}
}