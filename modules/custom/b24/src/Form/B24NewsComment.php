<?php
namespace Drupal\b24\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

class B24NewsComment extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'news_comment';
  }

  /**
   * {@inheritdoc}
   */

  public function buildForm(array $form, FormStateInterface $form_state) {
    $routeMatch = \Drupal::routeMatch();
    $node = $routeMatch->getParameter('node');
    $nid = 0;
    if (!empty($node)) {
      $nid = $node->nid->value;
    }
    //dd($nid);die;

    $form['name'] = array (
      '#type' => 'textfield',
      '#required' => TRUE,
      '#attributes' => ['class'=>['form-control'],'placeholder'=>'Enter your name'],
      '#prefix' => '<div class="form-group">',
      '#suffix' => '</div>',
      '#title' => t('Name'),
    );

    $form['email'] = array (
      '#type' => 'email',
      '#required' => TRUE,
      '#attributes' => ['class'=>['form-control'],'placeholder'=>'Enter your email'],
      '#title' => t('Email'),
    );

    $form['node_id'] = array (
      '#type' => 'hidden',
      '#required' => TRUE,
      '#attributes' => ['class'=>['form-control'],'placeholder'=>'Enter your email'],
      '#title' => t('Node ID'),
      '#default_value' => $nid
    );

    $form['comment'] = array (
      '#type' => 'textarea',
      '#required' => TRUE,
      '#attributes' => ['class'=>['form-control'],'placeholder'=>'Enter your comment', 'id'=>"message", 'cols'=>"30", 'rows'=>"5" ],
      '#title' => t('Comment'),
    );

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Leave a comment'),
      '#attributes' => ['class'=>['btn btn-primary font-weight-bold px-3']],
      //'#button_type' => 'primary',
    );
    return $form;
  }

  public function validateForm(array &$form, FormStateInterface $form_state) {
    if(empty($form_state->getValue('name'))) {
      $form_state->setErrorByName('name', $this->t('Please enter your name'));
    }
    if(empty($form_state->getValue('name'))) {
      $form_state->setErrorByName('name', $this->t('Please enter your name'));
    }
    if(strlen($form_state->getValue('comment')) > 500 ) {
      $form_state->setErrorByName('comment', $this->t('Comment should not exceed 500 words'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $post = $form_state->getValues();
    $info = array(
      'name' => $post['name'],
      'email' => $post['email'],
      'node_id' => $post['node_id'],
      'comment' => $post['comment'],
      'status' => 1,
      'created' => \Drupal::time()->getRequestTime(),
    );

    \Drupal::database()->insert('b24_news_comment')->fields($info)->execute();

    \Drupal::messenger()->addMessage($this->t('You have successfully commented on this news'));
  
  }



}