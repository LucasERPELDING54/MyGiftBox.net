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
class __TwigTemplate_99008ff35230f09b0fb2b4705c6d22f2 extends Template
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
        echo "    <head>
        <link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->getBasePath(), "html", null, true);
        echo "/css/prestationsCat-style.css\">
    </head>

    <ul>
        ";
        // line 11
        $context["prestaCroissant"] = twig_sort_filter($this->env, ($context["presta_liste"] ?? null), function ($__a__, $__b__) use ($context, $macros) { $context["a"] = $__a__; $context["b"] = $__b__; return (twig_get_attribute($this->env, $this->source, ($context["a"] ?? null), "tarif", [], "any", false, false, false, 11) - twig_get_attribute($this->env, $this->source, ($context["b"] ?? null), "tarif", [], "any", false, false, false, 11)); });
        // line 12
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["prestaCroissant"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["presta"]) {
            // line 13
            echo "            <div class=\"wrapper\">
                <p>Prestation : <a href=\"";
            // line 14
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["presta"], "url", [], "any", false, false, false, 14), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["presta"], "libelle", [], "any", false, false, false, 14), "html", null, true);
            echo "</a> à partir de : ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["presta"], "tarif", [], "any", false, false, false, 14), "html", null, true);
            echo "\$<br><br><img src=\"../../../shared/img/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["presta"], "img", [], "any", false, false, false, 14), "html", null, true);
            echo "\"></p>
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['presta'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "    </ul>
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
        return array (  93 => 17,  78 => 14,  75 => 13,  70 => 12,  68 => 11,  61 => 7,  58 => 6,  54 => 5,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "templatePrestationByCategorie.html.twig", "C:\\wamp64\\www\\MyGiftBox.net\\gift.appli\\src\\views\\templatePrestationByCategorie.html.twig");
    }
}
