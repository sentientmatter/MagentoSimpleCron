/**
 * This source file is part of the Simple Cron Magento extension by Sentient Matter.
 * 
 * @author Nick Daugherty <nick@sentientmatter.com>
 * @copyright Sentient Matter 2012. All rights reserved.
 */
 
Event.observe(window, 'load', function() { 
	var request = new Ajax.Request(
	    '/simplecron',
	    {
	        method: 'post',
	        onComplete: function(transport){ // Defining Complete Callback Function
	 
	                    // Getting Ajax Response Text Which is JSON Object
	            /*var jsonResponse=transport.responseText;
	            //Checking JSON Objects property and performing related action
	            // You will understand the response Text format after going through the controller description (Below)
	            if(jsonResponse.error){
	                //alert("Error Occured");
	                return false;
	            }
	            else{
	                window.location.href=jsonResponse.url;
	            }*/
	        },
	        parameters: {}    // Seriallizing the form input values
	    }
	);
});