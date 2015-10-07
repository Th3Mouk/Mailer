<?php

namespace Th3Mouk\Mailer;

class BaseMailer
{
    /**
     * @var \Swift_Mailer
     */
    protected $mailer;

    protected $from;
    protected $sender;
    protected $readReceiptTo;
    protected $to;
    protected $cc;
    protected $bcc;
    protected $replyTo;
    protected $date;
    protected $contentType;
    protected $returnPath;
    protected $encoder;
    protected $priority;

    protected $subject;
    protected $body;
    protected $part;
    protected $attachments;

    /**
     * ContactMailer constructor.
     *
     * @param \Swift_Mailer $mailer
     */
    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function init()
    {
        $this->from = null;
        $this->sender = null;
        $this->readReceiptTo = null;
        $this->to = null;
        $this->cc = null;
        $this->bcc = null;
        $this->replyTo = null;
        $this->date = new \DateTime();
        $this->contentType = 'text/plain';
        $this->returnPath = null;
        $this->encoder = null;
        $this->priority = null;

        $this->subject = null;
        $this->body = null;
        $this->part = null;
        $this->attachments = null;
    }

    public function sendEmail()
    {
        $message = \Swift_Message::newInstance()
            ->setFrom($this->from)
            ->setSender($this->sender)
            ->setReadReceiptTo($this->readReceiptTo)
            ->setTo($this->to)
            ->setCc($this->cc)
            ->setBcc($this->bcc)
            ->setReplyTo($this->replyTo)
            ->setDate($this->date)
            ->setReturnPath($this->returnPath)
            ->setEncoder($this->encoder)
            ->setPriority($this->priority)
            ->setSubject($this->subject)
            ->setBody($this->body, $this->contentType)
        ;

        foreach ($this->part as $part) {
            $message->addPart($part['message'], $part['encoding']);
        }

        foreach ($this->attachments as $attch) {
            $message->attach($attch);
        }

        $this->mailer->send($message);
    }

    /**
     * @return mixed
     */
    public function getReturnPath()
    {
        return $this->returnPath;
    }

    /**
     * @param mixed $returnPath
     */
    public function setReturnPath($returnPath)
    {
        $this->returnPath = $returnPath;
    }

    /**
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param mixed $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @return mixed
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @param mixed $sender
     */
    public function setSender($sender)
    {
        $this->sender = $sender;
    }

    /**
     * @return mixed
     */
    public function getReadReceiptTo()
    {
        return $this->readReceiptTo;
    }

    /**
     * @param mixed $readReceiptTo
     */
    public function setReadReceiptTo($readReceiptTo)
    {
        $this->readReceiptTo = $readReceiptTo;
    }

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param mixed $to
     */
    public function setTo($to)
    {
        $this->to = $to;
    }

    /**
     * @return mixed
     */
    public function getCc()
    {
        return $this->cc;
    }

    /**
     * @param mixed $cc
     */
    public function setCc($cc)
    {
        $this->cc = $cc;
    }

    /**
     * @return mixed
     */
    public function getBcc()
    {
        return $this->bcc;
    }

    /**
     * @param mixed $bcc
     */
    public function setBcc($bcc)
    {
        $this->bcc = $bcc;
    }

    /**
     * @return mixed
     */
    public function getReplyTo()
    {
        return $this->replyTo;
    }

    /**
     * @param mixed $replyTo
     */
    public function setReplyTo($replyTo)
    {
        $this->replyTo = $replyTo;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * @param mixed $contentType
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
    }

    /**
     * @return mixed
     */
    public function getEncoder()
    {
        return $this->encoder;
    }

    /**
     * @param mixed $encoder
     */
    public function setEncoder($encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * @return mixed
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return mixed
     */
    public function getPart()
    {
        return $this->part;
    }

    /**
     * @param mixed $part
     */
    public function setPart($part)
    {
        $this->part = $part;
    }

    /**
     * @return mixed
     */
    public function getAttachments()
    {
        return $this->attachments;
    }

    /**
     * @param mixed $attachments
     */
    public function setAttachments($attachments)
    {
        $this->attachments = $attachments;
    }
}
