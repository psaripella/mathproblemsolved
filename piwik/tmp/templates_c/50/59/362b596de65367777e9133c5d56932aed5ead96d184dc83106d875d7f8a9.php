<?php

/* @CoreAdminHome/trackingCodeGenerator.twig */
class __TwigTemplate_5059362b596de65367777e9133c5d56932aed5ead96d184dc83106d875d7f8a9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("admin.twig");

        $this->blocks = array(
            'head' => array($this, 'block_head'),
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
    public function block_head($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
    <link rel=\"stylesheet\" href=\"plugins/CoreAdminHome/stylesheets/jsTrackingGenerator.css\" />
    <script type=\"text/javascript\" src=\"plugins/CoreAdminHome/javascripts/jsTrackingGenerator.js\"></script>
";
    }

    // line 9
    public function block_content($context, array $blocks = array())
    {
        // line 10
        echo "<div id=\"js-tracking-generator-data\" data-currencies=\"";
        echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getContext($context, "currencySymbols")), "html", null, true);
        echo "\"></div>

<h2>";
        // line 12
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JavaScriptTracking")), "html", null, true);
        echo "</h2>

<div id=\"js-code-options\" class=\"adminTable\">

    <p>
        ";
        // line 17
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTrackingIntro1")), "html", null, true);
        echo "
        <br/><br/>
        ";
        // line 19
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTrackingIntro2")), "html", null, true);
        echo " ";
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTrackingIntro3", "<a href=\"http://piwik.org/integrate/\" target=\"_blank\">", "</a>"));
        echo "
        <br/><br/>
        ";
        // line 21
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTrackingIntro4", "<a href=\"#image-tracking-link\">", "</a>"));
        echo "
        <br/><br/>
        ";
        // line 23
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTrackingIntro5", "<a target=\"_blank\" href=\"http://piwik.org/docs/javascript-tracking/\">", "</a>"));
        echo "
    </p>

    <div>
        ";
        // line 28
        echo "        <label class=\"website-label\"><strong>";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Website")), "html", null, true);
        echo "</strong></label>
        ";
        // line 29
        $this->env->loadTemplate("@CoreHome/_siteSelect.twig")->display(array_merge($context, array("siteName" => $this->getContext($context, "defaultReportSiteName"), "idSite" => $this->getContext($context, "idSite"), "showAllSitesItem" => false, "switchSiteOnSelect" => false, "siteSelectorId" => "js-tracker-website", "showSelectedSite" => true)));
        // line 31
        echo "
        <br/><br/><br/>
    </div>

    <table id=\"optional-js-tracking-options\" class=\"adminTable\" style=\"width:1024px;\">
        <tr>
            <th>";
        // line 37
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Options")), "html", null, true);
        echo "</th>
            <th>";
        // line 38
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Mobile_Advanced")), "html", null, true);
        echo "
                <a href=\"#\" class=\"section-toggler-link\" data-section-id=\"javascript-advanced-options\">(";
        // line 39
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Show")), "html", null, true);
        echo ")</a>
            </th>
        </tr>
        <tr>
            <td>
                ";
        // line 45
        echo "                <div class=\"tracking-option-section\">
                    <input type=\"checkbox\" id=\"javascript-tracking-all-subdomains\"/>
                    <label for=\"javascript-tracking-all-subdomains\">";
        // line 47
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_MergeSubdomains")), "html", null, true);
        echo "
                        <span class='current-site-name'>";
        // line 48
        echo $this->getContext($context, "defaultReportSiteName");
        echo "</span>
                    </label>

                    <div class=\"small-form-description\">
                        ";
        // line 52
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_MergeSubdomainsDesc", (("x.<span class='current-site-host'>" . $this->getContext($context, "defaultReportSiteDomain")) . "</span>"), (("y.<span class='current-site-host'>" . $this->getContext($context, "defaultReportSiteDomain")) . "</span>")));
        echo "
                    </div>
                </div>

                ";
        // line 57
        echo "                <div class=\"tracking-option-section\">
                    <input type=\"checkbox\" id=\"javascript-tracking-group-by-domain\"/>
                    <label for=\"javascript-tracking-group-by-domain\">";
        // line 59
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_GroupPageTitlesByDomain")), "html", null, true);
        echo "</label>

                    <div class=\"small-form-description\">
                        ";
        // line 62
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_GroupPageTitlesByDomainDesc1", (("<span class='current-site-host'>" . $this->getContext($context, "defaultReportSiteDomain")) . "</span>")));
        echo "
                    </div>
                </div>

                ";
        // line 67
        echo "                <div class=\"tracking-option-section\">
                    <input type=\"checkbox\" id=\"javascript-tracking-all-aliases\"/>
                    <label for=\"javascript-tracking-all-aliases\">";
        // line 69
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_MergeAliases")), "html", null, true);
        echo "
                        <span class='current-site-name'>";
        // line 70
        echo $this->getContext($context, "defaultReportSiteName");
        echo "</span>
                    </label>

                    <div class=\"small-form-description\">
                        ";
        // line 74
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_MergeAliasesDesc", (("<span class='current-site-alias'>" . $this->getContext($context, "defaultReportSiteAlias")) . "</span>")));
        echo "
                    </div>
                </div>

            </td>
            <td>
                <div id=\"javascript-advanced-options\" style=\"display:none;\">
                    ";
        // line 82
        echo "                    <div class=\"custom-variable tracking-option-section\" id=\"javascript-tracking-visitor-cv\">
                        <input class=\"section-toggler-link\" type=\"checkbox\" id=\"javascript-tracking-visitor-cv-check\" data-section-id=\"js-visitor-cv-extra\"/>
                        <label for=\"javascript-tracking-visitor-cv-check\">";
        // line 84
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_VisitorCustomVars")), "html", null, true);
        echo "</label>

                        <div class=\"small-form-description\">
                            ";
        // line 87
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_VisitorCustomVarsDesc")), "html", null, true);
        echo "
                        </div>

                        <table style=\"display:none;\" id=\"js-visitor-cv-extra\">
                            <tr>
                                <td><strong>";
        // line 92
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Name")), "html", null, true);
        echo "</strong></td>
                                <td><input type=\"textbox\" class=\"custom-variable-name\" placeholder=\"e.g. Type\"/></td>
                                <td><strong>";
        // line 94
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Value")), "html", null, true);
        echo "</strong></td>
                                <td><input type=\"textbox\" class=\"custom-variable-value\" placeholder=\"e.g. Customer\"/></td>
                            </tr>
                            <tr>
                                <td colspan=\"4\" style=\"text-align:right;\">
                                    <a href=\"#\" class=\"add-custom-variable\">";
        // line 99
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Add")), "html", null, true);
        echo "</a>
                                </td>
                            </tr>
                        </table>
                    </div>

                    ";
        // line 106
        echo "                    <div class=\"custom-variable tracking-option-section\" id=\"javascript-tracking-page-cv\">
                        <input class=\"section-toggler-link\" type=\"checkbox\" id=\"javascript-tracking-page-cv-check\" data-section-id=\"js-page-cv-extra\"/>
                        <label for=\"javascript-tracking-page-cv-check\">";
        // line 108
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_PageCustomVars")), "html", null, true);
        echo "</label>

                        <div class=\"small-form-description\">
                            ";
        // line 111
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_PageCustomVarsDesc")), "html", null, true);
        echo "
                        </div>

                        <table style=\"display:none;\" id=\"js-page-cv-extra\">
                            <tr>
                                <td><strong>";
        // line 116
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Name")), "html", null, true);
        echo "</strong></td>
                                <td><input type=\"textbox\" class=\"custom-variable-name\" placeholder=\"e.g. Category\"/></td>
                                <td><strong>";
        // line 118
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Value")), "html", null, true);
        echo "</strong></td>
                                <td><input type=\"textbox\" class=\"custom-variable-value\" placeholder=\"e.g. White Papers\"/></td>
                            </tr>
                            <tr>
                                <td colspan=\"4\" style=\"text-align:right;\">
                                    <a href=\"#\" class=\"add-custom-variable\">";
        // line 123
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Add")), "html", null, true);
        echo "</a>
                                </td>
                            </tr>
                        </table>
                    </div>

                    ";
        // line 130
        echo "                    <div class=\"tracking-option-section\">
                        <input type=\"checkbox\" id=\"javascript-tracking-do-not-track\"/>
                        <label for=\"javascript-tracking-do-not-track\">";
        // line 132
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_EnableDoNotTrack")), "html", null, true);
        echo "</label>

                        <div class=\"small-form-description\">
                            ";
        // line 135
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_EnableDoNotTrackDesc")), "html", null, true);
        echo "
                            ";
        // line 136
        if ($this->getContext($context, "serverSideDoNotTrackEnabled")) {
            // line 137
            echo "                                <br/>
                                <br/>
                                ";
            // line 139
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_EnableDoNotTrack_AlreadyEnabled")), "html", null, true);
            echo "
                            ";
        }
        // line 141
        echo "                        </div>
                    </div>

                    ";
        // line 145
        echo "                    <div class=\"tracking-option-section\">
                        <input class=\"section-toggler-link\" type=\"checkbox\" id=\"custom-campaign-query-params-check\"
                               data-section-id=\"js-campaign-query-param-extra\"/>
                        <label for=\"custom-campaign-query-params-check\">";
        // line 148
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_CustomCampaignQueryParam")), "html", null, true);
        echo "</label>

                        <div class=\"small-form-description\">
                            ";
        // line 151
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_CustomCampaignQueryParamDesc", "<a href=\"http://piwik.org/faq/general/#faq_119\" target=\"_blank\">", "</a>"));
        echo "
                        </div>

                        <table style=\"display:none;\" id=\"js-campaign-query-param-extra\">
                            <tr>
                                <td><strong>";
        // line 156
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_CampaignNameParam")), "html", null, true);
        echo "</strong></td>
                                <td><input type=\"text\" id=\"custom-campaign-name-query-param\"/></td>
                            </tr>
                            <tr>
                                <td><strong>";
        // line 160
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_CampaignKwdParam")), "html", null, true);
        echo "</strong></td>
                                <td><input type=\"text\" id=\"custom-campaign-keyword-query-param\"/></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </td>
        </tr>
    </table>

