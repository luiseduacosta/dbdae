<?php

class AlunosController extends AppController {

    var $name = 'Alunos';
    var $paginate = array(
        'limit' => 10,
        'fields' => array('Aluno.id', 'Aluno.nome', 'Aluno.curso', 'Aluno.dre', 'Aluno.beneficio', 'Aluno.rendimento_familiar'),
        'order' => array('Aluno.nome' => 'asc')
    );

    function beforeFilter() {

        $this->Auth->allow('add', 'familia', 'naoresidente', 'despesa', 'saude', 'propriedade', 'transporte', 'refeicao', 'adicional', 'index0');
    }

    function add($id = NULL) {

        // Verifica se os dados obrigatorios foram inseridos
        if ($this->data) {
            if (empty($this->data['Aluno']['dre'])) {
                $this->Session->setFlash("Error: inserir DRE");
                $this->redirect("/Alunos/add/");
            }
        }

        if ($this->Aluno->save($this->data)) {

            // Para verifica ao longo da edicao do formulario que he sempre o mesmo usuario
            $this->Session->write("verifica", $this->data['Aluno']['dre']);
            // Também vou a inserir os dados numa tabela user
            $this->loadModel('User');
            $this->User->create();
            $this->User->save(array(
                'nome' => $this->data['Aluno']['nome'],
                'username' => $this->data['Aluno']['dre'],
                'password' => Security::hash($this->data['Aluno']['cpf'], null, true),
                'cpf' => $this->data['Aluno']['cpf'],
                'dre' => $this->data['Aluno']['dre'],
                'nascimento' => $this->data['Aluno']['nascimento'],
                'naturidade' => $this->data['Aluno']['naturidade'],
                'sexo' => $this->data['Aluno']['sexo'],
                'email' => $this->data['Aluno']['email'],
                'telefone' => $this->data['Aluno']['telefone'],
                'celular' => $this->data['Aluno']['celular']
            ));

            $alias = $this->data['Aluno']['dre'];
            $user_id = $this->User->getLastInsertID();

            // Para a lista de control de acesso
            $this->loadModel('Aro');
            $this->Aro->create();
            $this->Aro->save(array(
                'alias' => $this->data['Aluno']['dre'],
                'model' => 'User',
                'foreign_key' => $user_id,
                'parent_id' => '3' // usuario
            ));

            $aluno_id = $this->Aluno->getLastInsertID();
            $this->Session->setFlash("Dados inseridos");
            $this->redirect("/Familias/add/" . $aluno_id);
        }
    }

    /*
     * Insere a renda familiar e observações
     */

    function familia($id = NULL) {

        // Para pegar o nome do aluno
        $aluno = $this->Aluno->findById($id);
        $this->set('aluno', $aluno);

        // Verifico que esta sendo editado pelo proprio usuario
        $verifica = $this->Session->read("verifica");
        if ($aluno['Aluno']['dre'] != $verifica) {
            $this->redirect("/Useres/login/");
        }

        // Para fazer o quadro familiar
        $this->loadModel('Familia');
        $familia = $this->Familia->findAllByAlunoId($id);
        $this->set('familia', $familia);

        // Envio o id do aluno para o formulario
        $this->set('aluno_id', $id);

        if (empty($this->data)) {
            $this->data = $this->Aluno->read();
        } else {
            if ($this->Aluno->save($this->data)) {
                $this->Session->setFlash("Dados inseridos");
                $aluno_id = $this->data["Aluno"]["id"];
                $this->redirect("/Alunos/naoresidente/" . $aluno_id);
            }
        }
    }

    function naoresidente($id = NULL) {

        // Para pegar o nome do aluno
        $aluno = $this->Aluno->findById($id);
        $this->set('aluno', $aluno);

        // Verifico que esta sendo editado pelo proprio usuario
        $verifica = $this->Session->read("verifica");
        if ($aluno['Aluno']['dre'] != $verifica) {
            $this->redirect("/Useres/login/");
        }

        $this->set('aluno_id', $id);

        if (empty($this->data)) {
            $this->data = $this->Aluno->read();
        } else {
            if ($this->Aluno->save($this->data)) {
                $this->Session->setFlash("Dados inseridos");
                $aluno_id = $this->data["Aluno"]["id"];
                $this->redirect("/Rendas/add/" . $aluno_id);
            }
        }
    }

