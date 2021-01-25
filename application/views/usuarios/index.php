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

            <?php if ($message = $this->session->flashdata('sucesso')) : ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>
                                <?php echo $message ?>
                            </strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ik ik-x"></i>
                            </button>
                        </div>
                    </div>
                </div>

            <?php endif ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn btn-success" href="#">
                                <i class="fas fa-plus"></i>
                                Novo
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="data_table" class="table data-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Usuario</th>
                                        <th>Email</th>
                                        <th>Nome</th>
                                        <th>Perfil de acesso</th>
                                        <th>Status</th>
                                        <th class="nosort text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($usuarios as $usuario) : ?>
                                        <tr class="align-middle">
                                            <td><?php echo $usuario->id ?></td>
                                            <td><?php echo $usuario->username ?></td>
                                            <td><?php echo $usuario->email ?></td>
                                            <td><?php echo $usuario->first_name ?></td>
                                            <td>
                                                <?php echo $this->ion_auth->is_admin($usuario->id) == 1 ? "Administrador" : "Atendente" ?>
                                            </td>
                                            <td>
                                                <?php echo $usuario->active == 1 ? '<span class="badge badge-pill badge-success mb-1">Ativo</span>' : '<span class="badge badge-pill badge-danger mb-1">Inativo</span>'  ?>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <a title="Editar usuário" href="<?php echo base_url('usuarios/core/' . $usuario->id) ?>" type="button" class="btn btn-icon btn-primary"><i class="ik ik-edit-2"></i></a>
                                                    <a title="Excluir usuário" href="#" type="button" class="btn btn-icon btn-danger"><i class="ik ik-trash"></i></a>
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