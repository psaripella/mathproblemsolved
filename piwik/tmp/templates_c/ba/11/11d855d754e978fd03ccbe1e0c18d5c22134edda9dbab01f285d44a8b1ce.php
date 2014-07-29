<?php

/* @CoreHome/_dataTableFooter.twig */
class __TwigTemplate_ba1111d855d754e978fd03ccbe1e0c18d5c22134edda9dbab01f285d44a8b1ce extends Twig_Template
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
        echo "<div class=\"dataTableFeatures\">

    <div class=\"dataTableFooterNavigation\">
        ";
        // line 4
        if ($this->getAttribute($this->getContext($context, "properties"), "show_offset_information")) {
            // line 5
            echo "            <span>
                <span class=\"dataTablePages\"></span>
            </span>
        ";
        }
        // line 9
        echo "
        ";
        // line 10
        if ($this->getAttribute($this->getContext($context, "properties"), "show_pagination_control")) {
            // line 11
            echo "            <span>
                <span class=\"dataTablePrevious\">&lsaquo; ";
            // line 12
            if ($this->getAttribute($this->getContext($context, "clientSideParameters", true), "dataTablePreviousIsFirst", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_First")), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Previous")), "html", null, true);
            }
            echo " </span>
                <span class=\"dataTableNext\">";
            // line 13
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Next")), "html", null, true);
            echo " &rsaquo;</span>
            </span>
        ";
        }
        // line 16
        echo "
        ";
        // line 17
        if ($this->getAttribute($this->getContext($context, "properties"), "show_search")) {
            // line 18
            echo "            <span class=\"dataTableSearchPattern\">
                <input type=\"text\" class=\"searchInput\" length=\"15\" />
                <input type=\"submit\" value=\"";
            // line 20
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Search")), "html", null, true);
            echo "\" />
            </span>
        ";
        }
        // line 23
        echo "    </div>

    <span class=\"loadingPiwik\" style=\"display:none;\"><img src=\"plugins/Zeitgeist/images/loading-blue.gif\"/> ";
        // line 25
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_LoadingData")), "html", null, true);
        echo "</span>
    ";
        // line 26
        if ($this->getAttribute($this->getContext($context, "properties"), "show_footer_icons")) {
            // line 27
            echo "        <div class=\"dataTableFooterIcons\">
            <div class=\"dataTableFooterWrap\">
                ";
            // line 29
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "footerIcons"));
            foreach ($context['_seq'] as $context["_key"] => $context["footerIconGroup"]) {
                // line 30
                echo "                <div class=\"tableIconsGroup\">
                    <span class=\"";
                // line 31
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "footerIconGroup"), "class"), "html", null, true);
                echo "\">
                    ";
                // line 32
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "footerIconGroup"), "buttons"));
                foreach ($context['_seq'] as $context["_key"] => $context["footerIcon"]) {
                    // line 33
                    echo "                        <span>
                            ";
                    // line 34
                    if (($this->getAttribute($this->getContext($context, "properties"), "show_active_view_icon") && ($this->getAttribute($this->getContext($context, "clientSideParameters"), "viewDataTable") == $this->getAttribute($this->getContext($context, "footerIcon"), "id")))) {
                        // line 35
                        echo "                            <img src=\"plugins/Zeitgeist/images/data_table_footer_active_item.png\" class=\"dataTableFooterActiveItem\"/>
                            ";
                    }
                    // line 37
                    echo "                            <a class=\"tableIcon ";
                    if (($this->getAttribute($this->getContext($context, "clientSideParameters"), "viewDataTable") == $this->getAttribute($this->getContext($context, "footerIcon"), "id"))) {
                        echo "activeIcon";
                    }
                    echo "\" data-footer-icon-id=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "footerIcon"), "id"), "html", null, true);
                    echo "\">
                                <img width=\"16\" height=\"16\" title=\"";
                    // line 38
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "footerIcon"), "title"), "html", null, true);
                    echo "\" src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "footerIcon"), "icon"), "html", null, true);
                    echo "\"/>
                                ";
                    // line 39
                    if ($this->getAttribute($this->getContext($context, "footerIcon", true), "text", array(), "any", true, true)) {
                        echo "<span>";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "footerIcon"), "text"), "html", null, true);
                        echo "</span>";
                    }
                    // line 40
                    echo "                            </a>
                        </span>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['footerIcon'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 43
                echo "                    </span>
                </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['footerIconGroup'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 46
            echo "                <div class=\"tableIconsGroup\">
                    ";
            // line 47
            if (twig_test_empty($this->getContext($context, "footerIcons"))) {
                // line 48
                echo "                    <img src=\"plugins/Zeitgeist/images/data_table_footer_active_item.png\" class=\"dataTableFooterActiveItem\"/>
                    ";
            }
            // line 50
            echo "                    <span class=\"exportToFormatIcons\">
                        <a class=\"tableIcon\" var=\"export\">
                            <img width=\"16\" height=\"16\" src=\"plugins/Zeitgeist/images/export.png\" title=\"";
            // line 52
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ExportThisReport")), "html", null, true);
            echo "\"/>
                        </a>
                    </span>
\t\t\t\t    <span class=\"exportToFormatItems\" style=\"display:none;\">
\t\t\t\t\t";
            // line 56
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Export")), "html", null, true);
            echo ":
\t\t\t\t\t<a target=\"_blank\" methodToCall=\"";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "properties"), "apiMethodToRequestDataTable"), "html", null, true);
            echo "\" format=\"CSV\" filter_limit=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "properties"), "export_limit"), "html", null, true);
            echo "\">CSV</a> |
