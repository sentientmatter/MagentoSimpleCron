<?php

/**
 * This source file is part of the Simple Cron Magento extension by Sentient Matter.
 * 
 * @author Nick Daugherty <nick@sentientmatter.com>
 * @copyright Sentient Matter 2012. All rights reserved.
 */

/**
 * This class observers the pre dispatch method (called once per page view) to inject the sipmlecron.js into the 
 * head of the page. 
 * 
 * While it is possible to do this purely via xml, doing it in php allows logic to be applied before adding the js, 
 * such as throttling so that only every X request gets the js.
 */
class SentientMatter_SimpleCron_Model_Dispatch_Observer extends Mage_Core_Model_Abstract
{
	public function injectJs($observer)
	{
		//ini_set('display_errors', 1);
		$headBlock = Mage::getSingleton('core/layout')->getBlock('head');
		//var_dump();//->getBlock('head'));
		//die();
		$headBlock->addJs('simplecron.js');  
	}
}
