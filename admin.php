<?php
	include "dbsabziwala.php";
	OpenCon();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sabzi Wala</title>
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
  <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
  <link rel="stylesheet" href="A_style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<header>
    <a href="home.php"> <img src="download-removebg-preview.png" style="height: 120px;width: 120px;"></a>
      <nav>
        <ul id="myHeader">
          <li><a href="home.php" class="n <?php echo $_SESSION['current_page'] == 'home' ? 'active' : '' ?>">Home</a></li>
          <li><a href="about.php" class="n <?php echo $_SESSION['current_page'] == 'about' ? 'active' : '' ?>">About</a></li>
          <li><a href="#" class="n <?php echo $_SESSION['current_page'] == 'pricing' ? 'active' : '' ?>">Pricing</a></li>
          <li><a href="#" class="n <?php echo $_SESSION['current_page'] == 'terms' ? 'active' : '' ?>">Terms of use</a></li>
          <li><a href="#" class="n <?php echo $_SESSION['current_page'] == 'contact' ? 'active' : '' ?>">Contact</a></li>
          <div class="search-container">
            <form action="search_result.php">
              <input type="text" placeholder="Search.." name="search" required="" value="<?php if(isset($_GET['search'])) echo$_GET['search']?>">
              <button type="submit"><i class="fa fa-search"></i></button>
            </form>
          </div>
        </ul>
      </nav>
  </header>
  <div class="header1">
    <div id="demo"><h3 ></h3></div> 
    <div id="userName"><h3 ><?php echo $_SESSION["userName"]?></div> 
  </div>
  <?php
    $Conn = OpenCon();
    if ($_SESSION['current_page']=='home') {
  ?>
  <footer>
    <nav>
      <ul id="myFooter">
        <li><a href="home.php" id="category" class="n <?php echo $_SESSION['current_bar'] == 'dashboard' ? 'active' : '' ?>">Dashboard</a></li><hr>
      	<li><a href="category.php" id="category" class="n <?php echo $_SESSION['current_bar'] == 'category' ? 'active' : '' ?>">Category</a></li><hr>
        <li><a href="products.php" id="products" class="n <?php echo $_SESSION['current_bar'] == 'products' ? 'active' : '' ?>">Products</a></li><hr>
        <?php
          if(array_key_exists("user",$_SESSION))  
          {
            $types=$_SESSION["type"];
            $query = 'SELECT * FROM admin';
            $result = $Conn->query($query);
            if ($result->num_rows > 0) 
            {
                while ($row = $result->fetch_assoc()) 
                {
                  if ($types=='admin') 
                  {
        ?> 
      	<li><a href="users.php" id="users" class="n <?php echo $_SESSION['current_bar'] == 'users' ? 'active' : '' ?>">Users</a></li><hr>
        <?php
                  break;
                }
              }
            }
          }
        ?>
      </ul>
    </nav>
    <hr>
  </footer>
  <?php
    }
  ?>
</body>
</html>
<script>
  var header = document.getElementById("myHeader");
  var active = header.getElementsByClassName("n");
  for (var i = 0; i < active.length; i++) 
  {
    active[i].addEventListener("click", function() 
    {
      var current = document.getElementsByClassName("active");
      current[0].className = current[0].className.replace(" active", "");
      this.className += " active";
    
    });
  }
  var x = document.getElementsByClassName("active")[0].innerHTML;
  document.getElementById("demo").innerHTML = x;
  var footer = document.getElementById("myFooter");
  var active = footer.getElementsByClassName("n");
  for (var i = 0; i < active.length; i++) 
  {
    active[i].addEventListener("click", function() 
    {
      var current = document.getElementsByClassName("active");
      current[0].className = current[0].className.replace(" active", "");
      this.className += " active";
    });
  }
</script>

<!-- <script id="Ym90cGVuZ3VpbkFwaQ" src="https://cdn.botpenguin.com/bot.js?apiKey=G%25_%24S%28-%3E%29VsCVCWo%7ED6X%3EI" async></script> -->
