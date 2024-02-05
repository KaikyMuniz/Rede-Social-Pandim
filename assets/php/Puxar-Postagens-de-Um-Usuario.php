<?php
    function PuxarDados($mysqli, $nome_usuario){
        $sql_codigo = "SELECT autor, titulo, descricao, imagem_postagem, DATE_FORMAT(data_da_postagem, '%d/%m/%Y') AS data_formatada FROM postagens WHERE autor= '$nome_usuario' ORDER BY id DESC";
        $resultado = $mysqli->query($sql_codigo);
        return $resultado;
    }
    function PuxarPostagens($mysqli, $resultado){
        if($resultado->num_rows > 0){
            while($row = $resultado->fetch_assoc()){
                $nome = $row["autor"];
                $titulo = $row["titulo"];
                $descricao = $row["descricao"];
                $imagem_postagem = $row["imagem_postagem"];
                $data_postagem = $row["data_formatada"];

                $sql_codigo_autor = "SELECT path FROM imagem_perfil WHERE nome_usuario = '$nome'";
                $resultado_imagem_perfil = $mysqli->query($sql_codigo_autor);
                
                if ($resultado_imagem_perfil) {
                    $row = $resultado_imagem_perfil->fetch_assoc();
                    $imagem_perfil = $row['path'];
                } else {
                    echo "Erro na consulta: " . $mysqli->error;
                }

                echo 
                "<div class='postagem'>
                    <a href='assets/pages/perfil.php?perfil=$nome'><span class='postagem-organizacao'>
                        <img class='perfil-imagem' src='$imagem_perfil' alt='Pessoa-Imagem'>
                        <div class='organizar-data'>
                            <label>$nome</label>
                            <br>
                            <label>$data_postagem</label>
                        </div>
                    </span></a>
                        <div class='postagem-imagem'>
                            <h3>$titulo</h3>
                            <p>
                                $descricao
                            </p>
                            <img class='postagem-imagem-img' src='$imagem_postagem' alt='Postagem-Imagem'>
                            <br>
                            <span class='interacoes-postagens'>
                                <img id='like' class='like-imagem' src='../image/icon/like.png' alt='like'>
                                <img id='deslike' class='deslike-imagem' src='../image/icon/deslike.png' alt='deslike'>
                                <img id='comentario' class='comentario-imagem' src='../image/icon/comentario.png' alt='comentario'>
                                <img id='denuncia' class='denuncia-imagem' src='../image/icon/denunciar.png' alt='denunciar'>
                            </span>
                        </div>
                </div>
                <p></p>";
            }
        }
    }
?>