<?php

namespace Cognetif\ApiMail;

use Cognetif\ApiMail\Connections\BaseConnection;

class Manager
{
    /**
     * @param \PerchSystemEvent $email
     */
    public static function email_send(\PerchSystemEvent $email): void
    {
        if (!defined('COGNETIF_APIMAIL_CONNECTOR')) {
            \PerchUtil::debug('Missing API Mail Connector configuration', 'error');
        } else {

            $className = COGNETIF_APIMAIL_CONNECTOR;

            if (!class_exists($className)) {
                \PerchUtil::debug('Missing API Mail Connector Class:' . $className, 'error');
            } else {

                /** @var BaseConnection $connector */
                $connector = new $className;
                $connector->setSubject($email->subject->subject)
                    ->setFrom($email->subject->from)
                    ->setCharSet($email->subject->charset)
                    ->setRecipients($email->subject->recipients)
                    ->setIsHtml($email->subject->is_html)
                    ->setBody($email->subject->body);

                if (isset($email->subject->reply_to)) {
                    $connector->setReplyTo($email->subject->reply_to);
                }

                if (isset($email->subject->bcc)) {
                    $connector->setBcc($email->subject->bcc);
                }

                if (isset($email->subject->altbody)) {
                    $connector->setAltBody($email->subject->altbody);
                }

               $result = $connector->send();
            }

        }
    }
}
