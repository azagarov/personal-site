<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 23/11/2017
 * Time: 11:47
 */

namespace App;


class Contacts {

	public function GetEmail() {
		return $this->email;
	}

	public function GetPhoneNumber() {
		return $this->phone;
	}

	public function GetSkype() {
		return $this->skype;
	}

	private function __construct() {
	}


	private $email = "azagarov@gmail.com";
	private $phone = "+7 (913) 632 3553";
	private $skype = "aleksey_zagarov";


	/**
	 * @return Contacts
	 */
	public static function GetInstance() {
		if(!(self::$instance instanceof self)) {
			self::$instance = new self();
		}
		return self::$instance;
	}


	/**
	 * @var Contacts
	 */
	private static $instance;
}