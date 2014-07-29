<?php

/* @UserCountry/_updaterManage.twig */
class __TwigTemplate_8ae5b8840d90d5b344579bfe50daf17814a71e79dc8bf487b4ef9af9d205cfea extends Twig_Template
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
        echo "<div id=\"geoipdb-update-info\" ";
        if ((!$this->getContext($context, "geoIPDatabasesInstalled"))) {
            echo "style=\"display:none;\"";
        }
        echo ">
    <p>";
        // line 2
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_GeoIPUpdaterInstructions", "<a href=\"http://www.maxmind.com/en/download_files?rId=piwik\" _target=\"blank\">", "</a>", "<a href=\"http://www.maxmind.com/?rId=piwik\">", "</a>"));
        // line 3
        echo "
        <br/><br/>
";
        // line 5
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_GeoLiteCityLink", (("<a href='" . $this->getContext($context, "geoLiteUrl")) . "'>"), $this->getContext($context, "geoLiteUrl"), "</a>"));
        echo "
\t";
        // line 6
        if ($this->getContext($context, "geoIPDatabasesInstalled")) {
            // line 7
            echo "\t<br/><br/>";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_GeoIPUpdaterIntro")), "html", null, true);
            echo ":
\t";
        }
        // line 9
        echo "\t</p>
\t<table class=\"adminTable\" style=\"width:900px;\">
\t\t<tr>
\t\t\t<th>";
        // line 12
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_GoalType")), "html", null, true);
        echo "</th>
\t\t\t<th>";
        // line 13
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Actions_ColumnDownloadURL")), "html", null, true);
        echo "</th>
\t\t\t<th></th>
\t\t</tr>
\t\t<tr>
\t\t\t<td width=\"140\">";
        // line 17
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_LocationDatabase")), "html", null, true);
        echo "</td>
\t\t\t<td><input type=\"text\" id=\"geoip-location-db\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->getContext($context, "geoIPLocUrl"), "html", null, true);
        echo "\"/></td>
\t\t\t<td width=\"164\">
\t\t\t\t";
        // line 20
        ob_start();
        // line 21
        echo "\t\t\t\t";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_LocationDatabaseHint")), "html", null, true);
        echo "
