<?php

namespace App\EventListener;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class ExceptionListener
{
    //слушатель, который создаёт сообщение об ошибки
    public function __invoke(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();
        $message = sprintf(
            'Сообщение: %s. C кодом: %s',
            $exception->getMessage(),
            $exception->getCode(),
        );

        $response = new Response();
        $response->setContent($message);

        $event->setResponse($response);
    }
}
