<?php

namespace Drupal\b24\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;
use Drupal\Core\Url;
use Drupal\Core\Link;
use Drupal\user\Entity\User;
use Drupal\file\Entity\File;
/**
 * Provides 'Home Page Slider' Block.
 *
 * @Block(
 *   id = "home_page_slider_block",
 *   admin_label = @Translation("Home Page Slider"),
 *   category = @Translation("B24 custom"),
 * )
 */
class HomePageSliderBlock extends BlockBase {

  
  public function build() {
    /**
     * Get Home Page Center Section Content
     */

    // News for slider
    $s_nid = \Drupal::database()->select('node_field_data', 'nfd');
    $s_nid->join('node__field_display_on_home_slider','hs','hs.entity_id=nfd.nid');
    $s_nid->condition('nfd.type', 'news');
    $s_nid->condition('nfd.status',1);
    $s_nid->condition('hs.field_display_on_home_slider_value',1);
    $s_nid->fields('nfd', ['nid','type']);
    $slider_nid = $s_nid->execute()->fetchAll();

    // News for the 4 columns at the slider righ
    $n_s_nid = \Drupal::database()->select('node_field_data', 'nfd');
    $n_s_nid->join('node__field_display_on_home_slider','hs','hs.entity_id=nfd.nid');
    //$n_s_nid->orConditionGroup()->condition('nfd.type','sports')->condition('nfd.type','events')->condition('nfd.type','entertainment');
    $n_s_nid->condition('nfd.type','news','<>');
    $n_s_nid->condition('nfd.status',1);
    $n_s_nid->condition('hs.field_display_on_home_slider_value',1);
    $n_s_nid->fields('nfd', ['nid','type']);
    $n_s_nid->range(0,4);
    $n_s_nid->orderBy('nfd.nid','DESC');
    $non_slider_nid = $n_s_nid->execute()->fetchAll();

    // Breaking news
    $breaking_nid = \Drupal::database()->select('node_field_data', 'nfd');
    $breaking_nid_or = $breaking_nid->orConditionGroup()->condition('nfd.type','sports')->condition('nfd.type','events')->condition('nfd.type','entertainment')->condition('nfd.type','news');

    $breaking_nid->condition($breaking_nid_or);
    $breaking_nid->condition('nfd.status',1);
    $breaking_nid->fields('nfd', ['nid','type']);
    $breaking_nid->range(0,10);
    $breaking_nid->orderBy('nfd.nid','DESC');
    $breaking_nids = $breaking_nid->execute()->fetchAll();

  
    //dd($non_slider_nid);die;
    $slider_nodes = [];
    $non_slider_nodes = [];
    $breaking_nodes = [];

    if (!empty($slider_nid)) {
      foreach($slider_nid as $slider_node_id){
        // load the node based on the id
        $slider = \Drupal::entityTypeManager()->getStorage('node')->load($slider_node_id->nid);
        $slider_nodes[] = [
          'news' => $slider
        ];
      }
      
    }

    if (!empty($non_slider_nid)) {
      foreach($non_slider_nid as $non_slider_node_id){
        // load the node based on the id
        $non_slider = \Drupal::entityTypeManager()->getStorage('node')->load($non_slider_node_id->nid);
        $non_slider_nodes[] = [
          'news' => $non_slider
        ];
      }
      
    }

    if (!empty($breaking_nids)) {
      foreach($breaking_nids as $breaking_node_id){
        // load the node based on the id
        $b_node = \Drupal::entityTypeManager()->getStorage('node')->load($breaking_node_id->nid);
        $breaking_nodes[] = [
          'news' => $b_node
        ];
      }
      
    }

    //dd($breaking_nids);die;

    return [ 
         '#theme' => 'home_slider',
         '#non_slider_nodes' => $non_slider_nodes,
         '#slider_nodes' => $slider_nodes,
         '#breaking_nodes' => $breaking_nodes
     ];
  }

}