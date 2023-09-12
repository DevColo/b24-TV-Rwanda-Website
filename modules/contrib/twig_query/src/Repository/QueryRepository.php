<?php

namespace Drupal\twig_query\Repository;

use Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException;
use Drupal\Component\Plugin\Exception\PluginNotFoundException;
use Drupal\Core\Database\Connection;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Entity\Query\QueryInterface;
use Drupal\Core\Language\LanguageManager;
use Drupal\Core\Pager\PagerManagerInterface;
use Drupal\twig_query\Traits\Repository\Base;
use Drupal\twig_query\Traits\Repository\Condition;
use Drupal\twig_query\Traits\Repository\Count;
use Drupal\twig_query\Traits\Repository\Find;
use Drupal\twig_query\Traits\Repository\Limit;
use Drupal\twig_query\Traits\Repository\Order;
use Drupal\twig_query\Traits\Repository\Pager;
use Drupal\twig_query\Traits\Repository\Results;
use Drupal\twig_query\Traits\Repository\Sort;

/**
 * @package Drupal\twig_query
 */
abstract class QueryRepository implements EntityRepositoryInterface
{

  protected string $entityType;
  protected array $bundles;
  protected Connection $connection;
  protected LanguageManager $languageManager;
  protected EntityTypeManagerInterface $entityTypeManager;
  protected PagerManagerInterface $pagerManager;

  public function __construct(Connection $connection, EntityTypeManagerInterface $entityTypeManager, LanguageManager $languageManager, PagerManagerInterface $pagerManager)
  {
    $this->connection = $connection;
    $this->entityTypeManager = $entityTypeManager;
    $this->languageManager = $languageManager;
    $this->pagerManager = $pagerManager;
  }

  use Base, Pager, Sort, Find, Count, Results, Order, Limit, Condition;

  /**
   * @throws InvalidPluginDefinitionException
   * @throws PluginNotFoundException
   */
  public function get(): QueryInterface
  {
    $this->setEntityType($this->defineEntityType());
    return $this->getBaseQuery();
  }

  abstract public function defineEntityType (): string;

}
