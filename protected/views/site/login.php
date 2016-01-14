
<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
?>

<h1>Login</h1>

<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'login-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    ));
    ?>

    <p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

    <div class="row">
        <?php echo $form->labelEx($model, 'username'); ?>
        <?php echo $form->textField($model, 'username'); ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php echo $form->passwordField($model, 'password'); ?>
        <?php echo $form->error($model, 'password'); ?>
    </div>

    <div class="row buttons">
        <?php
        echo CHtml::openTag('div', array('class' => 'form-btns'));
        $this->widget(
                'bootstrap.widgets.TbButton', array(
            'type' => 'success',
            'size' => 'small',
            'buttonType' => 'submit',
            'label' => 'Login'
                )
        );
        ?>
    </div>

    <?php $this->endWidget(); ?>
</div>
