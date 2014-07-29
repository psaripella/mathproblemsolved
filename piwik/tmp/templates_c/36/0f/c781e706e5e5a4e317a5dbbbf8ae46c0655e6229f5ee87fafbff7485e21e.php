<?php

/* @Referrers/getSearchEnginesAndKeywords.twig */
class __TwigTemplate_360fc781e706e5e5a4e317a5dbbbf8ae46c0655e6229f5ee87fafbff7485e21e extends Twig_Template
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
        echo "<div id='leftcolumn'>
    <h2>";
        // line 2
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Referrers_Keywords")), "html", null, true);
        echo "</h2>
    ";
        // line 3
        echo $this->getContext($context, "keywords");
        echo "
</div>

<div id='rightcolumn'>
    <h2>";
        // line 7
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Referrers_SearchEngines")), "html", null, true);
        echo "</h2>
    ";
        // line 8
        echo $this->getContext($context, "searchEngines");
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "@Referrers/getSearchEnginesAndKeywords.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 8,  33 => 7,  26 => 3,  22 => 2,  19 => 1,);
    }
}
