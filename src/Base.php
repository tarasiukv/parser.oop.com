<?php

namespace src;

abstract class Base implements BaseInterface
{
    protected $url;
    protected $xml;

    public function __construct($url) {
        $this->url = $url;
        $this->xml = $this->fetchXml();
    }

    abstract protected function fetchXml();
    abstract public function parse();
}