    function despesa($id = NULL) {

        // Para pegar o nome do aluno
        $aluno = $this->Aluno->findById($id);
        $this->set('aluno', $aluno);

        // Verifico que esta sendo editado pelo proprio usuario
        $verifica = $this->Session->read("verifica");
        if ($aluno['Aluno']['dre'] != $verifica) {
            $this->redirect("/Useres/login/");
        }

        $this->set('aluno_id', $id);

        if (empty($this->data)) {
            $this->data = $this->Aluno->read();
        } else {
            if ($this->Aluno->save($this->data)) {
                $this->Session->setFlash("Dados inseridos");
                $aluno_id = $this->data["Aluno"]["id"];
                $this->redirect("/Alunos/saude/" . $aluno_id);
            }
        }
    }

    function saude($id = NULL) {

        // Para pegar o nome do aluno
        $aluno = $this->Aluno->findById($id);
        $this->set('aluno', $aluno);

        // Verifico que esta sendo editado pelo proprio usuario
        $verifica = $this->Session->read("verifica");
        if ($aluno['Aluno']['dre'] != $verifica) {
            $this->redirect("/Useres/login/");
        }

        $this->set('aluno_id', $id);

        if (empty($this->data)) {
            $this->data = $this->Aluno->read();
        } else {
            if ($this->Aluno->save($this->data)) {
                $this->Session->setFlash("Dados inseridos");
                $aluno_id = $this->data["Aluno"]["id"];
                $this->redirect("/Alunos/propriedade/" . $aluno_id);
            }
        }
    }

    function propriedade($id = NULL) {

        // Para pegar o nome do aluno
        $aluno = $this->Aluno->findById($id);
        $this->set('aluno', $aluno);

        // Verifico que esta sendo editado pelo proprio usuario
        $verifica = $this->Session->read("verifica");
        if ($aluno['Aluno']['dre'] != $verifica) {
            $this->redirect("/Useres/login/");
        }

        $this->set('aluno_id', $id);

        if (empty($this->data)) {
            $this->data = $this->Aluno->read();
        } else {
            if ($this->Aluno->save($this->data)) {
                $this->Session->setFlash("Dados inseridos");
                $aluno_id = $this->data["Aluno"]["id"];
                $this->redirect("/Alunos/transporte/" . $aluno_id);
            }
        }
    }

    function transporte($id = NULL) {

        // Para pegar o nome do aluno
        $aluno = $this->Aluno->findById($id);
        $this->set('aluno', $aluno);

        // Verifico que esta sendo editado pelo proprio usuario
        $verifica = $this->Session->read("verifica");
        if ($aluno['Aluno']['dre'] != $verifica) {
            $this->redirect("/Useres/login/");
        }

        $this->set('aluno_id', $id);
        if (empty($this->data)) {
            $this->data = $this->Aluno->read();
        } else {
            if ($this->Aluno->save($this->data)) {
                $this->Session->setFlash("Dados inseridos");
                $aluno_id = $this->data["Aluno"]["id"];
                $this->redirect("/Alunos/refeicao/" . $aluno_id);
            }
        }
    }

    function refeicao($id = NULL) {

        // Para pegar o nome do aluno
        $aluno = $this->Aluno->findById($id);
        $this->set('aluno', $aluno);

        // Verifico que esta sendo editado pelo proprio usuario
        $verifica = $this->Session->read("verifica");
        if ($aluno['Aluno']['dre'] != $verifica) {
            $this->redirect("/Useres/login/");
        }

        $this->set('aluno_id', $id);

        if (empty($this->data)) {
            $this->data = $this->Aluno->read();
        } else {
            if ($this->Aluno->save($this->data)) {
                $this->Session->setFlash("Dados inseridos");
                $aluno_id = $this->data["Aluno"]["id"];
                $this->redirect("/Alunos/adicional/" . $aluno_id);
            }
        }
    }

