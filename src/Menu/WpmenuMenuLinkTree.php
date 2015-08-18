<?php

/**
 * @file
 * Contains \Drupal\wpmenu\Menu\ToolbarMenuLinkTree.
 */

namespace Drupal\wpmenu\Menu;

use Drupal\Core\Menu\MenuLinkTree;

/**
 * Extends MenuLinkTree to add specific theme suggestions for the toolbar.
 */
class WpmenuMenuLinkTree extends MenuLinkTree {

  /**
   * {@inheritdoc}
   */
  public function build(array $tree, $level = 0) {
    if ($level == 0) {
      if (!$tree) {
        return array();
      }
      $build = parent::build($tree, $level);

      /** @var \Drupal\Core\Menu\MenuLinkInterface $link */
      $first_link = reset($tree)->link;
      // Get the menu name of the first link.
      $menu_name = $first_link->getMenuName();
      // Add a more specific theme suggestion to differentiate this rendered
      // menu from others.
      $build['#theme'] = 'menu__wpmenu__' . strtr($menu_name, '-', '_');
      return $build;
    }
    else {
      return parent::build($tree, $level);
    }
  }

}
