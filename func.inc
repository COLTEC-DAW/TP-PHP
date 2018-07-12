<?php
  function logar(){
    //se o USER  E A SENHA ESTIVEREM CERTO:
    session_start();
  }

  function ErroLogin(){
    //escrever erro no user ou na senha
  }

  function deslogar(){
    session_destroy();
  }


?>
