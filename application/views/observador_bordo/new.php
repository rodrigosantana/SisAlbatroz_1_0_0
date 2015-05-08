
<!-- Início do corpo da página -->

<?php if ($mensagem): ?>    
    <div class="col-md-4 col-md-offset-4 alert alert-success alert-dismissible" role="alert" style="margin-top: 20px">
        <button type="button" class="close" data-dismiss="alert" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
        <p><strong>Sucesso!</strong><p> 
            Registro salvo com sucesso.
    </div>  
<?php endif; ?>

<div class="row">
    <div class="col-md-12">
        <h2 class="text-left titulo">Observador de Bordo</h2>
    </div>
</div>

<form class="form-horizontal" role="form" action="<?php echo site_url('observadorbordo/salva'); ?>" method="post">
    <input type="hidden" id="id" name="id" value="<?php echo $cruzeiro->getId()  ?>">

    <div class="panel panel-sisalbatroz">
        <div class="panel-heading"><span><b>Cadastro de viagens</b></span></div>    
        <div class="panel-body">

            <ul class="nav nav-tabs">
                <li class="active"><a href="#cruzeiro" data-toggle="tab">Cruzeiro</a></li>                
                <li><a href="#dados_abioticos" data-toggle="tab">Dados Abióticos</a></li>
                <li><a href="#contagem_por_sol" data-toggle="tab">Contagem do Por-do-sol</a></li>
                <li><a href="#captura_incidental" data-toggle="tab">Captura Incidental</a></li>
                <li><a href="#contagem_ave_boia" data-toggle="tab">Aves Bóia-rádio</a></li>
                <li><a href="#producao_pesqueira" data-toggle="tab">Produção Pesqueira</a></li>
            </ul>
            <?php // $cruzeiro = new Cruzeiro()?>
            <div class="tab-content" style="margin-top: 20px;">
                <div id="cruzeiro" class="tab-pane active">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="observador" class="col-md-4 control-label">Observador *</label>
                                        <div class="col-md-8 div-help">
                                            <select class="select2" style="width: 100%" id="observador" name="observador">
                                                <option></option>
                                                <?php foreach ($observadores as $observador): ?>
                                                    <?php $selected = (!is_null($cruzeiro->getObservador()) && $cruzeiro->getObservador()->getIdObserv() == $observador->getIdObserv()) ? 'selected' : ''?>
                                                    <option value="<?php echo $observador->getIdObserv() ?>" <?php echo $selected?>><?php echo $observador->getNome() ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="embarcacao" class="col-md-4 control-label">Embarcação *</label>
                                        <div class="col-md-8 div-help">
                                            <select class="select2" style="width: 100%" id="embarcacao" name="embarcacao">
                                                <option></option>
                                                <?php foreach ($embarcacoes as $embarcacao): ?>
                                                    <?php $selected = (!is_null($cruzeiro->getEmbarcacao()) && $cruzeiro->getEmbarcacao()->getIdEmbarcacao() == $embarcacao->getIdEmbarcacao()) ? 'selected' : ''?>
                                                    <option value="<?php echo $embarcacao->getIdEmbarcacao() ?>" <?php echo $selected?>><?php echo $embarcacao->getNome() ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="mestre" class="col-md-4 control-label">Nome do mestre</label>
                                        <div class="col-md-8 div-help">
                                            <select class="select2" style="width: 100%" id="mestre" name="mestre">
                                                <option></option>
                                                <?php foreach ($mestres as $mestre): ?>
                                                    <?php $selected = (!is_null($cruzeiro->getMestre()) && $cruzeiro->getMestre()->getIdMestre() == $mestre->getIdMestre()) ? 'selected' : ''?>
                                                    <option value="<?php echo $mestre->getIdMestre() ?>" <?php echo $selected?>><?php echo $mestre->getNome() ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="empresa" class="col-md-4 control-label">Empresa</label>
                                        <div class="col-md-8 div-help">
                                            <select class="select2" style="width: 100%" id="empresa" name="empresa">
                                                <option></option>
                                                <?php foreach ($empresas as $empresa): ?>
                                                    <?php $selected = (!is_null($cruzeiro->getEmpresa()) && $cruzeiro->getEmpresa()->getIdEmpresa() == $empresa->getIdEmpresa()) ? 'selected' : ''?>
                                                    <option value="<?php echo $empresa->getIdEmpresa() ?>" <?php echo $selected?>><?php echo $empresa->getNome() ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="financiador" class="col-md-4 control-label">Financiador</label>
                                        <div class="col-md-8 div-help">
                                            <select class="select2" style="width: 100%" id="financiador" name="financiador">
                                                <option></option>
                                                <?php foreach ($financiadores as $financiador): ?>
                                                    <?php $selected = (!is_null($cruzeiro->getFinanciador()) && $cruzeiro->getFinanciador()->getId() == $financiador->getId()) ? 'selected' : ''?>
                                                    <option value="<?php echo $financiador->getId() ?>" <?php echo $selected?>><?php echo $financiador->getNome() ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="data_saida" class="col-md-4 control-label">Data de saída</label>
                                        <div class="col-md-8 div-help">
                                            <input type="date" class="form-control" id="data_saida" name="data_saida" value="<?php echo is_null($cruzeiro->getDataSaida()) ? '' : $cruzeiro->getDataSaida()->format("Y-m-d") ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="data_chegada" class="col-md-4 control-label">Data de retorno</label>
                                        <div class="col-md-8 div-help">
                                            <input type="date" class="form-control" id="data_chegada" name="data_chegada" value="<?php echo is_null($cruzeiro->getDataChegada()) ? '' : $cruzeiro->getDataChegada()->format("Y-m-d") ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="observacao" class="col-md-4 control-label">Observações</label>
                                        <div class="col-md-8 div-help">
                                            <textarea class="form-control" id="observacao" name="observacao"><?php echo $cruzeiro->getObservacao() ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                
                <div id="dados_abioticos" class="tab-pane">
                    <div id="dado_abiotico_container" data-prototype="<?php echo htmlspecialchars($this->load->view("observador_bordo/dado_abiotico", array('dadoAbiotico' => new DadosAbioticos(new DadosAbioticosLancamento(), new DadosAbioticosRecolhimento())), true)); ?>">
                        <?php
                        $lista = $cruzeiro->getDadosAbioticos();

                        foreach ($lista as $key => $value) {
                            echo $this->load->view("observador_bordo/dado_abiotico", array('dadoAbiotico' => $value, 'index' => $key), true);
                        }
                        ?>
                    </div>

                    <a href="javascrit:;" class="btn btn-success" id="add_dado_abiotico" style="margin-top: 10px"><i class="glyphicon glyphicon-plus"></i> Adicionar dado abiótico</a>
                </div>
                
                <div id="contagem_por_sol" class="tab-pane">
                    <div id="contagem_por_sol_container" data-prototype="<?php echo htmlspecialchars($this->load->view("observador_bordo/contagem_por_sol", array('contagemPorSol' => new ContagemPorSol(), 'aves'=>$aves), true)); ?>">
                        <?php
                        $lista = $cruzeiro->getContagemPorSol();

                        foreach ($lista as $key => $value) {
                            echo $this->load->view("observador_bordo/contagem_por_sol", array('contagemPorSol' => $value, 'indexContagemPorSol' => $key, 'aves'=>$aves), true);
                        }
                        ?>
                    </div>

                    <a href="javascrit:;" class="btn btn-success" id="add_contagem_por_sol" style="margin-top: 10px"><i class="glyphicon glyphicon-plus"></i> Adicionar contagem</a>
                </div>
                
                <div id="captura_incidental" class="tab-pane">
                    <div id="captura_incidental_container" data-prototype="<?php echo htmlspecialchars($this->load->view("observador_bordo/captura_incidental", array('capturaIncidental' => new CapturaIncidental(), 'aves'=>$aves), true)); ?>">
                        <?php
                        $lista = $cruzeiro->getCapturaIncidental();

                        foreach ($lista as $key => $value) {
                            echo $this->load->view("observador_bordo/captura_incidental", array('capturaIncidental' => $value, 'indexCapturaIncidental' => $key, 'aves'=>$aves), true);
                        }
                        ?>
                    </div>

                    <a href="javascrit:;" class="btn btn-success" id="add_captura_incidental" style="margin-top: 10px"><i class="glyphicon glyphicon-plus"></i> Adicionar captura incidental</a>
                </div>                
                
                <div id="contagem_ave_boia" class="tab-pane">
                    <div id="contagem_ave_boia_container" data-prototype="<?php echo htmlspecialchars($this->load->view("observador_bordo/contagem_ave_boia", array('contagemAveBoia' => new ContagemAveBoia(), 'aves'=>$aves), true)); ?>">
                        <?php
                        $lista = $cruzeiro->getContagemAveBoia();

                        foreach ($lista as $key => $value) {
                            echo $this->load->view("observador_bordo/contagem_ave_boia", array('contagemAveBoia' => $value, 'indexContagemAveBoia' => $key, 'aves'=>$aves), true);
                        }
                        ?>
                    </div>

                    <a href="javascrit:;" class="btn btn-success" id="add_contagem_ave_boia" style="margin-top: 10px"><i class="glyphicon glyphicon-plus"></i> Adicionar ave boia-rádio</a>
                </div>
                               
                <div id="producao_pesqueira" class="tab-pane">
                    <div id="producao_pesqueira_container" data-prototype="<?php echo htmlspecialchars($this->load->view("observador_bordo/producao_pesqueira", array('producaoPesqueira' => new ProducaoPesqueira(), 'especies' => $especies), true)); ?>">
                        <?php
                        $lista = $cruzeiro->getProducoesPesqueiras();

                        foreach ($lista as $key => $value) {
                            echo $this->load->view("observador_bordo/producao_pesqueira", array('producaoPesqueira' => $value, 'indexProducaoPesqueira' => $key, 'especies' => $especies), true);
                        }
                        ?>
                    </div>

                    <a href="javascrit:;" class="btn btn-success" id="add_producao_pesqueira" style="margin-top: 10px"><i class="glyphicon glyphicon-plus"></i> Adicionar produção</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-sm-12 col-md-12" style="margin-bottom: 20px">
        <button type="button" id="btnSub" name="btnSub" class="btn btn-primary btn-lg btn_sub" onclick="return validation('observadorbordo', this)">Salvar</button>
        <a href="<?php echo site_url('observadorbordo')?>" class="btn btn-default btn-lg btn_sub">Cancelar</a>
    </div>
