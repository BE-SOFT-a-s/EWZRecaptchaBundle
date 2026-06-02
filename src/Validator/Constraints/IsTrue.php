<?php

namespace EWZ\Bundle\RecaptchaBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 * @Target("PROPERTY")
 */
#[\Attribute(\Attribute::TARGET_PROPERTY | \Attribute::IS_REPEATABLE)]
class IsTrue extends Constraint
{
    public string $message;

    public string $invalidHostMessage;

    public function __construct(
        ?array  $options = null,
        ?string $message = 'This value is not a valid captcha.',
        ?string $invalidHostMessage = 'The captcha was not resolved on the right domain.',
        ?array  $groups = null,
        mixed   $payload = null
    )
    {
        parent::__construct(null, $groups, $payload);

        $this->message = $message;
        $this->invalidHostMessage = $invalidHostMessage;
    }

    /**
     * {@inheritdoc}
     */
    public function getTargets(): string
    {
        return Constraint::PROPERTY_CONSTRAINT;
    }

    /**
     * {@inheritdoc}
     */
    public function validatedBy(): string
    {
        return 'ewz_recaptcha.true';
    }
}
