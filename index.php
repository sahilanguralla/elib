<?php
include "includes/header.inc.php";
session_start();
?>
  <link rel="stylesheet" href="css/custom.css"/>
  <title>Library Home | Technical Student Society Library</title>
</head>
<body>
  
  <?php include 'includes/bar.inc.php'; ?>
  <!-- Docs page layout -->
  
  <div class="jumbotron panel-head">
    <div class="container">
      <h1>TSS Library</h1>
      <p class="col-md-8 hidden-xs">This library includes various collections of books and videos related to different engineering fields.</p>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-8" role="main">
    		
    	<div class="row">
          <div class="col-md-6">
	    <div class="jagmag bg-primary" id="books_link">
              <h2>Books</h2>
              <img src="images/kaka.png" class="img-thumbnail" />
              <p>Includes 1000+ books related to every field.Includes 1000+ books related to every field.</p>
            </div>
	  </div>
	  <div class="col-md-6">
	    <div class="jagmag bg-primary" id="vdos_link">
              <h2>Video Lectures</h2>
	      <img src="images/vido.jpg" class="img-thumbnail" />
	      <p>Includes 1000+ books related to every field videos+ books related to every field.</p>
            </div>     	
	  </div>
	</div>

	<div class="row">
	  <div class="col-md-6">
	    <div class="jagmag bg-primary" id="discus_link" data-toggle="modal" data-target="#comingSoon">
              <h2>Discussions</h2>
              <img src="images/discus.jpg" class="img-thumbnail" />
              <p>Includes 1000+ b discuss field.Includes 1000+ books related to every field.</p>
            </div>
	  </div>
	  <div class="col-md-6">
	    <div class="jagmag bg-primary" id="suggest_link" data-toggle="modal" data-target="#comingSoon">
              <h2>Suggestions</h2>
              <img src="images/suggest.png" class="img-thumbnail" />
              <p>Includes 1000+ books related to every field.Includes 1000+ books related to every field.</p>
            </div>     	
          </div>
	</div>

      </div>
      
      <div class="col-md-4" role="main">
      	<div class="row">
      	  <div class="col-md-11 col-md-offset-1">
            <div class="side-load">
              <h5>Most Viewed :</h5>
              <ul>
		<li>Vehla Banda Vdos</li>
                <li>Kaka Vdos</li>
              </ul>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-11 col-md-offset-1">
            <div class="side-load bg-warning">
              <h5>Recently Viewed :</h5>
              <ul>
		<li>Vehla Banda Vdos</li>
		<li>Kaka Vdos</li>
              </ul>
            </div>
	  </div>
	</div>
      </div>
    </div>
  </div>

  <?php include 'includes/footer.inc.php'; ?>

  <!-- javascript files-->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>