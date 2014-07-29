<?php

/* @CoreVisualizations/_dataTableViz_jqplotGraph.twig */
class __TwigTemplate_f701a04c9479e8fd7e17c47c01ca18e8999938437fc07c979fbd6411cfa6cae9 extends Twig_Template
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
        echo "<div class=\"jqplot-graph\">
    <div class=\"piwik-graph\" data-data=\"";
        // line 2
        echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute($this->getContext($context, "visualization"), "getGraphData", array(0 => $this->getContext($context, "dataTable"), 1 => $this->getContext($context, "properties")), "method")), "html", null, true);
        echo "\"></div>
</div>";
    }

    public function getTemplateName()
    {
        return "@CoreVisualizations/_dataTableViz_jqplotGraph.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 2,  139 => 37,  136 => 36,  133 => 35,  130 => 34,  127 => 33,  125 => 32,  122 => 31,  119 => 30,  115 => 29,  111 => 27,  105 => 25,  99 => 23,  97 => 22,  94 => 21,  91 => 20,  85 => 18,  83 => 17,  79 => 15,  72 => 14,  66 => 13,  57 => 11,  49 => 10,  45 => 9,  41 => 8,  30 => 7,  28 => 6,  26 => 5,  21 => 2,  19 => 1,);
    }
}
