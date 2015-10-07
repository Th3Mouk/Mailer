<?php

namespace Th3Mouk\Mailer;

use Symfony\Component\Templating\EngineInterface;

class BaseTwigMailer extends BaseMailer
{
    /**
     * @var EngineInterface
     */
    protected $templating;

    /**
     * BaseTwigMailer constructor.
     *
     * @param \Swift_Mailer   $mailer
     * @param EngineInterface $templating
     */
    public function __construct(\Swift_Mailer $mailer, EngineInterface $templating)
    {
        parent::__construct($mailer);
        $this->templating = $templating;
    }

    public function renderHTMLBody($template, $datas)
    {
        $this->setBody($this->templating->render($template, $datas));
        $this->setContentType('text/html');
    }
}
