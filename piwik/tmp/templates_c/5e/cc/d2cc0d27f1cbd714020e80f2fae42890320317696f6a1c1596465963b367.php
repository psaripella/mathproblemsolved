<?php

/* @Login/login.twig */
class __TwigTemplate_5eccd2cc0d27f1cbd714020e80f2fae42890320317696f6a1c1596465963b367 extends Twig_Template
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
        echo "<!DOCTYPE html>
<!--[if lt IE 9 ]>
<html class=\"old-ie\"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html><!--<![endif]-->
<head>
    <meta charset=\"utf-8\">
    <title>";
        // line 8
        if (($this->getContext($context, "isCustomLogo") == false)) {
            echo "Piwik &rsaquo; ";
        }
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Login_LogIn")), "html", null, true);
        echo "</title>

    <link rel=\"shortcut icon\" href=\"plugins/CoreHome/images/favicon.ico\"/>
    ";
        // line 12
        echo "    ";
        echo call_user_func_array($this->env->getFunction('includeAssets')->getCallable(), array(array("type" => "css")));
        echo "
    ";
        // line 14
        echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"plugins/Login/stylesheets/login.css\"/>
    <meta name=\"description\" content=\"";
        // line 15
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_OpenSourceWebAnalytics")), "html", null, true);
        echo "\"/>
    <!--[if lt IE 9]>
    <script src=\"libs/html5shiv/html5shiv.js\"></script>
    <![endif]-->
    <script type=\"text/javascript\" src=\"libs/jquery/jquery.js\"></script>
    <script type=\"text/javascript\" src=\"libs/jquery/jquery.placeholder.js\"></script>
    <script type=\"text/javascript\" src=\"plugins/CoreHome/javascripts/require.js\"></script>
    <script type=\"text/javascript\" src=\"plugins/CoreHome/javascripts/notification.js\"></script>
    <script type=\"text/javascript\" src=\"plugins/CoreHome/javascripts/notification_parser.js\"></script>
    ";
        // line 24
        if ((array_key_exists("forceSslLogin", $context) && $this->getContext($context, "forceSslLogin"))) {
            // line 25
            echo "        <script type=\"text/javascript\">
            if (window.location.protocol !== 'https:') {
                var url = window.location.toString();
                url = url.replace(/^http:/, 'https:');
                window.location.replace(url);
            }
        </script>
    ";
        }
        // line 33
        echo "    <script type=\"text/javascript\">
        \$(function () {
            \$('#form_login').focus();
            \$('input').placeholder();
        });
    </script>
    <script type=\"text/javascript\" src=\"plugins/Login/javascripts/login.js\"></script>
    ";
        // line 40
        if ((call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_LayoutDirection")) == "rtl")) {
            // line 41
            echo "        <link rel=\"stylesheet\" type=\"text/css\" href=\"plugins/Zeitgeist/stylesheets/rtl.css\"/>
    ";
        }
        // line 43
        echo "</head>
<body id=\"loginPage\">

    ";
        // line 46
        $this->env->loadTemplate("_iframeBuster.twig")->display($context);
        // line 47
        echo "
    <div id=\"notificationContainer\">
    </div>

    <div id=\"logo\">
        ";
        // line 52
        if (($this->getContext($context, "isCustomLogo") == false)) {
            // line 53
            echo "            <a href=\"http://piwik.org\" title=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "linkTitle"), "html", null, true);
            echo "\">
        ";
        }
        // line 55
        echo "        ";
        if ($this->getContext($context, "hasSVGLogo")) {
            // line 56
            echo "            <img src='";
            echo twig_escape_filter($this->env, $this->getContext($context, "logoSVG"), "html", null, true);
            echo "' title=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "linkTitle"), "html", null, true);
            echo "\" alt=\"Piwik\" class=\"ie-hide\"/>
            <!--[if lt IE 9]>
        ";
        }
        // line 59
        echo "        <img src='";
        echo twig_escape_filter($this->env, $this->getContext($context, "logoLarge"), "html", null, true);
        echo "' title=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "linkTitle"), "html", null, true);
        echo "\" alt=\"Piwik\" />
        ";
        // line 60
        if ($this->getContext($context, "hasSVGLogo")) {
            echo "<![endif]-->";
        }
        // line 61
        echo "
        ";
        // line 62
        if ($this->getContext($context, "isCustomLogo")) {
            // line 63
            echo "            ";
            ob_start();
            // line 64
            echo "            <i><a href=\"http://piwik.org/\" target=\"_blank\">";
            echo twig_escape_filter($this->env, $this->getContext($context, "linkTitle"), "html", null, true);
            echo "</a></i>
            ";
            $context["poweredByPiwik"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 66
            echo "        ";
        }
        // line 67
        echo "
        ";
        // line 68
        if (($this->getContext($context, "isCustomLogo") == false)) {
            // line 69
            echo "            </a>
            <div class=\"description\">
                <a href=\"http://piwik.org\" title=\"";
            // line 71
            echo twig_escape_filter($this->env, $this->getContext($context, "linkTitle"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getContext($context, "linkTitle"), "html", null, true);
            echo "</a>
                <div class=\"arrow\"></div>
            </div>
        ";
        }
        // line 75
        echo "    </div>

    <section class=\"loginSection\">

        ";
        // line 80
        echo "        ";
        if (((array_key_exists("isValidHost", $context) && array_key_exists("invalidHostMessage", $context)) && ($this->getContext($context, "isValidHost") == false))) {
            // line 81
            echo "            ";
            $this->env->loadTemplate("@CoreHome/_warningInvalidHost.twig")->display($context);
            // line 82
            echo "        ";
        } else {
            // line 83
            echo "            <div id=\"message_container\">
                ";
            // line 84
            if ($this->getAttribute($this->getContext($context, "form_data"), "errors")) {
                // line 85
                echo "                    <div class=\"message_error\">
                        ";
                // line 86
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "form_data"), "errors"));
                foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
                    // line 87
                    echo "                            <strong>";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Error")), "html", null, true);
                    echo "</strong>: ";
                    echo twig_escape_filter($this->env, $this->getContext($context, "data"), "html", null, true);
                    echo "<br/>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 89
                echo "                    </div>
                ";
            }
            // line 91
            echo "
                ";
            // line 92
            if ($this->getContext($context, "AccessErrorString")) {
                // line 93
                echo "                    <div class=\"message_error\">
                        <strong>";
                // line 94
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Error")), "html", null, true);
                echo "</strong>: ";
                echo $this->getContext($context, "AccessErrorString");
                echo "<br/>
                    </div>
                ";
            }
            // line 97
            echo "
                ";
            // line 98
            if ($this->getContext($context, "infoMessage")) {
                // line 99
                echo "                    <p class=\"message\">";
                echo $this->getContext($context, "infoMessage");
                echo "</p>
                ";
            }
            // line 101
            echo "            </div>
            <form ";
            // line 102
            echo $this->getAttribute($this->getContext($context, "form_data"), "attributes");
            echo ">
                <h1>";
            // line 103
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Login_LogIn")), "html", null, true);
            echo "</h1>
                <fieldset class=\"inputs\">
                    <input type=\"text\" name=\"form_login\" id=\"login_form_login\" class=\"input\" value=\"\" size=\"20\"
                           tabindex=\"10\"
                           placeholder=\"";
            // line 107
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Username")), "html", null, true);
            echo "\" autofocus=\"autofocus\"/>
                    <input type=\"password\" name=\"form_password\" id=\"login_form_password\" class=\"input\" value=\"\" size=\"20\"
                           tabindex=\"20\"
                           placeholder=\"";
            // line 110
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Password")), "html", null, true);
            echo "\"/>
                    <input type=\"hidden\" name=\"form_nonce\" id=\"login_form_nonce\" value=\"";
            // line 111
            echo twig_escape_filter($this->env, $this->getContext($context, "nonce"), "html", null, true);
            echo "\"/>
                </fieldset>

                <fieldset class=\"actions\">
                    <input name=\"form_rememberme\" type=\"checkbox\" id=\"login_form_rememberme\" value=\"1\" tabindex=\"90\"
                           ";
            // line 116
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "form_data"), "form_rememberme"), "value")) {
                echo "checked=\"checked\" ";
            }
            echo "/>
                    <label for=\"login_form_rememberme\">";
            // line 117
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Login_RememberMe")), "html", null, true);
            echo "</label>
                    <input class=\"submit\" id='login_form_submit' type=\"submit\" value=\"";
            // line 118
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Login_LogIn")), "html", null, true);
            echo "\"
                           tabindex=\"100\"/>
                </fieldset>
            </form>
            <form id=\"reset_form\" style=\"display:none;\">
                <fieldset class=\"inputs\">
                    <input type=\"text\" name=\"form_login\" id=\"reset_form_login\" class=\"input\" value=\"\" size=\"20\"
                           tabindex=\"10\"
                           placeholder=\"";
            // line 126
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Login_LoginOrEmail")), "html", null, true);
            echo "\"/>
                    <input type=\"hidden\" name=\"form_nonce\" id=\"reset_form_nonce\" value=\"";
            // line 127
            echo twig_escape_filter($this->env, $this->getContext($context, "nonce"), "html", null, true);
            echo "\"/>

                    <input type=\"password\" name=\"form_password\" id=\"reset_form_password\" class=\"input\" value=\"\" size=\"20\"
                           tabindex=\"20\"
                           placeholder=\"";
            // line 131
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Password")), "html", null, true);
            echo "\"/>

                    <input type=\"password\" name=\"form_password_bis\" id=\"reset_form_password_bis\" class=\"input\" value=\"\"
                           size=\"20\" tabindex=\"30\"
                           placeholder=\"";
            // line 135
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Login_PasswordRepeat")), "html", null, true);
            echo "\"/>
                </fieldset>

                <fieldset class=\"actions\">
                    <span class=\"loadingPiwik\" style=\"display:none;\">
                        <img alt=\"Loading\" src=\"plugins/Zeitgeist/images/loading-blue.gif\"/>
                    </span>
                    <input class=\"submit\" id='reset_form_submit' type=\"submit\"
                           value=\"";
            // line 143
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ChangePassword")), "html", null, true);
            echo "\" tabindex=\"100\"/>
                </fieldset>

                <input type=\"hidden\" name=\"module\" value=\"Login\"/>
                <input type=\"hidden\" name=\"action\" value=\"resetPassword\"/>
            </form>
            <p id=\"nav\">
                <a id=\"login_form_nav\" href=\"#\"
                   title=\"";
            // line 151
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Login_LostYourPassword")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Login_LostYourPassword")), "html", null, true);
            echo "</a>
                <a id=\"alternate_reset_nav\" href=\"#\" style=\"display:none;\"
                   title=\"{'Login_LogIn'|translate}\">";
            // line 153
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Login_LogIn")), "html", null, true);
            echo "</a>
                <a id=\"reset_form_nav\" href=\"#\" style=\"display:none;\"
                   title=\"";
            // line 155
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Mobile_NavigationBack")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Cancel")), "html", null, true);
            echo "</a>
            </p>
            ";
            // line 157
            if (array_key_exists("poweredByPiwik", $context)) {
                // line 158
                echo "                <p id=\"piwik\">
                    ";
                // line 159
                echo twig_escape_filter($this->env, $this->getContext($context, "poweredByPiwik"), "html", null, true);
                echo "
                </p>
            ";
            }
            // line 162
            echo "            <div id=\"lost_password_instructions\" style=\"display:none;\">
                <p class=\"message\">";
            // line 163
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Login_ResetPasswordInstructions")), "html", null, true);
            echo "</p>
            </div>
        ";
        }
        // line 166
        echo "    </section>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "@Login/login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  365 => 166,  359 => 163,  356 => 162,  350 => 159,  347 => 158,  345 => 157,  338 => 155,  333 => 153,  326 => 151,  315 => 143,  304 => 135,  297 => 131,  290 => 127,  286 => 126,  275 => 118,  271 => 117,  265 => 116,  257 => 111,  253 => 110,  247 => 107,  240 => 103,  236 => 102,  233 => 101,  227 => 99,  225 => 98,  222 => 97,  214 => 94,  211 => 93,  209 => 92,  206 => 91,  202 => 89,  191 => 87,  187 => 86,  184 => 85,  182 => 84,  179 => 83,  176 => 82,  173 => 81,  170 => 80,  164 => 75,  155 => 71,  151 => 69,  149 => 68,  146 => 67,  143 => 66,  137 => 64,  134 => 63,  132 => 62,  129 => 61,  125 => 60,  118 => 59,  109 => 56,  106 => 55,  100 => 53,  98 => 52,  91 => 47,  89 => 46,  84 => 43,  80 => 41,  78 => 40,  69 => 33,  59 => 25,  57 => 24,  45 => 15,  42 => 14,  37 => 12,  28 => 8,  19 => 1,);
    }
}
