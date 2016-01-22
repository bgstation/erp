<?php

/**
 * This is the model class for table "servicos".
 *
 * The followings are the available columns in table 'servicos':
 * @property integer $id
 * @property string $titulo
 * @property string $preco
 * @property string $observacao
 */
class Servico extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'servicos';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('excluido', 'numerical', 'integerOnly' => true),
            array('titulo', 'length', 'max' => 200),
            array('preco', 'length', 'max' => 10),
            array('observacao', 'safe'),
            array('preco', 'tratarPreco'),
            array('titulo', 'required'),
            array('id, titulo, preco, observacao, excluido', 'safe', 'on' => 'search'),
        );
    }

    public function tratarPreco() {
        if (!empty($this->preco)) {
            $preco = str_replace('.', '', $this->preco);
            $this->preco = str_replace(',', '.', $preco);
        }
    }

    public function scopes() {
        return array(
            'naoExcluido' => array(
                'condition' => 't.excluido = false',
            ),
            'ordenarTitulo' => array(
                'order' => 't.titulo ASC',
            ),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Código',
            'titulo' => 'Titulo',
            'preco' => 'Preço',
            'observacao' => 'Observação',
            'excluido' => 'Excluido',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('titulo', $this->titulo, true);
        $criteria->compare('preco', $this->preco, true);
        $criteria->compare('observacao', $this->observacao, true);
        $criteria->compare('excluido', $this->excluido);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Servico the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getDataJson() {
        $aModels = array();
        $oModels = self::model()->naoExcluido()->ordenarTitulo()->findAll();
        if (!empty($oModels)) {
            $i = 0;
            foreach ($oModels as $model) {
                $aModels[$i]['id'] = $model->id;
                $aModels[$i]['text'] = $model->titulo;
                $aModels[$i]['preco'] = $model->preco;
                $aModels[$i]['tipoItem'] = 2;
                $i++;
            }
            $aModels[$i]['id'] = 0;
            $aModels[$i]['text'] = "Não cadastrado";
            $aModels[$i]['preco'] = 0.00;
            $aModels[$i]['tipoItem'] = 2;
        }
        return $aModels;
    }

}
