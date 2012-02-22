/**
 * This source file is part of the Simple Cron Magento extension by Sentient Matter.
 * 
 * @author Nick Daugherty <nick@sentientmatter.com>
 * @copyright Sentient Matter 2012. All rights reserved.
 */
 
Event.observe(window, 'load', function() { 
	if(typeof(window.simplecron) != 'undefined'){
		var request = new Ajax.Request(
		    simplecron.base_url + simplecron.trigger_url,
		    {
		        method: 'post',
		        onComplete: function(transport){ // Defining Complete Callback Function
		                    // Getting Ajax Response Text Which is JSON Object
		            /*var jsonResponse=transport.responseText;*/
		        },
		        parameters: {}    // Seriallizing the form input values
		    }
		);
	}
});