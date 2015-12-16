<?php
namespace Controllers;

class UserProfile extends BaseController {
	protected function initRoutes() {
		$this->app->get('/profile', array($this, 'showForm'))->name('profile');

		$this->app->post('/profile', array($this, 'profile'));
	}

	public function showForm() {
		$this->redirectIfNotLoggedIn();

		//$this->app->flashNow('hideRegister', true);
		$this->app->render('profile.twig');
	}

	public function profile() {
		$this->redirectIfNotLoggedIn();

		$req = $this->app->request;
		$userprofile = new \Models\UserProfile();
		list($errors, $fixes) = $userprofile->create($req->post('email'),
			$req->post('firstname'),
			$req->post('lastname'),
			$req->post('password'),
			$req->post('confirmPassword'));

		if (0 == count($fixes)) {
			$this->app->flashNow('registered', true);
		} else {
			if (!is_null($req->post('email'))) {
				$this->app->flashNow('email', $req->post('email'));
			}

			if (!is_null($req->post('firstname'))) {
				$this->app->flashNow('firstname', $req->post('firstname'));
			}

			if (!is_null($req->post('lastname'))) {
				$this->app->flashNow('lastname', $req->post('lastname'));
			}
			$this->app->flashNow('errors', $errors);
			$this->app->flashNow('fixes', $fixes);

		}

		$this->app->flashNow('hideRegister', true);
		$this->app->render('register.twig', array('postLoginUrl' => $this->app->urlFor('home'))); // Change 'home' to be the page to go to after registering.
	}
}
