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

/* templatePrestationByCategorie.html.twig */
class __TwigTemplate_79531eac2ce13588f10d9b7c98f24544f84fbd7cf78c2b386b98deae5fb857e6 extends Template
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
<ul>
    ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["presta_liste"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["presta"]) {
            // line 10
            echo "        <li><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["presta"], "url", [], "any", false, false, false, 10), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["presta"], "libelle", [], "any", false, false, false, 10), "html", null, true);
            echo "</a>
        (";
            // line 11
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["presta"], "tarif", [], "any", false, false, false, 11), "html", null, true);
            echo "\$ ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["presta"], "unite", [], "any", false, false, false, 11), "html", null, true);
            echo " - id = ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["presta"], "id", [], "any", false, false, false, 11), "html", null, true);
            echo ")</li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['presta'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "    </ul>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "templatePrestationByCategorie.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  61 => 11,  54 => 10,  50 => 9,  43 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "templatePrestationByCategorie.html.twig", "C:\\wamp64\\www\\gift\\gift.appli\\src\\views\\templatePrestationByCategorie.html.twig");
    }
}
