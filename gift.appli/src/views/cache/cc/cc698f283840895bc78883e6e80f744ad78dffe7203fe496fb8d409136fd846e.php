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

/* templatePrestationById.html.twig */
class __TwigTemplate_449fc6125b3d8e4b3493b2cf714a0ed44a4d037d5e02817f646d172b8cb451ec extends Template
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
    <title>Prestation ";
        // line 5
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "</title>
</head>
<body>
<img src=\"";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["prestation"] ?? null), "url", [], "any", false, false, false, 8), "html", null, true);
        echo "\">
<ul>
    <h1>Prestation : ";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["prestation"] ?? null), "libelle", [], "any", false, false, false, 10), "html", null, true);
        echo "</h1>
    <h3>Description : ";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["prestation"] ?? null), "description", [], "any", false, false, false, 11), "html", null, true);
        echo "</h3>
    <h3>Tarif : ";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["prestation"] ?? null), "tarif", [], "any", false, false, false, 12), "html", null, true);
        echo "</h3>
    
</ul>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "templatePrestationById.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 12,  58 => 11,  54 => 10,  49 => 8,  43 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "templatePrestationById.html.twig", "C:\\wamp64\\www\\MyGiftBox.net\\gift.appli\\src\\views\\templatePrestationById.html.twig");
    }
}
