<?php

/* @Installation/tablesCreation.twig */
class __TwigTemplate_af4ce468ed308d36ac8b08e9cdc217d44a8133a8b860ce7ab07adbf8c89e73ce extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("@Installation/layout.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Installation/layout.twig";
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
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_Tables")), "html", null, true);
        echo "</h2>

";
        // line 6
        if (array_key_exists("someTablesInstalled", $context)) {
            // line 7
            echo "    <div class=\"warning\">";
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_TablesWithSameNamesFound", "<span id='linkToggle'>", "</span>"));
            echo "
        <img src=\"plugins/Zeitgeist/images/warning_medium.png\"/>
    </div>
    <div id=\"toggle\" style=\"display:none;color:#4F2410;font-size: small;\">
            <em>";
            // line 11
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_TablesFound")), "html", null, true);
            echo ": <br/>
                ";
            // line 12
            echo twig_escape_filter($this->env, $this->getContext($context, "tablesInstalled"), "html", null, true);
            echo " </em>
    </div>
    ";
            // line 14
            if (array_key_exists("showReuseExistingTables", $context)) {
                // line 15
                echo "        <p>";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_TablesWarningHelp")), "html", null, true);
                echo "</p>
        <p class=\"nextStep\"><a href=\"";
                // line 16
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('linkTo')->getCallable(), array(array("action" => $this->getContext($context, "nextModuleName")))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_TablesReuse")), "html", null, true);
                echo " &raquo;</a></p>
    ";
            } else {
                // line 18
                echo "        <p class=\"nextStep\"><a href=\"";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('linkTo')->getCallable(), array(array("action" => $this->getContext($context, "previousPreviousModuleName")))), "html", null, true);
                echo "\">&laquo; ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_GoBackAndDefinePrefix")), "html", null, true);
                echo "</a></p>
    ";
            }
            // line 20
            echo "    <p class=\"nextStep\"><a href=\"";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('linkTo')->getCallable(), array(array("deleteTables" => 1))), "html", null, true);
            echo "\" id=\"eraseAllTables\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_TablesDelete")), "html", null, true);
            echo " &raquo;</a></p>
";
        }
        // line 22
        echo "
";
        // line 23
        if (array_key_exists("existingTablesDeleted", $context)) {
            // line 24
            echo "    <div class=\"success\"> ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_TablesDeletedSuccess")), "html", null, true);
            echo "
        <img src=\"plugins/Zeitgeist/images/success_medium.png\"/></div>
";
        }
        // line 27
        echo "
";
        // line 28
        if (array_key_exists("tablesCreated", $context)) {
            // line 29
            echo "    <div class=\"success\"> ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_TablesCreatedSuccess")), "html", null, true);
            echo "
        <img src=\"plugins/Zeitgeist/images/success_medium.png\"/></div>
";
        }
        // line 32
        echo "
<script>
    \$(document).ready(function () {
        var strConfirmEraseTables = \"";
        // line 35
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_ConfirmDeleteExistingTables", (("[" . $this->getContext($context, "tablesInstalled")) . "]"))), "html", null, true);
        echo " \";

        // toggle the display of the tables detected during the installation when clicking
        // on the span \"linkToggle\"
        \$(\"#linkToggle\")
            .css(\"border-bottom\", \"thin dotted #ff5502\")

            .hover(function () {
                \$(this).css({ cursor: \"pointer\"});
            },
            function () {
                \$(this).css({ cursor: \"auto\"});
            })
            .css(\"border-bottom\", \"thin dotted #ff5502\")
            .click(function () {
                \$(\"#toggle\").toggle();
            });

        \$(\"#eraseAllTables\").click(function () {
            if (!confirm(strConfirmEraseTables)) {
                return false;
            }
        });
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "@Installation/tablesCreation.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 35,  110 => 32,  103 => 29,  101 => 28,  98 => 27,  91 => 24,  89 => 23,  86 => 22,  78 => 20,  70 => 18,  63 => 16,  58 => 15,  56 => 14,  51 => 12,  47 => 11,  39 => 7,  37 => 6,  31 => 4,  28 => 3,);
    }
}
