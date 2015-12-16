<?php
namespace Models;

require_once '../vendor/PasswordCompat/password.php';

class UserProfile extends \RedBean_SimpleModel {
	const TABLENAME = 'user_profile';
	const DATE_FORMAT = 'Y-m-d H:i:s'; // SQL formatted date

	public function __construct() {
		if (isset($_SESSION['user_profile'])) {
			$this->bean = $_SESSION['user_profile'];
		} else {
			$this->bean = \R::dispense(self::TABLENAME);
		}
	}

	public function userprofile() {

		$allPostVars = $app->request->post();

		$profile = R::dispense('user_profile');
		$profile->title = $allPostVars['title'];
		$profile->firstname = $allPostVars['firstname'];
		$profile->middlename = $allPostVars['middlename'];
		$profile->lastname = $allPostVars['lastname'];
		$profile->dob = $allPostVars['dob'];
		$profile->numdependents = $allPostVars['numdependents'];
		$profile->ausdrivlicnum = $allPostVars['ausdrivlicnum'];
		$profile->email_primary = $allPostVars['email_primary'];
		$profile->mobile = $allPostVars['mobile'];
		$profile->home_ph = $allPostVars['home_ph'];
		$profile->work_ph = $allPostVars['work_ph'];
		$profile->unit_num = $allPostVars['unit_num'];
		$profile->street = $allPostVars['street'];
		$profile->suburb = $allPostVars['suburb'];
		$profile->postcode = $allPostVars['postcode'];
		$profile->state = $allPostVars['state'];
		$profile->gender = $allPostVars['gender'];
		$datetime = date_create()->format('Y-m-d');

		$profile->date_joined = $datetime;
		//echo ($profile->test());

		//print_r($allPostVars);
		//$profile = R::dispense('tasks');
		//$profile->task = $allPostVars['task'];
		//$profile->user_id = $allPostVars['user_id'];
		$id = R::store($profile);

	}

}

?>
