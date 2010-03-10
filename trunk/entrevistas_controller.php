<?php

class EntrevistasController extends AppController {

    var $name = 'Entrevistas';

    var $paginate = array(
            'limit'=> 10,
            // 'group'=>array('Familia.aluno_id'),
            // 'conditions'=>array('Entrevista.data'=>'max'),
            'order'=>array('Aluno.nome'=>'asc')
    );

    function beforeFilter() {

        $this->Auth->allow('add', 'edit', 'index0');

    }

    function add($id = NULL) {


        /* Também seria necessário verificar se já tem agendado
	 * outras entrevistas anteriormente
        */

        $aluno = $this->Entrevista->Aluno->findById($id);
        $this->set('aluno', $aluno);

        // pr($this->data);

        if ($this->Entrevista->save($this->data)) {
            $aluno_id = $this->data['Entrevista']['aluno_id'];
            // pr($aluno_id);
            $this->Session->setFlash("Registro inserido");
            $this->redirect(array('controller'=>'entrevistas', 'action'=>'listar/' . $aluno_id));
        }
    }

    /*
     * Listar todas as entrevistas do aluno id
    */
    function listar($id = NULL) {

        $aluno_id = $this->Entrevista->find('first', array(
                'conditions'=>array('Entrevista.id'=> $id),
                'fields'=>array('aluno_id')));

        $this->loadModel('Aluno');
        $aluno = $this->Aluno->find('first', array(
                'conditions'=>array("Aluno.id"=>$id),
                'fields'=>array('Aluno.id', 'Aluno.nome', 'Aluno.dre', 'Aluno.curso', 'Aluno.beneficio')));

        $entrevista = $this->Entrevista->find('all', array(
                'conditions'=>array('Entrevista.aluno_id'=>$id)));

        $this->set('aluno', $aluno);
        $this->set('entrevista', $entrevista);

    }

    /*
     * Ver cada entrevista do aluno id
     * A variavel id eh o id da entrevista do aluno
    */
    function view($id = NULL) {

        $aluno_id = $this->Entrevista->find('first', array(
                'conditions'=>array('Entrevista.id'=> $id),
                'fields'=>array('aluno_id')));
        // pr($aluno_id);
        
        $entrevista = $this->Entrevista->find('all', array(
                'conditions'=>array('Entrevista.aluno_id'=>$aluno_id['Entrevista']['aluno_id'])));

        $this->loadModel('Aluno');
        $aluno = $this->Aluno->find('first', array(
                'conditions'=>array("Aluno.id"=>$aluno_id['Entrevista']['aluno_id']),
                'fields'=>array('Aluno.id', 'Aluno.nome', 'Aluno.dre', 'Aluno.curso', 'Aluno.beneficio')));

        $this->set('aluno', $aluno);
        $this->set('entrevista', $entrevista);

    }

    function edit($id = NULL) {

        $aluno_id = $this->Entrevista->find('first', array(
                'conditions'=>array('Entrevista.id'=>$id),
                'fields'=>array('Entrevista.aluno_id')));

        $entrevista = $this->Entrevista->find('all', array(
                'conditions'=>array('Entrevista.aluno_id'=>$aluno_id['Entrevista']['aluno_id'])));

        $this->set('entrevista', $entrevista);

        if (empty($this->data)) {

            $this->data = $this->Entrevista->read();

        } else {

            if ($this->Entrevista->save($this->data)) {
                $this->Session->setFlash("Atualizado");
                $this->redirect(array('controller'=>'entrevistas', 'action'=>'listar/' . $aluno_id['Entrevista']['aluno_id']));
            }

        }

    }

    /*
     * Excluir cada entrevista do aluno id
    */
    function excluir($id = NULL) {

        $aluno_id = $this->Entrevista->find('first', array(
                'conditions'=>array('Entrevista.id'=>$id),
                'fields'=>array('Entrevista.aluno_id')
        ));

        $this->Entrevista->delete($id);
        $this->Session->setFlash("Excluído");
        $this->redirect("listar/" . $aluno_id['Entrevista']['aluno_id']);

    }

    // Usuarios nao autorizados
    function index0() {

        $this->set("entrevista", $this->paginate('Aluno'));

    }

    // Usuarios autorizados
    function index() {

        $this->set("entrevista", $this->paginate('Aluno'));

    }

}

?>