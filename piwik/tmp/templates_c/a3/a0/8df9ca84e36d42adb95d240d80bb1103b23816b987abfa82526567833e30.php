<?php

/* @CoreHome/_menu.twig */
class __TwigTemplate_a3a08df9ca84e36d42adb95d240d80bb1103b23816b987abfa82526567833e30 extends Twig_Template
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
        echo "<div class=\"Menu--dashboard\">
    <ul class=\"Menu-tabList\">
        ";
        // line 3
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "menu"));
        foreach ($context['_seq'] as $context["level1"] => $context["level2"]) {
            // line 4
            echo "            <li id=\"";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('urlRewriteWithParameters')->getCallable(), array($this->getAttribute($this->getContext($context, "level2"), "_url"))), "html", null, true);
            echo "\">
                <a href=\"#";
            // line 5
            echo twig_escape_filter($this->env, twig_slice($this->env, call_user_func_array($this->env->getFilter('urlRewriteWithParameters')->getCallable(), array($this->getAttribute($this->getContext($context, "level2"), "_url"))), 1), "html", null, true);
            echo "\"
                   onclick=\"return piwikMenu.onItemClick(this);\">";
            // line 6
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($this->getContext($context, "level1"))), "html", null, true);
            echo "</a>
                <ul>
                ";
            // line 8
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "level2"));
            foreach ($context['_seq'] as $context["name"] => $context["urlParameters"]) {
                // line 9
                echo "                    ";
                if ((twig_slice($this->env, $this->getContext($context, "name"), 0, 1) != "_")) {
                    // line 10
                    echo "                        <li>
                            <a href='#";
                    // line 11
                    echo twig_escape_filter($this->env, twig_slice($this->env, call_user_func_array($this->env->getFilter('urlRewriteWithParameters')->getCallable(), array($this->getAttribute($this->getContext($context, "urlParameters"), "_url"))), 1), "html", null, true);
                    echo "'
                               onclick='return piwikMenu.onItemClick(this);'>
                                ";
                    // line 13
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($this->getContext($context, "name"))), "html", null, true);
                    echo "
                            </a>
                        </li>
                    ";
                }
                // line 17
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['urlParameters'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 18
            echo "                </ul>
            </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['level1'], $context['level2'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "    </ul>
</div>
<div class=\"nav_sep\"></div>
";
    }

    public function getTemplateName()
    {
        return "@CoreHome/_menu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 17,  165 => 64,  153 => 62,  151 => 61,  136 => 52,  130 => 50,  128 => 49,  106 => 43,  102 => 42,  98 => 40,  71 => 32,  44 => 24,  35 => 6,  26 => 3,  90 => 37,  82 => 22,  69 => 18,  49 => 27,  39 => 8,  33 => 6,  59 => 9,  52 => 12,  48 => 10,  21 => 17,  28 => 4,  24 => 18,  132 => 36,  113 => 44,  108 => 28,  104 => 27,  96 => 25,  92 => 38,  88 => 23,  79 => 33,  77 => 21,  70 => 15,  62 => 29,  46 => 9,  31 => 3,  27 => 4,  23 => 3,  19 => 1,  134 => 43,  131 => 42,  127 => 34,  124 => 47,  121 => 32,  114 => 20,  112 => 19,  107 => 16,  105 => 15,  100 => 26,  87 => 9,  84 => 22,  81 => 7,  74 => 20,  72 => 19,  68 => 44,  66 => 13,  60 => 12,  55 => 8,  53 => 33,  50 => 9,  41 => 8,  38 => 22,  36 => 6,  32 => 5,  30 => 19,  22 => 2,  56 => 13,  54 => 13,  51 => 11,  47 => 10,  45 => 9,  42 => 9,  40 => 5,  37 => 10,  34 => 3,  29 => 4,);
    }
}
