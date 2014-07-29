<?php

/* @Live/_actionsList.twig */
class __TwigTemplate_686f26bfdbcfc2b173d27e6b05917268d68130ed8b0dd10d4fc065574571cafb extends Twig_Template
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
        $context["previousAction"] = false;
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "actionDetails"));
        foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
            // line 3
            echo "    ";
            ob_start();
            // line 4
            echo "        ";
            if ($this->getAttribute($this->getContext($context, "action", true), "customVariables", array(), "any", true, true)) {
                // line 5
                echo "            ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CustomVariables_CustomVariables")), "html", null, true);
                echo ":
            ";
                // line 6
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "action"), "customVariables"));
                foreach ($context['_seq'] as $context["id"] => $context["customVariable"]) {
                    // line 7
                    echo "                ";
                    $context["name"] = ("customVariablePageName" . $this->getContext($context, "id"));
                    // line 8
                    echo "                ";
                    $context["value"] = ("customVariablePageValue" . $this->getContext($context, "id"));
                    // line 9
                    echo "                - ";
                    echo $this->getAttribute($this->getContext($context, "customVariable"), $this->getContext($context, "name"), array(), "array");
                    echo " ";
                    if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "customVariable"), $this->getContext($context, "value"), array(), "array")) > 0)) {
                        echo " = ";
                        echo $this->getAttribute($this->getContext($context, "customVariable"), $this->getContext($context, "value"), array(), "array");
                    }
                    // line 10
                    echo "
                ";
                    // line 12
                    echo "            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['id'], $context['customVariable'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 13
                echo "        ";
            }
            // line 14
            echo "    ";
            $context["customVariablesTooltip"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 15
            echo "    ";
            if ((((!$this->getAttribute($this->getContext($context, "clientSideParameters"), "filterEcommerce")) || ($this->getAttribute($this->getContext($context, "action"), "type") == "ecommerceOrder")) || ($this->getAttribute($this->getContext($context, "action"), "type") == "ecommerceAbandonedCart"))) {
                // line 16
                echo "        <li class=\"";
                if ($this->getAttribute($this->getContext($context, "action", true), "goalName", array(), "any", true, true)) {
                    echo "goal";
                } else {
                    echo "action";
                }
                echo "\"
            title=\"";
                // line 17
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "serverTimePretty"), "html", null, true);
                if (($this->getAttribute($this->getContext($context, "action", true), "url", array(), "any", true, true) && twig_length_filter($this->env, trim($this->getAttribute($this->getContext($context, "action"), "url"))))) {
                    // line 18
                    echo "
";
                    // line 19
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "url"), "html", null, true);
                }
                if (twig_length_filter($this->env, trim($this->getContext($context, "customVariablesTooltip")))) {
                    // line 20
                    echo "
";
                    // line 21
                    echo twig_escape_filter($this->env, trim($this->getContext($context, "customVariablesTooltip")), "html", null, true);
                }
                // line 22
                if ($this->getAttribute($this->getContext($context, "action", true), "generationTime", array(), "any", true, true)) {
                    // line 23
                    echo "
";
                    // line 24
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnGenerationTime")), "html", null, true);
                    echo ": ";
                    echo $this->getAttribute($this->getContext($context, "action"), "generationTime");
                }
                // line 25
                if ($this->getAttribute($this->getContext($context, "action", true), "timeSpentPretty", array(), "any", true, true)) {
                    // line 26
                    echo "
";
                    // line 27
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_TimeOnPage")), "html", null, true);
                    echo ": ";
                    echo $this->getAttribute($this->getContext($context, "action"), "timeSpentPretty");
                }
                echo "\">
            <div>
            ";
                // line 29
                if ((($this->getAttribute($this->getContext($context, "action"), "type") == "ecommerceOrder") || ($this->getAttribute($this->getContext($context, "action"), "type") == "ecommerceAbandonedCart"))) {
                    // line 30
                    echo "            ";
                    // line 31
                    echo "                <img src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "icon"), "html", null, true);
                    echo "\"/>
                ";
                    // line 32
                    if (($this->getAttribute($this->getContext($context, "action"), "type") == "ecommerceOrder")) {
                        // line 33
                        echo "                    <strong>";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_EcommerceOrder")), "html", null, true);
                        echo "</strong>
                    <span style='color:#666;'>(";
                        // line 34
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "orderId"), "html", null, true);
                        echo ")</span>
                ";
                    } else {
                        // line 36
                        echo "                    <strong>";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_AbandonedCart")), "html", null, true);
                        echo "</strong>

                    ";
                        // line 39
                        echo "                ";
                    }
                    // line 40
                    echo "                <p>
                <span ";
                    // line 41
                    if ((!$this->getContext($context, "isWidget"))) {
                        echo "style='margin-left:20px;'";
                    }
                    echo ">
                    ";
                    // line 42
                    if (($this->getAttribute($this->getContext($context, "action"), "type") == "ecommerceOrder")) {
                        // line 44
                        ob_start();
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnRevenue")), "html", null, true);
                        echo ": ";
                        echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($this->getContext($context, "action"), "revenue"), $this->getAttribute($this->getContext($context, "clientSideParameters"), "idSite")));
                        echo "
