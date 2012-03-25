<?php
error_reporting(NULL);
session_start();
//Always place this code at the top of the Page
if (!isset($_SESSION['id'])) {
    // Redirection to login page twitter or facebook
  echo "llkcjfld";
  //header("location: index.php");
}
require 'facebook/facebook.php';
require 'config/fbconfig.php';

$facebook = new Facebook(array(
            'appId' => APP_ID,
            'secret' => APP_SECRET,
            ));
//echo '<br/>Logout from <a href="logout.php?logout">Logout</a>';

$new="https://graph.facebook.com/". $_SESSION['id']."/picture";
/*echo '<h1>Welcome</h1>';
echo 'id : ' . $_SESSION['id'];
echo '<br/>Name : ' . $_SESSION['username'];
echo '<br/>Email : ' . $_SESSION['email'];
echo '<br/>You are login with : ' . $_SESSION['oauth_provider'];
echo '<br/>Logout from <a href="logout.php?logout">Logout</a>';
$new="https://graph.facebook.com/". $_SESSION['id']."/picture";
echo "<br/><img border='0' src=$new />"; */
  $friends_data =$facebook->api('/me/friends');
 // print_r(sizeof($friends_data[data]));
  //echo"</br>";
 //  echo "<a href=".$facebook->getLogoutUrl().">Logout</a>";
  //echo $facebook->getLogoutUrl();
 //  echo"</br>";
  $frnd_use=$facebook->api('/me/friends?fields=installed');
  $gender=$facebook->api('/me/?fields=gender');
  //print_r($frnd_use);
 echo"</br>";
  //print_r($frnd_use);
 echo "<table order='1px' id='frnd'><tr height='650px' style='vertical-align:middle'><td><b style='color:white;align:center'>ur friends</br></br></b>";
		$i=1;
		foreach($frnd_use[data] as $a){
        if($a[installed]==1){
		if($i>20)
		exit;
		$i++;
        $pic=$facebook->api('/'.$a[id].'?fields=picture');
        $name=$facebook->api('/'.$a[id]);
        $nam=$name[name];
        //print_r($pic[picture]);
        echo "<img src=$pic[picture] title=$nam></br>";
		if($i%2==0)
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		
                    }
  
} echo "</td></tr></table>";

   //echo"</br>";
   $i=0;
   $data=array();
   $filename = $_SESSION['id'].'.jpg';

 if (!file_exists($filename)) {
   // echo "The file $filename exists";

  $frnd=$facebook->api('/me/friends?fields=education,gender,id,username');
  if($gender[gender]=="male")
  {$gnd="female";}
  else
  {$gnd="male";}
  foreach($frnd[data] as $frnd_det){
 //print_r($frnd_det);
//echo "</br></br></br></br></br>";
  if($frnd_det[gender]==$gnd)
 {  $i++;
    foreach($frnd_det[education] as $frnd_sch){
   if($frnd_sch[school][id]==140873165923078||$frnd_sch[school][id]==220670287957497||$frnd_sch[school][id]==148204638530502||$frnd_sch[school][id]==106321956070156||$frnd_sch[school][id]==106321956070156)
     { $data[]=$frnd_det[id];
     //print_r($frnd_det[id]);
       break;
     }
    // print_r($frnd_sch[school]);
  

       
                                }
    }   

    
                   }
  //print_r($data);
  //echo "</br>";
  $girls=array();
  for($i=0;$i<6;$i++)
  {
  $a=rand(0 ,sizeof($data)-1 );
   $girls[]=$data[$a];
  }
   $a=rand(0 ,5);
  $result=$girls[$a];
  $pic=$facebook->api('/'.$result.'?fields=picture');
  $name=$facebook->api('/'.$result);
        $nam=$name[name];
 // echo "<img src=$pic[picture] title=$nam>";
  // echo "</br>";
 // echo $i;
  $picture=array();
 // print_r($girls);
  for($i=0;$i<6;$i++)
  { $result=$girls[$i];
 // echo $result;
  $pic=$facebook->api('/'.$result.'?fields=picture');
  $picture[]=$pic[picture];
  }
//  print_r($picture);
  //echo "<img src=$new></br><img src=$pic[picture]>";
  
$dest = imagecreatefromjpeg('frame.jpg');
$src = imagecreatefromjpeg($new);

// Copy and merge
imagecopymerge($dest, $src, 30, 60, 0, 0, 50, 50, 100);

// Output and free from memory
//header('Content-Type: image/jpeg');
imagejpeg($dest,"result3.jpg");

$src = imagecreatefromjpeg($pic[picture]);
imagecopymerge($dest, $src, 220, 60, 0, 0, 50, 50, 100);
$result1=$_SESSION['id'];
// Output and free from memory
//header('Content-Type: image/jpeg');
imagejpeg($dest,$result1.".jpg");
//echo "<img src='$result1.jpg'>";
//print_r($girls);
$args = array(
    'message'   => 'get a mate from IT-BHU!',
  'link'      => 'http://apps.facebook.com/213020432118779/',
    'caption'   => 'A facebook app for IT-BHU'

);
$post_id = $facebook->api("/me/feed", "post", $args);
$args = array(
  'message' => "I found an IT-BHU mate find urs at  http://bit.ly/xOZNpT",
  'image'   => '@' . realpath($filename),
  'tags'    => array(
			 array(
			  'tag_uid'=> $_SESSION['id'],
			  'x'      => '15',
			  'y'      => '50',
			 ),
			 array(
			  'tag_uid'=> $result,
			  'x'      => '75',
			  'y'      => '50',
			 ),
			 ),
  
);
$data = $facebook->api('/me/photos', 'post', $args);

}
else
{	$i=0;
	$picture=array();
		while($i<6)
		{ $picture[]='smallrose.jpg';
		$i++;
		}

//echo "<b>you have been used application</b><img src=$filename>";
		/*	$args = array(
			'message'   => 'GOT a soulmate from IT BHU',
		    'link'      => 'http://www.fribler.com/fbapp',
			'caption'   => 'find urs here'

		);
		$post_id = $facebook->api("/me/feed", "post", $args);*/
		$args1 = array(
		  'message' => "I found an IT-BHU mate find urs at http://bit.ly/xOZNpT",
		  'image'   => '@' . realpath($filename),
		  'tags'    => array(
			 array(
			  'tag_uid'=> $_SESSION['id'],
			  'x'      => '15',
			  'y'      => '50',
			 ),
			 
			 ),
		);
		$data = $facebook->api('/me/photos', 'post', $args1); 
}








