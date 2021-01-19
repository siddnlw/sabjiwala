<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="pro_style.css">
  
</head>
<body>
  <div id="id01" class="modal">
    <div class="background">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close">×</span>
        <form class="modal-content" action="">
          <div class="box">
            <h1>Delete product</h1>
            <p>Are you sure you want to delete this product?</p>
            <div class="clearfix">
              <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
              <button type="button"  data-value="<?php?>"  id="id0" name="deletebtn" class="deletebtn">Delete</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>




<!-- 


<div class="add" >
      <button onclick="document.getElementById('id01').style.display='block'">Delete Product</button>

      <div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close">×</span>
        <form class="modal-content" action="">
          <div class="box">
            <h1>Delete product</h1>
            <p>Are you sure you want to delete this product?</p>
          
            <div class="clearfix">
              <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
              <button type="button"    id="id0" name="deletebtn" class="deletebtn">Delete</button>
             
            </div>
          </div>
        </form>
      </div>


    <div class="add" >
      <button onclick="document.getElementById('id01').style.display='block'">Delete Product</button>

      <div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close">×</span>
        <form class="modal-content" action="">
          <div class="box">
            <h1>Delete product</h1>
            <p>Are you sure you want to delete this product?</p>
          
            <div class="clearfix">
              <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
              <button type="button"    id="id0" name="deletebtn" class="deletebtn">Delete</button>
             
            </div>
          </div>
        </form>
      </div>

      <script>
      var modal1 = document.getElementById('id01');

      window.onclick = function(event) {
        if (event.target == modal1) {
          modal.style.display = "none";
          // alert('hello');
        }
      }
      var modal = document.getElementById('id0');

      window.onclick = function(event) {
        if (event.target == modal) {
        </script>

         <?php 
              $idd = (isset($_GET['id']) ? $_GET['id'] : '');
              echo "<script>alert('$idd')</script>";

         ?>
          <script>
          
        //  $sql = "DELETE FROM `products` WHERE id= '$idd' ";
        //  if ($Conn->query($sql) === TRUE) 
          // {
        //         alert('Product deleted');

          //    // window.location="products.php";
          //  // echo "<h4>Product Updated<h4>";
          //    // exit();
          // } 
          // else 
          // {
        //         alert('Product didnt got deleted');

          //  // echo "<script type='text/javascript'>alert('$message2')
        //      // exit();
          // }

        // }
      // }
      </script>

      

    </div> -->

