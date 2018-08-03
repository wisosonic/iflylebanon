<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Mail as LaravelMail;

class Mail extends Model {

	protected $mailTo;
	protected $mailFrom;
	protected $nameFrom;
	protected $mailSubject;

	public static function send($mailView, $mailTo, $mailFrom, $nameFrom, $mailSubject)
	{
		LaravelMail::send($mailView, array("email"=>$mailTo), function ($message) use ($mailTo, $mailFrom, $nameFrom, $mailSubject) {
			$message->from($mailFrom, $nameFrom);
		    $message->subject($mailSubject);
		    $message->to($mailTo);
		});
	}
	
	public static function sendWithValues($mailView, $array, $mailTo, $mailFrom, $nameFrom, $mailSubject)
	{
		LaravelMail::send($mailView, $array, function ($message) use ($array, $mailTo, $mailFrom, $nameFrom, $mailSubject) {
			$message->from($mailFrom, $nameFrom);
		    $message->subject($mailSubject);
		    $message->to($mailTo);
		});
		return "sent";
	}
	public static function sendWithValuesWithPDF($mailView, $array, $mailTo, $mailFrom, $nameFrom, $mailSubject, $fullpath, $filename)
	{
		LaravelMail::send($mailView, $array, function ($message) use ($array, $mailTo, $mailFrom, $nameFrom, $mailSubject, $fullpath, $filename) {
			$message->from($mailFrom, $nameFrom);
		    $message->subject($mailSubject);
		    $message->to($mailTo);
		    $message->attach($fullpath, [
                        'as' => $filename,
                        'mime' => 'application/pdf',
                    ]);
		});
		return "sent";
	}



}
