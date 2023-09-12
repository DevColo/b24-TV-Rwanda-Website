<?php

namespace Drupal\twig_query\Traits\Repository;

use Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException;
use Drupal\Component\Plugin\Exception\PluginNotFoundException;

trait Find
{
  /**
   * @throws InvalidPluginDefinitionException
   * @throws PluginNotFoundException
   */
  public function findAll(int $pager = NULL, array $sort = []) : array {
    $query = $this->getBaseQuery();

    if ($pager) {
      $query->pager($pager);
    }

    $this->addEntityQuerySort($query, $sort);

    return $this->getResults($query);
  }

  /**
   * @throws InvalidPluginDefinitionException
   * @throws PluginNotFoundException
   */
  public function findBy(array $criteria, int $pager = NULL, array $sort = []): array {
    $query = $this->getBaseQuery();

    foreach ($criteria as $field => $value) {
      $query->condition($field, $value);
    }

    if ($pager) {
      $query->pager($pager);
    }

    $this->addEntityQuerySort($query, $sort);

    return $this->getResults($query);
  }

}
