<?php

class HomeController extends Controller
{

	public function actionIndex()
	{
		$this->layout='//layouts/column1';

		$this->render('index', array(	
		));
	}

}