<?php

/* @CoreHome/_logo.twig */
class __TwigTemplate_e6cb029e5f9424310dba8226db795a221ea6219621e5050206f04e832be8b693 extends Twig_Template
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
        echo "<span id=\"logo\">
    <a href=\"index.php\" title=\"";
        // line 2
        if ($this->getContext($context, "isCustomLogo")) {
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_PoweredBy")), "html", null, true);
            echo " ";
        }
        echo "Piwik # ";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_OpenSourceWebAnalytics")), "html", null, true);
        echo "\">
    ";
        // line 3
        if ($this->getContext($context, "hasSVGLogo")) {
            // line 4
            echo "        <img src='";
            echo twig_escape_filter($this->env, $this->getContext($context, "logoSVG"), "html", null, true);
            echo "' alt=\"";
            if ($this->getContext($context, "isCustomLogo")) {
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_PoweredBy")), "html", null, true);
                echo " ";
            }
            echo "Piwik\"  class=\"ie-hide\" />
        <!--[if lt IE 9]>
    ";
        }
        // line 7
        echo "        <img src='";
        echo twig_escape_filter($this->env, $this->getContext($context, "logoHeader"), "html", null, true);
        echo "' alt=\"";
        if ($this->getContext($context, "isCustomLogo")) {
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_PoweredBy")), "html", null, true);
            echo " ";
        }
        echo "Piwik\" />
    ";
        // line 8
        if ($this->getContext($context, "hasSVGLogo")) {
            echo "<![endif]-->";
        }
        // line 9
        echo "</a>
</span>
";
    }

    public function getTemplateName()
    {
        return "@CoreHome/_logo.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  33 => 4,  59 => 9,  52 => 17,  48 => 15,  21 => 3,  28 => 5,  24 => 3,  132 => 36,  113 => 30,  108 => 28,  104 => 27,  96 => 25,  92 => 24,  88 => 23,  79 => 21,  77 => 20,  70 => 15,  62 => 13,  46 => 9,  31 => 3,  27 => 4,  23 => 3,  19 => 1,  134 => 43,  131 => 42,  127 => 34,  124 => 33,  121 => 32,  114 => 20,  112 => 19,  107 => 16,  105 => 15,  100 => 26,  87 => 9,  84 => 22,  81 => 7,  74 => 47,  72 => 19,  68 => 44,  66 => 42,  60 => 39,  55 => 8,  53 => 33,  50 => 32,  41 => 11,  38 => 7,  36 => 26,  32 => 24,  30 => 6,  22 => 2,  56 => 12,  54 => 11,  51 => 10,  47 => 31,  45 => 7,  42 => 6,  40 => 5,  37 => 10,  34 => 3,  29 => 2,);
    }
}
