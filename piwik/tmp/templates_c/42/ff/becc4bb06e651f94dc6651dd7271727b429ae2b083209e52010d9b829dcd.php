<?php

/* dashboard.twig */
class __TwigTemplate_42ffbecc4bb06e651f94dc6651dd7271727b429ae2b083209e52010d9b829dcd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'notification' => array($this, 'block_notification'),
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
        // line 24
        echo "    </head>
    <body>
    ";
        // line 26
        $this->env->loadTemplate("_iframeBuster.twig")->display($context);
        // line 27
        echo "    ";
        $this->env->loadTemplate("@CoreHome/_javaScriptDisabled.twig")->display($context);
        // line 28
        echo "
    <div id=\"root\">
        ";
        // line 30
        $this->env->loadTemplate("@CoreHome/_warningInvalidHost.twig")->display($context);
        // line 31
        echo "        ";
        $this->env->loadTemplate("@CoreHome/_topScreen.twig")->display($context);
        // line 32
        echo "
        ";
        // line 33
        $this->displayBlock('notification', $context, $blocks);
        // line 36
        echo "
        <div class=\"ui-confirm\" id=\"alert\">
            <h2></h2>
            <input role=\"yes\" type=\"button\" value=\"";
        // line 39
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Ok")), "html", null, true);
        echo "\"/>
        </div>

        ";
        // line 42
        $this->displayBlock('content', $context, $blocks);
        // line 44
        echo "    </div>

    ";
        // line 46
        $this->env->loadTemplate("_piwikTag.twig")->display($context);
        // line 47
        echo "    
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
        echo $this->getContext($context, "siteName");
        echo " - ";
        if (($this->getContext($context, "isCustomLogo") == false)) {
            echo "Piwik &rsaquo; ";
        }
        echo " ";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_WebAnalyticsReports")), "html", null, true);
        echo "</title>
            <meta http-equiv=\"X-UA-Compatible\" content=\"IE=EDGE,chrome=1\"/>
            <meta name=\"viewport\" content=\"initial-scale=1.0\" />
            <meta name=\"generator\" content=\"Piwik - Open Source Web Analytics\"/>
            <meta name=\"description\" content=\"Web Analytics report for '";
        // line 13
        echo twig_escape_filter($this->env, $this->getContext($context, "siteName"), "html", null, true);
        echo "' - Piwik\"/>
            <link rel=\"shortcut icon\" href=\"plugins/CoreHome/images/favicon.ico\"/>
            ";
        // line 15
        $this->env->loadTemplate("_jsGlobalVariables.twig")->display($context);
        // line 16
        echo "            <!--[if lt IE 9]>
            <script language=\"javascript\" type=\"text/javascript\" src=\"libs/jqplot/excanvas.min.js\"></script>
            <![endif]-->
            ";
        // line 19
        $this->env->loadTemplate("_jsCssIncludes.twig")->display($context);
        // line 20
        echo "            <!--[if IE]>
            <link rel=\"stylesheet\" type=\"text/css\" href=\"plugins/Zeitgeist/stylesheets/ieonly.css\"/>
            <![endif]-->
        ";
    }

    // line 33
    public function block_notification($context, array $blocks = array())
    {
        // line 34
        echo "            ";
        $this->env->loadTemplate("@CoreHome/_notifications.twig")->display($context);
        // line 35
        echo "        ";
    }

    // line 42
    public function block_content($context, array $blocks = array())
    {
        // line 43
        echo "        ";
    }

    public function getTemplateName()
    {
        return "dashboard.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 43,  131 => 42,  127 => 35,  124 => 34,  121 => 33,  114 => 20,  112 => 19,  107 => 16,  105 => 15,  100 => 13,  87 => 9,  84 => 8,  81 => 7,  74 => 47,  72 => 46,  68 => 44,  66 => 42,  60 => 39,  55 => 36,  53 => 33,  50 => 32,  41 => 28,  38 => 27,  36 => 26,  32 => 24,  30 => 7,  22 => 1,  56 => 12,  54 => 11,  51 => 10,  47 => 31,  45 => 30,  42 => 6,  40 => 5,  37 => 4,  34 => 3,  29 => 2,);
    }
}
