                    <div class="container">
                    <!--mini statistics start-->		
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mini-stat clearfix">
                                    <a href="<?php echo DIRPAGE ?>agenda"><span class="mini-stat-icon pink"><i class="far fa-calendar-alt"></i></span></a>
                                    <div class="mini-stat-info">
                                        <span>
                                            <div id="total_agendamentos">
                                                <!-- <?php $agenda     = new App\Model\ClassAgenda();     $agenda->TotalAgendamentos(); ?> -->
                                            </div>
                                        </span> Agendamentos
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mini-stat clearfix">
                                    <a href="<?php echo DIRPAGE ?>cliente"><span class="mini-stat-icon pink"><i class="fas fa-female"></i></span></a>
                                    <div class="mini-stat-info">
                                        <span><div id="total_cli">0</div> </span> Clientes
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <hr/>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mini-stat clearfix">
                                    <a href="<?php echo DIRPAGE ?>colaborador"><span class="mini-stat-icon pink"><i class="fas fa-users"></i></span></a>
                                    <div class="mini-stat-info">
                                        <span><div id="total_colab">0</div> </span> Colaboradores
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mini-stat clearfix">
                                    <span class="mini-stat-icon orange"><i class="fa fa-gavel"></i></span>
                                    <div class="mini-stat-info">
                                        <span>6</span>
                                        Serviços
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mini-stat clearfix">
                                    <span class="mini-stat-icon tar"><i class="fa fa-tag"></i></span>
                                    <div class="mini-stat-info">
                                        <span>8</span>
                                        Produtos
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mini-stat clearfix">
                                    <span class="mini-stat-icon pink"><i class="fas fa-money-bill-alt"></i></span> 
                                    <div class="mini-stat-info">
                                        <span><div id="total_Transacoes">0</div> </span> Transações
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mini-stat clearfix">
                                    <span class="mini-stat-icon green"><i class="fa fa-eye"></i></span>
                                    <div class="mini-stat-info">
                                        <span>R$ 104</span>
                                        Faturamento Produtos  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--mini statistics end-->	
                    </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                $('#total_cli').load('<?php echo DIRPAGE.'cliente/TotalClientes'; ?>'); 
                                $('#total_agendamentos').load('<?php echo DIRPAGE.'agenda/TotalAgendamentos'; ?>'); 
                                $('#total_colab').load('<?php echo DIRPAGE.'colaborador/TotalColaboradores'; ?>'); 
                                $('#total_Transacoes').load('<?php echo DIRPAGE.'transacao/TotalTransacoes'; ?>'); 
                                // $('#total_Transacoes').load('<?php echo number_format(123.45, 2, ',', '.'); ?>'); 
                                
                            });
                        </script>
