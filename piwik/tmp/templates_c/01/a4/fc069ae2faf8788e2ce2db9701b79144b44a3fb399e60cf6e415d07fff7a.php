<?php

/* @Goals/_titleAndEvolutionGraph.twig */
class __TwigTemplate_01a4fc069ae2faf8788e2ce2db9701b79144b44a3fb399e60cf6e415d07fff7a extends Twig_Template
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
        echo "<span data-graph-id=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "nameGraphEvolution"), "html", null, true);
        echo "\"></span>

";
        // line 3
        if ($this->getContext($context, "displayFullReport")) {
            // line 4
            echo "    <h2 piwik-enriched-headline>";
            if (array_key_exists("goalName", $context)) {
                echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_GoalX", $this->getContext($context, "goalName")));
            } else {
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_GoalsOverview")), "html", null, true);
            }
            echo "</h2>
";
        }
        // line 6
        echo $this->getContext($context, "graphEvolution");
        echo "

<div id='leftcolumn' ";
        // line 8
        if ((!$this->getContext($context, "isWidget"))) {
            echo "style='width:33%;'";
        }
        echo ">
    <div class=\"sparkline\">";
        // line 9
        echo call_user_func_array($this->env->getFunction('sparkline')->getCallable(), array($this->getContext($context, "urlSparklineConversions")));
        echo "
        ";
        // line 10
        if (array_key_exists("ecommerce", $context)) {
            // line 11
            echo "            <strong>";
            echo twig_escape_filter($this->env, $this->getContext($context, "nb_conversions"), "html", null, true);
            echo "</strong>
            ";
            // line 12
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_EcommerceOrders")), "html", null, true);
            echo "
            <img src='plugins/Zeitgeist/images/ecommerceOrder.gif'>
        ";
        } else {
            // line 15
            echo "            ";
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_Conversions", (("<strong>" . $this->getContext($context, "nb_conversions")) . "</strong>")));
            echo "
        ";
        }
        // line 17
        echo "        ";
        if ((array_key_exists("goalAllowMultipleConversionsPerVisit", $context) && $this->getContext($context, "goalAllowMultipleConversionsPerVisit"))) {
            // line 18
            echo "            (";
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NVisits", (("<strong>" . $this->getContext($context, "nb_visits_converted")) . "</strong>")));
            echo ")
        ";
        }
        // line 20
        echo "    </div>
    ";
        // line 21
        if ((($this->getContext($context, "revenue") != 0) || array_key_exists("ecommerce", $context))) {
            // line 22
            echo "        <div class=\"sparkline\">
            ";
            // line 23
            echo call_user_func_array($this->env->getFunction('sparkline')->getCallable(), array($this->getContext($context, "urlSparklineRevenue")));
            echo "
            ";
            // line 24
            $context["revenue"] = call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getContext($context, "revenue"), $this->getContext($context, "idSite")));
            // line 25
            echo "            ";
            if (array_key_exists("ecommerce", $context)) {
                // line 26
                echo "                <strong>";
                echo $this->getContext($context, "revenue");
                echo "</strong> ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_TotalRevenue")), "html", null, true);
                echo "
            ";
            } else {
                // line 28
                echo "                ";
                echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_OverallRevenue", (("<strong>" . $this->getContext($context, "revenue")) . "</strong>")));
                echo "
            ";
            }
            // line 30
            echo "        </div>
    ";
        }
        // line 32
        echo "    ";
        if (array_key_exists("ecommerce", $context)) {
            // line 33
            echo "        <div class=\"sparkline\">";
            echo call_user_func_array($this->env->getFunction('sparkline')->getCallable(), array($this->getContext($context, "urlSparklineAverageOrderValue")));
            echo "
            <strong>";
            // line 34
            echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getContext($context, "avg_order_revenue"), $this->getContext($context, "idSite")));
            echo "</strong>
            ";
            // line 35
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_AverageOrderValue")), "html", null, true);
            echo "
        </div>
    ";
        }
        // line 38
        echo "
</div>
<div id='leftcolumn' ";
        // line 40
        if ((!$this->getContext($context, "isWidget"))) {
            echo "style='width:33%;'";
        }
        echo ">
    <div class=\"sparkline\">";
        // line 41
        echo call_user_func_array($this->env->getFunction('sparkline')->getCallable(), array($this->getContext($context, "urlSparklineConversionRate")));
        echo "
        ";
        // line 42
        if (array_key_exists("ecommerce", $context)) {
            // line 43
            echo "            ";
            ob_start();
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_EcommerceOrders")), "html", null, true);
            $context["ecommerceOrdersText"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 44
            echo "            ";
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_ConversionRate", ((("<strong>" . $this->getContext($context, "conversion_rate")) . "</strong> ") . $this->getContext($context, "ecommerceOrdersText"))));
            echo "
        ";
        } else {
            // line 46
            echo "            ";
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_OverallConversionRate", (("<strong>" . $this->getContext($context, "conversion_rate")) . "</strong>")));
            echo "
        ";
        }
        // line 48
        echo "    </div>
    ";
        // line 49
        if (array_key_exists("ecommerce", $context)) {
            // line 50
            echo "        <div class=\"sparkline\">";
            echo call_user_func_array($this->env->getFunction('sparkline')->getCallable(), array($this->getContext($context, "urlSparklinePurchasedProducts")));
            echo "
            <strong>";
            // line 51
            echo twig_escape_filter($this->env, $this->getContext($context, "items"), "html", null, true);
            echo "</strong> ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_PurchasedProducts")), "html", null, true);
            echo "</div>
    ";
        }
        // line 53
        echo "</div>
