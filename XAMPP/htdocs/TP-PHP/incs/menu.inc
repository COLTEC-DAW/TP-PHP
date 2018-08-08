<?php
  function setMenu($userType) {
    if($userType == "admin") :
?>
<nav class="navbar navbar-dark bg-dark" >
  <a class="navbar-brand" href="principal.php">DAW Eventos</a>
  <input class="form-control col-6 mr-sm-2" type="text" placeholder="Pesquisar" name="pesquisa">
  <form class="form-group" action="carrinho.php" method="post">

      <button type="submit" class="btn btn-light">Carrinho</button>
  </form>
  <form class="form-group" action="addEvento.php" method="post">

      <button type="submit" class="btn btn-light">Adicionar Evento</button>
  </form>
  <form class="form-group" action="logout.php" method="post">
    <button type="submit" class="btn btn-danger">Log Out</button>
  </form>
</nav>
  <?php $_SESSION["user"] = "admin" ?>
<?php elseif($userType == "user") : ?>
  <nav class="navbar navbar-dark bg-dark" >
    <a class="navbar-brand" href="principal.php">DAW Eventos</a>
    <input class="form-control col-6 mr-sm-2" type="text" placeholder="Pesquisar" name="pesquisa">
    <form class="form-group" action="carrinho.php" method="post">

        <button type="submit" class="btn btn-light">Carrinho</button>
    </form>
    <form class="form-group" action="logout.php" method="post">
      <button type="submit" class="btn btn-danger">Log Out</button>
    </form>
  </nav>
  <?php $_SESSION["user"] = "user" ?>
<?php else : ?>
  <nav class="navbar navbar-dark bg-dark" >
    <a class="navbar-brand" href="principal.php">DAW Eventos</a>
    <form action="../home/logIn.php" method="post" class="form-inline my-2 my-lg-0 col-10">
          <input class="form-control col-6 mr-sm-2" type="text" placeholder="Pesquisar" name="pesquisa">
          <input class="form-control mr-sm-2 col-2" type="text" placeholder="Login" name="login">
          <input class="form-control mr-sm-2 col-2" type="password" placeholder="Password" name="password">
          <button class="btn btn-warning my-2 my-sm-0" type="submit">Log in</button>
   </form>
  </nav>
<?php
    endif;
  }
?>
