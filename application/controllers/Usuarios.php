<?php
    defined('BASEPATH') OR exit('Ação não encontrada');

    class Usuarios extends CI_Controller{

        public function index(){

            $data = array(
                'titulo'    => 'Usuários Cadastrados',
                'usuarios'  => $this->ion_auth->users()->result(), // get all users
                'subtitulo' => 'Listando todos os usuários cadastrados'
            );

           

            $this->load->view('layout/header', $data);
            $this->load->view('usuarios/index');
            $this->load->view('layout/footer');
        }

    }
