<?php
  include "connect.php";

  $page = $_REQUEST["page"];
  $partir = $page * 5;

  $sql = "SELECT codigo, titulo, descricao, caminho, formato, tamanho, duracao, miniatura FROM video LIMIT 5 OFFSET " . $partir;
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {

      $sql_autores = "SELECT codigo, nome FROM Autor WHERE video = " . $row["codigo"];
      $result_autores = $conn->query($sql_autores);

      $autores = "";
      if ($result_autores->num_rows > 0) {
        while($row_autores = $result_autores->fetch_assoc()) {
          $autores .= $row_autores["nome"] . ",";
        }
      }

      $sql_tags = "SELECT codigo, nome FROM Genero WHERE video = " . $row["codigo"];
      $result_tags = $conn->query($sql_tags);

      $tags = "";
      if ($sql_tags->num_rows > 0) {
        while($row_tags = $result_tags->fetch_assoc()) {
          $tags .= $row_tags["nome"] . ",";
        }
      }

      echo " " . $row["codigo"] . " " . $row["titulo"] . " " . $row["descricao"] . " " . $row["duracao"] . " " . $row["miniatura"] . " " . $row["caminho"] . " " . $autores . " " . $tags;
     }
  } else {
     echo " NULL NULL NULL NULL NULL NULL NULL NULL ";
  }
  $conn->close();
?>
