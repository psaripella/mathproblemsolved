<?php

/* @CoreHome/_favicon.twig */
class __TwigTemplate_83bc0f972cb15ad8e2560563f979a4193ed5c86295d6d609d4d3f857124c7312 extends Twig_Template
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
        if ((($this->getContext($context, "isCustomLogo") && array_key_exists("customFavicon", $context)) && $this->getContext($context, "customFavicon"))) {
            // line 2
            echo "    <link rel=\"shortcut icon\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "customFavicon"), "html", null, true);
            echo "\"/>
";
        } else {
            // line 4
            echo "    <link rel=\"shortcut icon\" href=\"plugins/CoreHome/images/favicon.ico\"/>
";
        }
    }

    public function getTemplateName()
    {
        return "@CoreHome/_favicon.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 4,  21 => 2,  19 => 1,  98 => 49,  95 => 48,  88 => 50,  86 => 48,  81 => 46,  74 => 41,  69 => 39,  65 => 37,  63 => 36,  59 => 35,  29 => 8,  20 => 1,  76 => 24,  72 => 40,  64 => 17,  56 => 12,  52 => 10,  50 => 9,  47 => 8,  38 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}
