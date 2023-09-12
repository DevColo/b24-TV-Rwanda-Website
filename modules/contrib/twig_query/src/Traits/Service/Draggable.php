<?php
namespace Drupal\twig_query\Traits\Service;

use Drupal;
use Drupal\node\Entity\Node;

trait Draggable
{
  protected function getDraggableOrderedContent(array $nodes): array
  {
    $unsortedResults = [];

    foreach ($nodes as $node) {
      $unsortedResults[] = [
        'node' => $node,
        'weight' => $this->getWeight($node)
      ];
    }

    return $this->sortByWeight($unsortedResults);
  }

  protected function getWeight(Node $node)
  {
    $database = Drupal::database();
    $query = $database->select('draggableviews_structure', 'ds')
      ->condition('ds.entity_id', $node->nid[0]->value)
      ->fields('ds', ['entity_id', 'weight'])
      ->range(0, 1);

    $result = $query->execute()->fetchObject();

    return $result->weight;
  }

  /**
   * @param array $unsortedResults
   * @return array
   */
  protected function sortByWeight(array $unsortedResults): array
  {

    $results = [];
    $returnResults = [];

    foreach ($unsortedResults as $key => $value) {
      $results[$key] = $value['weight'];
    }

    asort($results);

    foreach (array_keys($results) as $key) {
      $returnResults[$key] = $unsortedResults[$key]['node'];
    }

    return $returnResults;
  }
}
