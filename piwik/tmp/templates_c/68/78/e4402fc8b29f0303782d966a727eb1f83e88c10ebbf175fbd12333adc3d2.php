<?php

/* @VisitFrequency/index.twig */
class __TwigTemplate_6878e4402fc8b29f0303782d966a727eb1f83e88c10ebbf175fbd12333adc3d2 extends Twig_Template
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
        echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Template.headerVisitsFrequency"));
        echo "

<h2 data-graph-id=\"VisitFrequency.getEvolutionGraph\">";
        // line 3
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("VisitFrequency_ColumnReturningVisits")), "html", null, true);
        echo "</h2>
    ";
        // line 4
        echo $this->getContext($context, "graphEvolutionVisitFrequency");
        echo "
<br/>

";
        // line 7
        $this->env->loadTemplate("@VisitFrequency/_sparklines.twig")->display($context);
        // line 8
        echo "
";
        // line 9
        echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Template.footerVisitsFrequency"));
        echo "
";
    }

    public function getTemplateName()
    {
        return "@VisitFrequency/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 9,  36 => 8,  34 => 7,  28 => 4,  24 => 3,  19 => 1,);
    }
}
