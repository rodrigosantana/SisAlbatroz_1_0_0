<?php

class MY_Controller extends CI_Controller {

    const MAX_REGISTRO_LISTA = 10;
    const MAX_PAGINA_PAGINADOR = 5;
    
    protected $page = 1;
    protected $modelClassName = "";
    protected $viewPath = '';
    
    public function __construct() {
        parent::__construct();
        
        if (empty($this->modelClassName)) {
            $this->modelClassName = str_replace("Ct", "", get_class($this));
        }
        
        if (empty($this->viewPath)) {
            $this->viewPath = $this->modelClassName;
        }
    }

    public function index() {
        if ($this->session->userdata($this->modelClassName.'_paginador')) {
            $p = $this->session->userdata($this->modelClassName.'_paginador');
            $this->page = $p['pagina_atual'];
        }
        
		$mensagem = $this->session->flashdata(get_class($this) . '_mensagem');
        $alert = $this->getAlert();
        $this->load->view(strtolower($this->viewPath) . "/index", array("mensagem" => $mensagem, "error" => $alert["error"], "parameters"=>$this->executeList(), "modelClassName"=> $this->modelClassName, "controllerClassName"=>  strtolower(get_class($this))));        
    }
    
    protected function findIsValid($codigo, $class) {
        if ($codigo == false || (int) $codigo == 0 || !is_numeric($codigo)) {
            $this->session->set_flashdata('id_' . strtolower(get_class($this)), array("action" => "code_error"));
            redirect('/' . strtolower(get_class($this)) . '/index', 'refresh');
            return;
        }

        $object = $this->doctrine->em->find($class, $codigo);

        if (is_null($object)) {
            $this->session->set_flashdata('id_' . strtolower(get_class($this)), array("action" => "object_error"));
            redirect('/' . strtolower(get_class($this)) . '/index', 'refresh');
            return;
        }

        return $object;
    }

    protected function getAlert() {
        $session = $this->session->flashdata('id_' . strtolower(get_class($this)));
        $message = "";
        $error = false;

        if ($session && $session["action"] == 'code_error') {
            $message = $this->lang->line('code_error');
            $error = true;
        } else if ($session && $session["action"] == 'object_error') {
            $message = $this->lang->line('object_error');
            $error = true;
        } else if ($this->input->get("id") && $session && $session['code'] == $this->input->get("id")) {
            if ($session["action"] == "save") {
                $message = $this->lang->line('salva_sucesso');
            } else if ($session["action"] == "edit") {
                $message = $this->lang->line('edita_sucesso');
            } else if ($session["action"] == "delete") {
                $message = $this->lang->line('exclui_sucesso');
            }
        } else if ($session && $session["action"] == 'copy_success') {
            $message = $this->lang->line('copy_success');
        }

        return array("message" => $message, "error" => $error);
    }

//    public function remove() {
//        $object = $this->findIsValid($this->input->get("id"), $this->modelClassName);
//        $id = $object->getCodigo();
//        $this->doctrine->em->remove($object);
//        $this->doctrine->em->flush();
//        $this->session->set_flashdata('id_' . strtolower(get_class($this)), array("action" => "delete", "code" => $id));
//        redirect('/' . strtolower(get_class($this)) . '/index?id=' . $id, 'refresh');
//    }
    
    private function executeList() {
        $this->page = !$this->input->get("page") ? 1 : (int) $this->input->get("page");
        $queryBuilder = $this->doctrine->em->createQueryBuilder();
        $queryBuilder->select("e")->from($this->modelClassName, "e");
        $query = $queryBuilder->getQuery();
        
        $paginate = new Doctrine\ORM\Tools\Pagination\Paginator($query);
        $total = $paginate->count();
        $query->setMaxResults(self::MAX_REGISTRO_LISTA);
        $query->setFirstResult(($this->page - 1) * self::MAX_REGISTRO_LISTA);        
            
        $entities = $query->getResult();

         
        $return = $this->gerarPaginacao($this->modelClassName, $this->page, $total);    
        $this->session->set_userdata($return);
        $return['data'] = $entities;
        $return['total'] = $total;
        return $return;
    }
    
