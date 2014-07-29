<?php

/* @UsersManager/userSettings.twig */
class __TwigTemplate_5eea45f3398a267b3bf30af466408f4126e2077ae7846ff7a23f4225d6cdfd83 extends Twig_Template
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
        echo "<h2>";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UsersManager_MenuUserSettings")), "html", null, true);
        echo "</h2>

<br/>

<div class=\"ui-confirm\" id=\"confirmPasswordChange\">
    <h2>";
        // line 9
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UsersManager_ChangePasswordConfirm")), "html", null, true);
        echo "</h2>
    <input role=\"yes\" type=\"button\" value=\"";
        // line 10
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Yes")), "html", null, true);
        echo "\"/>
    <input role=\"no\" type=\"button\" value=\"";
        // line 11
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_No")), "html", null, true);
        echo "\"/>
</div>

<table id='userSettingsTable' class=\"adminTable\">
    <tr>
        <td><label for=\"username\">";
        // line 16
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Username")), "html", null, true);
        echo " </label></td>
        <td>
            <input size=\"25\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->getContext($context, "userLogin"), "html", null, true);
        echo "\" id=\"username\" disabled=\"disabled\"/>
            <span class='form-description'>";
        // line 19
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UsersManager_YourUsernameCannotBeChanged")), "html", null, true);
        echo "</span>
        </td>
    </tr>

    <tr>
        <td><label for=\"alias\">";
        // line 24
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UsersManager_Alias")), "html", null, true);
        echo " </label></td>
        <td><input size=\"25\" value=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->getContext($context, "userAlias"), "html", null, true);
        echo "\" id=\"alias\"";
        if ($this->getContext($context, "isSuperUser")) {
            echo " disabled=\"disabled\"";
        }
        echo " />
            ";
        // line 26
        if ($this->getContext($context, "isSuperUser")) {
            // line 27
            echo "                <span class='form-description'>
                    ";
            // line 28
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UsersManager_TheSuperUserAliasCannotBeChanged")), "html", null, true);
            echo "
\t\t\t</span>
            ";
        }
        // line 31
        echo "        </td>
    </tr>
    <tr>
        <td><label for=\"email\">";
        // line 34
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UsersManager_Email")), "html", null, true);
        echo " </label></td>
        <td><input size=\"25\" value=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->getContext($context, "userEmail"), "html", null, true);
        echo "\" id=\"email\"/></td>
    </tr>
    <tr>
        <td>";
        // line 38
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UsersManager_ReportToLoadByDefault")), "html", null, true);
        echo "</td>
        <td>
            <fieldset>
                <input id=\"defaultReportRadioAll\" type=\"radio\" value=\"MultiSites\"
                      name=\"defaultReport\"";
        // line 42
        if (($this->getContext($context, "defaultReport") == "MultiSites")) {
            echo " checked=\"checked\"";
        }
        echo " />
                <label for=\"defaultReportRadioAll\">";
        // line 43
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_AllWebsitesDashboard")), "html", null, true);
        echo "</label><br/>
                <input id=\"defaultReportSpecific\" type=\"radio\" value=\"1\"
                       name=\"defaultReport\"";
        // line 45
        if (($this->getContext($context, "defaultReport") != "MultiSites")) {
            echo " checked=\"checked\"";
        }
        echo " />
                <label for=\"defaultReportSpecific\" style=\"padding-right:12px;\">";
        // line 46
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_DashboardForASpecificWebsite")), "html", null, true);
        echo "</label>
                ";
        // line 47
        if (($this->getContext($context, "defaultReport") == "MultiSites")) {
            // line 48
            echo "                    ";
            $context["defaultReportIdSite"] = 1;
            // line 49
            echo "                ";
        } else {
            // line 50
            echo "                    ";
            $context["defaultReportIdSite"] = $this->getContext($context, "defaultReport");
            // line 51
            echo "                ";
        }
        // line 52
        echo "                ";
        $this->env->loadTemplate("@CoreHome/_siteSelect.twig")->display(array_merge($context, array("siteName" => $this->getContext($context, "defaultReportSiteName"), "idSite" => $this->getContext($context, "defaultReportIdSite"), "switchSiteOnSelect" => false, "showAllSitesItem" => false, "showSelectedSite" => true, "siteSelectorId" => "defaultReportSiteSelector")));
        // line 60
        echo "            </fieldset>
        </td>
    </tr>
    <tr>
        <td>";
        // line 64
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UsersManager_ReportDateToLoadByDefault")), "html", null, true);
        echo "</td>
        <td>
            <fieldset>
                ";
        // line 67
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "availableDefaultDates"));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["value"] => $context["description"]) {
            // line 68
            echo "                    <input id=\"defaultDate-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" type=\"radio\"";
            if (($this->getContext($context, "defaultDate") == $this->getContext($context, "value"))) {
                echo " checked=\"checked\"";
            }
            echo " value=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "value"), "html", null, true);
            echo "\" name=\"defaultDate\"/>
                    <label for=\"defaultDate-";
            // line 69
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getContext($context, "description"), "html", null, true);
            echo "</label>
                    <br/>
                ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['value'], $context['description'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 72
        echo "            </fieldset>
        </td>
    </tr>

    ";
        // line 76
        if ((array_key_exists("isValidHost", $context) && $this->getContext($context, "isValidHost"))) {
            // line 77
            echo "        <tr>
            <td><label for=\"email\">";
            // line 78
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ChangePassword")), "html", null, true);
            echo " </label></td>
            <td><input size=\"25\" value=\"\" autocomplete=\"off\" id=\"password\" type=\"password\"/>
                <span class='form-description'>";
            // line 80
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UsersManager_IfYouWouldLikeToChangeThePasswordTypeANewOne")), "html", null, true);
            echo "</span>
                <br/><br/><input size=\"25\" value=\"\" autocomplete=\"off\" id=\"passwordBis\" type=\"password\"/>
                <span class='form-description'> ";
            // line 82
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UsersManager_TypeYourPasswordAgain")), "html", null, true);
            echo "</span>
            </td>
        </tr>
    ";
        }
        // line 86
        echo "</table>
";
        // line 87
        if (((!array_key_exists("isValidHost", $context)) || (!$this->getContext($context, "isValidHost")))) {
            // line 88
            echo "    <div id=\"injectedHostCannotChangePwd\">
        ";
            // line 89
            ob_start();
            // line 90
            echo "        ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UsersManager_InjectedHostCannotChangePwd", $this->getContext($context, "invalidHost"))), "html", null, true);
            echo "
        &nbsp;";
            // line 91
            if ((!$this->getContext($context, "isSuperUser"))) {
                echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UsersManager_EmailYourAdministrator", $this->getContext($context, "invalidHostMailLinkStart"), "</a>"));
            }
            // line 92
            echo "        ";
            $context["injectedHostCannotChangePwd"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 93
            echo "        ";
            echo call_user_func_array($this->env->getFilter('notification')->getCallable(), array($this->getContext($context, "injectedHostCannotChangePwd"), array("raw" => true, "context" => "error", "placeat" => "#injectedHostCannotChangePwd", "noclear" => true)));
            echo "
    </div>
    <br/>
";
        }
        // line 97
        echo "