</div>

<div id=\"javascript-output-section\">
    <h3>";
        // line 173
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_JsTrackingTag")), "html", null, true);
        echo "</h3>

    <p class=\"form-description\">";
        // line 175
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_CodeNote", "&lt;/body&gt;"));
        echo "</p>

    <div id=\"javascript-text\">
        <textarea> </textarea>
    </div>
    <br/>
</div>

<h2 id=\"image-tracking-link\">";
        // line 183
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_ImageTracking")), "html", null, true);
        echo "</h2>

<div id=\"image-tracking-code-options\" class=\"adminTable\">

    <p>
        ";
        // line 188
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_ImageTrackingIntro1")), "html", null, true);
        echo " ";
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_ImageTrackingIntro2", "<em>&lt;noscript&gt;&lt;/noscript&gt;</em>"));
        echo "
        <br/><br/>
        ";
        // line 190
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_ImageTrackingIntro3", "<a href=\"http://piwik.org/docs/tracking-api/reference/\" target=\"_blank\">", "</a>"));
        echo "
    </p>

    <div>
        ";
        // line 195
        echo "        <label class=\"website-label\"><strong>";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Website")), "html", null, true);
        echo "</strong></label>
        ";
        // line 196
        $this->env->loadTemplate("@CoreHome/_siteSelect.twig")->display(array_merge($context, array("siteName" => $this->getContext($context, "defaultReportSiteName"), "idSite" => $this->getContext($context, "idSite"), "showAllSitesItem" => false, "switchSiteOnSelect" => false, "showSelectedSite" => true, "siteSelectorId" => "image-tracker-website")));
        // line 200
        echo "
        <br/><br/><br/>
    </div>

    <table id=\"image-tracking-section\" class=\"adminTable\" style='width:1024px;'>
        <tr>
            <th>";
        // line 206
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Options")), "html", null, true);
        echo "</th>
            <th>";
        // line 207
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Mobile_Advanced")), "html", null, true);
        echo "
                <a href=\"#\" class=\"section-toggler-link\" data-section-id=\"image-tracker-advanced-options\">
                    (";
        // line 209
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Show")), "html", null, true);
        echo ")
                </a>
            </th>
        </tr>
        <tr>
            <td>
                ";
        // line 216
        echo "                <div class=\"tracking-option-section\">
                    <label for=\"image-tracker-action-name\">";
        // line 217
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Actions_ColumnPageName")), "html", null, true);
        echo "</label>
                    <input type=\"text\" id=\"image-tracker-action-name\"/>
                </div>
            </td>
            <td>
                <div id=\"image-tracker-advanced-options\" style=\"display:none;\">
                    ";
        // line 224
        echo "                    <div class=\"goal-picker tracking-option-section\">
                        <input class=\"section-toggler-link\" type=\"checkbox\" id=\"image-tracking-goal-check\" data-section-id=\"image-goal-picker-extra\"/>
                        <label for=\"image-tracking-goal-check\">";
        // line 226
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_TrackAGoal")), "html", null, true);
        echo "</label>

                        <div style=\"display:none;\" id=\"image-goal-picker-extra\">
                            <select id=\"image-tracker-goal\">
                                <option value=\"\">";
        // line 230
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountryMap_None")), "html", null, true);
        echo "</option>
                            </select>
                            <span>";
        // line 232
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_WithOptionalRevenue")), "html", null, true);
        echo "</span>
                            <span class=\"currency\">";
        // line 233
        echo twig_escape_filter($this->env, $this->getContext($context, "defaultSiteRevenue"), "html", null, true);
        echo "</span>
                            <input type=\"text\" class=\"revenue\" value=\"\"/>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    </table>

    <div id=\"image-link-output-section\" width=\"560px\">
        <h3>";
        // line 243
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_ImageTrackingLink")), "html", null, true);
        echo "</h3><br/><br/>

        <div id=\"image-tracking-text\">
            <textarea> </textarea>
        </div>
        <br/>
    </div>

</div>

<h2>";
        // line 253
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_ImportingServerLogs")), "html", null, true);
        echo "</h2>

<p>
    ";
        // line 256
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_ImportingServerLogsDesc", "<a href=\"http://piwik.org/log-analytics/\" target=\"_blank\">", "</a>"));
        echo "