    /**
     * Gera a paginação para a listagem de registros.
     * 
     * @param string $nomeColecao Nome da entidade.
     * @param integer $paginaAtual Página atual.
     * @param integer $totalRegistro Total de registros.
     * 
     * @return array Retorna a lista para montar o paginador.
     */
    private function gerarPaginacao($nomeColecao, $paginaAtual = 1, $totalRegistro = 0) {
        $paginaAtual = !$paginaAtual ? 1 : (int) $paginaAtual;
        $totalPagina = self::calcularPagina($totalRegistro);

        $valores = self::calcularQuantidadeItem($paginaAtual, $totalRegistro);
        $valores2 = self::calcularQuantidadeItem($paginaAtual, $totalPagina, true);

        $anterior = null;
        $proximo = null;

        if ($valores2['primeiro'] - self::MAX_PAGINA_PAGINADOR > 0) {
            $anterior = $valores2['primeiro'] - self::MAX_PAGINA_PAGINADOR;
        }
        
        if ($valores2['ultimo'] < $totalPagina) {
            $proximo = $valores2['ultimo'] + 1;
        }

        $arrayPaginador = array($nomeColecao . '_paginador' => array(
                'pagina_atual' => $paginaAtual,
                'total_pagina' => $totalPagina,
                'total_registro' => $totalRegistro,
                'qtd_registro_inicial' => $valores['primeiro'],
                'qtd_registro_final' => $valores['ultimo'],
                'qtd_paginador_inicial' => $valores2['primeiro'],
                'qtd_paginador_final' => $valores2['ultimo'],
                'anterior' => $anterior,
                'proximo' => $proximo
                ));

        return $arrayPaginador;
    }
    
    public static function calcularPagina($totalRegistro) {
        $resultado = 0;

        if (($totalRegistro % self::MAX_REGISTRO_LISTA) == 0) {
            $resultado = $totalRegistro / self::MAX_REGISTRO_LISTA;
        } else {
            $resultado = floor($totalRegistro / self::MAX_REGISTRO_LISTA) + 1;
        }

        return $resultado;
    }
    
    /**
     * Cálculo utilizado para gerar a paginação das telas de listagem.
     * 
     * @param integer $paginaAtual Página acessada no momento.
     * @param integer $totalRegistro Total de registros.
     * @param boolean $paginador Define o tipo de paginador a ser montado.
     * 
     * @return array Parâmetros para montar o paginador.
     */
    public static function calcularQuantidadeItem($paginaAtual, $totalRegistro, $paginador = false) {
        $array = array('primeiro' => 0, 'ultimo' => 0);

        if ($totalRegistro == 0) {
            return array('primeiro' => 0, 'ultimo' => 0);
        }

        if ($totalRegistro == 1) {
            return array('primeiro' => 1, 'ultimo' => 1);
        }

        if ($paginador) {
            if ($totalRegistro <= self::MAX_PAGINA_PAGINADOR) {
                $array['primeiro'] = 1;
                $array['ultimo'] = $totalRegistro;
            } else if ($paginaAtual <= self::MAX_PAGINA_PAGINADOR) {
                $array['primeiro'] = 1;
                $array['ultimo'] = self::MAX_PAGINA_PAGINADOR;
            } else {
                $y = 0;
                $x = $paginaAtual - floor($paginaAtual / self::MAX_PAGINA_PAGINADOR) * self::MAX_PAGINA_PAGINADOR;

                if ($x == 0) {
                    $x = $paginaAtual - (self::MAX_PAGINA_PAGINADOR - 1);
                } else {
                    $x = $paginaAtual - ($x - 1);
                }

                if ($x + (self::MAX_PAGINA_PAGINADOR - 1) < $totalRegistro) {
                    $y = $x + (self::MAX_PAGINA_PAGINADOR - 1);
                } else {
                    $y = $totalRegistro;
                }

                $array['primeiro'] = $x;
                $array['ultimo'] = $y;
            }
        } else {
            $array['primeiro'] = (($paginaAtual * self::MAX_REGISTRO_LISTA - self::MAX_REGISTRO_LISTA) + 1);

            if (($array['primeiro'] + self::MAX_REGISTRO_LISTA - 1) > $totalRegistro) {
                $array['ultimo'] = $totalRegistro;
            } else {
                $array['ultimo'] = $array['primeiro'] + self::MAX_REGISTRO_LISTA - 1;
            }
        }
        return $array;
    }
}
