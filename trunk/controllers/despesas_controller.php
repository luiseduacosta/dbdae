<?php

class DespesasController extends AppController {

    var $name = "Despesas";
    // var $scaffold;
    var $components = array('Auth', 'Acl');

    function beforeFilter() {

        $this->Auth->allow('add');
        $this->Auth->loginError = 'Error! Tente novamente';
        $this->Auth->authError = "Usuário não autorizado";
    }

    function add($id = NULL) {

        // Para pegar o nome do aluno
        $aluno = $this->Despesa->Aluno->findById($id);
        $this->set('aluno', $aluno);

        // Para fazer a tabela de despesas
        $despesa = $this->Despesa->findAllByAlunoId($id);
        $this->set('despesa', $despesa);

        $this->set('aluno_id', $id);

        if ($this->data) {

            if ($this->Despesa->save($this->data)) {

                $this->Session->setFlash("Registro inserido");
                $aluno_id = $this->data['Despesa']['aluno_id'];
                $this->redirect("/Despesas/add/$aluno_id");
            }
        }
    }

    /*
     * Lista as despesas da familia
     */

    function listar($id = NULL) {

        $aluno = $this->Despesa->Aluno->findById($id);
        $this->set('aluno', $aluno);

        $despesa = $this->Despesa->findAllByAlunoId($id);
        $despesa = $this->set('despesa', $despesa);
    }

    function edit($id = NULL) {

        // Para fazer o cabecalho
        $despesa = $this->Despesa->findById($id);
        $this->set('despesa', $despesa);
        // pr($despesa);

        if (empty($this->data)) {

            $this->data = $this->Despesa->read();
        } else {

            if ($this->Despesa->save($this->data)) {

                // $this->set('aluno_id', $id);
                $this->Session->setFlash("Dado inserido");
                $aluno_id = $this->data['Despesa']['aluno_id'];
                $this->redirect("/Despesas/listar/" . $aluno_id);
            }
        }
    }

    function inserir($id = NULL) {

        // Para pegar o nome do aluno
        $aluno = $this->Despesa->Aluno->findById($id);
        $this->set('aluno', $aluno);

        // Para fazer a tabela de despesas
        $despesa = $this->Despesa->findAllByAlunoId($id);
        $this->set('despesa', $despesa);

        $this->set('aluno_id', $id);

        if ($this->data) {

            if ($this->Despesa->save($this->data)) {

                $this->Session->setFlash("Registro inserido");
                $aluno_id = $this->data['Despesa']['aluno_id'];
                $this->redirect("/Despesas/listar/" . $aluno_id);
            }
        }
    }

    function excluir($id = NULL) {

        $aluno = $this->Despesa->findById($id);
        $aluno_id = $aluno['Despesa']['aluno_id'];
        $this->Despesa->delete($id);
        $this->Session->setFlash('Registro excluído');
        $this->redirect("listar/" . $aluno_id);
    }

}

?>
