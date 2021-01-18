<?php
$this->load->view('layout/navbar');
?>


<div class="page-wrap">
    <?php $this->load->view('layout/sidebar'); ?>

    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="ik ik-users bg-blue"></i>
                            <div class="d-inline">
                                <h5>
                                    <?php echo $titulo; ?>
                                </h5>
                                <span>
                                    <?php echo $subtitulo; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a title="home" href="<?php echo base_url() ?>"><i class="ik ik-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>
                                <?php echo substr($titulo, 0, 9) ?>
                            </h3>
                        </div>
                        <div class="card-body">
                            <table id="data_table" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Usuario</th>
                                        <th>Email</th>
                                        <th>Nome</th>
                                        <th>Status</th>
                                        <th class="nosort">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($usuarios as $usuario): ?>
                                        <tr>
                                            <td><?php echo $usuario->id ?></td>
                                            <td><?php echo $usuario->username ?></td>
                                            <td><?php echo $usuario->email ?></td>
                                            <td><?php echo $usuario->first_name ?></td>
                                            <td><?php echo $usuario->active == 1 ? "Ativo" : "Inativo"  ?></td>                                            
                                            <td>
                                                <div>
                                                    <a href="#"><i class="ik ik-edit-2"></i></a>
                                                    <a href="#"><i class="ik ik-trash-2"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer class="footer">
        <div class="w-100 clearfix">
            <span class="text-center text-sm-left d-md-inline-block">Copyright © <?php echo (date('Y')) ?> Park Now. Todos os direitos reservados.</span>
            <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Customizado <i class="fa fa-heart text-danger"></i> Por Luan Dev <i class="fas fa-laptop-code"></i></span>
        </div>
    </footer>

</div>