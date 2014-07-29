<?php

/* @Referrers/index.twig */
class __TwigTemplate_980f21372b1a2c6c1b2fe6e1a36e0eae9cbae3e65aa68fa9ac8f2a684f090fec extends Twig_Template
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
        echo "<h2 data-graph-id=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "nameGraphEvolutionReferrers"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_EvolutionOverPeriod")), "html", null, true);
        echo "</h2>
";
        // line 2
        echo $this->getContext($context, "graphEvolutionReferrers");
        echo "

<br/>
<div id='leftcolumn' style=\"position:relative;\">
    <h2>";
        // line 6
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Referrers_Type")), "html", null, true);
        echo "</h2>

    <div id='leftcolumn'>
        <div class=\"sparkline\">";
        // line 9
        echo call_user_func_array($this->env->getFunction('sparkline')->getCallable(), array($this->getContext($context, "urlSparklineDirectEntry")));
        echo "
            ";
        // line 10
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Referrers_TypeDirectEntries", (("<strong>" . $this->getContext($context, "visitorsFromDirectEntry")) . "</strong>")));
        echo "
            ";
        // line 11
        if ((!twig_test_empty(((array_key_exists("visitorsFromDirectEntryPercent", $context)) ? (_twig_default_filter($this->getContext($context, "visitorsFromDirectEntryPercent"))) : (""))))) {
            echo ",
                <strong>";
            // line 12
            echo twig_escape_filter($this->env, $this->getContext($context, "visitorsFromDirectEntryPercent"), "html", null, true);
            echo "%</strong> of visits
            ";
        }
        // line 14
        echo "            ";
        if ((!twig_test_empty(((array_key_exists("visitorsFromDirectEntryEvolution", $context)) ? (_twig_default_filter($this->getContext($context, "visitorsFromDirectEntryEvolution"))) : (""))))) {
            // line 15
            echo "                ";
            echo $this->getContext($context, "visitorsFromDirectEntryEvolution");
            echo "
            ";
        }
        // line 17
        echo "        </div>
        <div class=\"sparkline\">";
        // line 18
        echo call_user_func_array($this->env->getFunction('sparkline')->getCallable(), array($this->getContext($context, "urlSparklineSearchEngines")));
        echo "
            ";
        // line 19
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Referrers_TypeSearchEngines", (("<strong>" . $this->getContext($context, "visitorsFromSearchEngines")) . "</strong>")));
        echo "
            ";
        // line 20
        if ((!twig_test_empty(((array_key_exists("visitorsFromSearchEnginesPercent", $context)) ? (_twig_default_filter($this->getContext($context, "visitorsFromSearchEnginesPercent"))) : (""))))) {
            echo ",
                <strong>";
            // line 21
            echo twig_escape_filter($this->env, $this->getContext($context, "visitorsFromSearchEnginesPercent"), "html", null, true);
            echo "%</strong> of visits
            ";
        }
        // line 23
        echo "            ";
        if ((!twig_test_empty(((array_key_exists("visitorsFromSearchEnginesEvolution", $context)) ? (_twig_default_filter($this->getContext($context, "visitorsFromSearchEnginesEvolution"))) : (""))))) {
            // line 24
            echo "                ";
            echo $this->getContext($context, "visitorsFromSearchEnginesEvolution");
            echo "
            ";
        }
        // line 26
        echo "        </div>
    </div>
    <div id='rightcolumn'>
        <div class=\"sparkline\">";
        // line 29
        echo call_user_func_array($this->env->getFunction('sparkline')->getCallable(), array($this->getContext($context, "urlSparklineWebsites")));
        echo "
            ";
        // line 30
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Referrers_TypeWebsites", (("<strong>" . $this->getContext($context, "visitorsFromWebsites")) . "</strong>")));
        echo "
            ";
        // line 31
        if ((!twig_test_empty(((array_key_exists("visitorsFromWebsitesPercent", $context)) ? (_twig_default_filter($this->getContext($context, "visitorsFromWebsitesPercent"))) : (""))))) {
            echo ",
                <strong>";
            // line 32
            echo twig_escape_filter($this->env, $this->getContext($context, "visitorsFromWebsitesPercent"), "html", null, true);
            echo "%</strong> of visits
            ";
        }
        // line 34
        echo "            ";
        if ((!twig_test_empty(((array_key_exists("visitorsFromWebsitesEvolution", $context)) ? (_twig_default_filter($this->getContext($context, "visitorsFromWebsitesEvolution"))) : (""))))) {
            // line 35
            echo "                ";
            echo $this->getContext($context, "visitorsFromWebsitesEvolution");
            echo "
            ";
        }
        // line 37
        echo "        </div>
        <div class=\"sparkline\">";
        // line 38
        echo call_user_func_array($this->env->getFunction('sparkline')->getCallable(), array($this->getContext($context, "urlSparklineCampaigns")));
        echo "
            ";
        // line 39
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Referrers_TypeCampaigns", (("<strong>" . $this->getContext($context, "visitorsFromCampaigns")) . "</strong>")));
        echo "
            ";
        // line 40
        if ((!twig_test_empty(((array_key_exists("visitorsFromCampaignsPercent", $context)) ? (_twig_default_filter($this->getContext($context, "visitorsFromCampaignsPercent"))) : (""))))) {
            echo ",
                <strong>";
            // line 41
            echo twig_escape_filter($this->env, $this->getContext($context, "visitorsFromCampaignsPercent"), "html", null, true);
            echo "%</strong> of visits
            ";
        }
        // line 43
        echo "            ";
        if ((!twig_test_empty(((array_key_exists("visitorsFromCampaignsEvolution", $context)) ? (_twig_default_filter($this->getContext($context, "visitorsFromCampaignsEvolution"))) : (""))))) {
            // line 44
            echo "                ";
            echo $this->getContext($context, "visitorsFromCampaignsEvolution");
            echo "
            ";
        }
        // line 46
        echo "        </div>
    </div>

    <div style=\"clear:both;\"/>

    <div style=\"float:left;\">
        <br/>

        <h2>";
        // line 54
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_MoreDetails")), "html", null, true);
        echo "&nbsp;
            <a href=\"#\" class=\"section-toggler-link\" data-section-id=\"distinctReferrersByType\">(";
        // line 55
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Show")), "html", null, true);
        echo ")</a>
        </h2>
    </div>

    <div id=\"distinctReferrersByType\" style=\"display:none;float:left;\">
        <table cellpadding=\"15\">
            <tr>
                <td width=\"50%\">
                    <div class=\"sparkline\">";
        // line 63
        echo call_user_func_array($this->env->getFunction('sparkline')->getCallable(), array($this->getContext($context, "urlSparklineDistinctSearchEngines")));
        echo "
                        <strong>";
        // line 64
        echo twig_escape_filter($this->env, $this->getContext($context, "numberDistinctSearchEngines"), "html", null, true);
        echo "</strong> ";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Referrers_DistinctSearchEngines")), "html", null, true);
        echo "
                        ";
        // line 65
        if ((!twig_test_empty(((array_key_exists("numberDistinctSearchEnginesEvolution", $context)) ? (_twig_default_filter($this->getContext($context, "numberDistinctSearchEnginesEvolution"))) : (""))))) {
            // line 66
            echo "                            ";
            echo $this->getContext($context, "numberDistinctSearchEnginesEvolution");
            echo "
                        ";
        }
        // line 68
        echo "                    </div>
                    <div class=\"sparkline\">";
        // line 69
        echo call_user_func_array($this->env->getFunction('sparkline')->getCallable(), array($this->getContext($context, "urlSparklineDistinctKeywords")));
        echo "
                        <strong>";
        // line 70
        echo twig_escape_filter($this->env, $this->getContext($context, "numberDistinctKeywords"), "html", null, true);
        echo "</strong> ";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Referrers_DistinctKeywords")), "html", null, true);
        echo "
                        ";
        // line 71
        if ((!twig_test_empty(((array_key_exists("numberDistinctKeywordsEvolution", $context)) ? (_twig_default_filter($this->getContext($context, "numberDistinctKeywordsEvolution"))) : (""))))) {
            // line 72
            echo "                            ";
            echo $this->getContext($context, "numberDistinctKeywordsEvolution");
            echo "
                        ";
        }
        // line 74
        echo "                    </div>
                </td>
                <td width=\"50%\">
                    <div class=\"sparkline\">";
        // line 77
        echo call_user_func_array($this->env->getFunction('sparkline')->getCallable(), array($this->getContext($context, "urlSparklineDistinctWebsites")));
        echo "
                        <strong>";
        // line 78
        echo twig_escape_filter($this->env, $this->getContext($context, "numberDistinctWebsites"), "html", null, true);
        echo "</strong> ";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Referrers_DistinctWebsites")), "html", null, true);
        echo "
                        ";
        // line 79
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Referrers_UsingNDistinctUrls", (("<strong>" . $this->getContext($context, "numberDistinctWebsitesUrls")) . "</strong>")));
        echo "
                        ";
        // line 80
        if ((!twig_test_empty(((array_key_exists("numberDistinctWebsitesEvolution", $context)) ? (_twig_default_filter($this->getContext($context, "numberDistinctWebsitesEvolution"))) : (""))))) {
            // line 81
            echo "                            ";
            echo $this->getContext($context, "numberDistinctWebsitesEvolution");
            echo "
                        ";
        }
        // line 83
        echo "                    </div>
                    <div class=\"sparkline\">";
        // line 84
        echo call_user_func_array($this->env->getFunction('sparkline')->getCallable(), array($this->getContext($context, "urlSparklineDistinctCampaigns")));
        echo "
                        <strong>";
        // line 85
        echo twig_escape_filter($this->env, $this->getContext($context, "numberDistinctCampaigns"), "html", null, true);
        echo "</strong> ";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Referrers_DistinctCampaigns")), "html", null, true);
        echo "
                        ";
        // line 86
        if ((!twig_test_empty(((array_key_exists("numberDistinctCampaignsEvolution", $context)) ? (_twig_default_filter($this->getContext($context, "numberDistinctCampaignsEvolution"))) : (""))))) {
            // line 87
            echo "                            ";
            echo $this->getContext($context, "numberDistinctCampaignsEvolution");
            echo "
                        ";
        }
        // line 89
        echo "                    </div>
                </td>
            </tr>
        </table>
        <br/>
    </div>

    <p style=\"clear:both;\"/>

    <div style=\"float:left;\">";
        // line 98
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_View")), "html", null, true);
        echo "
        <a href=\"javascript:broadcast.propagateAjax('module=Referrers&action=getSearchEnginesAndKeywords')\">";
        // line 99
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Referrers_SubmenuSearchEngines")), "html", null, true);
        echo "</a>,
        <a href=\"javascript:broadcast.propagateAjax('module=Referrers&action=indexWebsites')\">";
        // line 100
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Referrers_SubmenuWebsites")), "html", null, true);
        echo "</a>,
        <a href=\"javascript:broadcast.propagateAjax('module=Referrers&action=indexCampaigns')\">";
        // line 101
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Referrers_Campaigns")), "html", null, true);
        echo "</a>.
    </div>
