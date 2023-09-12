<?php

namespace Drupal\tag_custom\Plugin\Block;

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
 *   id = "product_colors_block",
 *   admin_label = @Translation("Product Colors Block"),
 *   category = @Translation("tag custom"),
 * )
 */
class ProductColorsBlock extends BlockBase {

  
  public function build() {
    $colorNodesArr = [];
    $nids = [];
    $routeMatch = \Drupal::routeMatch();
    $node = $routeMatch->getParameter('node');
    if ($node instanceof Node) {
      if ($node->getType()  == 'product') {
       // dd($node->nid->value);die;
          $nids = $this->edelmanGetProductColors($node->nid->value);
          $colorNodesArr = \Drupal\node\Entity\Node::loadMultiple($nids);
          //dd($colorNodesArr);die;
      }
      elseif ($node->getType()  == 'product_colors') {
          $parent_nid = $node->field_main_product[0]->target_id;
         // dd($parent_nid);die;
          $nids = $this->edelmanGetProductColors($parent_nid);
          $colorNodesArr = \Drupal\node\Entity\Node::loadMultiple($nids);
      }
      elseif ($node->getType()  == 'floor_and_wall_tiles') {
        //dd($node->nid->value);die;
          $nids = $this->edelmanGetProductColors($node->nid->value);
          $colorNodesArr = \Drupal\node\Entity\Node::loadMultiple($nids);
          //dd($colorNodesArr);die;
      }
      elseif ($node->getType()  == 'floor_and_wall_tiles_color') {
          $parent_nid = $node->field_main_tile_product[0]->target_id;
         // dd($parent_nid);die;
          $nids = $this->edelmanGetProductColors($parent_nid);
          $colorNodesArr = \Drupal\node\Entity\Node::loadMultiple($nids);
      }
    }
   
    //dd($colorNodesArr);die;
      // if (arg(0) == 'node' && arg(1) != '') {
      //   $node_id  = arg(1);
      //   $c_node = node_load($node_id);
      //   //echo "<pre>";print_r($c_node);die;
      //   if ($c_node->type == 'product_colors') {
      //     $parent_nid = $c_node->field_main_product['und']['0']['nid'];
      //     $color_nodes_arr = $this->edelmanGetProductColors($node->nid);
      //   }
    //     elseif ($node->getType()  == 'product') {
    //       $color_nodes_arr = $this->edelmanGetProductColors($node->nid);
    //     }
    //     elseif ($c_node->type == 'accents_common') {
    //       $color_nodes_arr = edelman_custom_get_sheepskins_inventory_products($node_id);
    //     }
    //     elseif ($c_node->type == 'accents_common_color') {
    //       $parent_nid = $c_node->field_accents_main_product['und']['0']['nid'];
    //       $color_nodes_arr = edelman_custom_get_sheepskins_inventory_products($parent_nid);
    //     }
    //     elseif ($c_node->type == 'tile_texture_products') {
    //       $color_nodes_arr = edelman_custom_get_procelain_tile_colors($node_id);
    //     }
    //     elseif ($c_node->type == 'tile_product_colors') {
    //       $parent_nid = $c_node->field_main_tile_texture_product['und']['0']['nid'];
    //       $color_nodes_arr = edelman_custom_get_procelain_tile_colors($parent_nid);
    //     }
    //   }
    //   $block['subject'] = '';   
    //   $block['content'] = theme('product_color_list', array('content' => array('color_nodes_arr' => $color_nodes_arr))); 

    return [ 
         '#theme' => 'product_color_list',
         '#color_nodes_arr' => $colorNodesArr,
         '#cache' => [
            'max-age' => 0,
         ],
     ];
  }

