<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
	<title>Shop</title>
  <meta charset="utf-8" />
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Shop-master</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contacts</a>
      </li>
    </ul>
    <div class="cart-time">
    	 <a class="nav-link" href="#"><img src="/png/cart-6x.png" ></a>
    </div>
    <form class="form-inline my-2 my-lg-0">
      <a href="basket.php" class="btn btn-primary" id="go_basket">

        Корзина - <span>0</span>

      </a>
      

    </form>
    
  </div>
</nav>

<div class="container ">
  
  	<div class="row m-2">
  		
  <div class="col-3">
      <?php include $_SERVER['DOCUMENT_ROOT'].'/parts/cat_nav.php' ?>;
  </div>
  <div class="col-9">
  		<div class="container">