<?php

class RendasController extends AppController {

    var $name = "Rendas";
    // var $scaffold;

    var $components = array('Auth', 'Acl');

    function beforeFilter() {

        $this->Auth->allow('add');

    }

    function add($id = NULL) {

        // pr($id);
        // pr($this->data);

        // Para pegar o nome do aluno
        $aluno = $this->Renda->Aluno->findById($id);
        $this->set('aluno', $aluno);

        // Para fazer a tabela de outras rendas
        $renda = $this->Renda->findAllByAlunoId($id);
        $this->set('renda', $renda);

        $this->set('aluno_id', $id);

        if ($this->data) {

            if ($this->Renda->save($this->data)) {

                $this->Session->setFlash("Registro inserido");
                $aluno_id = $this->data['Renda']['aluno_id'];
                $this->redirect("/Rendas/add/$aluno_id");

            }
        }

    }

    /*
	 * Para listar a renda da familia
    */
    function listar($id = NULL) {

        $aluno = $this->Renda->Aluno->findById($id);
        $this->set('aluno', $aluno);

        $renda = $this->Renda->findAllByAlunoId($id);
        $this->set('renda', $renda);

    }

    function inserir($id = NULL) {

        // Para pegar o nome do aluno
        $aluno = $this->Renda->Aluno->findById($id);
        $this->set('aluno', $aluno);

        // Para fazer a tabela de outras rendas
        $renda = $this->Renda->findAllByAlunoId($id);
        $this->set('renda', $renda);

        $this->set('aluno_id', $id);
        
        if ($this->data) {

            if ($this->Renda->save($this->data)) {

                $this->Session->setFlash("Registro inserido");
                $aluno_id = $this->data['Renda']['aluno_id'];
                $this->redirect("/Rendas/listar/" . $aluno_id);

            }
        }

    }

    function edit($id = NULL) {

        // Para fazer a tabela de outras rendas
        $renda = $this->Renda->findAllById($id);
        $this->set('renda', $renda);

        // Para pegar o nome do aluno
        $aluno = $this->Renda->Aluno->findById($renda[0]['Renda']['aluno_id']);
        // pr($renda);
        $this->set('aluno', $aluno);

        if (empty($this->data)) {

            $this->data = $this->Renda->read();

        } else {

            if ($this->Renda->save($this->data)) {

                $this->Session->setFlash("Dado inserido");
                $aluno_id = $aluno['Aluno']['id'];
                $this->redirect("/Rendas/listar/". $aluno_id);
            }

        }

    }

    function excluir($id = NULL) {

        $aluno = $this->Renda->findById($id);
        $aluno_id =  $aluno['Renda']['aluno_id'];
        $this->Renda->delete($id);
        $this->Session->setFlash('Registro excluído');
        $this->redirect("listar/" . $aluno_id);

    }
}

?>
