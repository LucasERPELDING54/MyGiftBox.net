<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* squellete/templateMain.html.twig */
class __TwigTemplate_adf4dd56525a202583afee36b0849e2b6a7121c60ef22c70737047b0df3ed7ba extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"fr\">

<head>
    <meta charset=\"UTF-8\">
    <title>Main page</title>
    <link rel=\"stylesheet\" href=\"css/templateMain.css\">
    <link rel=\"stylesheet\" href=\"css/prestation.css\"/>
</head>

<body>
    <div class=\"parent\">
        <div class=\"header\"> </div>
        <div class=\"footer\"> </div>
        <div class=\"leftBarre\"> </div>
    </div>
</body>

</html>";
    }

    public function getTemplateName()
    {
        return "squellete/templateMain.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "squellete/templateMain.html.twig", "C:\\wamp64\\www\\MyGiftBox.net\\gift.appli\\src\\views\\squellete\\templateMain.html.twig");
    }
}