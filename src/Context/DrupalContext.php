<?php

namespace DrupalCoreExtension\Context;

use Drupal\DrupalExtension\Context\RawDrupalContext;
use Drupal\Tests\WebAssert;

/**
 * Provides pre-built step definitions for interacting with Drupal.
 */
class DrupalContext extends RawDrupalContext {

  /**
   * Checks, that element with specified CSS exists on page
   * Example: Then I should see a "body" field
   * Example: And I should see a "body" field
   *
   * @Then /^(?:|I )should see an? "(?P<field>[^"]*)" field$/
   */
  public function assertElementOnPage($field)
  {
    $this->assertSession()->fieldExists($field);
  }

  /**
   * Performs an xpath search on the contents of the internal browser.
   *
   * The search is relative to the root element (HTML tag normally) of the page.
   *
   * @param string $xpath
   *   The xpath string to use in the search.
   * @param array $arguments
   *   An array of arguments with keys in the form ':name' matching the
   *   placeholders in the query. The values may be either strings or numeric
   *   values.
   *
   * @return \Behat\Mink\Element\NodeElement[]
   *   The list of elements matching the xpath expression.
   */
  protected function xpath($xpath, array $arguments = []) {
    $xpath = $this->assertSession()->buildXPathQuery($xpath, $arguments);
    return $this->getSession()->getPage()->findAll('xpath', $xpath);
  }

  /**
   * Returns WebAssert object.
   *
   * @param string $name
   *   (optional) Name of the session. Defaults to the active session.
   *
   * @return \Drupal\Tests\WebAssert
   *   A new web-assert option for asserting the presence of elements with.
   */
  public function assertSession($name = NULL) {
    return new WebAssert($this->getSession($name), $this->getMinkParameter('base_url'));
  }

}