\t\t\t\t";
        $context["locationHint"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 23
        echo "                ";
        $context["piwik"] = $this->env->loadTemplate("macros.twig");
        // line 24
        echo "\t\t\t\t";
        echo $context["piwik"]->getinlineHelp($this->getContext($context, "locationHint"));
        echo "
\t\t\t</td>
\t\t</tr>
\t\t<tr>
\t\t\t<td width=\"140\">";
        // line 28
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_ISPDatabase")), "html", null, true);
        echo "</td>
\t\t\t<td><input type=\"text\" id=\"geoip-isp-db\" value=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->getContext($context, "geoIPIspUrl"), "html", null, true);
        echo "\"/></td>
\t\t</tr>
\t\t<tr>
\t\t\t<td width=\"140\">";
        // line 32
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_OrgDatabase")), "html", null, true);
        echo "</td>
\t\t\t<td><input type=\"text\" id=\"geoip-org-db\" value=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->getContext($context, "geoIPOrgUrl"), "html", null, true);
        echo "\"/></td>
\t\t</tr>
\t\t<tr>
\t\t\t<td width=\"140\">";
        // line 36
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_DownloadNewDatabasesEvery")), "html", null, true);
        echo "</td>
\t\t\t<td id=\"geoip-update-period-cell\">
\t\t\t\t<input type=\"radio\" name=\"geoip-update-period\" value=\"month\" id=\"geoip-update-period-month\" ";
        // line 38
        if (($this->getContext($context, "geoIPUpdatePeriod") == "month")) {
            echo "checked=\"checked\"";
        }
        echo " />
\t\t\t\t<label for=\"geoip-update-period-month\">";
        // line 39
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_PeriodMonth")), "html", null, true);
        echo "</label>
\t\t\t\t
\t\t\t\t<input type=\"radio\" name=\"geoip-update-period\" value=\"week\" id=\"geoip-update-period-week\" ";
        // line 41
        if (($this->getContext($context, "geoIPUpdatePeriod") == "week")) {
            echo "checked=\"checked\"";
        }
        echo "/>
\t\t\t\t<label for=\"geoip-update-period-week\">";
        // line 42
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_PeriodWeek")), "html", null, true);
        echo "</label>
\t\t\t</td>
\t\t\t<td width=\"164\">
\t\t\t";
        // line 45
        ob_start();
        // line 46
        echo "\t\t\t\t";
        if ((array_key_exists("lastTimeUpdaterRun", $context) && (!twig_test_empty($this->getContext($context, "lastTimeUpdaterRun"))))) {
            // line 47
            echo "\t\t\t\t\t";
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_UpdaterWasLastRun", $this->getContext($context, "lastTimeUpdaterRun")));
            echo "
\t\t\t\t";
        } else {
            // line 49
            echo "\t\t\t\t\t";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_UpdaterHasNotBeenRun")), "html", null, true);
            echo "
\t\t\t\t";
        }
        // line 51
        echo "\t\t\t";
        $context["lastTimeRunNote"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 52
        echo "\t\t\t";
        echo $context["piwik"]->getinlineHelp($this->getContext($context, "lastTimeRunNote"));
        echo "
\t\t\t</td>
\t\t</tr>
\t</table>
\t<p style=\"display:inline-block;vertical-align:top;\">
\t\t<input type=\"button\" class=\"submit\" value=\"";
        // line 57
        if ((!$this->getContext($context, "geoIPDatabasesInstalled"))) {
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Continue")), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Save")), "html", null, true);
        }
        echo "\" id=\"update-geoip-links\"/>
\t</p>
\t<div style=\"display:inline-block;width:700px;\">
\t\t<span id=\"done-updating-updater\"></span>
\t\t<span id=\"geoipdb-update-info-error\"></span>
\t\t<div id=\"geoip-progressbar-container\" style=\"display:none;\">
\t\t\t<div id=\"geoip-updater-progressbar\"></div>
\t\t\t<span id=\"geoip-updater-progressbar-label\"></span>
\t\t</div>
\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@UserCountry/_updaterManage.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  156 => 52,  138 => 46,  136 => 45,  130 => 42,  124 => 41,  119 => 39,  113 => 38,  108 => 36,  102 => 33,  98 => 32,  80 => 24,  77 => 23,  71 => 21,  69 => 20,  53 => 13,  49 => 12,  44 => 9,  38 => 7,  32 => 5,  26 => 2,  19 => 1,  353 => 130,  347 => 128,  343 => 126,  336 => 122,  328 => 117,  324 => 116,  318 => 113,  314 => 112,  308 => 109,  305 => 108,  303 => 107,  299 => 105,  297 => 104,  294 => 103,  288 => 101,  282 => 99,  280 => 98,  274 => 94,  267 => 92,  262 => 90,  259 => 89,  253 => 87,  250 => 86,  247 => 85,  241 => 83,  230 => 81,  227 => 80,  224 => 79,  218 => 77,  215 => 76,  209 => 74,  201 => 71,  195 => 68,  191 => 67,  183 => 63,  180 => 62,  177 => 61,  175 => 60,  171 => 58,  165 => 57,  163 => 55,  159 => 54,  153 => 51,  147 => 49,  141 => 47,  135 => 44,  133 => 43,  121 => 36,  112 => 35,  106 => 34,  101 => 31,  97 => 30,  92 => 29,  88 => 28,  84 => 26,  79 => 23,  72 => 19,  68 => 18,  64 => 18,  60 => 17,  55 => 14,  50 => 13,  48 => 12,  43 => 10,  36 => 6,  33 => 5,  31 => 4,  28 => 3,);
    }
}
