<?php

/* @CoreHome/_dataTableCell.twig */
class __TwigTemplate_a142030a1659e9cada401bab45daa3fd1b6e5f8389b2d2c7f68c509c1957c9ce extends Twig_Template
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
        ob_start();
        // line 2
        $context["tooltipIndex"] = ($this->getContext($context, "column") . "_tooltip");
        // line 3
        if ($this->getAttribute($this->getContext($context, "row"), "getMetadata", array(0 => $this->getContext($context, "tooltipIndex")), "method")) {
            echo "<span class=\"cell-tooltip\" data-tooltip=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "row"), "getMetadata", array(0 => $this->getContext($context, "tooltipIndex")), "method"), "html", null, true);
            echo "\">";
        }
        // line 4
        if ((((!$this->getAttribute($this->getContext($context, "row"), "getIdSubDataTable", array(), "method")) && ($this->getContext($context, "column") == "label")) && $this->getAttribute($this->getContext($context, "row"), "getMetadata", array(0 => "url"), "method"))) {
            // line 5
            echo "    <a target=\"_blank\" href='";
            if (!twig_in_filter(twig_slice($this->env, $this->getAttribute($this->getContext($context, "row"), "getMetadata", array(0 => "url"), "method"), 0, 4), array(0 => "http", 1 => "ftp:"))) {
                echo "http://";
            }
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "row"), "getMetadata", array(0 => "url"), "method"), "html", null, true);
            echo "'>
    ";
            // line 6
            if ((!$this->getAttribute($this->getContext($context, "row"), "getMetadata", array(0 => "logo"), "method"))) {
                // line 7
                echo "        <img class=\"link\" width=\"10\" height=\"9\" src=\"plugins/Zeitgeist/images/link.gif\"/>
    ";
            }
        }
        // line 10
        if (($this->getContext($context, "column") == "label")) {
            // line 11
            echo "    ";
            $context["piwik"] = $this->env->loadTemplate("macros.twig");
            // line 12
            echo "    ";
            echo $context["piwik"]->getlogoHtml($this->getAttribute($this->getContext($context, "row"), "getMetadata", array(), "method"), $this->getAttribute($this->getContext($context, "row"), "getColumn", array(0 => "label"), "method"));
            echo "
    ";
            // line 13
            if ($this->getAttribute($this->getContext($context, "row"), "getMetadata", array(0 => "html_label_prefix"), "method")) {
                echo "<span class='label-prefix'>";
                echo $this->getAttribute($this->getContext($context, "row"), "getMetadata", array(0 => "html_label_prefix"), "method");
                echo "&nbsp;</span>";
            }
            // line 14
            echo "<span class='label";
            if ($this->getAttribute($this->getContext($context, "row"), "getMetadata", array(0 => "is_aggregate"), "method")) {
                echo " highlighted";
            }
            echo "'
        ";
            // line 15
            if ((array_key_exists("properties", $context) && (!twig_test_empty($this->getAttribute($this->getContext($context, "properties"), "tooltip_metadata_name"))))) {
                echo "title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "row"), "getMetadata", array(0 => $this->getAttribute($this->getContext($context, "properties"), "tooltip_metadata_name")), "method"), "html", null, true);
                echo "\"";
            }
            echo ">";
            // line 16
            if ($this->getAttribute($this->getContext($context, "row"), "getMetadata", array(0 => "html_label_suffix"), "method")) {
                echo "<span class='label-suffix'>";
                echo $this->getAttribute($this->getContext($context, "row"), "getMetadata", array(0 => "html_label_suffix"), "method");
                echo "</span>";
            }
        }
        // line 17
        echo "<span class=\"value\">";
        if ($this->getAttribute($this->getContext($context, "row"), "getColumn", array(0 => $this->getContext($context, "column")), "method")) {
            echo $this->getAttribute($this->getContext($context, "row"), "getColumn", array(0 => $this->getContext($context, "column")), "method");
        } else {
            echo "-";
        }
        echo "</span>
";
        // line 18
        if (($this->getContext($context, "column") == "label")) {
            echo "</span>";
        }
        // line 19
        if ((((!$this->getAttribute($this->getContext($context, "row"), "getIdSubDataTable", array(), "method")) && ($this->getContext($context, "column") == "label")) && $this->getAttribute($this->getContext($context, "row"), "getMetadata", array(0 => "url"), "method"))) {
            // line 20
            echo "    </a>
";
        }
        // line 22
        if ($this->getAttribute($this->getContext($context, "row"), "getMetadata", array(0 => $this->getContext($context, "tooltipIndex")), "method")) {
            echo "</span>";
        }
        // line 23
        echo "
