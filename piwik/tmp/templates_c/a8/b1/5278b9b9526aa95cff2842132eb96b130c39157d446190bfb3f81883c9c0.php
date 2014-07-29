<?php

/* @UserCountry/adminIndex.twig */
class __TwigTemplate_a8b15278b9b9526aa95cff2842132eb96b130c39157d446190bfb3f81883c9c0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("admin.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "admin.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        $context["piwik"] = $this->env->loadTemplate("macros.twig");
        // line 5
        echo "
<h2 id=\"location-providers\">";
        // line 6
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_Geolocation")), "html", null, true);
        echo "</h2>

<div style=\"width:900px;\">

    <p>";
        // line 10
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_GeolocationPageDesc")), "html", null, true);
        echo "</p>

    ";
        // line 12
        if ((!$this->getContext($context, "isThereWorkingProvider"))) {
            // line 13
            echo "        <h3 style=\"margin-top:0;\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_HowToSetupGeoIP")), "html", null, true);
            echo "</h3>
        <p>";
            // line 14
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_HowToSetupGeoIPIntro")), "html", null, true);
            echo "</p>
        <ul style=\"list-style:disc;margin-left:2em;\">
            <li>";
            // line 16
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_HowToSetupGeoIP_Step1", "<a href=\"http://geolite.maxmind.com/download/geoip/database/GeoLiteCity.dat.gz\">", "</a>", "<a target=\"_blank\" href=\"http://www.maxmind.com/?rId=piwik\">", "</a>"));
            echo "</li>
            <li>";
            // line 17
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_HowToSetupGeoIP_Step2", "'GeoLiteCity.dat'", "<strong>", "</strong>"));
            echo "</li>
            <li>";
            // line 18
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_HowToSetupGeoIP_Step3", "<strong>", "</strong>", "<span style=\"color:green\"><strong>", "</strong></span>"));
            echo "</li>
            <li>";
            // line 19
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_HowToSetupGeoIP_Step4")), "html", null, true);
            echo "</li>
        </ul>
        <p>&nbsp;</p>
    ";
        }
        // line 23
        echo "
    <table class=\"adminTable locationProviderTable\">
        <tr>
            <th>";
        // line 26
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_LocationProvider")), "html", null, true);
        echo "</th>
            <th>";
        // line 27
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Description")), "html", null, true);
        echo "</th>
            <th>";
        // line 28
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_InfoFor", $this->getContext($context, "thisIP"))), "html", null, true);
        echo "</th>
        </tr>
        ";
        // line 30
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "locationProviders"));
        foreach ($context['_seq'] as $context["id"] => $context["provider"]) {
            // line 31
            echo "        <tr>
            <td width=\"140\">
                <p>
                    <input class=\"location-provider\" name=\"location-provider\" value=\"";
            // line 34
            echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
            echo "\" type=\"radio\" ";
            if (($this->getContext($context, "currentProviderId") == $this->getContext($context, "id"))) {
                echo "checked=\"checked\"";
            }
            // line 35
            echo "                           id=\"provider_input_";
            echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
            echo "\" ";
            if (($this->getAttribute($this->getContext($context, "provider"), "status") != 1)) {
                echo "disabled=\"disabled\"";
            }
            echo "/>
                    <label for=\"provider_input_";
            // line 36
            echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($this->getAttribute($this->getContext($context, "provider"), "title"))), "html", null, true);
            echo "</label><br/>
                    <span class=\"loadingPiwik\" style=\"display:none;\"><img src=\"./plugins/Zeitgeist/images/loading-blue.gif\"/></span>
                    <span class=\"success\" ></span>
                </p>

                <p class=\"loc-provider-status\">
                    <strong><em>
                            ";
            // line 43
            if (($this->getAttribute($this->getContext($context, "provider"), "status") == 0)) {
                // line 44
                echo "                                <span class=\"is-not-installed\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NotInstalled")), "html", null, true);
                echo "</span>
                            ";
            } elseif (($this->getAttribute($this->getContext($context, "provider"), "status") == 1)) {
                // line 46
                echo "                                <span class=\"is-installed\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Installed")), "html", null, true);
                echo "</span>
                            ";
            } elseif (($this->getAttribute($this->getContext($context, "provider"), "status") == 2)) {
                // line 48
                echo "                                <span class=\"is-broken\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Broken")), "html", null, true);
                echo "</span>
                            ";
            }
            // line 50
            echo "                        </em></strong>
                </p>
            </td>
            <td>
                <p>";
            // line 54
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array($this->getAttribute($this->getContext($context, "provider"), "description")));
            echo "</p>
                ";
            // line 55
            if ((($this->getAttribute($this->getContext($context, "provider"), "status") != 1) && $this->getAttribute($this->getContext($context, "provider", true), "install_docs", array(), "any", true, true))) {
                // line 56
                echo "                    <p>";
                echo $this->getAttribute($this->getContext($context, "provider"), "install_docs");
                echo "</p>
                ";
            }
            // line 58
            echo "            </td>
            <td width=\"164\">
                ";
            // line 60
            if (($this->getAttribute($this->getContext($context, "provider"), "status") == 1)) {
                // line 61
                echo "                    ";
                ob_start();
                // line 62
                echo "                        ";
                if (($this->getContext($context, "thisIP") != "127.0.0.1")) {
                    // line 63
                    echo "                            ";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_CurrentLocationIntro")), "html", null, true);
                    echo ":
                            <div style=\"text-align:left;\">
                                <br/>
                                <span class=\"loadingPiwik\" style=\"display:none;position:absolute;\">
                                    <img src=\"./plugins/Zeitgeist/images/loading-blue.gif\"/> ";
                    // line 67
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Loading")), "html", null, true);
                    echo "</span>
                                <span class=\"location\"><strong><em>";
                    // line 68
                    echo $this->getAttribute($this->getContext($context, "provider"), "location");
                    echo "</em></strong></span>
                            </div>
                            <div style=\"text-align:right;\">
                                <a href=\"#\" class=\"refresh-loc\" data-impl-id=\"";
                    // line 71
                    echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
                    echo "\"><em>";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Refresh")), "html", null, true);
                    echo "</em></a>
                            </div>
                        ";
                } else {
                    // line 74
                    echo "                            ";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_CannotLocalizeLocalIP", $this->getContext($context, "thisIP"))), "html", null, true);
                    echo "
                        ";
                }
                // line 76
                echo "                    ";
                $context["currentLocation"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 77
                echo "                    ";
                echo $context["piwik"]->getinlineHelp($this->getContext($context, "currentLocation"));
                echo "
                ";
            }
            // line 79
            echo "                ";
            if (($this->getAttribute($this->getContext($context, "provider", true), "statusMessage", array(), "any", true, true) && $this->getAttribute($this->getContext($context, "provider"), "statusMessage"))) {
                // line 80
                echo "                    ";
                ob_start();
                // line 81
                echo "                        ";
                if (($this->getAttribute($this->getContext($context, "provider"), "status") == 2)) {
                    echo "<strong><em>";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Error")), "html", null, true);
                    echo ":</em></strong> ";
                }
                echo $this->getAttribute($this->getContext($context, "provider"), "statusMessage");
                echo "
                    ";
                $context["brokenReason"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 83
                echo "                    ";
                echo $context["piwik"]->getinlineHelp($this->getContext($context, "brokenReason"));
                echo "
                ";
            }
            // line 85
            echo "                ";
            if (($this->getAttribute($this->getContext($context, "provider", true), "extra_message", array(), "any", true, true) && $this->getAttribute($this->getContext($context, "provider"), "extra_message"))) {
                // line 86
                echo "                    ";
                ob_start();
                // line 87
                echo "                        ";
                echo $this->getAttribute($this->getContext($context, "provider"), "extra_message");
                echo "
                    ";
                $context["extraMessage"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 89
                echo "                    <br/>
                    ";
                // line 90
                echo $context["piwik"]->getinlineHelp($this->getContext($context, "extraMessage"));
                echo "
                ";
            }
            // line 92
            echo "            </td>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['id'], $context['provider'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 94
        echo "    </table>

</div>

";
        // line 98
        if ((!$this->getContext($context, "geoIPDatabasesInstalled"))) {
            // line 99
            echo "    <h2 id=\"geoip-db-mangement\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_GeoIPDatabases")), "html", null, true);
            echo "</h2>
";
        } else {
            // line 101
            echo "    <h2 id=\"geoip-db-mangement\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_SetupAutomaticUpdatesOfGeoIP")), "html", null, true);
            echo "</h2>
