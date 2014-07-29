<?php

/* @UserSettings/index.twig */
class __TwigTemplate_449c56c636079a5be5b846bf6858da2f03a254a153e1e98234b604fc096500f3 extends Twig_Template
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
        echo "<div id='leftcolumn'>
    <h2>";
        // line 2
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserSettings_BrowserFamilies")), "html", null, true);
        echo "</h2>
    ";
        // line 3
        echo $this->getContext($context, "dataTableBrowserType");
        echo "

    <h2>";
        // line 5
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserSettings_Browsers")), "html", null, true);
        echo "</h2>
    ";
        // line 6
        echo $this->getContext($context, "dataTableBrowser");
        echo "

    <h2>";
        // line 8
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Plugins")), "html", null, true);
        echo "</h2>
    ";
        // line 9
        echo $this->getContext($context, "dataTablePlugin");
        echo "
</div>

<div id='rightcolumn'>
    <h2>";
        // line 13
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserSettings_Configurations")), "html", null, true);
        echo "</h2>
    ";
        // line 14
        echo $this->getContext($context, "dataTableConfiguration");
        echo "

    <h2>";
        // line 16
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserSettings_OperatingSystems")), "html", null, true);
        echo "</h2>
    ";
        // line 17
        echo $this->getContext($context, "dataTableOS");
        echo "

    <h2>";
        // line 19
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserSettings_Resolutions")), "html", null, true);
        echo "</h2>
    ";
        // line 20
        echo $this->getContext($context, "dataTableResolution");
        echo "

    <h2>";
        // line 22
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserSettings_MobileVsDesktop")), "html", null, true);
        echo "</h2>
    ";
        // line 23
        echo $this->getContext($context, "dataTableMobileVsDesktop");
        echo "

    <h2>";
        // line 25
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserSettings_BrowserLanguage")), "html", null, true);
        echo "</h2>
    ";
        // line 26
        echo $this->getContext($context, "dataTableBrowserLanguage");
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "@UserSettings/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 26,  87 => 25,  82 => 23,  78 => 22,  73 => 20,  69 => 19,  64 => 17,  60 => 16,  55 => 14,  51 => 13,  44 => 9,  40 => 8,  35 => 6,  31 => 5,  26 => 3,  22 => 2,  19 => 1,);
    }
}
