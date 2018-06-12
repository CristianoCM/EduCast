<?php
  include "connect.php";

  $page = $_REQUEST["page"];
  $partir = $page * 5;

  $sql = "SELECT codigo, titulo, descricao, caminho, formato, tamanho, duracao, miniatura FROM Video WHERE codigo IN (SELECT videoId FROM Visualizados GROUP BY videoId ORDER BY COUNT(*) DESC) LIMIT 5 OFFSET " . $partir;
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {

      $sql_autores = "SELECT codigo, nome FROM Autor WHERE videoId = " . $row["codigo"];
      $result_autores = $conn->query($sql_autores);

      $autores = "";
      if ($result_autores->num_rows > 0) {
        while($row_autores = $result_autores->fetch_assoc()) {
          $autores .= $row_autores["nome"] . ",";
        }
        $autores[strlen($autores) - 1] = "";
      }

      $sql_tags = "SELECT codigo, nome FROM Genero WHERE videoId = " . $row["codigo"];
      $result_tags = $conn->query($sql_tags);

      $tags = "";
      if ($result_tags->num_rows > 0) {
        while($row_tags = $result_tags->fetch_assoc()) {
          $tags .= $row_tags["nome"] . "|";
        }
        $tags[strlen($tags) - 1] = "";
      }

      echo "¬" . $row["codigo"] . "¬" . $row["titulo"] . "¬" . $row["descricao"] . "¬" . $row["duracao"] . "¬" . $row["miniatura"] . "¬" . $row["caminho"] . "¬" . $autores . "¬" . $tags;
     }
  } else {
     echo " NOPS ";
  }
  $conn->close();
?>
