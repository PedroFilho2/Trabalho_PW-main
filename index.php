<?php 
  include_once("./config/database/database.php");
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Feed de Notícias</title>

  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">

 
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  
</head>

<body class="container">
  <h1 class="text-center py-4">FEED de notícias</h1>

  <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="bi bi-plus-circle"></i> Adicionar nova notícia
  </button>

 
    </thead>
    <tbody>
    <div class="row">
  <?php
    $sql = "SELECT * FROM alunos ORDER BY id DESC";
    $rows = $con->query($sql);
    if ($rows->num_rows > 0) {
      while ($row = $rows->fetch_assoc()) {
        echo '
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="bg-white rounded-3 border border-light shadow-sm h-100 d-flex flex-column">
              <img src="' . ($row['imagem']) . '" 
                   alt="' . ($row['titulo']) . '" 
                   class="img-fluid rounded-top" 
                   style="height: 200px; object-fit: cover; width: 100%;">

              <div class="p-3 d-flex flex-column flex-grow-1">
                <h2 class="h5 fw-bold">' . ($row['titulo']) . '</h2>
                <p class="text-secondary">' . ($row['descricao']) . '</p>
                <p class="text-muted small mt-auto">' . date('Y-m-d', strtotime($row['data_criacao'])) . '</p>
                <div class="mt-2 d-flex gap-2">
                  <a class="btn btn-danger btn-sm" href="actions/deletar.php?id=' . $row['id'] . '"><i class="bi bi-trash"></i></a>
                  <a class="btn btn-primary btn-sm" href="actions/editar.php?id=' . $row['id'] . '"><i class="bi bi-pencil"></i></a>
                </div>
              </div>
            </div>
          </div>
        ';
      }
    }
  ?>
</div>

    </tbody>
  </table>

  <form method="POST" action="actions/salvar.php">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Nova Notícia</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
          <label>Imagem (URL)</label>
            <div class="form mb-3">
              <input name="imagem" type="text" class="form-control" placeholder="URL da imagem" required>
            </div>
            <label>Título</label>
            <div class="form mb-3">
              <input name="titulo" type="text" class="form-control" placeholder="Título da notícia" required>
              
            </div>
            <label>Descrição</label>
            <div class="form mb-3">
              <input name="descricao" type="text" class="form-control" placeholder="Descrição" required>
              
            </div>
            <label>Data</label>
            <div class="form mb-3">
              <input name="data_criacao" type="date" class="form-control" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </div>
      </div>

    </div>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
