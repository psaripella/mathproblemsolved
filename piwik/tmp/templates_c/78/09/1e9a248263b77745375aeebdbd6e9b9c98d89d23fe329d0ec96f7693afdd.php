<?php

/* @Referrers/indexWebsites.twig */
class __TwigTemplate_78091e9a248263b77745375aeebdbd6e9b9c98d89d23fe329d0ec96f7693afdd extends Twig_Template
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
    <h2 piwik-enriched-headline>";
        // line 2
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Referrers_Websites")), "html", null, true);
        echo "</h2>
    ";
        // line 3
        echo $this->getContext($context, "websites");
        echo "
</div>

<div id='rightcolumn'>
    <h2 piwik-enriched-headline>";
        // line 7
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Referrers_Socials")), "html", null, true);
        echo "</h2>
    ";
        // line 8
        echo $this->getContext($context, "socials");
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "@Referrers/indexWebsites.twig";
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
