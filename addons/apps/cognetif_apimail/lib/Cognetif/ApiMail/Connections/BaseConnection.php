<?php

namespace Cognetif\ApiMail\Connections;


abstract class BaseConnection implements BaseConnectionInterface
{
    protected $recipients  = [];
    protected $subject     = "";
    protected $from        = [];
    protected $replyTo     = [];
    protected $bcc         = [];
    protected $charSet     = "";
    protected $isHtml      = false;
    protected $body        = "";
    protected $altBody     = "";
    protected $attachments = [];

    /**
     * @inheritdoc
     */
    abstract public function send(): bool;

    public function setSubject(string $subject): BaseConnection
    {
        $this->subject = $subject;
        return $this;
    }

    public function setFrom(array $from): BaseConnection
    {
        $this->from = $from;
        return $this;
    }

    public function setReplyTo(array $replyTo): BaseConnection
    {
        $this->replyTo = $replyTo;
        return $this;
    }

    public function setRecipients(array $recipients): BaseConnection
    {
        $this->recipients = $recipients;
        return $this;
    }

    public function setBcc(array $bcc): BaseConnection
    {
        $this->bcc = $bcc;
        return $this;
    }

    public function setCharSet(string $charset): BaseConnection
    {
        $this->charSet = $charset;
        return $this;
    }

    public function setIsHtml(bool $isHTML): BaseConnection
    {
        $this->isHtml = $isHTML;
        return $this;
    }

    public function setBody(string $body): BaseConnection
    {
        $this->body = $body;
        return $this;
    }

    public function setAltBody(string $altBody): BaseConnection
    {
        $this->altBody = $altBody;
        return $this;
    }

    public function setAttachments(array $attachments): BaseConnection
    {
        $this->attachments = $attachments;
        return $this;
    }


}