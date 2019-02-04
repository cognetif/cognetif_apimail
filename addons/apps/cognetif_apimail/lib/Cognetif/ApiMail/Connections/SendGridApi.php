<?php

namespace Cognetif\ApiMail\Connections;

use SendGrid\Mail\Mail;
use SendGrid;

class SendGridApi extends BaseConnection
{
    public function send(): bool
    {

        try {

            $email = new Mail();

            $email->setFrom($this->from['email'], $this->from['name']);
            $email->setSubject($this->subject);

            foreach ($this->recipients as $recipient) {
                $email->addTo($recipient);
            }

            foreach ($this->bcc as $bcc) {
                $email->addBcc($bcc['email'], $bcc['name']);
            }

            $email->setReplyTo($this->replyTo['email'], $this->replyTo['name']);

            if ($this->isHtml) {
                $email->addContent("text/html", $this->body);
            } else {
                $email->addContent("text/plain", $this->body);
            }
            if (!empty($this->altBody)) {
                if ($this->isHtml) {
                    $email->addContent("text/plain", $this->altBody);

                } else {
                    $email->addContent("text/html", $this->altBody);
                }
            }

            foreach ($this->attachments as $attachment) {
                $email->addAttachment(
                    base64_encode(file_get_contents($attachment['path'])),
                    $attachment['mimetype'],
                    $attachment['name'],
                    "attachment"
                );
            }

            $sendGrid = new SendGrid(COGNETIF_APIMAIL_SENDGRID_KEY);
            $response = $sendGrid->send($email);

            \PerchUtil::debug('SendGrid sent email with status:' . $response->statusCode(), 'success');
            return $response->statusCode() === 200;

        } catch (\Exception $e) {
            \PerchUtil::debug($e->getMessage(), 'error');
        }

        return false;

    }
}