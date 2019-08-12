<?php
/**
 * ApplicationConfigBehavior is a behavior for the application.
 * It loads additional config parameters that cannot be statically 
 * written in config/main
 *
 * url: http://www.yiiframework.com/wiki/208/how-to-use-an-application-behavior-to-maintain-runtime-configuration/
 *
 * @author Putra Sudaryanto <putra@ommu.co>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2014 Ommu Platform (www.ommu.co)
 * @link https://github.com/ommu/mod-core
 *
 */
 
class AppConfigBehavior extends CBehavior
{
	/**
	* Declares events and the event handler methods
	* See yii documentation on behavior
	*/
	public function events()
	{
		return array_merge(parent::events(), array(
			'onBeginRequest'=>'beginRequest',
		));
	}

	/**
	* Load configuration that cannot be put in config/main
	*/
	public function beginRequest()
	{
		
	}
}