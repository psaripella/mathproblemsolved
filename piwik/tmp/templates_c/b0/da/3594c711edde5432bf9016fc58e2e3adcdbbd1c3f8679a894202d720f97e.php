<?php

/* @CoreHome/_topBarHelloMenu.twig */
class __TwigTemplate_b0da3594c711edde5432bf9016fc58e2e3adcdbbd1c3f8679a894202d720f97e extends Twig_Template
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
        echo "<div id=\"topRightBar\">
    ";
        // line 2
        ob_start();
        // line 3
        echo "        ";
        if (array_key_exists("userAlias", $context)) {
            // line 4
            echo "            <strong>";
            echo twig_escape_filter($this->env, $this->getContext($context, "userAlias"), "html", null, true);
            echo "</strong>
        ";
        } else {
            // line 6
            echo "            <strong>";
            echo twig_escape_filter($this->env, $this->getContext($context, "userLogin"), "html", null, true);
            echo "</strong>
        ";
        }
        // line 8
        echo "    ";
        $context["helloAlias"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 9
        echo "    <span class=\"topBarElem\">";
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_HelloUser", trim($this->getContext($context, "helloAlias"))));
        echo "</span>
    ";
        // line 10
        if (($this->getContext($context, "userLogin") != "anonymous")) {
            // line 11
            echo "        |
        ";
            // line 12
            if (array_key_exists("isAdminLayout", $context)) {
                // line 13
                echo "            <span class=\"topBarElem topBarElemActive\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Settings")), "html", null, true);
                echo "</span>
        ";
            } else {
                // line 15
                echo "            <span class=\"topBarElem\"><a href='index.php?module=CoreAdminHome'>";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Settings")), "html", null, true);
                echo "</a></span>
        ";
            }
            // line 17
            echo "    ";
        }
        // line 18
        echo "    | <span class=\"topBarElem\">
        ";
        // line 19
        if (($this->getContext($context, "userLogin") == "anonymous")) {
            // line 20
            echo "            <a href='index.php?module=";
            echo twig_escape_filter($this->env, $this->getContext($context, "loginModule"), "html", null, true);
            echo "'>";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Login_LogIn")), "html", null, true);
            echo "</a>
        ";
        } else {
            // line 22
            echo "            <a href='index.php?module=";
            echo twig_escape_filter($this->env, $this->getContext($context, "loginModule"), "html", null, true);
            echo "&amp;action=logout'>";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Logout")), "html", null, true);
            echo "</a>
        ";
        }
        // line 24
        echo "    </span>
</div>
";
    }

    public function getTemplateName()
    {
        return "@CoreHome/_topBarHelloMenu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 24,  82 => 22,  69 => 18,  49 => 11,  39 => 8,  33 => 6,  59 => 9,  52 => 12,  48 => 15,  21 => 3,  28 => 5,  24 => 3,  132 => 36,  113 => 30,  108 => 28,  104 => 27,  96 => 25,  92 => 24,  88 => 23,  79 => 21,  77 => 20,  70 => 15,  62 => 13,  46 => 9,  31 => 3,  27 => 4,  23 => 3,  19 => 1,  134 => 43,  131 => 42,  127 => 34,  124 => 33,  121 => 32,  114 => 20,  112 => 19,  107 => 16,  105 => 15,  100 => 26,  87 => 9,  84 => 22,  81 => 7,  74 => 20,  72 => 19,  68 => 44,  66 => 17,  60 => 15,  55 => 8,  53 => 33,  50 => 32,  41 => 11,  38 => 7,  36 => 26,  32 => 24,  30 => 6,  22 => 2,  56 => 12,  54 => 13,  51 => 10,  47 => 10,  45 => 7,  42 => 9,  40 => 5,  37 => 10,  34 => 3,  29 => 2,);
    }
}
