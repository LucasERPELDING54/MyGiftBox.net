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
class __TwigTemplate_6e40f55cb408a24353a6fb331edcaeb2 extends Template
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
        $this->parent = $this->loadTemplate("gift.main.twig", "templateCatByIdAction.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Categorie ";
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
    }

    // line 5
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "    <h1>Categorie ";
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "</h1>
    <p>";
        // line 7
        echo twig_escape_filter($this->env, ($context["libelle"] ?? null), "html", null, true);
        echo "</p>
    <p>";
        // line 8
        echo twig_escape_filter($this->env, ($context["description"] ?? null), "html", null, true);
        echo "</p>
   <h3> <a href=\"";
        // line 9
        echo twig_escape_filter($this->env, ($context["url_prestation"] ?? null), "html", null, true);
        echo "\">Voir les prestations</a></h3>
";
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
        return array (  72 => 9,  68 => 8,  64 => 7,  59 => 6,  55 => 5,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "templateCatByIdAction.html.twig", "D:\\wamp64\\www\\MyGiftBox.net\\gift.appli\\src\\views\\templateCatByIdAction.html.twig");
    }
}
