<?php

/* @MultiSites/_siteRow.twig */
class __TwigTemplate_955a71135a6f53595763368bf9ad0cc0f227c8c75903042989decd6965ef5ed4 extends Twig_Template
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
        echo "<td class=\"multisites-label label\">
    <a title=\"View reports\" href=\"index.php?module=CoreHome&action=index&date=%date%&period=%period%&idSite=%idsite%\">%name%</a>

    <span style=\"width: 10px; margin-left:3px;\">
\t<a target=\"_blank\" title=\"";
        // line 5
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_GoTo", "%main_url%")), "html", null, true);
        echo "\" href=\"%main_url%\"><img src=\"plugins/MultiSites/images/link.gif\"/></a>
    </span>
</td>
<td class=\"multisites-column\">
    %visits%
</td>
<td class=\"multisites-column\">
    %pageviews%
</td>
";
        // line 14
        if ($this->getContext($context, "displayRevenueColumn")) {
            // line 15
            echo "    <td class=\"multisites-column\">
        %revenue%
    </td>
";
        }
        // line 19
        if (($this->getContext($context, "period") != "range")) {
            // line 20
            echo "<td style=\"width:170px;\">
    <div class=\"visits\" style=\"display:none;\">%visitsSummary%</div>
    <div class=\"pageviews\" style=\"display:none;\">%pageviewsSummary%</div>
    ";
            // line 23
            if ($this->getContext($context, "displayRevenueColumn")) {
                // line 24
                echo "        <div class=\"revenue\" style=\"display:none;\">%revenueSummary%</div>
    ";
            }
            // line 26
            echo "    ";
        }
        // line 27
        echo "    ";
        if ($this->getContext($context, "show_sparklines")) {
            // line 28
            echo "    <td style=\"width:180px;\">
        <div id=\"sparkline_%idsite%\" class=\"sparkline\" style=\"width: 100px; margin: auto;\">
            <a target=\"_blank\" href=\"index.php?module=CoreHome&action=index&date=%date%&period=%period%&idSite=%idsite%\"
               title=\"";
            // line 31
            ob_start();
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_DashboardOf", "%name%")), "html", null, true);
            $context["dashboardName"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            echo " ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_GoTo", $this->getContext($context, "dashboardName"))), "html", null, true);
            echo "\">%sparkline%</a>
        </div>
    </td>
";
        }
    }

    public function getTemplateName()
    {
        return "@MultiSites/_siteRow.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 31,  64 => 28,  61 => 27,  58 => 26,  54 => 24,  52 => 23,  47 => 20,  45 => 19,  37 => 14,  25 => 5,  19 => 1,  358 => 124,  352 => 122,  350 => 121,  345 => 119,  329 => 105,  321 => 100,  317 => 99,  313 => 97,  311 => 96,  300 => 87,  290 => 85,  288 => 84,  280 => 83,  272 => 82,  266 => 79,  255 => 76,  246 => 73,  242 => 72,  239 => 71,  237 => 70,  229 => 68,  225 => 67,  216 => 64,  212 => 63,  203 => 60,  199 => 59,  188 => 51,  180 => 50,  177 => 49,  172 => 48,  168 => 47,  164 => 46,  157 => 42,  152 => 41,  149 => 40,  146 => 39,  144 => 38,  139 => 36,  135 => 35,  130 => 33,  126 => 32,  122 => 31,  118 => 30,  114 => 29,  109 => 28,  98 => 25,  92 => 24,  86 => 23,  82 => 22,  78 => 21,  70 => 20,  66 => 19,  62 => 18,  55 => 17,  51 => 16,  43 => 10,  39 => 15,  36 => 7,  34 => 6,  31 => 5,  29 => 4,  26 => 3,);
    }
}
