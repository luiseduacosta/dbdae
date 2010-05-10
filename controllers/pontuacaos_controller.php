<?php

class PontuacaosController extends AppController {

    var $name = 'Pontuacaos';

    var $paginate = array(
            'limit'=> 10,
            // 'fields'=>array('Aluno.id', 'Aluno.nome', 'Aluno.curso', 'Aluno.dre', 'Pontuacao.percapita'),
            // 'order'=>array('Aluno.nome'=>'asc')
    );

    var $helpers = array("Javascript");

    

    function beforeFilter() {

        $this->Auth->allow('add', 'edit', 'index0');

    }

    function add($id = NULL) {

        // pr($id);
        $aluno = $this->Pontuacao->Aluno->findById($id);
        $this->set('aluno', $aluno);

        // Calculo o total de integrantes da família
        $this->loadModel('Familia');
        $familia = $this->Familia->findAllByAlunoId($id);
        $i = 0;
        foreach ($familia as $c_familia) {
            // pr($c_familia);
            $i++;
        }
        $this->set("total", $i);
        $this->set('familia', $familia);

        $this->loadModel('Aluno');
        $aluno = $this->Aluno->findById($id);
        $this->set('aluno', $aluno);

        $this->loadModel('Despesa');
        $despesa = $this->Despesa->findAllByAlunoId($id);
        $this->set('despesa', $despesa);

        // Calculo as outras rendas
        $this->loadModel("Renda");
        $renda = $this->Renda->findAllByAlunoId($id);
        $renda_total = NULL;
        foreach ($renda as $c_renda) {
            echo $renda_total = $renda_total + $c_renda['Renda']['valor_mensal'];
        }
        $this->set('renda_total', $renda_total);

        if ($this->Pontuacao->save($this->data)) {
            $this->Session->setFlash("Registro inserido");
        }
    }

    function edit($id = NULL) {

        // pr($id);
        $aluno = $this->Pontuacao->findById($id);
        // pr($aluno);
        $this->set('aluno', $aluno);

        if (empty($this->data)) {

            $this->data = $this->Pontuacao->read();

        } else {

            if ($this->Pontuacao->save($this->data)) {
                $this->Session->setFlash("Atualizado");
            }

        }

    }

    function view($id = NULL) {

        $pontuacao = $this->Pontuacao->findById($id);
        $this->set('pontuacao', $pontuacao);

        $aluno = $this->Pontuacao->Aluno->findById($id);
        $this->set('aluno', $aluno);

        // Calculo o total de integrantes da família
        $this->loadModel('Familia');
        $familia = $this->Familia->findAllByAlunoId($id);
        $i = 0;
        foreach ($familia as $c_familia) {
            $i++;
        }
        $this->set("total", $i);
        $this->set('familia', $familia);

        $this->loadModel('Aluno');
        $aluno = $this->Aluno->findById($id);
        $this->set('aluno', $aluno);

        $this->loadModel('Despesa');
        $despesa = $this->Despesa->findAllByAlunoId($id);
        $this->set('despesa', $despesa);

        // Calculo as outras rendas
        $this->loadModel("Renda");
        $renda = $this->Renda->findAllByAlunoId($id);
        $renda_total = NULL;
        foreach ($renda as $c_renda) {
            $renda_total = $renda_total + $c_renda['Renda']['valor_mensal'];
        }
        $this->set('renda_total', $renda_total);

    }

    // Usuarios nao autorizados
    function index0() {

        $this->set("pontuacao", $this->paginate('Pontuacao'));

    }


    // Usuarios autorizados
    function index() {

        $pontuacao = $this->Pontuacao->Aluno->find("all");
        $this->set("pontuacao", $pontuacao);

    }

}

?>