  function edelmanGetProductColors($id = NULL) {

$main_data = \Drupal::entityTypeManager()->getStorage('node')->load($id);
//echo $main_data->type;die;
  if ($main_data->getType() == 'cow_rugs' || $main_data->getType() == 'cow_rugs_color') {
    // //echo "true";die;
    // //$db_or = db_or();
    // $query = \Drupal::database()->select('node__field_main_product', 'r');
    // $query->join('node_field_data', 'n', 'n.nid = r.entity_id');  
    // $query->join('field_data_field_cowrugs_color_weight', 'c', 'n.nid = c.entity_id'); 
    // //$query->leftjoin('field_data_field_color_special', 'cs', 'r.entity_id = cs.entity_id'); 
    // $query->condition('r.field_main_product_nid', $id); 
    // $query->condition('n.status', 1);
    // //$db_or->condition('cs.field_color_special_value', '2' , '<>');
    // //$db_or->condition('cs.field_color_special_value', NULL);
    // //$query->condition($db_or);
    // //$query->condition('cs.field_color_special_value', 2, '<>');
    // $query->fields('n', array('nid'));
    // $query->fields('n', array('title'));
    // $query->orderBy('c.field_cowrugs_color_weight_value', 'ASC');
    // //print strtr((string) $query, $query->arguments());die;
    // $result = $query->execute();
    // $colors_nids = array();
    // while ($record = $result->fetchAssoc()) {
    //   $colors_nids[] = $record['nid'];
    // }
    // //echo "<pre>";print_r($colors_nids);die;
    // return $colors_nids; 
  }
  elseif($main_data->getType() == 'floor_and_wall_tiles' || $main_data->getType() == 'floor_and_wall_tiles_color'){
    //dd($id);die;
     $query2 = \Drupal::database()->select('node_field_data', 'n');
     $query2->join('node__field_product_color', 't', 't.entity_id = n.nid');
     $query2->join('node__field_main_tile_product', 'mtp', 'mtp.entity_id = n.nid');
     $query2->fields('n', array('nid', 'title'));      
     $query2->condition('n.type', 'floor_and_wall_tiles_color', '=');
     $query2->condition('mtp.field_main_tile_product_target_id', $id, '=');
     $query2->condition('n.status', 1);
     $result = $query2->execute();
        $colors_nids = array();
        while ($record = $result->fetchAssoc()) {
        $colors_nids[] = $record['nid'];
        }
        //echo "<pre>";print_r($colors_nids);die;
        return $colors_nids; 
  } 
  else {
    // if (isset($main_data->field_pattern_product['und'][0]['value'] ) && $main_data->field_pattern_product['und'][0]['value'] == 1 ) {
    //   $query = db_select('field_data_field_main_product', 'r');
    //   $query->join('node', 'n', 'n.nid = r.entity_id');  
    //   //$query->join('field_data_field_color_weight', 'c', 'n.nid = c.entity_id'); 
    //   $query->condition('r.field_main_product_nid', $id); 
    //   $query->condition('n.status', 1);
    //   $query->fields('n', array('nid'));
    //   $query->fields('n', array('title'));
    //   // $query->orderBy('c.field_color_weight_value', 'ASC');
    //   $result = $query->execute();
    //   $colors_nids = array();
    //   while ($record = $result->fetchAssoc()) {
    //   $colors_nids[] = $record['nid'];
    //   }
    //   return $colors_nids;
    // }
    // else {
      /* $query2 = db_select('field_data_field_main_product', 'r');
      $query2->join('node', 'n', 'n.nid = r.entity_id');         
      $query2->join('field_data_field_color_code', 'cs', 'r.entity_id = cs.entity_id'); 
      $query2->join('tag_csv_inventory3', 'ts', 'ts.item = cs.field_color_code_value'); 
      //$query2->join('tag_csv_inventory2', 'ci', 'ci.item = ts.item'); 
      $query2->condition('r.field_main_product_nid', $id); 
      $query2->condition('n.status', 1);
      //$query2->condition('ts.created', $get_last_created_date, '=');
      $query2->fields('ts',array('item'));
      //print strtr((string) $query2, $query2->arguments());die;
      $result2 = $query2->execute()->fetchAll();
      $newcolors = array();
      foreach($result2 as $k => $colorcodes) {
          $newcolors[] = $colorcodes->item;
      } */
      // $newcolors = db_query("SELECT item FROM {tag_csv_inventory3}")->fetchAllKeyed(0, 0);
      // //echo "<pre>";print_r($inventory_products);die;
      // if (!empty($newcolors)) {
      //   $query = db_select('field_data_field_main_product', 'r');
      //   $query->join('node', 'n', 'n.nid = r.entity_id');  
      //   $query->join('field_data_field_color_column', 'c', 'n.nid = c.entity_id');
      //   //$query->join('field_data_field_color_weight', 'c', 'n.nid = c.entity_id');         
      //   $query->join('field_data_field_color_code', 'cs', 'r.entity_id = cs.entity_id'); 
      //   //$query->join('tag_csv_inventory3', 'ts', 'ts.item = cs.field_color_code_value'); 
      //   $query->condition('r.field_main_product_nid', $id); 
      //   $query->condition('n.status', 1);
      // /*  $query->condition('cs.field_color_code_value', $newcolors, 'NOT IN'); */
      //   //$query->condition('n.type', $main_data->type, '=');
      //   //$db_or->condition('cs.field_color_special_value', '2' , '<>');
      //   //$db_or->condition('cs.field_color_special_value', NULL);
      //   //$query->condition($db_or);
      //   //$query->condition('cs.field_color_special_value', 2, '<>');
      //   $query->fields('n', array('nid'));
      //   //$query->fields('ts', array('item'));
      //   $query->fields('n', array('title'));
      //   $query->orderBy('c.field_color_column_value', 'ASC');
      //   //print strtr((string) $query, $query->arguments());die;
      //   $result = $query->execute();
      //   $colors_nids = array();
      //   while ($record = $result->fetchAssoc()) {
      //     $colors_nids[] = $record['nid'];
      //   }
      //   //echo "<pre>";print_r($colors_nids);die;
      //   return $colors_nids;
      // } 
      // else {
        $query = \Drupal::database()->select('node__field_main_product', 'r');
        $query->join('node_field_data', 'n', 'n.nid = r.entity_id');  
        $query->join('node__field_color_column', 'c', 'n.nid = c.entity_id');
        //$query->join('field_data_field_color_weight', 'c', 'n.nid = c.entity_id');         
        //$query->leftjoin('field_data_field_color_special', 'cs', 'r.entity_id = cs.entity_id'); 
        $query->condition('r.field_main_product_target_id', $id); 
        $query->condition('n.status', 1);
        //$query->condition('n.type', $main_data->type, '=');
        //$orCondition = $query->orConditionGroup()->condition('cs.field_color_special_value', '2' , '<>')->condition('cs.field_color_special_value', NULL);
        //$query->condition($orCondition);
        //$query->condition('cs.field_color_special_value', 2, '<>');
        $query->fields('n', array('nid'));
        $query->fields('n', array('title'));
        $query->orderBy('c.field_color_column_value', 'ASC');
        //print strtr((string) $query, $query->arguments());die;
        $result = $query->execute();
        $colors_nids = array();
        while ($record = $result->fetchAssoc()) {
        $colors_nids[] = $record['nid'];
        }
        //echo "<pre>";print_r($colors_nids);die;
        return $colors_nids; 
      // }
   // }
  }
  //One way
  //echo $query->__toString();
  //Second way
  //echo (string)$query;  
}

}