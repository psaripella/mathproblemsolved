<?php

/* _iframeBuster.twig */
class __TwigTemplate_99b5490f484a88afb39857e0bf4cf3e7e2455040fab88a0dd4fd27e0d0cb4d20 extends Twig_Template
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
        if ((array_key_exists("enableFrames", $context) && ($this->getContext($context, "enableFrames") == false))) {
            // line 2
            echo "    <script type=\"text/javascript\">
        \$(function () {
        \$('body').css(\"display\", \"none\");
        if (self == top) {
            var theBody = document.getElementsByTagName('body')[0];
            theBody.style.display = 'block';
        } else { top.location = self.location; }
    });
    </script>
";
        }
    }

    public function getTemplateName()
    {
        return "_iframeBuster.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  21 => 2,  28 => 5,  24 => 3,  144 => 38,  138 => 36,  131 => 33,  128 => 32,  108 => 27,  104 => 26,  100 => 25,  96 => 24,  87 => 22,  85 => 21,  80 => 20,  77 => 15,  71 => 14,  68 => 13,  62 => 12,  59 => 11,  31 => 9,  27 => 4,  23 => 3,  19 => 1,  143 => 46,  140 => 45,  136 => 35,  133 => 36,  130 => 35,  123 => 22,  121 => 31,  116 => 29,  114 => 17,  112 => 28,  110 => 15,  105 => 13,  92 => 23,  86 => 7,  78 => 48,  75 => 47,  73 => 45,  69 => 44,  63 => 41,  58 => 38,  53 => 10,  50 => 9,  48 => 32,  44 => 8,  41 => 7,  39 => 28,  35 => 6,  32 => 26,  30 => 6,  22 => 3,  56 => 35,  54 => 11,  51 => 10,  47 => 8,  45 => 7,  42 => 6,  40 => 5,  37 => 4,  34 => 3,  29 => 2,);
    }
}
