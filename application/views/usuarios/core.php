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
                            <i class="<?php echo $icone_view; ?> bg-blue"></i>
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
                                <li class="breadcrumb-item">
                                    <a title="Usuários Cadastrados" href="<?php echo base_url('usuarios') ?>">Usuarios</i></a>
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
                            <i class="ik ik-calendar ik-2x mr-1"></i>
                            <span class="font-weight-bold mr-2">Data da última alteração:</span>
                            <?php echo (isset($usuario) ?  formata_data_banco_com_hora($usuario->data_ultima_alteracao) : '');

                            ?>
                        </div>
                        <div class="card-body">

                            <form class="forms-sample" name="form_core" method="POST">
                                <div class="form-group row">
                                    <label for="Nome" class="col-sm-3 col-form-label">Nome</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="first_name" class="form-control" placeholder="Nome" value="<?php echo isset($usuario) ? $usuario->first_name : set_value('first_name') ?>">
                                        <?php echo form_error('first_name', '<div class="text-danger">', '</div>') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Sobrenome" class="col-sm-3 col-form-label">Sobrenome</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="last_name" class="form-control" placeholder="Sobrenome" value="<?php echo isset($usuario) ? $usuario->last_name : set_value('last_name') ?>">
                                        <?php echo form_error('last_name', '<div class="text-danger">', '</div>') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Usuário" class="col-sm-3 col-form-label">Nome de usuário</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="username" class="form-control" placeholder="Nome de usuário" value="<?php echo isset($usuario) ? $usuario->username : set_value('username') ?>">
                                        <?php echo form_error('username', '<div class="text-danger">', '</div>') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="E-mail" class="col-sm-3 col-form-label">E-mail</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="email" class="form-control" placeholder="E-mail" value="<?php echo isset($usuario) ? $usuario->email : set_value('email') ?>">
                                        <?php echo form_error('email', '<div class="text-danger">', '</div>') ?>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Senha" class="col-sm-3 col-form-label">Senha</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="password" class="form-control" placeholder="Digite sua senha">
                                        <?php echo form_error('password', '<div class="text-danger">', '</div>') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Senha" class="col-sm-3 col-form-label">Confirme sua senha</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="confirmacao" class="form-control" placeholder="Confrime sua senha">
                                        <?php echo form_error('confirmacao', '<div class="text-danger">', '</div>') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <legend class="col-form-label col-sm-2 pt-0">Status: </legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" id="Ativo" type="radio" name="active" value="1" 
                                                <?php echo (isset($usuario) and $usuario->active == 1) ? 'checked' : '' ?>
                                            >
                                            <label class="form-check-label" for="Ativo">
                                                Ativo
                                            </label>
                                        </div>
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" id="Inativo" type="radio" name="active" value="0"
                                                <?php echo (isset($usuario) and $usuario->active == 0) ? 'checked' : '' ?>
                                            >
                                            <label class="form-check-label" for="Inativo">
                                                Inativo
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mt-4">
                                    <legend class="col-form-label col-sm-2 pt-0 ">Perfil de Acesso: </legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" id="Administrador" type="radio" name="Perfil" value="1" 
                                            
                                                <?php echo (isset($perfil_usuario) and $perfil_usuario->id == '1') ? 'checked' : '' ?>
                                            >
                                            <label class="form-check-label" for="Administrador">
                                                Administrador
                                            </label>
                                        </div>
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" id="Atendente" type="radio" name="Perfil" value="2"
                                                <?php echo  (isset($perfil_usuario) and $perfil_usuario->id == '2') ? 'checked' : '' ?>
                                            >
                                            <label class="form-check-label" for="Atendente">
                                                Atendente
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <?php if(isset($usuario)): ?>
                                    <div class="form-group row mt-4">
                                        <input type="hidden" name="usuario_id" value="<?php echo isset($usuario) ? $usuario->id : ''	?>">
                                    </div>
                                <?php endif; ?>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>

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