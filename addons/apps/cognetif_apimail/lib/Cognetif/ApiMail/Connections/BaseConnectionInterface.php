<?php

namespace Cognetif\ApiMail\Connections;

interface BaseConnectionInterface
{

    /**
     * @return bool
     */
    public function send(): bool;

    /**
     * @param string $subject
     * @return mixed
     */
    public function setSubject(string $subject);

    /**
     * @param array $from
     * @return mixed
     */
    public function setFrom(array $from);

    /**
     * @param array $replyTo
     * @return mixed
     */
    public function setReplyTo(array $replyTo);

    /**
     * @param array $recipients
     * @return mixed
     */
    public function setRecipients(array $recipients);

    /**
     * @param array $bcc
     * @return mixed
     */
    public function setBcc(array $bcc);

    /**
     * @param string $charset
     * @return mixed
     */
    public function setCharSet(string $charset);

    /**
     * @param bool $isHTML
     * @return mixed
     */
    public function setIsHtml(bool $isHTML);

    /**
     * @param string $body
     * @return mixed
     */
    public function setBody(string $body);

    /**
     * @param string $altBody
     * @return mixed
     */
    public function setAltBody(string $altBody);

    /**
     * @param array $attachments
     * @return mixed
     */
    public function setAttachments(array $attachments);


}