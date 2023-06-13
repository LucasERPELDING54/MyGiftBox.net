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
class __TwigTemplate_93b3a67cb9e81f9c7c8c288fbd607349 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "gift.main.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("gift.main.twig", "templatePrestationById.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Prestation ";
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
    }

    // line 5
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "
   
<ul>
    <h1>Prestation : ";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["prestation"] ?? null), "libelle", [], "any", false, false, false, 9), "html", null, true);
        echo "</h1>
    <h3>Description : ";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["prestation"] ?? null), "description", [], "any", false, false, false, 10), "html", null, true);
        echo "</h3>
    <h3>Tarif : ";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["prestation"] ?? null), "tarif", [], "any", false, false, false, 11), "html", null, true);
        echo "</h3>

    <img src = \"../../../shared/img/";
        // line 13
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["prestation"] ?? null), "img", [], "any", false, false, false, 13), "html", null, true);
        echo "\">
    
</ul>

";
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
        return array (  77 => 13,  72 => 11,  68 => 10,  64 => 9,  59 => 6,  55 => 5,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "templatePrestationById.html.twig", "C:\\wamp64\\www\\MyGiftBox.net\\gift.appli\\src\\views\\templatePrestationById.html.twig");
    }
}
