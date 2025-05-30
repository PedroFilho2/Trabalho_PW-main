<?php
include_once("../config/database/database.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $imagem = $_POST['imagem'];
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $data_criacao = $_POST['data_criacao'];

    $sql = "UPDATE alunos SET imagem='$imagem', titulo='$titulo', descricao='$descricao', data_criacao='$data_criacao' WHERE id = ".$_GET['id'];

    $con->query($sql);
    header("Location: ../index.php");
    exit();

}

$sql ="SELECT * FROM alunos WHERE id = ".$_GET['id'];
$rows = $con->query($sql);
  if($rows->num_rows > 0){
      $row = $rows->fetch_assoc();
      $imagem = $row['imagem'];
      $titulo = $row['titulo'];
      $descricao = $row['descricao'];
      $data_criacao = $row['data_criacao'];
  }
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<form method="POST">
    <div class="container" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar notícia</h1>
      </div>
      <div class="modal-body">
      <div class="mb-3 form-floating">
        <input name="imagem" type="url" value="<?=$imagem?>" class="form-control" id="exampleFormControlInput1" placeholder="" value="" required>
        <label for="exampleFormControlInput1">Imagem</label>
      </div>
      <div class="mb-3 form-floating">
        <input name="titulo" type="text" value="<?=$titulo?>" class="form-control" id="exampleFormControlInput2" placeholder="" value="" required>
        <label for="exampleFormControlInput2">Titulo</label>
      </div>
      <div class="mb-3 form-floating">
        <input name="descricao" type=text value="<?=$descricao?>" class="form-control" id="exampleFormControlInput3" placeholder="" value="" required>
        <label for="exampleFormControlInput3">Descrição</label>
      </div>
      <div class="mb-3 form-floating">
        <input name="data_criacao"  value="<?= Date($data_criacao);?>" type="date" class="form-control" id="exampleFormControlInput3" placeholder=""required>
        <label for="exampleFormControlInput3">Dat</label>
      </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">
          <i class="bi bi-person-badge"></i>
          Salvar notícia
        </button>
      </div>
    </div>
  </div>
</div>
</form>