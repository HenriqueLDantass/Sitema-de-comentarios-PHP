<?php 
include ("config.php");

if(isset($_POST['nome']) && empty($_POST['nome']) == false){
    $nome = $_POST['nome'];
    $mensagem = $_POST['mensagem'];

    if($nome && $mensagem ){
        $sql = $pdo ->prepare("INSERT INTO mensagem SET nome = :nome, msg = :msg");
        $sql->bindValue(":nome",$nome);
        $sql->bindValue(":msg", $mensagem);
        $sql->execute();
    }else{
        echo "Algum campo vazio !";
    }
}

?>
<fieldset>
<form action="" method="POST">
    Nome: <br><br>
    <input type="text" name="nome"> <br><br>
    Mensagem: <br><br>
    <textarea name="mensagem" cols="30" rows="10"></textarea><br><br>
    <input type="submit" value="Enviar mensagem">
</form>
<hr>
</fieldset>
<?php
$sql = $pdo ->query("SELECT * FROM mensagem");
if($sql ->rowCount() > 0){
   foreach($sql->fetchAll() as $mensagem):?>
    <strong><?php echo $mensagem['nome'] ?></strong>
    <p><?php echo $mensagem['msg'] ?></p>
    <hr>
    <?php
    endforeach;
}else {
    echo "Não há mensagens";
}

?>

