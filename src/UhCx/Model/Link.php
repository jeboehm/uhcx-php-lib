<?php

namespace UhCx\Model;

/**
 * Class Link
 *
 * @package UhCx\Model
 */
class Link
{
    /** @var string */
    private $original;

    /** @var string */
    private $redirect;

    /** @var string */
    private $preview;

    /** @var string */
    private $qrRedirect;

    /** @var string */
    private $qrPreview;

    /**
     * Constructor.
     *
     * @param string $original
     * @param string $redirect
     * @param string $preview
     * @param string $qrRedirect
     * @param string $qrPreview
     */
    public function __construct($original, $redirect, $preview, $qrRedirect, $qrPreview)
    {
        $this->original   = $original;
        $this->redirect   = $redirect;
        $this->preview    = $preview;
        $this->qrRedirect = $qrRedirect;
        $this->qrPreview  = $qrPreview;
    }

    /**
     * The original, shortened URL.
     *
     * @return string
     */
    public function getOriginal()
    {
        return $this->original;
    }

    /**
     * URL to the redirect.
     *
     * @return string
     */
    public function getRedirect()
    {
        return $this->redirect;
    }

    /**
     * URL to the preview.
     *
     * @return string
     */
    public function getPreview()
    {
        return $this->preview;
    }

    /**
     * URL to the redirect QR Code.
     *
     * @return string
     */
    public function getQrRedirect()
    {
        return $this->qrRedirect;
    }

    /**
     * URL to the preview QR Code.
     *
     * @return string
     */
    public function getQrPreview()
    {
        return $this->qrPreview;
    }
}
