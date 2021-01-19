<?php
    defined('BASEPATH') OR exit('Ação não encontrada');

    class Usuarios extends CI_Controller{

        public function index(){

            $data = array(
                'titulo'    => 'Usuários Cadastrados',                
                'subtitulo' => 'Listando todos os usuários cadastrados',
                'usuarios'  => $this->ion_auth->users()->result(), // get all users
                'styles'    => array(
                    '/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',                    
                ),
                'scripts'   => array(
                    '/public/plugins/datatables.net/js/jquery.dataTables.min.js',
                    '/public/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
                    '/public/js/estacionamento.js',
                )

            );

           

            $this->load->view('layout/header', $data);
            $this->load->view('usuarios/index');
            $this->load->view('layout/footer');
        }

    }