";
        // line 98
        $context["ajax"] = $this->env->loadTemplate("ajaxMacros.twig");
        // line 99
        echo $context["ajax"]->geterrorDiv("ajaxErrorUserSettings");
        echo "
";
        // line 100
        echo $context["ajax"]->getloadingDiv("ajaxLoadingUserSettings");
        echo "
<input type=\"submit\" value=\"";
        // line 101
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Save")), "html", null, true);
        echo "\" id=\"userSettingsSubmit\" class=\"submit\"/>

<br/><br/>

<h2 id=\"excludeCookie\">";
        // line 105
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UsersManager_ExcludeVisitsViaCookie")), "html", null, true);
        echo "</h2>
<p>
";
        // line 107
        if ($this->getContext($context, "ignoreCookieSet")) {
            // line 108
            echo "   ";
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UsersManager_YourVisitsAreIgnoredOnDomain", "<strong>", $this->getContext($context, "piwikHost"), "</strong>"));
            echo "
";
        } else {
            // line 110
            echo "   ";
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UsersManager_YourVisitsAreNotIgnored", "<strong>", "</strong>"));
            echo "
";
        }
        // line 112
        echo "</p>
<span style=\"margin-left:20px;\">
<a href='";
        // line 114
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('linkTo')->getCallable(), array(array("token_auth" => $this->getContext($context, "token_auth"), "action" => "setIgnoreCookie"))), "html", null, true);
        echo "#excludeCookie'>&rsaquo; ";
        if ($this->getContext($context, "ignoreCookieSet")) {
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UsersManager_ClickHereToDeleteTheCookie")), "html", null, true);
            echo "
    ";
        } else {
            // line 115
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UsersManager_ClickHereToSetTheCookieOnDomain", $this->getContext($context, "piwikHost"))), "html", null, true);
        }
        // line 116
        echo "    <br/>