";
        // line 24
        $context["totals"] = $this->getAttribute($this->getContext($context, "dataTable"), "getMetadata", array(0 => "totals"), "method");
        // line 25
        if (twig_in_filter($this->getContext($context, "column"), twig_get_array_keys_filter($this->getContext($context, "totals")))) {
            // line 26
            $context["labelColumn"] = twig_first($this->env, $this->getContext($context, "columns_to_display"));
            // line 27
            echo "    ";
            $context["reportTotal"] = $this->getAttribute($this->getContext($context, "totals"), $this->getContext($context, "column"), array(), "array");
            // line 28
            echo "    ";
            if (((array_key_exists("siteSummary", $context) && (!twig_test_empty($this->getContext($context, "siteSummary")))) && $this->getAttribute($this->getContext($context, "siteSummary"), "getFirstRow"))) {
                // line 29
                echo "        ";
                $context["siteTotal"] = $this->getAttribute($this->getAttribute($this->getContext($context, "siteSummary"), "getFirstRow"), "getColumn", array(0 => $this->getContext($context, "column")), "method");
                // line 30
                echo "    ";
            } else {
                // line 31
                echo "        ";
                $context["siteTotal"] = 0;
                // line 32
                echo "    ";
            }
            // line 33
            echo "    ";
            $context["rowPercentage"] = call_user_func_array($this->env->getFilter('percentage')->getCallable(), array($this->getAttribute($this->getContext($context, "row"), "getColumn", array(0 => $this->getContext($context, "column")), "method"), $this->getContext($context, "reportTotal"), 1));
            // line 34
            echo "    ";
            $context["metricTitle"] = (($this->getAttribute($this->getContext($context, "translations", true), $this->getContext($context, "column"), array(), "array", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "translations", true), $this->getContext($context, "column"), array(), "array"), $this->getContext($context, "column"))) : ($this->getContext($context, "column")));
            // line 35
            echo "    ";
            $context["reportLabel"] = call_user_func_array($this->env->getFilter('truncate')->getCallable(), array($this->getAttribute($this->getContext($context, "row"), "getColumn", array(0 => $this->getContext($context, "labelColumn")), "method"), 40));
            // line 36
            echo "
    ";
            // line 37
            $context["reportRatioTooltip"] = call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ReportRatioTooltip", $this->getContext($context, "reportLabel"), twig_escape_filter($this->env, $this->getContext($context, "rowPercentage"), "html_attr"), twig_escape_filter($this->env, $this->getContext($context, "reportTotal"), "html_attr"), twig_escape_filter($this->env, $this->getContext($context, "metricTitle"), "html_attr"), twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "translations", true), $this->getContext($context, "labelColumn"), array(), "array", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "translations", true), $this->getContext($context, "labelColumn"), array(), "array"), $this->getContext($context, "labelColumn"))) : ($this->getContext($context, "labelColumn"))), "html_attr")));
            // line 38
            echo "
    ";
            // line 39
            if (($this->getContext($context, "siteTotal") && ($this->getContext($context, "siteTotal") > $this->getContext($context, "reportTotal")))) {
                // line 40
                echo "        ";
                $context["totalPercentage"] = call_user_func_array($this->env->getFilter('percentage')->getCallable(), array($this->getAttribute($this->getContext($context, "row"), "getColumn", array(0 => $this->getContext($context, "column")), "method"), $this->getContext($context, "siteTotal"), 1));
                // line 41
                echo "        ";
                $context["totalRatioTooltip"] = call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_TotalRatioTooltip", $this->getContext($context, "totalPercentage"), $this->getContext($context, "siteTotal"), $this->getContext($context, "metricTitle")));
                // line 42
                echo "    ";
            } else {
                // line 43
                echo "        ";
                $context["totalRatioTooltip"] = "";
                // line 44
                echo "    ";
            }
            // line 45
            echo "
    <span class=\"ratio\" title=\"";
            // line 46
            echo $this->getContext($context, "reportRatioTooltip");
            echo " ";
            echo twig_escape_filter($this->env, $this->getContext($context, "totalRatioTooltip"), "html_attr");
            echo "\">&nbsp;";
            echo twig_escape_filter($this->env, $this->getContext($context, "rowPercentage"), "html", null, true);
            echo "</span>";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "@CoreHome/_dataTableCell.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  170 => 46,  164 => 44,  161 => 43,  158 => 42,  155 => 41,  152 => 40,  150 => 39,  147 => 38,  145 => 37,  142 => 36,  139 => 35,  133 => 33,  130 => 32,  127 => 31,  124 => 30,  118 => 28,  115 => 27,  113 => 26,  111 => 25,  109 => 24,  106 => 23,  102 => 22,  98 => 20,  96 => 19,  92 => 18,  83 => 17,  69 => 15,  62 => 14,  56 => 13,  51 => 12,  48 => 11,  46 => 10,  41 => 7,  39 => 6,  29 => 4,  90 => 16,  66 => 10,  61 => 8,  57 => 6,  40 => 4,  167 => 45,  165 => 46,  149 => 43,  146 => 42,  143 => 41,  140 => 39,  136 => 34,  121 => 29,  119 => 34,  116 => 33,  99 => 32,  87 => 31,  80 => 30,  78 => 29,  76 => 16,  74 => 21,  72 => 13,  55 => 5,  47 => 16,  44 => 15,  42 => 14,  38 => 11,  36 => 10,  33 => 9,  31 => 5,  25 => 6,  23 => 3,  21 => 2,  19 => 1,);
    }
}
