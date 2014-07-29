<?php

/* @PrivacyManager/privacySettings.twig */
class __TwigTemplate_f0c546afde516849bdf2c0b0d5e7084c82eb3612b47faae56b0310a05d800f9e extends Twig_Template
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
        if ($this->getContext($context, "isSuperUser")) {
            // line 6
            echo "    <h2>";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_TeaserHeadline")), "html", null, true);
            echo "</h2>
    <p>";
            // line 7
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_Teaser", "<a href=\"#anonymizeIPAnchor\">", "</a>", "<a href=\"#deleteLogsAnchor\">", "</a>", "<a href=\"#optOutAnchor\">", "</a>"));
            echo "
        See also our official guide <strong><a href='http://piwik.org/privacy/' target='_blank'>Web Analytics Privacy</a></strong></p>
    <h2 id=\"anonymizeIPAnchor\">";
            // line 9
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_UseAnonymizeIp")), "html", null, true);
            echo "</h2>
    <form method=\"post\" action=\"";
            // line 10
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('urlRewriteWithParameters')->getCallable(), array(array("action" => "saveSettings", "form" => "formMaskLength", "token_auth" => $this->getContext($context, "token_auth")))), "html", null, true);
            echo "\" id=\"formMaskLength\" name=\"formMaskLength\">
        <div id='anonymizeIpSettings'>
            <table class=\"adminTable\" style='width:800px;'>
                <tr>
                    <td width=\"250\">";
            // line 14
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_UseAnonymizeIp")), "html", null, true);
            echo "<br/>
                        <span class=\"form-description\">";
            // line 15
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_AnonymizeIpDescription")), "html", null, true);
            echo "</span>
                    </td>
                    <td width='500'>
                        <input id=\"anonymizeIPEnable-1\" type=\"radio\" name=\"anonymizeIPEnable\" value=\"1\" ";
            // line 18
            if (($this->getAttribute($this->getContext($context, "anonymizeIP"), "enabled") == "1")) {
                echo "checked ";
            }
            echo "/>
                        <label for=\"anonymizeIPEnable-1\">";
            // line 19
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Yes")), "html", null, true);
            echo "</label>
                        <input class=\"indented-radio-button\" id=\"anonymizeIPEnable-0\" type=\"radio\" name=\"anonymizeIPEnable\" value=\"0\" ";
            // line 20
            if (($this->getAttribute($this->getContext($context, "anonymizeIP"), "enabled") == "0")) {
                echo " checked ";
            }
            echo "/>
                        <label for=\"anonymizeIPEnable-0\">";
            // line 21
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_No")), "html", null, true);
            echo "</label>
                        <input type=\"hidden\" name=\"token_auth\" value=\"";
            // line 22
            echo twig_escape_filter($this->env, $this->getContext($context, "token_auth"), "html", null, true);
            echo "\"/>
                        <input type=\"hidden\" name=\"pluginName\" value=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "anonymizeIP"), "name"), "html", null, true);
            echo "\"/>
                    </td>
                    <td width=\"200\">
                        <div style=\"width:180px\">
                            ";
            // line 27
            echo $context["piwik"]->getinlineHelp(call_user_func_array($this->env->getFilter('translate')->getCallable(), array("AnonymizeIP_PluginDescription")));
            echo "
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div id=\"anonymizeIPenabled\">
            <table class=\"adminTable\" style='width:800px;'>
                <tr>
                    <td width=\"250\">";
            // line 36
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_AnonymizeIpMaskLengtDescription")), "html", null, true);
            echo "</td>
                    <td width=\"500\">
                        <input id=\"maskLength-1\" type=\"radio\" name=\"maskLength\" value=\"1\" ";
            // line 38
            if (($this->getAttribute($this->getContext($context, "anonymizeIP"), "maskLength") == "1")) {
                // line 39
                echo "                            checked ";
            }
            echo "/>
                        <label for=\"maskLength-1\">";
            // line 40
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_AnonymizeIpMaskLength", "1", "192.168.100.xxx")), "html", null, true);
            echo "</label><br/>
                        <input id=\"maskLength-2\" type=\"radio\" name=\"maskLength\" value=\"2\" ";
            // line 41
            if (($this->getAttribute($this->getContext($context, "anonymizeIP"), "maskLength") == "2")) {
                // line 42
                echo "                            checked ";
            }
            echo "/>
                        <label for=\"maskLength-2\">";
            // line 43
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_AnonymizeIpMaskLength", "2", "192.168.xxx.xxx")), "html", null, true);
            echo " <span
                                    class=\"form-description\">";
            // line 44
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Recommended")), "html", null, true);
            echo "</span></label><br/>
                        <input id=\"maskLength-3\" type=\"radio\" name=\"maskLength\" value=\"3\" ";
            // line 45
            if (($this->getAttribute($this->getContext($context, "anonymizeIP"), "maskLength") == "3")) {
                // line 46
                echo "                            checked ";
            }
            echo "/>
                        <label for=\"maskLength-3\">";
            // line 47
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_AnonymizeIpMaskLength", "3", "192.xxx.xxx.xxx")), "html", null, true);
            echo "</label>
                    </td>
                    <td width=\"200\">
                        <div style=\"width:180px\">
                            ";
            // line 51
            echo $context["piwik"]->getinlineHelp(call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_GeolocationAnonymizeIpNote")));
            echo "
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width=\"250\">
                        ";
            // line 57
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_UseAnonymizedIpForVisitEnrichment")), "html", null, true);
            echo "
                    </td>
                    <td width='500'>
                        <input id=\"useAnonymizedIpForVisitEnrichment-1\" type=\"radio\" name=\"useAnonymizedIpForVisitEnrichment\" value=\"1\" ";
            // line 60
            if (($this->getAttribute($this->getContext($context, "anonymizeIP"), "useAnonymizedIpForVisitEnrichment") == "1")) {
                echo "checked ";
            }
            echo "/>
                        <label for=\"useAnonymizedIpForVisitEnrichment-1\">";
            // line 61
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Yes")), "html", null, true);
            echo "</label>
                        <span class=\"form-description\">
                            ";
            // line 63
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_RecommendedForPrivacy")), "html", null, true);
            echo "
                        </span>
                        <br/>
                        <input id=\"useAnonymizedIpForVisitEnrichment-2\" type=\"radio\" name=\"useAnonymizedIpForVisitEnrichment\" value=\"0\" ";
            // line 66
            if (($this->getAttribute($this->getContext($context, "anonymizeIP"), "useAnonymizedIpForVisitEnrichment") == "0")) {
                echo " checked ";
            }
            echo "/>
                        <label for=\"useAnonymizedIpForVisitEnrichment-2\">";
            // line 67
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_No")), "html", null, true);
            echo "</label>
                    </td>
                    <td width=\"200\">
                        <div style=\"width:180px\">
                            ";
            // line 71
            echo $context["piwik"]->getinlineHelp(call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_UseAnonymizedIpForVisitEnrichmentNote")));
            echo "
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <input type=\"hidden\" name=\"nonce\" value=\"";
            // line 78
            if ($this->getAttribute($this->getContext($context, "anonymizeIP"), "enabled")) {
                echo twig_escape_filter($this->env, $this->getContext($context, "deactivateNonce"), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->getContext($context, "activateNonce"), "html", null, true);
            }
            echo "\">

        <input type=\"submit\" value=\"";
            // line 80
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Save")), "html", null, true);
            echo "\" id=\"privacySettingsSubmit\" class=\"submit\"/>
    </form>
    <div class=\"ui-confirm\" id=\"confirmDeleteSettings\">
        <h2 id=\"deleteLogsConfirm\">";
            // line 83
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_DeleteLogsConfirm")), "html", null, true);
            echo "</h2>

        <h2 id=\"deleteReportsConfirm\">";
            // line 85
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_DeleteReportsConfirm")), "html", null, true);
            echo "</h2>

        <h2 id=\"deleteBothConfirm\">";
            // line 87
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_DeleteBothConfirm")), "html", null, true);
            echo "</h2>
        <input role=\"yes\" type=\"button\" value=\"";
            // line 88
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Yes")), "html", null, true);
            echo "\"/>
        <input role=\"no\" type=\"button\" value=\"";
            // line 89
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_No")), "html", null, true);
            echo "\"/>
    </div>
    <div class=\"ui-confirm\" id=\"saveSettingsBeforePurge\">
        <h2>";
            // line 92
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_SaveSettingsBeforePurge")), "html", null, true);
            echo "</h2>
        <input role=\"yes\" type=\"button\" value=\"";
            // line 93
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Ok")), "html", null, true);
            echo "\"/>
    </div>
    <div class=\"ui-confirm\" id=\"confirmPurgeNow\">
        <h2>";
            // line 96
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_PurgeNowConfirm")), "html", null, true);
            echo "</h2>
        <input role=\"yes\" type=\"button\" value=\"";
            // line 97
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Yes")), "html", null, true);
            echo "\"/>
        <input role=\"no\" type=\"button\" value=\"";
            // line 98
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_No")), "html", null, true);
            echo "\"/>
    </div>
    <h2 id=\"deleteLogsAnchor\">";
            // line 100
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_DeleteDataSettings")), "html", null, true);
            echo "</h2>
    <p>";
            // line 101
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_DeleteDataDescription")), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_DeleteDataDescription2")), "html", null, true);
            echo "</p>
    <form method=\"post\" action=\"";
            // line 102
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('urlRewriteWithParameters')->getCallable(), array(array("action" => "saveSettings", "form" => "formDeleteSettings", "token_auth" => $this->getContext($context, "token_auth")))), "html", null, true);
            echo "\" id=\"formDeleteSettings\" name=\"formMaskLength\">
        <table class=\"adminTable\" style='width:800px;'>
            <tr id='deleteLogSettingEnabled'>
                <td width=\"250\">";
            // line 105
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_UseDeleteLog")), "html", null, true);
            echo "<br/>

                </td>
                <td width='500'>
                    <input id=\"deleteEnable-1\" type=\"radio\" name=\"deleteEnable\" value=\"1\" ";
            // line 109
            if (($this->getAttribute($this->getAttribute($this->getContext($context, "deleteData"), "config"), "delete_logs_enable") == "1")) {
                // line 110
                echo "                        checked ";
            }
            echo "/>
                    <label for=\"deleteEnable-1\">";
            // line 111
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Yes")), "html", null, true);
            echo "</label>
                    <input class=\"indented-radio-button\" id=\"deleteEnable-2\" type=\"radio\" name=\"deleteEnable\" value=\"0\"
                                  ";
            // line 113
            if (($this->getAttribute($this->getAttribute($this->getContext($context, "deleteData"), "config"), "delete_logs_enable") == "0")) {
                // line 114
                echo "                        checked ";
            }
            echo "/>
                    <label for=\"deleteEnable-2\">";
            // line 115
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_No")), "html", null, true);
            echo "</label>
