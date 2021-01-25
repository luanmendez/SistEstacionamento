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

                    $this->form_validation->set_rules('first_name', 'Nome', 'trim|required|min_length[4]|max_length[20]');
                    $this->form_validation->set_rules('last_name', 'Sobrenome', 'trim|required|min_length[4]|max_length[20]');
                    $this->form_validation->set_rules('username', 'Usuario', 'trim|required|min_length[4]|max_length[20]|callback_username_check');
                    $this->form_validation->set_rules('email', 'E-mail', 'trim|valid_email|required|min_length[4]|max_length[200]|callback_email_check');
                    $this->form_validation->set_rules('password', 'Senha', 'trim|min_length[8]');
                    $this->form_validation->set_rules('confirmacao', 'confirmação de senha', 'trim|matches[password]');


                    if($this->form_validation->run()){
                        /*
                            [first_name] => Admin
                            [last_name] => istrator
                            [username] => administrator
                            [email] => admin@admin.com
                            [password] => 
                            [Active] => 1
                        */

                        $data = elements(
                            array(
                                'first_name',
                                'last_name',
                                'username',
                                'email',
                                'password',
                                'active',                        
                            ), $this->input->post()
                        );

                        $password = $this->input->post('password');

                        // Não atualiza a senha
                        if(!$password){
                            unset($data['password']);
                        }
                        
                        $data = html_escape($data);

                        if($this->ion_auth->update($id, $data)){
                            $this->session->set_flashdata('sucesso','Usuario atualizado com sucesso');
                        }else{
                            $this->session->set_flashdata('error','Não foi possível o usuário');
                        }
                        redirect($this->router->fetch_class());

                        echo '<pre>';
                        print_r($data);
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

        public function username_check($username){
            $usuario_id = $this->input->post('usuario_id');

            if($this->Core_model->get_by_id('users', array('username'=> $username, 'id !=' => $usuario_id ))){
                $this->form->validation->set_message('username_check', 'Este usuário já existe');
                return FALSE;
            }else{
                return TRUE;
            }
            
        }

        public function email_check($email){
            $usuario_id = $this->input->post('usuario_id');

            if($this->Core_model->get_by_id('users', array('username'=> $email, 'id !=' => $usuario_id ))){
                $this->form->validation->set_message('username_check', 'Este e-mail já existe');
                return FALSE;
            }else{
                return TRUE;
            }
            
        }


    }