</form>


<script>
    $(document).ready(function() {
        var dadoAbiotico= new Prototype.Class({
            'count': <?php echo $cruzeiro->getDadosAbioticos()->count() ?>,
            'list': '#dado_abiotico_container',
            'addButton': '#add_dado_abiotico',
            'removeButton': '#remove-dado-abiotico',
            'container': '.dado-abiotico',
            'addOne': <?php echo $cruzeiro->getDadosAbioticos()->count() > 0 ? 'false' : 'true' ?>,
            'isEdit': <?php echo $cruzeiro->getDadosAbioticos()->count() > 0 ? 'true' : 'false' ?>
        });
        
        var contagemPorSol= new Prototype.Class({
            'count': <?php echo $cruzeiro->getContagemPorSol()->count() ?>,
            'list': '#contagem_por_sol_container',
            'addButton': '#add_contagem_por_sol',
            'removeButton': '#remove-contagem-por-sol',
            'container': '.contagem-por-sol',
            'addOne': <?php echo $cruzeiro->getContagemPorSol()->count() > 0 ? 'false' : 'true' ?>,
            'isEdit': <?php echo $cruzeiro->getContagemPorSol()->count() > 0 ? 'true' : 'false' ?>
        });
        
        var capturaIncidental= new Prototype.Class({
            'count': <?php echo $cruzeiro->getCapturaIncidental()->count() ?>,
            'list': '#captura_incidental_container',
            'addButton': '#add_captura_incidental',
            'removeButton': '#remove-captura-incidental',
            'container': '.captura-incidental',
            'addOne': <?php echo $cruzeiro->getCapturaIncidental()->count() > 0 ? 'false' : 'true' ?>,
            'isEdit': <?php echo $cruzeiro->getCapturaIncidental()->count() > 0 ? 'true' : 'false' ?>
        });
        
        var contagemAveBoia= new Prototype.Class({
            'count': <?php echo $cruzeiro->getContagemAveBoia()->count() ?>,
            'list': '#contagem_ave_boia_container',
            'addButton': '#add_contagem_ave_boia',
            'removeButton': '#remove-contagem-ave-boia',
            'container': '.contagem-ave-boia',
            'addOne': <?php echo $cruzeiro->getContagemAveBoia()->count() > 0 ? 'false' : 'true' ?>,
            'isEdit': <?php echo $cruzeiro->getContagemAveBoia()->count() > 0 ? 'true' : 'false' ?>
        });
        
        var producaoPesqueira = new Prototype.Class({
            'count': <?php echo $cruzeiro->getProducoesPesqueiras()->count() ?>,
            'list': '#producao_pesqueira_container',
            'addButton': '#add_producao_pesqueira',
            'removeButton': '#remove-producao-pesqueira',
            'container': '.producao-pesqueira',
            'addOne': <?php echo $cruzeiro->getProducoesPesqueiras()->count() > 0 ? 'false' : 'true' ?>,
            'isEdit': <?php echo $cruzeiro->getProducoesPesqueiras()->count() > 0 ? 'true' : 'false' ?>
        });
        
        
        
        $("#observador").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado";
            }
        });
        
        $("#embarcacao").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado";
            }
        });
        
        $("#mestre").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado";
            }
        });
        
        $("#empresa").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado";
            }
        });
        
        $("#financiador").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado";
            }
        });

    });
</script>