?>
<head>
<script src="svg.js"></script>

<script>
function sleep(milliseconds) {
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) {
    if ((new Date().getTime() - start) > milliseconds){
      break;
    }
  }
}




									
 window.onload = function () {
				
			
				
				 var src="<?php echo $filename; ?> ";
				 var a=new Array();
				 var b=new Array();
				 a[2]=650;a[3]=832;a[4]=832;a[5]=650;a[6]=468;a[7]=468;
				 b[2]=90;b[3]=195;b[4]=405;b[5]=510;b[6]=405;b[7]=195;
				 var R = new Raphael(document.getElementById("main"));
			     var angle=0;
				var circ1 = R.circle(650, 300, 130);
				//var mood_text= R.text(650, 300, 'Upload\n New Document').attr({fill: 'red',size:'15px'});
                var img= R.image(src, 539, 217, 224, 165);
			    circ1.attr({fill: 'rgb(232,232,232) ', stroke: 'red ','stroke-width': 0});
			
			
				var circ2 = R.set();
				circ2.push(R.circle(650, 90, 50).attr({fill:"url('<?php echo $picture[0]; ?>')", stroke: 'black','stroke-width': 1})
                           );
						   
                          
				//circle(650, 90, 50);
				//var mood_text= R.text(70, 80, 'Upload\n New Document').attr({fill: 'red',size:'15px'});
               //circ2.attr({fill: 'rgb(232,232,232) ', stroke: 'rgb(176,176,176) ','stroke-width': 17});
				var circ3 = R.circle(832, 195, 50);
				//var mood_text= R.text(70, 80, 'Upload\n New Document').attr({fill: 'red',size:'15px'});
                circ3.attr({fill: "url('<?php echo $picture[1]; ?>')", stroke: 'black ','stroke-width': 1});
				var circ4 = R.circle(832, 405, 50);
				//var mood_text= R.text(70, 80, 'Upload\n New Document').attr({fill: 'red',size:'15px'});
                circ4.attr({fill: "url('<?php echo $picture[2]; ?>')", stroke: 'black','stroke-width': 1});
				var circ5 = R.circle(650, 510, 50);
				//var mood_text= R.text(70, 80, 'Upload\n New Document').attr({fill: 'red',size:'15px'});
                circ5.attr({fill: "url('<?php echo $picture[3]; ?>')", stroke: 'black ','stroke-width':1});
				var circ6 = R.circle(468, 405, 50);
				//var mood_text= R.text(70, 80, 'Upload\n New Document').attr({fill: 'red',size:'15px'});
                circ6.attr({fill: "url('<?php echo $picture[4]; ?>')", stroke: 'black ','stroke-width': 1});
				var circ7 = R.circle(468, 195, 50);
				//var mood_text= R.text(70, 80, 'Upload\n New Document').attr({fill: 'red',size:'15px'});
                circ7.attr({fill: "url('<?php echo $picture[5]; ?>')", stroke: 'black','stroke-width': 1});
				circ1.node.onmouseover = function() {
							circ1.animate({'stroke-width': 0}, 1000, 'bounce');
							this.style.cursor = 'pointer';
							
						    
							};
				circ1.node.onmouseout = function() {
				            circ1.animate({'stroke-width': 17}, 1000, 'elastic');
			    };
									        
                var butt1 = R.set(),
                    butt2 = R.set();
                butt1.push(R.circle(24.833, 26.917, 26.667).attr({stroke: "#ccc", fill: "#fff", "fill-opacity": .4, "stroke-width": 2}),
                           R.path("M12.582,9.551C3.251,16.237,0.921,29.021,7.08,38.564l-2.36,1.689l4.893,2.262l4.893,2.262l-0.568-5.36l-0.567-5.359l-2.365,1.694c-4.657-7.375-2.83-17.185,4.352-22.33c7.451-5.338,17.817-3.625,23.156,3.824c5.337,7.449,3.625,17.813-3.821,23.152l2.857,3.988c9.617-6.893,11.827-20.277,4.935-29.896C35.591,4.87,22.204,2.658,12.582,9.551z").attr({stroke: "none", fill: "#000"}),
                           R.circle(24.833, 26.917, 26.667).attr({fill: "#fff", opacity: 0}));
                butt2.push(R.circle(24.833, 26.917, 26.667).attr({stroke: "#ccc", fill: "#fff", "fill-opacity": .4, "stroke-width": 2}),
                           R.path("M37.566,9.551c9.331,6.686,11.661,19.471,5.502,29.014l2.36,1.689l-4.893,2.262l-4.893,2.262l0.568-5.36l0.567-5.359l2.365,1.694c4.657-7.375,2.83-17.185-4.352-22.33c-7.451-5.338-17.817-3.625-23.156,3.824C6.3,24.695,8.012,35.06,15.458,40.398l-2.857,3.988C2.983,37.494,0.773,24.109,7.666,14.49C14.558,4.87,27.944,2.658,37.566,9.551z").attr({stroke: "none", fill: "#000"}),
                           R.circle(24.833, 26.917, 26.667).attr({fill: "#fff", opacity: 0}));
                butt1.translate(10, 181);
                butt2.translate(10, 245);
                butt1[2].click(function () {
				var i=2;
				angle -= 90;
				//alert('circ'+i+".animate({'cx':"+ a[i]+",'cy':"+b[i]+"}, 1000, 'easein')");
				circ2.animate({'cx':a[i+1],'cy':b[i+1]}, 2000, 'easein');
				circ3.animate({'cx':a[i+2],'cy':b[i+2]}, 2000, 'easein');
				circ4.animate({'cx':a[i+3],'cy':b[i+3]}, 2000, 'easein');
				circ5.animate({'cx':a[i+4],'cy':b[i+4]}, 2000, 'easein');
				circ6.animate({'cx':a[i+5],'cy':b[i+5]}, 2000, 'easein');
				//alert("ss");
				circ7.animate({'cx':a[2],'cy':b[2]}, 2000, 'easein');
                    
					i=2;
					var temp1,temp2;
					temp1=a[2];
					temp2=b[2];
					while(i<7)
					{	
						
						a[i]=a[i+1];
						b[i]=b[i+1];
						//alert(i+" "+a[i]);
						i++;
						//alert(i+" "+a[i]);
					}
					a[7]=temp1;
					b[7]=temp2;
                    img.stop().animate({transform: "r" + angle}, 1000, "<>");
                }).mouseover(function () {
                    butt1[1].animate({fill: "#fc0"}, 300);
                }).mouseout(function () {
                    butt1[1].stop().attr({fill: "#000"});
                });
                butt2[2].click(function () {
                    angle += 90;
                    img.animate({transform: "r" + angle}, 1000, "<>");
                }).mouseover(function () {
                    butt2[1].animate({fill: "#fc0"}, 300);
                }).mouseout(function () {
                    butt2[1].stop().attr({fill: "#000"});
                });
				
				
			            var interval2=setInterval(function() { 
							
						var i=2;
						circ2.animate({'cx':a[i+1],'cy':b[i+1]}, 2000, 'easein');
						circ3.animate({'cx':a[i+2],'cy':b[i+2]}, 2000, 'easein');
						circ4.animate({'cx':a[i+3],'cy':b[i+3]}, 2000, 'easein');
						circ5.animate({'cx':a[i+4],'cy':b[i+4]}, 2000, 'easein');
						circ6.animate({'cx':a[i+5],'cy':b[i+5]}, 2000, 'easein');
						//alert("ss");
						circ7.animate({'cx':a[2],'cy':b[2]}, 2000, 'easein');
							
							i=2;
							var temp1,temp2;
							temp1=a[2];
							temp2=b[2];
							while(i<7)
							{	
								
								a[i]=a[i+1];
								b[i]=b[i+1];
								//alert(i+" "+a[i]);
								i++;
								//alert(i+" "+a[i]);
							}
							a[7]=temp1;
							b[7]=temp2;
									
									
							
									}, 3000);
											sleep(5000);
											//alert("out");
											var i=2;
											circ2.animate({'cx':a[i+1],'cy':b[i+1]}, 2000, 'easein');
											circ3.animate({'cx':a[i+2],'cy':b[i+2]}, 2000, 'easein');
											circ4.animate({'cx':a[i+3],'cy':b[i+3]}, 2000, 'easein');
											circ5.animate({'cx':a[i+4],'cy':b[i+4]}, 2000, 'easein');
											circ6.animate({'cx':a[i+5],'cy':b[i+5]}, 2000, 'easein');
											//alert("ss");
											circ7.animate({'cx':a[2],'cy':b[2]}, 2000, 'easein');
												
												i=2;
												var temp1,temp2;
												temp1=a[2];
												temp2=b[2];
												while(i<7)
												{	
													
													a[i]=a[i+1];
													b[i]=b[i+1];
													//alert(i+" "+a[i]);
													i++;
													//alert(i+" "+a[i]);
												}
												a[7]=temp1;
												b[7]=temp2;
												var i=2;
											circ2.animate({'cx':a[i+1],'cy':b[i+1]}, 2000, 'easein');
											circ3.animate({'cx':a[i+2],'cy':b[i+2]}, 2000, 'easein');
											circ4.animate({'cx':a[i+3],'cy':b[i+3]}, 2000, 'easein');
											circ5.animate({'cx':a[i+4],'cy':b[i+4]}, 2000, 'easein');
											circ6.animate({'cx':a[i+5],'cy':b[i+5]}, 2000, 'easein');
											//alert("ss");
											circ7.animate({'cx':a[2],'cy':b[2]}, 2000, 'easein');
												
												i=2;
												var temp1,temp2;
												temp1=a[2];
												temp2=b[2];
												while(i<7)
												{	
													
													a[i]=a[i+1];
													b[i]=b[i+1];
													//alert(i+" "+a[i]);
													i++;
													//alert(i+" "+a[i]);
												}
												a[7]=temp1;
												b[7]=temp2;
				
											var i=2;
											circ2.animate({'cx':a[i+1],'cy':b[i+1]}, 2000, 'easein');
											circ3.animate({'cx':a[i+2],'cy':b[i+2]}, 2000, 'easein');
											circ4.animate({'cx':a[i+3],'cy':b[i+3]}, 2000, 'easein');
											circ5.animate({'cx':a[i+4],'cy':b[i+4]}, 2000, 'easein');
											circ6.animate({'cx':a[i+5],'cy':b[i+5]}, 2000, 'easein');
											//alert("ss");
											circ7.animate({'cx':a[2],'cy':b[2]}, 2000, 'easein');
												
												i=2;
												var temp1,temp2;
												temp1=a[2];
												temp2=b[2];
												while(i<7)
												{	
													
													a[i]=a[i+1];
													b[i]=b[i+1];
													//alert(i+" "+a[i]);
													i++;
													//alert(i+" "+a[i]);
												}
												a[7]=temp1;
												b[7]=temp2;
												var i=2;
											circ2.animate({'cx':a[i+1],'cy':b[i+1]}, 2000, 'easein');
											circ3.animate({'cx':a[i+2],'cy':b[i+2]}, 2000, 'easein');
											circ4.animate({'cx':a[i+3],'cy':b[i+3]}, 2000, 'easein');
											circ5.animate({'cx':a[i+4],'cy':b[i+4]}, 2000, 'easein');
											circ6.animate({'cx':a[i+5],'cy':b[i+5]}, 2000, 'easein');
											//alert("ss");
											circ7.animate({'cx':a[2],'cy':b[2]}, 2000, 'easein');
												
				
			
};

</script>




<style>
#main{
position:absolute;
top:10%;
left:0%;
width:90%;
height:90%;
order:1px solid red;
z-index:90;
}

#frnd{
position:absolute;
left:190px;
top:0px;
valign:middle;
z-index:100;
order:1px solid red;
height:650;
vertical-align:middle;
display:inline;
}
body{
background-color:#800000 ;
}
</style>
</head>
<body background="back.jpg">
<div id="main"></div>
</body>







  
  
  