
$banco =  new Banco();

$resposta=$banco->executa_query_array("INSERT INTO depoimentos(nome, email, depoimento) VALUES (:nome, :email, :depoimento)",
   array(
     ":nome" => "Gustavo Leão Nogueira de Oliveira",
     ":email" => "gus.leaono@gmail.com",
     ":depoimento" => "Gostei muito da empresa. Me ajudou muito, fizeram a minha casa."
   )
);

$resposta=$banco->executa_query_array("UPDATE depoimentos SET email = :email WHERE id = :id",
   array(
     ":email" => "gustavo.leao.nogueira.2017@gmail.com",
     ":id" => 1
   )
);

$resposta=$banco->executa_query_parametro("DELETE FROM depoimentos WHERE id = :id",1);


$resposta=$banco->executa_query("SELECT * FROM depoimentos");
