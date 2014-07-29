<?php

/* @CoreHome/_periodSelect.twig */
class __TwigTemplate_e1b8327c6580a4e67f55d23f8f20fd5f83d79b66c908293173b64efff3b84fdc extends Twig_Template
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
        echo "<div id=\"periodString\" class=\"js-autoLeftPanel\">
    <div id=\"date\">";
        // line 2
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_DateRange")), "html", null, true);
        echo " <strong>";
        echo twig_escape_filter($this->env, $this->getContext($context, "prettyDate"), "html", null, true);
        echo "</strong></div>
    <div class=\"calendar-icon\"></div>
    <div id=\"periodMore\">
        <div class=\"period-date\">
            <h6>";
        // line 6
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Date")), "html", null, true);
        echo "</h6>

            <div id=\"datepicker\"></div>
        </div>
        <div class=\"period-range\" style=\"display:none;\">
            <div id=\"calendarRangeFrom\">
                <h6>";
        // line 12
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_DateRangeFrom")), "html", null, true);
        echo "<input tabindex=\"1\" type=\"text\" id=\"inputCalendarFrom\" name=\"inputCalendarFrom\"/></h6>

                <div id=\"calendarFrom\"></div>
            </div>
            <div id=\"calendarRangeTo\">
                <h6>";
        // line 17
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_DateRangeTo")), "html", null, true);
        echo "<input tabindex=\"2\" type=\"text\" id=\"inputCalendarTo\" name=\"inputCalendarTo\"/></h6>

                <div id=\"calendarTo\"></div>
            </div>
        </div>
        <div class=\"period-type\">
            <h6>";
        // line 23
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Period")), "html", null, true);
        echo "</h6>
\t\t\t<span id=\"otherPeriods\">
            ";
        // line 25
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "periodsNames"));
        foreach ($context['_seq'] as $context["label"] => $context["thisPeriod"]) {
            // line 26
            echo "                <input type=\"radio\" name=\"period\" id=\"period_id_";
            echo twig_escape_filter($this->env, $this->getContext($context, "label"), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('linkTo')->getCallable(), array(array("period" => $this->getContext($context, "label")))), "html", null, true);
            echo "\"";
            if (($this->getContext($context, "label") == $this->getContext($context, "period"))) {
                echo " checked=\"checked\"";
            }
            echo " />
                <label for=\"period_id_";
            // line 27
            echo twig_escape_filter($this->env, $this->getContext($context, "label"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "thisPeriod"), "singular"), "html", null, true);
            echo "</label>
                <br/>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['label'], $context['thisPeriod'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "\t\t\t</span>
            <input tabindex=\"3\" type=\"submit\" value=\"";
        // line 31
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ApplyDateRange")), "html", null, true);
        echo "\" id=\"calendarRangeApply\"/>
            ";
        // line 32
        $context["ajax"] = $this->env->loadTemplate("ajaxMacros.twig");
        // line 33
        echo "            ";
        echo $context["ajax"]->getloadingDiv("ajaxLoadingCalendar");
        echo "
        </div>
    </div>
    <div class=\"period-click-tooltip\" style=\"display:none;\">";
        // line 36
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ClickToChangePeriod")), "html", null, true);
        echo "</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@CoreHome/_periodSelect.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 33,  95 => 32,  91 => 31,  57 => 23,  101 => 17,  58 => 16,  63 => 6,  165 => 64,  153 => 62,  151 => 61,  136 => 52,  130 => 50,  128 => 49,  106 => 43,  102 => 42,  98 => 40,  71 => 32,  44 => 9,  35 => 6,  26 => 4,  90 => 37,  82 => 22,  69 => 8,  49 => 27,  39 => 8,  33 => 6,  59 => 9,  52 => 5,  48 => 17,  21 => 2,  28 => 4,  24 => 3,  132 => 36,  113 => 44,  108 => 28,  104 => 36,  96 => 25,  92 => 16,  88 => 30,  79 => 33,  77 => 27,  70 => 15,  62 => 25,  46 => 9,  31 => 6,  27 => 1,  23 => 3,  19 => 1,  134 => 43,  131 => 42,  127 => 34,  124 => 47,  121 => 32,  114 => 20,  112 => 19,  107 => 16,  105 => 15,  100 => 26,  87 => 9,  84 => 22,  81 => 7,  74 => 20,  72 => 19,  68 => 44,  66 => 26,  60 => 12,  55 => 8,  53 => 33,  50 => 9,  41 => 8,  38 => 2,  36 => 7,  32 => 5,  30 => 19,  22 => 2,  56 => 13,  54 => 15,  51 => 11,  47 => 10,  45 => 9,  42 => 9,  40 => 12,  37 => 10,  34 => 3,  29 => 4,);
    }
}
