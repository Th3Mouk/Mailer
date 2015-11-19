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
        $this->templating = $templating;
        parent::__construct($mailer);
    }

    /**
     * Function to draw the body.
     *
     * @deprecated
     *
     * @param $template
     * @param $datas
     */
    public function renderHTMLBody($template, $datas)
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.1 and will be removed in 2.0.', E_USER_DEPRECATED);
        $this->setBody($this->templating->render($template, array('contact' => $datas)));
        $this->setContentType('text/html');
    }

    /**
     * Function to set the body of the mail with HTML template.
     *
     * @param $template
     * @param $parameters
     */
    public function setHTMLBody($template, $parameters)
    {
        $this->setBody($this->templating->render($template, $parameters));
        $this->setContentType('text/html');
    }
}
