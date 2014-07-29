<?php

/* @CoreHome/getRowEvolutionPopover.twig */
class __TwigTemplate_b72bdc6dd2667fd2e885ad12cd45d2dcf7b52d067baae5d61f8be1cfb277c23c extends Twig_Template
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
        $context["seriesColorCount"] = twig_constant("Piwik\\Plugins\\CoreVisualizations\\Visualizations\\JqplotGraph\\Evolution::SERIES_COLOR_COUNT");
        // line 2
        echo "<div class=\"rowevolution\">
    <div class=\"popover-title\">";
        // line 3
        echo $this->getContext($context, "popoverTitle");
        echo "</div>
    <div class=\"graph\">
        ";
        // line 5
        echo $this->getContext($context, "graph");
        echo "
    </div>
    <div class=\"metrics-container\">
        <h2>";
        // line 8
        echo $this->getContext($context, "availableMetricsText");
        echo "</h2>

        <div class=\"rowevolution-documentation\">
            ";
        // line 11
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("RowEvolution_Documentation")), "html", null, true);
        echo "
        </div>
        <table class=\"metrics\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" data-thing=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->getContext($context, "seriesColorCount"), "html", null, true);
        echo "\">
            ";
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "metrics"));
        foreach ($context['_seq'] as $context["i"] => $context["metric"]) {
            // line 15
            echo "                <tr data-i=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "i"), "html", null, true);
            echo "\">
                    <td class=\"sparkline\">
                        ";
            // line 17
            echo $this->getAttribute($this->getContext($context, "metric"), "sparkline");
            echo "
                    </td>
                    <td class=\"text\">
                        <span class=\"evolution-graph-colors\" data-name=\"series";
            // line 20
            echo twig_escape_filter($this->env, (($this->getContext($context, "i") % $this->getContext($context, "seriesColorCount")) + 1), "html", null, true);
            echo "\">";
            // line 21
            echo $this->getAttribute($this->getContext($context, "metric"), "label");
            // line 22
            echo "</span>
                        ";
            // line 23
            if ($this->getAttribute($this->getContext($context, "metric"), "details")) {
                echo ":
                            <span class=\"details\" title=\"";
                // line 24
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "metric"), "minmax"), "html", null, true);
                echo "\">";
                echo $this->getAttribute($this->getContext($context, "metric"), "details");
                echo "</span>
                        ";
            }
            // line 26
            echo "                    </td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['i'], $context['metric'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "        </table>
    </div>
    <div class=\"compare-container\">
        <h2>";
        // line 32
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("RowEvolution_CompareRows")), "html", null, true);
        echo "</h2>

        <div class=\"rowevolution-documentation\">
            ";
        // line 35
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("RowEvolution_CompareDocumentation"));
        echo "
        </div>
        <a href=\"#\" class=\"rowevolution-startmulti\">&raquo; ";
        // line 37
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("RowEvolution_PickARow")), "html", null, true);
        echo "</a>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@CoreHome/getRowEvolutionPopover.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 37,  104 => 35,  98 => 32,  93 => 29,  85 => 26,  78 => 24,  74 => 23,  71 => 22,  69 => 21,  66 => 20,  60 => 17,  54 => 15,  50 => 14,  46 => 13,  41 => 11,  35 => 8,  29 => 5,  24 => 3,  21 => 2,  19 => 1,);
    }
}
