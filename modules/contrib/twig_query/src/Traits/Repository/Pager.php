<?php
namespace Drupal\twig_query\Traits\Repository;

use Drupal\Core\Database\Query\Select;
use Drupal\Core\Database\StatementInterface;
use Drupal\twig_query\Repository\QueryRepository;

trait Pager
{
  protected function initializeQueryPager(Select $query, int $limit = 12) : ?Select {
    $statement = $query->countQuery()->execute();

    if (!$statement instanceof StatementInterface) {
      return NULL;
    }

    $total = (int) $statement->fetchField();
    $pager = $this->pagerManager->createPager($total, $limit);
    $query->range($pager->getCurrentPage(), $limit);
    return $query;
  }
}
