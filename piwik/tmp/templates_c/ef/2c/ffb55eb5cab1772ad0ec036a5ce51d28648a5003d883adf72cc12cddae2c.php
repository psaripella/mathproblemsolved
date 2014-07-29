<?php

/* @CoreHome/_topScreen.twig */
class __TwigTemplate_ef2cffb55eb5cab1772ad0ec036a5ce51d28648a5003d883adf72cc12cddae2c extends Twig_Template
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
        echo "<div id=\"header\">
    ";
        // line 2
        $this->env->loadTemplate("@CoreHome/_logo.twig")->display($context);
        // line 3
        echo "    ";
        $this->env->loadTemplate("@CoreHome/_topBar.twig")->display($context);
        // line 4
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "@CoreHome/_topScreen.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 21,  52 => 17,  48 => 15,  21 => 3,  28 => 5,  24 => 3,  132 => 36,  113 => 30,  108 => 28,  104 => 27,  96 => 25,  92 => 24,  88 => 23,  79 => 21,  77 => 20,  70 => 15,  62 => 13,  46 => 9,  31 => 5,  27 => 4,  23 => 3,  19 => 1,  134 => 43,  131 => 42,  127 => 34,  124 => 33,  121 => 32,  114 => 20,  112 => 19,  107 => 16,  105 => 15,  100 => 26,  87 => 9,  84 => 22,  81 => 7,  74 => 47,  72 => 19,  68 => 44,  66 => 42,  60 => 39,  55 => 36,  53 => 33,  50 => 32,  41 => 11,  38 => 7,  36 => 26,  32 => 24,  30 => 6,  22 => 2,  56 => 12,  54 => 11,  51 => 10,  47 => 31,  45 => 30,  42 => 6,  40 => 5,  37 => 10,  34 => 3,  29 => 2,);
    }
}
