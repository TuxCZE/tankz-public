<?php

class Controller
{

    /**
     * specify location of template dir
     */
    const TEMPLATE_DIR = 'templates';


    /**
     * Name of current template
     * @var template
     */
    protected $template;


    /**
     * Associative array of template context. Elements of this array are passed to template before rendering.
     * @var context
     */
    protected $context;


    /**
     * Controller constructor.
     * @param null $action - specifies which action will be executed
     * @param null $parameters - should contain parameters for action
     */
    public function __construct($action = null, $parameters = null)
    {
        if ($action === null) {
            $action = 'default';
        }
        $this->{$action.'Action'}($parameters);
    }

    /**
     * Return actual template.
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }


    /**
     * Redirects page to specified url.
     * @param $url
     */
    public function redirect($url){
        header('Location: '.$url);
        $this->template = 'blank.tpl';
    }


    /**
     * Render template
     * @throws Exception
     * @throws SmartyException
     */
    public function render()
    {
        $smarty = new Smarty();
        if ($this->context !== null) {
            foreach ($this->context as $key => $value) {
                $smarty->assign($key, $value);
            }
        }

        $smarty->setTemplateDir(self::TEMPLATE_DIR);
        $smarty->display($this->template);

    }


}
