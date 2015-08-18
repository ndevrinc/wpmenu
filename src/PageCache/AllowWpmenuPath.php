<?php

/**
 * @file
 * Contains \Drupal\wpmenu\PageCache\AllowToolbarPath.
 */

namespace Drupal\wpmenu\PageCache;

use Drupal\Core\PageCache\RequestPolicyInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Cache policy for the toolbar page cache service.
 *
 * This policy allows caching of requests directed to /toolbar/subtrees/{hash}
 * even for authenticated users.
 */
class AllowWpmenuPath implements RequestPolicyInterface {

  /**
   * {@inheritdoc}
   */
  public function check(Request $request) {
    // Note that this regular expression matches the end of pathinfo in order to
    // support multilingual sites using path prefixes.
    if (preg_match('#/wpmenu/subtrees/[^/]+(/[^/]+)?$#', $request->getPathInfo())) {
      return static::ALLOW;
    }
  }

}
