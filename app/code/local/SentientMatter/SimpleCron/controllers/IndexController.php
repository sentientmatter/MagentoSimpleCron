<?php

/**
 * This source file is part of the Simple Cron Magento extension by Sentient Matter.
 * 
 * @author Nick Daugherty <nick@sentientmatter.com>
 * @copyright Sentient Matter 2012. All rights reserved.
 */

class SentientMatter_SimpleCron_IndexController extends Mage_Core_Controller_Front_Action
{
	/**
	 * This is the main trigger for the cron job.
	 * 
	 * It is meant to be called on every page request, via ajax.
	 */
	public function indexAction()
	{
		// @todo load the right store id here...
		$lastTriggerTimestamp = (int) Mage::getStoreConfig('crontab/simplecron/last_trigger_timestamp');
		
		$interval 			= (int) Mage::getStoreConfig('system/cron/simplecron_interval');
		$intervalSeconds 	= $interval * 60;
		
		//$intervalSeconds = 10;
		//echo ($lastTriggerTimestamp);
		
		$run = '';
		
		if((time() - $lastTriggerTimestamp) > $intervalSeconds){
			// Code pulled straight from 1.6 /cron.php
			// Only for urls
			// Don't remove this
			$_SERVER['SCRIPT_NAME'] = str_replace(basename(__FILE__), 'index.php', $_SERVER['SCRIPT_NAME']);
			$_SERVER['SCRIPT_FILENAME'] = str_replace(basename(__FILE__), 'index.php', $_SERVER['SCRIPT_FILENAME']);
			
			Mage::app('admin')->setUseSessionInUrl(false);
			
			try {
			    Mage::getConfig()->init()->loadEventObservers('crontab');
			    Mage::app()->addEventArea('crontab');
			    Mage::dispatchEvent('default');
			} catch (Exception $e) {
			    Mage::printException($e);
			}
			
			$config = new Mage_Core_Model_Config();
			
			$config->saveConfig('crontab/simplecron/last_trigger_timestamp', time());
			
			// Force the config to be rebuilt (recached) so the new timestamp is loaded next time.
			Mage::app()->getConfig()->reinit();
			
			$run = ',"run":"yes"';
		} else {
			//echo 'no trigger';
		}
		
		header('Content-type: application/json');
		
		echo '{"status":"ok"' . $run . '}';
		
		die();
	}
} 