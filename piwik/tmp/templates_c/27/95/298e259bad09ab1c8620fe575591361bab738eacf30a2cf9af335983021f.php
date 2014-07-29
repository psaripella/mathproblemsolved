<?php

/* ajaxMacros.twig */
class __TwigTemplate_2795298e259bad09ab1c8620fe575591361bab738eacf30a2cf9af335983021f extends Twig_Template
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
        // line 4
        echo "
";
        // line 15
        echo "
";
    }

    // line 1
    public function geterrorDiv($_id = "ajaxError")
    {
        $context = $this->env->mergeGlobals(array(
            "id" => $_id,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "    <div id=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
            echo "\" style=\"display:none\"></div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 5
    public function getloadingDiv($_id = "ajaxLoadingDiv")
    {
        $context = $this->env->mergeGlobals(array(
            "id" => $_id,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 6
            echo "<div id=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
            echo "\" style=\"display:none;\">
    <div class=\"loadingPiwik\">
        <img src=\"plugins/Zeitgeist/images/loading-blue.gif\" alt=\"";
            // line 8
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_LoadingData")), "html", null, true);
            echo "\" />";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_LoadingData")), "html", null, true);
            echo "
    </div>
    <div class=\"loadingSegment\">
        ";
            // line 11
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("SegmentEditor_LoadingSegmentedDataMayTakeSomeTime")), "html", null, true);
            echo "
    </div>
</div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 16
    public function getrequestErrorDiv()
    {
        $context = $this->env->getGlobals();

        $blocks = array();

        ob_start();
        try {
            // line 17
            echo "<div id=\"loadingError\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ErrorRequest")), "html", null, true);
            echo "</div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "ajaxMacros.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 17,  58 => 16,  63 => 6,  165 => 64,  153 => 62,  151 => 61,  136 => 52,  130 => 50,  128 => 49,  106 => 43,  102 => 42,  98 => 40,  71 => 32,  44 => 24,  35 => 6,  26 => 4,  90 => 37,  82 => 22,  69 => 8,  49 => 27,  39 => 8,  33 => 6,  59 => 9,  52 => 5,  48 => 12,  21 => 2,  28 => 4,  24 => 3,  132 => 36,  113 => 44,  108 => 28,  104 => 27,  96 => 25,  92 => 16,  88 => 23,  79 => 33,  77 => 11,  70 => 15,  62 => 29,  46 => 9,  31 => 6,  27 => 1,  23 => 3,  19 => 4,  134 => 43,  131 => 42,  127 => 34,  124 => 47,  121 => 32,  114 => 20,  112 => 19,  107 => 16,  105 => 15,  100 => 26,  87 => 9,  84 => 22,  81 => 7,  74 => 20,  72 => 19,  68 => 44,  66 => 13,  60 => 12,  55 => 8,  53 => 33,  50 => 9,  41 => 9,  38 => 2,  36 => 7,  32 => 5,  30 => 19,  22 => 15,  56 => 13,  54 => 15,  51 => 11,  47 => 10,  45 => 9,  42 => 9,  40 => 5,  37 => 10,  34 => 3,  29 => 5,);
    }
}
