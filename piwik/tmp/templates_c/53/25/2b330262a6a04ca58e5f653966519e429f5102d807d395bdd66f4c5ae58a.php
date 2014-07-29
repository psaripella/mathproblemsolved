<?php

/* _iframeBuster.twig */
class __TwigTemplate_53252b330262a6a04ca58e5f653966519e429f5102d807d395bdd66f4c5ae58a extends Twig_Template
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
        return array (  21 => 2,  365 => 166,  359 => 163,  356 => 162,  350 => 159,  347 => 158,  345 => 157,  338 => 155,  333 => 153,  326 => 151,  315 => 143,  304 => 135,  297 => 131,  290 => 127,  286 => 126,  275 => 118,  271 => 117,  265 => 116,  257 => 111,  253 => 110,  247 => 107,  240 => 103,  236 => 102,  233 => 101,  227 => 99,  225 => 98,  222 => 97,  214 => 94,  211 => 93,  209 => 92,  206 => 91,  202 => 89,  191 => 87,  187 => 86,  184 => 85,  182 => 84,  179 => 83,  176 => 82,  173 => 81,  170 => 80,  164 => 75,  155 => 71,  151 => 69,  149 => 68,  146 => 67,  143 => 66,  137 => 64,  134 => 63,  132 => 62,  129 => 61,  125 => 60,  118 => 59,  109 => 56,  106 => 55,  100 => 53,  98 => 52,  91 => 47,  89 => 46,  84 => 43,  80 => 41,  78 => 40,  69 => 33,  59 => 25,  57 => 24,  45 => 15,  42 => 14,  37 => 12,  28 => 8,  19 => 1,);
    }
}
