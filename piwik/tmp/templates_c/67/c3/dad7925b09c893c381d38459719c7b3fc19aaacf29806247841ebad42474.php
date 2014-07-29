<?php

/* @Live/_actionsList.twig */
class __TwigTemplate_67c3dad7925b09c893c381d38459719c7b3fc19aaacf29806247841ebad42474 extends Twig_Template
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
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "actionDetails"));
        foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
            // line 2
            echo "    ";
            ob_start();
            // line 3
            echo "        ";
            if ($this->getAttribute($this->getContext($context, "action", true), "customVariables", array(), "any", true, true)) {
                // line 4
                echo "            ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CustomVariables_CustomVariables")), "html", null, true);
                echo "
            ";
                // line 5
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "action"), "customVariables"));
                foreach ($context['_seq'] as $context["id"] => $context["customVariable"]) {
                    // line 6
                    echo "                ";
                    $context["name"] = ("customVariablePageName" . $this->getContext($context, "id"));
                    // line 7
                    echo "                ";
                    $context["value"] = ("customVariablePageValue" . $this->getContext($context, "id"));
                    // line 8
                    echo "                - ";
                    echo $this->getAttribute($this->getContext($context, "customVariable"), $this->getContext($context, "name"), array(), "array");
                    echo " ";
                    if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "customVariable"), $this->getContext($context, "value"), array(), "array")) > 0)) {
                        echo " = ";
                        echo $this->getAttribute($this->getContext($context, "customVariable"), $this->getContext($context, "value"), array(), "array");
                    }
                    // line 9
                    echo "            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['id'], $context['customVariable'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 10
                echo "        ";
            }
            // line 11
            echo "    ";
            $context["customVariablesTooltip"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 12
            echo "    ";
            if ((((!$this->getAttribute($this->getContext($context, "clientSideParameters"), "filterEcommerce")) || ($this->getAttribute($this->getContext($context, "action"), "type") == "ecommerceOrder")) || ($this->getAttribute($this->getContext($context, "action"), "type") == "ecommerceAbandonedCart"))) {
                // line 13
                echo "        <li class=\"";
                if ($this->getAttribute($this->getContext($context, "action", true), "goalName", array(), "any", true, true)) {
                    echo "goal";
                } else {
                    echo "action";
                }
                echo "\"
            title=\"";
                // line 14
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "serverTimePretty"), "html", null, true);
                if (($this->getAttribute($this->getContext($context, "action", true), "url", array(), "any", true, true) && twig_length_filter($this->env, trim($this->getAttribute($this->getContext($context, "action"), "url"))))) {
                    // line 15
                    echo "
";
                    // line 16
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "url"), "html", null, true);
                }
                if (twig_length_filter($this->env, trim($this->getContext($context, "customVariablesTooltip")))) {
                    // line 17
                    echo "
";
                    // line 18
                    echo twig_escape_filter($this->env, trim($this->getContext($context, "customVariablesTooltip")), "html", null, true);
                }
                // line 19
                if ($this->getAttribute($this->getContext($context, "action", true), "generationTime", array(), "any", true, true)) {
                    // line 20
                    echo "
";
                    // line 21
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnGenerationTime")), "html", null, true);
                    echo ": ";
                    echo $this->getAttribute($this->getContext($context, "action"), "generationTime");
                }
                // line 22
                if ($this->getAttribute($this->getContext($context, "action", true), "timeSpentPretty", array(), "any", true, true)) {
                    // line 23
                    echo "
";
                    // line 24
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_TimeOnPage")), "html", null, true);
                    echo ": ";
                    echo $this->getAttribute($this->getContext($context, "action"), "timeSpentPretty");
                }
                echo "\">
            <div>
            ";
                // line 26
                if ((($this->getAttribute($this->getContext($context, "action"), "type") == "ecommerceOrder") || ($this->getAttribute($this->getContext($context, "action"), "type") == "ecommerceAbandonedCart"))) {
                    // line 27
                    echo "            ";
                    // line 28
                    echo "                <img src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "icon"), "html", null, true);
                    echo "\"/>
                ";
                    // line 29
                    if (($this->getAttribute($this->getContext($context, "action"), "type") == "ecommerceOrder")) {
                        // line 30
                        echo "                    <strong>";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_EcommerceOrder")), "html", null, true);
                        echo "</strong>
                    <span style='color:#666;'>(";
                        // line 31
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "orderId"), "html", null, true);
                        echo ")</span>
                ";
                    } else {
                        // line 33
                        echo "                    <strong>";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_AbandonedCart")), "html", null, true);
                        echo "</strong>

                    ";
                        // line 36
                        echo "                ";
                    }
                    // line 37
                    echo "                <p>
                <span ";
                    // line 38
                    if ((!$this->getContext($context, "isWidget"))) {
                        echo "style='margin-left:20px;'";
                    }
                    echo ">
                    ";
                    // line 39
                    if (($this->getAttribute($this->getContext($context, "action"), "type") == "ecommerceOrder")) {
                        // line 40
                        echo "                    <abbr title=\"
                        ";
                        // line 41
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnRevenue")), "html", null, true);
                        echo ": ";
                        echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($this->getContext($context, "action"), "revenue"), $this->getAttribute($this->getContext($context, "clientSideParameters"), "idSite")));
                        echo "
                        ";
                        // line 42
                        if ((!twig_test_empty($this->getAttribute($this->getContext($context, "action"), "revenueSubTotal")))) {
                            echo " - ";
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Subtotal")), "html", null, true);
                            echo ": ";
                            echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($this->getContext($context, "action"), "revenueSubTotal"), $this->getAttribute($this->getContext($context, "clientSideParameters"), "idSite")));
                        }
                        // line 43
                        echo "                        ";
                        if ((!twig_test_empty($this->getAttribute($this->getContext($context, "action"), "revenueTax")))) {
                            echo " - ";
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Tax")), "html", null, true);
                            echo ": ";
                            echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($this->getContext($context, "action"), "revenueTax"), $this->getAttribute($this->getContext($context, "clientSideParameters"), "idSite")));
                        }
                        // line 44
                        echo "                        ";
                        if ((!twig_test_empty($this->getAttribute($this->getContext($context, "action"), "revenueShipping")))) {
                            echo " - ";
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Shipping")), "html", null, true);
                            echo ": ";
                            echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($this->getContext($context, "action"), "revenueShipping"), $this->getAttribute($this->getContext($context, "clientSideParameters"), "idSite")));
                        }
                        // line 45
                        echo "                        ";
                        if ((!twig_test_empty($this->getAttribute($this->getContext($context, "action"), "revenueDiscount")))) {
                            echo " - ";
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Discount")), "html", null, true);
                            echo ": ";
                            echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($this->getContext($context, "action"), "revenueDiscount"), $this->getAttribute($this->getContext($context, "clientSideParameters"), "idSite")));
                        }
                        // line 46
                        echo "                        \">";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnRevenue")), "html", null, true);
                        echo ":
                    ";
                    } else {
                        // line 48
                        echo "                        ";
                        ob_start();
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnRevenue")), "html", null, true);
                        $context["revenueLeft"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                        // line 49
                        echo "                        ";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_LeftInCart", $this->getContext($context, "revenueLeft"))), "html", null, true);
                        echo ":
                    ";
                    }
                    // line 51
                    echo "                        <strong>";
                    echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($this->getContext($context, "action"), "revenue"), $this->getAttribute($this->getContext($context, "clientSideParameters"), "idSite")));
                    echo "</strong>
                    ";
                    // line 52
                    if (($this->getAttribute($this->getContext($context, "action"), "type") == "ecommerceOrder")) {
                        // line 53
                        echo "                    </abbr>
                    ";
                    }
                    // line 54
                    echo ", ";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Quantity")), "html", null, true);
                    echo ": ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "items"), "html", null, true);
                    echo "

                    ";
                    // line 57
                    echo "                    ";
                    if ((!twig_test_empty($this->getAttribute($this->getContext($context, "action"), "itemDetails")))) {
                        // line 58
                        echo "                        <ul style='list-style:square;margin-left:";
                        if ($this->getContext($context, "isWidget")) {
                            echo "15";
                        } else {
                            echo "50";
                        }
                        echo "px;'>
                            ";
                        // line 59
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "action"), "itemDetails"));
                        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                            // line 60
                            echo "                                <li>
                                    ";
                            // line 61
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "itemSKU"), "html", null, true);
                            if ((!twig_test_empty($this->getAttribute($this->getContext($context, "product"), "itemName")))) {
                                echo ": ";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "itemName"), "html", null, true);
                            }
                            // line 62
                            echo "                                    ";
                            if ((!twig_test_empty($this->getAttribute($this->getContext($context, "product"), "itemCategory")))) {
                                echo " (";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "itemCategory"), "html", null, true);
                                echo ")";
                            }
                            // line 63
                            echo "                                    ,
                                    ";
                            // line 64
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Quantity")), "html", null, true);
                            echo ": ";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "quantity"), "html", null, true);
                            echo ",
                                    ";
                            // line 65
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Price")), "html", null, true);
                            echo ": ";
                            echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($this->getContext($context, "product"), "price"), $this->getAttribute($this->getContext($context, "clientSideParameters"), "idSite")));
                            echo "
                                </li>
                            ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 68
                        echo "                        </ul>
                    ";
                    }
                    // line 70
                    echo "                </span>
                </p>
            ";
                } elseif ((!$this->getAttribute($this->getContext($context, "action", true), "goalName", array(), "any", true, true))) {
                    // line 73
                    echo "                ";
                    // line 74
                    echo "                ";
                    if ((!twig_test_empty((($this->getAttribute($this->getContext($context, "action", true), "pageTitle", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "action", true), "pageTitle"), false)) : (false))))) {
                        // line 75
                        echo "                    <span class=\"truncated-text-line\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "pageTitle"), "html", null, true);
                        echo "</span>
                ";
                    }
                    // line 77
                    echo "                ";
                    if ($this->getAttribute($this->getContext($context, "action", true), "siteSearchKeyword", array(), "any", true, true)) {
                        // line 78
                        echo "                    ";
                        if (($this->getAttribute($this->getContext($context, "action"), "type") == "search")) {
                            // line 79
                            echo "                        <img src='";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "icon"), "html", null, true);
                            echo "' title='";
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Actions_SubmenuSitesearch")), "html", null, true);
                            echo "' class=\"action-list-action-icon\">
                    ";
                        }
                        // line 81
                        echo "                    <span class=\"truncated-text-line\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "siteSearchKeyword"), "html", null, true);
                        echo "</span>
                ";
                    }
                    // line 83
                    echo "                ";
                    if ((!twig_test_empty((($this->getAttribute($this->getContext($context, "action", true), "eventCategory", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "action", true), "eventCategory"), false)) : (false))))) {
                        // line 84
                        echo "                    <img src='";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "icon"), "html", null, true);
                        echo "' title='";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Events_Event")), "html", null, true);
                        echo "' class=\"action-list-action-icon\">
                    <span class=\"truncated-text-line\">";
                        // line 85
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "eventCategory"), "html", null, true);
                        echo " - ";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "eventAction"), "html", null, true);
                        echo " ";
                        if ($this->getAttribute($this->getContext($context, "action", true), "eventName", array(), "any", true, true)) {
                            echo "- ";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "eventName"), "html", null, true);
                        }
                        echo " ";
                        if ($this->getAttribute($this->getContext($context, "action", true), "eventValue", array(), "any", true, true)) {
                            echo "- ";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "eventValue"), "html", null, true);
                        }
                        echo "</span>
                ";
                    }
                    // line 87
                    echo "                ";
                    if ((!twig_test_empty($this->getAttribute($this->getContext($context, "action"), "url")))) {
                        // line 88
                        echo "                    ";
                        if ((($this->getAttribute($this->getContext($context, "action"), "type") == "action") && (!twig_test_empty((($this->getAttribute($this->getContext($context, "action", true), "pageTitle", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "action", true), "pageTitle"), false)) : (false)))))) {
                            echo "<p>";
                        }
                        // line 89
                        echo "                    ";
                        if ((($this->getAttribute($this->getContext($context, "action"), "type") == "download") || ($this->getAttribute($this->getContext($context, "action"), "type") == "outlink"))) {
                            // line 90
                            echo "                        <img src='";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "icon"), "html", null, true);
                            echo "' class=\"action-list-action-icon\">
                    ";
                        }
                        // line 92
                        echo "                    <a href=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "url"), "html", null, true);
                        echo "\" target=\"_blank\" class=\"";
                        if (twig_test_empty((($this->getAttribute($this->getContext($context, "action", true), "eventCategory", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "action", true), "eventCategory"), false)) : (false)))) {
                            echo "action-list-url";
                        }
                        echo " truncated-text-line\"
                       ";
                        // line 93
                        if (((!array_key_exists("overrideLinkStyle", $context)) || $this->getContext($context, "overrideLinkStyle"))) {
                            echo "style=\"";
                            if ((($this->getAttribute($this->getContext($context, "action"), "type") == "action") && (!twig_test_empty((($this->getAttribute($this->getContext($context, "action", true), "pageTitle", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "action", true), "pageTitle"), false)) : (false)))))) {
                                echo "margin-left: 9px;";
                            }
                            echo "text-decoration:underline;\"";
                        }
                        echo ">
                       ";
                        // line 94
                        if ((!twig_test_empty((($this->getAttribute($this->getContext($context, "action", true), "eventCategory", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "action", true), "eventCategory"), false)) : (false))))) {
                            // line 95
                            echo "                            (url)
                       ";
                        } else {
                            // line 97
                            echo "                           ";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "url"), "html", null, true);
                            echo "
                       ";
                        }
                        // line 99
                        echo "                    </a>
                    ";
                        // line 100
                        if ((($this->getAttribute($this->getContext($context, "action"), "type") == "action") && (!twig_test_empty((($this->getAttribute($this->getContext($context, "action", true), "pageTitle", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "action", true), "pageTitle"), false)) : (false)))))) {
                            echo "</p>";
                        }
                        // line 101
                        echo "                ";
                    } elseif ((($this->getAttribute($this->getContext($context, "action"), "type") != "search") && ($this->getAttribute($this->getContext($context, "action"), "type") != "event"))) {
                        // line 102
                        echo "                    <p>
                    <span style=\"margin-left: 9px;\">";
                        // line 103
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "clientSideParameters"), "pageUrlNotDefined"), "html", null, true);
                        echo "</span>
                    </p>
                ";
                    }
                    // line 106
                    echo "            ";
                } else {
                    // line 107
                    echo "                ";
                    // line 108
                    echo "                <img src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "icon"), "html", null, true);
                    echo "\" />
                <strong>";
                    // line 109
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "goalName"), "html", null, true);
                    echo "</strong>
                ";
                    // line 110
                    if (($this->getAttribute($this->getContext($context, "action"), "revenue") > 0)) {
                        echo ", ";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnRevenue")), "html", null, true);
                        echo ":
                    <strong>";
                        // line 111
                        echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($this->getContext($context, "action"), "revenue"), $this->getAttribute($this->getContext($context, "clientSideParameters"), "idSite")));
                        echo "</strong>
                ";
                    }
                    // line 113
                    echo "            ";
                }
                // line 114
                echo "            </div>
        </li>
    ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "@Live/_actionsList.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  446 => 114,  438 => 111,  432 => 110,  428 => 109,  423 => 108,  421 => 107,  418 => 106,  412 => 103,  409 => 102,  406 => 101,  402 => 100,  399 => 99,  393 => 97,  389 => 95,  362 => 90,  359 => 89,  354 => 88,  351 => 87,  334 => 85,  327 => 84,  324 => 83,  318 => 81,  310 => 79,  307 => 78,  298 => 75,  295 => 74,  293 => 73,  288 => 70,  273 => 65,  267 => 64,  264 => 63,  257 => 62,  248 => 60,  244 => 59,  235 => 58,  224 => 54,  220 => 53,  218 => 52,  213 => 51,  207 => 49,  202 => 48,  196 => 46,  188 => 45,  180 => 44,  172 => 43,  165 => 42,  159 => 41,  156 => 40,  154 => 39,  145 => 37,  142 => 36,  124 => 29,  119 => 28,  117 => 27,  104 => 23,  102 => 22,  97 => 21,  92 => 19,  86 => 17,  67 => 13,  64 => 12,  58 => 10,  52 => 9,  44 => 8,  41 => 7,  38 => 6,  34 => 5,  29 => 4,  68 => 16,  63 => 13,  36 => 2,  274 => 4,  271 => 3,  256 => 1,  251 => 61,  246 => 59,  226 => 56,  223 => 55,  206 => 54,  203 => 53,  201 => 52,  198 => 51,  152 => 42,  140 => 39,  136 => 33,  133 => 37,  131 => 31,  129 => 35,  123 => 34,  115 => 26,  107 => 24,  99 => 27,  88 => 22,  84 => 21,  79 => 15,  65 => 19,  45 => 15,  40 => 4,  28 => 9,  23 => 2,  21 => 7,  462 => 142,  456 => 140,  450 => 138,  448 => 137,  443 => 113,  441 => 133,  434 => 129,  424 => 122,  414 => 120,  397 => 118,  390 => 115,  387 => 94,  384 => 110,  382 => 109,  380 => 108,  377 => 93,  374 => 105,  371 => 103,  368 => 92,  366 => 100,  363 => 99,  361 => 98,  358 => 97,  350 => 94,  347 => 92,  345 => 91,  343 => 90,  326 => 88,  322 => 86,  317 => 83,  304 => 77,  300 => 78,  294 => 77,  289 => 75,  286 => 74,  284 => 68,  272 => 70,  268 => 2,  262 => 68,  252 => 66,  249 => 65,  247 => 64,  243 => 61,  237 => 58,  232 => 57,  229 => 56,  225 => 54,  184 => 50,  181 => 52,  178 => 48,  175 => 47,  171 => 48,  166 => 47,  161 => 45,  158 => 46,  155 => 43,  153 => 42,  148 => 38,  128 => 39,  126 => 30,  109 => 37,  106 => 36,  98 => 35,  94 => 20,  89 => 18,  82 => 16,  80 => 26,  76 => 14,  70 => 23,  66 => 22,  61 => 11,  55 => 20,  46 => 14,  42 => 13,  30 => 4,  26 => 3,  22 => 2,  19 => 1,);
    }
}
