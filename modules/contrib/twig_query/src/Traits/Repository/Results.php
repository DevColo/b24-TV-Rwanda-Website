<?php

namespace Drupal\twig_query\Traits\Repository;

use Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException;
use Drupal\Component\Plugin\Exception\PluginNotFoundException;
use Drupal\Core\Entity\Query\QueryInterface;

trait Results
{
  /**
   * @throws InvalidPluginDefinitionException
   * @throws PluginNotFoundException
   */
  public function getResults(QueryInterface $query): array
  {
    $results = (array)$query->execute();

    if (empty($results)) {
      return [];
    }

    return $this->entityTypeManager->getStorage($this->entityType)->loadMultiple($results);
  }
}
