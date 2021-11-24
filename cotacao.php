<?php
    /*
     * Obtendo os dados HG Finance
     *
     * Consulte nossa documentacao em https://console.hgbrasil.com/documentation/finance
     * Contato: https://console.hgbrasil.com/tickets
     *
     * Ontenha uma chave gratuitamente: https://console.hgbrasil.com/keys
     *
     * Copyright 2018 - HG Brasil - HG Finance
     *
    */
    
    include 'hg_finance.php';
    
    // Primeiro parametro do construtor recebe a chave da API
    $HGFinance = new HGFinance('179abb40');
    
    // Voce pode configurar via metodos
    // $HGFinance->set_key('SUA-CHAVE');
    // $HGFinance->set_locale('en');
    // $HGFinance->set_use_ssl(true);
    
    // Metodo para obter os todos dados
    $finance = $HGFinance->get();
    
    // Voce pode acessar qualquer endpoint da API
    // $HGFinance->get('currencies');
    // $HGFinance->get('taxes');
    // $HGFinance->get('historical', array('start_date' => '2018-12-20', 'end_date' => '2018-12-24'));
    
    // Verificando a autenticacao da chave
    //if($HGFinance->valid_key()){
      //echo 'CHAVE VALIDA';
    //} else {
      //echo 'CHAVE INVALIDA';
    //}

    //Debug
    // Retorno dos resultados da API
    //pr($HGFinance->data);
?>    
<section class="cotacao-api">
    <div class="cotacao-moedas d-flex flex-wrap">
        <div class="cotacao-single">
          <h3>Dólar: R$ <?php echo number_format($finance['currencies']['USD']['buy'], 2, ',' , '.'); ?>
          <span class="variacao" style="background-color: 
            <?php echo $finance['currencies']['USD']['variation'] >= 0 ? 'green' : 'red'?>;">
            <small><?php echo 'R$' . number_format($finance['currencies']['USD']['variation'], 2, ',' , '.'); ?></small>
          </span><!--variacao-->
          </h3>
        </div><!--cotacao-single-->

        <div class="cotacao-single">
          <h3>Euro: R$ <?php echo number_format($finance['currencies']['EUR']['buy'], 2, ',' , '.'); ?>
          <span class="variacao" style="background-color: 
            <?php echo $finance['currencies']['EUR']['variation'] >= 0 ? 'green' : 'red'?>;">
            <small><?php echo 'R$' . number_format($finance['currencies']['EUR']['variation'], 2, ',' , '.'); ?></small>
          </span><!--variacao-->
          </h3>
        </div><!--cotacao-single-->

        <div class="cotacao-single">
          <h3>Mercado Bitcoin: R$ <?php echo number_format($finance['bitcoin']['mercadobitcoin']['buy'], 2, ',' , '.'); ?>
            <span class="variacao" style=" 
              <?php if($finance['bitcoin']['mercadobitcoin']['variation'] >= 0){
                      echo 'background:green;color:#fff;';
                    }else{
                    echo 'background:red;';
                    }
              ?>;">
              <small><?php echo $finance['bitcoin']['mercadobitcoin']['variation'] ?></small>
            </span>
          </h3>
        </div><!--cotacao-single-->

        <div class="cotacao-single">
          <h3>IBOVESPA: Points(<?php echo number_format($finance['stocks']['IBOVESPA']['points'], 2, ',' , '.'); ?>)
            <span class="variacao" style=" 
              <?php if($finance['stocks']['IBOVESPA']['variation'] >= 0){
                      echo 'background:green;color:#fff;';
                    }else{
                    echo 'background:red;';
                    }
              ?>;">
              <small><?php echo $finance['stocks']['IBOVESPA']['variation'] ?></small>
            </span>
          </h3>
        </div><!--cotacao-single-->
    </div><!--cotacao-moedas-->
    
</section><!--cotacao-api-->