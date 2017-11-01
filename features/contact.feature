@d8 @api @contact
Feature: Contact
  In order to prove the Drupal contact module is working properly for Drupal 8
  As a site administrator
  I need to check end user and contact form administrator functionality.

  Scenario: Visit feedback form as a logged in user.
    Given I am logged in as a user with the "authenticated user" role
    When I am on "/contact"
    Then I should see the text "Website feedback"
    And I should see the text "Your name"
    And I should see the text "Your email address"
    And I should see the text "Subject"
    And I should see the text "Message"
    And I should see the text "Send yourself a copy"
    And I should not see "name" field
    And I should not see "mail" field
    And I should see "subject[0][value]" field
    And I should see "message[0][value]" field
    And I should see "Preview" button
    And I should see "Send message" button

  Scenario: Visit feedback form as a anonymous user.
    Given I am an anonymous user
    When I am on "/contact"
    Then I should see the text "Website feedback"
    And I should see the text "Your name"
    And I should see the text "Your email address"
    And I should see the text "Subject"
    And I should see the text "Message"
    And I should not see the text "Send yourself a copy"
    And I should see "name" field
    And I should see "mail" field
    And I should see "subject[0][value]" field
    And I should see "message[0][value]" field
    And I should see "Preview" button
    And I should see "Send message" button

  Scenario: Visit contact form admin pages as administrator.
    Given I am logged in as a user with the "administer contact forms" permission
    When I am on "/admin/structure/contact"
    Then I should see the heading "Contact forms"
    Then I should see the text "Personal contact form"
