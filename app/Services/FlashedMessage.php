<?php
namespace studyhub\Services;
use Illuminate\Session\Store;

class FlashedMessage
{
    /**
     * Flashed message levels.
     */
    const INFO = 'info';
    const SUCCESS = 'success';
    const WARNING = 'warning';
    const DANGER = 'danger';
    /**
     * You can define an unique session key for all
     * of your flashed messages. Here we put a default
     * value for testing, your should probably change
     * this value later.
     */
    const FLASH_BASE_KEY = 'foo';
    /**
     * Session implementation.
     *
     * @var Store
     */
    protected $session;
    /**
     * An array of flashed messages.
     *
     * @var array
     */
    protected $messages;
    /**
     * Constructor.
     *
     * @param Store $session
     * @param array $messages
     */
    public function __construct(Store $session, array $messages = [])
    {
        $this->session = $session;
        $this->messages = $messages;
    }
    /**
     * Push a new message.
     *
     * @param $message
     * @param $type
     */
    public function push($message, $type)
    {
        $this->messages = array_add($this->messages, $message, $type);
    }
    /**
     * Get all messages.
     *
     * @return array
     */
    public function getMessages()
    {
        return $this->messages;
    }
    /**
     * Flash messages to the session.
     */
    public function flashMessages()
    {
        $this->session->flash($this->generateSessionKey(), $this->getMessages());
    }
    /**
     * Generate session key.
     *
     * @return string
     */
    private function generateSessionKey()
    {
        return md5(self::FLASH_BASE_KEY);
    }
}
