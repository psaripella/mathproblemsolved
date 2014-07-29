<?php

/* @CoreHome/_headerMessage.twig */
class __TwigTemplate_fed8611f33f1f47fdb3bb67956461e5d4ba2e2e1e24c39a77c5bf17bb4da8e93 extends Twig_Template
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
        // line 2
        $context["test_latest_version_available"] = "2.0";
        // line 3
        $context["test_piwikUrl"] = "http://demo.piwik.org/";
        // line 4
        ob_start();
        echo twig_escape_filter($this->env, (($this->getContext($context, "piwikUrl") == "http://demo.piwik.org/") || ($this->getContext($context, "piwikUrl") == "https://demo.piwik.org/")), "html", null, true);
        $context["isPiwikDemo"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 5
        echo "
<span id=\"header_message\" class=\"";
        // line 6
        if (($this->getContext($context, "isPiwikDemo") || (!$this->getContext($context, "latest_version_available")))) {
            echo "header_info";
        } else {
            echo "header_alert";
        }
        echo "\">
    <span class=\"header_short\">
        ";
        // line 8
        if ($this->getContext($context, "isPiwikDemo")) {
            // line 9
            echo "            ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_YouAreViewingDemoShortMessage")), "html", null, true);
            echo "
        ";
        } elseif ($this->getContext($context, "latest_version_available")) {
            // line 11
            echo "            ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NewUpdatePiwikX", $this->getContext($context, "latest_version_available"))), "html", null, true);
            echo "
        ";
        } else {
            // line 13
            echo "            ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_AboutPiwikX", $this->getContext($context, "piwik_version"))), "html", null, true);
            echo "
        ";
        }
        // line 15
        echo "    </span>

    <span class=\"header_full\">
        ";
        // line 18
        if ($this->getContext($context, "isPiwikDemo")) {
            // line 19
            echo "            ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_YouAreViewingDemoShortMessage")), "html", null, true);
            echo "
            <br/>
            ";
            // line 21
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_DownloadFullVersion", "<a href='http://piwik.org/'>", "</a>", "<a href='http://piwik.org'>piwik.org</a>"));
            echo "
            <br/>
        ";
        }
        // line 24
        echo "        ";
        if ($this->getContext($context, "latest_version_available")) {
            // line 25
            echo "            ";
            if ($this->getContext($context, "isSuperUser")) {
                // line 26
                echo "                ";
                echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_PiwikXIsAvailablePleaseUpdateNow", $this->getContext($context, "latest_version_available"), "<br /><a href='index.php?module=CoreUpdater&amp;action=newVersionAvailable'>", "</a>", "<a href='?module=Proxy&amp;action=redirect&amp;url=http://piwik.org/changelog/' target='_blank'>", "</a>"));
                echo "
                <br/>
                ";
                // line 28
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_YouAreCurrentlyUsing", $this->getContext($context, "piwik_version"))), "html", null, true);
                echo "
            ";
            } elseif ((!$this->getContext($context, "isPiwikDemo"))) {
                // line 30
                echo "                ";
                echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_PiwikXIsAvailablePleaseNotifyPiwikAdmin", "<a href='?module=Proxy&action=redirect&url=http://piwik.org/' target='_blank'>Piwik</a> <a href='?module=Proxy&action=redirect&url=http://piwik.org/changelog/' target='_blank'>{{ latest_version_available }}</a>"));
                echo "
            ";
            }
            // line 32
            echo "        ";
        } elseif ((!$this->getContext($context, "isPiwikDemo"))) {
            // line 33
            echo "            ";
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_PiwikIsACollaborativeProjectYouCanContributeAndDonate", "<a href='?module=Proxy&action=redirect&url=http://piwik.org' target='_blank'>", ($this->getContext($context, "piwik_version") . "</a>"), "<br />", "<a target='_blank' href='?module=Proxy&action=redirect&url=http://piwik.org/contribute/'>", "</a>", "<br/>", "<a href='http://piwik.org/donate/' target='_blank'><strong><em>", "</em></strong></a>"));
            // line 42
            echo "
        ";
        }
        // line 44
        echo "        ";
        if ($this->getContext($context, "hasSomeAdminAccess")) {
            // line 45
            echo "            <br/>
            <div id=\"updateCheckLinkContainer\">
                <span class='loadingPiwik' style=\"display:none;\"><img src='plugins/Zeitgeist/images/loading-blue.gif'/></span>
                <img src=\"plugins/Zeitgeist/images/reload.png\"/>
                <a href=\"#\" id=\"checkForUpdates\"><em>";
            // line 49
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_CheckForUpdates")), "html", null, true);
            echo "</em></a>
            </div>
        ";
        }
        // line 52
        echo "    </span>
</span>
";
    }

    public function getTemplateName()
    {
        return "@CoreHome/_headerMessage.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 52,  120 => 49,  111 => 44,  64 => 18,  86 => 26,  80 => 24,  78 => 24,  61 => 17,  97 => 33,  95 => 30,  91 => 31,  57 => 23,  101 => 32,  58 => 16,  63 => 6,  165 => 64,  153 => 62,  151 => 61,  136 => 52,  130 => 50,  128 => 49,  106 => 43,  102 => 42,  98 => 40,  71 => 20,  44 => 12,  35 => 9,  26 => 4,  90 => 28,  82 => 22,  69 => 8,  49 => 27,  39 => 8,  33 => 6,  59 => 15,  52 => 5,  48 => 13,  21 => 3,  28 => 5,  24 => 3,  132 => 36,  113 => 44,  108 => 28,  104 => 33,  96 => 25,  92 => 16,  88 => 30,  79 => 33,  77 => 27,  70 => 15,  62 => 25,  46 => 9,  31 => 6,  27 => 5,  23 => 4,  19 => 2,  134 => 43,  131 => 42,  127 => 34,  124 => 47,  121 => 32,  114 => 45,  112 => 19,  107 => 42,  105 => 15,  100 => 26,  87 => 9,  84 => 26,  81 => 25,  74 => 21,  72 => 21,  68 => 44,  66 => 19,  60 => 12,  55 => 15,  53 => 13,  50 => 14,  41 => 9,  38 => 2,  36 => 7,  32 => 5,  30 => 6,  22 => 2,  56 => 13,  54 => 15,  51 => 11,  47 => 11,  45 => 9,  42 => 9,  40 => 11,  37 => 10,  34 => 3,  29 => 4,);
    }
}
