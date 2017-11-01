@d8 @api @contact
Feature: Contact
  In order to prove the Drupal contact module is working properly for Drupal 8
  As a developer
  I need to use the step definitions

  Scenario: Visit feedback form as a logged in user.
    Given I am logged in as a user with the "authenticated user" role
    When I am on "/contact"
    Then I should see the text "Website feedback"
    And I should see the text "Your name"
    And I should see the text "Your email address"
    And I should see the text "Subject"
    And I should see the text "Message"
    And I should see the text "Send yourself a copy"
    And I should see a "message[0][value]" field
    And I should see the button "Preview"
    And I should see the button "Send message"
    And I should see the button "Preview"

  Scenario: Visit feedback form as a anonymous user.
    Given I am an anonymous user
    When I am on "/contact"
    Then I should see the text "Website feedback"
    And I should see the text "Your name"
    And I should see the text "Your email address"
    And I should see the text "Subject"
    And I should see the text "Message"
    And I should see the text "Send yourself a copy"
    And I should see a "#edit-name" element
    And I should see a "#edit-mail" element
    And I should see a "#edit-subject-0-value" element
    And I should see a "#edit-message-0-value" element
    And I should see the button "Preview"
    And I should see the button "Send message"
    And I should see the button "Preview"
