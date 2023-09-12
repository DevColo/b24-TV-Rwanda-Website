<?php

namespace Drupal\twig_query\Traits\Repository;

use Drupal\Core\Entity\Query\QueryInterface;

trait Limit
{
  public function limit(QueryInterface $query, int $limit): void
  {
    $query->range(0, $limit);
  }
}
