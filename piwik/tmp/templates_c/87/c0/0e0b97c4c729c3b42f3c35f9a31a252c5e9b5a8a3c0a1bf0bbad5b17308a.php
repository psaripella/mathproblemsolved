<?php

/* @CoreHome/_singleReport.twig */
class __TwigTemplate_87c00e0b97c4c729c3b42f3c35f9a31a252c5e9b5a8a3c0a1bf0bbad5b17308a extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->getContext($context, "title"), "html", null, true);
        echo "</h2>
";
        // line 2
        echo $this->getContext($context, "report");
    }

    public function getTemplateName()
    {
        return "@CoreHome/_singleReport.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  24 => 2,  19 => 1,);
    }
}