</p>

";
    }

    public function getTemplateName()
    {
        return "@CoreAdminHome/trackingCodeGenerator.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  464 => 256,  458 => 253,  445 => 243,  432 => 233,  428 => 232,  423 => 230,  416 => 226,  412 => 224,  403 => 217,  400 => 216,  391 => 209,  386 => 207,  382 => 206,  374 => 200,  372 => 196,  367 => 195,  360 => 190,  353 => 188,  345 => 183,  334 => 175,  329 => 173,  313 => 160,  306 => 156,  298 => 151,  292 => 148,  287 => 145,  282 => 141,  277 => 139,  273 => 137,  271 => 136,  267 => 135,  261 => 132,  257 => 130,  248 => 123,  240 => 118,  235 => 116,  227 => 111,  221 => 108,  217 => 106,  208 => 99,  200 => 94,  195 => 92,  187 => 87,  181 => 84,  177 => 82,  167 => 74,  160 => 70,  156 => 69,  152 => 67,  145 => 62,  139 => 59,  135 => 57,  128 => 52,  121 => 48,  117 => 47,  113 => 45,  105 => 39,  101 => 38,  97 => 37,  89 => 31,  87 => 29,  82 => 28,  75 => 23,  70 => 21,  63 => 19,  58 => 17,  50 => 12,  44 => 10,  41 => 9,  32 => 4,  29 => 3,);
    }
}
