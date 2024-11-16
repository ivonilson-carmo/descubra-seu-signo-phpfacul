<?php include("header.php"); ?>

<?php
date_default_timezone_set('America/Sao_Paulo');

$data_nascimento = DateTime::createFromFormat("d/m/Y", $_POST["data_nascimento"]);
$signos = simplexml_load_file("signos.xml");

if ($data_nascimento) {
    $formattedDate = $data_nascimento->format('d/m'); 

    foreach($signos -> signo as $signo){
        $anoAtual = date("Y");
        $dataInicio = $signo -> dataInicio;
        $dataFim = $signo -> dataFim;
    
        $data_inicio_corrigida = DateTime::createFromFormat("d/m/Y", $dataInicio."/".$anoAtual);
        $data_fim_corrigida = DateTime::createFromFormat("d/m/Y", $dataFim."/".$anoAtual);
        $data_nascimento_corrigida = DateTime::createFromFormat("d/m/Y", $formattedDate."/".$anoAtual);

        // Caso o intervalo cruze o ano, ajustar o ano de "inicio"
        if ($data_fim_corrigida < $data_inicio_corrigida) {
            $data_inicio_corrigida = DateTime::createFromFormat("d/m/Y", $dataInicio."/".$anoAtual-1);
        }
        
        if ($data_nascimento_corrigida >= $data_inicio_corrigida && $data_nascimento_corrigida <= $data_fim_corrigida){
            $signo_encontrado = $signo->nomeSigno;
            $periodo = $signo->periodo;
            $descricao = $signo -> descricao;
            break;
            
        }
    }
} 

?>


<body class="d-flex flex-column justify-content-center">
        <?php
        if ($data_nascimento){
            echo "<main class='container-sm card p-2 shadow rounded w-50 text-center'>";
            echo "<h2 class='text-center mb-4 fs-1 text-uppercase'> ".$signo_encontrado." </h2>";
            echo "<p class='text-center fs-2 my-5'> Nascido entre ".$periodo." </p>";
            echo "<p class='text-center fw-light'> ".$descricao." </p>";
            echo "</main>";
        }else{
            echo "<div class='alert alert-danger container-sm text-center ' role='alert'>";
            echo "<h4 class='my-2 alert-heading'> Erro ao tentar identificar seu signo </h4>";
            echo "<hr/>";
            echo "<p  class='mb-0'> <a href='../index.php' class='alert-link'>Clique Aqui</a> e vamos tentar Novamente </p>";
            echo "</div>";
        }
        ?>
    
</body>
</html>