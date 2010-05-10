<?php

class Familia extends AppModel {

    var $name = 'Familia';
    var $displayField = 'nome';

    var $belongsTo = 'Aluno';

    var $validate = array(
            'idade'=>array('rule'=>'numeric',
                            'message'=>'Digite um número'),
            'rendimento'=>array('rule'=>'numeric',
                            'required'=>false,
                            'allowEmpty'=>true,
                            'message'=>'Digite somente números inteiros')
    );
}

?>
