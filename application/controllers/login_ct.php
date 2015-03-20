<!--Verificação de acesso correto ao codeigniter-->
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_ct extends CI_Controller {

    function index()
    {
        $this->load->view("index", array("users"=> new Users()));
    }
//--------------------------------------------------------------------------------------------------------------------//

    function login()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $users = new Users();

        $users ->setNome($this->input->post("usuario"));
        $users ->setSenha($this->input->post("senha"));
//        var_dump($users);

        $config = array(
            array(
                'field' => 'usuario',
                'label' => 'Usuário',
                'rules' => ''
            ),
            array(
                'field' => 'senha',
                'label' => 'Senha',
                'rules' => ''
            )
        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("index", array("users"=> new Users()));
        } else {
           redirect("mapa_bordo_ct/consulta");
        }


    }
//--------------------------------------------------------------------------------------------------------------------//

    function checkUser(){
//        $users = new Users();
        $user = $this->input->post("usuario");
        $senha = $this->input->post("senha");

        $checkUser = $this->doctrine->em->getRepository("Users")->findOneBy(array(
            "nome" => $user,
            "senha" => $senha
        ));

        if($checkUser == null){
            return TRUE;
        } else {
            $this->form_validation->set_message('checkNome',
                '<strong style="color:#FE0000">Login ou Senha incorreto!</strong>');
            return FALSE;
        }

        var_dump($user);
        var_dump($senha);
        var_dump($checkUser);
//        $checkUser = $this->doctrine->em

    }






}

?>