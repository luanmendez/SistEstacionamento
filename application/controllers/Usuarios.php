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

        public function core($id = NULL){
            if(!$id){
                echo "Cadastro novo usuário";
                
            }else{
                if(!$this->ion_auth->user($id)->row()){
                    exit('Usuario não existe');
                }else{
                    // -- EDITAR USUÁRIO 

                    $this->form_validation->set_rules('first_name', 'Nome', 'trim|required|min_length[5]|max_length[20]');
                    $this->form_validation->set_rules('last_name', 'Sobrenome', 'trim|required|min_length[5]|max_length[20]');
                    $this->form_validation->set_rules('username', 'Usuario', 'trim|required|min_length[5]|max_length[20]');
                    $this->form_validation->set_rules('email', 'E-mail', 'trim|valid_email|required|min_length[5]|max_length[200]');
                    $this->form_validation->set_rules('password', 'Senha', 'trim|min_length[8]');
                    $this->form_validation->set_rules('confirmacao', 'confirmação de senha', 'trim|matches[password]');


                    if($this->form_validation->run()){
                        echo '<pre>';
                        print_r($this->input->post());
                        exit();

                    }else{
                        // Erro de validação

                        $data = array(
                            'titulo'    => 'Editar Usuário',                
                            'subtitulo' => '',
                            'icone_view' => 'ik ik-user',
                            'usuario'   => $this->ion_auth->user($id)->row(), // get user id
                            'perfil_usuario'    => $this->ion_auth->get_users_groups($id)->row(),
                            
                        );
                        
                        //echo '<pre>';
                        //print_r($data['perfil_usuario']);
                        //exit;
                
                        $this->load->view('layout/header', $data);
                        $this->load->view('usuarios/core');
                        $this->load->view('layout/footer');


                    }

                    
                }
                
            }
           
        }

    }
