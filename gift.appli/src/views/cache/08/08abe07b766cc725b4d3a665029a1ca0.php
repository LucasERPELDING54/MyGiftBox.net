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
class __TwigTemplate_5bbf6618a0772e0c97246f376387f9d4 extends Template
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
        $this->parent = $this->loadTemplate("gift.main.twig", "templatePrestationByCategorie.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Categories";
    }

    // line 5
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "    <ul>
    <img src = \"../../public/shared/img/gouter.jpg\">
    ";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["presta_liste"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["presta"]) {
            // line 9
            echo "        <img src = \"../../../shared/img/";
            echo twig_escape_filter($this->env, (($__internal_compile_0 = $context["presta"]) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["img"] ?? null) : null), "html", null, true);
            echo "\">
        <a href=\"";
            // line 10
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
            echo ")</li><br>  
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['presta'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "    
    </ul>
";
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
        return array (  89 => 13,  77 => 11,  71 => 10,  66 => 9,  62 => 8,  58 => 6,  54 => 5,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "templatePrestationByCategorie.html.twig", "D:\\wamp64\\www\\MyGiftBox.net\\gift.appli\\src\\views\\templatePrestationByCategorie.html.twig");
    }
}
