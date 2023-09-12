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
 *   id = "featured_news_block",
 *   admin_label = @Translation("Featured News Block"),
 *   category = @Translation("B24 custom"),
 * )
 */
class FeaturedNewsBlock extends BlockBase {

  
  public function build() {
    /**
     * Get Featured News Section Content
     */


    // Breaking news
    $f_nid = \Drupal::database()->select('node_field_data', 'nfd');
    $f_nid->join('node__field_featured_news','fn','fn.entity_id=nfd.nid');
    $f_nid->condition('fn.field_featured_news_value',1);
    $f_nid_or = $f_nid->orConditionGroup()->condition('nfd.type','sports')->condition('nfd.type','events')->condition('nfd.type','entertainment')->condition('nfd.type','news');

    $f_nid->condition($f_nid_or);
    $f_nid->condition('nfd.status',1);
    $f_nid->fields('nfd', ['nid','type']);
    $f_nid->range(0,10);
    $f_nid->orderBy('nfd.nid','DESC');
    $f_nids = $f_nid->execute()->fetchAll();

  
    //dd($non_f_nids);die;
    $featured_nodes = [];

    if (!empty($f_nids)) {
      foreach($f_nids as $featured_node_id){
        // load the node based on the id
        $featured = \Drupal::entityTypeManager()->getStorage('node')->load($featured_node_id->nid);
        $featured_nodes[] = [
          'news' => $featured
        ];
      }
      
    }
    //dd($featured_nodes);die;

    return [ 
         '#theme' => 'featured_news',
         '#featured_nodes' => $featured_nodes,
     ];
  }

}