";
        }
        // line 103
        echo "
";
        // line 104
        if ($this->getContext($context, "showGeoIPUpdateSection")) {
            // line 105
            echo "    <div id=\"manage-geoip-dbs\" style=\"width:900px;\" class=\"adminTable\">

    ";
            // line 107
            if ((!$this->getContext($context, "geoIPDatabasesInstalled"))) {
                // line 108
                echo "        <div id=\"geoipdb-screen1\">
            <p>";
                // line 109
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_PiwikNotManagingGeoIPDBs")), "html", null, true);
                echo "</p>

            <div class=\"geoipdb-column-1\">
                <p>";
                // line 112
                echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_IWantToDownloadFreeGeoIP"));
                echo "</p>
                <input type=\"button\" class=\"submit\" value=\"";
                // line 113
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_GetStarted")), "html", null, true);
                echo "...\" id=\"start-download-free-geoip\"/>
            </div>
            <div class=\"geoipdb-column-2\">
                <p>";
                // line 116
                echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_IPurchasedGeoIPDBs", "<a href=\"http://www.maxmind.com/en/geolocation_landing?rId=piwik\">", "</a>"));
                echo "</p>
                <input type=\"button\" class=\"submit\" value=\"";
                // line 117
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_GetStarted")), "html", null, true);
                echo "...\" id=\"start-automatic-update-geoip\"/>
            </div>
        </div>
        <div id=\"geoipdb-screen2-download\" style=\"display:none;\">
            <p class='loadingPiwik'><img src='./plugins/Zeitgeist/images/loading-blue.gif'/>
            ";
                // line 122
                echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_DownloadingDb", (("<a href=\"" . $this->getContext($context, "geoLiteUrl")) . "\">GeoLiteCity.dat</a>")));
                echo "...</p>
