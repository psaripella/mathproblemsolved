<?php

/* @Installation/systemCheck.twig */
class __TwigTemplate_10247fa94439030766f271ce23cae1016cf4a831b0893797f672d9f2e4e23eab extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("@Installation/layout.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Installation/layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        if ((!$this->getContext($context, "showNextStep"))) {
            // line 5
            echo "    ";
            $this->env->loadTemplate("@Installation/_systemCheckLegend.twig")->display($context);
            // line 6
            echo "    <br style=\"clear:both;\">
";
        }
        // line 8
        echo "
<h3>";
        // line 9
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SystemCheck")), "html", null, true);
        echo "</h3>
<br/>
";
        // line 11
        $this->env->loadTemplate("@Installation/_systemCheckSection.twig")->display($context);
        // line 12
        echo "
";
        // line 13
        if ((!$this->getContext($context, "showNextStep"))) {
            // line 14
            echo "    <br/>
    <p>
        <img src='plugins/Zeitgeist/images/link.gif'/> &nbsp;
        <a href=\"?module=Proxy&action=redirect&url=http://piwik.org/docs/requirements/\" target=\"_blank\">";
            // line 17
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_Requirements")), "html", null, true);
            echo "</a>
    </p>
    ";
            // line 19
            $this->env->loadTemplate("@Installation/_systemCheckLegend.twig")->display($context);
        }
    }

    public function getTemplateName()
    {
        return "@Installation/systemCheck.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 19,  60 => 17,  55 => 14,  53 => 13,  50 => 12,  48 => 11,  43 => 9,  40 => 8,  36 => 6,  33 => 5,  31 => 4,  28 => 3,);
    }
}
