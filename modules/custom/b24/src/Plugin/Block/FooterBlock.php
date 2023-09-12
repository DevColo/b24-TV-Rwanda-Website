<?php

namespace Drupal\tag_custom\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;
use Drupal\Core\Url;
use Drupal\Core\Link;
use Drupal\user\Entity\User;
use Drupal\file\Entity\File;
/**
 * Provides 'Footer' Block.
 *
 * @Block(
 *   id = "footer_block",
 *   admin_label = @Translation("Footer Block"),
 *   category = @Translation("tag custom"),
 * )
 */
class FooterBlock extends BlockBase {

  
  public function build() {
    /**
     * Get Edelman Leather theme social icons links
     */
    $social_icons = [];
    $social_icons['facebook_url'] = (!empty(theme_get_setting('facebook_url')))?theme_get_setting('facebook_url') : '';
    $social_icons['twitter_url'] = (!empty(theme_get_setting('twitter_url')))? theme_get_setting('twitter_url'): '';
    $social_icons['instagram_url'] = (!empty(theme_get_setting('instagram_url')))?theme_get_setting('instagram_url'): '';
    $social_icons['pinterest_url'] = (!empty(theme_get_setting('pinterest_url')))?theme_get_setting('pinterest_url'): '';
    $social_icons['copyrightstext'] = (!empty(theme_get_setting('copyrightstext')))?theme_get_setting('copyrightstext'): '';

    //dd($social_icons);die;

    return [ 
         '#theme' => 'footer_block',
         '#social_icons' => $social_icons,
     ];
  }

}