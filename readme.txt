=== TableOfContent ===
Contributors: Opticalworm
Tags: Post, content, table of content, widget
Requires at least: 3.0.1
Tested up to: 3.0.1
Stable tag: trunk
License: GPLv2

This plugin is an easy way to add table of content to your post directly or as a widget.

== Description ==

This plugin is an easy way to add table of content to your post directly or as a widget. It will parser the content of your post for HTML headers and generate a list of links.
This plugin will require some CSS understanding to match your site and the know how for adding custom fields in your post.

Features:
* Easy to style
* Widget
* Display table of content anywhere in your post content
* Can set which html h1 to parse
* Can set your own title

== Installation ==

If you have the plugin already activated please skip to step 3
1- Upload TableOfContent.php to /wp-content/plugins/
2- Activate the plugin through the 'Plugins' menu in WordPress

[If you don’t want to use a widget and prefer to display the table of content inside your post then skip to step 5]

3- Go to the widgets menu
4- Drag TB_Widget into the widget area you would like your table of content to appear
5- Create or Edit a post [post editor]
6- In the post editor scroll down to Custom fields
7- Under name inser ‘Tb_Title’ (capital sensitive) 
8- Under value inser your table title. For example “Table of Content”
9- Click on Add Custom Fields
10- Again under name insert 'Tb_Headers'
11- Under value insert the header numbers with comma seperation. the numbers informs the plugin as to which html header h1 you would like to include in your table of content.
	For example: if you want your table of content to display links to h1, h2 and h3 then write '1,2,3'

[You can skip step 12 if you're using the widget to display your table]
12- Add '<!--PutTableHere-->' inside your post content under HTML input.  [Please be aware that where ever you put this tag will be where the table appears to your readers]

= CSS style =
By default the plugin provides no CSS styling and assumes the user will write its own. However, if you’re using the default theme 'twentyten' I've provide example code bellow that you can use. 
For more detail example of the id/class used by this plugin visit my homepage.

To use this Code, Add it at the bottom of your theme style.css
-- CSS Start
#TBC_ContainerTitle,
#TBW_ContainerTitle{
font-family: Helvetica, "Times New Roman", Georgia, serif, Georgia, "Bitstream Charter";
font-weight:bold;
text-align:Center;
border-bottom: 1px solid #DADADA;
margin: 5px 10px 0 10px;
}
#TBC_Container,
#TBW_Container{
background-color: #f8f8ec;
border: 1px solid #DADADA;
width: 200px;
margin: 0 0 0 0;
padding: 0 0 0 0;
}
#TBC_Container a,
#TBW_Container a{
font-family: "Times New Roman", Georgia, "Bitstream Charter", serif;
text-decoration: none;
color:#4e4e4e;
text-align:Left;
}
#TBC_Container a:hover,
#TBW_Container a:hover{
text-decoration: underline;
}
#TB_UL{
padding: 0 0 0 0;
margin: 5px 0 5px 10px;
}
#TBC_Container li,
#TBW_Container li{
list-style-type: none;
text-align: left;
}
.TB_Level1,
.TB_Level2,
.TB_Level3,
.TB_Level4,
.TB_Level5,
.TB_Level6{
font-family: "Times New Roman", Georgia, "Bitstream Charter", serif;
line-height: 18px;
font-size: 15px;
}
.TB_Level1{
font-weight:bold;
margin-left:0px;
}
.TB_Level2{
margin-left:10px;
}
.TB_Level3{
margin-left:20px;
}
.TB_Level4{
margin-left:30px;
}
.TB_Level5{
margin-left:40px;
}
.TB_Level6{
margin-left:50px;
}
-- CSS End

== Frequently Asked Questions ==

Visit my homepage

== Screenshots ==

1. Page Example
2. Table of Content Example

== Changelog ==

Visit my homepage

== Upgrade Notice ==

Visit my homepage
