<?php
namespace Controllers;

class Root extends BaseController {
	protected function initRoutes() {
		$this->app->get('/', array($this, 'home'))->name('home');

		$this->app->get('/2', array($this, 'home2'))->name('home2');

		$this->app->get('/3', array($this, 'home3'))->name('home3');

		$this->app->get('/5', array($this, 'home5'))->name('home5');

		$this->app->get('/metrics', array($this, 'metrics'))->name('metrics');

		$this->app->get('/widgets', array($this, 'widgets'))->name('widgets');

		$this->app->get('/wizard', array($this, 'wizard'))->name('wizard');

		$this->app->get('/formadvanced', array($this, 'formadvanced'))->name('formadvanced');

		$this->app->get('/projects', array($this, 'projects'))->name('projects');

		//	$this->app->get('/projectdetail/:id', array($this, 'projectdetail'))->name('projectdetail/:id');

		$this->app->get('/projectdetail/:id', function ($id) {
			$this->app->render('project_detail.twig', array('id' => $id));
		})->name('projectdetail');

	}

	public function home() {
		$this->app->render('index.twig', array('oneIsActive' => true));
	}

	public function home2() {
		$this->app->render('dashboard_2.twig', array('oneIsActive' => true));
	}

	public function home3() {
		$this->app->render('dashboard_3.twig', array('oneIsActive' => true));
	}

	public function home5() {
		$this->app->render('dashboard_5.twig', array('oneIsActive' => true));
	}

	public function metrics() {
		$this->app->render('metrics.twig', array('oneIsActive' => true));
	}

	public function widgets() {
		$this->app->render('widgets.twig', array('oneIsActive' => true));
	}

	public function wizard() {
		$this->app->render('form_wizard.twig', array('oneIsActive' => true));
	}

	public function formadvanced() {
		$this->app->render('form_advanced.twig', array('oneIsActive' => true));
	}

	public function projects() {
		$this->app->render('projects.twig', array('oneIsActive' => true));
	}

	public function projectdetail() {
		$this->app->render('project_detail.twig', array('oneIsActive' => true));
	}

}
