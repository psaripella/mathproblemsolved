<?php

/* @CoreHome/_warningInvalidHost.twig */
class __TwigTemplate_fa67e74659822a20aea0b94a0d3048c90bd1a46864f55bd098b5167f42630142 extends Twig_Template
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
        // line 2
        if (((array_key_exists("isValidHost", $context) && array_key_exists("invalidHostMessage", $context)) && ($this->getContext($context, "isValidHost") == false))) {
            // line 3
            echo "    ";
            ob_start();
            // line 4
            echo "        <a style=\"float:right;\" href=\"http://piwik.org/faq/troubleshooting/#faq_171\" target=\"_blank\"><img src=\"plugins/Zeitgeist/images/help_grey.png\"/></a>
        <strong>";
            // line 5
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Warning")), "html", null, true);
            echo ":&nbsp;</strong>";
            echo $this->getContext($context, "invalidHostMessage");
            echo "

        <br>
        <br>

        <small>";
            // line 10
            echo $this->getContext($context, "invalidHostMessageHowToFix");
            echo "
        <br/><br/><a style=\"float:right;\" href=\"http://piwik.org/faq/troubleshooting/#faq_171\" target=\"_blank\">";
            // line 11
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Help")), "html", null, true);
            echo "
        <img style=\"vertical-align: bottom;\" src=\"plugins/Zeitgeist/images/help_grey.png\"/></a><br/>
        </small>
    ";
            $context["invalidHostText"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 15
            echo "
    <div style=\"clear:both;width:800px;\">
        ";
            // line 17
            echo call_user_func_array($this->env->getFilter('notification')->getCallable(), array($this->getContext($context, "invalidHostText"), array("noclear" => true, "raw" => true, "context" => "warning")));
            echo "
    </div>

";
        }
        // line 21
        echo "
";
    }

    public function getTemplateName()
    {
        return "@CoreHome/_warningInvalidHost.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 21,  52 => 17,  48 => 15,  21 => 3,  28 => 5,  24 => 4,  132 => 36,  113 => 30,  108 => 28,  104 => 27,  96 => 25,  92 => 24,  88 => 23,  79 => 21,  77 => 20,  70 => 15,  62 => 13,  46 => 9,  31 => 5,  27 => 5,  23 => 3,  19 => 2,  134 => 43,  131 => 42,  127 => 34,  124 => 33,  121 => 32,  114 => 20,  112 => 19,  107 => 16,  105 => 15,  100 => 26,  87 => 9,  84 => 22,  81 => 7,  74 => 47,  72 => 19,  68 => 44,  66 => 42,  60 => 39,  55 => 36,  53 => 33,  50 => 32,  41 => 11,  38 => 7,  36 => 26,  32 => 24,  30 => 6,  22 => 2,  56 => 12,  54 => 11,  51 => 10,  47 => 31,  45 => 30,  42 => 6,  40 => 5,  37 => 10,  34 => 3,  29 => 2,);
    }
}
