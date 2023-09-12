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
 *   id = "front_page_content_block",
 *   admin_label = @Translation("Front Page Content Block"),
 *   category = @Translation("B24 custom"),
 * )
 */
class FrontPageContentBlock extends BlockBase {

  
  public function build() {
    /**
     * Get Featured News Section Content
     */


    // First large-column display news
    $first_large_nid = \Drupal::database()->select('node_field_data', 'nfd');
    $first_large_nid->join('node__field_featured_news','fn','fn.entity_id=nfd.nid');
    //$first_large_nid->condition('fn.field_featured_news_value',1);
    $first_large_nid_or = $first_large_nid->orConditionGroup()->condition('nfd.type','sports')->condition('nfd.type','events')->condition('nfd.type','entertainment')->condition('nfd.type','news');

    $first_large_nid->condition($first_large_nid_or);
    $first_large_nid->condition('nfd.status',1);
    $first_large_nid->fields('nfd', ['nid','type']);
    $first_large_nid->range(0,4);
    $first_large_nid->orderBy('nfd.nid','DESC');
    $first_large_nids = $first_large_nid->execute()->fetchAll();

  
    //dd($non_first_large_nids);die;
    $first_large_nodes = [];

    if (!empty($first_large_nids)) {
      foreach($first_large_nids as $first_large_node_id){
        // load the node based on the id
        $node = \Drupal::entityTypeManager()->getStorage('node')->load($first_large_node_id->nid);
        $first_large_nodes[] = [
          'news' => $node
        ];
      }
      
    }

    // first small-column display news
    $first_small_nid = \Drupal::database()->select('node_field_data', 'nfd');
    $first_small_nid->join('node__field_featured_news','fn','fn.entity_id=nfd.nid');
    //$first_small_nid->condition('fn.field_featured_newfirst_small_value',1);
    $first_small_nid_or = $first_small_nid->orConditionGroup()->condition('nfd.type','sports')->condition('nfd.type','events')->condition('nfd.type','entertainment')->condition('nfd.type','news');

    $first_small_nid->condition($first_small_nid_or);
    $first_small_nid->condition('nfd.status',1);
    $first_small_nid->fields('nfd', ['nid','type']);
    //$first_small_nid->range(4,4);
    $first_small_nid->orderBy('nfd.nid','DESC');
    $first_small_nids = $first_small_nid->execute()->fetchAll();

  
    //dd($non_first_small_nids);die;
    $first_small_nodes = [];

    if (!empty($first_small_nids)) {
      foreach($first_small_nids as $first_small_node_id){
        // load the node based on the id
        $node = \Drupal::entityTypeManager()->getStorage('node')->load($first_small_node_id->nid);
        $first_small_nodes[] = [
          'news' => $node
        ];
      }
      
    }

    // second large-column display news
    $second_large_nid = \Drupal::database()->select('node_field_data', 'nfd');
    $second_large_nid->join('node__field_featured_news','fn','fn.entity_id=nfd.nid');
    //$second_large_nid->condition('fn.field_featured_newsecond_large_value',1);
    $second_large_nid_or = $second_large_nid->orConditionGroup()->condition('nfd.type','sports')->condition('nfd.type','events')->condition('nfd.type','entertainment')->condition('nfd.type','news');

    $second_large_nid->condition($second_large_nid_or);
    $second_large_nid->condition('nfd.status',1);
    $second_large_nid->fields('nfd', ['nid','type']);
    $second_large_nid->range(8,1);
    $second_large_nid->orderBy('nfd.nid','DESC');
    $second_large_nids = $second_large_nid->execute()->fetchAll();

  
    //dd($non_second_large_nids);die;
    $second_large_nodes = [];

    if (!empty($second_large_nids)) {
      foreach($second_large_nids as $second_large_node_id){
        // load the node based on the id
        $node = \Drupal::entityTypeManager()->getStorage('node')->load($second_large_node_id->nid);
        $second_large_nodes[] = [
          'news' => $node
        ];
      }
      
    }

    // second small-column display news
    $second_small_nid = \Drupal::database()->select('node_field_data', 'nfd');
    $second_small_nid->join('node__field_featured_news','fn','fn.entity_id=nfd.nid');
    //$second_small_nid->condition('fn.field_featured_newsecond_small_value',1);
    $second_small_nid_or = $second_small_nid->orConditionGroup()->condition('nfd.type','sports')->condition('nfd.type','events')->condition('nfd.type','entertainment')->condition('nfd.type','news');

    $second_small_nid->condition($second_small_nid_or);
    $second_small_nid->condition('nfd.status',1);
    $second_small_nid->fields('nfd', ['nid','type']);
    //$second_small_nid->range(9,4);
    $second_small_nid->orderBy('nfd.nid','DESC');
    $second_small_nids = $second_small_nid->execute()->fetchAll();

  
    //dd($non_second_small_nids);die;
    $second_small_nodes = [];

    if (!empty($second_small_nids)) {
      foreach($second_small_nids as $second_small_node_id){
        // load the node based on the id
        $node = \Drupal::entityTypeManager()->getStorage('node')->load($second_small_node_id->nid);
        $second_small_nodes[] = [
          'news' => $node
        ];
      }
      
    }
    //dd($featured_nodes);die;

    return [ 
         '#theme' => 'front_page_content',
         '#first_large_nodes' => $first_large_nodes,
         '#first_small_nodes' => $first_small_nodes,
         '#second_large_nodes' => $second_large_nodes,
         '#second_small_nodes' => $second_small_nodes,
     ];
  }

}