<?php // phpcs:ignore SlevomatCodingStandard.TypeHints.DeclareStrictTypes.DeclareStrictTypesMissing

namespace MailPoet\Newsletter\Shortcodes\Categories;

if (!defined('ABSPATH')) exit;


use MailPoet\Entities\NewsletterEntity;
use MailPoet\Entities\SendingQueueEntity;
use MailPoet\Entities\SubscriberEntity;
use MailPoet\WP\Functions as WPFunctions;

class Site implements CategoryInterface {
  /** @var WPFunctions */
  private $wp;

  public function __construct(
    WPFunctions $wp
  ) {
    $this->wp = $wp;
  }

  public function process(
    array $shortcodeDetails,
    ?NewsletterEntity $newsletter = null,
    ?SubscriberEntity $subscriber = null,
    ?SendingQueueEntity $queue = null,
    string $content = '',
    bool $wpUserPreview = false
  ): ?string {
    switch ($shortcodeDetails['action']) {
      case 'title':
        // Decoding special characters such as &amp; to &, etc.
        return htmlspecialchars_decode($this->wp->getBloginfo('name'), ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401);

      case 'homepage_url':
        return $this->wp->getBloginfo('url');

      case 'homepage_link':
        return sprintf(
          '<a target="_blank" href="%s">%s</a>',
          $this->wp->escUrl($this->wp->getBloginfo('url')),
          $this->wp->escHtml($this->wp->getBloginfo('name'))
        );

      default:
        return null;
    }
  }
}
