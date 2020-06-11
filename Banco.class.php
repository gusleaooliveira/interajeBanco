<?php

class Banco {
  private $host;
  private $banco;
  private $usuario;
  private $senha;
  private $conexao;

  function __construct($host="localhost", $banco="api_mrconstrucoes", $usuario="root", $senha=""){
    $this->host = $host;
    $this->banco = $banco;
    $this->usuario = $usuario;
    $this->senha = $senha;

    $this->conectar();
  }

  function conectar(){
    try{
      $this->conexao =  new PDO("mysql:host=$this->host;dbname=$this->banco", $this->usuario, $this->senha);
      echo "<p><strong>Conectado!</strong></p>";
    }catch(PDOException $erro){
      echo "<p><strong>Mensagem de erro:</strong>".$erro->getMessage()."</p>";
    }
  }

  function executa_query_array($sql, $array_de_dados){
    try{
      $stmt = $this->conexao->prepare($sql);
      $stmt->execute($array_de_dados);
      echo "<p><strong>Executado!</strong></p>";
      return $stmt->rowCount();
    }catch(PDOException $erro){
      echo "<p><strong>Mensagem de erro:</strong>".$erro->getMessage()."</p>";
      return null;
    }
  }
  function executa_query_parametro($sql, $parametro){
    try{
      $stmt = $this->conexao->prepare($sql);
      $stmt->bindParam(":id", $parametro);
      $stmt->execute();
      echo "<p><strong>Executado!</strong></p>";
      return $stmt->rowCount();
    }catch(PDOException $erro){
      echo "<p><strong>Mensagem de erro:</strong>".$erro->getMessage()."</p>";
      return null;
    }
  }
  function executa_query($sql){
    try{
      $stmt = $this->conexao->query($sql);
      echo "<p><strong>Executado!</strong></p>";
      return $stmt;
    }catch(PDOException $erro){
      echo "<p><strong>Mensagem de erro:</strong>".$erro->getMessage()."</p>";
      return null;
    }
  }

}




?>
