<?php
/*
Plugin Name: TableOfContent
Plugin URI: http://www.hashdefineelectronics.com/?p=168
Description: Plugin that can be used to displayed a table of content of your post/page as widget or inside your post. Please visit my homepage for more detail on using this plugin.
Version: 1.0.1
Author: Opticalworm, Ronald sousa
Author URI: http://www.hashdefineelectronics.com/
*/
// Global variable used to pass filter data over to widget
$TableContentData;
// register widget
add_action('widgets_init', 'TB_Init');
add_filter('the_content', 'TB_ContentFilter');
// our Widget Init
function TB_Init(){
	//Register Our new widget
	register_widget("TB_Widget");
}
class TB_Widget extends WP_Widget {
    // this is your widget contructor
	function TB_Widget(){
        parent::WP_Widget(false, $name = 'TB_Widget');	
    }
    // This function is called when your widget is used
    function widget($args, $instance){
		// is it a single page or post
		if(is_page() | is_single()){
			$mykey_values = get_post_custom_values('Tb_Title');
				// If variable exist then display table of content
				if($mykey_values){			
					global $TableContentData;
					echo $TableContentData;
				}
		}
    }
    // This is the function that called when user update the widget
    function update($new_instance, $old_instance) {	
        return $old_instance;
    }
    // This funciton when you want to edit widget
    function form($instance){				
    }
}
function TB_ContentFilter($content){
	// Get Table Title
	$Tb_Title = get_post_custom_values('Tb_Title');
	// If variable exist then display table of content
	if( $Tb_Title & is_single())
	{	// Get table filter parameter, if not found then search for our default
		$Tb_Headers = get_post_custom_values('Tb_Headers');
		
		if($Tb_Headers){
			$SearchParameter = split(",",$Tb_Headers[0]);
		}
		else{
			$SearchParameter = split(",","1,2,3,4,5,6,7");
		}
		//sort our parameters
		sort($SearchParameter);
		// Get global data
		global $TableContentData;
		// Reset of allocate string space
		$TableContentData = "";
		// This funtion generate the link to pos/page header
		$TableContentData = TB_ContentGetList($content,$SearchParameter);
		//Is it empty? if so do nothing
		if($TableContentData){			
			// If user wants to add it to table content then put it there
			$content = str_replace("<!--PutTableHere-->", "<div id='TBC_Container'> <div id='TBC_ContainerTitle'>" . $Tb_Title[0] . "</div>". "<div id='TBC_Content'>" . $TableContentData . "</div>" . "</div>", $content);
			$TableContentData = "<div id='TBW_Container'> <div id='TBW_ContainerTitle'>" . $Tb_Title[0] . "</div>". "<div id='TBW_Content'>" . $TableContentData . "</div>" . "</div>";
		}		
	}
	return $content;
}
function TB_ContentGetList(&$content, $HeaderParameter){
	//Creat Empty variables
	$HeaderNums = "";
	$ContentLink = "";
	$IndentLast = 1;
	//Creates a single string of header identifier. eg: "1234"
	foreach($HeaderParameter as $Num){
		$HeaderNums.= $Num;
	}
	//Setup header to search for our headers specified by user	
	if (preg_match_all('/<h(['.$HeaderNums.'])(.*?)>(.*?)(<\/h['.$HeaderNums.']>)/', $content, $Result)){
		// Start Table
		$ContentLink.="<ul id='TB_UL'>";
		// Go through each result and add to our list
		foreach ($Result[0] as $key => $title){
			//Get header text
			$HeaderText = strip_tags($Result[0][$key]);
			// If user assign an ID then get it so that we can add our on
			$TagIdRegexOutput = split('"',$Result[2][$key]);
			// Check if user has already set an id, if so use theres
			if($TagIdRegexOutput[0]){
				$TagRef = $TagIdRegexOutput[1];						
			}
			else{
				$TagRef = $HeaderText;
			}
			//Set a level. 
			$IndentPosCurrent = $Result[1][$key];
			//Create link to header
			$ContentLink.='<li class="TB_Level' . $Result[1][$key] .'"><a class="TB_Link" href="#'.$TagRef.'">'.$HeaderText.'</a>'.'</li>';
			// Create header tag
			$HeaderTag = "h".$Result[1][$key];
			// Replace header in content with our assign id
			$content = str_replace($Result[0][$key], "<$HeaderTag"." id='$TagRef' ".">$HeaderText</$HeaderTag>", $content);				
		}
		// End List
		$ContentLink.="</ul> <!-- TB_Main-->";
	}
	return $ContentLink;
}
?>
