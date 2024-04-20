<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['cep'])) {
    $cep = $_GET['cep'];
    if($cep == null){
        echo("<p>Digite um CEP valido</p>");
    }else{
        $url = "https://viacep.com.br/ws/{$cep}/json/";
        $response = file_get_contents($url);
        $data = json_decode($response);
        if ($data && !isset($data->erro)) {
            echo("
                <h2>Dados do CEP: </h2>
                <table>
                <thead>
                    <th>Logradouro</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>IBGE</th>
                    <th>DDD</th>
                    <th>siafi</th>
                </thead>
                <tbody>
                    <tr>
                    <td>{$data->logradouro}</td>
                    <td>{$data->bairro}</td>
                    <td>{$data->localidade}</td>
                    <td>{$data->uf}</td>
                    <td>{$data->ibge}</td>
                    <td>{$data->ddd}</td>
                    <td>{$data->siafi}</td>
                    </tr>
                </tbody>
                </table>
            ");

            if(isset($_SESSION['id_usuario'])){
                $id_usuario = $_SESSION['id_usuario'];
                $email = $_SESSION['email'];
                $nome = $_SESSION['nome'];
                echo("
                    <form action='../actions/salvar_cep.php' method='POST'>
                        <input type='hidden' value='$id_usuario' name='id_usuario' id='id_usuario'>
                        <input type='hidden' value='$cep' name='cep' id='cep'>
                        <input type='hidden' value='$data->logradouro' name='logradouro' id='logradouro'>
                        <input type='hidden' value='$data->bairro' name='bairro' id='bairro'>
                        <input type='hidden' value='$data->localidade' name='localidade' id='localidade'>
                        <input type='hidden' value='$data->uf' name='uf' id='uf'>
                        <input type='hidden' value='$data->ibge' name='ibge' id='ibge'>
                        <input type='hidden' value='$data->ddd' name='ddd' id='ddd'>
                        <input type='hidden' value='$data->siafi' name='siafi' id='siafi'>
                        <button type='submit' class='btn-salvar' name='salvar-cep' id='salvar-cep'>Salvar CEP</button>
                    </form>
                ");
            }else{
                echo("
                    <p>Cadastre-se ou faça login para amarzenar CEP</p>
                ");
            }
        }else{
            echo"<p>CEP não encontrado </p>";
        }
}

}

?>
