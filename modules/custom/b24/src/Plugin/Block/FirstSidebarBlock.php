<?php

namespace Drupal\b24\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;
use Drupal\Core\Url;
use Drupal\Core\Link;
use Drupal\user\Entity\User;
use Drupal\file\Entity\File;
/**
 * Provides 'Featured News' Block.
 *
 * @Block(
 *   id = "first_sidebar_lock",
 *   admin_label = @Translation("First Sidebar Block"),
 *   category = @Translation("B24 custom"),
 * )
 */
class FirstSidebarBlock extends BlockBase {

  
  public function build() {

    /**
     * Get Featured News Section Content
     */


    // Breaking news
    $breaking_nid = \Drupal::database()->select('node_field_data', 'nfd');
    $breaking_nid_or = $breaking_nid->orConditionGroup()->condition('nfd.type','sports')->condition('nfd.type','events')->condition('nfd.type','entertainment')->condition('nfd.type','news');

    $breaking_nid->condition($breaking_nid_or);
    $breaking_nid->condition('nfd.status',1);
    $breaking_nid->fields('nfd', ['nid','type']);
    $breaking_nid->range(0,5);
    $breaking_nid->orderBy('nfd.nid','DESC');
    $breaking_nids = $breaking_nid->execute()->fetchAll();

  
    $breaking_nodes = [];
    if (!empty($breaking_nids)) {
      foreach($breaking_nids as $breaking_node_id){
        // load the node based on the id
        $b_node = \Drupal::entityTypeManager()->getStorage('node')->load($breaking_node_id->nid);
        $breaking_nodes[] = [
          'news' => $b_node
        ];
      }
      
    }
    //dd($featured_nodes);die;

    return [ 
        '#theme' => 'first_sidebar',
        '#trending_nodes' => $breaking_nodes
     ];
  }

}