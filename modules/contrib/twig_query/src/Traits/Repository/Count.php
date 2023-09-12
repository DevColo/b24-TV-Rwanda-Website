<?php

namespace Drupal\twig_query\Traits\Repository;

use Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException;
use Drupal\Component\Plugin\Exception\PluginNotFoundException;

trait Count
{
  /**
   * @throws InvalidPluginDefinitionException
   * @throws PluginNotFoundException
   */
  public function countBy(array $criteria): int {
    $query = $this->getBaseQuery();

    foreach ($criteria as $field => $value) {
      $query->condition($field, $value);
    }

    $count = $query->count()->execute();
    return is_array($count) ? 0 : (int) $count;
  }
}
