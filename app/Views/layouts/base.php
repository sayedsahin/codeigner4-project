<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>CodeIgniter 4 Practice</title>

    <!-- Bootstrap core CSS -->
	<link href="<?= base_url(); ?>/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="/">CI4</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

<div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="<?= base_url(); ?>">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>/about">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>/more">More</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>/employee">Employee</a>
        </li>
        <?php if (session()->has('logged_user')) { ?>
        <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>/dashboard/">Dashboard</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>/account/logout">Logout</a>
        </li>
        <?php }else{ ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>/account/login">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>/account/signup">Signup</a>
        </li>
        <?php } ?>
        
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>
</nav>
<?= $this->renderSection('content'); ?>
<footer class="container">
  <p>&copy; Company 2017-2020</p>
</footer>
<script src="<?= base_url(); ?>/js/jquery.min.js"></script>
      <script>window.jQuery || document.write('<script src="<?= base_url(); ?>/js/jquery.min.js"><\/script>')</script><script src="<?= base_url(); ?>/js/bootstrap.bundle.min.js"></script>
</html>