\t\t\t\t<span id=\"privacyManagerDeleteLogDescription\" style=\"margin-top: 10px;display:inline-block;\">
                    ";
            // line 117
            ob_start();
            // line 118
            echo "                        ";
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_DeleteLogDescription2"));
            echo "
                        <a href=\"http://piwik.org/faq/general/#faq_125\" target=\"_blank\">
                            ";
            // line 120
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ClickHere")), "html", null, true);
            echo "
                        </a>
                    ";
            $context["deleteLogDescription"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 123
            echo "                    ";
            echo call_user_func_array($this->env->getFilter('notification')->getCallable(), array($this->getContext($context, "deleteLogDescription"), array("raw" => true, "placeat" => "#privacyManagerDeleteLogDescription", "noclear" => true, "context" => "warning")));
            echo "
\t\t\t\t</span>
                </td>
                <td width=\"200\">
                    ";
            // line 127
            ob_start();
            // line 128
            echo "                        ";
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_DeleteLogInfo", $this->getAttribute($this->getContext($context, "deleteData"), "deleteTables")));
            echo "
                        ";
            // line 129
            if ((!$this->getContext($context, "canDeleteLogActions"))) {
                // line 130
                echo "                            <br/>
                            <br/>
                            ";
                // line 132
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_CannotLockSoDeleteLogActions", $this->getContext($context, "dbUser"))), "html", null, true);
                echo "
                        ";
            }
            // line 134
            echo "                    ";
            $context["deleteLogInfo"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 135
            echo "                    ";
            echo $context["piwik"]->getinlineHelp($this->getContext($context, "deleteLogInfo"));
            echo "
                </td>
            </tr>
            <tr id=\"deleteLogSettings\">
                <td width=\"250\">&nbsp;</td>
                <td width=\"500\">
                    <label>";
            // line 141
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_DeleteLogsOlderThan")), "html", null, true);
            echo "
                        <input type=\"text\" id=\"deleteOlderThan\" value=\"";
            // line 142
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "deleteData"), "config"), "delete_logs_older_than"), "html", null, true);
            echo "\" style=\"width:35px;\"
                               name=\"deleteOlderThan\"/>
                        ";
            // line 144
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_PeriodDays")), "html", null, true);
            echo "</label><br/>
                    <span class=\"form-description\">";
            // line 145
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_LeastDaysInput", "1")), "html", null, true);
            echo "</span>
                </td>
                <td width=\"200\">

                </td>
            </tr>
            <tr id='deleteReportsSettingEnabled'>
                <td width=\"250\">";
            // line 152
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_UseDeleteReports")), "html", null, true);
            echo "
                </td>
                <td width=\"500\">
                    <input id=\"deleteReportsEnable-1\" type=\"radio\" name=\"deleteReportsEnable\" value=\"1\" ";
            // line 155
            if (($this->getAttribute($this->getAttribute($this->getContext($context, "deleteData"), "config"), "delete_reports_enable") == "1")) {
                echo "checked=\"true\"";
            }
            echo " />
                    <label for=\"deleteReportsEnable-1\">";
            // line 156
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Yes")), "html", null, true);
            echo "</label>
                    <input class=\"indented-radio-button\" id=\"deleteReportsEnable-2\" type=\"radio\" name=\"deleteReportsEnable\" value=\"0\" ";
            // line 157
            if (($this->getAttribute($this->getAttribute($this->getContext($context, "deleteData"), "config"), "delete_reports_enable") == "0")) {
                echo "checked=\"true\"";
            }
            echo "/>
                    <label for=\"deleteReportsEnable-2\">";
            // line 158
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_No")), "html", null, true);
            echo "</label>

                    ";
            // line 160
            ob_start();
            // line 161
            echo "                        ";
            ob_start();
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_UseDeleteLog")), "html", null, true);
            $context["deleteOldLogs"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 162
            echo "                        ";
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_DeleteReportsInfo", "<em>", "</em>"));
            echo "
                        <span id='deleteOldReportsMoreInfo'><br/><br/>
                            ";
            // line 164
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_DeleteReportsInfo2", $this->getContext($context, "deleteOldLogs"))), "html", null, true);
            echo "<br/><br/>
                            ";
            // line 165
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_DeleteReportsInfo3", $this->getContext($context, "deleteOldLogs"))), "html", null, true);
            echo "</span>
                    ";
            $context["useDeleteLog"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 167
            echo "                    <span id=\"privacyManagerUseDeleteLog\" style=\"margin-top: 10px;display:inline-block;\">
                        ";
            // line 168
            echo call_user_func_array($this->env->getFilter('notification')->getCallable(), array($this->getContext($context, "useDeleteLog"), array("raw" => true, "placeat" => "#privacyManagerUseDeleteLog", "noclear" => true, "context" => "warning")));
            echo "
                    </span>
                </td>
                <td width=\"200\">
                    ";
            // line 172
            echo $context["piwik"]->getinlineHelp(call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_DeleteReportsDetailedInfo", "archive_numeric_*", "archive_blob_*")));
            echo "
                </td>
            </tr>
            <tr id='deleteReportsSettings'>
                <td width=\"250\">&nbsp;</td>
                <td width=\"500\">
                    <label>";
            // line 178
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_DeleteReportsOlderThan")), "html", null, true);
            echo "
                        <input type=\"text\" id=\"deleteReportsOlderThan\" value=\"";
            // line 179
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "deleteData"), "config"), "delete_reports_older_than"), "html", null, true);
            echo "\" style=\"width:30px;\"
                               name=\"deleteReportsOlderThan\"/>
                        ";
            // line 181
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_PeriodMonths")), "html", null, true);
            echo "
                    </label><br/>
                    <span class=\"form-description\">";
            // line 183
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_LeastMonthsInput", "3")), "html", null, true);
            echo "</span><br/><br/>
                    <input id=\"deleteReportsKeepBasic\" type=\"checkbox\" name=\"deleteReportsKeepBasic\" value=\"1\"
                                  ";
            // line 185
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "deleteData"), "config"), "delete_reports_keep_basic_metrics")) {
                echo "checked=\"true\"";
            }
            echo ">
                    <label for=\"deleteReportsKeepBasic\">";
            // line 186
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_KeepBasicMetrics")), "html", null, true);
            echo "
                        <span class=\"form-description\">";
            // line 187
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Recommended")), "html", null, true);
            echo "</span>
                    </label><br/><br/>
                    ";
            // line 189
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_KeepDataFor")), "html", null, true);
            echo "<br/><br/>
                    <input id=\"deleteReportsKeepDay\" type=\"checkbox\" name=\"deleteReportsKeepDay\" value=\"1\"
                                  ";
            // line 191
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "deleteData"), "config"), "delete_reports_keep_day_reports")) {
                echo "checked=\"true\"";
            }
            echo ">
                    <label for=\"deleteReportsKeepDay\">";
            // line 192
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_DailyReports")), "html", null, true);
            echo "</label><br/>
                    <input type=\"checkbox\" name=\"deleteReportsKeepWeek\" value=\"1\" id=\"deleteReportsKeepWeek\"
                                  ";
            // line 194
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "deleteData"), "config"), "delete_reports_keep_week_reports")) {
                echo "checked=\"true\"";
            }
            echo ">
                    <label for=\"deleteReportsKeepWeek\">";
            // line 195
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_WeeklyReports")), "html", null, true);
            echo "</label><br/>
                    <input type=\"checkbox\" name=\"deleteReportsKeepMonth\" value=\"1\" id=\"deleteReportsKeepMonth\"
                                  ";
            // line 197
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "deleteData"), "config"), "delete_reports_keep_month_reports")) {
                echo "checked=\"true\"";
            }
            echo ">
                    <label for=\"deleteReportsKeepMonth\">";
            // line 198
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_MonthlyReports")), "html", null, true);
            echo "<span
                                class=\"form-description\">";
            // line 199
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Recommended")), "html", null, true);
            echo "</span></label><br/>
                    <input type=\"checkbox\" name=\"deleteReportsKeepYear\" value=\"1\" id=\"deleteReportsKeepYear\"
                                  ";
            // line 201
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "deleteData"), "config"), "delete_reports_keep_year_reports")) {
                echo "checked=\"true\"";
            }
            echo ">
                    <label for=\"deleteReportsKeepYear\">";
            // line 202
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_YearlyReports")), "html", null, true);
            echo "<span
                                class=\"form-description\">";
            // line 203
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Recommended")), "html", null, true);
            echo "</span></label><br/>
                    <input type=\"checkbox\" name=\"deleteReportsKeepRange\" value=\"1\" id=\"deleteReportsKeepRange\"
                                  ";
            // line 205
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "deleteData"), "config"), "delete_reports_keep_range_reports")) {
                echo "checked=\"true\"";
            }
            echo ">
                    <label for=\"deleteReportsKeepRange\">";
            // line 206
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_RangeReports")), "html", null, true);
            echo "
                    </label><br/><br/>
                    <input type=\"checkbox\" name=\"deleteReportsKeepSegments\" value=\"1\" id=\"deleteReportsKeepSegments\"
                                  ";
            // line 209
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "deleteData"), "config"), "delete_reports_keep_segment_reports")) {
                echo "checked=\"true\"";
            }
            echo ">
                    <label for=\"deleteReportsKeepSegments\">";
            // line 210
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_KeepReportSegments")), "html", null, true);
            echo "</label><br/>
                </td>
                <td width=\"200\">

                </td>
            </tr>
            <tr id=\"deleteDataEstimateSect\"
                ";
            // line 217
            if ((($this->getAttribute($this->getAttribute($this->getContext($context, "deleteData"), "config"), "delete_reports_enable") == "0") && ($this->getAttribute($this->getAttribute($this->getContext($context, "deleteData"), "config"), "delete_logs_enable") == "0"))) {
                echo "style=\"display:none;\"";
            }
            echo ">
                <td width=\"250\">";
            // line 218
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_ReportsDataSavedEstimate")), "html", null, true);
            echo "<br/></td>
                <td width=\"500\">
                    <div id=\"deleteDataEstimate\"></div>
                    <span class=\"loadingPiwik\" style=\"display:none;\"><img
                                src=\"./plugins/Zeitgeist/images/loading-blue.gif\"/> ";
            // line 222
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_LoadingData")), "html", null, true);
            echo "</span>
                </td>
                <td width=\"200\">
                    ";
            // line 225
            if (($this->getAttribute($this->getAttribute($this->getContext($context, "deleteData"), "config"), "enable_auto_database_size_estimate") == "0")) {
                // line 226
                echo "                        ";
                ob_start();
                // line 227
                echo "                            <em><a id=\"getPurgeEstimateLink\" style=\"width:280px\" class=\"ui-inline-help\" href=\"#\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_GetPurgeEstimate")), "html", null, true);
                echo "</a></em>
                        ";
                $context["manualEstimate"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 229
                echo "                        ";
                echo $context["piwik"]->getinlineHelp($this->getContext($context, "manualEstimate"));
                echo "
                    ";
            }
            // line 231
            echo "                </td>
            </tr>
            <tr id=\"deleteSchedulingSettings\">
                <td width=\"250\">";
            // line 234
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_DeleteSchedulingSettings")), "html", null, true);
            echo "<br/></td>
                <td width=\"500\">
                    <label>";
            // line 236
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_DeleteDataInterval")), "html", null, true);
            echo "
                        <select id=\"deleteLowestInterval\" name=\"deleteLowestInterval\">
                            <option ";
            // line 238
            if (($this->getAttribute($this->getAttribute($this->getContext($context, "deleteData"), "config"), "delete_logs_schedule_lowest_interval") == "1")) {
                echo " selected=\"selected\" ";
            }
            // line 239
            echo "                                    value=\"1\"> ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_PeriodDay")), "html", null, true);
            echo "</option>
                            <option ";
            // line 240
            if (($this->getAttribute($this->getAttribute($this->getContext($context, "deleteData"), "config"), "delete_logs_schedule_lowest_interval") == "7")) {
                echo " selected=\"selected\" ";
            }
            // line 241
            echo "                                    value=\"7\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_PeriodWeek")), "html", null, true);
            echo "</option>
                            <option ";
            // line 242
            if (($this->getAttribute($this->getAttribute($this->getContext($context, "deleteData"), "config"), "delete_logs_schedule_lowest_interval") == "30")) {
                echo " selected=\"selected\" ";
            }
            // line 243
            echo "                                    value=\"30\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_PeriodMonth")), "html", null, true);
            echo "</option>
                        </select></label><br/><br/>
                </td>
                <td width=\"200\">
                    ";
            // line 247
            ob_start();
            // line 248
            echo "                        ";
            if ($this->getAttribute($this->getContext($context, "deleteData"), "lastRun")) {
                echo "<strong>";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_LastDelete")), "html", null, true);
                echo ":</strong>
                            ";
                // line 249
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "deleteData"), "lastRunPretty"), "html", null, true);
                echo "
                            <br/>
                            <br/>
                        ";
            }
            // line 253
            echo "                        <strong>";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_NextDelete")), "html", null, true);
            echo ":</strong>
                        ";
            // line 254
            echo $this->getAttribute($this->getContext($context, "deleteData"), "nextRunPretty");
            echo "
                        <br/>
                        <br/>
                        <em><a id=\"purgeDataNowLink\" href=\"#\">";
            // line 257
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_PurgeNow")), "html", null, true);
            echo "</a></em>
                        <span class=\"loadingPiwik\" style=\"display:none;\"><img
                                    src=\"./plugins/Zeitgeist/images/loading-blue.gif\"/> ";
            // line 259
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_PurgingData")), "html", null, true);
            echo "</span>
                        <span id=\"db-purged-message\" style=\"display: none;\"><em>";
            // line 260
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_DBPurged")), "html", null, true);
            echo "</em></span>
                    ";
            $context["purgeStats"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 262
            echo "                    ";
            echo $context["piwik"]->getinlineHelp($this->getContext($context, "purgeStats"));
            echo "
                </td>
            </tr>
        </table>
        <input type=\"button\" value=\"";
            // line 266
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Save")), "html", null, true);
            echo "\" id=\"deleteLogSettingsSubmit\" class=\"submit\"/>
    </form>
    <h2 id=\"DNT\">";
            // line 268
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_DoNotTrack_SupportDNTPreference")), "html", null, true);
            echo "</h2>
    <table class=\"adminTable\" style='width:800px;'>
        <tr>
            <td width=\"650\">
                <p>
                    ";
            // line 273
            if ($this->getContext($context, "dntSupport")) {
                // line 274
                echo "                        ";
                $context["action"] = "deactivate";
                // line 275
                echo "                        ";
                $context["nonce"] = $this->getContext($context, "deactivateNonce");
                // line 276
                echo "                        <strong>";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_DoNotTrack_Enabled")), "html", null, true);
                echo "</strong>
                        <br/>
                        ";
                // line 278
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_DoNotTrack_EnabledMoreInfo")), "html", null, true);
                echo "
                    ";
            } else {
                // line 280
                echo "                        ";
                $context["action"] = "activate";
                // line 281
                echo "                        ";
                $context["nonce"] = $this->getContext($context, "activateNonce");
                // line 282
                echo "                        ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_DoNotTrack_Disabled")), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_DoNotTrack_DisabledMoreInfo")), "html", null, true);
                echo "
                    ";
            }
            // line 284
            echo "                </p>
