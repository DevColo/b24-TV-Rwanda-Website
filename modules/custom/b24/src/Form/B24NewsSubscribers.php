<?php
namespace Drupal\b24\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

class B24NewsSubscribers extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'news_subscribers';
  }

  /**
   * {@inheritdoc}
   */

  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['subscriber_email'] = array (
      '#type' => 'email',
      '#required' => TRUE,
      '#attributes' => ['class'=>['form-control form-control-lg'],'placeholder'=>'Enter your email'],
      '#title' => t(''),
    );

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Subscribe'),
      '#attributes' => ['class'=>['btn btn-primary font-weight-bold px-3']],
      //'#button_type' => 'primary',
    );
    return $form;
  }

  public function validateForm(array &$form, FormStateInterface $form_state) {
    
    if(empty($form_state->getValue('subscriber_email'))) {
      $form_state->setErrorByName('subscriber_email', $this->t('Please enter your email'));
    }
    $email = trim($form_state->getValue('subscriber_email'));
    $b24_news_subscribers = \Drupal::database()->select('b24_news_subscribers','ns')->condition('email',$email)->fields('ns')->execute()->fetchAll();
    if(!empty($b24_news_subscribers)) {
      $form_state->setErrorByName('subscriber_email', $this->t('This email has already subscribed to our newsletter'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $post = $form_state->getValues();
    $info = array(
      'email' => $post['subscriber_email'],
      'status' => 1,
      'created' => \Drupal::time()->getRequestTime(),
    );
    $id = \Drupal::database()->insert('b24_news_subscribers')->fields($info)->execute();

  }



}