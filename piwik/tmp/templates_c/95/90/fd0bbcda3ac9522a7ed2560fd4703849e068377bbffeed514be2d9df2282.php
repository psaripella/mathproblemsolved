<?php

/* @Dashboard/_dashboardSettings.twig */
class __TwigTemplate_9590fd0bbcda3ac9522a7ed2560fd4703849e068377bbffeed514be2d9df2282 extends Twig_Template
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
        echo "<div id=\"dashboardSettings\" class=\"js-autoLeftPanel\">
    <span>";
        // line 2
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_WidgetsAndDashboard")), "html", null, true);
        echo "</span>
    <ul class=\"submenu\">
        <li>
            <div id=\"addWidget\">";
        // line 5
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_AddAWidget")), "html", null, true);
        echo " &darr;</div>
            <ul class=\"widgetpreview-categorylist\"></ul>
        </li>
        <li>
            <div id=\"manageDashboard\">";
        // line 9
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_ManageDashboard")), "html", null, true);
        echo " &darr;</div>
            <ul>
                <li onclick=\"resetDashboard();\">";
        // line 11
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_ResetDashboard")), "html", null, true);
        echo "</li>
                <li onclick=\"showChangeDashboardLayoutDialog();\">";
        // line 12
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_ChangeDashboardLayout")), "html", null, true);
        echo "</li>
                ";
        // line 13
        if (($this->getContext($context, "userLogin") && ($this->getContext($context, "userLogin") != "anonymous"))) {
            // line 14
            echo "                    <li onclick=\"renameDashboard();\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_RenameDashboard")), "html", null, true);
            echo "</li>
                    <li onclick=\"removeDashboard();\" id=\"removeDashboardLink\">";
            // line 15
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_RemoveDashboard")), "html", null, true);
            echo "</li>
                    ";
            // line 16
            if ($this->getContext($context, "isSuperUser")) {
                // line 17
                echo "                        <li onclick=\"setAsDefaultWidgets();\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_SetAsDefaultWidgets")), "html", null, true);
                echo "</li>
                        <li onclick=\"copyDashboardToUser();\">";
                // line 18
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_CopyDashboardToUser")), "html", null, true);
                echo "</li>
                    ";
            }
            // line 20
            echo "                ";
        }
        // line 21
        echo "            </ul>
        </li>
        ";
        // line 23
        if (($this->getContext($context, "userLogin") && ("anonymous" != $this->getContext($context, "userLogin")))) {
            // line 24
            echo "            <li onclick=\"createDashboard();\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_CreateNewDashboard")), "html", null, true);
            echo "</li>
        ";
        }
        // line 26
        echo "    </ul>
    <ul class=\"widgetpreview-widgetlist\"></ul>
    <div class=\"widgetpreview-preview\"></div>
</div>";
    }

    public function getTemplateName()
    {
        return "@Dashboard/_dashboardSettings.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 26,  80 => 24,  78 => 23,  61 => 17,  97 => 33,  95 => 32,  91 => 31,  57 => 23,  101 => 17,  58 => 16,  63 => 6,  165 => 64,  153 => 62,  151 => 61,  136 => 52,  130 => 50,  128 => 49,  106 => 43,  102 => 42,  98 => 40,  71 => 20,  44 => 12,  35 => 9,  26 => 4,  90 => 37,  82 => 22,  69 => 8,  49 => 27,  39 => 8,  33 => 6,  59 => 16,  52 => 5,  48 => 13,  21 => 2,  28 => 5,  24 => 3,  132 => 36,  113 => 44,  108 => 28,  104 => 36,  96 => 25,  92 => 16,  88 => 30,  79 => 33,  77 => 27,  70 => 15,  62 => 25,  46 => 9,  31 => 6,  27 => 1,  23 => 3,  19 => 1,  134 => 43,  131 => 42,  127 => 34,  124 => 47,  121 => 32,  114 => 20,  112 => 19,  107 => 16,  105 => 15,  100 => 26,  87 => 9,  84 => 22,  81 => 7,  74 => 21,  72 => 19,  68 => 44,  66 => 18,  60 => 12,  55 => 15,  53 => 33,  50 => 14,  41 => 8,  38 => 2,  36 => 7,  32 => 5,  30 => 19,  22 => 2,  56 => 13,  54 => 15,  51 => 11,  47 => 10,  45 => 9,  42 => 9,  40 => 11,  37 => 10,  34 => 3,  29 => 4,);
    }
}
