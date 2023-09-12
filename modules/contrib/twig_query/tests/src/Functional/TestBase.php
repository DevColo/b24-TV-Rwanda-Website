<?php

namespace Drupal\Tests\twig_query\Functional;

use Drupal\Tests\BrowserTestBase;

class TestBase extends BrowserTestBase
{
  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'classy';

  const BASE_XPATH = '//div[@class = "tq-test"]';

  /**
   * Checks that an element specified by xpath exists on the current page.
   */
  public function assertByXpath($xpath)
  {
    $this->assertSession()->elementExists('xpath', $xpath);
  }

  /**
   * {@inheritdoc}
   */
  protected function initFrontPage()
  {
    // Intentionally empty. The parent implementation does a request to the
    // front page to init cookie. This causes some troubles in rendering
    // attached Twig template because page content type is not created at that
    // moment. We can skip this step since this test does not rely on any
    // session data.
  }
}
