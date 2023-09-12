<?php

namespace Drupal\twig_query\Repository;

class NodeRepository extends QueryRepository
{
  public function defineEntityType(): string
  {
    return 'node';
  }
}
