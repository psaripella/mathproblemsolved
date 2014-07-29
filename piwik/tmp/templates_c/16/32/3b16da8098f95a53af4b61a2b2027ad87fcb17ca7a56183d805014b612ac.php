<?php

/* @CoreHome/_topBarTopMenu.twig */
class __TwigTemplate_16323b16da8098f95a53af4b61a2b2027ad87fcb17ca7a56183d805014b612ac extends Twig_Template
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
        echo "<div id=\"topLeftBar\">
    ";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "topMenu"));
        foreach ($context['_seq'] as $context["label"] => $context["menu"]) {
            // line 3
            echo "        ";
            if ($this->getAttribute($this->getContext($context, "menu", true), "_html", array(), "any", true, true)) {
                // line 4
                echo "            ";
                echo $this->getAttribute($this->getContext($context, "menu"), "_html");
                echo "
        ";
            } elseif ((($this->getAttribute($this->getAttribute($this->getContext($context, "menu"), "_url"), "module") == $this->getContext($context, "currentModule")) && (twig_test_empty($this->getAttribute($this->getAttribute($this->getContext($context, "menu"), "_url"), "action")) || ($this->getAttribute($this->getAttribute($this->getContext($context, "menu"), "_url"), "action") == $this->getContext($context, "currentAction"))))) {
                // line 6
                echo "            <span class=\"topBarElem topBarElemActive\"><strong>";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($this->getContext($context, "label"))), "html", null, true);
                echo "</strong></span> |
        ";
            } else {
                // line 8
                echo "            <span class=\"topBarElem\" ";
                if ($this->getAttribute($this->getContext($context, "menu", true), "_tooltip", array(), "any", true, true)) {
                    echo "title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "menu"), "_tooltip"), "html", null, true);
                    echo "\"";
                }
                echo ">
                <a id=\"topmenu-";
                // line 9
                echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "menu"), "_url"), "module")), "html", null, true);
                echo "\" href=\"index.php";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('urlRewriteWithParameters')->getCallable(), array($this->getAttribute($this->getContext($context, "menu"), "_url"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($this->getContext($context, "label"))), "html", null, true);
                echo "</a>
            </span> |
        ";
            }
            // line 12
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['label'], $context['menu'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "@CoreHome/_topBarTopMenu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 6,  26 => 3,  90 => 24,  82 => 22,  69 => 18,  49 => 11,  39 => 8,  33 => 6,  59 => 9,  52 => 12,  48 => 15,  21 => 3,  28 => 5,  24 => 3,  132 => 36,  113 => 30,  108 => 28,  104 => 27,  96 => 25,  92 => 24,  88 => 23,  79 => 21,  77 => 20,  70 => 15,  62 => 13,  46 => 9,  31 => 3,  27 => 4,  23 => 3,  19 => 1,  134 => 43,  131 => 42,  127 => 34,  124 => 33,  121 => 32,  114 => 20,  112 => 19,  107 => 16,  105 => 15,  100 => 26,  87 => 9,  84 => 22,  81 => 7,  74 => 20,  72 => 19,  68 => 44,  66 => 13,  60 => 12,  55 => 8,  53 => 33,  50 => 9,  41 => 8,  38 => 7,  36 => 26,  32 => 24,  30 => 6,  22 => 2,  56 => 12,  54 => 13,  51 => 10,  47 => 10,  45 => 7,  42 => 9,  40 => 5,  37 => 10,  34 => 3,  29 => 4,);
    }
}