    function adicional($id = NULL) {

        // Para pegar o nome do aluno
        $aluno = $this->Aluno->findById($id);
        $this->set('aluno', $aluno);

        // Verifico que esta sendo editado pelo proprio usuario
        $verifica = $this->Session->read("verifica");
        if ($aluno['Aluno']['dre'] != $verifica) {
            $this->redirect("/Useres/login/");
        }

        $this->set('aluno_id', $id);

        if (empty($this->data)) {
            $this->data = $this->Aluno->read();
        } else {
            if ($this->Aluno->save($this->data)) {
                $this->Session->setFlash("Dados inseridos");
                $aluno_id = $this->data["Aluno"]["id"];
                $this->redirect("/Entrevistas/index0/" . $aluno_id);
            }
        }
    }

    function edit($id = NULL) {

        $this->Aluno->id = $id;
        $aluno = $this->Aluno->findById($id);
        $this->set('aluno', $aluno);

        // pr($this->data);

        if (empty($this->data)) {
            $this->data = $this->Aluno->read();
        } else {
            if ($this->Aluno->save($this->data)) {
                $this->Session->setFlash("Atualizado");
                $this->redirect(array('controller' => 'Alunos', 'action' => 'view/' . $aluno['Aluno']['id']));
            }
        }
    }

    function view($id = NULL) {

        $familia = $this->Aluno->Familia->findAllByAlunoId($id);
        $this->set('familia', $familia);

        $renda = $this->Aluno->Renda->findAllByAlunoId($id);
        $this->set('renda', $renda);

        $despesa = $this->Aluno->Despesa->findAllByAlunoId($id);
        $this->set('despesa', $despesa);

        $entrevista = $this->Aluno->Entrevista->find('all', array(
                    'conditions' => array('Entrevista.aluno_id' => $id),
                    'fields' => array('Entrevista.data', 'Entrevista.hora', 'Entrevista.observacoes'),
                    'order' => array('Entrevista.data DESC')));
        $this->set('entrevista', $entrevista);

        $aluno = $this->Aluno->findById($id);
        $this->set('aluno_id', $id);
        $this->set('aluno', $aluno);
    }

    function pdf($id = NULL) {

        $familia = $this->Aluno->Familia->findAllByAlunoId($id);
        $this->set('familia', $familia);

        $renda = $this->Aluno->Renda->findAllByAlunoId($id);
        $this->set('renda', $renda);

        $despesa = $this->Aluno->Despesa->findAllByAlunoId($id);
        $this->set('despesa', $despesa);

        $entrevista = $this->Aluno->Entrevista->find('all', array(
                    'conditions' => array('Entrevista.aluno_id' => $id),
                    'fields' => array('Entrevista.data', 'Entrevista.hora', 'Entrevista.observacoes'),
                    'order' => array('Entrevista.data DESC')));
        $this->set('entrevista', $entrevista);

        $aluno = $this->Aluno->findById($id);
        $this->set('aluno_id', $id);
        $this->set('aluno', $aluno);

        $this->layout = "pdf";
        $this->render();
    }

    function ebeneficio($id = NULL) {

        // Para pegar o nome do aluno
        $aluno = $this->Aluno->findById($id);
        $this->set('aluno', $aluno);

        $this->set('aluno_id', $id);

        if (empty($this->data)) {

            $this->data = $this->Aluno->read();
        } else {

            if ($this->Aluno->save($this->data)) {
                $this->Session->setFlash("Dados atualizados");
                $this->redirect("/Alunos/view/" . $id);
            }
        }
    }

    function ealuno($id = NULL) {

        // Para pegar o nome do aluno
        $aluno = $this->Aluno->findById($id);
        $this->set('aluno', $aluno);

        $this->set('aluno_id', $id);

        if (empty($this->data)) {

            $this->data = $this->Aluno->read();
        } else {

            if ($this->Aluno->save($this->data)) {
                $this->Session->setFlash("Dados atualizados");
                $this->redirect("/Alunos/view/" . $id);
            }
        }
    }

    function efamilia($id = NULL) {

        // Para fazer o quadro familiar
        $this->loadModel('Familia');
        $familia = $this->Familia->findAllByAlunoId($id);
        $this->set('familia', $familia);

        // Para pegar o nome do aluno
        $aluno = $this->Aluno->findById($id);
        $this->set('aluno', $aluno);

        $this->set('aluno_id', $id);

        if (empty($this->data)) {

            $this->data = $this->Aluno->read();
        } else {

            if ($this->Aluno->save($this->data)) {
                $this->Session->setFlash("Dados atualizados");
                $this->redirect("/Alunos/view/" . $id);
            }
        }
    }

