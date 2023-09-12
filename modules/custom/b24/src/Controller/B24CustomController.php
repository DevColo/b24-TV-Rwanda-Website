<?php

/**
 * @file
 * Contains \Drupal\tag_custom\Controller\TagCustomController.
 */

namespace Drupal\tag_custom\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Drupal\user\UserInterface;
use \Drupal\Core\Database\Connection;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Core\Routing\TrustedRedirectResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Drupal\taxonomy\Entity\Term;
use Drupal\Core\Entity\Entity\EntityViewDisplay;
use Drupal\Core\Database\Query\PagerSelectExtender;

class TagCustomController extends ControllerBase {
  /**
   * The database connection
   *
   * @var \Drupal\Core\Database\Connection
   */
  protected $database;

  /**
   * The current user
   *
   * @var \Drupal\Session\AccountProxyInterface
   */
  protected $currentUser;

  /**
  * Press theme render for data
  */
  function edelmanPressPage() {
    $press_items = []; 
    $press_items = $this->edelmanGetPressNodes();

    // load the press block based on the id
    $block_id = 9;
    $press_block = \Drupal::entityTypeManager()->getStorage('block_content')->load($block_id);
    //dd($press_items);die;

    //$image_details = [];
    $press_nodes = [];
    foreach($press_items as $node_id){

      // load the press nodes based on the id
      $node = \Drupal::entityTypeManager()->getStorage('node')->load($node_id);
      //dd($node);die;
      if (!empty($node->field_bulk_image_upload_detail)) {
        foreach($node->field_bulk_image_upload_detail as $key => $image_upload_details){
          // load the node field collection items
          $image_details[] = \Drupal::entityTypeManager()->getStorage('field_collection_item')->load($image_upload_details->target_id);
        }
      }
      $press_nodes[] = [
            'nid' => $node->nid,
            'title' => $node->title,
            'thumb_landing_image' => $node->field_thumb_landing_image,
            'image_details' => $image_details
          ];

    }

   $new_press_node = [];
   $nids = [];
   $nid = [];
   foreach($press_nodes as $value){
      $node_id = $value['nid'][0]->value;

      foreach($value['image_details'] as $item){
        $nid = \Drupal::database()->select('node__field_bulk_image_upload_detail', 'iud')
        ->fields('iud', ['field_bulk_image_upload_detail_target_id'])
        ->condition('iud.entity_id', $node_id)
       // ->condition('iud.field_bulk_image_upload_detail_target_id', $item->item_id[0]->value)
        ->execute()
        ->fetchAll();

        foreach($nid as $k => $nid_arr){
          if ($nid_arr->field_bulk_image_upload_detail_target_id == $item->item_id[0]->value) {
            $new_press_node[$node_id][] = [
              'item' => [
                      'nid' => $node_id,
                      'thumb_landing_image' => $value['thumb_landing_image'],
                      'title' => $value['title'][0]->value,
                    ],
              'image_details' => $item
            ];
          }
        }
      }    
   } 
//dd($new_press_node);die;
 

    return [ 
      '#theme' => 'press_items',
      '#press_items' => $new_press_node,
      '#press_block' => $press_block
    ];
  }

  /**
   * Render the list of nodes for press
   */
  function edelmanGetPressNodes() {
    $nids = \Drupal::database()->select('node_field_data', 'nfd')
      ->fields('nfd', ['nid','title'])
      ->condition('nfd.type', 'press')
      ->orderBy('nfd.nid', 'DESC')
      ->execute()
      ->fetchCol();
    return $nids;
  }

  public function edelmanPhotoGallery(){
    $ph_gallery_items = []; 
    $ph_gallery_items = $this->edelmanGetPhotoGalleryNodes();
    $image_details = [];
    $node_array = [];
    //dd($ph_gallery_items);die;

    // load the photo gallery block based on the id
    $block_id = 10;
    $ph_gallery_block = \Drupal::entityTypeManager()->getStorage('block_content')->load($block_id);
    
    foreach ($ph_gallery_items as $node_id) {
      // load the press nodes based on the id
      $node = \Drupal::entityTypeManager()->getStorage('node')->load($node_id); 
      $node_title = $node->title;
      $term = Term::load($node->field_select_filters[0]->target_id);
      
      $filter_name = strtolower(preg_replace('/[\W\s\/]+/', '-', $term->name[0]->value));

      
      if(!empty($node->field_thumb_landing_image)){
        $thumb_landing_image = $node->field_thumb_landing_image;
      }else{
        $thumb_landing_image = '';
      }

      if (!empty($node->field_bulk_image_upload_detail)) {
        foreach($node->field_bulk_image_upload_detail as $key => $image_upload_details){
          // load the node field collection items
          $image_details[] = \Drupal::entityTypeManager()->getStorage('field_collection_item')->load($image_upload_details->target_id);
        }
      }
      
      $ph_gallery_nodes[] = [
        'nid' => $node->nid,
        'title' => $node->title,
        'thumb_landing_image' => $thumb_landing_image,
        'filter_name' => $filter_name,
        'image_details' => $image_details
      ];   

      $node_array[$node_id] = $node; 
    }
    $photo_gallery_filters =\Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadByProperties(['vid' => 'photo_gallery_filters']);

    $new_photo_gallery_node = [];
    $nids = [];
    $nid = [];
    foreach($ph_gallery_nodes as $value){
      $node_id = $value['nid'][0]->value;

      foreach($value['image_details'] as $item){
        $nid = \Drupal::database()->select('node__field_bulk_image_upload_detail', 'iud')
        ->fields('iud', ['field_bulk_image_upload_detail_target_id'])
        ->condition('iud.entity_id', $node_id)
       // ->condition('iud.field_bulk_image_upload_detail_target_id', $item->item_id[0]->value)
        ->execute()
        ->fetchAll();

        foreach($nid as $k => $nid_arr){
          if ($nid_arr->field_bulk_image_upload_detail_target_id == $item->item_id[0]->value) {
            $new_photo_gallery_node[$node_id][] = [
              'item' => [
                      'nid' => $node_id,
                      'thumb_landing_image' => $value['thumb_landing_image'],
                      'filter_name' => $value['filter_name'],
                      'title' => $value['title'][0]->value,
                    ],
              'image_details' => $item
            ];
          }
        }
      }    
   } 

    return [ 
      '#theme' => 'photo_gallery',
      '#ph_gallery_items' => $new_photo_gallery_node,
      '#ph_gallery_block' => $ph_gallery_block,
      '#photo_gallery_filters' => $photo_gallery_filters,
      '#node_array' => $node_array
    ];
  }

  /**
   * Render the list of nodes for photo gallery
   */
  function edelmanGetPhotoGalleryNodes() {
    $query = \Drupal::database()->select('node_field_data', 'nfd');
    $query->join('node__field_select_filters', 'sf', 'sf.entity_id = nfd.nid');
    $query->join('taxonomy_term_field_data', 't', 't.tid = sf.field_select_filters_target_id');
    $query->fields('nfd', ['nid','title']);
    $query->condition('nfd.type', 'photo_gallery');
    $query->condition('nfd.status', 1);
    $query->orderBy('t.weight', 'ASC');
    $nids = $query->execute()->fetchCol();

    return $nids;
  }

