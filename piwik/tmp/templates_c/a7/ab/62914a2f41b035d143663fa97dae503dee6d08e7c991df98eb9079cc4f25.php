<?php

/* @CoreHome/_siteSelectHeader.twig */
class __TwigTemplate_a7ab62914a2f41b035d143663fa97dae503dee6d08e7c991df98eb9079cc4f25 extends Twig_Template
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
        echo "<div class=\"top_bar_sites_selector\">
    <label>";
        // line 2
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Website")), "html", null, true);
        echo "</label>
    ";
        // line 3
        $this->env->loadTemplate("@CoreHome/_siteSelect.twig")->display($context);
        // line 4
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "@CoreHome/_siteSelectHeader.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 6,  26 => 3,  90 => 24,  82 => 22,  69 => 18,  49 => 11,  39 => 8,  33 => 6,  59 => 9,  52 => 12,  48 => 15,  21 => 3,  28 => 4,  24 => 3,  132 => 36,  113 => 30,  108 => 28,  104 => 27,  96 => 25,  92 => 24,  88 => 23,  79 => 21,  77 => 20,  70 => 15,  62 => 13,  46 => 9,  31 => 3,  27 => 4,  23 => 3,  19 => 1,  134 => 43,  131 => 42,  127 => 34,  124 => 33,  121 => 32,  114 => 20,  112 => 19,  107 => 16,  105 => 15,  100 => 26,  87 => 9,  84 => 22,  81 => 7,  74 => 20,  72 => 19,  68 => 44,  66 => 13,  60 => 12,  55 => 8,  53 => 33,  50 => 9,  41 => 8,  38 => 7,  36 => 26,  32 => 24,  30 => 6,  22 => 2,  56 => 12,  54 => 13,  51 => 10,  47 => 10,  45 => 7,  42 => 9,  40 => 5,  37 => 10,  34 => 3,  29 => 4,);
    }
}
