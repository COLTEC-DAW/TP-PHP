<?php
  function isMenuSet(){
    session_start();
    if(!isset($_SESSION['login']) && !isset($_SESSION['password'])) {
      setMenu("NULL");
    } else {
      setMenu($_SESSION['userType']);
    }
  }
  function setMenu($userType) {
    if($userType == "admin") :
?>
<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="../home/index.php">DAW Eventos</a>
  <div class="form-inline col-10">
    <form class="col-6" action="../home/index.php" method="post">
      <input class="form-control w-100" type="text" placeholder="Pesquisar" name="pesquisa">
    </form>
    <form class="offset-3 col-2" action="../eventos/addEventos.php" method="post">
      <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modalAddEvent">Adicionar Evento</button>
      <?php require "../incs/addEventos.inc" ?>
    </form>
    <form class="col-1" action="../home/logout.php" method="post">
      <button type="submit" class="btn btn-danger">Log Out</button>
    </form>
  </div>
</nav>
<?php $_SESSION["user"] = "admin" ?>

<?php elseif($userType == "user") : ?>
<nav class="navbar navbar-dark bg-dark" >
  <a class="navbar-brand" href="../home/index.php">DAW Eventos</a>
  <div class="form-inline col-10">
    <form class="col-6" action="../home/index.php" method="post">
      <input class="form-control w-100" type="text" placeholder="Pesquisar" name="pesquisa">
    </form>
    <form class="offset-4 col-1" action="../carrinho/index.php" method="post">
        <button type="submit" class="btn btn-light">Carrinho</button>
    </form>
    <form class="col-1" action="../home/logout.php" method="post">
      <button type="submit" class="btn btn-danger">Log Out</button>
    </form>
  </div>
</nav>
<?php $_SESSION["user"] = "user" ?>

<?php else : ?>
<nav class="navbar navbar-dark bg-dark" >
  <a class="navbar-brand" href="../home/index.php">DAW Eventos</a>
  <div class="form-inline col-10">
    <form class="col-6" action="../home/index.php" method="post">
      <input class="form-control w-100" type="text" placeholder="Pesquisar" name="pesquisa">
    </form>
    <form action="../home/logIn.php" method="post" class="col-6">
        <input class="form-control offset-2 col-3" type="text" placeholder="Login" name="login">
        <input class="form-control col-3" type="password" placeholder="Password" name="password">
        <button class="btn btn-warning col-2" type="submit">Log in</button>
    </form>
  </div>
</nav>
<?php
    endif;
  }
?>
