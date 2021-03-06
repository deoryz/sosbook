<?php

class MigrateController extends CController
{
	public function actionIndex()
	{
	    $commandPath = Yii::app()->getBasePath() . DIRECTORY_SEPARATOR . 'commands';
	    $runner = new CConsoleCommandRunner();
	    $runner->addCommands($commandPath);
	    $commandPath = Yii::getFrameworkPath() . DIRECTORY_SEPARATOR . 'cli' . DIRECTORY_SEPARATOR . 'commands';
	    $runner->addCommands($commandPath);
	    $args = array('yiic', 'migrate', '--interactive=0');
	    ob_start();
	    $runner->run($args);
	    $content =  htmlentities(ob_get_clean(), null, Yii::app()->charset);
	    echo "<pre>";
	    echo $content;
	    echo "</pre>";
	}

}
