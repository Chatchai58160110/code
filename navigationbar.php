
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script>
      $(document).ready(function(){
          $('ul a').click(function(){
          $('a').removeClass("active");
          $(this).addClass("active");
      	});
      });
	</script>

<style>
ul {
    
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: white;
    top: 0;
    width: 100%;
}

li {
    float: right;
}

li a {
    display:inline-block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}
.active{
	border-bottom: solid 3px #00a29e;
    color: #00a29e
}

li a:hover, .dropbtn:hover .dropbtn{
    border-bottom: solid 3px #00a29e;
}

li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}
.dropdown-content a:hover {background-color: #00a29e}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>
</head>
<body>
	
      <ul>
      	<li class="dropdown">
			<a href="javascript:void(0)" class="dropbtn">Dropdown</a>
			<div class="dropdown-content">
				<a href="#">Link 1</a>
				<a href="#">Link 2</a>
				<a href="#">Link 3</a>
			</div>
		</li>
        
        <li><a href="#contact">Login</a></li>
      	<li><a href="#about">Catalogue</a></li>
        <li><a class="active" href="#home">Home</a></li>
      </ul>
     
            	   
</body>
</html>
