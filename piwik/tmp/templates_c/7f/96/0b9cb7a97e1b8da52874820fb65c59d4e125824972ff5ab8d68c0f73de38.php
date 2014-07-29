<?php

/* @CoreHome/_siteSelect.twig */
class __TwigTemplate_7f960b9cb7a97e1b8da52874820fb65c59d4e125824972ff5ab8d68c0f73de38 extends Twig_Template
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
        // line 16
        ob_start();
        // line 17
        echo "    <div class=\"custom_select_all\" style=\"clear: both;\">
        <a href=\"#\" ";
        // line 18
        if ((array_key_exists("showAllSitesItem", $context) && ($this->getContext($context, "showAllSitesItem") == false))) {
            echo "style=\"display:none;\"";
        }
        echo ">
            ";
        // line 19
        if (array_key_exists("allSitesItemText", $context)) {
            // line 20
            echo "                ";
            echo twig_escape_filter($this->env, $this->getContext($context, "allSitesItemText"), "html", null, true);
            echo "
            ";
        } else {
            // line 22
            echo "                ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_MultiSitesSummary")), "html", null, true);
            echo "
            ";
        }
        // line 24
        echo "        </a>
    </div>
";
        $context["sitesSelector_allWebsitesLink"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 27
        echo "<div class=\"sites_autocomplete ";
        if ((twig_length_filter($this->env, $this->getContext($context, "sites")) > 1)) {
            echo "sites_autocomplete--dropdown";
        }
        echo "\"
        ";
        // line 28
        if (array_key_exists("siteSelectorId", $context)) {
            echo "id=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "siteSelectorId"), "html", null, true);
            echo "\"";
        }
        // line 29
        echo "        ";
        if (((!array_key_exists("switchSiteOnSelect", $context)) || $this->getContext($context, "switchSiteOnSelect"))) {
            echo "data-switch-site-on-select=\"1\"";
        }
        echo ">
    <div class=\"custom_select\">

        <a href=\"#\" onclick=\"return false\" class=\"custom_select_main_link\" data-loading=\"0\" data-siteid=\"";
        // line 32
        if (array_key_exists("idSite", $context)) {
            echo twig_escape_filter($this->env, $this->getContext($context, "idSite"), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "sites"), 0, array(), "array"), "idsite"), "html", null, true);
        }
        echo "\">
            <span>";
        // line 33
        if (array_key_exists("siteName", $context)) {
            echo $this->getContext($context, "siteName");
        } else {
            echo $this->getAttribute($this->getAttribute($this->getContext($context, "sites"), 0, array(), "array"), "name");
        }
        echo "</span>
        </a>

        <div class=\"custom_select_block\">
            ";
        // line 37
        if ((array_key_exists("allWebsitesLinkLocation", $context) && ($this->getContext($context, "allWebsitesLinkLocation") == "top"))) {
            // line 38
            echo "                ";
            echo twig_escape_filter($this->env, $this->getContext($context, "sitesSelector_allWebsitesLink"), "html", null, true);
            echo "
            ";
        }
        // line 40
        echo "            <div class=\"custom_select_container\">
                <ul class=\"custom_select_ul_list\">
                    ";
        // line 42
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "sites"));
        foreach ($context['_seq'] as $context["_key"] => $context["info"]) {
            // line 43
            echo "                        <li ";
            if ((((!array_key_exists("showSelectedSite", $context)) || ($this->getContext($context, "showSelectedSite") == false)) && ($this->getContext($context, "idSite") == $this->getAttribute($this->getContext($context, "info"), "idsite")))) {
                echo " style=\"display: none;\"";
            }
            echo ">
                            <a href=\"#\" data-siteid=\"";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "info"), "idsite"), "html", null, true);
            echo "\">";
            echo $this->getAttribute($this->getContext($context, "info"), "name");
            echo "</a>
                        </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['info'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo "                </ul>
            </div>
            ";
        // line 49
        if (((!array_key_exists("allWebsitesLinkLocation", $context)) || ($this->getContext($context, "allWebsitesLinkLocation") == "bottom"))) {
            // line 50
            echo "                ";
            echo twig_escape_filter($this->env, $this->getContext($context, "sitesSelector_allWebsitesLink"), "html", null, true);
            echo "
            ";
        }
        // line 52
        echo "            <div class=\"custom_select_search\" ";
        if (($this->getContext($context, "show_autocompleter") == false)) {
            echo "style=\"display:none;\"";
        }
        echo ">
                <input type=\"text\" length=\"15\" class=\"websiteSearch inp\"/>
                <input type=\"hidden\" class=\"max_sitename_width\" value=\"130\"/>
                <input type=\"submit\" value=\"Search\" class=\"but\"/>
                <img title=\"Clear\" class=\"reset\" style=\"position: relative; top: 4px; left: -44px; cursor: pointer; display: none;\"
                     src=\"plugins/CoreHome/images/reset_search.png\"/>
            </div>
        </div>
    </div>
    ";
        // line 61
        if (array_key_exists("inputName", $context)) {
            // line 62
            echo "        <input type=\"hidden\" name=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "inputName"), "html", null, true);
            echo "\" value=\"";
            if (array_key_exists("idSite", $context)) {
                echo twig_escape_filter($this->env, $this->getContext($context, "idSite"), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "sites"), 0, array(), "array"), "idsite"), "html", null, true);
            }
            echo "\"/>
    ";
        }
        // line 64
        echo "</div>
<script type=\"text/javascript\">
    \$(document).ready(function () { piwik.initSiteSelectors(); });
</script>
";
    }

    public function getTemplateName()
    {
        return "@CoreHome/_siteSelect.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  165 => 64,  153 => 62,  151 => 61,  136 => 52,  130 => 50,  128 => 49,  106 => 43,  102 => 42,  98 => 40,  71 => 32,  44 => 24,  35 => 6,  26 => 3,  90 => 37,  82 => 22,  69 => 18,  49 => 27,  39 => 8,  33 => 6,  59 => 9,  52 => 12,  48 => 15,  21 => 17,  28 => 4,  24 => 18,  132 => 36,  113 => 44,  108 => 28,  104 => 27,  96 => 25,  92 => 38,  88 => 23,  79 => 33,  77 => 20,  70 => 15,  62 => 29,  46 => 9,  31 => 3,  27 => 4,  23 => 3,  19 => 16,  134 => 43,  131 => 42,  127 => 34,  124 => 47,  121 => 32,  114 => 20,  112 => 19,  107 => 16,  105 => 15,  100 => 26,  87 => 9,  84 => 22,  81 => 7,  74 => 20,  72 => 19,  68 => 44,  66 => 13,  60 => 12,  55 => 8,  53 => 33,  50 => 9,  41 => 8,  38 => 22,  36 => 26,  32 => 20,  30 => 19,  22 => 2,  56 => 28,  54 => 13,  51 => 10,  47 => 10,  45 => 7,  42 => 9,  40 => 5,  37 => 10,  34 => 3,  29 => 4,);
    }
}
