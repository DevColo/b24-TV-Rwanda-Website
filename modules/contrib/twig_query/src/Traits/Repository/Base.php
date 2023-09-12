<?php

namespace Drupal\twig_query\Traits\Repository;

use Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException;
use Drupal\Component\Plugin\Exception\PluginNotFoundException;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Entity\Query\QueryInterface;

trait Base
{
  /**
   * @throws InvalidPluginDefinitionException
   * @throws PluginNotFoundException
   */
  protected function getBaseQuery(): QueryInterface
  {
    $query = $this->getStorage()->getQuery();
    $query->condition('status', 1);
    $query->condition('langcode', $this->getLangCode());
    $this->addAccessTag($query);

    return $query;
  }

  /**
   * @throws InvalidPluginDefinitionException
   * @throws PluginNotFoundException
   */
  public function getStorage(): EntityStorageInterface
  {
    return $this->entityTypeManager->getStorage($this->entityType);
  }

  /**
   * @throws InvalidPluginDefinitionException
   * @throws PluginNotFoundException
   */
  public function countBaseQuery(): int
  {
    $query = $this->getBaseQuery();
    $count = $query->count()->execute();
    return is_array($count) ? 0 : (int)$count;
  }

  public function setBundles(array $bundles): void
  {
    $this->bundles = $bundles;
  }

  public function setEntityType(string $entityType): void
  {
    $this->entityType = $entityType;
  }

  public function getEntityType(): string
  {
    return $this->entityType;
  }

  public function getLangCode(): string
  {
    return $this->languageManager->getCurrentLanguage()->getId();
  }

  protected function addAccessTag(QueryInterface $query): void
  {
    $query->addTag($this->entityType . '_access');
  }
}
