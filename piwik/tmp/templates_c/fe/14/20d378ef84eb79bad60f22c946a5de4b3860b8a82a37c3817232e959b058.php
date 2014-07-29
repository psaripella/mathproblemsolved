<?php

/* @Referrers/indexWebsites.twig */
class __TwigTemplate_fe1420d378ef84eb79bad60f22c946a5de4b3860b8a82a37c3817232e959b058 extends Twig_Template
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
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Referrers_Websites")), "html", null, true);
        echo "</h2>
    ";
        // line 3
        echo $this->getContext($context, "websites");
        echo "
</div>

<div id='rightcolumn'>
    <h2>";
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