</div>

<div id='rightcolumn'>
    <h2>";
        // line 106
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Referrers_DetailsByReferrerType")), "html", null, true);
        echo "</h2>
    ";
        // line 107
        echo $this->getContext($context, "dataTableReferrerType");
        echo "
</div>

<div style=\"clear:both;\"></div>

";
        // line 112
        if (($this->getContext($context, "totalVisits") > 0)) {
            // line 113
            echo "    <h2>";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Referrers_ReferrersOverview")), "html", null, true);
            echo "</h2>
    ";
            // line 114
            echo $this->getContext($context, "referrersReportsByDimension");
            echo "
";
        }
        // line 116
        echo "
";
        // line 117
        $this->env->loadTemplate("_sparklineFooter.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "@Referrers/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  324 => 117,  321 => 116,  316 => 114,  311 => 113,  309 => 112,  301 => 107,  297 => 106,  289 => 101,  285 => 100,  281 => 99,  277 => 98,  266 => 89,  260 => 87,  258 => 86,  252 => 85,  248 => 84,  245 => 83,  239 => 81,  237 => 80,  233 => 79,  227 => 78,  223 => 77,  218 => 74,  212 => 72,  210 => 71,  204 => 70,  200 => 69,  197 => 68,  191 => 66,  189 => 65,  183 => 64,  179 => 63,  168 => 55,  164 => 54,  154 => 46,  148 => 44,  145 => 43,  140 => 41,  136 => 40,  132 => 39,  128 => 38,  125 => 37,  119 => 35,  116 => 34,  111 => 32,  107 => 31,  103 => 30,  99 => 29,  94 => 26,  88 => 24,  85 => 23,  80 => 21,  76 => 20,  72 => 19,  68 => 18,  65 => 17,  59 => 15,  56 => 14,  51 => 12,  47 => 11,  43 => 10,  39 => 9,  33 => 6,  26 => 2,  19 => 1,);
    }
}
