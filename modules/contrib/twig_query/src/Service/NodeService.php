<?php

namespace Drupal\twig_query\Service;


class NodeService extends Base
{
  public function defineTypeColumn(): string
  {
    return 'type';
  }
}
