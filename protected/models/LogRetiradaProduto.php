<?php

/**
 * This is the model class for table "logs_retiradas_produtos".
 *
 * The followings are the available columns in table 'logs_retiradas_produtos':
 * @property integer $id
 * @property integer $produto_id
 * @property integer $quantidade
 * @property integer $usuario_id
 * @property string $observacao
 * @property string $data_hora
 */
class LogRetiradaProduto extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'logs_retiradas_produtos';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('produto_id, quantidade, usuario_id', 'numerical', 'integerOnly' => true),
            array('observacao, data_hora', 'safe'),
            array('quantidade, usuario_id, produto_id', 'required'),
            array('id, produto_id, quantidade, usuario_id, observacao, data_hora', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'produto' => array(self::BELONGS_TO, 'Produto', 'produto_id'),
            'usuario' => array(self::BELONGS_TO, 'Usuario', 'usuario_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'produto_id' => 'Produto',
            'quantidade' => 'Quantidade',
            'usuario_id' => 'Usuário',
            'observacao' => 'Observação',
            'data_hora' => 'Data',
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
        $criteria->compare('produto_id', $this->produto_id);
        $criteria->compare('quantidade', $this->quantidade);
        $criteria->compare('usuario_id', $this->usuario_id);
        $criteria->compare('observacao', $this->observacao, true);
        $criteria->compare('data_hora', $this->data_hora, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return LogRetiradaProduto the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function salvar() {
        $this->attributes = $_POST['LogRetiradaProduto'];
        $this->data_hora = date("Y-m-d H:i:s");
        $this->usuario_id = Yii::app()->user->getId();
        if ($this->save()) {
            return true;
        }
        return false;
    }

}