";
        // line 54
        if (array_key_exists("ecommerce", $context)) {
            // line 55
            echo "    <div id='rightcolumn' ";
            if ((!$this->getContext($context, "isWidget"))) {
                echo "style='width:30%;'";
            }
            echo ">
        <div>
            <img src='plugins/Zeitgeist/images/ecommerceAbandonedCart.gif'> <em>";
            // line 57
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_AbandonedCarts")), "html", null, true);
            echo "</em>
        </div>

        <div class=\"sparkline\">
            ";
            // line 61
            echo call_user_func_array($this->env->getFunction('sparkline')->getCallable(), array($this->getContext($context, "cart_urlSparklineConversions")));
            echo "
            ";
            // line 62
            ob_start();
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_AbandonedCart")), "html", null, true);
            $context["ecommerceAbandonedCartsText"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 63
            echo "            <strong>";
            echo twig_escape_filter($this->env, $this->getContext($context, "cart_nb_conversions"), "html", null, true);
            echo "</strong> ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_VisitsWith", $this->getContext($context, "ecommerceAbandonedCartsText"))), "html", null, true);
            echo "
        </div>

        <div class=\"sparkline\">
            ";
            // line 67
            echo call_user_func_array($this->env->getFunction('sparkline')->getCallable(), array($this->getContext($context, "cart_urlSparklineRevenue")));
            echo "
            ";
            // line 68
            ob_start();
            echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getContext($context, "cart_revenue"), $this->getContext($context, "idSite")));
            $context["revenue"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 69
            echo "            ";
            ob_start();
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnRevenue")), "html", null, true);
            $context["revenueText"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 70
            echo "            <strong>";
            echo twig_escape_filter($this->env, $this->getContext($context, "revenue"), "html", null, true);
            echo "</strong> ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_LeftInCart", $this->getContext($context, "revenueText"))), "html", null, true);
            echo "
        </div>

        <div class=\"sparkline\">
            ";
            // line 74
            echo call_user_func_array($this->env->getFunction('sparkline')->getCallable(), array($this->getContext($context, "cart_urlSparklineConversionRate")));
            echo "
            <strong>";
            // line 75
            echo twig_escape_filter($this->env, $this->getContext($context, "cart_conversion_rate"), "html", null, true);
            echo "</strong>
            ";
            // line 76
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_VisitsWith", $this->getContext($context, "ecommerceAbandonedCartsText"))), "html", null, true);
            echo "
        </div>
    </div>
";
        }
        // line 80
        $this->env->loadTemplate("_sparklineFooter.twig")->display($context);
        // line 81
        echo "
";
    }

    public function getTemplateName()
    {
        return "@Goals/_titleAndEvolutionGraph.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  261 => 81,  259 => 80,  252 => 76,  248 => 75,  244 => 74,  234 => 70,  229 => 69,  225 => 68,  221 => 67,  211 => 63,  207 => 62,  203 => 61,  196 => 57,  188 => 55,  186 => 54,  183 => 53,  171 => 50,  169 => 49,  166 => 48,  160 => 46,  154 => 44,  149 => 43,  147 => 42,  143 => 41,  137 => 40,  133 => 38,  123 => 34,  115 => 32,  111 => 30,  105 => 28,  97 => 26,  94 => 25,  92 => 24,  88 => 23,  85 => 22,  83 => 21,  80 => 20,  65 => 15,  59 => 12,  54 => 11,  48 => 9,  42 => 8,  37 => 6,  27 => 4,  25 => 3,  176 => 51,  173 => 63,  167 => 61,  161 => 59,  159 => 58,  156 => 57,  153 => 56,  151 => 55,  135 => 41,  131 => 39,  127 => 35,  122 => 35,  118 => 33,  113 => 32,  109 => 31,  104 => 29,  100 => 28,  95 => 26,  91 => 25,  87 => 24,  84 => 23,  78 => 20,  74 => 18,  71 => 17,  63 => 16,  60 => 15,  52 => 10,  49 => 12,  41 => 10,  38 => 9,  36 => 8,  30 => 6,  28 => 5,  24 => 3,  22 => 2,  19 => 1,);
    }
}