\t\t\t\t\t<a target=\"_blank\" methodToCall=\"";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "properties"), "apiMethodToRequestDataTable"), "html", null, true);
            echo "\" format=\"TSV\" filter_limit=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "properties"), "export_limit"), "html", null, true);
            echo "\">TSV (Excel)</a> |
\t\t\t\t\t<a target=\"_blank\" methodToCall=\"";
            // line 59
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "properties"), "apiMethodToRequestDataTable"), "html", null, true);
            echo "\" format=\"XML\" filter_limit=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "properties"), "export_limit"), "html", null, true);
            echo "\">XML</a> |
\t\t\t\t\t<a target=\"_blank\" methodToCall=\"";
            // line 60
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "properties"), "apiMethodToRequestDataTable"), "html", null, true);
            echo "\" format=\"JSON\" filter_limit=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "properties"), "export_limit"), "html", null, true);
            echo "\">Json</a> |
\t\t\t\t\t<a target=\"_blank\" methodToCall=\"";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "properties"), "apiMethodToRequestDataTable"), "html", null, true);
            echo "\" format=\"PHP\" filter_limit=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "properties"), "export_limit"), "html", null, true);
            echo "\">Php</a>
                    ";
            // line 62
            if ($this->getAttribute($this->getContext($context, "properties"), "show_export_as_rss_feed")) {
                // line 63
                echo "                        |
                        <a target=\"_blank\" methodToCall=\"";
                // line 64
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "properties"), "apiMethodToRequestDataTable"), "html", null, true);
                echo "\" format=\"RSS\" filter_limit=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "properties"), "export_limit"), "html", null, true);
                echo "\" date=\"last10\">
                            <img border=\"0\" src=\"plugins/Zeitgeist/images/feed.png\"/>
                        </a>
                    ";
            }
            // line 68
            echo "\t\t\t\t    </span>
                    ";
            // line 69
            if ($this->getAttribute($this->getContext($context, "properties"), "show_export_as_image_icon")) {
                // line 70
                echo "                        <span id=\"dataTableFooterExportAsImageIcon\">
                            <a class=\"tableIcon\" href=\"#\" onclick=\"\$(this).closest('.dataTable').find('div.jqplot-target').trigger('piwikExportAsImage'); return false;\">
                                <img title=\"";
                // line 72
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ExportAsImage")), "html", null, true);
                echo "\" src=\"plugins/Zeitgeist/images/image.png\"/>
                            </a>
                        </span>
                    ";
            }
            // line 76
            echo "                </div>

            </div>
            <div class=\"limitSelection ";
            // line 79
            if (((!$this->getAttribute($this->getContext($context, "properties"), "show_pagination_control")) && (!$this->getAttribute($this->getContext($context, "properties"), "show_limit_control")))) {
                echo " hidden";
            }
            echo "\"
                 title=\"";
            // line 80
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_RowsToDisplay")), "html", null, true);
            echo "\"></div>
            <div class=\"tableConfiguration\">
                <a class=\"tableConfigurationIcon\" href=\"#\"></a>
                <ul>
                    ";
            // line 84
            if ($this->getAttribute($this->getContext($context, "properties"), "show_flatten_table")) {
                // line 85
                echo "                        ";
                if (($this->getAttribute($this->getContext($context, "clientSideParameters", true), "flat", array(), "any", true, true) && ($this->getAttribute($this->getContext($context, "clientSideParameters"), "flat") == 1))) {
                    // line 86
                    echo "                        <li>
                            <div class=\"configItem dataTableIncludeAggregateRows\"></div>
                        </li>
                        ";
                }
                // line 90
                echo "                        <li>
                            <div class=\"configItem dataTableFlatten\"></div>
                        </li>
                    ";
            }
            // line 94
            echo "                    ";
            if ($this->getAttribute($this->getContext($context, "properties"), "show_exclude_low_population")) {
                // line 95
                echo "                        <li>
                            <div class=\"configItem dataTableExcludeLowPopulation\"></div>
                        </li>
                    ";
            }
            // line 99
            echo "                </ul>
            </div>
            ";
            // line 101
            if ((call_user_func_array($this->env->getFunction('isPluginLoaded')->getCallable(), array("Annotations")) && (!$this->getAttribute($this->getContext($context, "properties"), "hide_annotations_view")))) {
                // line 102
                echo "                <div class=\"annotationView\" title=\"";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Annotations_IconDesc")), "html", null, true);
                echo "\">
                    <a class=\"tableIcon\">
                        <img width=\"16\" height=\"16\" src=\"plugins/Zeitgeist/images/grey_marker.png\"/>
                    </a>
                    <span>";
                // line 106
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Annotations_Annotations")), "html", null, true);
                echo "</span>
                </div>
            ";
            }
            // line 109
            echo "        </div>
    ";
        }
        // line 111
        echo "
    <div class=\"datatableRelatedReports\">
        ";
        // line 113
        if (((!twig_test_empty($this->getAttribute($this->getContext($context, "properties"), "related_reports"))) && $this->getAttribute($this->getContext($context, "properties"), "show_related_reports"))) {
            // line 114
            echo "            ";
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "properties"), "related_reports")) == 1)) {
                // line 115
                echo "                ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_RelatedReport")), "html", null, true);
                echo ":
            ";
            } else {
                // line 117
                echo "                ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_RelatedReports")), "html", null, true);
                echo ":
            ";
            }
            // line 119
            echo "            <ul style=\"list-style:none;";
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "properties"), "related_reports")) == 1)) {
                echo "display:inline-block;";
            }
            echo "}\">
                <li><span href=\"";
            // line 120
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "properties"), "self_url"), "html", null, true);
            echo "\" style=\"display:none;\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "properties"), "title"), "html", null, true);
            echo "</span></li>

                ";
            // line 122
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "properties"), "related_reports"));
            foreach ($context['_seq'] as $context["reportUrl"] => $context["reportTitle"]) {
                // line 123
                echo "                    <li><span href=\"";
                echo twig_escape_filter($this->env, $this->getContext($context, "reportUrl"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getContext($context, "reportTitle"), "html", null, true);
                echo "</span></li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['reportUrl'], $context['reportTitle'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 125
            echo "            </ul>
        ";
        }
        // line 127
        echo "    </div>

    ";
        // line 129
        if (($this->getAttribute($this->getContext($context, "properties", true), "show_footer_message", array(), "any", true, true) && (!twig_test_empty($this->getAttribute($this->getContext($context, "properties"), "show_footer_message"))))) {
            // line 130
            echo "        <div class='datatableFooterMessage'>";
            echo $this->getAttribute($this->getContext($context, "properties"), "show_footer_message");
            echo "</div>
    ";
        }
        // line 132
        echo "
</div>

<span class=\"loadingPiwikBelow\" style=\"display:none;\"><img src=\"plugins/Zeitgeist/images/loading-blue.gif\"/> ";
        // line 135
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_LoadingData")), "html", null, true);
        echo "</span>

<div class=\"dataTableSpacer\"></div>
";
    }

    public function getTemplateName()
    {
        return "@CoreHome/_dataTableFooter.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  367 => 135,  362 => 132,  356 => 130,  354 => 129,  350 => 127,  346 => 125,  335 => 123,  331 => 122,  324 => 120,  317 => 119,  311 => 117,  305 => 115,  302 => 114,  300 => 113,  296 => 111,  292 => 109,  286 => 106,  278 => 102,  276 => 101,  272 => 99,  266 => 95,  263 => 94,  257 => 90,  251 => 86,  248 => 85,  246 => 84,  239 => 80,  233 => 79,  228 => 76,  221 => 72,  217 => 70,  215 => 69,  212 => 68,  203 => 64,  200 => 63,  198 => 62,  192 => 61,  186 => 60,  180 => 59,  174 => 58,  168 => 57,  164 => 56,  157 => 52,  153 => 50,  149 => 48,  147 => 47,  144 => 46,  128 => 40,  116 => 38,  107 => 37,  103 => 35,  101 => 34,  98 => 33,  90 => 31,  87 => 30,  77 => 26,  73 => 25,  69 => 23,  63 => 20,  59 => 18,  54 => 16,  48 => 13,  40 => 12,  37 => 11,  35 => 10,  32 => 9,  24 => 4,  22 => 2,  139 => 37,  136 => 43,  133 => 35,  130 => 34,  127 => 33,  125 => 32,  122 => 39,  119 => 30,  115 => 29,  111 => 27,  105 => 25,  99 => 23,  97 => 22,  94 => 32,  91 => 20,  85 => 18,  83 => 29,  79 => 27,  72 => 14,  66 => 13,  57 => 17,  49 => 10,  45 => 9,  41 => 8,  30 => 7,  28 => 6,  26 => 5,  21 => 2,  19 => 1,);
    }
}
