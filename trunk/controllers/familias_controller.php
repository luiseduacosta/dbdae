<?php

class FamiliasController extends AppController {

    var $name = 'Familias';
    // var $scaffold;
    var $components = array('Auth', 'Acl');

    function beforeFilter() {

        $this->Auth->allow('add');
        $this->Auth->loginError = 'Error! Tente novamente';
        $this->Auth->authError = "Usuário não autorizado";
    }

    function add($id = NULL) {

        $this->loadModel('Aluno');
        $aluno = $this->Aluno->findById($id);
        $this->set('aluno', $aluno);

        // Para fazer o quadro familiar
        $familia = $this->Familia->findAllByAlunoId($id);
        $this->set('familia', $familia);

        $this->set('aluno_id', $id);

        if ($this->data) {

            if ($this->Familia->save($this->data)) {

                // Calcula o rendimento familiar
                $aluno_id = $this->data['Familia']['aluno_id'];
                $toda_familia = $this->Familia->findAllByAlunoId($aluno_id);

                $total = NULL;
                foreach ($toda_familia as $c_familia) {
                    $total = $total + $c_familia['Familia']['rendimento'];
                }
                // Atualiza o rendimento familiar
                $this->data['Aluno']['id'] = $aluno_id;
                $this->data['Aluno']['rendimento_familiar'] = $total;
                $this->Familia->Aluno->save($this->data);

                $this->Session->setFlash("Integrante da familia inserido");
                $aluno_id = $this->data['Familia']['aluno_id'];
                $this->redirect("/Familias/add/" . $aluno_id);
            }
        }
    }

    function inserir($id = NULL) {

        // Somente ele próprio
        $this->loadModel('Aluno');
        $aluno = $this->Aluno->findById($id);
        $this->set('aluno', $aluno);

        // Para fazer o quadro familiar
        $familia = $this->Familia->findAllByAlunoId($id);
        $this->set('familia', $familia);
        // debug($this->data);

        $this->set('aluno_id', $id);

        if ($this->data) {

            if ($this->Familia->save($this->data)) {

                $this->Session->setFlash("Integrante da familia inserido");
                $aluno_id = $this->data['Familia']['aluno_id'];

                // Calcula o rendimento familiar
                $familia = $this->Familia->findAllByAlunoId($aluno_id);
                $total = NULL;
                foreach ($familia as $c_familia) {
                    $total = $total + $c_familia['Familia']['rendimento'];
                }
                // Atualiza o rendimento familiar
                $this->data['Aluno']['id'] = $aluno_id;
                $this->data['Aluno']['rendimento_familiar'] = $total;
                // pr($this->data);
                $this->Familia->Aluno->save($this->data);

                $this->redirect("/Familias/listar/" . $aluno_id);
            }
        }
    }

    /*
     * Capturo a familia do aluno
     */

    function listar($id = NULL) {

        $aluno = $this->Familia->Aluno->findById($id);
        $this->set('aluno', $aluno);

        $familia = $this->Familia->findAllByAlunoId($id);
        $this->set('familia', $familia);
    }

    function edit($id = NULL) {

        $familia = $this->Familia->findById($id);
        $aluno_id = $familia['Familia']['aluno_id'];
        // debug($aluno_id);

        $this->set('familia_id', $id);
        $this->set('aluno', $familia);

        if (empty($this->data)) {
            $this->data = $this->Familia->read();
        } else {
            if ($this->Familia->save($this->data)) {
                $this->Session->setFlash("Dados atualizados");
                $aluno_id = $familia['Familia']['aluno_id'];

                // Calcula o rendimento familiar
                $familia = $this->Familia->findAllByAlunoId($aluno_id);

                $total = NULL;
                foreach ($familia as $c_familia) {
                    $total = $total + $c_familia['Familia']['rendimento'];
                }

                // Atualiza o rendimento familiar
                $this->data['Aluno']['id'] = $aluno_id;
                $this->data['Aluno']['rendimento_familiar'] = $total;
                // debug($this->data);

                $this->loadModel('Aluno');
                $this->Aluno->create();
                $this->Aluno->save(array(
                    'id' => $aluno_id,
                    'rendimento_familiar' => $total)
                );

                $this->redirect('/Familias/listar/' . $aluno_id);
            }
        }
    }

    function excluir($id = NULL) {

        $aluno = $this->Familia->findById($id);
        $aluno_id = $aluno['Familia']['aluno_id'];

        $this->Familia->delete($id);

        // Calcula o rendimento familiar
        $toda_familia = $this->Familia->findAllByAlunoId($aluno_id);
        $total = NULL;
        foreach ($toda_familia as $c_familia) {
            $total = $total + $c_familia['Familia']['rendimento'];
        }

        // Atualiza o rendimento familiar
        $this->data['Aluno']['id'] = $aluno_id;
        $this->data['Aluno']['rendimento_familiar'] = $total;
        $this->Familia->Aluno->save($this->data);

        $this->Session->setFlash('Registro excluído');
        $this->redirect("listar/" . $aluno_id);
    }

}

?>
