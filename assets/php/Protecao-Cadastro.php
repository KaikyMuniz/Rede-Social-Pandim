<style>
    *{
        font-family: "Poppins";
    }
</style>
<?php
    try {
        session_start();
    
        $chaves_necessarias = [
            'nome_usuario_cadastro', 
            'data_nascimento_cadastro', 
            'sexo_cadastro', 
            'descricao_cadastro', 
            'email_cadastro', 
            'senha_cadastro'
        ];
    
        foreach ($chaves_necessarias as $chave) {
            if (!isset($_SESSION[$chave])) {
                throw new Exception('Um ou mais campos não foram devidamente preenchidos');
            }
        }
    
        $nome_usuario = $_SESSION['nome_usuario_cadastro'];
        $data_nascimento = $_SESSION['data_nascimento_cadastro'];
        $sexo = $_SESSION['sexo_cadastro'];
        $descricao = $_SESSION['descricao_cadastro'];
        $email = $_SESSION['email_cadastro'];
        $senha_hash = password_hash($_SESSION['senha_cadastro'], PASSWORD_DEFAULT);
        $seguidores = 0;
        $seguindo = 0;
    
        VerificarCadastro($mysqli, $nome_usuario, $data_nascimento, $sexo, 
                          $descricao, $email, $senha_hash, $seguidores, $seguindo);
    
    } catch (Exception $e) {
        echo 'Ocorreu um erro: ' . $e->getMessage() . "<br/>";
        echo "<a href='../pages/cadastro-tela-1.php'>clique aqui para realizar seu cadastro.</a>";
    }
?>