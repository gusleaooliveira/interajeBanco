
```php
$banco =  new Banco();
```

```php
$sql = "INSERT INTO depoimentos(nome, email, depoimento) VALUES (:nome, :email, :depoimento)";
$dados = array(
  ":nome" => "Gustavo Leão Nogueira de Oliveira",
  ":email" => "gus.leaono@gmail.com",
  ":depoimento" => "Gostei muito da empresa. Me ajudou muito, fizeram a minha casa."
);

$resposta=$banco->executa_query_array($sql,$dados);
```

```php
$sql = "UPDATE depoimentos SET email = :email WHERE id = :id";
$dados = array(
  ":email" => "gustavo.leao.nogueira.2017@gmail.com",
  ":id" => 1
);

$resposta=$banco->executa_query_array($sql, $dados);
```

```php
$sql = "DELETE FROM depoimentos WHERE id = :id";
$id = 1;

$resposta=$banco->executa_query_parametro($sql,$id);
```


```php
$sql ="SELECT * FROM depoimentos";

$resposta=$banco->executa_query($sql);


while ($linha = $resposta->fetch(PDO::FETCH_ASSOC)) {
    echo "<p><strong>".$linha['nome'].":</strong>".$linha['email']."</p>";
    echo "<p><strong>Depoimento:</strong>".$linha['depoimento']."</p>";
    echo "<hr/>";
}
```