</a></span>

<br/><br/>
";
        // line 120
        if ($this->getContext($context, "isSuperUser")) {
            // line 121
            echo "    <h2>";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UsersManager_MenuAnonymousUserSettings")), "html", null, true);
            echo "</h2>
    ";
            // line 122
            if ((twig_length_filter($this->env, $this->getContext($context, "anonymousSites")) == 0)) {
                // line 123
                echo "        <h3 class='form-description'><strong>";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UsersManager_NoteNoAnonymousUserAccessSettingsWontBeUsed2")), "html", null, true);
                echo "</strong></h3>
        <br/>
    ";
            } else {
                // line 126
                echo "        <br/>
        ";
                // line 127
                echo $context["ajax"]->geterrorDiv("ajaxErrorAnonymousUserSettings");
                echo "
        ";
                // line 128
                echo $context["ajax"]->getloadingDiv("ajaxLoadingAnonymousUserSettings");
                echo "
        <table id='anonymousUserSettingsTable' class=\"adminTable\" style='width:850px;'>
            <tr>
                <td style=\"width:400px;\">";
                // line 131
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UsersManager_WhenUsersAreNotLoggedInAndVisitPiwikTheyShouldAccess")), "html", null, true);
                echo "</td>
                <td>
                    <fieldset>
                        <input id=\"anonymousDefaultReport-login\" type=\"radio\" value=\"Login\"
                               name=\"anonymousDefaultReport\"";
                // line 135
                if (($this->getContext($context, "anonymousDefaultReport") == $this->getContext($context, "loginModule"))) {
                    echo " checked=\"checked\"";
                }
                echo " />
                        <label for=\"anonymousDefaultReport-login\">";
                // line 136
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UsersManager_TheLoginScreen")), "html", null, true);
                echo "</label><br/>
                        <input id=\"anonymousDefaultReport-multisites\" ";
                // line 137
                if (twig_test_empty($this->getContext($context, "anonymousSites"))) {
                    echo "disabled=\"disabled\" ";
                }
                echo "type=\"radio\" value=\"MultiSites\"
                               name=\"anonymousDefaultReport\"";
                // line 138
                if (($this->getContext($context, "anonymousDefaultReport") == "MultiSites")) {
                    echo " checked=\"checked\"";
                }
                echo " />
                        <label for=\"anonymousDefaultReport-multisites\">";
                // line 139
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_AllWebsitesDashboard")), "html", null, true);
                echo "</label><br/>

                        <input id=\"anonymousDefaultReport-specific\" ";
                // line 141
                if (twig_test_empty($this->getContext($context, "anonymousSites"))) {
                    echo "disabled=\"disabled\" ";
                }
                echo "type=\"radio\" value=\"1\"
                               name=\"anonymousDefaultReport\"";
                // line 142
                if (($this->getContext($context, "anonymousDefaultReport") > 0)) {
                    echo " checked=\"checked\"";
                }
                echo " />
                        <label for=\"anonymousDefaultReport-specific\">";
                // line 143
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_DashboardForASpecificWebsite")), "html", null, true);
                echo "</label>
                        ";
                // line 144
                if ((!twig_test_empty($this->getContext($context, "anonymousSites")))) {
                    // line 145
                    echo "                            <select id=\"anonymousDefaultReportWebsite\">
                                ";
                    // line 146
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getContext($context, "anonymousSites"));
                    foreach ($context['_seq'] as $context["_key"] => $context["info"]) {
                        // line 147
                        echo "                                    <option value=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "info"), "idsite"), "html", null, true);
                        echo "\" ";
                        if (($this->getContext($context, "anonymousDefaultReport") == $this->getAttribute($this->getContext($context, "info"), "idsite"))) {
                            echo " selected=\"selected\"";
                        }
                        echo ">";
                        echo $this->getAttribute($this->getContext($context, "info"), "name");
                        echo "</option>
                                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['info'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 149
                    echo "                            </select>
                        ";
                }
                // line 151
                echo "                    </fieldset>
                </td>
            </tr>
            <tr>
                <td>";
                // line 155
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UsersManager_ForAnonymousUsersReportDateToLoadByDefault")), "html", null, true);
                echo "</td>
                <td>
                    <fieldset>
                        ";
                // line 158
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getContext($context, "availableDefaultDates"));
                $context['loop'] = array(
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                );
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["value"] => $context["description"]) {
                    // line 159
                    echo "                            <input id=\"anonymousDefaultDate-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
                    echo "\" type=\"radio\" ";
                    if (($this->getContext($context, "anonymousDefaultDate") == $this->getContext($context, "value"))) {
                        echo "checked=\"checked\" ";
                    }
                    echo "value=\"";
                    echo twig_escape_filter($this->env, $this->getContext($context, "value"), "html", null, true);
                    echo "\"
                                   name=\"anonymousDefaultDate\"/>
                            <label for=\"anonymousDefaultDate-";
                    // line 161
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getContext($context, "description"), "html", null, true);
                    echo "</label>
                            <br/>
                        ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['value'], $context['description'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 164
                echo "                    </fieldset>
                </td>
            </tr>

        </table>
        <input type=\"submit\" value=\"";
                // line 169
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Save")), "html", null, true);
                echo "\" id=\"anonymousUserSettingsSubmit\" class=\"submit\"/>
    ";
            }
        }
    }

    public function getTemplateName()
    {
        return "@UsersManager/userSettings.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  507 => 169,  500 => 164,  481 => 161,  469 => 159,  452 => 158,  446 => 155,  440 => 151,  436 => 149,  421 => 147,  417 => 146,  414 => 145,  412 => 144,  408 => 143,  402 => 142,  396 => 141,  391 => 139,  385 => 138,  379 => 137,  375 => 136,  369 => 135,  362 => 131,  356 => 128,  352 => 127,  349 => 126,  342 => 123,  340 => 122,  335 => 121,  333 => 120,  327 => 116,  324 => 115,  316 => 114,  312 => 112,  306 => 110,  300 => 108,  298 => 107,  293 => 105,  286 => 101,  282 => 100,  278 => 99,  276 => 98,  273 => 97,  265 => 93,  262 => 92,  258 => 91,  253 => 90,  251 => 89,  248 => 88,  246 => 87,  243 => 86,  236 => 82,  231 => 80,  226 => 78,  223 => 77,  221 => 76,  215 => 72,  196 => 69,  185 => 68,  168 => 67,  162 => 64,  156 => 60,  153 => 52,  150 => 51,  147 => 50,  144 => 49,  141 => 48,  139 => 47,  135 => 46,  129 => 45,  124 => 43,  118 => 42,  111 => 38,  105 => 35,  101 => 34,  96 => 31,  90 => 28,  87 => 27,  85 => 26,  77 => 25,  73 => 24,  65 => 19,  61 => 18,  56 => 16,  48 => 11,  44 => 10,  40 => 9,  31 => 4,  28 => 3,);
    }
}
