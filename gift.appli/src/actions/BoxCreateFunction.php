<?php

namespace gift\app\actions\set;

use gift\app\services\utils\CsrfService;

class BoxCreateFormAction extends AbstractAction{
    public function __invoke(Request $rq, Response $rs, array $args): Response
    {
        $data={
            'csrf_token'=>CsrfService::generate();
        }

        $view = Twig::fromRequest($rq);
        return $view->render($rs, 'boxCreateView.twig',
        array_merge($data, $this->getGlobalTemplateVar($rq)));
    }
}