\t\t\t<span style=\"margin-left:20px;\">
\t\t\t<a href='";
            // line 286
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('urlRewriteWithParameters')->getCallable(), array(array("module" => "CorePluginsAdmin", "nonce" => $this->getContext($context, "nonce"), "action" => $this->getContext($context, "action"), "pluginName" => "DoNotTrack"))), "html", null, true);
            echo "#DNT'>&rsaquo;
                ";
            // line 287
            if ($this->getContext($context, "dntSupport")) {
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_DoNotTrack_Disable")), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NotRecommended")), "html", null, true);
                echo "
                ";
            } else {
                // line 288
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_DoNotTrack_Enable")), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Recommended")), "html", null, true);
            }
            // line 289
            echo "                <br/>
            </a></span>
            </td>
            <td width=\"200\">
                ";
            // line 293
            echo $context["piwik"]->getinlineHelp(call_user_func_array($this->env->getFilter('translate')->getCallable(), array("PrivacyManager_DoNotTrack_Description")));
            echo "
            </td>
        </tr>
    </table>
";
        }
        // line 298
        echo "
<h2 id=\"optOutAnchor\">";
        // line 299
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_OptOutForYourVisitors")), "html", null, true);
        echo "</h2>
<p>";
        // line 300
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_OptOutExplanation")), "html", null, true);
        echo "
    ";
        // line 301
        ob_start();
        echo twig_escape_filter($this->env, $this->getContext($context, "piwikUrl"), "html", null, true);
        echo "index.php?module=CoreAdminHome&action=optOut&language=";
        echo twig_escape_filter($this->env, $this->getContext($context, "language"), "html", null, true);
        $context["optOutUrl"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 302
        echo "    ";
        ob_start();
        echo "<iframe frameborder=\"no\" width=\"600px\" height=\"200px\" src=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "optOutUrl"), "html", null, true);
        echo "\"></iframe>";
        $context["iframeOptOut"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 303
        echo "    <code>";
        echo twig_escape_filter($this->env, $this->getContext($context, "iframeOptOut"), "html");
        echo "</code>
    <br/>
    ";
        // line 305
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_OptOutExplanationBis", (("<a href='" . $this->getContext($context, "optOutUrl")) . "' target='_blank'>"), "</a>"));
        echo "
</p>

<div style=\"height:100px;\"></div>
";
    }

    public function getTemplateName()
    {
        return "@PrivacyManager/privacySettings.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  822 => 305,  816 => 303,  809 => 302,  803 => 301,  799 => 300,  795 => 299,  792 => 298,  784 => 293,  778 => 289,  773 => 288,  765 => 287,  761 => 286,  757 => 284,  749 => 282,  746 => 281,  743 => 280,  738 => 278,  732 => 276,  729 => 275,  726 => 274,  724 => 273,  716 => 268,  711 => 266,  703 => 262,  698 => 260,  694 => 259,  689 => 257,  683 => 254,  678 => 253,  671 => 249,  664 => 248,  662 => 247,  654 => 243,  650 => 242,  645 => 241,  641 => 240,  636 => 239,  632 => 238,  627 => 236,  622 => 234,  617 => 231,  611 => 229,  605 => 227,  602 => 226,  600 => 225,  594 => 222,  587 => 218,  581 => 217,  571 => 210,  565 => 209,  559 => 206,  553 => 205,  548 => 203,  544 => 202,  538 => 201,  533 => 199,  529 => 198,  523 => 197,  518 => 195,  512 => 194,  507 => 192,  501 => 191,  496 => 189,  491 => 187,  487 => 186,  481 => 185,  476 => 183,  471 => 181,  466 => 179,  462 => 178,  453 => 172,  446 => 168,  443 => 167,  438 => 165,  434 => 164,  428 => 162,  423 => 161,  421 => 160,  416 => 158,  410 => 157,  406 => 156,  400 => 155,  394 => 152,  384 => 145,  380 => 144,  375 => 142,  371 => 141,  361 => 135,  358 => 134,  353 => 132,  349 => 130,  347 => 129,  342 => 128,  340 => 127,  332 => 123,  326 => 120,  320 => 118,  318 => 117,  313 => 115,  308 => 114,  306 => 113,  301 => 111,  296 => 110,  294 => 109,  287 => 105,  281 => 102,  275 => 101,  271 => 100,  266 => 98,  262 => 97,  258 => 96,  252 => 93,  248 => 92,  242 => 89,  238 => 88,  234 => 87,  229 => 85,  224 => 83,  218 => 80,  209 => 78,  199 => 71,  192 => 67,  186 => 66,  180 => 63,  175 => 61,  169 => 60,  163 => 57,  154 => 51,  147 => 47,  142 => 46,  140 => 45,  136 => 44,  132 => 43,  127 => 42,  125 => 41,  121 => 40,  116 => 39,  114 => 38,  109 => 36,  97 => 27,  90 => 23,  86 => 22,  82 => 21,  76 => 20,  72 => 19,  66 => 18,  60 => 15,  56 => 14,  49 => 10,  45 => 9,  40 => 7,  35 => 6,  33 => 5,  31 => 4,  28 => 3,);
    }
}
