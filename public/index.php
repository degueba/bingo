<?php

set_include_path(
    get_include_path() . PATH_SEPARATOR .
    __DIR__ . '/../'
);

function __autoload($classe){

    include_once $classe . '.php';
}



?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="jquery-ui/external/jquery/jquery.js" type="text/javascript"></script>
        <script src="jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
        <link href="jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <h1 class="text-center">SisBingo</h1>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Adicionar jogador</h2>
                    <form method="POST" action="adicionarJogador.html">
                        <input type="text" name="jogador">
                        <input type="submit" value="adicionar">
                    </form>
                </div>
            </div>
        </div>


        <div class="col-sm-4">
            JOGOS
            <table class="table table-bordered">


                <?php

                $cartela = new persistence\NumeroCartelaDao();
                $cartelas = array();
                $currency = 0;
                $linha = 1;
                $e = 0;
                foreach($cartela->getAllCartela() as $c){
                    /*echo $c->getIdCartela();*/

                        $currency = $c->getIdCartela();
                        for($e=0; $e<5; $e++){
                            $cartelas[$currency][$linha] = array('posicaoh'=>$c->getPosicaoHorizontal(),'posicaov'=>$c->getPosicaoVertical(), 'nume'=>$c->getNumero(),'marcado'=>$c->getMarcado());
                        }
                        $linha++;
                        if($linha > 5){
                            $linha = 1;
                        }


                }

                echo "<pre>";
                print_r($cartelas);

                for($i=0; $i<5;$i++): ?>

                    <!--
                    <tr>
                        <?php for($v=0; $v<5; $v++): ?>
                            <td><?php echo $numeracao[$v] ?></td>
                        <?php endfor; ?>
                    </tr -->

                <?php endfor; ?>

            </table>
        </div>
    </body>
</html>


<!---


  <?php

                    $numeracao = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25);



                    shuffle($numeracao);

                ?>

                <?php for($i=0; $i<5;$i++): ?>

                    <tr>
                        <?php for($v=0; $v<5; $v++): ?>
                            <td><?php echo $numeracao[$v] ?></td>
                        <?php endfor; ?>
                    </tr>

                <?php endfor; ?>
                -->