<head>
    <script type="text/javascript">
        var x;
        
        function accionAjax(){
            var texto = x.responseText;
            document.getElementById("miDiv").innerHTML = texto;
        }
        
        function miFun(){
            x = new XMLHttpRequest();
            nombre = document.getElementById("nombre").value;
            x.open ("GET","despuesAjax.php?nombre="+nombre,true);
            x.setRequestHeader('X-Requested-With','XMLHttpRequest');
            x.send();

            x.onreadystatechange = function(){
                if (x.readyState==4 && x.status==200){
                    accionAjax();   
                }
            }
        }
        
    
    </script>
</head>

<body>

	<h1>Saludator</h1>
	Introduce un nombre: <input type="text" name="nombre" id="nombre" placeholder="Introduce tu nombre"/>
	<br>
	<div id="miDiv">
	</div>
	<br>
	<input type="button" value="Saludar" onClick="miFun()"/>
	
</body>