    function enaoresidente($id = NULL) {

        // Para pegar o nome do aluno
        $aluno = $this->Aluno->findById($id);
        $this->set('aluno', $aluno);

        $this->set('aluno_id', $id);

        if (empty($this->data)) {

            $this->data = $this->Aluno->read();
        } else {

            if ($this->Aluno->save($this->data)) {
                $this->Session->setFlash("Dados atualizados");
                $this->redirect("/Alunos/view/" . $id);
            }
        }
    }

    function edespesa($id = NULL) {

        // Para pegar o nome do aluno
        $aluno = $this->Aluno->findById($id);
        $this->set('aluno', $aluno);

        $this->set('aluno_id', $id);

        if (empty($this->data)) {

            $this->data = $this->Aluno->read();
        } else {

            if ($this->Aluno->save($this->data)) {
                $this->Session->setFlash("Dados atualizados");
                $this->redirect("/Alunos/view/" . $id);
            }
        }
    }

    function esaude($id = NULL) {

        // Para pegar o nome do aluno
        $aluno = $this->Aluno->findById($id);
        $this->set('aluno', $aluno);

        $this->set('aluno_id', $id);

        if (empty($this->data)) {
            $this->data = $this->Aluno->read();
        } else {
            if ($this->Aluno->save($this->data)) {
                $this->Session->setFlash("Dados atualizados");
                $this->redirect("/Alunos/view/" . $id);
            }
        }
    }

    function epropriedade($id = NULL) {

        // Para pegar o nome do aluno
        $aluno = $this->Aluno->findById($id);
        $this->set('aluno', $aluno);

        $this->set('aluno_id', $id);

        if (empty($this->data)) {

            $this->data = $this->Aluno->read();
        } else {

            if ($this->Aluno->save($this->data)) {
                $this->Session->setFlash("Dados atualizados");
                $this->redirect("/Alunos/view/" . $id);
            }
        }
    }

    function etransporte($id = NULL) {

        // Para pegar o nome do aluno
        $aluno = $this->Aluno->findById($id);
        $this->set('aluno', $aluno);

        $this->set('aluno_id', $id);

        if (empty($this->data)) {

            $this->data = $this->Aluno->read();
        } else {

            if ($this->Aluno->save($this->data)) {
                $this->Session->setFlash("Dados atualizados");
                $this->redirect("/Alunos/view/" . $id);
            }
        }
    }

    function erefeicao($id = NULL) {

        // Para pegar o nome do aluno
        $aluno = $this->Aluno->findById($id);
        $this->set('aluno', $aluno);

        $this->set('aluno_id', $id);

        if (empty($this->data)) {
            $this->data = $this->Aluno->read();
        } else {
            if ($this->Aluno->save($this->data)) {
                $this->Session->setFlash("Dados atualizados");
                $this->redirect("/Alunos/view/" . $id);
            }
        }
    }

    function eadicional($id = NULL) {

        // Para pegar o nome do aluno
        $aluno = $this->Aluno->findById($id);
        $this->set('aluno', $aluno);

        $this->set('aluno_id', $id);

        if (empty($this->data)) {
            $this->data = $this->Aluno->read();
        } else {
            if ($this->Aluno->save($this->data)) {
                $this->Session->setFlash("Dados atualizados");
                $this->redirect("/Alunos/view/" . $id);
            }
        }
    }

    function excluir($id = NULL) {

        $this->Aluno->Familia->delete($id);
        $this->Aluno->Renda->delete($id);
        $this->Aluno->Despesa->delete($id);
        $this->Aluno->Entrevista->delete($id);
        $this->Aluno->Pontuacao->delete($id);
        $this->Aluno->delete($id);

        $this->redirect("/Alunos/index");
    }

    function index() {

        $this->set('alunos', $this->paginate('Aluno'));
    }

    function index0() {

        $this->set('alunos', $this->paginate('Aluno'));
    }

}

?>
