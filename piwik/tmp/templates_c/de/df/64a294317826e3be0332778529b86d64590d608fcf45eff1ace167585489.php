<?php

/* @SitesManager/_displayJavascriptCode.twig */
class __TwigTemplate_dedf64a294317826e3be0332778529b86d64590d608fcf45eff1ace167585489 extends Twig_Template
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
        echo "<h2>";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("SitesManager_TrackingTags", $this->getContext($context, "displaySiteName"))), "html", null, true);
        echo "</h2>

<div class='trackingHelp'>
    ";
        // line 4
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_JSTracking_Intro")), "html", null, true);
        echo "
    <br/><br/>
    ";
        // line 6
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTrackingIntro3", "<a href=\"http://piwik.org/integrate/\" target=\"_blank\">", "</a>"));
        echo "

    <h3>";
        // line 8
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_JsTrackingTag")), "html", null, true);
        echo "</h3>

    <p>";
        // line 10
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_CodeNote", "&lt;/body&gt;"));
        echo "</p>

    <pre class=\"code-pre\"><code>";
        // line 12
        echo $this->getContext($context, "jsTag");
        echo "</code></pre>

    <br/>
    ";
        // line 15
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTrackingIntro5", "<a target=\"_blank\" href=\"http://piwik.org/docs/javascript-tracking/\">", "</a>"));
        echo "
    <br/><br/>
    ";
        // line 17
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_JSTracking_EndNote", "<em>", "</em>"));
        echo "
</div>";
    }

    public function getTemplateName()
    {
        return "@SitesManager/_displayJavascriptCode.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 17,  52 => 15,  46 => 12,  41 => 10,  36 => 8,  31 => 6,  26 => 4,  19 => 1,);
    }
}