";
                        // line 45
                        if ((!twig_test_empty($this->getAttribute($this->getContext($context, "action"), "revenueSubTotal")))) {
                            echo " - ";
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Subtotal")), "html", null, true);
                            echo ": ";
                            echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($this->getContext($context, "action"), "revenueSubTotal"), $this->getAttribute($this->getContext($context, "clientSideParameters"), "idSite")));
                        }
                        // line 46
                        echo "
";
                        // line 47
                        if ((!twig_test_empty($this->getAttribute($this->getContext($context, "action"), "revenueTax")))) {
                            echo " - ";
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Tax")), "html", null, true);
                            echo ": ";
                            echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($this->getContext($context, "action"), "revenueTax"), $this->getAttribute($this->getContext($context, "clientSideParameters"), "idSite")));
                        }
                        // line 48
                        echo "
";
                        // line 49
                        if ((!twig_test_empty($this->getAttribute($this->getContext($context, "action"), "revenueShipping")))) {
                            echo " - ";
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Shipping")), "html", null, true);
                            echo ": ";
                            echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($this->getContext($context, "action"), "revenueShipping"), $this->getAttribute($this->getContext($context, "clientSideParameters"), "idSite")));
                        }
                        // line 50
                        echo "
";
                        // line 51
                        if ((!twig_test_empty($this->getAttribute($this->getContext($context, "action"), "revenueDiscount")))) {
                            echo " - ";
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Discount")), "html", null, true);
                            echo ": ";
                            echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($this->getContext($context, "action"), "revenueDiscount"), $this->getAttribute($this->getContext($context, "clientSideParameters"), "idSite")));
                        }
                        $context["ecommerceOrderTooltip"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                        // line 53
                        echo "                    <abbr title=\"";
                        echo twig_escape_filter($this->env, $this->getContext($context, "ecommerceOrderTooltip"), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnRevenue")), "html", null, true);
                        echo ":
                    ";
                    } else {
                        // line 55
                        echo "                        ";
                        ob_start();
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnRevenue")), "html", null, true);
                        $context["revenueLeft"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                        // line 56
                        echo "                        ";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_LeftInCart", $this->getContext($context, "revenueLeft"))), "html", null, true);
                        echo ":
                    ";
                    }
                    // line 58
                    echo "                        <strong>";
                    echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($this->getContext($context, "action"), "revenue"), $this->getAttribute($this->getContext($context, "clientSideParameters"), "idSite")));
                    echo "</strong>
                    ";
                    // line 59
                    if (($this->getAttribute($this->getContext($context, "action"), "type") == "ecommerceOrder")) {
                        // line 60
                        echo "                    </abbr>
                    ";
                    }
                    // line 61
                    echo ", ";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Quantity")), "html", null, true);
                    echo ": ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "items"), "html", null, true);
                    echo "

                    ";
                    // line 64
                    echo "                    ";
                    if ((!twig_test_empty($this->getAttribute($this->getContext($context, "action"), "itemDetails")))) {
                        // line 65
                        echo "                        <ul style='list-style:square;margin-left:";
                        if ($this->getContext($context, "isWidget")) {
                            echo "15";
                        } else {
                            echo "50";
                        }
                        echo "px;'>
                            ";
                        // line 66
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "action"), "itemDetails"));
                        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                            // line 67
                            echo "                                <li>
                                    ";
                            // line 68
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "itemSKU"), "html", null, true);
                            if ((!twig_test_empty($this->getAttribute($this->getContext($context, "product"), "itemName")))) {
                                echo ": ";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "itemName"), "html", null, true);
                            }
                            // line 69
                            echo "                                    ";
                            if ((!twig_test_empty($this->getAttribute($this->getContext($context, "product"), "itemCategory")))) {
                                echo " (";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "itemCategory"), "html", null, true);
                                echo ")";
                            }
                            // line 70
                            echo "                                    ,
                                    ";
                            // line 71
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Quantity")), "html", null, true);
                            echo ": ";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "quantity"), "html", null, true);
                            echo ",
                                    ";
                            // line 72
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
                        // line 75
                        echo "                        </ul>
                    ";
                    }
                    // line 77
                    echo "                </span>
                </p>
            ";
                } elseif ((!$this->getAttribute($this->getContext($context, "action", true), "goalName", array(), "any", true, true))) {
                    // line 80
                    echo "                ";
                    // line 81
                    echo "                ";
                    if ((!twig_test_empty((($this->getAttribute($this->getContext($context, "action", true), "pageTitle", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "action", true), "pageTitle"), false)) : (false))))) {
                        // line 82
                        echo "                    <span class=\"truncated-text-line\">";
                        echo call_user_func_array($this->env->getFilter('rawSafeDecoded')->getCallable(), array($this->getAttribute($this->getContext($context, "action"), "pageTitle")));
                        echo "</span>
                ";
                    }
                    // line 84
                    echo "                ";
                    if ($this->getAttribute($this->getContext($context, "action", true), "siteSearchKeyword", array(), "any", true, true)) {
                        // line 85
                        echo "                    ";
                        if (($this->getAttribute($this->getContext($context, "action"), "type") == "search")) {
                            // line 86
                            echo "                        <img src='";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "icon"), "html", null, true);
                            echo "' title='";
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Actions_SubmenuSitesearch")), "html", null, true);
                            echo "' class=\"action-list-action-icon\">
                    ";
                        }
                        // line 88
                        echo "                    <span class=\"truncated-text-line\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "siteSearchKeyword"), "html", null, true);
                        echo "</span>
                ";
                    }
                    // line 90
                    echo "                ";
                    if ((!twig_test_empty((($this->getAttribute($this->getContext($context, "action", true), "eventCategory", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "action", true), "eventCategory"), false)) : (false))))) {
                        // line 91
                        echo "                    <img src='";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "icon"), "html", null, true);
                        echo "' title='";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Events_Event")), "html", null, true);
                        echo "' class=\"action-list-action-icon\">
                    <span class=\"truncated-text-line\">";
                        // line 92
                        echo call_user_func_array($this->env->getFilter('rawSafeDecoded')->getCallable(), array($this->getAttribute($this->getContext($context, "action"), "eventCategory")));
                        echo " - ";
                        echo call_user_func_array($this->env->getFilter('rawSafeDecoded')->getCallable(), array($this->getAttribute($this->getContext($context, "action"), "eventAction")));
                        echo " ";
                        if ($this->getAttribute($this->getContext($context, "action", true), "eventName", array(), "any", true, true)) {
                            echo "- ";
                            echo call_user_func_array($this->env->getFilter('rawSafeDecoded')->getCallable(), array($this->getAttribute($this->getContext($context, "action"), "eventName")));
                        }
                        echo " ";
                        if ($this->getAttribute($this->getContext($context, "action", true), "eventValue", array(), "any", true, true)) {
                            echo "[";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "eventValue"), "html", null, true);
                            echo "]";
                        }
                        echo "</span>
                ";
                    }
                    // line 94
                    echo "                ";
                    if ((!twig_test_empty($this->getAttribute($this->getContext($context, "action"), "url")))) {
                        // line 95
                        echo "                    ";
                        if ((($this->getAttribute($this->getContext($context, "action"), "type") == "action") && (!twig_test_empty((($this->getAttribute($this->getContext($context, "action", true), "pageTitle", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "action", true), "pageTitle"), false)) : (false)))))) {
                            echo "<p>";
                        }
                        // line 96
                        echo "                    ";
                        if ((($this->getAttribute($this->getContext($context, "action"), "type") == "download") || ($this->getAttribute($this->getContext($context, "action"), "type") == "outlink"))) {
                            // line 97
                            echo "                        <img src='";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "icon"), "html", null, true);
                            echo "' class=\"action-list-action-icon\">
                    ";
                        }
                        // line 99
                        echo "
                    ";
                        // line 100
                        if (((!twig_test_empty((($this->getAttribute($this->getContext($context, "action", true), "eventCategory", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "action", true), "eventCategory"), false)) : (false)))) && ((($this->getAttribute($this->getContext($context, "previousAction", true), "url", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "previousAction", true), "url"), false)) : (false)) == $this->getAttribute($this->getContext($context, "action"), "url")))) {
                            // line 102
                            echo "                        ";
                            // line 103
                            echo "                    ";
                        } else {
                            // line 104
                            echo "                        <a href=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "url"), "html", null, true);
                            echo "\" target=\"_blank\" class=\"";
                            if (twig_test_empty((($this->getAttribute($this->getContext($context, "action", true), "eventCategory", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "action", true), "eventCategory"), false)) : (false)))) {
                                echo "action-list-url";
                            }
                            echo " truncated-text-line\"
                           ";
                            // line 105
                            if (((!array_key_exists("overrideLinkStyle", $context)) || $this->getContext($context, "overrideLinkStyle"))) {
                                echo "style=\"";
                                if ((($this->getAttribute($this->getContext($context, "action"), "type") == "action") && (!twig_test_empty((($this->getAttribute($this->getContext($context, "action", true), "pageTitle", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "action", true), "pageTitle"), false)) : (false)))))) {
                                    echo "margin-left: 9px;";
                                }
                                echo "text-decoration:underline;\"";
                            }
                            echo ">
                           ";
                            // line 106
                            if ((!twig_test_empty((($this->getAttribute($this->getContext($context, "action", true), "eventCategory", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "action", true), "eventCategory"), false)) : (false))))) {
                                // line 107
                                echo "                               (url)
                           ";
                            } else {
                                // line 109
                                echo "                               ";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "url"), "html", null, true);
                                echo "
                           ";
                            }
                            // line 111
                            echo "                        </a>
                    ";
                        }
                        // line 113
                        echo "                    ";
                        if ((($this->getAttribute($this->getContext($context, "action"), "type") == "action") && (!twig_test_empty((($this->getAttribute($this->getContext($context, "action", true), "pageTitle", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "action", true), "pageTitle"), false)) : (false)))))) {
                            echo "</p>";
                        }
                        // line 114
                        echo "                ";
                    } elseif ((($this->getAttribute($this->getContext($context, "action"), "type") != "search") && ($this->getAttribute($this->getContext($context, "action"), "type") != "event"))) {
                        // line 115
                        echo "                    <p>
                    <span style=\"margin-left: 9px;\">";
                        // line 116
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "clientSideParameters"), "pageUrlNotDefined"), "html", null, true);
                        echo "</span>
                    </p>
                ";
                    }
                    // line 119
                    echo "            ";
                } else {
                    // line 120
                    echo "                ";
                    // line 121
                    echo "                <img src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "icon"), "html", null, true);
                    echo "\" />
                <strong>";
                    // line 122
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "goalName"), "html", null, true);
                    echo "</strong>
                ";
                    // line 123
                    if (($this->getAttribute($this->getContext($context, "action"), "revenue") > 0)) {
                        echo ", ";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnRevenue")), "html", null, true);
                        echo ":
                    <strong>";
                        // line 124
                        echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($this->getContext($context, "action"), "revenue"), $this->getAttribute($this->getContext($context, "clientSideParameters"), "idSite")));
                        echo "</strong>
                ";
                    }
                    // line 126
                    echo "            ";
                }
                // line 127
                echo "            </div>
        </li>
    ";
            }
            // line 130
            echo "
    ";
            // line 131
            $context["previousAction"] = $this->getContext($context, "action");
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
        return array (  479 => 131,  476 => 130,  471 => 127,  468 => 126,  463 => 124,  457 => 123,  453 => 122,  446 => 120,  437 => 116,  431 => 114,  426 => 113,  422 => 111,  416 => 109,  412 => 107,  410 => 106,  400 => 105,  391 => 104,  388 => 103,  386 => 102,  381 => 99,  375 => 97,  372 => 96,  367 => 95,  364 => 94,  346 => 92,  339 => 91,  336 => 90,  330 => 88,  319 => 85,  316 => 84,  310 => 82,  307 => 81,  305 => 80,  296 => 75,  285 => 72,  279 => 71,  276 => 70,  269 => 69,  263 => 68,  260 => 67,  244 => 64,  236 => 61,  230 => 59,  219 => 56,  214 => 55,  195 => 50,  188 => 49,  185 => 48,  168 => 45,  159 => 42,  150 => 40,  147 => 39,  141 => 36,  124 => 31,  122 => 30,  120 => 29,  112 => 27,  102 => 24,  97 => 22,  91 => 20,  87 => 19,  81 => 17,  72 => 16,  69 => 15,  57 => 12,  54 => 10,  43 => 8,  31 => 5,  25 => 3,  68 => 16,  63 => 13,  36 => 6,  274 => 4,  271 => 3,  256 => 66,  251 => 62,  246 => 59,  226 => 56,  223 => 55,  206 => 53,  203 => 53,  201 => 52,  198 => 51,  152 => 42,  140 => 39,  136 => 34,  133 => 37,  131 => 33,  129 => 32,  123 => 34,  115 => 31,  107 => 25,  99 => 23,  88 => 22,  84 => 18,  79 => 20,  65 => 19,  45 => 15,  40 => 7,  28 => 4,  23 => 8,  21 => 2,  462 => 142,  456 => 140,  450 => 138,  448 => 121,  443 => 119,  441 => 133,  434 => 115,  424 => 122,  414 => 120,  397 => 118,  390 => 115,  387 => 112,  384 => 100,  382 => 109,  380 => 108,  377 => 107,  374 => 105,  371 => 103,  368 => 101,  366 => 100,  363 => 99,  361 => 98,  358 => 97,  350 => 94,  347 => 92,  345 => 91,  343 => 90,  326 => 88,  322 => 86,  317 => 83,  304 => 79,  300 => 77,  294 => 77,  289 => 75,  286 => 74,  284 => 73,  272 => 70,  268 => 2,  262 => 68,  252 => 66,  249 => 65,  247 => 65,  243 => 61,  237 => 58,  232 => 60,  229 => 56,  225 => 58,  184 => 50,  181 => 52,  178 => 47,  175 => 46,  171 => 48,  166 => 47,  161 => 44,  158 => 46,  155 => 43,  153 => 41,  148 => 41,  128 => 39,  126 => 38,  109 => 26,  106 => 36,  98 => 35,  94 => 21,  89 => 32,  82 => 27,  80 => 26,  76 => 24,  70 => 23,  66 => 14,  61 => 6,  55 => 20,  46 => 9,  42 => 13,  30 => 4,  26 => 3,  22 => 2,  19 => 1,);
    }
}
