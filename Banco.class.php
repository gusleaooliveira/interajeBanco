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

  function executar_sql($sql, $array_de_dados){
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
  function executar($sql, $parametro){
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
  function executa($sql){
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

// $banco =  new Banco();

// var_dump($banco->executar_sql("INSERT INTO depoimentos(nome, email, depoimento) VALUES (:nome, :email, :depoimento)",
//   array(
//     ":nome" => "Sônia Leão Nogueira",
//     ":email" => "sonia_leao69@gmail.com",
//     ":depoimento" => "Minha casa foi reformada pela empresa, fizeram um ótimo trabalho."
//   )
// ));
//
// var_dump($banco->executar_sql("INSERT INTO depoimentos(nome, email, depoimento) VALUES (:nome, :email, :depoimento)",
//   array(
//     ":nome" => "Gustavo Leão Nogueira de Oliveira",
//     ":email" => "gus.leaono@gmail.com",
//     ":depoimento" => "Gostei muito da empresa. Me ajudou muito, fizeram a minha casa."
//   )
// ));

// var_dump($banco->executar_sql("UPDATE depoimentos SET email = :email WHERE id = :id",
//   array(
//     ":email" => "gustavo.leao.nogueira.2017@gmail.com",
//     ":id" => 1
//   )
// ));

// var_dump($banco->executar("DELETE FROM depoimentos WHERE id = :id",1));


//var_dump($resp=$banco->executa("SELECT * FROM depoimentos"));



?>
