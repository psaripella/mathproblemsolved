<?php

/* @CoreHome/_singleReport.twig */
class __TwigTemplate_f6fa661ae7aa472ddd0b2cea35f88c2324464ca0bcb6e9226f2daa5754f0043b extends Twig_Template
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
