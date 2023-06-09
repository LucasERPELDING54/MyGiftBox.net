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
class __TwigTemplate_4d0f540ff274bd2eb024bb9d34e5a3a9c9e2654adbc45a823da71f0fb91074a9 extends Template
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
";
        // line 8
        $this->loadTemplate("squellete/templateMain.html.twig", "templatePrestationByCategorie.html.twig", 8)->display($context);
        // line 9
        echo "    <ul>
    ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["presta_liste"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["presta"]) {
            // line 11
            echo "        <img src = \"../../shared/img/";
            echo twig_escape_filter($this->env, (($__internal_compile_0 = $context["presta"]) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["img"] ?? null) : null), "html", null, true);
            echo "\">
        <a href=\"";
            // line 12
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["presta"], "url", [], "any", false, false, false, 12), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["presta"], "libelle", [], "any", false, false, false, 12), "html", null, true);
            echo "</a>
        (";
            // line 13
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["presta"], "tarif", [], "any", false, false, false, 13), "html", null, true);
            echo "\$ ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["presta"], "unite", [], "any", false, false, false, 13), "html", null, true);
            echo " - id = ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["presta"], "id", [], "any", false, false, false, 13), "html", null, true);
            echo ")</li><br>  
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['presta'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "    
    </ul>
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
        return array (  81 => 15,  69 => 13,  63 => 12,  58 => 11,  54 => 10,  51 => 9,  49 => 8,  43 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "templatePrestationByCategorie.html.twig", "C:\\wamp64\\www\\MyGiftBox.net\\gift.appli\\src\\views\\templatePrestationByCategorie.html.twig");
    }
}
