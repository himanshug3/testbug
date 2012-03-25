<head>
<script src="svg.js"></script>

<script>
 window.onload = function () {
				 var src="frame.jpg";
				 var a=new Array();
				 var b=new Array();
				 a[2]=650;a[3]=832;a[4]=832;a[5]=650;a[6]=468;a[7]=468;
				 b[2]=90;b[3]=195;b[4]=405;b[5]=510;b[6]=405;b[7]=195;
				 var R = new Raphael(document.getElementById("main"));
			     var angle=0;
				var circ1 = R.circle(650, 300, 130);
				//var mood_text= R.text(650, 300, 'Upload\n New Document').attr({fill: 'red',size:'15px'});
                var img= R.image(src, 539, 217, 224, 165);
			    circ1.attr({fill: 'rgb(232,232,232) ', stroke: 'red ','stroke-width': 17});
			
			
				var circ2 = R.set();
				circ2.push(R.circle(650, 90, 50).attr({fill:"url('ankur.jpg')", stroke: 'rgb(176,176,176) ','stroke-width': 17})
                           );
						   
                          
				//circle(650, 90, 50);
				//var mood_text= R.text(70, 80, 'Upload\n New Document').attr({fill: 'red',size:'15px'});
               //circ2.attr({fill: 'rgb(232,232,232) ', stroke: 'rgb(176,176,176) ','stroke-width': 17});
				var circ3 = R.circle(832, 195, 50);
				//var mood_text= R.text(70, 80, 'Upload\n New Document').attr({fill: 'red',size:'15px'});
                circ3.attr({fill: "url('nayan.jpg')", stroke: 'rgb(176,176,176) ','stroke-width': 17});
				var circ4 = R.circle(832, 405, 50);
				//var mood_text= R.text(70, 80, 'Upload\n New Document').attr({fill: 'red',size:'15px'});
                circ4.attr({fill: 'yellow ', stroke: 'rgb(176,176,176) ','stroke-width': 17});
				var circ5 = R.circle(650, 510, 50);
				//var mood_text= R.text(70, 80, 'Upload\n New Document').attr({fill: 'red',size:'15px'});
                circ5.attr({fill: 'orange', stroke: 'rgb(176,176,176) ','stroke-width': 17});
				var circ6 = R.circle(468, 405, 50);
				//var mood_text= R.text(70, 80, 'Upload\n New Document').attr({fill: 'red',size:'15px'});
                circ6.attr({fill: 'black', stroke: 'rgb(176,176,176) ','stroke-width': 17});
				var circ7 = R.circle(468, 195, 50);
				//var mood_text= R.text(70, 80, 'Upload\n New Document').attr({fill: 'red',size:'15px'});
                circ7.attr({fill: 'white ', stroke: 'rgb(176,176,176) ','stroke-width': 17});
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
				
				//alert('circ'+i+".animate({'cx':"+ a[i]+",'cy':"+b[i]+"}, 1000, 'easein')");
				circ2.animate({'cx':a[i+1],'cy':b[i+1]}, 2000, 'easein');
				circ3.animate({'cx':a[i+2],'cy':b[i+2]}, 2000, 'easein');
				circ4.animate({'cx':a[i+3],'cy':b[i+3]}, 2000, 'easein');
				circ5.animate({'cx':a[i+4],'cy':b[i+4]}, 2000, 'easein');
				circ6.animate({'cx':a[i+5],'cy':b[i+5]}, 2000, 'easein');
				//alert("ss");
				circ7.animate({'cx':a[2],'cy':b[2]}, 2000, 'easein');
                    angle -= 90;
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
			
};
</script>
<style>
#main{
width:100%;
height:100%;
border:1px solid red;

}
</style>
</head>
<body background="back.jpg">
<div id="main"></div>
</body>