<?php

/* admin.twig */
class __TwigTemplate_679ed8817adf1d53009152476d06e8ecf390ddf5e9e07c278112526b13f606e8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<!--[if lt IE 9 ]>
<html class=\"old-ie\"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html><!--<![endif]-->
    <head>
        ";
        // line 7
        $this->displayBlock('head', $context, $blocks);
        // line 19
        echo "    </head>
    <body>
    ";
        // line 21
        $context["isAdminLayout"] = true;
        // line 22
        echo "    ";
        $this->env->loadTemplate("_iframeBuster.twig")->display($context);
        // line 23
        echo "    ";
        $this->env->loadTemplate("@CoreHome/_javaScriptDisabled.twig")->display($context);
        // line 24
        echo "
        <div id=\"root\">
            ";
        // line 26
        $this->env->loadTemplate("@CoreHome/_topScreen.twig")->display($context);
        // line 27
        echo "
            ";
        // line 28
        $context["ajax"] = $this->env->loadTemplate("ajaxMacros.twig");
        // line 29
        echo "            ";
        echo $context["ajax"]->getrequestErrorDiv();
        echo "
            <div id=\"container\">

                ";
        // line 32
        if (((!array_key_exists("showMenu", $context)) || $this->getContext($context, "showMenu"))) {
            // line 33
            echo "                    ";
            $this->env->loadTemplate("@CoreAdminHome/_menu.twig")->display($context);
            // line 34
            echo "                ";
        }
        // line 35
        echo "
                <div id=\"content\" class=\"admin\">

                    ";
        // line 38
        $this->env->loadTemplate("@CoreHome/_headerMessage.twig")->display($context);
        // line 39
        echo "                    ";
        $this->env->loadTemplate("@CoreHome/_notifications.twig")->display($context);
        // line 40
        echo "
                    <div class=\"ui-confirm\" id=\"alert\">
                        <h2></h2>
                        <input role=\"no\" type=\"button\" value=\"";
        // line 43
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Ok")), "html", null, true);
        echo "\"/>
                    </div>

                    ";
        // line 46
        $this->env->loadTemplate("@CoreHome/_warningInvalidHost.twig")->display($context);
        // line 47
        echo "
                    ";
        // line 48
        $this->displayBlock('content', $context, $blocks);
        // line 50
        echo "
                </div>
            </div>
            ";
        // line 53
        $this->env->loadTemplate("_piwikTag.twig")->display($context);
        // line 54
        echo "        </div>
    </body>
</html>
";
    }

    // line 7
    public function block_head($context, array $blocks = array())
    {
        // line 8
        echo "            <meta charset=\"utf-8\">
            <title>";
        // line 9
        if ((!$this->getContext($context, "isCustomLogo"))) {
            echo "Piwik &rsaquo; ";
        }
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_Administration")), "html", null, true);
        echo "</title>
            <meta name=\"generator\" content=\"Piwik - Open Source Web Analytics\"/>
            <link rel=\"shortcut icon\" href=\"plugins/CoreHome/images/favicon.ico\"/>

            ";
        // line 13
        $this->env->loadTemplate("_jsGlobalVariables.twig")->display($context);
        // line 14
        echo "            ";
        $this->env->loadTemplate("_jsCssIncludes.twig")->display($context);
        // line 15
        echo "            <!--[if IE]>
            <link rel=\"stylesheet\" type=\"text/css\" href=\"plugins/Zeitgeist/stylesheets/ieonly.css\"/>
            <![endif]-->
        ";
    }

    // line 48
    public function block_content($context, array $blocks = array())
    {
        // line 49
        echo "                    ";
    }

    public function getTemplateName()
    {
        return "admin.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  142 => 49,  132 => 15,  127 => 13,  117 => 9,  114 => 8,  104 => 54,  102 => 53,  97 => 50,  95 => 48,  92 => 47,  84 => 43,  79 => 40,  76 => 39,  74 => 38,  69 => 35,  66 => 34,  63 => 33,  54 => 29,  52 => 28,  49 => 27,  47 => 26,  43 => 24,  37 => 22,  35 => 21,  29 => 7,  21 => 1,  507 => 169,  500 => 164,  481 => 161,  469 => 159,  452 => 158,  446 => 155,  440 => 151,  436 => 149,  421 => 147,  417 => 146,  414 => 145,  412 => 144,  408 => 143,  402 => 142,  396 => 141,  391 => 139,  385 => 138,  379 => 137,  375 => 136,  369 => 135,  362 => 131,  356 => 128,  352 => 127,  349 => 126,  342 => 123,  340 => 122,  335 => 121,  333 => 120,  327 => 116,  324 => 115,  316 => 114,  312 => 112,  306 => 110,  300 => 108,  298 => 107,  293 => 105,  286 => 101,  282 => 100,  278 => 99,  276 => 98,  273 => 97,  265 => 93,  262 => 92,  258 => 91,  253 => 90,  251 => 89,  248 => 88,  246 => 87,  243 => 86,  236 => 82,  231 => 80,  226 => 78,  223 => 77,  221 => 76,  215 => 72,  196 => 69,  185 => 68,  168 => 67,  162 => 64,  156 => 60,  153 => 52,  150 => 51,  147 => 50,  144 => 49,  141 => 48,  139 => 48,  135 => 46,  129 => 14,  124 => 43,  118 => 42,  111 => 7,  105 => 35,  101 => 34,  96 => 31,  90 => 46,  87 => 27,  85 => 26,  77 => 25,  73 => 24,  65 => 19,  61 => 32,  56 => 16,  48 => 11,  44 => 10,  40 => 23,  31 => 19,  28 => 3,);
    }
}
