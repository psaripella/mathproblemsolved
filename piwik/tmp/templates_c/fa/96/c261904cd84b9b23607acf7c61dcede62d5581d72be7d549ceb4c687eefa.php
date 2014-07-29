<?php

/* @MultiSites/getSitesInfo.twig */
class __TwigTemplate_fa96c261904cd84b9b23607acf7c61dcede62d5581d72be7d549ceb4c687eefa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate((($this->getContext($context, "isWidgetized")) ? ("empty.twig") : ("dashboard.twig")));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        if ((!$this->getContext($context, "isWidgetized"))) {
            // line 5
            echo "    <div class=\"top_controls\">
        ";
            // line 6
            $this->env->loadTemplate("@CoreHome/_periodSelect.twig")->display($context);
            // line 7
            echo "        ";
            $this->env->loadTemplate("@CoreHome/_headerMessage.twig")->display($context);
            // line 8
            echo "    </div>
";
        }
        // line 10
        echo "
<div class=\"pageWrap\" id=\"multisites\">
    <div id=\"main\">
        <script type=\"text/javascript\">
            var allSites = [];
            var params = [];
            ";
        // line 16
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "sitesData"));
        foreach ($context['_seq'] as $context["i"] => $context["site"]) {
            // line 17
            echo "            allSites[";
            echo twig_escape_filter($this->env, $this->getContext($context, "i"), "html", null, true);
            echo "] = new setRowData(";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "site"), "idsite"), "html", null, true);
            echo ",
                ";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "site"), "visits"), "html", null, true);
            echo ",
                ";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "site"), "pageviews"), "html", null, true);
            echo ",
                ";
            // line 20
            if (twig_test_empty($this->getAttribute($this->getContext($context, "site"), "revenue"))) {
                echo "0";
            } else {
                echo $this->getAttribute($this->getContext($context, "site"), "revenue");
            }
            echo ",
                '";
            // line 21
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "site"), "name"), "js"), "html", null, true);
            echo "',
                '";
            // line 22
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "site"), "main_url"), "js"), "html", null, true);
            echo "',
                '";
            // line 23
            if ($this->getAttribute($this->getContext($context, "site", true), "visits_evolution", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, strtr($this->getAttribute($this->getContext($context, "site"), "visits_evolution"), array("," => ".")), "html", null, true);
            }
            echo "',
                '";
            // line 24
            if ($this->getAttribute($this->getContext($context, "site", true), "pageviews_evolution", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, strtr($this->getAttribute($this->getContext($context, "site"), "pageviews_evolution"), array("," => ".")), "html", null, true);
            }
            echo "',
                '";
            // line 25
            if ($this->getAttribute($this->getContext($context, "site", true), "revenue_evolution", array(), "any", true, true)) {
                echo strtr($this->getAttribute($this->getContext($context, "site"), "revenue_evolution"), array("," => "."));
            }
            echo "'
            );
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['i'], $context['site'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "            params['period'] = '";
        echo twig_escape_filter($this->env, $this->getContext($context, "period"), "html", null, true);
        echo "';
            params['date'] = '";
        // line 29
        echo twig_escape_filter($this->env, $this->getContext($context, "date"), "html", null, true);
        echo "';
            params['evolutionBy'] = '";
        // line 30
        echo twig_escape_filter($this->env, $this->getContext($context, "evolutionBy"), "html", null, true);
        echo "';
            params['mOrderBy'] = '";
        // line 31
        echo twig_escape_filter($this->env, $this->getContext($context, "orderBy"), "html", null, true);
        echo "';
            params['order'] = '";
        // line 32
        echo twig_escape_filter($this->env, $this->getContext($context, "order"), "html", null, true);
        echo "';
            params['limit'] = '";
        // line 33
        echo twig_escape_filter($this->env, $this->getContext($context, "limit"), "html", null, true);
        echo "';
            params['page'] = 1;
            params['prev'] = \"";
        // line 35
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Previous")), "js"), "html", null, true);
        echo "\";
            params['next'] = \"";
        // line 36
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Next")), "js"), "html", null, true);
        echo "\";

            ";
        // line 38
        ob_start();
        // line 39
        echo "            ";
        $this->env->loadTemplate("@MultiSites/_siteRow.twig")->display($context);
        // line 40
        echo "            ";
        $context["row"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 41
        echo "            params['row'] = '";
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->getContext($context, "row"), "js"), "html", null, true);
        echo "';
            params['dateSparkline'] = '";
        // line 42
        echo twig_escape_filter($this->env, $this->getContext($context, "dateSparkline"), "html", null, true);
        echo "';
        </script>

        <div class=\"centerLargeDiv\">
            <h2>";
        // line 46
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_AllWebsitesDashboard")), "html", null, true);
        echo "
                ";
        // line 47
        ob_start();
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NVisits", $this->getContext($context, "totalVisits"))), "html", null, true);
        $context["nVisits"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 48
        echo "                ";
        ob_start();
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NVisits", $this->getContext($context, "pastTotalVisits"))), "html", null, true);
        $context["nVisitsLast"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 49
        echo "                <span class='smallTitle'
                ";
        // line 50
        if ($this->getContext($context, "totalVisitsEvolution")) {
            echo "title=\"";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_EvolutionSummaryGeneric", $this->getContext($context, "nVisits"), $this->getContext($context, "prettyDate"), $this->getContext($context, "nVisitsLast"), $this->getContext($context, "pastPeriodPretty"), $this->getContext($context, "totalVisitsEvolution"))), "html", null, true);
            echo "\"";
        }
        echo ">
                    ";
        // line 51
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_TotalVisitsPageviewsRevenue", (("<strong>" . $this->getContext($context, "totalVisits")) . "</strong>"), (("<strong>" . $this->getContext($context, "totalPageviews")) . "</strong>"), (("<strong>" . $this->getContext($context, "totalRevenue")) . "</strong>")));
        echo "
\t            </span>
            </h2>

            <table id=\"mt\" class=\"dataTable\" cellspacing=\"0\">
                <thead>
                <tr>
                    <th id=\"names\" class=\"label\" onClick=\"params = setOrderBy(this,allSites, params, 'names');\">
                        <span>";
        // line 59
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Website")), "html", null, true);
        echo "</span>
                        <span class=\"arrow ";
        // line 60
        if (($this->getContext($context, "evolutionBy") == "names")) {
            echo "multisites_";
            echo twig_escape_filter($this->env, $this->getContext($context, "order"), "html", null, true);
        }
        echo "\"></span>
                    </th>
                    <th id=\"visits\" class=\"multisites-column\" style=\"width: 100px;\" onClick=\"params = setOrderBy(this,allSites, params, 'visits');\">
                        <span>";
        // line 63
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnNbVisits")), "html", null, true);
        echo "</span>
                        <span class=\"arrow ";
        // line 64
        if (($this->getContext($context, "evolutionBy") == "visits")) {
            echo "multisites_";
            echo twig_escape_filter($this->env, $this->getContext($context, "order"), "html", null, true);
        }
        echo "\"></span>
                    </th>
                    <th id=\"pageviews\" class=\"multisites-column\" style=\"width: 110px;\" onClick=\"params = setOrderBy(this,allSites, params, 'pageviews');\">
                        <span>";
        // line 67
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnPageviews")), "html", null, true);
        echo "</span>
                        <span class=\"arrow ";
        // line 68
        if (($this->getContext($context, "evolutionBy") == "pageviews")) {
            echo "multisites_";
            echo twig_escape_filter($this->env, $this->getContext($context, "order"), "html", null, true);
        }
        echo "\"></span>
                    </th>
                    ";
        // line 70
        if ($this->getContext($context, "displayRevenueColumn")) {
            // line 71
            echo "                        <th id=\"revenue\" class=\"multisites-column\" style=\"width: 110px;\" onClick=\"params = setOrderBy(this,allSites, params, 'revenue');\">
                            <span>";
            // line 72
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnRevenue")), "html", null, true);
            echo "</span>
                            <span class=\"arrow ";
            // line 73
            if (($this->getContext($context, "evolutionBy") == "revenue")) {
                echo "multisites_";
                echo twig_escape_filter($this->env, $this->getContext($context, "order"), "html", null, true);
            }
            echo "\"></span>
                        </th>
                    ";
        }
        // line 76
        echo "                    <th id=\"evolution\" style=\" width:350px;\" colspan=\"";
        if ($this->getContext($context, "show_sparklines")) {
            echo "2";
        } else {
            echo "1";
        }
        echo "\">
                        <span class=\"arrow \"></span>
                        <span class=\"evolution\" style=\"cursor:pointer;\"
                              onClick=\"params = setOrderBy(this,allSites, params, \$('#evolution_selector').val() + 'Summary');\"> ";
        // line 79
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("MultiSites_Evolution")), "html", null, true);
        echo "</span>
                        <select class=\"selector\" id=\"evolution_selector\"
                                onchange=\"params['evolutionBy'] = \$('#evolution_selector').val(); switchEvolution(params);\">
                            <option value=\"visits\" ";
        // line 82
        if (($this->getContext($context, "evolutionBy") == "visits")) {
            echo " selected ";
        }
        echo ">";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnNbVisits")), "html", null, true);
        echo "</option>
                            <option value=\"pageviews\" ";
        // line 83
        if (($this->getContext($context, "evolutionBy") == "pageviews")) {
            echo " selected ";
        }
        echo "}>";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnPageviews")), "html", null, true);
        echo "</option>
                            ";
        // line 84
        if ($this->getContext($context, "displayRevenueColumn")) {
            // line 85
            echo "                                <option value=\"revenue\" ";
            if (($this->getContext($context, "evolutionBy") == "revenue")) {
                echo " selected ";
            }
            echo ">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnRevenue")), "html", null, true);
            echo "</option>
                            ";
        }
        // line 87
        echo "                        </select>
                    </th>
                </tr>
                </thead>

                <tbody id=\"tb\">
                </tbody>

                <tfoot>
                ";
        // line 96
        if ($this->getContext($context, "isSuperUser")) {
            // line 97
            echo "                    <tr>
                        <td colspan=\"8\" class=\"clean\" style=\"text-align: right; padding-top: 15px;padding-right:10px;\">
                            <a href=\"";
            // line 99
            echo $this->getContext($context, "url");
            echo "&module=SitesManager&action=index&showaddsite=1\">
                                <img src='plugins/UsersManager/images/add.png' alt=\"\" style=\"margin: 0;\"/> ";
            // line 100
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("SitesManager_AddSite")), "html", null, true);
            echo "
                            </a>
                        </td>
                    </tr>
                ";
        }
        // line 105
        echo "                <tr row_id=\"last\">
                    <td colspan=\"8\" class=\"clean\" style=\"padding: 20px;\">
                        <span id=\"prev\" class=\"pager\" style=\"padding-right: 20px;\"></span>
                        <span class=\"dataTablePages\">
                            <span id=\"counter\">
                            </span>
                        </span>
                        <span id=\"next\" class=\"clean\" style=\"padding-left: 20px;\"></span>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
        <script type=\"text/javascript\">
            prepareRows(allSites, params, '";
        // line 119
        echo twig_escape_filter($this->env, $this->getContext($context, "orderBy"), "html", null, true);
        echo "');

            ";
        // line 121
        if ($this->getContext($context, "autoRefreshTodayReport")) {
            // line 122
            echo "            piwikHelper.refreshAfter(";
            echo twig_escape_filter($this->env, $this->getContext($context, "autoRefreshTodayReport"), "html", null, true);
            echo " * 1000);
            ";
        }
        // line 124
        echo "        </script>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@MultiSites/getSitesInfo.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  358 => 124,  352 => 122,  350 => 121,  345 => 119,  329 => 105,  321 => 100,  317 => 99,  313 => 97,  311 => 96,  300 => 87,  290 => 85,  288 => 84,  280 => 83,  272 => 82,  266 => 79,  255 => 76,  246 => 73,  242 => 72,  239 => 71,  237 => 70,  229 => 68,  225 => 67,  216 => 64,  212 => 63,  203 => 60,  199 => 59,  188 => 51,  180 => 50,  177 => 49,  172 => 48,  168 => 47,  164 => 46,  157 => 42,  152 => 41,  149 => 40,  146 => 39,  144 => 38,  139 => 36,  135 => 35,  130 => 33,  126 => 32,  122 => 31,  118 => 30,  114 => 29,  109 => 28,  98 => 25,  92 => 24,  86 => 23,  82 => 22,  78 => 21,  70 => 20,  66 => 19,  62 => 18,  55 => 17,  51 => 16,  43 => 10,  39 => 8,  36 => 7,  34 => 6,  31 => 5,  29 => 4,  26 => 3,);
    }
}
