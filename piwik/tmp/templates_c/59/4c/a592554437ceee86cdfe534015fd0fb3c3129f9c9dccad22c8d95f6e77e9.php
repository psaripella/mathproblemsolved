<?php

/* @Live/indexVisitorLog.twig */
class __TwigTemplate_594ca592554437ceee86cdfe534015fd0fb3c3129f9c9dccad22c8d95f6e77e9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<h2>";
        if ($this->getContext($context, "filterEcommerce")) {
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_EcommerceLog")), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_VisitorLog")), "html", null, true);
        }
        echo "</h2>

";
        // line 3
        echo $this->getContext($context, "visitorLog");
        echo "
";
    }

    public function getTemplateName()
    {
        return "@Live/indexVisitorLog.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 3,  19 => 1,);
    }
}