\t        <div id=\"geoip-download-progress\"></div>
        </div>
    ";
            }
            // line 126
            echo "    ";
            $this->env->loadTemplate("@UserCountry/_updaterManage.twig")->display($context);
        } else {
            // line 128
            echo "<p style=\"width:900px;\" class=\"form-description\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_CannotSetupGeoIPAutoUpdating")), "html", null, true);
            echo "</p>
";
        }
        // line 130
        echo "</div>

";
    }

    public function getTemplateName()
    {
        return "@UserCountry/adminIndex.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  353 => 130,  347 => 128,  343 => 126,  336 => 122,  328 => 117,  324 => 116,  318 => 113,  314 => 112,  308 => 109,  305 => 108,  303 => 107,  299 => 105,  297 => 104,  294 => 103,  288 => 101,  282 => 99,  280 => 98,  274 => 94,  267 => 92,  262 => 90,  259 => 89,  253 => 87,  250 => 86,  247 => 85,  241 => 83,  230 => 81,  227 => 80,  224 => 79,  218 => 77,  215 => 76,  209 => 74,  201 => 71,  195 => 68,  191 => 67,  183 => 63,  180 => 62,  177 => 61,  175 => 60,  171 => 58,  165 => 56,  163 => 55,  159 => 54,  153 => 50,  147 => 48,  141 => 46,  135 => 44,  133 => 43,  121 => 36,  112 => 35,  106 => 34,  101 => 31,  97 => 30,  92 => 28,  88 => 27,  84 => 26,  79 => 23,  72 => 19,  68 => 18,  64 => 17,  60 => 16,  55 => 14,  50 => 13,  48 => 12,  43 => 10,  36 => 6,  33 => 5,  31 => 4,  28 => 3,);
    }
}