  /**
   * Render page containing recent blog entries of all users
   */
  function edelmanProductListPage($type = 'ul', $sub_type = NULL) {
    $activeTheme = \Drupal::theme()->getActiveTheme();
  
    // Get the theme name.
    $theme = $activeTheme->getName();

    $current_path = \Drupal::service('path.current')->getPath();
    $current_path_alias = \Drupal::service('path_alias.manager')->getAliasByPath($current_path);
    $host = explode('/', $current_path_alias);
    $type =  $host[3];
    $sub_type = $host[2];


    if ($host[0] === 'ads') {
        $type = 'ads';
    }
    if ($host[2] == 'browse-bycolor' || (isset($host[3]) && $host[3] == 'bycolor-new') || $host[2] == 'find-my-leather-tool') {
        $type = 'browse-bycolor';
    }
    if ($host[2] == 'last-chance') {
        $type = 'archived-color-products';
    }
    $build = [];
    $results = []; 


    switch ($type) {
        case 'ul':
            $content_type = 'product';
            $theme_file = 'product_list';
        break;
        case 'cavallini-rug-patterns':
            $content_type = 'patchwork_rugs';
            $theme_file = 'product_list';
        break;
        case 'cow-rugs':
            $content_type = 'cow_rugs';
            $theme_file = 'product_list';
        break;
        case 'floor-and-wall-tiles':  
            $content_type = 'floor_and_wall_tiles';
            $theme_file = 'product_list';  
        break;
        /*case 'floor-and-wall-tiles':  
            /*if(!empty($sub_type) && $sub_type == 'color'){
            $content_type = 'floor_and_wall_tiles_color';
            $theme_file = 'product_list';
            //}
        break;*/
        case 'archived-color-products':
            $content_type = 'archived_color_products';
            $theme_file = 'product_list';
        break;
        case 'collections':
            $content_type = 'collections';
            $theme_file = 'product_list';
        break;
        case 'ads':
            $content_type = 'ads';
            $theme_file = 'product_list';
        break;
        case 'outletsale':
            $content_type = 'rugsale';
            $theme_file = 'product_list';
        break;
        case 'browse-bycolor':
            $content_type = 'product_colors';
            $theme_file = 'product_list';
        break;
        default:
            $content_type = 'product';
            $theme_file = 'product_list';
        break;
    }

    if ($host[2] != 'find-my-leather-tool') {
  // drupal_add_js('initializeProductsList("' . $content_type . '");', array('type' => 'inline', 'scope' => 'footer', 'weight' => 5));

      //$variables['#attached']['drupalSettings']['contentType'] =$theme;
    }
    //drupal_add_js('var content_type="' . $content_type . '";', array('type' => 'inline', 'scope' => 'footer', 'weight' => 5));
      // Create a render array for your JavaScript code.
     // dd($element);die;

    //optimization - VJ
   /*
    if ($host[2] == 'browse-bycolor' || (isset($host[3]) && $host[3] == 'bycolor-new') || $host[2] == 'find-my-leather-tool' || (isset($host[3]) && $host[3] == 'cow-rugs') || $host[3] == 'cavallini-rug-patterns') {
      $nids = [];
      $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);

      if ($content_type != 'rugsale') {
        $build = array(
          '#theme' => $theme_file,
          '#list_content' => $this->edelmanProductsNodeViewMultiple($nodes),
          '#type' => $content_type,
        );
      }
      else {
        $build = array(
          '#theme' => $theme_file,
          '#list_content' => $this->edelmanProductsNodeViewMultiple($nodes),
          '#type' => $content_type,
        );
      }
      return $build;
    }
    */


    if ($content_type == 'rugsale') {
        $query = \Drupal::database()->select('node_field_data', 'nfd');
        $nids = $query
        ->fields('nfd', ['nid', 'title'])
        ->condition('nfd.type', $content_type)
        ->condition('nfd.status', 1)
        ->orderBy('nfd.title', 'ASC')
        ->addTag('node_access')
        ->execute()
        ->fetchCol(); 
    }
    elseif ($content_type == 'archived_color_products') {
        /* $query = \Drupal::database()->select('node', 'n');
        $query->join('field_data_field_color_special', 'c', 'n.nid = c.entity_id');
        $query->join('field_data_field_main_product', 'm', 'm.entity_id = n.nid');
        $query->join('node', 'p', 'p.nid = m.field_main_product_nid'); 
        $query->fields('n', array('nid', 'title'));
        $query->condition('n.type', 'product_colors');
        $query->condition('c.field_color_special_value', 2);
        $query->condition('n.status', 1);
        $query->orderBy('p.title', 'ASC');
        $query->addTag('node_access');
        $nids = $query->execute()->fetchCol(); */

        // $inventory_products = db_query("SELECT item FROM {tag_csv_inventory3}")->fetchAllKeyed(0, 0);
        // $query = \Drupal::database()->select('node', 'n');
        // $query->join('field_data_field_color_code', 'c', 'n.nid = c.entity_id');
        // //$query->join('tag_csv_inventory3', 't', 't.item = c.field_color_code_value');
        // $query->join('field_data_field_main_product', 'm', 'm.entity_id = n.nid');
        // $query->join('node', 'p', 'p.nid = m.field_main_product_nid'); 
        // $query->fields('n', array('nid', 'title'));
        // $query->fields('c', array('field_color_code_value'));
        // $query->condition('n.type', 'product_colors');
        // //$query->condition('c.field_color_special_value', 2);
        // $query->condition('c.field_color_code_value', $inventory_products, 'IN');
        // $query->condition('n.status', 1);
        // $query->orderBy('p.title', 'ASC');
        // $query->addTag('node_access');
        // //Print strtr((string) $query,   $query->arguments());die;
        // $result = $query->execute()->fetchAll();

        // foreach ($result as $key => $value) {
        //     $colorcode = $value->field_color_code_value;
        //     $show_limitedstock = edelman_redesign_check_item_in_archived_inventory_by_colorcode($colorcode);
        //     if ($show_limitedstock != -1) {
        //         $nids[] = $value->nid;
        //     }
        // }
        // $exclude_samplebox = edelman_redesign_check_exclude_sample_box_for_archivednodid($nids);
    }
    elseif ($content_type == 'floor_and_wall_tiles') {
        $url = (!empty($_SERVER['HTTPS'])) ? "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] : "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        $parts = parse_url($url);
        $path_parts = explode('/', $parts[path]);
        $walls = $path_parts[4];
        $floors = $path_parts[5];
        $val_flw = 'walls';
        $query = \Drupal::database()->select('node', 'n');
        $query->join('field_data_field_floor_and_walls_settings', 'w', 'n.nid = w.entity_id');
        $query->join('field_data_field_display_weight', 'dw', 'n.nid = dw.entity_id');
        $query->condition('n.type', $content_type);
        $query->condition('n.status', 1);
        if ($walls == '1' && $floors == '1') {
            $query->where("(w.field_floor_and_walls_settings_value = 'walls' OR w.field_floor_and_walls_settings_value = 'floors')");
        }
        elseif ($walls == '1') {
            $query->condition('w.field_floor_and_walls_settings_value', 'walls', '=');
        }
        elseif ($floors == '1') {
            $query->condition('w.field_floor_and_walls_settings_value', 'floors', '=');
        }
        $query->fields('n', array('nid', 'title'));
        $query->orderBy('dw.field_display_weight_value', 'ASC');
        $query->addTag('node_access');
        $nodeid = $query->execute();
        $nids = $nodeid->fetchCol(); 
    }
    elseif ($content_type == 'collections') {
        $query = \Drupal::database()->select('node', 'n');
        $query->join('field_data_field_display_weight', 'dw', 'n.nid = dw.entity_id');
        $query->condition('n.type', $content_type);
        $query->condition('n.status', 1);
        $query->fields('n', array('nid', 'title'));
        $query->orderBy('dw.field_display_weight_value', 'ASC');
        $query->addTag('node_access');
        $nodeid = $query->execute();
        $nids = $nodeid->fetchCol();
    }
    elseif ($content_type == 'product_colors') {
      $url_param = explode('&',$host[4]);
      $color_tid = str_replace('color_tid=','',$url_param[7]);
      
        $query = \Drupal::database()->select('node_field_data', 'nfd');//->extend('Drupal\Core\Database\Query\PagerSelectExtender');
        $query->fields('nfd', ['nid', 'sticky', 'created']);
        $query->join('node__field_colorway', 'cw', 'nfd.nid = cw.entity_id');

        if (isset($color_tid) && $color_tid !=0 ) {
          $query->condition('cw.field_colorway_target_id', $color_tid);
        }

        $query->condition('nfd.type', $content_type);
        $query->condition('nfd.status', 1);

        $query->join('taxonomy_term__field_landing_page_color_order', 'flc', 'flc.entity_id = cw.field_colorway_target_id');
        $query->addExpression('CAST(flc.field_landing_page_color_order_value AS SIGNED)', 'field_landing_page_color_order_value_integer');
        $query->orderBy('field_landing_page_color_order_value', 'ASC');

        $query->join('node__field_color_weight', 'fcw', 'nfd.nid = fcw.entity_id');
        $query->addExpression('CAST(fcw.field_color_weight_value AS SIGNED)', 'field_color_weight_value_integer');

        // Order by the custom expression as an integer.
        $query->orderBy('field_color_weight_value_integer', 'ASC');
        $query->addTag('node_access');
        $nids = $query->execute()->fetchCol();
    }
    else {
        if ($theme == 'edelman'):
            $query = \Drupal::database()->select('node_field_data', 'nfd')->extend('Drupal\Core\Database\Query\PagerSelectExtender');
            $nids = $query
            ->fields('nfd', ['nid', 'sticky', 'created'])
            ->condition('type', $content_type)
            ->condition('status', 1)
            // ->orderBy('sticky', 'DESC')
            // ->orderBy('created', 'DESC')
            ->orderBy('nfd.title', 'ASC')
            ->limit(9)
            ->addTag('node_access')
            ->execute()
            ->fetchCol();
        elseif ($theme == 'edelmanleather'):
            //$path = drupal_get_path_alias(current_path()); 
           // $host = explode('/', $path);
            parse_str($host[4], $get_array);

            $page = ((!empty($get_array['page']))) ? $get_array['page'] : 0;
            $type = ((!empty($get_array['type']))) ? $get_array['type'] : 'product';

            $product_tags = (!empty($get_array['product_tags'])) ? explode(',', $get_array['product_tags']) : array();
            $industry_use = (!empty($get_array['industry_use'])) ? explode(',', $get_array['industry_use']) : array();
            $product_texture = (!empty($get_array['product_texture'])) ? explode(',', $get_array['product_texture']) : array();
            $product_application = (!empty($get_array['product_application'])) ? explode(',', $get_array['product_application']) : array();

            //dd($industry_use);die;
            $query = \Drupal::database()->select('node_field_data', 'nfd');
            $query->distinct();
            $query->fields('nfd', array('nid', 'sticky', 'created','title'));
            $query->condition('nfd.type', $type);
            $query->condition('nfd.status', 1);
            $query->orderBy('nfd.title', 'ASC');
            if (!empty($product_tags) && !empty($product_tags[0])) {
                if (!in_array("-1", $product_tags)) {
                    foreach ($product_tags as $key => $value) {
                        $aliasname = 'f' . $key;
                        $query->join('node__field_associated_types', $aliasname, 'nfd.nid = ' . $aliasname . '.entity_id');
                        $query->condition($aliasname . '.field_associated_types_target_id', $value);
                    }
                }
                else {

                }   
            }
            if (!empty($product_texture) > 0 && !empty($product_texture[0])) {
                $query->join('node__field_product_texture', 'ft', 'nfd.nid = ft.entity_id');  
                $query->condition('ft.field_product_texture_target_id', $product_texture, 'IN');
            }

            if (!empty($product_application) > 0 && !empty($product_application[0])) {
                $query->join('node__field_product_application', 'fa', 'nfd.nid = fa.entity_id');  
                $query->condition('fa.field_product_application_target_id', $product_application, 'IN');
            }  
            if (count($industry_use) > 0 && !empty($industry_use[0])) {
                foreach ($industry_use as $key => $value) {
                    $aliasname1 = 'fs' . $key;
                    $query->join('node__field_associated_suitabilities', $aliasname1, 'nfd.nid = ' . $aliasname1 . '.entity_id');  
                    $query->condition($aliasname1 . '.field_associated_suitabilities_target_id', $value);
                }
            }
            $nids = $query->execute()->fetchCol();
        endif;
    } 

    if (!empty($nids)) {
        $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);
        //dd($nodes);die;
        if ($content_type != 'rugsale') {
            $build = array(
                '#theme' => $theme_file,
                '#list_content' => $this->edelmanProductsNodeViewMultiple($nodes),
                '#type' => $content_type,
            );
        }
        else {
            $build = array(
                '#theme' => $theme_file,
                '#list_content' => $this->edelmanProductsNodeViewMultiple($nodes),
                '#type' => $content_type,
            );
        }
    }
    else {
      \Drupal::messenger()->addMessage(t('No Products entries have been created.'), 'error', TRUE);
     // \Drupal::messenger()->addMessage(t("No Products entries have been created."));
    }
    //dd($build);die;
    return $build;

    
}

  /*
  * Custom Node Multiple form 
  */
  function edelmanProductsNodeViewMultiple($nodes, $view_mode = 'teaser', $weight = 0, $langcode = NULL) {
    $build = [];
    foreach ($nodes as $key => $node) {
      $langcode = \Drupal::languageManager()->getCurrentLanguage()->getId();
      $build['nodes'][$key] = \Drupal::entityTypeManager()->getViewBuilder('node')->view($node, $view_mode, $langcode);
    }
    return $build;
  }

  /**
   * Render the custom capabilities page
   */
  function edelmanCustomCapabilities(){
    $customCapItems = [];
    $customCapItems = $this->edelmanGetCustomCapNodes();
    $customCapNodes = [];

    // load the photo custom capabilities block based on the id
    $block_id = 13;
    $custom_cap_block = \Drupal::entityTypeManager()->getStorage('block_content')->load($block_id);
    
    foreach ($customCapItems as $node_id) {
      // load the custom capabilities nodes based on the id
      $node = \Drupal::entityTypeManager()->getStorage('node')->load($node_id); 
      
      $customCapNodes[] = [
        'node' => $node,
      ]; 
    }

    return [ 
      '#theme' => 'custom_capabilities',
      '#custom_cap_block' => $custom_cap_block,
      '#node_array' => $customCapNodes
    ];
     
  }

   /**
   * Render the list of nodes for custom capabilities
   */
  function edelmanGetCustomCapNodes() {
    $nids = \Drupal::database()->select('node_field_data', 'nfd')
      ->fields('nfd', ['nid','title'])
      ->condition('nfd.type', 'custom_capabilities')
      ->orderBy('nfd.title', 'ASC')
      ->execute()
      ->fetchCol();
    return $nids;
  }

  function edelmanCustomProductDetail(){
    $product_id = \Drupal::request()->request->get('nid');
    //dd($request);die;
    if (isset($product_id) && !empty($product_id)) {
      $node = \Drupal::entityTypeManager()->getStorage('node')->load($product_id);  
     // dd($node->field_graded_in[0]->target_id);die;
    
      //dd($node->field_pattern_product[0]->value);die;
    $val['field_product_category'] = '';    
    if (!empty($node->field_product_category[0]->target_id)){
      $val['field_product_category'] = $node->field_product_category[0]->target_id;
    }

    $val['field_product_contents'] = '';
    if (!empty($node->field_product_contents[0]->value)){
      $val['field_product_contents'] = $node->field_product_contents[0]->value;
    }

    $val['body'] = '';
    if (!empty($node->body[0]->value)){
      $val['body'] = $node->body[0]->value;
    }
        
    $field_associated_types = '';
    if (!empty($node->field_associated_types)) {
      foreach ($node->field_associated_types as $value) {
        $field_associated_types .= $value->target_id . ',';
      }
    }
    $val['field_associated_types'] = $field_associated_types;
    
    $field_associated_suitabilities = '';
    if (!empty($node->field_associated_suitabilities)) {
      foreach ($node->field_associated_suitabilities as $value) {
        $field_associated_suitabilities .= $value->target_id . ',';
      }
    }
    $val['field_associated_suitabilities'] = $field_associated_suitabilities; 

     $field_pattern_product = '';
    if (!empty($node->field_pattern_product)) {
      $field_pattern_product = $node->field_pattern_product[0]->value;
    }
    $val['field_pattern_product'] = $field_pattern_product;

    $field_graded_in = '';
    if (!empty($node->field_graded_in)) {
      foreach ($node->field_graded_in as $value) {
        $numeric_tid = $value->target_id;
        $term = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->load($numeric_tid);
        if (is_object($term)) {
          $field_graded_in .= $numeric_tid . ',';
        }
      }
    }
    $val['field_graded_in'] = $field_graded_in;
    
    $field_collection_member = '';
    if (!empty($node->field_collection_member)) {
      foreach ($node->field_collection_member as $value) {
        $field_collection_member .= $value->target_id . ',';
      }
    }
    $val['field_collection_member'] = $field_collection_member;

    $field_product_types = '';
    if (!empty($node->field_product_types)) {
      foreach ($node->field_product_types as $value) {
        $field_product_types .= $value->target_id . ',';
      }
    }
    $val['field_product_types'] = $field_product_types;
    
    $field_special_order_selection = '';
    if (!empty($node->field_special_order_selection)) {
      foreach ($node->field_special_order_selection as $value) {
        $field_special_order_selection = $value->value;
      }
    }
    $val['field_special_order_selection'] = $field_special_order_selection;

    $field_new_product = '';
    if (!empty($node->field_new_product)) {
      foreach ($node->field_new_product as $value) {
        $field_new_product = $value->value;
      }
    }
    $val['field_new_product'] = $field_new_product;

    $field_edge = '';
    if (!empty($node->field_edge)) {
      foreach ($node->field_edge as $value) {
        $field_edge = $value->value;
      }
    }
    $val['field_edge'] = $field_edge;

    $field_hide_size = '';
    if (!empty($node->field_hide_size)) {
      foreach ($node->field_hide_size as $value) {
        $field_hide_size = $value->target_id;
      }
    }
    $val['field_hide_size'] = $field_hide_size;

    $field_product_custom = '';
    if (!empty($node->field_product_custom)) {
      foreach ($node->field_product_custom as $value) {
        $field_product_custom = $value->value;
      }
    }
    $val['field_product_custom'] = $field_product_custom;
    
    $field_product_texture = '';
      if (!empty($node->field_product_texture)) {
        foreach ($node->field_product_texture as $value) {
          $field_product_texture .= $value->target_id . ',';
        }
      }
      $val['field_product_texture'] = $field_product_texture;
    
    $field_product_application = '';
      if (!empty($node->field_product_application)) {
        foreach ($node->field_product_application as $value) {
          $field_product_application .= $value->target_id . ',';
        }
      }
      $val['field_product_application'] = $field_product_application;

    /*Specification Starts*/

    /*Leather Specification - Product */
    if ($node->hasField('field_group_product_spec')) {
      $specItems = $node->get('field_group_product_spec')->referencedEntities();

     // dd($specItems[0]->field_greenguard_certfication[0]->target_id);die;

      $field_content = '';
      if (!empty($specItems[0]->field_content)) {
        foreach ($specItems[0]->field_content as $value) {
          $field_content = $value->target_id;
        }
      }
      $val['field_content'] = $field_content;
      
      $field_finish = '';
      if (!empty($specItems[0]->field_finish)) {
        foreach ($specItems[0]->field_finish as $value) {
          $field_finish = $value->target_id;
        }
      }
      $val['field_finish'] = $field_finish;
      
      $field_greenguard_certfication = '';
      if (!empty($specItems[0]->field_greenguard_certfication)) {
        foreach ($specItems[0]->field_greenguard_certfication as $value) {
          $field_greenguard_certfication = $value->value;
        }
      }
      $val['field_greenguard_certfication'] = $field_greenguard_certfication;

      $field_size = '';
      if (!empty($specItems[0]->field_size)) {
        foreach ($specItems[0]->field_size as $value) {
          $field_size = $value->target_id;
        }
      }
      $val['field_size'] = $field_size;
      
      $field_style = '';
      if (!empty($specItems[0]->field_style)) {
        foreach ($specItems[0]->field_style as $value) {
          $field_style = $value->value;
        }
      }
      $val['field_style'] = $field_style;
      
      $field_thickness = '';
      if (!empty($specItems[0]->field_thickness)) {
        foreach ($specItems[0]->field_thickness as $value) {
          $field_thickness = $value->target_id;
        }
      }
      $val['field_thickness'] = $field_thickness;
      

            /*New Leather Fields Updated*/
      $avg_useable_area = '';
      if (!empty($specItems[0]->field_average_usable_area)) {
        foreach ($specItems[0]->field_average_usable_area as $value) {
          $avg_useable_area = $value->target_id;
        }
      }
      $val['field_average_usable_area'] = $avg_useable_area;

      $weight_per_sf = '';
      if (!empty($specItems[0]->field_weights_per_sf)) {
        foreach ($specItems[0]->field_weights_per_sf as $value) {
          $weight_per_sf = $value->target_id;
        }
      }
      $val['field_weights_per_sf'] = $weight_per_sf;
    
      $texture = '';
      if (!empty($specItems[0]->field_texture)) {
        foreach ($specItems[0]->field_texture as $value) {
          $texture = $value->target_id;
        }
      }
      $val['field_texture'] = $texture;
      
      $spec_user = '';
      if (!empty($specItems[0]->field_use)) {
        foreach ($specItems[0]->field_use as $value) {
          $spec_user = $value->target_id;
        }
      }
      $val['field_specification_use'] = $spec_user;

      $edge_stain_release = '';
      if (!empty($specItems[0]->field_edge_stain_release)) {
        foreach ($specItems[0]->field_edge_stain_release as $value) {
          $edge_stain_release = $value->target_id;
        }
      }
      $val['field_edge_stain_release'] = $edge_stain_release;
    
      $spec_performance = '';
      if (!empty($specItems[0]->field_specification_performance)) {
        foreach ($specItems[0]->field_specification_performance as $value) {
          $spec_performance = $value->target_id;
        }
      }
      $val['field_specification_performance'] = $spec_performance;

      $spec_maintanence = '';
      if (!empty($specItems[0]->field_specification_maintanence)) {
        foreach ($specItems[0]->field_specification_maintanence as $value) {
          $spec_maintanence = $value->target_id;
        }
      }
      $val['field_specification_maintanence'] = $spec_maintanence;
      
      $custom = '';
      if (!empty($specItems[0]->field_custom)) {
        foreach ($specItems[0]->field_custom as $value) {
          $custom = $value->target_id;
        }
      }
      $val['field_custom'] = $custom;
      
      $consideration = '';
      if (!empty($specItems[0]->field_consideration)) {
        foreach ($specItems[0]->field_consideration as $value) {
          $consideration = $value->target_id;
        }
      }
      $val['field_consideration'] = $consideration;
      
      
  }

  /* end Leather Specification - Cowrugs */
  elseif ($node->hasField('field_group_leather_spec')) {
      $specItems = $node->get('field_group_leather_spec')->referencedEntities();

     // dd($specItems[0]->field_greenguard_certfication[0]->target_id);die;

      $field_content = '';
      if (!empty($specItems[0]->field_content)) {
        foreach ($specItems[0]->field_content as $value) {
          $field_content = $value->target_id;
        }
      }
      $val['field_content'] = $field_content;
      
      $field_finish = '';
      if (!empty($specItems[0]->field_finish)) {
        foreach ($specItems[0]->field_finish as $value) {
          $field_finish = $value->target_id;
        }
      }
      $val['field_finish'] = $field_finish;
      
      $field_greenguard_certfication = '';
      if (!empty($specItems[0]->field_greenguard_certfication)) {
        foreach ($specItems[0]->field_greenguard_certfication as $value) {
          $field_greenguard_certfication = $value->value;
        }
      }
      $val['field_greenguard_certfication'] = $field_greenguard_certfication;

      $field_size = '';
      if (!empty($specItems[0]->field_size)) {
        foreach ($specItems[0]->field_size as $value) {
          $field_size = $value->target_id;
        }
      }
      $val['field_size'] = $field_size;
      
      $field_style = '';
      if (!empty($specItems[0]->field_style)) {
        foreach ($specItems[0]->field_style as $value) {
          $field_style = $value->value;
        }
      }
      $val['field_style'] = $field_style;
      
      $field_thickness = '';
      if (!empty($specItems[0]->field_thickness)) {
        foreach ($specItems[0]->field_thickness as $value) {
          $field_thickness = $value->target_id;
        }
      }
      $val['field_thickness'] = $field_thickness;

      /*New Leather Fields Updated*/
      $avg_useable_area = '';
      if (!empty($specItems[0]->field_average_usable_area)) {
        foreach ($specItems[0]->field_average_usable_area as $value) {
          $avg_useable_area = $value->target_id;
        }
      }
      $val['field_average_usable_area'] = $avg_useable_area;

      $weight_per_sf = '';
      if (!empty($specItems[0]->field_weights_per_sf)) {
        foreach ($specItems[0]->field_weights_per_sf as $value) {
          $weight_per_sf = $value->target_id;
        }
      }
      $val['field_weights_per_sf'] = $weight_per_sf;
    
      $texture = '';
      if (!empty($specItems[0]->field_texture)) {
        foreach ($specItems[0]->field_texture as $value) {
          $texture = $value->target_id;
        }
      }
      $val['field_texture'] = $texture;
      
      $spec_user = '';
      if (!empty($specItems[0]->field_use)) {
        foreach ($specItems[0]->field_use as $value) {
          $spec_user = $value->target_id;
        }
      }
      $val['field_specification_use'] = $spec_user;

      $edge_stain_release = '';
      if (!empty($specItems[0]->field_edge_stain_release)) {
        foreach ($specItems[0]->field_edge_stain_release as $value) {
          $edge_stain_release = $value->target_id;
        }
      }
      $val['field_edge_stain_release'] = $edge_stain_release;
    
      $spec_performance = '';
      if (!empty($specItems[0]->field_specification_performance)) {
        foreach ($specItems[0]->field_specification_performance as $value) {
          $spec_performance = $value->target_id;
        }
      }
      $val['field_specification_performance'] = $spec_performance;

      $spec_maintanence = '';
      if (!empty($specItems[0]->field_specification_maintanence)) {
        foreach ($specItems[0]->field_specification_maintanence as $value) {
          $spec_maintanence = $value->target_id;
        }
      }
      $val['field_specification_maintanence'] = $spec_maintanence;
      
      $custom = '';
      if (!empty($specItems[0]->field_custom)) {
        foreach ($specItems[0]->field_custom as $value) {
          $custom = $value->target_id;
        }
      }
      $val['field_custom'] = $custom;
      
      $consideration = '';
      if (!empty($specItems[0]->field_consideration)) {
        foreach ($specItems[0]->field_consideration as $value) {
          $consideration = $value->target_id;
        }
      }
      $val['field_consideration'] = $consideration;
      
  }
    
    /*Performance chara Specification - Product */
  if ($node->hasField('field_group_product_perform_char')) {
      $performItems = $node->get('field_group_product_perform_char')->referencedEntities(); 

      $field_abrasion_astm_d_3884 = '';
      if (!empty($performItems[0]->field_abrasion_astm_d_3884)) {
        foreach ($performItems[0]->field_abrasion_astm_d_3884 as $value) {
          $field_abrasion_astm_d_3884 = $value->value;
        }
      }
      $val['field_abrasion_astm_d_3884'] = $field_abrasion_astm_d_3884;
      
      $field_abrasion_astm_d_4157 = '';
      if (!empty($performItems[0]->field_abrasion_astm_d_4157)) {
        foreach ($performItems[0]->field_abrasion_astm_d_4157 as $value) {
          $field_abrasion_astm_d_4157 = $value->target_id;
        }
      }
      $val['field_abrasion_astm_d_4157'] = $field_abrasion_astm_d_4157;
      
      $field_bf_astm_2208_100lbs = '';
      if (!empty($performItems[0]->field_bf_astm_2208_100lbs)) {
        foreach ($performItems[0]->field_bf_astm_2208_100lbs as $value) {
          $field_bf_astm_2208_100lbs = $value->value;
        }
      }
      $val['field_bf_astm_2208_100lbs'] = $field_bf_astm_2208_100lbs;
      
      $field_crocking_astm_d_5053 = '';
      if (!empty($performItems[0]->field_crocking_astm_d_5053)) {
        foreach ($performItems[0]->field_crocking_astm_d_5053 as $value) {
          $field_crocking_astm_d_5053 = $value->target_id;
        }
      }
      $val['field_crocking_astm_d_5053'] = $field_crocking_astm_d_5053;
    
    $field_elongation_astm_d2211 = '';
    if (!empty($performItems[0]->field_elongation_astm_d2211_50lb)) {
      foreach ($performItems[0]->field_elongation_astm_d2211_50lb as $value) {
        $field_elongation_astm_d2211 = $value->value;
      }
    }
    $val['field_elongation_astm_d2211'] = $field_elongation_astm_d2211;

    $field_flex_w_flex = '';
    if (!empty($performItems[0]->field_flex_w_flex)) {
      foreach ($performItems[0]->field_flex_w_flex as $value) {
        $field_flex_w_flex = $value->value;
      }
    }
    $val['field_flex_w_flex'] = $field_flex_w_flex;
    
    $field_light_fastness = '';
    if (!empty($performItems[0]->field_light_fastness_aatcc)) {
      foreach ($performItems[0]->field_light_fastness_aatcc as $value) {
        $field_light_fastness = $value->target_id;
      }
    }
    $val['field_light_fastness'] = $field_light_fastness;
    
    $field_tearing_strength_astm = '';
    if (!empty($performItems[0]->field_tear_strength_astm_d4705)) {
      foreach ($performItems[0]->field_tear_strength_astm_d4705 as $value) {
        $field_tearing_strength_astm = $value->value;
      }
    }
    $val['field_tearing_strength_astm'] = $field_tearing_strength_astm;
    
    $field_wyzenbeek_astmd_4157 = '';
    if (!empty($performItems[0]->field_wyzenbeek_astmd_4157)) {
      foreach ($performItems[0]->field_wyzenbeek_astmd_4157 as $value) {
        $field_wyzenbeek_astmd_4157 = $value->target_id;
      }
    }
    $val['field_wyzenbeek_astmd_4157'] = $field_wyzenbeek_astmd_4157;

  }
  /*Performance chara Specification - Cowrugs */
  elseif ($node->hasField('field_group_perform_charcter')) {
      $performItems = $node->get('field_group_perform_charcter')->referencedEntities(); 

      $field_abrasion_astm_d_3884 = '';
      if (!empty($performItems[0]->field_abrasion_astm_d_3884)) {
        foreach ($performItems[0]->field_abrasion_astm_d_3884 as $value) {
          $field_abrasion_astm_d_3884 = $value->value;
        }
      }
      $val['field_abrasion_astm_d_3884'] = $field_abrasion_astm_d_3884;
      
      $field_abrasion_astm_d_4157 = '';
      if (!empty($performItems[0]->field_abrasion_astm_d_4157)) {
        foreach ($performItems[0]->field_abrasion_astm_d_4157 as $value) {
          $field_abrasion_astm_d_4157 = $value->target_id;
        }
      }
      $val['field_abrasion_astm_d_4157'] = $field_abrasion_astm_d_4157;
//dd($field_abrasion_astm_d_3884);die;
      $field_bf_astm_2208_100lbs = '';
      if (!empty($performItems[0]->field_bf_astm_2208_100lbs)) {
        foreach ($performItems[0]->field_bf_astm_2208_100lbs as $value) {
          $field_bf_astm_2208_100lbs = $value->value;
        }
      }
      $val['field_bf_astm_2208_100lbs'] = $field_bf_astm_2208_100lbs;
      
      $field_crocking_astm_d_5053 = '';
      if (!empty($performItems[0]->field_crocking_astm_d_5053)) {
        foreach ($performItems[0]->field_crocking_astm_d_5053 as $value) {
          $field_crocking_astm_d_5053 = $value->target_id;
        }
      }
      $val['field_crocking_astm_d_5053'] = $field_crocking_astm_d_5053;
    
    $field_elongation_astm_d2211 = '';
    if (!empty($performItems[0]->field_elongation_astm_d2211_50lb)) {
      foreach ($performItems[0]->field_elongation_astm_d2211_50lb as $value) {
        $field_elongation_astm_d2211 = $value->value;
      }
    }
    $val['field_elongation_astm_d2211'] = $field_elongation_astm_d2211;

    $field_flex_w_flex = '';
    if (!empty($performItems[0]->field_flex_w_flex)) {
      foreach ($performItems[0]->field_flex_w_flex as $value) {
        $field_flex_w_flex = $value->value;
      }
    }
    $val['field_flex_w_flex'] = $field_flex_w_flex;
    
    $field_light_fastness = '';
    if (!empty($performItems[0]->field_light_fastness_aatcc)) {
      foreach ($performItems[0]->field_light_fastness_aatcc as $value) {
        $field_light_fastness = $value->target_id;
      }
    }
    $val['field_light_fastness'] = $field_light_fastness;
    
    $field_tearing_strength_astm = '';
    if (!empty($performItems[0]->field_tearing_strength_astm)) {
      foreach ($performItems[0]->field_tearing_strength_astm as $value) {
        $field_tearing_strength_astm = $value->value;
      }
    }
    $val['field_tearing_strength_astm'] = $field_tearing_strength_astm;
    
    $field_wyzenbeek_astmd_4157 = '';
    if (!empty($performItems[0]->field_wyzenbeek_astmd_4157)) {
      foreach ($performItems[0]->field_wyzenbeek_astmd_4157 as $value) {
        $field_wyzenbeek_astmd_4157 = $value->target_id;
      }
    }
    $val['field_wyzenbeek_astmd_4157'] = $field_wyzenbeek_astmd_4157;
  
  }

  /* Special Performance Char */
  if ($node->hasField('field_group_special_perform_char')) {
      $specialPerformItems = $node->get('field_group_special_perform_char')->referencedEntities(); 

      $field_abrasion_astm_d_7255 = '';
      if (!empty($specialPerformItems[0]->field_abrasion_astm_d_7255)) {
      foreach ($specialPerformItems[0]->field_abrasion_astm_d_7255 as $value) {
        $field_abrasion_astm_d_7255 = $value->value;
      }
    }
    $val['field_abrasion_astm_d_7255'] = $field_abrasion_astm_d_7255;
    
    $field_bf_astm_2208_150lbs = '';
    if (!empty($specialPerformItems[0]->field_bf_astm_2208_150lbs)) {
      foreach ($specialPerformItems[0]->field_bf_astm_2208_150lbs as $value) {
        $field_bf_astm_2208_150lbs = $value->value;
      }
    }
    $val['field_bf_astm_2208_150lbs'] = $field_bf_astm_2208_150lbs;

    $field_light_fastness_aatcc = '';
    if (!empty($specialPerformItems[0]->field_light_fastness_aatcc)) {
      foreach ($specialPerformItems[0]->field_light_fastness_aatcc as $value) {
        $field_light_fastness_aatcc = $value->target_id;
      }
    }
    $val['field_light_fastness_aatcc'] = $field_light_fastness_aatcc;
    
    $field_tear_strength_astm_d4705 = '';
    if (!empty($specialPerformItems[0]->field_tear_strength_astm_d4705)) {
      foreach ($specialPerformItems[0]->field_tear_strength_astm_d4705 as $value) {
        $field_tear_strength_astm_d4705 = $value->value;
      }
    }
    $val['field_tear_strength_astm_d4705'] = $field_tear_strength_astm_d4705;
      
    $field_spec_crocking_astm_d_5053 = '';
    if (!empty($specialPerformItems[0]->field_spec_crocking_astm_d_5053)) {
      foreach ($specialPerformItems[0]->field_spec_crocking_astm_d_5053 as $value) {
        $field_spec_crocking_astm_d_5053 = $value->value;
      }
    }
    $val['field_spec_crocking_astm_d_5053'] = $field_spec_crocking_astm_d_5053;

    $field_elongation_astm_d2211_50lb = '';
    if (!empty($specialPerformItems[0]->field_elongation_astm_d2211_50lb)) {
      foreach ($specialPerformItems[0]->field_elongation_astm_d2211_50lb as $value) {
        $field_elongation_astm_d2211_50lb = $value->value;
      }
    }
    $val['field_elongation_astm_d2211_50lb'] = $field_elongation_astm_d2211_50lb;

  }
    /*Flammability Specification*/
  if ($node->hasField('field_group_flammability')) {
    $flamItems = $node->get('field_group_flammability')->referencedEntities(); 
    $field_boston_fire_code = '';
    if (!empty($flamItems[0]->field_boston_fire_code)) {
      foreach ($flamItems[0]->field_boston_fire_code as $value) {
        $field_boston_fire_code = $value->value;
      }
    }
    $val['field_boston_fire_code'] = $field_boston_fire_code;
   
    $field_ctb_117 = '';
    if (!empty($flamItems[0]->field_ctb_117)) {
      foreach ($flamItems[0]->field_ctb_117 as $value) {
        $field_ctb_117 = $value->target_id;
      }
    }
    $val['field_ctb_117'] = $field_ctb_117;
    
    $field_cir_nfpa_260 = '';
    if (!empty($flamItems[0]->field_cir_nfpa_260)) {
      foreach ($flamItems[0]->field_cir_nfpa_260 as $value) {
        $field_cir_nfpa_260 = $value->target_id;
      }
    }
    $val['field_cir_nfpa_260'] = $field_cir_nfpa_260;
    
    $field_iussfs_bs5852 = '';
    if (!empty($flamItems[0]->field_iussfs_bs5852)) {
      foreach ($flamItems[0]->field_iussfs_bs5852 as $value) {
        $field_iussfs_bs5852 = $value->value;
      }
    }
    $val['field_iussfs_bs5852'] = $field_iussfs_bs5852;
     
    $field_imo_r_a_652_16 = '';
    if (!empty($flamItems[0]->field_imo_r_a_652_16)) {
      foreach ($flamItems[0]->field_imo_r_a_652_16 as $value) {
        $field_imo_r_a_652_16 = $value->value;
      }
    }
    $val['field_imo_r_a_652_16'] = $field_imo_r_a_652_16;
   
    $field_sbcbm_astm_e_84 = '';
    if (!empty($flamItems[0]->field_sbcbm_astm_e_84)) {
      foreach ($flamItems[0]->field_sbcbm_astm_e_84 as $value) {
        $field_sbcbm_astm_e_84 = $value->target_id;
      }
    }
    $val['field_sbcbm_astm_e_84'] = $field_sbcbm_astm_e_84;

  }
     
  /* Special Flammability Specification*/
  if ($node->hasField('field_group_special_flammability')) {
    $specialFlamItems = $node->get('field_group_special_flammability')->referencedEntities(); 

     $field_far_cs_25_853_a_appendix   = '';
    if (!empty($specialFlamItems[0]->field_far_cs_25_853_a_appendix)) {
      foreach ($specialFlamItems[0]->field_far_cs_25_853_a_appendix as $value) {
        $field_far_cs_25_853_a_appendix  = $value->target_id;
      }
    }
    $val['field_far_cs_25_853_a_appendix'] = $field_far_cs_25_853_a_appendix ;

  } 


    echo json_encode(array('status' => 'success', 'result' => $val)); 
    exit;
  }
  return;
  }

  function edelmanProductsAjax() {
    global $user;
    //header("Content-type: text/html");
    //header("Expires: Wed, 29 Jan 1975 04:15:00 GMT");
    //header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    //header("Cache-Control: no-cache, must-revalidate");
    //header("Pragma: no-cache");

    $build = array();

    $page_req = $_GET['page'];
    $type_req = $_GET['type'];

    $page = ((!empty($color_tid_req))) ? $color_tid_req : 0;
    $type = ((!empty($type_req))) ? $type_req : 'product';
 
    $color_tid = ((!empty($_GET['color_tid']))) ? $_GET['color_tid'] : 0;

    //$sort_by = ((!empty($_GET['sort_by']) && count($_GET['sort_by'] > 0))) ? $_GET['sort_by'] : array();
    //$view_by = ((!empty($_GET['view_by']) && count($_GET['view_by'] > 0))) ? $_GET['view_by'] : array('0' => 12);
    $sort_by = ((!empty($_GET['sort_by']))) ? $_GET['sort_by'] : array();
    $view_by = ((!empty($_GET['view_by']))) ? $_GET['view_by'] : array('0' => 12);

    if ($type == 'archived_color_products') {
        $view_by = array('0' => 600);
    }
    elseif ($type == 'product_colors') {
        $view_by = array('0' => 600);
    } 
    elseif ($type == 'product') {
        $view_by = array('0' => 60);
    } 
    elseif ($type == 'patchwork_rugs') {
        $view_by = array('0' => 36);
    }
    elseif ($type == 'cow_rugs') {
        $view_by = array('0' => 36);
    }

    $product_tags = (!empty($_GET['product_tags'])) ? $_GET['product_tags'] : array();
    $industry_use = (!empty($_GET['industry_use'])) ? $_GET['industry_use'] : array();
    $product_texture = (!empty($_GET['product_texture'])) ? $_GET['product_texture'] : array();
    $product_application = (!empty($_GET['product_application'])) ? $_GET['product_application'] : array();


    if ($type == 'ads') {
        $ads_status = (!empty($_GET['ads_status'])) ? $_GET['ads_status'] : array();
    }

    $query = \Drupal::database()->select('node_field_data', 'nfd');
    $query->distinct();
    $query->fields('nfd', array('nid','title'));
    if ($type == 'archived_color_products') {
        $query->condition('nfd.type', 'product_colors');
        $query->join('node__field_color_code', 'c', 'nfd.nid = c.entity_id');
        //$query->join('tag_csv_inventory3', 't', 't.item = c.field_color_code_value');
        $query->join('node__field_main_product', 'm', 'm.entity_id = nfd.nid');
        $query->join('node_field_data', 'p', 'p.nid = m.field_main_product_target_id');
        $query->addField('p', 'title', 'p_title');
    }
    elseif ($type == 'collections') {
        $query->join('node__field_display_weight', 'dw', 'nfd.nid = dw.entity_id');
        $query->condition('nfd.type', $type);
        $query->condition('nfd.status', 1);
        $query->fields('nfd', array('nid', 'title'));
        $query->orderBy('dw.field_display_weight_value', 'ASC');
    }
    elseif ($type == 'product_colors') {
        //echo "true";die;
        $query->condition('nfd.type', $type);
        $query->condition('nfd.status', 1);
        $query->join('node__field_colorway', 'fc', 'nfd.nid = fc.entity_id');
        $query->join('node__field_color_weight', 'fcw', 'nfd.nid = fcw.entity_id');
        //$query->join('taxonomy_term_data', 'td', 'td.tid = fc.field_colorway_tid');
        $query->join('taxonomy_term__field_landing_page_color_order', 'flc', 'flc.entity_id = fc.field_colorway_target_id');
        $query->leftjoin('node__field_color_special', 'cs', 'nfd.nid = cs.entity_id');
        $query->join('node__field_color_code', 'c', 'nfd.nid = c.entity_id');
       /* $query->leftjoin('tag_csv_inventory3', 't', 't.item = c.field_color_code_value');*/
        //$query->where('(cs.field_color_special_value NOT IN (1,2,3) OR cs.field_color_special_value IS NULL)');
       $query->fields('flc',['field_landing_page_color_order_value']);
        $query->fields('fcw',['field_color_weight_value']);
       // $query->where('(t.item IS NULL)');
        $query->where('(cs.field_color_special_value = 1 OR cs.field_color_special_value IS NULL)');
        
    }
    elseif ($type == 'cow_rugs') {
        $query->join('node__field_cow_rugs_order_display', 'dw', 'nfd.nid = dw.entity_id');
        $query->condition('nfd.type', $type);
        $query->condition('nfd.status', 1);
        $query->orderBy('CAST(dw.field_cow_rugs_order_display_value AS SIGNED INTEGER)', 'ASC');
    }
    else {
        $query->condition('nfd.type', $type);
    }

    if ($type != 'ads') {
        //if(count($product_tags) > 0){
        if (!empty($product_tags) && !empty($product_tags[0])) {
            if (!in_array("-1", $product_tags)) {
                foreach ($product_tags as $key => $value) {
                    $aliasname = 'f' . $key;
                    $query->join('node__field_associated_types', $aliasname, 'nfd.nid = ' . $aliasname . '.entity_id');
                    $query->condition($aliasname . '.field_associated_types_target_id', $value);
                }
            }
            else {
                /*$all_key = array_search('-1', $product_tags);
                unset($product_tags[$all_key]);
                if(count($product_tags) > 0){
            $query->join('field_data_field_associated_types', 'f', 'n.nid = f.entity_id');  
            $query->condition('f.field_associated_types_tid', $product_tags, 'IN');
          }*/
          //$query->join('field_data_field_product_category', 'f1', 'n.nid = f1.entity_id'); 
        }   
      }

        if (!empty($product_texture) && !empty($product_texture[0])) {
            $query->join('node__field_product_texture', 'ft', 'nfd.nid = ft.entity_id');  
            $query->condition('ft.field_product_texture_target_id', $product_texture, 'IN');
        }

        if (!empty($product_application) && !empty($product_application[0])) {
            $query->join('node__field_product_application', 'fa', 'nfd.nid = fa.entity_id');  
            $query->condition('fa.field_product_application_target_id', $product_application, 'IN');
        }        
      
      if (!empty($color_tid) && $type == 'product_colors') {
        $query->join('node__field_main_product', 'fm', 'nfd.nid = fm.entity_id');
            $query->join('node__field_colorway', 'fc', 'fc.entity_id = fm.entity_id');
            $query->condition('fc.field_colorway_target_id', $color_tid);
            //For limit stock not show in listing
            $query->leftjoin('node__field_show_it_as_a_limited_stock', 'ls', 'nfd.nid = ls.entity_id');
            $query->where('(ls.field_show_it_as_a_limited_stock_value NOT IN (1))');
            $query->addExpression('CAST(fcw.field_color_weight_value AS SIGNED)', 'field_color_weight_value_integer');

            // Order by the custom expression as an integer.
            $query->orderBy('field_color_weight_value_integer', 'ASC');

            /*$query->condition('n.type', $type);
            $query->condition('n.status', 1);
            //For Product display replace revision_id by field_main_product_nid
            $query->join('field_data_field_main_product', 'fm', 'n.nid = fm.entity_id');
            $query->join('field_data_field_colorway', 'fc', 'fc.entity_id = fm.entity_id');
            $query->condition('fc.field_colorway_tid', $color_tid);
            $query->leftjoin('field_data_field_color_special', 'cs', 'n.nid = cs.entity_id');
            $query->join('field_data_field_color_code', 'c', 'n.nid = c.entity_id');
            $query->leftjoin('tag_csv_inventory3', 't', 't.item = c.field_color_code_value');
            //$query->where('(cs.field_color_special_value NOT IN (1,2,3) OR cs.field_color_special_value IS NULL)');
            $query->where('(t.item IS NULL)');
            //$query->where('(cs.field_color_special_value NOT IN (1,2,3) OR cs.field_color_special_value IS NULL)');
            $query->where('(cs.field_color_special_value = 1 OR cs.field_color_special_value IS NULL)');
            //$query->condition('fm.entity_id', $subquery, 'IN');
            //For limit stock not show in listing
            $query->leftjoin('field_data_field_show_it_as_a_limited_stock', 'ls', 'n.nid = ls.entity_id');
            $query->where('(ls.field_show_it_as_a_limited_stock_value NOT IN (1))');
            //$query->orderBy('fer.field_color_order_field_weight_value_value', 'ASC');
            $query->orderBy('CAST(fcw.field_color_weight_value AS SIGNED INTEGER)', 'ASC');*/
      }
        elseif (empty($color_tid) && $type == 'product_colors') {
            $query->addExpression('CAST(flc.field_landing_page_color_order_value AS SIGNED)', 'field_landing_page_color_order_value_integer');
            $query->orderBy('field_landing_page_color_order_value_integer', 'ASC');

            $query->addExpression('CAST(fcw.field_color_weight_value AS SIGNED)', 'field_color_weight_value_integer');
            // Order by the custom expression as an integer.
            $query->orderBy('field_color_weight_value_integer', 'ASC');
        }
      // Filter by Product Industry Use
      //if(count($industry_use) > 0){ 
      if (!empty($industry_use) && !empty($industry_use[0])) {
        foreach ($industry_use as $key => $value) {
          $aliasname1 = 'fs' . $key;
          $query->join('node__field_associated_suitabilities', $aliasname1, 'nfd.nid = ' . $aliasname1 . '.entity_id');  
          $query->condition($aliasname1 . '.field_associated_suitabilities_target_id', $value);
        }
      }
    } 
    else {
      /*for ads status*/
      if (!empty($ads_status)) {   
        $query->join('node__field_ad_status', 'f', 'nfd.nid = f.entity_id');  
        $query->condition('f.field_ad_status_target_id', $ads_status, 'IN');
      }
    }
    if ($type == 'cow_rugs_color') {
      if ($sort_by[0] == 'default') {
        //this is for order for cowrugs
        $query->join('node__field_cowrugs_color_weight', 'cr', 'nfd.nid = cr.entity_id');
        $sort = 'ASC';
      }
    }

    $query->condition('nfd.status', 1);
    if ($type == 'archived_color_products') {
        $query->orderBy('p.title', 'ASC');
    }
    if (!empty($sort_by)) {
      if ($type != 'ads') {
        if ($type == 'cow_rugs_color' && $sort_by[0] == 'default') {      
          $sort = 'ASC';
        }
            else {
          $sort = isset($sort_by[0]) ? mb_strtoupper($sort_by[0]) : 'ASC';
        }   
        if (!empty($color_tid) && $type == 'product_colors') {
                //echo "test";die;
          //$query->orderBy('fer.field_color_order_field_weight_value_value', $sort);
          //$query->orderBy('CAST(fcw.field_color_weight_value AS SIGNED INTEGER)', $sort);
          $query->orderBy('fcw.field_color_weight_value', $sort);
        } 
            else {
          if ($type == 'cow_rugs_color' && $sort_by[0] == 'default') {
            $query->orderBy('cr.field_cowrugs_color_weight_value', $sort);
          } 
                else {
            $query->orderBy('nfd.title', $sort);
          }
        }
      } 
        else {
        $sort = '';
        if ($sort_by[0] == 'old' || $sort_by[0] == 'new') {
          if ($sort_by[0] == 'new') {
            $sort = 'DESC';
          } 
                else {
            $sort = 'ASC';
          }
          $query->orderBy('nfd.created', $sort);
          
        } 
            else {
          if ($sort_by[0] == 'asc') {
            $sort = isset($sort_by[0]) ? mb_strtoupper($sort_by[0]) : 'ASC';
          } 
                else {
            $sort = isset($sort_by[0]) ? mb_strtoupper($sort_by[0]) : 'DESC';
          }
          $query->orderBy('nfd.title', $sort);
        }
      }   
    }
    //$product_nids = $query->execute()->fetchCol();

    if (!empty($view_by)) {
      $view = isset($view_by[0]) ? $view_by[0] : 12;//variable_get('default_nodes_main', 10);         
      $limit = $view;
    }
    else {    
      $limit = 12;//variable_get('default_nodes_main', 10);   
        if ($type == 'archived_color_products') {
            $limit = 700; 
        } 
    }

    $path_val = (isset($_GET['type']))?$_GET['type']:'product';
    if ($path_val != 'rugsale') {
        if ($type != 'product_colors') {
            $query = $query->extend('Drupal\Core\Database\Query\PagerSelectExtender')->limit($limit);//$query->extend('PagerManager')->limit($limit);
        }
    }
    else {
    }
    $nids = $query->execute()->fetchCol();
//dd($nids);die;
  $output = '';
  $productoutput = '<option value="">Enter a Product Name</option>';
    if (!empty($nids)) {
        $inventory_products = array();
        if ($type == 'archived_color_products') {
            $get_last_created_date = \Drupal::database()->query("SELECT created FROM {tag_csv_inventory2} ORDER BY created DESC LIMIT 1")->fetchField();
            //$inventory_products = \Drupal::database()->query("SELECT ci.item FROM tag_csv_inventory3 AS pc JOIN tag_csv_inventory2 ci ON pc.item = ci.item WHERE ci.created = :created GROUP BY ci.item", array('created' => $get_last_created_date))->fetchAllKeyed(0, 0);
            $inventory_products = \Drupal::database()->query("SELECT item FROM {tag_csv_inventory3}")->fetchAllKeyed(0, 0);
        }
        global $base_url;
        foreach ($nids as $pnid) {
            $node = \Drupal::entityTypeManager()->getStorage('node')->load($pnid); 
           //dd($node->title->value);die;      
            $alias = \Drupal::service('path_alias.manager')->getAliasByPath('/node/' . $pnid);
            $productoutput .= "<option value = '" . $alias . "'>" . $node->title->value . "</option>";

            if ($type == 'product_colors' || $type == 'archived_color_products') {
            $p_nid = $node->field_main_product[0]->target_id;
            //$title = db_query("select title from node where nid = $p_nid")->fetchField();
            $title = \Drupal::database()->query("select title from {node_field_data} WHERE nid = :nid", array(':nid' => $p_nid))->fetchField();
            $node->parent_title = $title;
            }
            if ($type == 'archived_color_products') {
            $colorcode = $node->field_color_code['und']['0']['value'];
            //$show_limitedstock = edelman_redesign_check_item_in_archived_inventory_by_colorcode($colorcode, $get_last_created_date);
            //$node->show_limitedstock = $show_limitedstock;
            $node->show_limitedstock = 1;
            if (in_array($colorcode, $inventory_products)) {
            $node->show_limitedstock = -1;
            }
            }

            // $node_view = $this->edelmanProductsNodeViewMultiple($node);
            // $output .= drupal_render($node_view);
        }
        $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);
         $node_view = $this->edelmanProductsNodeViewMultiple($nodes);
            $output .= $node_view;//drupal_render($node_view);
    }
    else {
        $output .= '<div>No Products founds!</div>';
    }
    $count_val = count($nids);

    //$output .= '###pager' . theme('pager', array("quantity" => 5));
  $output .= "###pager" . $productoutput;
  $output .= "###pager" . $count_val;
    die($output);
 
}


  public function edelmanLeatherTilesColors(){
    $query2 = \Drupal::database()->select('node_field_data', 'n');
    $query2->join('node__field_product_image', 's', 's.entity_id = n.nid');
    $query2->join('node__field_floor_and_tiles_order', 'o' , 'o.entity_id = n.nid');
    $query2->join('node__field_product_color', 't', 't.entity_id = n.nid');
    $query2->join('taxonomy_term_data', 'td', 'td.tid = t.field_product_color_target_id');
    $query2->join('node__field_main_tile_product', 'tp', 'tp.entity_id = n.nid');
    //$query2->join('field_data_field_landing_page_order', 'lo', 'lo.entity_id = pt.nid');
    $query2->fields('n', array('nid', 'title'));
    $query2->fields('td', array('tid'));    
    $query2->fields('pt', array('title'));    
    $query2->condition('n.type', 'floor_and_wall_tiles_color', '=');
    //$query2->orderBy('o.field_floor_and_tiles_order_value', 'ASC');

    $query2->condition('nfd.status', 1);
    $query2->addExpression('CAST(fcw.field_floor_and_tiles_order_value AS SIGNED)', 'field_floor_and_tiles_order_value_integer');

    // Order by the custom expression as an integer.
    $query2->orderBy('field_floor_and_tiles_order_value_integer', 'ASC');
    //$query2->orderBy('td.weight, lo.field_landing_page_order_value', 'ASC');
    $colors = $query2->execute()->fetchAll();

    dd($colors);die;

    // $query = db_select('field_data_field_banner_image', 'bi');
    // $query->fields('bi', array('field_banner_image_fid', 'field_banner_image_title'));
    // $query->condition('bi.bundle', 'wall_panel', '=');
    // $query->condition('bi.field_banner_image_title', 'Michael Wolk Design Associates', '=');
    // $title = $query->execute()->fetchAssoc();

    // return theme('tile_color_items', array('content' => array('colors' => $colors, 'title' => $title)));
  }

  public function edelmanProfessionalUserForm(){
     global $base_url;
    $theme = \Drupal::theme()->getActiveTheme();
    $activeThemePath = $base_url.'/'. $theme->getPath(); 
    return [ 
      //'#theme' => 'professional_user_form',
      '#theme' => ['template'=>$activeThemePath.'/templates/system/page--user--register.html.twig']
    ];
  }
}