
<head>
<title>IMDB PAGE</title>
<link href="imdb.jpg" rel="shortcut icon">
<style>
    body {font-family:Arial, Helvetica, sans-serif; font-size:12px;}
     
.error {color: #FF0000;}

    .fadein { 
    position:relative; height:332px; width:500px; margin:0 auto;
    background: url("slideshow-bg.png") repeat-x scroll left top transparent;
    padding: 10px;
     }
    .fadein img { position:absolute; left:10px; top:10px; }
    </style>
     
    <script src="jquery-1.11.3.min.js" type="text/javascript">
	function Clear()
	{    
	document.getElementById("textbox1").value= "";
	}

	</script>
    <script>
    $(function(){
    	$('.fadein img:gt(0)').hide();
    	setInterval(function(){$('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');}, 1100);
    });
    </script>
   <style type="text/css">
#table
{

    background-image: url("2.jpg");
}
#table1
{

    background-image: url("1.jpg");
	
}

#font1
{
	
font-size:20;
font-family:"comic sans ms",cursive;
}#mybutton
{
font-size:20px;	
background-image: url("12.jpg");
border-radius:20px;
font-family:"comic sans ms",cursive;
}
#mybutton1
{

 background-image: url("12.jpg");
border-radius:10px;
font-size:30px;	
font-family:"comic sans ms",cursive;
}
#main
{
	width:100%;
	height:100%;
	margin:auto;
	
}
#top
{
	
	width:100%;
	height:15%;
}

#bottom
{
	    background-image: url("1.jpg");

	width:100%;
	height:5%;
}


#mid1
{
	width:100%;
	height:80%

}
#mid
{
	width:100%;
	
}
#mid3
{
	
}
#midleft
{
	width:50%;
	height:100%;
	float:left;
}
#midright
{

	width:50%;
	height:100%;
	float:left;
	
}

</style>
</head>
<style>
body  {
    background-image: url("7.jpg");
	width:100%;
	height:100%;
}
</style>