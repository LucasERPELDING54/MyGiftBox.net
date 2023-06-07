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

/* templateCatByIdAction.html.twig */
class __TwigTemplate_737f17c4ce59e1177b7ce1f1e0517316bc9f9262382e60c8f4e31dfed9e0dc58 extends Template
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
    <title>Categorie ";
        // line 5
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "</title>
</head>
<body>
    <h1>La categorie ";
        // line 8
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "</h1>
    <h2>";
        // line 9
        echo twig_escape_filter($this->env, ($context["libelle"] ?? null), "html", null, true);
        echo "</h2>
    <h2>";
        // line 10
        echo twig_escape_filter($this->env, ($context["description"] ?? null), "html", null, true);
        echo "</h2>
<h3> <a href=\"";
        // line 11
        echo twig_escape_filter($this->env, ($context["url_prestation"] ?? null), "html", null, true);
        echo "\">Voir les prestations</a></h3>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "templateCatByIdAction.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 11,  57 => 10,  53 => 9,  49 => 8,  43 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "templateCatByIdAction.html.twig", "C:\\wamp64\\www\\MyGiftBox.net\\gift.appli\\src\\views\\templateCatByIdAction.html.twig");
    }
}
